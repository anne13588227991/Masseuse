<?php
/**
 * Template Name: Register Page
 */

get_header();

// Handle form submission
if (isset($_POST['masseuse_register_submit'])) {
    $errors = array();
    
    $username = sanitize_text_field($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $full_name = sanitize_text_field($_POST['full_name']);
    $phone = sanitize_text_field($_POST['phone']);
    $experience = sanitize_text_field($_POST['experience']);
    $skills = sanitize_textarea_field($_POST['skills']);
    
    if (empty($username)) {
        $errors[] = __('Username is required', 'masseuse-jobs');
    }
    
    if (empty($email) || !is_email($email)) {
        $errors[] = __('Valid email is required', 'masseuse-jobs');
    }
    
    if (empty($password) || strlen($password) < 6) {
        $errors[] = __('Password must be at least 6 characters', 'masseuse-jobs');
    }
    
    if (empty($full_name)) {
        $errors[] = __('Full name is required', 'masseuse-jobs');
    }
    
    if (empty($errors)) {
        $user_id = wp_create_user($username, $password, $email);
        
        if (!is_wp_error($user_id)) {
            wp_update_user(array(
                'ID' => $user_id,
                'display_name' => $full_name,
                'first_name' => $full_name,
            ));
            
            update_user_meta($user_id, 'phone', $phone);
            update_user_meta($user_id, 'experience', $experience);
            update_user_meta($user_id, 'skills', $skills);
            
            $user = new WP_User($user_id);
            $user->set_role('masseuse');
            
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);
            
            echo '<div style="background: #d1fae5; color: #065f46; padding: 20px; border-radius: 8px; margin-bottom: 30px; text-align: center;">';
            echo '<h3 style="margin-bottom: 10px;">' . __('Registration Successful!', 'masseuse-jobs') . '</h3>';
            echo '<p>' . __('Welcome! You can now browse and apply for jobs.', 'masseuse-jobs') . '</p>';
            echo '</div>';
        } else {
            $errors[] = $user_id->get_error_message();
        }
    }
    
    if (!empty($errors)) {
        echo '<div style="background: #fee2e2; color: #991b1b; padding: 20px; border-radius: 8px; margin-bottom: 30px;">';
        foreach ($errors as $error) {
            echo '<p>• ' . esc_html($error) . '</p>';
        }
        echo '</div>';
    }
}
?>

<div class="register-container">
    <div class="register-card">
        <h1 class="register-title"><?php _e('Therapist Registration', 'masseuse-jobs'); ?></h1>
        
        <form method="post" action="">
            <div class="form-group">
                <label class="form-label" for="username"><?php _e('Username', 'masseuse-jobs'); ?> *</label>
                <input type="text" id="username" name="username" class="form-input" required />
            </div>
            
            <div class="form-group">
                <label class="form-label" for="email"><?php _e('Email Address', 'masseuse-jobs'); ?> *</label>
                <input type="email" id="email" name="email" class="form-input" required />
            </div>
            
            <div class="form-group">
                <label class="form-label" for="password"><?php _e('Password', 'masseuse-jobs'); ?> *</label>
                <input type="password" id="password" name="password" class="form-input" required minlength="6" />
            </div>
            
            <div class="form-group">
                <label class="form-label" for="full_name"><?php _e('Full Name', 'masseuse-jobs'); ?> *</label>
                <input type="text" id="full_name" name="full_name" class="form-input" required />
            </div>
            
            <div class="form-group">
                <label class="form-label" for="phone"><?php _e('Phone Number', 'masseuse-jobs'); ?></label>
                <input type="tel" id="phone" name="phone" class="form-input" placeholder="e.g., 13800138000" />
            </div>
            
            <div class="form-group">
                <label class="form-label" for="experience"><?php _e('Years of Experience', 'masseuse-jobs'); ?></label>
                <select id="experience" name="experience" class="form-select">
                    <option value=""><?php _e('Select experience', 'masseuse-jobs'); ?></option>
                    <option value="fresh"><?php _e('Fresh Graduate', 'masseuse-jobs'); ?></option>
                    <option value="1-2"><?php _e('1-2 years', 'masseuse-jobs'); ?></option>
                    <option value="3-5"><?php _e('3-5 years', 'masseuse-jobs'); ?></option>
                    <option value="5+"><?php _e('5+ years', 'masseuse-jobs'); ?></option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label" for="skills"><?php _e('Skills & Certifications', 'masseuse-jobs'); ?></label>
                <textarea id="skills" name="skills" class="form-textarea" placeholder="<?php _e('List your skills, certifications, and specialties...', 'masseuse-jobs'); ?>"></textarea>
            </div>
            
            <button type="submit" name="masseuse_register_submit" class="submit-btn"><?php _e('Complete Registration', 'masseuse-jobs'); ?></button>
        </form>
        
        <p style="text-align: center; margin-top: 20px; color: #6b7280;">
            <?php _e('Already have an account?', 'masseuse-jobs'); ?> 
            <a href="<?php echo esc_url(wp_login_url()); ?>"><?php _e('Login here', 'masseuse-jobs'); ?></a>
        </p>
    </div>
</div>

<?php
get_footer();
