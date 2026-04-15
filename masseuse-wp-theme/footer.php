<footer class="site-footer">
    <div class="footer-grid">
        <div class="footer-col">
            <h4><?php bloginfo('name'); ?></h4>
            <p><?php _e('专为按摩师、SPA技师、足浴技师打造的专业招聘平台', 'masseuse-jobs'); ?></p>
        </div>
        
        <div class="footer-col">
            <h4><?php _e('Quick Links', 'masseuse-jobs'); ?></h4>
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'masseuse-jobs'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/jobs')); ?>"><?php _e('Jobs', 'masseuse-jobs'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/register')); ?>"><?php _e('Register', 'masseuse-jobs'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/employer-dashboard')); ?>"><?php _e('Employer Dashboard', 'masseuse-jobs'); ?></a></li>
            </ul>
        </div>
        
        <div class="footer-col">
            <h4><?php _e('Job Categories', 'masseuse-jobs'); ?></h4>
            <ul>
                <?php
                $categories = get_terms(array(
                    'taxonomy' => 'job_category',
                    'hide_empty' => true,
                    'number' => 5,
                ));
                if (!empty($categories) && !is_wp_error($categories)) {
                    foreach ($categories as $category) {
                        echo '<li><a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
        
        <div class="footer-col">
            <h4><?php _e('Contact', 'masseuse-jobs'); ?></h4>
            <ul>
                <li><a href="mailto:<?php echo esc_attr(get_option('admin_email')); ?>"><?php echo esc_html(get_option('admin_email')); ?></a></li>
            </ul>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'masseuse-jobs'); ?></p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
