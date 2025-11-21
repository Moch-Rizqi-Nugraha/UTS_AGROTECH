// =======================
// Navbar Scroll Effect
// =======================
let lastScroll = 0;
const navbar = document.querySelector('.navbar');

window.addEventListener('scroll', function() {
    const currentScroll = window.pageYOffset;
    
    // Add shadow and background when scrolled
    if(currentScroll > 50) {
        navbar.classList.add('scrolled', 'shadow-lg');
    } else {
        navbar.classList.remove('scrolled', 'shadow-lg');
    }
    
    lastScroll = currentScroll;
});

// =======================
// Smooth Scroll for Anchor Links
// =======================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        
        // Skip if href is just "#" or if it's a data-bs-toggle
        if(href === '#' || this.hasAttribute('data-bs-toggle')) {
            return;
        }
        
        e.preventDefault();
        const target = document.querySelector(href);
        
        if(target) {
            const offsetTop = target.offsetTop - 80; // 80px offset for navbar
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
        }
    });
});

// =======================
// Back to Top Button
// =======================
const btnTop = document.createElement('button');
btnTop.id = 'backToTop';
btnTop.innerHTML = '<i class="bi bi-arrow-up"></i>';
btnTop.setAttribute('aria-label', 'Back to top');
document.body.appendChild(btnTop);

btnTop.addEventListener('click', () => {
    window.scrollTo({ 
        top: 0, 
        behavior: 'smooth' 
    });
});

window.addEventListener('scroll', () => {
    if(window.pageYOffset > 400) {
        btnTop.style.display = 'flex';
        btnTop.style.alignItems = 'center';
        btnTop.style.justifyContent = 'center';
    } else {
        btnTop.style.display = 'none';
    }
});

// =======================
// Loading Animation on Page Load
// =======================
window.addEventListener('load', function() {
    // Add fade-in animation to cards
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.5s ease';
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 50);
        }, index * 50);
    });
});

// =======================
// Active Navigation Highlighting
// =======================
const currentPage = window.location.pathname.split('/').pop() || 'index.php';
const navLinks = document.querySelectorAll('.nav-link');

navLinks.forEach(link => {
    const linkPage = link.getAttribute('href').split('/').pop();
    if(linkPage === currentPage || 
       (currentPage === '' && linkPage === 'index.php') ||
       (currentPage === 'index.php' && linkPage === '../index.php')) {
        link.classList.add('active');
    }
});

// =======================
// Form Validation Enhancement
// =======================
const forms = document.querySelectorAll('form');
forms.forEach(form => {
    form.addEventListener('submit', function(e) {
        const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
        let isValid = true;
        
        inputs.forEach(input => {
            if(!input.value.trim()) {
                isValid = false;
                input.classList.add('is-invalid');
                
                // Remove invalid class on input
                input.addEventListener('input', function() {
                    this.classList.remove('is-invalid');
                });
            }
        });
        
        if(!isValid) {
            e.preventDefault();
            // Show alert
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-danger alert-dismissible fade show';
            alertDiv.innerHTML = `
                <i class="bi bi-exclamation-triangle me-2"></i>
                Mohon lengkapi semua field yang wajib diisi!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            form.insertBefore(alertDiv, form.firstChild);
            
            // Auto dismiss after 3 seconds
            setTimeout(() => {
                alertDiv.remove();
            }, 3000);
        }
    });
});

// =======================
// Tooltip Initialization (Bootstrap)
// =======================
document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// =======================
// Image Lazy Loading
// =======================
if('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if(entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src || img.src;
                img.classList.add('fade-in');
                observer.unobserve(img);
            }
        });
    });
    
    const images = document.querySelectorAll('img[data-src]');
    images.forEach(img => imageObserver.observe(img));
}

// =======================
// Mobile Menu Auto Close
// =======================
const navbarToggler = document.querySelector('.navbar-toggler');
const navbarCollapse = document.querySelector('.navbar-collapse');

if(navbarToggler && navbarCollapse) {
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            if(window.innerWidth < 992) {
                const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                    toggle: false
                });
                bsCollapse.hide();
            }
        });
    });
}

// =======================
// Add Animation on Scroll
// =======================
const animateOnScroll = () => {
    const elements = document.querySelectorAll('.animate-on-scroll');
    
    elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementBottom = element.getBoundingClientRect().bottom;
        
        if(elementTop < window.innerHeight && elementBottom > 0) {
            element.classList.add('animated');
        }
    });
};

window.addEventListener('scroll', animateOnScroll);
window.addEventListener('load', animateOnScroll);

// =======================
// Price Formatting
// =======================
function formatRupiah(angka) {
    return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// =======================
// Copy to Clipboard Function
// =======================
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        // Show success message
        const toast = document.createElement('div');
        toast.className = 'position-fixed top-0 end-0 p-3';
        toast.style.zIndex = '9999';
        toast.innerHTML = `
            <div class="toast show bg-success text-white" role="alert">
                <div class="toast-body">
                    <i class="bi bi-check-circle me-2"></i>
                    Berhasil disalin ke clipboard!
                </div>
            </div>
        `;
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.remove();
        }, 3000);
    });
}

// =======================
// Card Hover Effect Enhancement
// =======================
document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transition = 'all 0.3s ease';
    });
});

// =======================
// Print Page Function
// =======================
function printPage() {
    window.print();
}

// =======================
// Check Internet Connection
// =======================
window.addEventListener('online', () => {
    console.log('Connection restored');
});

window.addEventListener('offline', () => {
    const offlineAlert = document.createElement('div');
    offlineAlert.className = 'alert alert-warning position-fixed top-0 start-50 translate-middle-x mt-3';
    offlineAlert.style.zIndex = '9999';
    offlineAlert.innerHTML = `
        <i class="bi bi-wifi-off me-2"></i>
        Tidak ada koneksi internet
    `;
    document.body.appendChild(offlineAlert);
    
    setTimeout(() => {
        offlineAlert.remove();
    }, 5000);
});

// =======================
// Console Welcome Message
// =======================
console.log('%c🌾 Agrotech Marketplace', 'color: #28a745; font-size: 24px; font-weight: bold;');
console.log('%cSelamat datang di Agrotech Marketplace!', 'color: #20c997; font-size: 14px;');
console.log('%cDeveloped by: 22101122_RIZQI_MAHASISWA_TI01', 'color: #6c757d; font-size: 12px;');