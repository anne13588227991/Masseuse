<?php
/**
 * Template Name: Employer Dashboard
 */

get_header();

// Check if user is employer
if (!current_user_can('employer') && !current_user_can('administrator')) {
    echo '<div class="container" style="padding: 60px 20px; text-align: center;">';
    echo '<h2>' . __('Access Denied', 'masseuse-jobs') . '</h2>';
    echo '<p>' . __('You must be an employer to access this page.', 'masseuse-jobs') . '</p>';
    echo '<a href="' . esc_url(home_url('/')) . '" class="apply-btn">' . __('Go Home', 'masseuse-jobs') . '</a>';
    echo '</div>';
    get_footer();
    return;
}

// Handle job submission
if (isset($_POST['submit_job'])) {
    $job_title = sanitize_text_field($_POST['job_title']);
    $job_description = wp_kses_post($_POST['job_description']);
    $job_salary = sanitize_text_field($_POST['job_salary']);
    $job_location = sanitize_text_field($_POST['job_location']);
    $job_company = sanitize_text_field($_POST['job_company']);
    $job_experience = sanitize_text_field($_POST['job_experience']);
    $job_category = intval($_POST['job_category']);
    $job_type = intval($_POST['job_type']);
    
    $post_id = wp_insert_post(array(
        'post_title' => $job_title,
        'post_content' => $job_description,
        'post_status' => 'publish',
        'post_type' => 'job',
        'post_author' => get_current_user_id(),
    ));
    
    if ($post_id && !is_wp_error($post_id)) {
        update_post_meta($post_id, '_job_salary', $job_salary);
        update_post_meta($post_id, '_job_location', $job_location);
        update_post_meta($post_id, '_job_company', $job_company);
        update_post_meta($post_id, '_job_experience', $job_experience);
        
        if ($job_category) {
            wp_set_post_terms($post_id, array($job_category), 'job_category');
        }
        
        if ($job_type) {
            wp_set_post_terms($post_id, array($job_type), 'job_type');
        }
        
        echo '<div style="background: #d1fae5; color: #065f46; padding: 20px; border-radius: 8px; margin-bottom: 30px; text-align: center;">';
        echo '<h3 style="margin-bottom: 10px;">' . __('Job Posted Successfully!', 'masseuse-jobs') . '</h3>';
        echo '<p>' . __('Your job listing is now live.', 'masseuse-jobs') . '</p>';
        echo '</div>';
    }
}

$current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'jobs';
?>

