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
    <div class="header-inner">
        <div class="site-branding">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                </h1>
            <?php endif; ?>
        </div>

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
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">首页</a></li>';
    echo '<li><a href="' . esc_url(get_post_type_archive_link('job')) . '">职位列表</a></li>';
    echo '<li><a href="' . esc_url(home_url('/register')) . '">技师注册</a></li>';
    echo '<li><a href="' . esc_url(home_url('/employer-dashboard')) . '">雇主后台</a></li>';
    echo '</ul>';
}
?>
