<?php
/**
 * Masseuse Jobs Theme Functions
 */

if (!defined('ABSPATH')) {
    exit;
}

// 主题设置
function masseuse_jobs_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    register_nav_menus(array(
        'primary' => __('主菜单', 'masseuse-jobs'),
        'footer' => __('页脚菜单', 'masseuse-jobs'),
    ));
    
    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'masseuse_jobs_setup');

// 引入样式和脚本
function masseuse_jobs_scripts() {
    wp_enqueue_style('masseuse-jobs-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_script('masseuse-jobs-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'masseuse_jobs_scripts');

// 注册自定义职位类型
function masseuse_jobs_register_post_type() {
    $labels = array(
        'name' => __('职位', 'masseuse-jobs'),
        'singular_name' => __('职位', 'masseuse-jobs'),
        'menu_name' => __('职位管理', 'masseuse-jobs'),
        'add_new' => __('添加职位', 'masseuse-jobs'),
        'add_new_item' => __('添加新职位', 'masseuse-jobs'),
        'edit_item' => __('编辑职位', 'masseuse-jobs'),
        'new_item' => __('新职位', 'masseuse-jobs'),
        'view_item' => __('查看职位', 'masseuse-jobs'),
        'search_items' => __('搜索职位', 'masseuse-jobs'),
        'not_found' => __('未找到职位', 'masseuse-jobs'),
        'not_found_in_trash' => __('回收站中没有职位', 'masseuse-jobs'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'jobs'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-businessman',
        'show_in_rest' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
    );

    register_post_type('job', $args);
}
add_action('init', 'masseuse_jobs_register_post_type');

// 注册职位分类法
function masseuse_jobs_register_taxonomy() {
    // 职位类别（按摩、SPA、足浴等）
    $category_labels = array(
        'name' => __('职位类别', 'masseuse-jobs'),
        'singular_name' => __('职位类别', 'masseuse-jobs'),
        'search_items' => __('搜索类别', 'masseuse-jobs'),
        'all_items' => __('所有类别', 'masseuse-jobs'),
        'edit_item' => __('编辑类别', 'masseuse-jobs'),
        'update_item' => __('更新类别', 'masseuse-jobs'),
        'add_new_item' => __('添加新类别', 'masseuse-jobs'),
        'new_item_name' => __('新类别名称', 'masseuse-jobs'),
        'menu_name' => __('类别', 'masseuse-jobs'),
    );

    register_taxonomy('job_category', 'job', array(
        'labels' => $category_labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'job-category'),
        'show_in_rest' => true,
    ));

    // 职位类型（全职、兼职等）
    $type_labels = array(
        'name' => __('职位类型', 'masseuse-jobs'),
        'singular_name' => __('职位类型', 'masseuse-jobs'),
        'search_items' => __('搜索类型', 'masseuse-jobs'),
        'all_items' => __('所有类型', 'masseuse-jobs'),
        'edit_item' => __('编辑类型', 'masseuse-jobs'),
        'update_item' => __('更新类型', 'masseuse-jobs'),
        'add_new_item' => __('添加新类型', 'masseuse-jobs'),
        'new_item_name' => __('新类型名称', 'masseuse-jobs'),
        'menu_name' => __('类型', 'masseuse-jobs'),
    );

    register_taxonomy('job_type', 'job', array(
        'labels' => $type_labels,
        'hierarchical' => false,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'job-type'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'masseuse_jobs_register_taxonomy');

// 添加职位元数据框
function masseuse_jobs_add_meta_boxes() {
    add_meta_box(
        'job_details',
        __('职位详情', 'masseuse-jobs'),
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
    $contact_email = get_post_meta($post->ID, '_job_contact_email', true);
    $contact_phone = get_post_meta($post->ID, '_job_contact_phone', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="job_salary"><?php _e('薪资范围', 'masseuse-jobs'); ?></label></th>
            <td><input type="text" id="job_salary" name="job_salary" value="<?php echo esc_attr($salary); ?>" class="regular-text" placeholder="例如：8000-15000 元/月"></td>
        </tr>
        <tr>
            <th><label for="job_location"><?php _e('工作地点', 'masseuse-jobs'); ?></label></th>
            <td><input type="text" id="job_location" name="job_location" value="<?php echo esc_attr($location); ?>" class="regular-text" placeholder="例如：北京市朝阳区"></td>
        </tr>
        <tr>
            <th><label for="job_company"><?php _e('公司名称', 'masseuse-jobs'); ?></label></th>
            <td><input type="text" id="job_company" name="job_company" value="<?php echo esc_attr($company); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="job_experience"><?php _e('经验要求', 'masseuse-jobs'); ?></label></th>
            <td>
                <select id="job_experience" name="job_experience">
                    <option value=""><?php _e('不限', 'masseuse-jobs'); ?></option>
                    <option value="应届生" <?php selected($experience, '应届生'); ?>><?php _e('应届生', 'masseuse-jobs'); ?></option>
                    <option value="1 年以下" <?php selected($experience, '1 年以下'); ?>><?php _e('1 年以下', 'masseuse-jobs'); ?></option>
                    <option value="1-3 年" <?php selected($experience, '1-3 年'); ?>><?php _e('1-3 年', 'masseuse-jobs'); ?></option>
                    <option value="3-5 年" <?php selected($experience, '3-5 年'); ?>><?php _e('3-5 年', 'masseuse-jobs'); ?></option>
                    <option value="5 年以上" <?php selected($experience, '5 年以上'); ?>><?php _e('5 年以上', 'masseuse-jobs'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="job_contact_email"><?php _e('联系邮箱', 'masseuse-jobs'); ?></label></th>
            <td><input type="email" id="job_contact_email" name="job_contact_email" value="<?php echo esc_attr($contact_email); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="job_contact_phone"><?php _e('联系电话', 'masseuse-jobs'); ?></label></th>
            <td><input type="tel" id="job_contact_phone" name="job_contact_phone" value="<?php echo esc_attr($contact_phone); ?>" class="regular-text"></td>
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
    
    if (isset($_POST['job_contact_email'])) {
        update_post_meta($post_id, '_job_contact_email', sanitize_email($_POST['job_contact_email']));
    }
    
    if (isset($_POST['job_contact_phone'])) {
        update_post_meta($post_id, '_job_contact_phone', sanitize_text_field($_POST['job_contact_phone']));
    }
}
add_action('save_post_job', 'masseuse_jobs_save_job_details');

// 注册自定义用户角色
function masseuse_jobs_add_roles() {
    // 雇主角色
    add_role('employer', __('雇主', 'masseuse-jobs'), array(
        'read' => true,
        'edit_posts' => true,
        'delete_posts' => true,
        'upload_files' => true,
    ));
    
    // 技师角色
    add_role('masseuse', __('技师', 'masseuse-jobs'), array(
        'read' => true,
        'edit_posts' => false,
        'delete_posts' => false,
    ));
}
add_action('init', 'masseuse_jobs_add_roles');

// 短代码：职位列表
function masseuse_jobs_listings_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => '',
        'type' => '',
        'limit' => 6,
    ), $atts);
    
    $args = array(
        'post_type' => 'job',
        'posts_per_page' => intval($atts['limit']),
        'post_status' => 'publish',
    );
    
    if ($atts['category']) {
        $args['tax_query'][] = array(
            'taxonomy' => 'job_category',
            'field' => 'slug',
            'terms' => $atts['category'],
        );
    }
    
    if ($atts['type']) {
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
        echo '<p>' . __('暂无职位', 'masseuse-jobs') . '</p>';
    }
    
    return ob_get_clean();
}
add_shortcode('job_listings', 'masseuse_jobs_listings_shortcode');

// 短代码：职位类别
function masseuse_jobs_categories_shortcode($atts) {
    $categories = get_terms(array(
        'taxonomy' => 'job_category',
        'hide_empty' => true,
    ));
    
    ob_start();
    echo '<div class="categories-grid">';
    foreach ($categories as $category) {
        $count = $category->count;
        $icon = '💆';
        if (strpos($category->name, 'SPA') !== false) {
            $icon = '🧖';
        } elseif (strpos($category->name, '足浴') !== false || strpos($category->name, '足疗') !== false) {
            $icon = '🦶';
        }
        
        echo '<a href="' . esc_url(get_term_link($category)) . '" class="category-card">';
        echo '<div class="category-icon">' . $icon . '</div>';
        echo '<h3>' . esc_html($category->name) . '</h3>';
        echo '<span class="category-count">' . sprintf(_n('%d 个职位', '%d 个职位', $count, 'masseuse-jobs'), $count) . '</span>';
        echo '</a>';
    }
    echo '</div>';
    
    return ob_get_clean();
}
add_shortcode('job_categories', 'masseuse_jobs_categories_shortcode');

// 小工具区域
function masseuse_jobs_widgets_init() {
    register_sidebar(array(
        'name' => __('侧边栏', 'masseuse-jobs'),
        'id' => 'sidebar-1',
        'description' => __('添加到侧边栏的小工具', 'masseuse-jobs'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'masseuse_jobs_widgets_init');
