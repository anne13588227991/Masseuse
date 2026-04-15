<?php
/**
 * Masseuse Jobs Theme Functions
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme Setup
function masseuse_jobs_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'masseuse-jobs'),
        'footer' => __('Footer Menu', 'masseuse-jobs'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'masseuse_jobs_setup');

// Enqueue scripts and styles
function masseuse_jobs_scripts() {
    wp_enqueue_style('masseuse-jobs-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_script('masseuse-jobs-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'masseuse_jobs_scripts');

// Register Custom Post Type: Job
function masseuse_jobs_register_job_post_type() {
    $labels = array(
        'name' => __('Jobs', 'masseuse-jobs'),
        'singular_name' => __('Job', 'masseuse-jobs'),
        'menu_name' => __('Jobs', 'masseuse-jobs'),
        'add_new' => __('Add New', 'masseuse-jobs'),
        'add_new_item' => __('Add New Job', 'masseuse-jobs'),
        'edit_item' => __('Edit Job', 'masseuse-jobs'),
        'new_item' => __('New Job', 'masseuse-jobs'),
        'view_item' => __('View Job', 'masseuse-jobs'),
        'search_items' => __('Search Jobs', 'masseuse-jobs'),
        'not_found' => __('No jobs found', 'masseuse-jobs'),
        'not_found_in_trash' => __('No jobs found in trash', 'masseuse-jobs'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'jobs'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-businessman',
        'show_in_rest' => true,
    );

    register_post_type('job', $args);
}
add_action('init', 'masseuse_jobs_register_job_post_type');

// Register Taxonomies for Job
function masseuse_jobs_register_job_taxonomies() {
    // Job Category (按摩、SPA、足浴)
    $category_labels = array(
        'name' => __('Job Categories', 'masseuse-jobs'),
        'singular_name' => __('Job Category', 'masseuse-jobs'),
        'search_items' => __('Search Categories', 'masseuse-jobs'),
        'all_items' => __('All Categories', 'masseuse-jobs'),
        'edit_item' => __('Edit Category', 'masseuse-jobs'),
        'update_item' => __('Update Category', 'masseuse-jobs'),
        'add_new_item' => __('Add New Category', 'masseuse-jobs'),
        'new_item_name' => __('New Category Name', 'masseuse-jobs'),
    );

    register_taxonomy('job_category', 'job', array(
        'labels' => $category_labels,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'job-category'),
        'show_in_rest' => true,
    ));

    // Job Type (全职、兼职)
    $type_labels = array(
        'name' => __('Job Types', 'masseuse-jobs'),
        'singular_name' => __('Job Type', 'masseuse-jobs'),
        'search_items' => __('Search Types', 'masseuse-jobs'),
        'all_items' => __('All Types', 'masseuse-jobs'),
        'edit_item' => __('Edit Type', 'masseuse-jobs'),
        'update_item' => __('Update Type', 'masseuse-jobs'),
        'add_new_item' => __('Add New Type', 'masseuse-jobs'),
        'new_item_name' => __('New Type Name', 'masseuse-jobs'),
    );

    register_taxonomy('job_type', 'job', array(
        'labels' => $type_labels,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'job-type'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'masseuse_jobs_register_job_taxonomies');

// Add Custom Meta Boxes for Job
function masseuse_jobs_add_meta_boxes() {
    add_meta_box(
        'job_details',
        __('Job Details', 'masseuse-jobs'),
        'masseuse_jobs_job_details_callback',
        'job',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'masseuse_jobs_add_meta_boxes');

function masseuse_jobs_job_details_callback($post) {
    wp_nonce_field('masseuse_jobs_save_job_details', 'masseuse_jobs_job_details_nonce');

    $salary = get_post_meta($post->ID, '_job_salary', true);
    $location = get_post_meta($post->ID, '_job_location', true);
    $company = get_post_meta($post->ID, '_job_company', true);
    $experience = get_post_meta($post->ID, '_job_experience', true);

    ?>
    <table class="form-table">
        <tr>
            <th><label for="job_salary"><?php _e('Salary Range', 'masseuse-jobs'); ?></label></th>
            <td><input type="text" id="job_salary" name="job_salary" value="<?php echo esc_attr($salary); ?>" class="regular-text" placeholder="e.g., 8000-15000元/月"></td>
        </tr>
        <tr>
            <th><label for="job_location"><?php _e('Location', 'masseuse-jobs'); ?></label></th>
            <td><input type="text" id="job_location" name="job_location" value="<?php echo esc_attr($location); ?>" class="regular-text" placeholder="e.g., 北京市朝阳区"></td>
        </tr>
        <tr>
            <th><label for="job_company"><?php _e('Company Name', 'masseuse-jobs'); ?></label></th>
            <td><input type="text" id="job_company" name="job_company" value="<?php echo esc_attr($company); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="job_experience"><?php _e('Experience Required', 'masseuse-jobs'); ?></label></th>
            <td><input type="text" id="job_experience" name="job_experience" value="<?php echo esc_attr($experience); ?>" class="regular-text" placeholder="e.g., 1-3年"></td>
        </tr>
    </table>
    <?php
}

function masseuse_jobs_save_job_details($post_id) {
    if (!isset($_POST['masseuse_jobs_job_details_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['masseuse_jobs_job_details_nonce'], 'masseuse_jobs_save_job_details')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['job_salary'])) {
        update_post_meta($post_id, '_job_salary', sanitize_text_field($_POST['job_salary']));
    }

    if (isset($_POST['job_location'])) {
        update_post_meta($post_id, '_job_location', sanitize_text_field($_POST['job_location']));
    }

    if (isset($_POST['job_company'])) {
        update_post_meta($post_id, '_job_company', sanitize_text_field($_POST['job_company']));
    }

    if (isset($_POST['job_experience'])) {
        update_post_meta($post_id, '_job_experience', sanitize_text_field($_POST['job_experience']));
    }
}
add_action('save_post_job', 'masseuse_jobs_save_job_details');

// Register User Roles
function masseuse_jobs_add_custom_roles() {
    // Employer Role
    add_role(
        'employer',
        __('Employer', 'masseuse-jobs'),
        array(
            'read' => true,
            'edit_posts' => true,
            'delete_posts' => true,
            'publish_posts' => true,
            'upload_files' => true,
        )
    );

    // Masseuse Role
    add_role(
        'masseuse',
        __('Masseuse', 'masseuse-jobs'),
        array(
            'read' => true,
            'edit_posts' => false,
            'delete_posts' => false,
        )
    );
}
register_activation_hook(__FILE__, 'masseuse_jobs_add_custom_roles');

// Shortcode: Job Listings
function masseuse_jobs_job_listings_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => '',
        'type' => '',
        'limit' => -1,
    ), $atts);

    $args = array(
        'post_type' => 'job',
        'posts_per_page' => intval($atts['limit']),
        'post_status' => 'publish',
    );

    if (!empty($atts['category'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'job_category',
            'field' => 'slug',
            'terms' => $atts['category'],
        );
    }

    if (!empty($atts['type'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'job_type',
            'field' => 'slug',
            'terms' => $atts['type'],
        );
    }

    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) {
        echo '<div class="jobs-grid">';
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content', 'job');
        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo '<p>' . __('No jobs found.', 'masseuse-jobs') . '</p>';
    }
    return ob_get_clean();
}
add_shortcode('job_listings', 'masseuse_jobs_job_listings_shortcode');

// Shortcode: Job Categories
function masseuse_jobs_job_categories_shortcode() {
    $categories = get_terms(array(
        'taxonomy' => 'job_category',
        'hide_empty' => true,
    ));

    ob_start();
    if (!empty($categories) && !is_wp_error($categories)) {
        echo '<div class="categories-grid">';
        foreach ($categories as $category) {
            $count = $category->count;
            $icon = '';
            if ($category->slug === 'massage') {
                $icon = '💆';
            } elseif ($category->slug === 'spa') {
                $icon = '🧖';
            } elseif ($category->slug === 'foot-bath') {
                $icon = '🦶';
            } else {
                $icon = '💼';
            }
            ?>
            <a href="<?php echo esc_url(get_term_link($category)); ?>" class="category-card">
                <div class="category-icon"><?php echo $icon; ?></div>
                <h3 class="category-title"><?php echo esc_html($category->name); ?></h3>
                <p class="category-count"><?php printf(_n('%d position', '%d positions', $count, 'masseuse-jobs'), $count); ?></p>
            </a>
            <?php
        }
        echo '</div>';
    }
    return ob_get_clean();
}
add_shortcode('job_categories', 'masseuse_jobs_job_categories_shortcode');

// Widget: Latest Jobs
class Masseuse_Jobs_Latest_Jobs_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'masseuse_jobs_latest_jobs',
            __('Latest Jobs', 'masseuse-jobs'),
            array('description' => __('Display latest job listings', 'masseuse-jobs'))
        );
    }

    public function widget($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Latest Jobs', 'masseuse-jobs');
        $number = !empty($instance['number']) ? intval($instance['number']) : 5;

        $query = new WP_Query(array(
            'post_type' => 'job',
            'posts_per_page' => $number,
            'post_status' => 'publish',
        ));

        echo $args['before_widget'];
        echo $args['before_title'] . $title . $args['after_title'];

        if ($query->have_posts()) {
            echo '<ul>';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
            wp_reset_postdata();
        }

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $number = !empty($instance['number']) ? intval($instance['number']) : 5;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of jobs to show:'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" value="<?php echo esc_attr($number); ?>" min="1" max="20">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['number'] = intval($new_instance['number']);
        return $instance;
    }
}

function masseuse_jobs_register_widgets() {
    register_widget('Masseuse_Jobs_Latest_Jobs_Widget');
}
add_action('widgets_init', 'masseuse_jobs_register_widgets');
