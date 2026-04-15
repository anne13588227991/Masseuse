import { Link } from 'react-router-dom'

function HomePage() {
  return (
    <div className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
      {/* Navigation */}
      <nav className="bg-white shadow-sm">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between h-16 items-center">
            <div className="flex items-center">
              <h1 className="text-2xl font-bold text-blue-600">技师招聘</h1>
            </div>
            <div className="flex space-x-4">
              <Link to="/jobs" className="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
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

      {/* Hero Section */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div className="text-center">
          <h2 className="text-4xl font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            专业按摩师、SPA 技师、足浴技师招聘平台
          </h2>
          <p className="mt-6 max-w-2xl mx-auto text-xl text-gray-500">
            连接优质雇主与专业技师，打造健康行业人才交流平台
          </p>
          <div className="mt-10 flex justify-center gap-4">
            <Link 
              to="/jobs" 
              className="px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10"
            >
              找工作
            </Link>
            <Link 
              to="/employer" 
              className="px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10 border-blue-600"
            >
              招人才
            </Link>
          </div>
        </div>
      </div>

      {/* Features Section */}
      <div className="py-16 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center">
            <h3 className="text-3xl font-extrabold text-gray-900 mb-12">
              为什么选择我们
            </h3>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div className="text-center p-6">
              <div className="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg className="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </div>
              <h4 className="text-xl font-semibold text-gray-900 mb-2">海量职位</h4>
              <p className="text-gray-500">汇集全国各地优质按摩、SPA、足浴场所招聘信息</p>
            </div>
            <div className="text-center p-6">
              <div className="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg className="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <h4 className="text-xl font-semibold text-gray-900 mb-2">严格审核</h4>
              <p className="text-gray-500">所有雇主和职位均经过严格审核，确保真实可靠</p>
            </div>
            <div className="text-center p-6">
              <div className="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg className="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <h4 className="text-xl font-semibold text-gray-900 mb-2">高薪职位</h4>
              <p className="text-gray-500">提供具有竞争力的薪资待遇，多劳多得</p>
            </div>
          </div>
        </div>
      </div>

      {/* Job Categories */}
      <div className="py-16 bg-gray-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-12">
            <h3 className="text-3xl font-extrabold text-gray-900">热门职位类别</h3>
          </div>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {[
              { name: '按摩师', count: 156, color: 'blue' },
              { name: 'SPA 技师', count: 98, color: 'green' },
              { name: '足浴技师', count: 134, color: 'purple' },
              { name: '理疗师', count: 67, color: 'pink' }
            ].map((category) => (
              <Link
                key={category.name}
                to={`/jobs?category=${category.name}`}
                className={`bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow cursor-pointer`}
              >
                <h4 className={`text-${category.color}-600 font-semibold text-lg mb-2`}>{category.name}</h4>
                <p className="text-gray-500">{category.count} 个在招职位</p>
              </Link>
            ))}
          </div>
        </div>
      </div>

      {/* Footer */}
      <footer className="bg-gray-800 text-white py-12">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
              <h4 className="text-xl font-bold mb-4">技师招聘</h4>
              <p className="text-gray-400">专业的按摩师、SPA 技师、足浴技师招聘平台</p>
            </div>
            <div>
              <h4 className="text-lg font-semibold mb-4">快速链接</h4>
              <ul className="space-y-2">
                <li><Link to="/jobs" className="text-gray-400 hover:text-white">查看职位</Link></li>
                <li><Link to="/employer" className="text-gray-400 hover:text-white">发布招聘</Link></li>
                <li><Link to="/technician" className="text-gray-400 hover:text-white">技师注册</Link></li>
              </ul>
            </div>
            <div>
              <h4 className="text-lg font-semibold mb-4">联系方式</h4>
              <p className="text-gray-400">客服微信：jishi_zhaopin</p>
              <p className="text-gray-400">邮箱：contact@jishizhaopin.com</p>
            </div>
          </div>
          <div className="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400">
            <p>&copy; 2024 技师招聘网。All rights reserved.</p>
          </div>
        </div>
      </footer>
    </div>
  )
}

export default HomePage
