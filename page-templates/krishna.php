<?php
/*
   Template Name: krishna
*/
get_header();
?>

<link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/main.min.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.10/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.10/index.global.min.js'></script>

<style>

   .custom-product {
      justify-content: normal !important;
   }
   .custom-products-grid {
      flex-wrap: wrap;
   }
   .custom-product {
      flex: 1 0 calc(33.33% - 20px);
      box-sizing: border-box;
      margin: 10px;
   }
   .product-image img {
      width: 100%;
      height: auto;
   }
   .product-info {
      text-align: center;
      padding: 10px;
      padding-bottom: 30px;
   }
   .product-rating {
      margin: 10px 0;
   }
   .product-publish-date {
      font-size: 0.9em;
      color: #666;
   }
   .button {
      display: inline-block;
      margin-top: 10px;
   }
   .fa-star::before {
      color: #ff0000 !important;
   }
</style>

<style>

@media (min-width: 800px) and (max-width: 2500px) {
    .product-list {  
        justify-content: center !important;
    }
}



   .kkm ul.pagination { display: none !important; }
   .kkm ul.products.columns-3 { display: none; }
   .custom-product {
      position: relative;
      overflow: hidden;
   }
   .product-image {
      transition: transform 0.3s ease;
   }
   .product-TEXT-a1 {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: #ffffff;
      color: #000;
      justify-content: center;
      align-items: center;
      padding: 20px;
      min-height: 67%;
      opacity: 0;
      transition: transform 0.3s ease;
      transform: translateX(50%);
      z-index: 2;
      height: 255px;
      visibility: hidden;
   }
   .custom-product:hover .product-TEXT-a1 {
      visibility: visible;
      opacity: 1;
      transform: translateX(0);
   }
   .product-image img {
      height: 400px;
      width: 400px !important;
   }
   .custom-product a.button.product_type_variable.add_to_cart_button {
      min-width: 10rem !important;
      width: max-content !important;
      display: block;
      margin: 0 auto;
      background-color: #39b5a6 !important;
   }
   h2#hed-2 a {
      color: #39b5a6;
      font-weight: 600;
      font-size: 20px;
      text-transform: uppercase;
   }
   h2#hed-2 a:hover {
      text-decoration: none;
   }
   p.product-publish-date {
      color: #1e1e1ec2;
      font-size: 16px;
   }
   span.woocommerce-Price-currencySymbol {
      font-size: 19px;
      font-weight: 600;
      color: #000;
   }
   bdi {
      font-size: 18px;
      font-weight: 500;
   }
   h2#hed-2 {
      padding: 25px;
   }
   .cource-container span.woocommerce-Price-amount.amount {
      font-size: 20px;
      font-weight: 400;
   }
   .woocommerce-product-details__short-description {
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
   }
   .pagination .current {
      font-weight: bold;
      color: #ffffff;
      background-color: #7b7b7b;
      padding: 8px 12px;
      border-radius: 3px;
   }
   .pagination {
      text-align: center !important;
      margin: 72px 0px;
      background-color: #ffffff;
      padding: 6px 0px;
   }
   .pagination a {
      text-decoration: none;
      color: #0073aa;
      padding: 8px 12px;
      border: 1px solid #ccc;
   }
   .pagination-wrapper {
      display: block;
      margin: 0 auto;
   }
   i#star-empty::before {
      content: "\f006";
      font-size: 1em;
      color: #39b5a6;
   }
   h2#hed-2 {
      position: absolute;
      top: 0;
      z-index: 1;
      background-color: #00000080;
      width: 100%;
      left: 0;
      height: 400px;
      margin: 0;
      justify-content: center;
      align-items: flex-end;
      text-align: right;
   }
   h2#hed-2 a {
      color: #ffffff;
   }
   .custom-product p:nth-child(3) {
      padding-top: 0px !important;
   }
   @media screen and (max-width: 1024px) {
      .custom-product { flex: 1 0 calc(50% - 20px) !important; margin: 10px; }
   }
   @media screen and (max-width: 768px) {
      .custom-product { flex: 1 0 calc(50% - 20px) !important; margin: 10px; }
   }
   @media screen and (max-width: 600px) {
      .custom-product { flex: 1 0 calc(100% - 20px) !important; margin: 10px; }
   }
   .filters {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
   }
   .filters select, .filters input {
      width: 32%;
      padding: 8px;
   }
   .courses-toggle {
      margin:25px auto 25px;
      border-radius: 20px;
      list-style: none;
      padding: 0;
      text-align: center;
      display: flex;
      justify-content: center;
   }
   .courses-toggle li.active {
      background: #000;
      color: white;
   }
   .courses-toggle li:first-child {
      border-radius: 20px 0px 0px 20px;
      position: relative;
      left: 3px;
      padding: 6px 10px;
   }
   .courses-toggle li:last-child {
      border-radius: 0px 20px 20px 0px;
      padding: 6px 10px;
   }
   .courses-toggle li {
      text-transform: uppercase;
      text-align: center;
      background: #fff;
      display: inline-block;
      padding: 10px 15px;
      color: black;
   }
   .custom-products-grid {
      background: #eee;
   }

   .product-image-wrapper {
   position: relative;
   display: inline-block;
}

