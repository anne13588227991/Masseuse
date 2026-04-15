import { BrowserRouter as Router, Routes, Route } from 'react-router-dom'
import HomePage from './pages/HomePage'
import JobListPage from './pages/JobListPage'
import JobDetailPage from './pages/JobDetailPage'
import EmployerDashboard from './pages/EmployerDashboard'
import TechnicianProfile from './pages/TechnicianProfile'

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<HomePage />} />
        <Route path="/jobs" element={<JobListPage />} />
        <Route path="/jobs/:id" element={<JobDetailPage />} />
        <Route path="/employer" element={<EmployerDashboard />} />
        <Route path="/technician" element={<TechnicianProfile />} />
      </Routes>
    </Router>
  )
}

export default App
