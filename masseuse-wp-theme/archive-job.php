<?php
/**
 * Archive template for Job post type
 */

get_header();
?>

<div class="container" style="padding: 40px 20px;">
    <h1 class="section-title"><?php _e('Job Listings', 'masseuse-jobs'); ?></h1>
    
    <!-- Search & Filter Form -->
    <div style="background: #fff; padding: 30px; border-radius: 12px; margin-bottom: 40px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        <form method="get" action="<?php echo esc_url(get_post_type_archive_link('job')); ?>" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: 600;"><?php _e('Keywords', 'masseuse-jobs'); ?></label>
                <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php _e('Search...', 'masseuse-jobs'); ?>" class="form-input" />
            </div>
            
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: 600;"><?php _e('Category', 'masseuse-jobs'); ?></label>
                <select name="job_category" class="form-select">
                    <option value=""><?php _e('All Categories', 'masseuse-jobs'); ?></option>
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'job_category',
                        'hide_empty' => true,
                    ));
                    if (!empty($categories) && !is_wp_error($categories)) {
                        foreach ($categories as $category) {
                            $selected = (isset($_GET['job_category']) && $_GET['job_category'] == $category->slug) ? 'selected' : '';
                            echo '<option value="' . esc_attr($category->slug) . '" ' . $selected . '>' . esc_html($category->name) . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: 600;"><?php _e('Job Type', 'masseuse-jobs'); ?></label>
                <select name="job_type" class="form-select">
                    <option value=""><?php _e('All Types', 'masseuse-jobs'); ?></option>
                    <?php
                    $types = get_terms(array(
                        'taxonomy' => 'job_type',
                        'hide_empty' => true,
                    ));
                    if (!empty($types) && !is_wp_error($types)) {
                        foreach ($types as $type) {
                            $selected = (isset($_GET['job_type']) && $_GET['job_type'] == $type->slug) ? 'selected' : '';
                            echo '<option value="' . esc_attr($type->slug) . '" ' . $selected . '>' . esc_html($type->name) . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            
            <div style="display: flex; align-items: flex-end;">
                <button type="submit" class="search-button" style="width: 100%;"><?php _e('Filter', 'masseuse-jobs'); ?></button>
            </div>
        </form>
    </div>
    
    <!-- Job Listings -->
    <?php if (have_posts()) : ?>
        <div class="jobs-grid">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'job'); ?>
            <?php endwhile; ?>
        </div>
        
        <!-- Pagination -->
        <div style="margin-top: 40px; text-align: center;">
            <?php
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('Previous', 'masseuse-jobs'),
                'next_text' => __('Next', 'masseuse-jobs'),
            ));
            ?>
        </div>
    <?php else : ?>
        <div style="text-align: center; padding: 60px 20px; background: #fff; border-radius: 12px;">
            <h2 style="font-size: 24px; margin-bottom: 15px;"><?php _e('No Jobs Found', 'masseuse-jobs'); ?></h2>
            <p style="color: #6b7280; margin-bottom: 30px;"><?php _e('Try adjusting your search or filter criteria', 'masseuse-jobs'); ?></p>
            <a href="<?php echo esc_url(get_post_type_archive_link('job')); ?>" class="apply-btn"><?php _e('View All Jobs', 'masseuse-jobs'); ?></a>
        </div>
    <?php endif; ?>
</div>

<?php
get_footer();