.new-badge {
   position: absolute;
   top: 10px;
   left: 10px;
   background-color: #39b4a6;
   color: white;
   padding: 5px 10px;
   border-radius: 20px;
   font-size: 12px;
   font-weight: bold;
   z-index: 10;
   box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}
a.read-more.add-to-cart:hover {
    background-color: black;
}

.add-to-cart:hover {   
    background: #000;
}

.calendar-container {
    padding-bottom: 60px;
}

.product-item {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.5s ease-out, transform 0.5s ease-out;
}

.product-item.visible {
  opacity: 1;
  transform: translateY(0);
}

.product-date .converted-date {
  font-size: 16px; /* reset size for visible text */
  display: inline-block;
}

#caleder {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
}

.fc-event {
    cursor: pointer;
    background-color: #39b4a6;
    border: 1px solid #39b4a6;
}

.fc-daygrid-day.fc-day-today {
    background-color: rgba(57, 180, 166, 0.1) !important;
}

.fc-button-primary {
    background-color: #39b4a6 !important;
    border-color: #39b4a6 !important;
}

.fc-toolbar-title {
    font-size: 1.5em !important;
    font-weight: bold !important;
    color: #333 !important;
}
</style>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".product-item");

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const visibleItems = Array.from(document.querySelectorAll(".product-item.visible")).length;
          entry.target.classList.add("visible");
          entry.target.style.transitionDelay = `${visibleItems * 0.2}s`;
          observer.unobserve(entry.target); // so it animates only once
        }
      });
    }, {
      threshold: 0.1
    });

    items.forEach((item) => {
      observer.observe(item);
    });
  });
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
   let selectElement = document.querySelector("select[name='product_date']");
   if (selectElement) {
      selectElement.id = "month-choice";
   }
});
</script>

<script>
function openCity(evt, cityName) {
  // Hide all tab contents
  const tabcontent = document.getElementsByClassName("tabcontent");
  for (let i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove 'active' class from all tablinks
  const tablinks = document.getElementsByClassName("tablinks");
  for (let i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove("active");
  }

  // Show current tab and add 'active' class
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.classList.add("active");

  // Save selected tab in localStorage
  localStorage.setItem("activeTab", cityName);

  // Add this after showing the current tab
  if (cityName === 'Paris') {
    setTimeout(function() {
      const calendarEl = document.getElementById('caleder');
      if (calendarEl) {
        const calendar = calendarEl._fullCalendar;
        if (calendar) {
          calendar.updateSize();
          calendar.render();
        }
      }
    }, 100);
  }
}

// Run this on page load
document.addEventListener("DOMContentLoaded", function() {
  const activeTab = localStorage.getItem("activeTab") || "London"; // Default to 'London'
  const defaultTabButton = document.querySelector(`.tablinks[onclick*="${activeTab}"]`);

  if (defaultTabButton) {
    defaultTabButton.click(); // Trigger the click to open tab
  }
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('caleder');
    if (!calendarEl) return;

    // Get the selected date from URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const selectedDate = urlParams.get('product_date');
    
    let initialDate = new Date();
    if (selectedDate) {
        const [year, month] = selectedDate.split('-');
        initialDate = new Date(year, parseInt(month) - 1, 1);
    }

    const calendar = new FullCalendar.Calendar(calendarEl, {
        // ...existing calendar options...
    });

    // Store calendar instance on the element
    calendarEl._fullCalendar = calendar;

    // Initial render
    calendar.render();

    // Add resize observer
    const resizeObserver = new ResizeObserver(() => {
        if (document.getElementById('Paris').style.display === 'block') {
            calendar.updateSize();
        }
    });
    
    resizeObserver.observe(calendarEl);

    // Force render when tab becomes visible
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.target.style.display === 'block') {
                setTimeout(() => calendar.updateSize(), 100);
            }
        });
    });

    observer.observe(document.getElementById('Paris'), {
        attributes: true,
        attributeFilter: ['style']
    });
});
</script>

