/**
 * Navigation scripts for Masseuse Jobs theme
 */

(function() {
    'use strict';

    // Mobile menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNavigation = document.querySelector('.main-navigation ul');

    if (menuToggle && mainNavigation) {
        menuToggle.addEventListener('click', function() {
            mainNavigation.classList.toggle('active');
            this.setAttribute('aria-expanded', 
                this.getAttribute('aria-expanded') === 'false' ? 'true' : 'false'
            );
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Filter form auto-submit on change
    const filterSelects = document.querySelectorAll('.filter-bar select');
    filterSelects.forEach(select => {
        select.addEventListener('change', function() {
            const form = this.closest('form');
            if (form) {
                // Optional: auto-submit on change
                // form.submit();
            }
        });
    });

    // Add active class to current menu item
    const currentPage = window.location.pathname;
    document.querySelectorAll('.main-navigation a').forEach(link => {
        if (link.getAttribute('href') === currentPage || 
            (currentPage.includes(link.getAttribute('href')) && link.getAttribute('href') !== '/')) {
            link.classList.add('active');
        }
    });

    // Form validation for registration
    const registerForm = document.querySelector('.register-container form');
    if (registerForm) {
        const password = registerForm.querySelector('#password');
        const confirmPassword = registerForm.querySelector('#confirm_password');

        if (password && confirmPassword) {
            registerForm.addEventListener('submit', function(e) {
                if (password.value !== confirmPassword.value) {
                    e.preventDefault();
                    alert('两次输入的密码不一致，请重新输入');
                    confirmPassword.focus();
                }
            });
        }
    }

    // Dashboard tabs functionality
    const dashboardNav = document.querySelector('.dashboard-nav');
    if (dashboardNav) {
        dashboardNav.addEventListener('click', function(e) {
            if (e.target.tagName === 'A') {
                e.preventDefault();
                
                // Remove active class from all links
                this.querySelectorAll('a').forEach(link => {
                    link.classList.remove('active');
                });
                
                // Add active class to clicked link
                e.target.classList.add('active');
                
                // Here you would typically show/hide corresponding content sections
                // For now, we'll just update the URL hash
                const target = e.target.getAttribute('href');
                if (target && target.startsWith('#')) {
                    window.history.pushState(null, '', target);
                }
            }
        });
    }

    // Job application button
    const applyButtons = document.querySelectorAll('.apply-btn-large, .btn-apply');
    applyButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (this.getAttribute('href') === '#') {
                e.preventDefault();
                
                // Check if user is logged in (you'd need to implement this check)
                const isLoggedIn = document.body.classList.contains('logged-in');
                
                if (!isLoggedIn) {
                    if (confirm('请先登录或注册后才能申请职位，是否前往登录页面？')) {
                        window.location.href = '/wp-login.php';
                    }
                } else {
                    alert('申请功能需要连接后端 API 实现');
                }
            }
        });
    });

    // Search form enhancement
    const searchForm = document.querySelector('.search-form');
    if (searchForm) {
        const searchInput = searchForm.querySelector('input[type="text"]');
        if (searchInput) {
            searchInput.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            searchInput.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        }
    }

})();
