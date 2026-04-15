import { useParams, Link } from 'react-router-dom'

function JobDetailPage() {
  const { id } = useParams()
  
  // Mock data - in real app, fetch from API based on id
  const job = {
    id: parseInt(id),
    title: '高级按摩师',
    company: '悦来 SPA 会所',
    city: '北京',
    district: '朝阳区',
    salary: '8000-15000',
    category: '按摩师',
    experience: '3-5 年',
    education: '不限',
    description: '要求有 3 年以上工作经验，精通中式、泰式按摩手法，具备良好的服务意识和沟通能力。',
    requirements: [
      '3 年以上按摩师工作经验',
      '精通中式、泰式、精油等多种按摩手法',
      '持有相关职业资格证书优先',
      '形象气质佳，服务意识强',
      '身体健康，无传染性疾病'
    ],
    responsibilities: [
      '为顾客提供专业的按摩服务',
      '根据顾客需求推荐合适的按摩项目',
      '保持工作区域的整洁卫生',
      '协助店内其他日常工作'
    ],
    benefits: ['包吃包住', '五险一金', '提成', '全勤奖', '带薪年假', '定期体检', '培训晋升'],
    workingHours: '10:00-22:00（轮班制）',
    posted: '2 天前',
    views: 234,
    companyInfo: {
      name: '悦来 SPA 会所',
      scale: '50-100 人',
      industry: '美容/保健',
      address: '北京市朝阳区 XX 路 XX 号',
      description: '悦来 SPA 会所是一家高端连锁养生机构，致力于为顾客提供专业、舒适的养生体验。我们拥有专业的技术团队和完善的培训体系，为员工提供良好的发展平台。'
    }
  }

  return (
    <div className="min-h-screen bg-gray-50">
      {/* Navigation */}
      <nav className="bg-white shadow-sm">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between h-16 items-center">
            <Link to="/" className="text-2xl font-bold text-blue-600">技师招聘</Link>
            <div className="flex space-x-4">
              <Link to="/jobs" className="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                返回职位列表
              </Link>
            </div>
          </div>
        </div>
      </nav>

      <div className="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
          {/* Main Content */}
          <div className="lg:col-span-2 space-y-6">
            {/* Job Header */}
            <div className="bg-white rounded-lg shadow-sm p-6">
              <h1 className="text-2xl font-bold text-gray-900">{job.title}</h1>
              <p className="text-lg text-blue-600 font-semibold mt-2">{job.company}</p>
              <div className="flex flex-wrap gap-4 mt-4 text-sm text-gray-600">
                <span className="flex items-center">
                  <svg className="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  {job.city}·{job.district}
                </span>
                <span className="flex items-center">
                  <svg className="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  {job.salary}元/月
                </span>
                <span className="flex items-center">
                  <svg className="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                  {job.experience}
                </span>
                <span className="flex items-center">
                  <svg className="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                  </svg>
                  {job.education}
                </span>
              </div>
              <div className="mt-4 flex gap-3">
                <button className="flex-1 bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition-colors font-medium">
                  立即申请
                </button>
                <button className="px-6 py-3 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                  收藏
                </button>
              </div>
            </div>

            {/* Job Description */}
            <div className="bg-white rounded-lg shadow-sm p-6">
              <h2 className="text-xl font-bold text-gray-900 mb-4">职位描述</h2>
              <p className="text-gray-700 leading-relaxed">{job.description}</p>
              
              <h3 className="text-lg font-semibold text-gray-900 mt-6 mb-3">岗位职责：</h3>
              <ul className="list-disc list-inside space-y-2 text-gray-700">
                {job.responsibilities.map((item, index) => (
                  <li key={index}>{item}</li>
                ))}
              </ul>

              <h3 className="text-lg font-semibold text-gray-900 mt-6 mb-3">任职要求：</h3>
              <ul className="list-disc list-inside space-y-2 text-gray-700">
                {job.requirements.map((item, index) => (
                  <li key={index}>{item}</li>
                ))}
              </ul>
            </div>

            {/* Company Info */}
            <div className="bg-white rounded-lg shadow-sm p-6">
              <h2 className="text-xl font-bold text-gray-900 mb-4">公司信息</h2>
              <div className="space-y-3">
                <div className="flex justify-between">
                  <span className="text-gray-600">公司名称：</span>
                  <span className="text-gray-900 font-medium">{job.companyInfo.name}</span>
                </div>
                <div className="flex justify-between">
                  <span className="text-gray-600">公司规模：</span>
                  <span className="text-gray-900 font-medium">{job.companyInfo.scale}</span>
                </div>
                <div className="flex justify-between">
                  <span className="text-gray-600">所属行业：</span>
                  <span className="text-gray-900 font-medium">{job.companyInfo.industry}</span>
                </div>
                <div className="flex justify-between">
                  <span className="text-gray-600">公司地址：</span>
                  <span className="text-gray-900 font-medium">{job.companyInfo.address}</span>
                </div>
              </div>
              <p className="text-gray-700 mt-4 leading-relaxed">{job.companyInfo.description}</p>
            </div>
          </div>

          {/* Sidebar */}
          <div className="space-y-6">
            {/* Salary & Benefits */}
            <div className="bg-white rounded-lg shadow-sm p-6">
              <h3 className="text-lg font-bold text-gray-900 mb-4">薪资待遇</h3>
              <p className="text-3xl font-bold text-red-600">{job.salary}</p>
              <p className="text-sm text-gray-500 mt-1">元/月</p>
              
              <h3 className="text-lg font-bold text-gray-900 mt-6 mb-3">福利待遇</h3>
              <div className="flex flex-wrap gap-2">
                {job.benefits.map((benefit, index) => (
                  <span key={index} className="bg-green-50 text-green-700 px-3 py-1 rounded-full text-sm">
                    {benefit}
                  </span>
                ))}
              </div>

              <h3 className="text-lg font-bold text-gray-900 mt-6 mb-3">工作时间</h3>
              <p className="text-gray-700">{job.workingHours}</p>
            </div>

            {/* Contact */}
            <div className="bg-white rounded-lg shadow-sm p-6">
              <h3 className="text-lg font-bold text-gray-900 mb-4">联系方式</h3>
              <div className="space-y-3">
                <div className="flex items-center justify-between p-3 bg-gray-50 rounded-md">
                  <span className="text-gray-600">微信：</span>
                  <span className="text-gray-900 font-mono">ylspa_hr</span>
                </div>
                <div className="flex items-center justify-between p-3 bg-gray-50 rounded-md">
                  <span className="text-gray-600">电话：</span>
                  <span className="text-gray-900 font-mono">138****8888</span>
                </div>
              </div>
              <p className="text-xs text-gray-500 mt-3">
                提示：请在工作时间联系，面试时请携带身份证和相关证书
              </p>
            </div>

            {/* Job Info */}
            <div className="bg-white rounded-lg shadow-sm p-6">
              <h3 className="text-lg font-bold text-gray-900 mb-4">职位信息</h3>
              <div className="space-y-2 text-sm">
                <div className="flex justify-between">
                  <span className="text-gray-600">发布日期：</span>
                  <span className="text-gray-900">{job.posted}</span>
                </div>
                <div className="flex justify-between">
                  <span className="text-gray-600">浏览次数：</span>
                  <span className="text-gray-900">{job.views}</span>
                </div>
                <div className="flex justify-between">
                  <span className="text-gray-600">职位类别：</span>
                  <span className="text-gray-900">{job.category}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default JobDetailPage