<?php
function custom_product_info_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count'    => 9,
      'date'     => '',
      'category' => '',
      'search'   => '',
      'location' => ''
    ), $atts);

    // Handle selected filter value
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

    // Fix paged value
    $paged = (get_query_var('paged')) ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);


// Query args
$args = array(
   'post_type'      => 'product',
   'posts_per_page' => $atts['count'],
   'paged'          => $paged,
   's'              => $search_query,
);


    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => (int) $atts['count'],
        'paged'          => $paged,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query'     => $meta_query,
    );


    if (!empty($selected_category)) {
      $args['tax_query'][] = array(
         'taxonomy' => 'product_cat',
         'field'    => 'slug',
         'terms'    => $selected_category
      );
   }

   if (!empty($selected_location)) {
      $args['tax_query'] = array(
         array(
            'taxonomy' => 'course_locations',
            'field'    => 'name',
            'terms'    => $selected_location,
            'operator' => 'IN'
         ),
      );
   }

    $query = new WP_Query($args);

    // Initialize the products array
    $products_array = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $product = wc_get_product(get_the_ID());
            if (!$product) continue;

            // Get and format the course date
            $course_start_date = get_field('course_date_start', get_the_ID());
            $formatted_date = '';
            if ($course_start_date) {
                $date_object = DateTime::createFromFormat('y/m/d', $course_start_date);
                if ($date_object) {
                    $formatted_date = $date_object->format('d F Y');
                }
            }

            // Store product data in array
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
                'add_to_cart_url' => $product->add_to_cart_url()
            );
        }
        wp_reset_postdata();
        $query->rewind_posts();
    }

    ob_start();
    ?>

    <!-- Remove /page/x/ from URL on filter submit -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('product-filter-form');
        form.addEventListener('submit', function(e) {
            var url = window.location.href;
            url = url.replace(/\/page\/\d+\//, '/'); // remove /page/2/ etc.
            window.history.replaceState({}, document.title, url);
        });
    });
    </script>

    <div class="course-098">
        <div class="container content-container">
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
               <input type="text" name="product_search" placeholder="Search products" value="<?php echo esc_attr($search_query); ?>" oninput="this.form.submit()">


<button class="filter-button button1">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container content-container">

    <div class="container cource-container">
         <!-- <ul class="courses-toggle">
            <li class="course-toggle active">Courses</li>
            <li class="calendar-toggle">Calendar</li>
         </ul> -->

         <div class="tab">
  <button class="tablinks course-toggle" onclick="openCity(event, 'London')">Courses</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">
   Calender
  </button>
</div>

<div id="London" class="tabcontent">
<div class="product-list">
            <?php
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $product = wc_get_product(get_the_ID());
                    if (!$product) continue;
                    ?>
                    <div class="product-item">
                        <a href="<?php the_permalink(); ?>" class="product-image-wrapper">
                            <?php
                            $new_label = get_post_meta(get_the_ID(), 'new-lable', true);
                            if (strtolower($new_label) === 'new') {
                                echo '<span class="new-badge">NEW</span>';
                            }
                            ?>
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" alt="<?php the_title_attribute(); ?>">
                        </a>

                        <a class="product-name" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <div class="product-price"><?php echo wc_price($product->get_price()); ?></div>

                        <?php
                        $course_start_date = get_field('course_date_start', get_the_ID());
                        if ($course_start_date) {
                            // Convert the date to the desired format
                            $date_object = DateTime::createFromFormat('y/m/d', $course_start_date);
                            if ($date_object) {
                                // Swap the year and day
                                $formatted_date = $date_object->format('d F Y');
                                echo '<div class="product-date">' . esc_html($formatted_date) . '</div>';
                            } else {
                                echo '<div class="product-date">Invalid date format</div>';
                            }
                        }
                        ?>

                        <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="add-to-cart">Add to Cart</a>
                    </div>
                    <?php
                }
            } else {
                echo '<p>No products found.</p>';
            }
            ?>
        </div>
</div>

