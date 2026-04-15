<?php
/**
 * Template part for displaying job cards
 */

$job_id = get_the_ID();
$salary = get_post_meta($job_id, '_job_salary', true);
$location = get_post_meta($job_id, '_job_location', true);
$company = get_post_meta($job_id, '_job_company', true);
$experience = get_post_meta($job_id, '_job_experience', true);
?>

<article class="job-card">
    <div class="job-header">
        <div>
            <h2 class="job-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <p class="job-company">
                <?php echo esc_html($company ? $company : __('Company', 'masseuse-jobs')); ?>
            </p>
        </div>
        <?php if ($salary) : ?>
            <span class="job-salary"><?php echo esc_html($salary); ?></span>
        <?php endif; ?>
    </div>
    
    <div class="job-meta">
        <?php if ($location) : ?>
            <div class="job-meta-item">
                <span>📍</span>
                <span><?php echo esc_html($location); ?></span>
            </div>
        <?php endif; ?>
        
        <?php if ($experience) : ?>
            <div class="job-meta-item">
                <span>💼</span>
                <span><?php echo esc_html($experience); ?></span>
            </div>
        <?php endif; ?>
        
        <?php
        $job_types = get_the_terms($job_id, 'job_type');
        if ($job_types && !is_wp_error($job_types)) :
            foreach ($job_types as $type) : ?>
                <div class="job-meta-item">
                    <span>📋</span>
                    <span><?php echo esc_html($type->name); ?></span>
                </div>
            <?php endforeach;
        endif; ?>
    </div>
    
    <?php
    $categories = get_the_terms($job_id, 'job_category');
    if ($categories && !is_wp_error($categories)) : ?>
        <div class="job-tags">
            <?php foreach ($categories as $category) : ?>
                <span class="job-tag"><?php echo esc_html($category->name); ?></span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <div class="job-footer">
        <span class="job-location">
            <?php echo sprintf(__('Posted %s ago', 'masseuse-jobs'), human_time_diff(get_the_time('U'), current_time('timestamp'))); ?>
        </span>
        <a href="<?php the_permalink(); ?>" class="apply-btn"><?php _e('Apply Now', 'masseuse-jobs'); ?></a>
    </div>
</article>
