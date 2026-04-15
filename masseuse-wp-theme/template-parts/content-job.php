<?php
/**
 * Template part for displaying job cards
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('job-card'); ?>>
    <div class="job-header">
        <div>
            <h3 class="job-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <p class="job-company">
                <?php 
                $company = get_post_meta(get_the_ID(), '_job_company', true);
                echo esc_html($company ? $company : get_bloginfo('name'));
                ?>
            </p>
        </div>
        
        <?php 
        $salary = get_post_meta(get_the_ID(), '_job_salary', true);
        if ($salary) : ?>
            <span class="job-salary"><?php echo esc_html($salary); ?></span>
        <?php endif; ?>
    </div>
    
    <div class="job-meta">
        <?php 
        $location = get_post_meta(get_the_ID(), '_job_location', true);
        if ($location) : ?>
            <span>📍 <?php echo esc_html($location); ?></span>
        <?php endif; ?>
        
        <?php 
        $experience = get_post_meta(get_the_ID(), '_job_experience', true);
        if ($experience) : ?>
            <span>📋 <?php echo esc_html($experience); ?></span>
        <?php endif; ?>
        
        <?php
        $categories = get_the_terms(get_the_ID(), 'job_category');
        if ($categories && !is_wp_error($categories)) :
            foreach ($categories as $category) : ?>
                <span>🏷️ <?php echo esc_html($category->name); ?></span>
            <?php endforeach;
        endif; ?>
    </div>
    
    <div class="job-description">
        <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
    </div>
    
    <div class="job-footer">
        <?php
        $types = get_the_terms(get_the_ID(), 'job_type');
        if ($types && !is_wp_error($types)) :
            foreach ($types as $type) : ?>
                <span class="job-type"><?php echo esc_html($type->name); ?></span>
            <?php endforeach;
        else : ?>
            <span class="job-type"><?php _e('全职', 'masseuse-jobs'); ?></span>
        <?php endif; ?>
        
        <a href="<?php the_permalink(); ?>" class="btn-apply"><?php _e('申请职位', 'masseuse-jobs'); ?></a>
    </div>
</article>
