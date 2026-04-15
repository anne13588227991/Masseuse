<?php
/**
 * Template Name: Front Page
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1 class="hero-title"><?php _e('Find Your Perfect Massage & Spa Job', 'masseuse-jobs'); ?></h1>
        <p class="hero-subtitle"><?php _e('Connect with top spas, wellness centers, and massage clinics hiring now', 'masseuse-jobs'); ?></p>
        
        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/jobs')); ?>">
            <input type="search" class="search-input" placeholder="<?php _e('Search jobs by keyword, location...', 'masseuse-jobs'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit" class="search-button"><?php _e('Search Jobs', 'masseuse-jobs'); ?></button>
        </form>
    </div>
</section>

<!-- Categories Section -->
<section class="categories-section">
    <div class="container">
        <h2 class="section-title"><?php _e('Browse by Category', 'masseuse-jobs'); ?></h2>
        <?php echo do_shortcode('[job_categories]'); ?>
    </div>
</section>

<!-- Latest Jobs Section -->
<section class="jobs-section">
    <div class="container">
        <h2 class="section-title"><?php _e('Latest Job Openings', 'masseuse-jobs'); ?></h2>
        <?php echo do_shortcode('[job_listings limit="6"]'); ?>
        
        <div style="text-align: center; margin-top: 40px;">
            <a href="<?php echo esc_url(get_post_type_archive_link('job')); ?>" class="apply-btn" style="display: inline-block; padding: 15px 40px; font-size: 18px;"><?php _e('View All Jobs', 'masseuse-jobs'); ?></a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <h2 class="section-title"><?php _e('Why Choose Us', 'masseuse-jobs'); ?></h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3 class="feature-title"><?php _e('Targeted Jobs', 'masseuse-jobs'); ?></h3>
                <p class="feature-desc"><?php _e('Specialized positions for massage therapists, spa technicians, and foot bath specialists only.', 'masseuse-jobs'); ?></p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3 class="feature-title"><?php _e('Quick Application', 'masseuse-jobs'); ?></h3>
                <p class="feature-desc"><?php _e('Simple and fast application process. Get hired faster with our streamlined system.', 'masseuse-jobs'); ?></p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3 class="feature-title"><?php _e('Verified Employers', 'masseuse-jobs'); ?></h3>
                <p class="feature-desc"><?php _e('All employers are verified to ensure safe and legitimate job opportunities.', 'masseuse-jobs'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2 class="cta-title"><?php _e('Ready to Start Your Journey?', 'masseuse-jobs'); ?></h2>
        <p class="cta-desc"><?php _e('Join thousands of massage professionals finding their dream jobs today', 'masseuse-jobs'); ?></p>
        <div class="cta-buttons">
            <a href="<?php echo esc_url(home_url('/register')); ?>" class="cta-btn-primary"><?php _e('Register as Therapist', 'masseuse-jobs'); ?></a>
            <a href="<?php echo esc_url(home_url('/employer-dashboard')); ?>" class="cta-btn-secondary"><?php _e('Post a Job', 'masseuse-jobs'); ?></a>
        </div>
    </div>
</section>

<?php
get_footer();
