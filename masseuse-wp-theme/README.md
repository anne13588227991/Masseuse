# Masseuse Jobs - WordPress Theme

专为按摩师、SPA技师、足浴技师打造的招聘网站 WordPress 主题。

## 功能特点

### 核心功能
- ✅ **自定义职位系统** - 专门的 Job 文章类型，包含薪资、地点、公司、经验等字段
- ✅ **用户角色管理** - Employer（雇主）和 Masseuse（技师）两种自定义角色
- ✅ **分类体系** - Job Category（按摩/SPA/足浴）和 Job Type（全职/兼职）
- ✅ **短代码支持** - `[job_listings]` 和 `[job_categories]`
- ✅ **响应式设计** - 完美适配手机、平板和桌面设备

### 页面模板
- **首页** - Hero 区域、职位分类、最新职位、特性展示、CTA 行动号召
- **职位列表页** - 搜索筛选、分类过滤、分页导航
- **职位详情页** - 完整职位描述、公司信息、一键申请
- **技师注册页** - 在线注册表单、技能填写
- **雇主后台** - 职位管理、发布新职位、公司资料

## 安装方法

### 1. 上传主题
```bash
# 将主题文件夹复制到 WordPress 主题目录
cp -r masseuse-wp-theme /path/to/wordpress/wp-content/themes/
```

或者通过 WordPress 后台：
1. 将 `masseuse-wp-theme` 文件夹压缩为 `masseuse-wp-theme.zip`
2. 登录 WordPress 后台 → 外观 → 主题 → 添加主题 → 上传主题
3. 选择 zip 文件并安装

### 2. 激活主题
在 WordPress 后台 → 外观 → 主题 中找到 "Masseuse Jobs" 并激活

### 3. 创建必要页面
在 WordPress 后台创建以下页面，并选择对应的页面模板：

1. **首页** 
   - 页面标题：Home
   - 模板：Front Page
   - 设置为静态首页：设置 → 阅读 → 首页显示 → 静态页面

2. **职位列表页**
   - 页面标题：Jobs
   - 模板：默认（自动使用 archive-job.php）

3. **技师注册页**
   - 页面标题：Register
   - 模板：Register Page
   - 链接：/register

4. **雇主后台**
   - 页面标题：Employer Dashboard
   - 模板：Employer Dashboard
   - 链接：/employer-dashboard

### 4. 设置菜单
1. 进入 外观 → 菜单
2. 创建主菜单（Primary Menu）
3. 添加页面：Home, Jobs, Register, Employer Dashboard
4. 将菜单位置设置为 "Primary Menu"

### 5. 添加测试数据
1. 进入 Jobs → Categories 添加分类：
   - 按摩 (slug: massage)
   - SPA (slug: spa)
   - 足浴 (slug: foot-bath)

2. 进入 Jobs → Job Types 添加类型：
   - 全职 (slug: full-time)
   - 兼职 (slug: part-time)

3. 进入 Jobs → Add New 添加测试职位

## 使用说明

### 短代码
在任意页面或文章中使用：

```
[job_listings]                    # 显示所有职位
[job_listings limit="5"]          # 显示 5 个职位
[job_listings category="massage"] # 显示按摩类职位
[job_listings type="full-time"]   # 显示全职职位

[job_categories]                  # 显示职位分类
```

### 自定义字段
每个职位包含以下自定义字段：
- `_job_salary` - 薪资范围
- `_job_location` - 工作地点
- `_job_company` - 公司名称
- `_job_experience` - 经验要求

### 用户角色权限
- **Employer**: 可以发布和管理职位
- **Masseuse**: 可以浏览和申请职位

## 文件结构
```
masseuse-wp-theme/
├── style.css                      # 主题样式
├── functions.php                  # 核心功能
├── header.php                     # 页头模板
├── footer.php                     # 页脚模板
├── front-page.php                 # 首页模板
├── archive-job.php                # 职位列表模板
├── single-job.php                 # 职位详情模板
├── page-register.php              # 注册页面模板
├── page-employer-dashboard.php    # 雇主后台模板
├── js/
│   └── navigation.js              # 前端交互脚本
└── template-parts/
    └── content-job.php            # 职位卡片组件
```

## 自定义开发

### 添加新的自定义字段
在 `functions.php` 中的 `masseuse_jobs_job_details_callback` 函数添加新字段

### 修改样式
编辑 `style.css` 文件，或使用子主题进行自定义

### 扩展功能
可以通过插件或子主题添加：
- 用户认证系统
- 在线支付
- 消息通知
- 简历管理
- 数据分析

## 浏览器支持
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## 技术支持
如有问题或建议，请联系开发团队。

## 许可证
GPL v2 or later
