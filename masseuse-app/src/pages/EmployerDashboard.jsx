import { useState } from 'react'
import { Link } from 'react-router-dom'

function EmployerDashboard() {
  const [activeTab, setActiveTab] = useState('jobs')

  const postedJobs = [
    { id: 1, title: '高级按摩师', applicants: 12, status: '招聘中', posted: '2024-01-15' },
    { id: 2, title: 'SPA 技师', applicants: 8, status: '招聘中', posted: '2024-01-10' },
    { id: 3, title: '足浴技师', applicants: 25, status: '已结束', posted: '2023-12-20' }
  ]

  const applications = [
    { id: 1, name: '张**', position: '高级按摩师', experience: '5 年', phone: '138****1234', time: '2 小时前' },
    { id: 2, name: '李**', position: 'SPA 技师', experience: '3 年', phone: '139****5678', time: '5 小时前' },
    { id: 3, name: '王**', position: '高级按摩师', experience: '4 年', phone: '136****9012', time: '1 天前' }
  ]

  return (
    <div className="min-h-screen bg-gray-50">
      {/* Navigation */}
      <nav className="bg-white shadow-sm">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between h-16 items-center">
            <Link to="/" className="text-2xl font-bold text-blue-600">技师招聘</Link>
            <div className="flex items-center space-x-4">
              <span className="text-gray-700">悦来 SPA 会所</span>
              <button className="text-gray-700 hover:text-blue-600 text-sm">退出</button>
            </div>
          </div>
        </div>
      </nav>

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div className="grid grid-cols-1 lg:grid-cols-4 gap-6">
          {/* Sidebar */}
          <div className="lg:col-span-1">
            <div className="bg-white rounded-lg shadow-sm p-6">
              <div className="text-center mb-6">
                <div className="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                  <svg className="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                  </svg>
                </div>
                <h2 className="text-xl font-bold text-gray-900">悦来 SPA 会所</h2>
                <p className="text-sm text-gray-500 mt-1">美容/保健 · 50-100 人</p>
              </div>
              
              <div className="space-y-2">
                <button
                  onClick={() => setActiveTab('jobs')}
                  className={`w-full text-left px-4 py-2 rounded-md transition-colors ${
                    activeTab === 'jobs' ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50'
                  }`}
                >
                  我的职位
                </button>
                <button
                  onClick={() => setActiveTab('applications')}
                  className={`w-full text-left px-4 py-2 rounded-md transition-colors ${
                    activeTab === 'applications' ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50'
                  }`}
                >
                  简历管理
                </button>
                <button
                  onClick={() => setActiveTab('profile')}
                  className={`w-full text-left px-4 py-2 rounded-md transition-colors ${
                    activeTab === 'profile' ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50'
                  }`}
                >
                  公司信息
                </button>
              </div>
            </div>
          </div>

          {/* Main Content */}
          <div className="lg:col-span-3">
            {activeTab === 'jobs' && (
              <div className="space-y-6">
                <div className="bg-white rounded-lg shadow-sm p-6">
                  <div className="flex justify-between items-center mb-6">
                    <h2 className="text-2xl font-bold text-gray-900">发布的职位</h2>
                    <button className="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors">
                      发布新职位
                    </button>
                  </div>
                  
                  <div className="overflow-x-auto">
                    <table className="min-w-full divide-y divide-gray-200">
                      <thead className="bg-gray-50">
                        <tr>
                          <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">职位名称</th>
                          <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">申请人数</th>
                          <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">状态</th>
                          <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">发布时间</th>
                          <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
                        </tr>
                      </thead>
                      <tbody className="bg-white divide-y divide-gray-200">
                        {postedJobs.map(job => (
                          <tr key={job.id}>
                            <td className="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{job.title}</td>
                            <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{job.applicants}人</td>
                            <td className="px-6 py-4 whitespace-nowrap">
                              <span className={`px-2 py-1 text-xs rounded-full ${
                                job.status === '招聘中' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'
                              }`}>
                                {job.status}
                              </span>
                            </td>
                            <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{job.posted}</td>
                            <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                              <button className="text-blue-600 hover:text-blue-900 mr-3">编辑</button>
                              <button className="text-red-600 hover:text-red-900">下架</button>
                            </td>
                          </tr>
                        ))}
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            )}

            {activeTab === 'applications' && (
              <div className="bg-white rounded-lg shadow-sm p-6">
                <h2 className="text-2xl font-bold text-gray-900 mb-6">收到的简历</h2>
                
                <div className="space-y-4">
                  {applications.map(app => (
                    <div key={app.id} className="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                      <div className="flex justify-between items-start">
                        <div>
                          <h3 className="text-lg font-semibold text-gray-900">{app.name}</h3>
                          <p className="text-gray-600 mt-1">应聘职位：{app.position}</p>
                          <p className="text-gray-600">工作经验：{app.experience}</p>
                        </div>
                        <div className="text-right">
                          <p className="text-sm text-gray-500">{app.time}</p>
                          <p className="text-sm text-gray-500 mt-1">{app.phone}</p>
                          <div className="mt-2 space-x-2">
                            <button className="text-blue-600 hover:text-blue-900 text-sm">查看简历</button>
                            <button className="text-green-600 hover:text-green-900 text-sm">邀约面试</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  ))}
                </div>
              </div>
            )}

            {activeTab === 'profile' && (
              <div className="bg-white rounded-lg shadow-sm p-6">
                <h2 className="text-2xl font-bold text-gray-900 mb-6">公司信息</h2>
                
                <div className="space-y-6">
                  <div>
                    <label className="block text-sm font-medium text-gray-700 mb-2">公司名称</label>
                    <input type="text" defaultValue="悦来 SPA 会所" className="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                  </div>
                  <div>
                    <label className="block text-sm font-medium text-gray-700 mb-2">所属行业</label>
                    <input type="text" defaultValue="美容/保健" className="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                  </div>
                  <div>
                    <label className="block text-sm font-medium text-gray-700 mb-2">公司规模</label>
                    <select className="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                      <option>50-100 人</option>
                      <option>100-500 人</option>
                      <option>500 人以上</option>
                    </select>
                  </div>
                  <div>
                    <label className="block text-sm font-medium text-gray-700 mb-2">公司地址</label>
                    <input type="text" defaultValue="北京市朝阳区 XX 路 XX 号" className="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                  </div>
                  <div>
                    <label className="block text-sm font-medium text-gray-700 mb-2">公司简介</label>
                    <textarea rows={4} defaultValue="悦来 SPA 会所是一家高端连锁养生机构，致力于为顾客提供专业、舒适的养生体验。" className="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                  </div>
                  <div>
                    <label className="block text-sm font-medium text-gray-700 mb-2">联系方式</label>
                    <input type="text" defaultValue="138****8888" className="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                  </div>
                  
                  <button className="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors">
                    保存修改
                  </button>
                </div>
              </div>
            )}
          </div>
        </div>
      </div>
    </div>
  )
}

export default EmployerDashboard
