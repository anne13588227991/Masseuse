<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <h4><?php bloginfo('name'); ?></h4>
                <p><?php _e('专业的按摩师、SPA 技师、足浴技师招聘平台', 'masseuse-jobs'); ?></p>
            </div>
            
            <div class="footer-col">
                <h4><?php _e('快速链接', 'masseuse-jobs'); ?></h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('首页', 'masseuse-jobs'); ?></a></li>
                    <li><a href="<?php echo esc_url(get_post_type_archive_link('job')); ?>"><?php _e('职位列表', 'masseuse-jobs'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/register')); ?>"><?php _e('技师注册', 'masseuse-jobs'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/employer-dashboard')); ?>"><?php _e('雇主后台', 'masseuse-jobs'); ?></a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4><?php _e('职位类别', 'masseuse-jobs'); ?></h4>
                <ul>
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'job_category',
                        'hide_empty' => false,
                        'number' => 5,
                    ));
                    if ($categories && !is_wp_error($categories)) {
                        foreach ($categories as $category) {
                            echo '<li><a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4><?php _e('联系我们', 'masseuse-jobs'); ?></h4>
                <ul>
                    <li><?php _e('邮箱：contact@example.com', 'masseuse-jobs'); ?></li>
                    <li><?php _e('电话：400-123-4567', 'masseuse-jobs'); ?></li>
                    <li><?php _e('地址：北京市朝阳区', 'masseuse-jobs'); ?></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'masseuse-jobs'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
