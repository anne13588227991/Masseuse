<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-container">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
            <?php bloginfo('name'); ?>
        </a>
        
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => '',
                'container' => false,
                'fallback_cb' => 'masseuse_jobs_fallback_menu',
            ));
            ?>
        </nav>
    </div>
</header>

<?php
function masseuse_jobs_fallback_menu() {
    ?>
    <ul>
        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'masseuse-jobs'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/jobs')); ?>"><?php _e('Jobs', 'masseuse-jobs'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/register')); ?>"><?php _e('Register', 'masseuse-jobs'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/employer-dashboard')); ?>" class="nav-btn"><?php _e('For Employers', 'masseuse-jobs'); ?></a></li>
    </ul>
    <?php
}
?>