<div id="Paris" class="tabcontent">
    <div id="caleder"></div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the selected date from URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const selectedDate = urlParams.get('product_date');
        
        // Parse the year and month
        let initialDate = new Date();
        if (selectedDate) {
            const [year, month] = selectedDate.split('-');
            initialDate = new Date(year, parseInt(month) - 1, 1);
        }

        const calendarEl = document.getElementById('caleder');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: initialDate,
            headerToolbar: {
                left: '',
                center: 'title',
                right: ''
            },
            events: <?php 
                // Convert your products array to calendar events
                $calendar_events = array();
                if (!empty($products_array)) {
                    foreach ($products_array as $product) {
                        if (!empty($product['course_start_date'])) {
                            $date_object = DateTime::createFromFormat('y/m/d', $product['course_start_date']);
                            if ($date_object) {
                                $calendar_events[] = array(
                                    'title' => $product['title'],
                                    'start' => $date_object->format('Y-m-d'),
                                    'url' => $product['permalink']
                                );
                            }
                        }
                    }
                }
                echo json_encode($calendar_events);
            ?>,
            eventClick: function(info) {
                if (info.event.url) {
                    window.location.href = info.event.url;
                    info.jsEvent.preventDefault();
                }
            }
        });
        calendar.render();
    });
    </script>
</div>

<style>


/* Style the tab */
.tab {
  text-align: center; 
  margin: 40px 0;
}

.tab button {
    background-color: #f1f1f1;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 12px 24px;
    margin: 0 0px;
    font-size: 16px;
    border-radius: 21px;
    transition: background-color 0.3s;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.tab button:hover {
  background-color: #ddd;
}

.tab button.active {
  background-color: #39b4a6 !important; 
  color: white;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 0px;
  border-top: none;
}
</style>
         <div id="shop-updater"></div>
         <div class="calendar-container">
            <div class="monthly" id="mycalendar"></div>
         </div>
         <div class="woocommerce mt-20" id="cources-page">
            <ul class="products columns-3"></ul>
            <div class="paging-container" id="tablePaging"></div>
         </div>
      </div>

        

        <div class="pagination-wrapper">
            <?php
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'    => '/page/%#%/', // Ensure pretty permalinks
                'current'   => max(1, $paged),
                'total'     => $query->max_num_pages,
                'add_args'  => array(
                    'product_date' => $selected_date,
                ),
                'prev_text' => __('« Prev'),
                'next_text' => __('Next »'),
            ));
            ?>
        </div>
    </div>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('product_info', 'custom_product_info_shortcode');
?>









<style>



