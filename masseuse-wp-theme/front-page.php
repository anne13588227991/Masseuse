<?php
/**
 * Template Name: 首页模板
 */

get_header();
?>

<section class="hero-section">
    <div class="container">
        <h1><?php _e('找按摩师、SPA 技师、足浴技师工作', 'masseuse-jobs'); ?></h1>
        <p><?php _e('全国最大的养生行业招聘平台，数千个职位等你选择', 'masseuse-jobs'); ?></p>
        
        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="text" placeholder="<?php _e('搜索职位名称、公司或地点...', 'masseuse-jobs'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            <input type="hidden" name="post_type" value="job" />
            <button type="submit"><?php _e('搜索职位', 'masseuse-jobs'); ?></button>
        </form>
    </div>
</section>

<section class="categories-section">
    <div class="container">
        <h2 class="section-title"><?php _e('热门职位类别', 'masseuse-jobs'); ?></h2>
        <?php echo do_shortcode('[job_categories]'); ?>
    </div>
</section>

<section class="jobs-section">
    <div class="container">
        <h2 class="section-title"><?php _e('最新招聘职位', 'masseuse-jobs'); ?></h2>
        <?php echo do_shortcode('[job_listings limit="6"]'); ?>
        
        <div style="text-align: center; margin-top: 40px;">
            <a href="<?php echo esc_url(get_post_type_archive_link('job')); ?>" class="btn-primary"><?php _e('查看全部职位', 'masseuse-jobs'); ?></a>
        </div>
    </div>
</section>

<section class="features-section">
    <div class="container">
        <h2 class="section-title"><?php _e('为什么选择我们', 'masseuse-jobs'); ?></h2>
        <div class="features-grid">
            <div class="feature-item">
                <div class="feature-icon">🎯</div>
                <h3><?php _e('精准匹配', 'masseuse-jobs'); ?></h3>
                <p><?php _e('智能算法为您匹配最合适的职位，提高求职效率', 'masseuse-jobs'); ?></p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">🔒</div>
                <h3><?php _e('真实可靠', 'masseuse-jobs'); ?></h3>
                <p><?php _e('严格审核企业资质，确保职位信息真实有效', 'masseuse-jobs'); ?></p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">💰</div>
                <h3><?php _e('高薪职位', 'masseuse-jobs'); ?></h3>
                <p><?php _e('汇聚行业优质雇主，提供具有竞争力的薪资待遇', 'masseuse-jobs'); ?></p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">📱</div>
                <h3><?php _e('便捷服务', 'masseuse-jobs'); ?></h3>
                <p><?php _e('随时随地浏览职位，一键申请，让找工作更简单', 'masseuse-jobs'); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <h2><?php _e('准备好开始新的职业生涯了吗？', 'masseuse-jobs'); ?></h2>
        <p><?php _e('立即注册，开启您的高薪之旅', 'masseuse-jobs'); ?></p>
        <div class="cta-buttons">
            <a href="<?php echo esc_url(home_url('/register')); ?>" class="btn-primary"><?php _e('技师注册', 'masseuse-jobs'); ?></a>
            <a href="<?php echo esc_url(home_url('/employer-dashboard')); ?>" class="btn-secondary"><?php _e('发布职位', 'masseuse-jobs'); ?></a>
        </div>
    </div>
</section>

<?php
get_footer();
