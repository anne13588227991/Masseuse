<?php
/**
 * Template for displaying single job posts
 */

get_header();
?>

<div class="single-job-container">
    <?php while (have_posts()) : the_post(); ?>
        <div class="job-detail-card">
            <div class="job-detail-header">
                <h1 class="job-detail-title"><?php the_title(); ?></h1>
                <p class="job-detail-company">
                    <?php 
                    $company = get_post_meta(get_the_ID(), '_job_company', true);
                    echo esc_html($company ? $company : get_bloginfo('name'));
                    ?>
                </p>
                
                <div class="job-detail-meta">
                    <?php 
                    $salary = get_post_meta(get_the_ID(), '_job_salary', true);
                    if ($salary) : ?>
                        <span>💰 <?php echo esc_html($salary); ?></span>
                    <?php endif; ?>
                    
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
                    $types = get_the_terms(get_the_ID(), 'job_type');
                    if ($types && !is_wp_error($types)) :
                        foreach ($types as $type) : ?>
                            <span>🏷️ <?php echo esc_html($type->name); ?></span>
                        <?php endforeach;
                    endif; ?>
                </div>
            </div>
            
            <div class="job-detail-section">
                <h3><?php _e('岗位职责', 'masseuse-jobs'); ?></h3>
                <?php the_content(); ?>
            </div>
            
            <div class="job-detail-section">
                <h3><?php _e('任职要求', 'masseuse-jobs'); ?></h3>
                <ul>
                    <li><?php _e('具有相关按摩、SPA 或足浴工作经验', 'masseuse-jobs'); ?></li>
                    <li><?php _e('具备良好的服务意识和沟通能力', 'masseuse-jobs'); ?></li>
                    <li><?php _e('持有相关职业资格证书者优先', 'masseuse-jobs'); ?></li>
                    <li><?php _e('身体健康，品行端正', 'masseuse-jobs'); ?></li>
                </ul>
            </div>
            
            <div class="job-detail-section">
                <h3><?php _e('薪资福利', 'masseuse-jobs'); ?></h3>
                <ul>
                    <li><?php _e('具有竞争力的薪资待遇', 'masseuse-jobs'); ?></li>
                    <li><?php _e('提供完善的培训体系', 'masseuse-jobs'); ?></li>
                    <li><?php _e('良好的晋升空间', 'masseuse-jobs'); ?></li>
                    <li><?php _e('包吃包住或住房补贴', 'masseuse-jobs'); ?></li>
                    <li><?php _e('节日福利、生日礼金', 'masseuse-jobs'); ?></li>
                </ul>
            </div>
        </div>
        
        <div class="apply-sidebar">
            <a href="#" class="apply-btn-large"><?php _e('立即申请', 'masseuse-jobs'); ?></a>
            <a href="#" class="btn-secondary" style="display: block; text-align: center;"><?php _e('收藏职位', 'masseuse-jobs'); ?></a>
            
            <div style="margin-top: 30px; padding-top: 30px; border-top: 1px solid #e5e7eb;">
                <h4 style="margin-bottom: 15px;"><?php _e('联系方式', 'masseuse-jobs'); ?></h4>
                <?php 
                $contact_email = get_post_meta(get_the_ID(), '_job_contact_email', true);
                $contact_phone = get_post_meta(get_the_ID(), '_job_contact_phone', true);
                ?>
                <?php if ($contact_email) : ?>
                    <p style="margin-bottom: 10px;">📧 <?php echo esc_html($contact_email); ?></p>
                <?php endif; ?>
                <?php if ($contact_phone) : ?>
                    <p style="margin-bottom: 10px;">📱 <?php echo esc_html($contact_phone); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php
get_footer();
