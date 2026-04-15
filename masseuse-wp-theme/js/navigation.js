/**
 * Navigation scripts for Masseuse Jobs theme
 */

(function() {
    'use strict';

    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
        const nav = document.querySelector('.main-navigation');
        if (!nav) return;

        // Add mobile menu button if needed
        const windowWidth = window.innerWidth;
        if (windowWidth <= 768) {
            const menuToggle = document.createElement('button');
            menuToggle.className = 'menu-toggle';
            menuToggle.innerHTML = '☰';
            menuToggle.style.cssText = 'display:none;background:none;border:none;font-size:24px;cursor:pointer;';
            
            nav.insertBefore(menuToggle, nav.firstChild);
            
            menuToggle.addEventListener('click', function() {
                const ul = nav.querySelector('ul');
                if (ul) {
                    ul.style.display = ul.style.display === 'none' ? 'flex' : 'none';
                }
            });
            
            window.addEventListener('resize', function() {
                const ul = nav.querySelector('ul');
                if (ul && window.innerWidth > 768) {
                    ul.style.display = 'flex';
                }
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

        // Form validation enhancement
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.style.borderColor = '#ef4444';
                        
                        field.addEventListener('input', function() {
                            field.style.borderColor = '#d1d5db';
                        }, { once: true });
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                }
            });
        });

        // Tab functionality for dashboard
        const tabButtons = document.querySelectorAll('.tab-btn');
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                tabButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Job card hover effect enhancement
        const jobCards = document.querySelectorAll('.job-card');
        jobCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Search form enhancement
        const searchForms = document.querySelectorAll('.search-form');
        searchForms.forEach(form => {
            const input = form.querySelector('input[type="search"], input[type="text"]');
            if (input) {
                input.addEventListener('focus', function() {
                    form.style.transform = 'scale(1.02)';
                    form.style.transition = 'transform 0.2s ease';
                });
                
                input.addEventListener('blur', function() {
                    form.style.transform = 'scale(1)';
                });
            }
        });
    });
})();
