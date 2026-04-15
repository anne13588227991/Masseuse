<?php
/**
 * Template Name: 职位列表页
 */

get_header();
?>

<div class="archive-header">
    <div class="container">
        <h1><?php _e('全部职位', 'masseuse-jobs'); ?></h1>
    </div>
</div>

<div class="container">
    <div class="filter-bar">
        <form method="get" action="<?php echo esc_url(get_post_type_archive_link('job')); ?>">
            <input type="text" name="s" placeholder="<?php _e('搜索职位...', 'masseuse-jobs'); ?>" value="<?php echo get_search_query(); ?>" />
            
            <select name="job_category">
                <option value=""><?php _e('所有类别', 'masseuse-jobs'); ?></option>
                <?php
                $categories = get_terms(array(
                    'taxonomy' => 'job_category',
                    'hide_empty' => true,
                ));
                if ($categories && !is_wp_error($categories)) {
                    foreach ($categories as $category) {
                        $selected = (isset($_GET['job_category']) && $_GET['job_category'] == $category->slug) ? 'selected' : '';
                        echo '<option value="' . esc_attr($category->slug) . '" ' . $selected . '>' . esc_html($category->name) . '</option>';
                    }
                }
                ?>
            </select>
            
            <button type="submit"><?php _e('筛选', 'masseuse-jobs'); ?></button>
        </form>
    </div>

    <?php
    $args = array(
        'post_type' => 'job',
        'posts_per_page' => 12,
        'post_status' => 'publish',
    );
    
    $jobs = new WP_Query($args);
    
    if ($jobs->have_posts()) : ?>
        <div class="jobs-grid">
            <?php while ($jobs->have_posts()) : $jobs->the_post(); ?>
                <?php get_template_part('template-parts/content', 'job'); ?>
            <?php endwhile; ?>
        </div>
        
        <div style="text-align: center; margin-top: 40px;">
            <a href="<?php echo esc_url(get_post_type_archive_link('job')); ?>" class="btn-primary"><?php _e('查看更多职位', 'masseuse-jobs'); ?></a>
        </div>
    <?php else : ?>
        <p><?php _e('暂无职位信息', 'masseuse-jobs'); ?></p>
    <?php endif; wp_reset_postdata(); ?>
</div>

<?php
get_footer();
