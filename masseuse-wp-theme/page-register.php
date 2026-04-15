<?php
/**
 * Template Name: 技师注册
 */

get_header();
?>

<div class="register-container">
    <div class="register-card">
        <h1 style="text-align: center; margin-bottom: 30px; color: #1f2937;"><?php _e('技师注册', 'masseuse-jobs'); ?></h1>
        
        <div class="register-steps">
            <div class="step active">
                <span class="step-number">1</span>
                <span><?php _e('基本信息', 'masseuse-jobs'); ?></span>
            </div>
            <div class="step">
                <span class="step-number">2</span>
                <span><?php _e('专业技能', 'masseuse-jobs'); ?></span>
            </div>
            <div class="step">
                <span class="step-number">3</span>
                <span><?php _e('上传资料', 'masseuse-jobs'); ?></span>
            </div>
        </div>
        
        <form method="post" action="" enctype="multipart/form-data">
            <h3 style="margin-bottom: 20px; color: #1f2937;"><?php _e('基本信息', 'masseuse-jobs'); ?></h3>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="username"><?php _e('用户名 *', 'masseuse-jobs'); ?></label>
                    <input type="text" id="username" name="username" required />
                </div>
                
                <div class="form-group">
                    <label for="email"><?php _e('邮箱 *', 'masseuse-jobs'); ?></label>
                    <input type="email" id="email" name="email" required />
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="password"><?php _e('密码 *', 'masseuse-jobs'); ?></label>
                    <input type="password" id="password" name="password" required />
                </div>
                
                <div class="form-group">
                    <label for="confirm_password"><?php _e('确认密码 *', 'masseuse-jobs'); ?></label>
                    <input type="password" id="confirm_password" name="confirm_password" required />
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="full_name"><?php _e('真实姓名 *', 'masseuse-jobs'); ?></label>
                    <input type="text" id="full_name" name="full_name" required />
                </div>
                
                <div class="form-group">
                    <label for="phone"><?php _e('手机号码 *', 'masseuse-jobs'); ?></label>
                    <input type="tel" id="phone" name="phone" required />
                </div>
            </div>
            
            <div class="form-group">
                <label for="gender"><?php _e('性别', 'masseuse-jobs'); ?></label>
                <select id="gender" name="gender">
                    <option value=""><?php _e('请选择', 'masseuse-jobs'); ?></option>
                    <option value="male"><?php _e('男', 'masseuse-jobs'); ?></option>
                    <option value="female"><?php _e('女', 'masseuse-jobs'); ?></option>
                </select>
            </div>
            
            <h3 style="margin: 30px 0 20px; color: #1f2937;"><?php _e('专业技能', 'masseuse-jobs'); ?></h3>
            
            <div class="form-group">
                <label for="specialties"><?php _e('擅长项目', 'masseuse-jobs'); ?></label>
                <select id="specialties" name="specialties">
                    <option value=""><?php _e('请选择', 'masseuse-jobs'); ?></option>
                    <option value="massage"><?php _e('中式按摩', 'masseuse-jobs'); ?></option>
                    <option value="thai"><?php _e('泰式按摩', 'masseuse-jobs'); ?></option>
                    <option value="spa"><?php _e('SPA 水疗', 'masseuse-jobs'); ?></option>
                    <option value="foot"><?php _e('足浴足疗', 'masseuse-jobs'); ?></option>
                    <option value="oil"><?php _e('精油开背', 'masseuse-jobs'); ?></option>
                    <option value="all"><?php _e('全能技师', 'masseuse-jobs'); ?></option>
                </select>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="experience"><?php _e('工作年限', 'masseuse-jobs'); ?></label>
                    <select id="experience" name="experience">
                        <option value=""><?php _e('请选择', 'masseuse-jobs'); ?></option>
                        <option value="0"><?php _e('无经验', 'masseuse-jobs'); ?></option>
                        <option value="1"><?php _e('1 年以下', 'masseuse-jobs'); ?></option>
                        <option value="2"><?php _e('1-3 年', 'masseuse-jobs'); ?></option>
                        <option value="5"><?php _e('3-5 年', 'masseuse-jobs'); ?></option>
                        <option value="10"><?php _e('5 年以上', 'masseuse-jobs'); ?></option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="certificate"><?php _e('持有证书', 'masseuse-jobs'); ?></label>
                    <select id="certificate" name="certificate">
                        <option value=""><?php _e('请选择', 'masseuse-jobs'); ?></option>
                        <option value="none"><?php _e('无', 'masseuse-jobs'); ?></option>
                        <option value="basic"><?php _e('初级证书', 'masseuse-jobs'); ?></option>
                        <option value="intermediate"><?php _e('中级证书', 'masseuse-jobs'); ?></option>
                        <option value="advanced"><?php _e('高级证书', 'masseuse-jobs'); ?></option>
                        <option value="master"><?php _e('技师资格证', 'masseuse-jobs'); ?></option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="bio"><?php _e('自我介绍', 'masseuse-jobs'); ?></label>
                <textarea id="bio" name="bio" rows="4" placeholder="<?php _e('请简要介绍您的工作经验和技能特长...', 'masseuse-jobs'); ?>"></textarea>
            </div>
            
            <h3 style="margin: 30px 0 20px; color: #1f2937;"><?php _e('上传资料', 'masseuse-jobs'); ?></h3>
            
            <div class="form-group">
                <label for="avatar"><?php _e('个人照片', 'masseuse-jobs'); ?></label>
                <input type="file" id="avatar" name="avatar" accept="image/*" />
            </div>
            
            <div class="form-group">
                <label for="certificate_file"><?php _e('证书照片（可选）', 'masseuse-jobs'); ?></label>
                <input type="file" id="certificate_file" name="certificate_file" accept="image/*" />
            </div>
            
            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="terms" name="terms" required />
                    <label for="terms"><?php _e('我已阅读并同意', 'masseuse-jobs'); ?> <a href="#"><?php _e('用户协议', 'masseuse-jobs'); ?></a> <?php _e('和', 'masseuse-jobs'); ?> <a href="#"><?php _e('隐私政策', 'masseuse-jobs'); ?></a></label>
                </div>
            </div>
            
            <button type="submit" class="submit-btn"><?php _e('提交注册', 'masseuse-jobs'); ?></button>
        </form>
        
        <p style="text-align: center; margin-top: 20px; color: #6b7280;">
            <?php _e('已有账号？', 'masseuse-jobs'); ?> <a href="<?php echo esc_url(wp_login_url()); ?>"><?php _e('立即登录', 'masseuse-jobs'); ?></a>
        </p>
    </div>
</div>

<?php
get_footer();