#product-filter-form select, #product-filter-form input {
    padding: 10px !important;
    border-radius: 15px;
    background-color: #eeeeee;
   
}



   img.star2 { width: 100% !important; }
   .button1 {
      padding: 7px 40px;
      margin: 0px;
      background: #39b4a6;
      border: 2px solid #39b4a6;
      color: #fff;
      font-size: 16px;
   }
   .pagination-wrapper {
      display: flex;
      gap: 8px;
      align-items: center;
      background: #f0f0f0;
      padding: 10px;
      border-radius: 6px;
      padding-bottom: 50px;
   }
   .page-numbers {
      padding: 8px 12px;
      text-decoration: none;
      color: #333;
      border: 1px solid #39b4a6;
      border-radius: 4px;
      background: white;
      transition: background 0.3s, color 0.3s;
   }
   .page-numbers.current {
      background: #39b4a6;
      color: white;
      border: none;
   }
   .page-numbers:hover {
      background: #39b4a6;
      color: white;
   }
   .next.page-numbers {
      background: #39b4a6;
      color: white;
      border: none;
   }
   .next.page-numbers:hover {
      background: #444;
   }
   #product-filter-form {
      display: flex;
      gap: 10px;
      align-items: center;
      justify-content: center;
      width: 100%;
      flex-wrap: nowrap;
   }
   #product-filter-form select, #product-filter-form input {
      padding: 8px;
      font-size: 14px;
      flex: 1;
      min-width: 255px;
   }
   .product-list {
      margin-top: -7px;
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
      justify-content: space-between;
   }


   .product-image-wrapper {
    width: 100%;
    height: 400px;
    overflow: hidden;
    display: block;
}
.product-item a img {
    object-fit: cover !important;
    display: block;
    width: 100%;
    height: 100%;
    padding-bottom: 30px;
    border-radius: 20px;
}


 
   .product-item {
      flex: 0 0 calc(31% - 15px);
      border-radius: 20px;
      text-align: center;
      padding: 0 0 25px;
      box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 30%);
      background-color: #fff;
      min-height: 467px;
   }
   .product-item img {
      max-width: 100%;
      height: auto;
      display: block;
      margin: 0 auto 10px;
      width: 100%;
   }
   .product-price {
      font-size: 16px;
      font-weight: bold;
      color: #0071a1;
      padding-top: 17px;
      padding-bottom: 17px;
   }
   .add-to-cart {
      display: inline-block;
      background: #ff6600;
      color: #fff;
      padding: 8px 12px;
      border-radius: 5px;
      text-decoration: none;
      font-size: 14px;
   }
   .pagination-wrapper {
      text-align: center;
      margin-top: 20px;
      width: 100%;
      display: flex;
      justify-content: center;
   }
   .pagination {
      display: inline-block;
   }
   .pagination a, .pagination span {
      padding: 8px 12px;
      margin: 2px;
      border: 1px solid #ddd;
      text-decoration: none;
      color: #0071a1;
   }
   .pagination .current {
      font-weight: bold;
      background: #0071a1;
      color: white;
   }
   .course-filter-container {
      padding: 30px 0px;
   }

   .course-filter-container {
    background: #ffffff !important;
   }




   .course-098 {
      background: #ffffff;
      margin-top: 8px;
   }
   .course-098 button {
      width: 200px;
      border-radius: 1px;
   }
   a.product-name {
      font-family: "Roboto", Sans-serif;
      font-size: 20px;
      font-weight: 700;
      text-decoration: none;
      color: #000;
   }
   a.add-to-cart {
      text-decoration: none;
      color: #fff;
      background-color: #39b4a6;
      font-family: "Roboto", Sans-serif;
      font-size: 14px;
      font-weight: 300;
      line-height: 20px;
      letter-spacing: 2px;
      border-style: solid;
      border-width: 1px;
      border-radius: 50px 50px 50px 50px;
      padding: 15px 25px;
      margin-top: 10px;
   }
   .product-item .product-rating {
      margin: 0 33%;
   }
   .product-rating {
      display: flex;
      width: 8%;
   }

   @media (max-width: 599px) {
    #product-filter-form {
        display: block; /* Change to block for smaller screens */
        padding: 10px !important;  /* Add padding for better spacing */
    }

    #product-filter-form select, #product-filter-form input {
      border-radius: 15px;
}
.course-098 button {
   min-width: 300px !important;
}
#product-filter-form select, #product-filter-form input {
    min-width: 300px;
}




.button1 {
    padding: 10px 40px!important;
  
    border-radius: 7px !important;
}

#product-filter-form select, #product-filter-form input {
    padding: 12px !important;
   
}


    .product-list {   
    display: grid ;
    padding: 10px;    
}
.course-098 button {   
    margin-top: 10px;
}
#product-filter-form select, #product-filter-form input {
    margin-bottom: 20px;
}

}



@media (max-width: 768px) and (min-width: 600px) { 
    #product-filter-form {
        display: block; /* Change to block for smaller screens */
        padding: 10px;  /* Add padding for better spacing */
    }

    .product-list {   
    display: grid ;
    grid-template-columns: repeat(2, 1fr);
    padding: 35px;    
}
.course-098 button {   
    margin-top: 10px;
}
#product-filter-form select, #product-filter-form input {
    margin-bottom: 20px;
}

}




</style>

<style>
   .content { display: none; }
   .content.active { display: block; }
   .courses-toggle li { cursor: pointer; display: inline-block; padding: 10px; }
   .courses-toggle .active { font-weight: bold; color: blue; }
</style>

<div class="custom-products-grid">
   <?php echo do_shortcode('[product_info]'); ?>
</div>

<script>
function checkDateSelection() {
   var dropdown = document.getElementById("product_date");
   var selectedValue = dropdown.value;
   if (selectedValue) {
      console.log("product_date");
   } else {
      alert("Please select a date");
   }
}
</script>

<style>
   ul.products.columns-3 { display: none; }
   div#cources-page div#tablePaging { display: none; }
   div#cources-page { display: none !important; }
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
   const priceElements = document.querySelectorAll('.woocommerce-Price-amount.amount');
   priceElements.forEach(function (priceElement) {
      const priceText = priceElement.textContent || priceElement.innerText;
      if (priceText.includes("£0.00")) {
         priceElement.style.visibility = 'hidden';
      }
   });
});
</script>

<?php
get_footer();
?>