<div class="dashboard-container">
    <div class="dashboard-header">
        <h1 class="dashboard-title"><?php _e('Employer Dashboard', 'masseuse-jobs'); ?></h1>
        <a href="#post-job" class="add-job-btn" onclick="document.getElementById('post-job-tab').click(); return false;"><?php _e('+ Post New Job', 'masseuse-jobs'); ?></a>
    </div>
    
    <!-- Tabs -->
    <div class="dashboard-tabs">
        <button class="tab-btn <?php echo $current_tab === 'jobs' ? 'active' : ''; ?>" onclick="location.href='?tab=jobs'" id="my-jobs-tab"><?php _e('My Jobs', 'masseuse-jobs'); ?></button>
        <button class="tab-btn <?php echo $current_tab === 'post-job' ? 'active' : ''; ?>" onclick="location.href='?tab=post-job'" id="post-job-tab"><?php _e('Post Job', 'masseuse-jobs'); ?></button>
        <button class="tab-btn <?php echo $current_tab === 'profile' ? 'active' : ''; ?>" onclick="location.href='?tab=profile'"><?php _e('Company Profile', 'masseuse-jobs'); ?></button>
    </div>
    
    <!-- Tab Content -->
    <?php if ($current_tab === 'jobs') : ?>
        <div class="jobs-grid">
            <?php
            $args = array(
                'post_type' => 'job',
                'author' => get_current_user_id(),
                'posts_per_page' => -1,
                'post_status' => array('publish', 'pending', 'draft'),
            );
            
            $jobs = new WP_Query($args);
            
            if ($jobs->have_posts()) {
                while ($jobs->have_posts()) {
                    $jobs->the_post();
                    get_template_part('template-parts/content', 'job');
                }
                wp_reset_postdata();
            } else {
                echo '<div style="grid-column: 1/-1; text-align: center; padding: 60px; background: #fff; border-radius: 12px;">';
                echo '<h3 style="margin-bottom: 15px;">' . __('No Jobs Posted Yet', 'masseuse-jobs') . '</h3>';
                echo '<p style="color: #6b7280; margin-bottom: 20px;">' . __('Start by posting your first job listing.', 'masseuse-jobs') . '</p>';
                echo '<a href="?tab=post-job" class="apply-btn">' . __('Post a Job', 'masseuse-jobs') . '</a>';
                echo '</div>';
            }
            ?>
        </div>
        
    <?php elseif ($current_tab === 'post-job') : ?>
        <div class="register-card" style="max-width: 800px;">
            <h2 class="register-title"><?php _e('Post a New Job', 'masseuse-jobs'); ?></h2>
            
            <form method="post" action="">
                <div class="form-group">
                    <label class="form-label" for="job_title"><?php _e('Job Title', 'masseuse-jobs'); ?> *</label>
                    <input type="text" id="job_title" name="job_title" class="form-input" required placeholder="e.g., Senior Massage Therapist" />
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="job_company"><?php _e('Company Name', 'masseuse-jobs'); ?> *</label>
                    <input type="text" id="job_company" name="job_company" class="form-input" required />
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label class="form-label" for="job_salary"><?php _e('Salary Range', 'masseuse-jobs'); ?></label>
                        <input type="text" id="job_salary" name="job_salary" class="form-input" placeholder="e.g., 8000-15000元/月" />
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="job_location"><?php _e('Location', 'masseuse-jobs'); ?></label>
                        <input type="text" id="job_location" name="job_location" class="form-input" placeholder="e.g., 北京市朝阳区" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="job_experience"><?php _e('Experience Required', 'masseuse-jobs'); ?></label>
                    <input type="text" id="job_experience" name="job_experience" class="form-input" placeholder="e.g., 1-3年" />
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label class="form-label" for="job_category"><?php _e('Category', 'masseuse-jobs'); ?></label>
                        <select id="job_category" name="job_category" class="form-select">
                            <option value=""><?php _e('Select category', 'masseuse-jobs'); ?></option>
                            <?php
                            $categories = get_terms(array('taxonomy' => 'job_category', 'hide_empty' => false));
                            if (!empty($categories) && !is_wp_error($categories)) {
                                foreach ($categories as $category) {
                                    echo '<option value="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="job_type"><?php _e('Job Type', 'masseuse-jobs'); ?></label>
                        <select id="job_type" name="job_type" class="form-select">
                            <option value=""><?php _e('Select type', 'masseuse-jobs'); ?></option>
                            <?php
                            $types = get_terms(array('taxonomy' => 'job_type', 'hide_empty' => false));
                            if (!empty($types) && !is_wp_error($types)) {
                                foreach ($types as $type) {
                                    echo '<option value="' . esc_attr($type->term_id) . '">' . esc_html($type->name) . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="job_description"><?php _e('Job Description', 'masseuse-jobs'); ?> *</label>
                    <textarea id="job_description" name="job_description" class="form-textarea" required style="min-height: 200px;"></textarea>
                </div>
                
                <button type="submit" name="submit_job" class="submit-btn"><?php _e('Publish Job', 'masseuse-jobs'); ?></button>
            </form>
        </div>
        
    <?php elseif ($current_tab === 'profile') : ?>
        <div class="register-card" style="max-width: 800px;">
            <h2 class="register-title"><?php _e('Company Profile', 'masseuse-jobs'); ?></h2>
            <p style="text-align: center; color: #6b7280; margin-bottom: 30px;"><?php _e('Manage your company information and settings', 'masseuse-jobs'); ?></p>
            
            <div style="background: #f9fafb; padding: 30px; border-radius: 8px; text-align: center;">
                <p><?php _e('Profile features coming soon...', 'masseuse-jobs'); ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab-btn');
    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
</script>

<?php
get_footer();
