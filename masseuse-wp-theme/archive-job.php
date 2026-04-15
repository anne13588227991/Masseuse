<?php
/**
 * Template for displaying job archive pages
 */

get_header();
?>

<div class="archive-header">
    <div class="container">
        <h1><?php _e('职位列表', 'masseuse-jobs'); ?></h1>
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
            
            <select name="job_type">
                <option value=""><?php _e('所有类型', 'masseuse-jobs'); ?></option>
                <?php
                $types = get_terms(array(
                    'taxonomy' => 'job_type',
                    'hide_empty' => true,
                ));
                if ($types && !is_wp_error($types)) {
                    foreach ($types as $type) {
                        $selected = (isset($_GET['job_type']) && $_GET['job_type'] == $type->slug) ? 'selected' : '';
                        echo '<option value="' . esc_attr($type->slug) . '" ' . $selected . '>' . esc_html($type->name) . '</option>';
                    }
                }
                ?>
            </select>
            
            <button type="submit"><?php _e('筛选', 'masseuse-jobs'); ?></button>
        </form>
    </div>

    <?php if (have_posts()) : ?>
        <div class="jobs-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'job'); ?>
            <?php endwhile; ?>
        </div>
        
        <div class="pagination">
            <?php
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('上一页', 'masseuse-jobs'),
                'next_text' => __('下一页', 'masseuse-jobs'),
            ));
            ?>
        </div>
    <?php else : ?>
        <p><?php _e('暂无职位信息', 'masseuse-jobs'); ?></p>
    <?php endif; ?>
</div>

<?php
get_footer();
