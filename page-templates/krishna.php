<?php
/*
   Template Name: krishna
*/
get_header();
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/calendarpage.css">

<?php
// Initialize the products array
$products_array = array();

// Query and populate the products array
$atts = shortcode_atts(array(
    'count'    => 9,
    'date'     => '',
    'category' => '',
    'search'   => '',
    'location' => ''
), $_GET);

$selected_date = isset($_GET['product_date']) ? sanitize_text_field($_GET['product_date']) : '';
$selected_category = isset($_GET['product_category']) ? sanitize_text_field($_GET['product_category']) : '';
$search_query = isset($_GET['product_search']) ? sanitize_text_field($_GET['product_search']) : '';
$selected_location = isset($_GET['product_location']) ? sanitize_text_field($_GET['product_location']) : '';
$meta_query = array();

if (!empty($selected_date)) {
    $date_parts = explode('-', $selected_date);
    if (count($date_parts) === 2) {
        $year = $date_parts[0];
        $month = $date_parts[1];
        $meta_query[] = array(
            'key'     => 'course_date_start',
            'value'   => $year . $month,
            'compare' => 'LIKE',
        );
    }
}

$paged = (get_query_var('paged')) ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);

$args = array(
    'post_type'      => 'product',
    'posts_per_page' => (int) $atts['count'],
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'meta_query'     => $meta_query,
    'tax_query'      => !empty($tax_query) ? $tax_query : '',
);

// Add custom title search
if (!empty($search_query)) {
    add_filter('posts_where', function($where) use ($search_query) {
        global $wpdb;
        $where .= $wpdb->prepare(
            " AND {$wpdb->posts}.post_title LIKE %s",
            '%' . $wpdb->esc_like($search_query) . '%'
        );
        return $where;
    });
}

if (!empty($selected_category)) {
    $args['tax_query'][] = array(
        'taxonomy' => 'product_cat',
        'field'    => 'slug',
        'terms'    => $selected_category
    );
}

if (!empty($selected_location)) {
    $args['tax_query'][] = array(
        'taxonomy' => 'course_locations',
        'field'    => 'name',
        'terms'    => $selected_location,
        'operator' => 'IN'
    );
}

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $product = wc_get_product(get_the_ID());
        if (!$product) continue;

        $course_start_date = get_field('course_date_start', get_the_ID());
        if ($course_start_date && strlen($course_start_date) === 8 && is_numeric($course_start_date)) {
            $year = substr($course_start_date, 2, 2);
            $month = substr($course_start_date, 4, 2);
            $day = substr($course_start_date, 6, 2);
            $course_start_date = $year . '/' . $month . '/' . $day;
        }

        echo '<!-- Start Date: ' . $course_start_date . '-->';
        $formatted_date = '';
        if ($course_start_date) {
            $date_object = DateTime::createFromFormat('y/m/d', $course_start_date);
            if ($date_object) {
                $formatted_date = $date_object->format('d F Y');
                $calendar_date = $date_object->format('Y-m-d');
            }
        }

        $products_array[] = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'permalink' => get_permalink(),
            'image_url' => get_the_post_thumbnail_url(get_the_ID(), 'medium'),
            'new_label' => strtolower(get_post_meta(get_the_ID(), 'new-lable', true)) === 'new',
            'price' => $product->get_price(),
            'formatted_price' => wc_price($product->get_price()),
            'course_start_date' => $course_start_date,
            'formatted_course_date' => $formatted_date,
            'calendar_date' => isset($calendar_date) ? $calendar_date : '',
            'add_to_cart_url' => $product->add_to_cart_url()
        );
    }
    wp_reset_postdata();
}
?>

<link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/main.min.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.10/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.10/index.global.min.js'></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Animate product items
    const items = document.querySelectorAll(".product-item");
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const visibleItems = Array.from(document.querySelectorAll(".product-item.visible")).length;
                entry.target.classList.add("visible");
                entry.target.style.transitionDelay = `${visibleItems * 0.2}s`;
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    items.forEach((item) => observer.observe(item));

    // Initialize the calendar
    const calendarEl = document.getElementById('caleder');
    if (calendarEl) {
        const urlParams = new URLSearchParams(window.location.search);
        const selectedDate = urlParams.get('product_date');
        let initialDate = new Date();
        if (selectedDate) {
            const [year, month] = selectedDate.split('-');
            initialDate = new Date(year, parseInt(month) - 1, 1);
        }
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: initialDate,
            headerToolbar: {
                left: '',
                center: 'title',
                right: ''
            },
            events: <?php echo json_encode(array_map(function ($product) {
                return array(
                    'title' => $product['title'],
                    'start' => $product['calendar_date'],
                    'url' => $product['permalink']
                );
            }, $products_array)); ?>,
            eventClick: function (info) {
                if (info.event.url) {
                    window.location.href = info.event.url;
                    info.jsEvent.preventDefault();
                }
            }
        });
        calendar.render();
        calendarEl._fullCalendar = calendar;
    }

    // Tab switching logic
    const tabs = document.querySelectorAll(".tab-item");
    const tabContents = document.querySelectorAll(".tab-content");
    tabs.forEach(tab => {
        tab.addEventListener("click", function () {
            tabs.forEach(t => t.classList.remove("active"));
            tabContents.forEach(content => content.style.display = "none");
            this.classList.add("active");
            const target = this.getAttribute("data-tab");
            document.getElementById(target).style.display = "block";
            if (target === "calendar") {
                setTimeout(() => {
                    if (calendarEl && calendarEl._fullCalendar) {
                        calendarEl._fullCalendar.updateSize();
                        calendarEl._fullCalendar.render();
                    }
                }, 100);
            }
        });
    });
    document.querySelector(".tab-item.active").click();
});
</script>

