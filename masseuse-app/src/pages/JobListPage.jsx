import { useState } from 'react'
import { Link } from 'react-router-dom'

function JobListPage() {
  const [searchTerm, setSearchTerm] = useState('')
  const [selectedCategory, setSelectedCategory] = useState('all')
  const [selectedCity, setSelectedCity] = useState('all')

  const jobs = [
    {
      id: 1,
      title: '高级按摩师',
      company: '悦来 SPA 会所',
      city: '北京',
      salary: '8000-15000',
      category: '按摩师',
      experience: '3-5 年',
      description: '要求有 3 年以上工作经验，精通中式、泰式按摩',
      benefits: ['包吃包住', '五险一金', '提成'],
      posted: '2 天前'
    },
    {
      id: 2,
      title: 'SPA 技师',
      company: '水疗天堂',
      city: '上海',
      salary: '10000-20000',
      category: 'SPA 技师',
      experience: '1-3 年',
      description: '熟悉各类 SPA 护理流程，形象气质佳',
      benefits: ['包吃住', '全勤奖', '年终奖'],
      posted: '1 天前'
    },
    {
      id: 3,
      title: '足浴技师',
      company: '足道养生馆',
      city: '广州',
      salary: '6000-12000',
      category: '足浴技师',
      experience: '不限',
      description: '接受新手，提供专业培训',
      benefits: ['包住宿', '餐补', '加班补助'],
      posted: '3 天前'
    },
    {
      id: 4,
      title: '理疗师',
      company: '康复中心',
      city: '深圳',
      salary: '9000-18000',
      category: '理疗师',
      experience: '3-5 年',
      description: '持有相关证书，有康复理疗经验',
      benefits: ['五险一金', '带薪年假', '培训晋升'],
      posted: '5 小时前'
    },
    {
      id: 5,
      title: '采耳师',
      company: '耳语轩',
      city: '成都',
      salary: '7000-14000',
      category: '其他',
      experience: '1-3 年',
      description: '熟练掌握采耳技艺，服务意识强',
      benefits: ['包吃住', '绩效奖金'],
      posted: '1 周前'
    },
    {
      id: 6,
      title: '推拿师',
      company: '中医推拿馆',
      city: '杭州',
      salary: '8000-16000',
      category: '按摩师',
      experience: '3-5 年',
      description: '中医专业优先，擅长小儿推拿',
      benefits: ['社保', '节日福利', '定期体检'],
      posted: '4 天前'
    }
  ]

  const categories = ['all', '按摩师', 'SPA 技师', '足浴技师', '理疗师', '其他']
  const cities = ['all', '北京', '上海', '广州', '深圳', '成都', '杭州']

  const filteredJobs = jobs.filter(job => {
    const matchesSearch = job.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
                         job.company.toLowerCase().includes(searchTerm.toLowerCase())
    const matchesCategory = selectedCategory === 'all' || job.category === selectedCategory
    const matchesCity = selectedCity === 'all' || job.city === selectedCity
    return matchesSearch && matchesCategory && matchesCity
  })

  return (
    <div className="min-h-screen bg-gray-50">
      {/* Navigation */}
      <nav className="bg-white shadow-sm">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between h-16 items-center">
            <Link to="/" className="text-2xl font-bold text-blue-600">技师招聘</Link>
            <div className="flex space-x-4">
              <Link to="/jobs" className="text-blue-600 font-medium px-3 py-2 rounded-md text-sm">
                查看职位
              </Link>
              <Link to="/employer" className="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                雇主登录
              </Link>
              <Link to="/technician" className="bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-md text-sm font-medium">
                技师注册
              </Link>
            </div>
          </div>
        </div>
      </nav>

      {/* Search & Filter */}
      <div className="bg-white border-b">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-4">
            <input
              type="text"
              placeholder="搜索职位或公司..."
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
              className="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <select
              value={selectedCategory}
              onChange={(e) => setSelectedCategory(e.target.value)}
              className="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
              <option value="all">所有类别</option>
              {categories.slice(1).map(cat => (
                <option key={cat} value={cat}>{cat}</option>
              ))}
            </select>
            <select
              value={selectedCity}
              onChange={(e) => setSelectedCity(e.target.value)}
              className="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
              <option value="all">所有城市</option>
              {cities.slice(1).map(city => (
                <option key={city} value={city}>{city}</option>
              ))}
            </select>
            <button className="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors">
              搜索
            </button>
          </div>
        </div>
      </div>

      {/* Job List */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div className="mb-4">
          <h1 className="text-2xl font-bold text-gray-900">
            共找到 {filteredJobs.length} 个职位
          </h1>
        </div>
        
        <div className="space-y-4">
          {filteredJobs.map(job => (
            <div key={job.id} className="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
              <div className="flex justify-between items-start">
                <div className="flex-1">
                  <Link to={`/jobs/${job.id}`} className="text-xl font-semibold text-blue-600 hover:underline">
                    {job.title}
                  </Link>
                  <p className="text-gray-700 font-medium mt-1">{job.company}</p>
                  <div className="flex items-center gap-4 mt-2 text-sm text-gray-500">
                    <span>{job.city}</span>
                    <span>•</span>
                    <span>{job.experience}</span>
                    <span>•</span>
                    <span>{job.posted}</span>
                  </div>
                  <p className="text-gray-600 mt-3">{job.description}</p>
                  <div className="flex flex-wrap gap-2 mt-3">
                    {job.benefits.map((benefit, index) => (
                      <span key={index} className="bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs">
                        {benefit}
                      </span>
                    ))}
                  </div>
                </div>
                <div className="text-right ml-4">
                  <p className="text-2xl font-bold text-red-600">{job.salary}</p>
                  <p className="text-sm text-gray-500">元/月</p>
                  <button className="mt-4 bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors">
                    立即申请
                  </button>
                </div>
              </div>
            </div>
          ))}
        </div>

        {filteredJobs.length === 0 && (
          <div className="text-center py-12">
            <p className="text-gray-500 text-lg">暂无符合条件的职位</p>
          </div>
        )}
      </div>
    </div>
  )
}

export default JobListPage
