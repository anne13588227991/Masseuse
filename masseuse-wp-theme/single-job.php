<?php
/**
 * Single Job template
 */

get_header();
?>

<div class="single-job-container">
    <?php while (have_posts()) : the_post(); ?>
        
        <div class="job-detail-card">
            <div class="job-detail-header">
                <h1 class="job-detail-title"><?php the_title(); ?></h1>
                <p class="job-detail-company">
                    <?php 
                    $company = get_post_meta(get_the_ID(), '_job_company', true);
                    echo esc_html($company ? $company : __('Company', 'masseuse-jobs'));
                    ?>
                </p>
                
                <div class="job-detail-meta">
                    <?php 
                    $salary = get_post_meta(get_the_ID(), '_job_salary', true);
                    if ($salary) : ?>
                        <div class="job-meta-item">
                            <span>💰</span>
                            <span><?php echo esc_html($salary); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php 
                    $location = get_post_meta(get_the_ID(), '_job_location', true);
                    if ($location) : ?>
                        <div class="job-meta-item">
                            <span>📍</span>
                            <span><?php echo esc_html($location); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php 
                    $experience = get_post_meta(get_the_ID(), '_job_experience', true);
                    if ($experience) : ?>
                        <div class="job-meta-item">
                            <span>💼</span>
                            <span><?php echo esc_html($experience); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php
                    $job_types = get_the_terms(get_the_ID(), 'job_type');
                    if ($job_types && !is_wp_error($job_types)) :
                        foreach ($job_types as $type) : ?>
                            <div class="job-meta-item">
                                <span>📋</span>
                                <span><?php echo esc_html($type->name); ?></span>
                            </div>
                        <?php endforeach;
                    endif; ?>
                </div>
            </div>
            
            <div class="job-detail-section">
                <h3><?php _e('Job Description', 'masseuse-jobs'); ?></h3>
                <div><?php the_content(); ?></div>
            </div>
            
            <?php
            $categories = get_the_terms(get_the_ID(), 'job_category');
            if ($categories && !is_wp_error($categories)) : ?>
                <div class="job-detail-section">
                    <h3><?php _e('Category', 'masseuse-jobs'); ?></h3>
                    <div class="job-tags">
                        <?php foreach ($categories as $category) : ?>
                            <span class="job-tag"><?php echo esc_html($category->name); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="job-footer" style="margin-top: 40px; padding-top: 30px; border-top: 2px solid #e5e7eb;">
                <div>
                    <p style="color: #6b7280; margin-bottom: 5px;"><?php _e('Posted on', 'masseuse-jobs'); ?>:</p>
                    <p style="font-weight: 600;"><?php echo get_the_date(); ?></p>
                </div>
                <div>
                    <a href="mailto:<?php echo esc_attr(get_option('admin_email')); ?>?subject=<?php echo urlencode('Application for: ' . get_the_title()); ?>" class="apply-btn" style="display: inline-block; padding: 15px 40px; font-size: 18px;"><?php _e('Apply Now', 'masseuse-jobs'); ?></a>
                </div>
            </div>
        </div>
        
    <?php endwhile; ?>
</div>

<?php
get_footer();