<div class="course-filter-container">
    <form method="GET" action="<?php echo esc_url(get_permalink()); ?>" id="product-filter-form">
        <select name="product_date" onchange="this.form.submit()">
            <option value="">Select Date</option>
            <?php
            $allowed_dates = array(
                '2025-04' => 'April 2025',
                '2025-05' => 'May 2025',
                '2025-06' => 'June 2025',
                '2025-07' => 'July 2025',
                '2025-08' => 'August 2025',
                '2025-09' => 'September 2025',
                '2025-10' => 'October 2025',
                '2025-11' => 'November 2025',
                '2025-12' => 'December 2025',
            );

            foreach ($allowed_dates as $date_value => $display_label) {
                $selected = ($selected_date === $date_value) ? 'selected' : '';
                echo '<option value="' . esc_attr($date_value) . '" ' . $selected . '>' . esc_html($display_label) . '</option>';
            }
            ?>
        </select>

        <?php
        $categories = get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false));
        if (!empty($categories) && !is_wp_error($categories)) {
            echo '<select name="product_category" onchange="this.form.submit()">';
            echo '<option value="">Select Category</option>';
            foreach ($categories as $category) {
                $selected = ($selected_category == $category->slug) ? 'selected' : '';
                echo '<option value="' . esc_attr($category->slug) . '" ' . $selected . '>' . esc_html($category->name) . '</option>';
            }
            echo '</select>';
        }
        ?>

        <select name="product_location" onchange="this.form.submit()">
            <option value="">Select Location</option>
            <?php
            $locations = array(
                'Berlin', 'Brussels', 'Bucharest', 'London', 'Los Angeles',
                'Montreal', 'New York', 'Online', 'Paris', 'Scotland',
                'Store', 'Toronto', 'Vancouver', 'VOD'
            );
            foreach ($locations as $location) {
                $selected = ($selected_location == $location) ? 'selected' : '';
                echo '<option value="' . esc_attr($location) . '" ' . $selected . '>' . esc_html($location) . '</option>';
            }
            ?>
        </select>

        <input type="text" name="product_search" placeholder="Search products" value="<?php echo esc_attr($search_query); ?>">

        <button class="filter-button button1" type="submit">Search</button>
    </form>
</div>

<div class="tabs-container">
    <ul class="tabs">
        <li class="tab-item active" data-tab="courses">Courses</li>
        <li class="tab-item" data-tab="calendar">Calendar</li>
    </ul>
    <div class="tab-content" id="courses">
        <div class="product-list">
            <?php
            if (!empty($products_array)) {
                foreach ($products_array as $product) {
                    ?>
                    <div class="product-item">
                        <a href="<?php echo esc_url($product['permalink']); ?>" class="product-image-wrapper">
                            <?php if ($product['new_label']) { ?>
                                <span class="new-badge">NEW</span>
                            <?php } ?>
                            <img src="<?php echo esc_url($product['image_url']); ?>" alt="<?php echo esc_attr($product['title']); ?>">
                        </a>
                        <a class="product-name" href="<?php echo esc_url($product['permalink']); ?>"><?php echo esc_html($product['title']); ?></a>
                        <div class="product-price"><?php echo $product['formatted_price']; ?></div>
                        <?php if (!empty($product['formatted_course_date'])) { ?>
                            <div class="product-date"><?php echo esc_html($product['formatted_course_date']); ?></div>
                        <?php } ?>
                        <a href="<?php echo esc_url($product['add_to_cart_url']); ?>" class="add-to-cart">Add to Cart</a>
                    </div>
                    <?php
                }
            } else {
                echo '<p>No products found.</p>';
            }
            ?>
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            <?php
            echo paginate_links(array(
                'total' => $query->max_num_pages,
                'current' => max(1, $paged),
                'format' => '?paged=%#%',
                'prev_text' => __('&laquo; Previous'),
                'next_text' => __('Next &raquo;'),
                'add_args' => array(
                    'product_search' => $search_query
                )
            ));
            ?>
        </div>
    </div>
    <div class="tab-content" id="calendar" style="display: none;">
        <div id="caleder"></div>

        <!-- Courses Below Calendar -->
        <div class="product-list">
            <?php
            $calendar_courses = array_filter($products_array, function ($product) {
                return !empty($product['calendar_date']); // Only include products with a valid calendar date
            });

            if (!empty($calendar_courses)) {
                foreach ($calendar_courses as $product) {
                    ?>
                    <div class="product-item">
                        <a href="<?php echo esc_url($product['permalink']); ?>" class="product-image-wrapper">
                            <?php if ($product['new_label']) { ?>
                                <span class="new-badge">NEW</span>
                            <?php } ?>
                            <img src="<?php echo esc_url($product['image_url']); ?>" alt="<?php echo esc_attr($product['title']); ?>">
                        </a>
                        <a class="product-name" href="<?php echo esc_url($product['permalink']); ?>"><?php echo esc_html($product['title']); ?></a>
                        <div class="product-price"><?php echo $product['formatted_price']; ?></div>
                        <?php if (!empty($product['formatted_course_date'])) { ?>
                            <div class="product-date"><?php echo esc_html($product['formatted_course_date']); ?></div>
                        <?php } ?>
                        <a href="<?php echo esc_url($product['add_to_cart_url']); ?>" class="add-to-cart">Add to Cart</a>
                    </div>
                    <?php
                }
            } else {
                echo '<p>No courses found for the calendar.</p>';
            }
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>