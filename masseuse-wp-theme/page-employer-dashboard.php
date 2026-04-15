<?php
/**
 * Template Name: 雇主后台
 */

if (!is_user_logged_in()) {
    wp_redirect(wp_login_url(get_permalink()));
    exit;
}

get_header();
$current_user = wp_get_current_user();
?>

<div class="dashboard-container">
    <h1 style="margin-bottom: 30px; color: #1f2937;"><?php _e('雇主后台', 'masseuse-jobs'); ?></h1>
    
    <div class="dashboard-nav">
        <a href="#jobs" class="active"><?php _e('职位管理', 'masseuse-jobs'); ?></a>
        <a href="#applications"><?php _e('简历管理', 'masseuse-jobs'); ?></a>
        <a href="#company"><?php _e('公司信息', 'masseuse-jobs'); ?></a>
        <a href="#settings"><?php _e('账号设置', 'masseuse-jobs'); ?></a>
    </div>
    
    <div class="dashboard-content">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">
                    <?php 
                    $jobs_count = wp_count_posts('job');
                    echo isset($jobs_count->publish) ? $jobs_count->publish : 0;
                    ?>
                </div>
                <div class="stat-label"><?php _e('发布职位', 'masseuse-jobs'); ?></div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number">24</div>
                <div class="stat-label"><?php _e('收到简历', 'masseuse-jobs'); ?></div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number">8</div>
                <div class="stat-label"><?php _e('待处理', 'masseuse-jobs'); ?></div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number">3</div>
                <div class="stat-label"><?php _e('已录用', 'masseuse-jobs'); ?></div>
            </div>
        </div>
        
        <h2 style="margin-bottom: 20px; color: #1f2937;"><?php _e('我的职位', 'masseuse-jobs'); ?></h2>
        
        <table class="jobs-table">
            <thead>
                <tr>
                    <th><?php _e('职位名称', 'masseuse-jobs'); ?></th>
                    <th><?php _e('发布日期', 'masseuse-jobs'); ?></th>
                    <th><?php _e('地点', 'masseuse-jobs'); ?></th>
                    <th><?php _e('状态', 'masseuse-jobs'); ?></th>
                    <th><?php _e('操作', 'masseuse-jobs'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $args = array(
                    'post_type' => 'job',
                    'posts_per_page' => 10,
                    'author' => get_current_user_id(),
                    'post_status' => array('publish', 'pending', 'draft'),
                );
                
                $jobs = new WP_Query($args);
                
                if ($jobs->have_posts()) :
                    while ($jobs->have_posts()) : $jobs->the_post();
                        $status = get_post_status();
                        $status_label = '';
                        $status_class = '';
                        
                        switch ($status) {
                            case 'publish':
                                $status_label = __('已发布', 'masseuse-jobs');
                                $status_class = 'status-active';
                                break;
                            case 'pending':
                                $status_label = __('审核中', 'masseuse-jobs');
                                $status_class = 'status-pending';
                                break;
                            default:
                                $status_label = __('草稿', 'masseuse-jobs');
                                $status_class = 'status-pending';
                        }
                        
                        $location = get_post_meta(get_the_ID(), '_job_location', true);
                        ?>
                        <tr>
                            <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                            <td><?php echo get_the_date(); ?></td>
                            <td><?php echo esc_html($location ? $location : __('未设置', 'masseuse-jobs')); ?></td>
                            <td><span class="status-badge <?php echo $status_class; ?>"><?php echo $status_label; ?></span></td>
                            <td class="action-links">
                                <a href="<?php echo get_edit_post_link(); ?>"><?php _e('编辑', 'masseuse-jobs'); ?></a>
                                <a href="<?php echo get_delete_post_link(); ?>"><?php _e('删除', 'masseuse-jobs'); ?></a>
                            </td>
                        </tr>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 40px;">
                            <?php _e('暂无职位，请点击下方按钮发布新职位', 'masseuse-jobs'); ?>
                        </td>
                    </tr>
                    <?php
                endif;
                ?>
            </tbody>
        </table>
        
        <div style="margin-top: 30px; text-align: center;">
            <a href="<?php echo admin_url('post-new.php?post_type=job'); ?>" class="btn-primary"><?php _e('发布新职位', 'masseuse-jobs'); ?></a>
        </div>
    </div>
</div>

<?php
get_footer();
