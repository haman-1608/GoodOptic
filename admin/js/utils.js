// Utility functions
const Utils = {
    // Format currency
    formatCurrency: (amount) => {
        return new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(amount);
    },

    // Format date
    formatDate: (dateString) => {
        const date = new Date(dateString);
        return date.toLocaleDateString('vi-VN', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    },

    // Format date for input
    formatDateForInput: (dateString) => {
        const date = new Date(dateString);
        return date.toISOString().slice(0, 16);
    },

    // Debounce function
    debounce: (func, wait) => {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },

    // Show loading
    showLoading: () => {
        const overlay = document.getElementById('loadingOverlay');
        if (overlay) {
            overlay.classList.add('show');
        }
    },

    // Hide loading
    hideLoading: () => {
        const overlay = document.getElementById('loadingOverlay');
        if (overlay) {
            overlay.classList.remove('show');
        }
    },

    // Show toast notification
    showToast: (message, type = 'info', title = '') => {
        const container = document.getElementById('toastContainer');
        if (!container) return;

        const toast = document.createElement('div');
        toast.className = `toast ${type}`;

        const iconMap = {
            success: 'fa-check-circle',
            error: 'fa-exclamation-circle',
            warning: 'fa-exclamation-triangle',
            info: 'fa-info-circle'
        };

        const titleMap = {
            success: 'Thành công',
            error: 'Lỗi',
            warning: 'Cảnh báo',
            info: 'Thông tin'
        };

        toast.innerHTML = `
            <div class="toast-icon">
                <i class="fas ${iconMap[type] || iconMap.info}"></i>
            </div>
            <div class="toast-content">
                ${title ? `<div class="toast-title">${title}</div>` : `<div class="toast-title">${titleMap[type]}</div>`}
                <div class="toast-message">${message}</div>
            </div>
            <button class="toast-close">
                <i class="fas fa-times"></i>
            </button>
        `;

        container.appendChild(toast);

        // Show toast
        setTimeout(() => {
            toast.classList.add('show');
        }, 100);

        // Auto remove after 5 seconds
        const autoRemove = setTimeout(() => {
            Utils.removeToast(toast);
        }, 5000);

        // Handle close button
        const closeBtn = toast.querySelector('.toast-close');
        closeBtn.addEventListener('click', () => {
            clearTimeout(autoRemove);
            Utils.removeToast(toast);
        });
    },

    // Remove toast
    removeToast: (toast) => {
        toast.classList.remove('show');
        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 300);
    },

    // Create pagination HTML
    createPagination: (currentPage, totalPages, onPageChange) => {
        const pagination = document.createElement('div');
        pagination.className = 'pagination-buttons';

        // Previous button
        const prevBtn = document.createElement('button');
        prevBtn.className = 'pagination-btn';
        prevBtn.innerHTML = '<i class="fas fa-chevron-left"></i>';
        prevBtn.disabled = currentPage <= 1;
        if (currentPage > 1) {
            prevBtn.addEventListener('click', () => onPageChange(currentPage - 1));
        }
        pagination.appendChild(prevBtn);

        // Page numbers
        const startPage = Math.max(1, currentPage - 2);
        const endPage = Math.min(totalPages, currentPage + 2);

        if (startPage > 1) {
            const firstBtn = Utils.createPageButton(1, currentPage, onPageChange);
            pagination.appendChild(firstBtn);

            if (startPage > 2) {
                const ellipsis = document.createElement('span');
                ellipsis.className = 'pagination-ellipsis';
                ellipsis.textContent = '...';
                pagination.appendChild(ellipsis);
            }
        }

        for (let i = startPage; i <= endPage; i++) {
            const pageBtn = Utils.createPageButton(i, currentPage, onPageChange);
            pagination.appendChild(pageBtn);
        }

        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                const ellipsis = document.createElement('span');
                ellipsis.className = 'pagination-ellipsis';
                ellipsis.textContent = '...';
                pagination.appendChild(ellipsis);
            }

            const lastBtn = Utils.createPageButton(totalPages, currentPage, onPageChange);
            pagination.appendChild(lastBtn);
        }

        // Next button
        const nextBtn = document.createElement('button');
        nextBtn.className = 'pagination-btn';
        nextBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';
        nextBtn.disabled = currentPage >= totalPages;
        if (currentPage < totalPages) {
            nextBtn.addEventListener('click', () => onPageChange(currentPage + 1));
        }
        pagination.appendChild(nextBtn);

        return pagination;
    },

    // Create page button
    createPageButton: (page, currentPage, onPageChange) => {
        const btn = document.createElement('button');
        btn.className = `pagination-btn ${page === currentPage ? 'active' : ''}`;
        btn.textContent = page;

        if (page !== currentPage) {
            btn.addEventListener('click', () => onPageChange(page));
        }

        return btn;
    },

    // Validate email
    validateEmail: (email) => {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    },

    // Validate phone
    validatePhone: (phone) => {
        const regex = /^(\+84|84|0)?[1-9]\d{8}$/;
        return regex.test(phone.replace(/\s/g, ''));
    },

    // Sanitize HTML
    sanitizeHTML: (str) => {
        const temp = document.createElement('div');
        temp.textContent = str;
        return temp.innerHTML;
    },

    // Generate random ID
    generateId: () => {
        return Math.random().toString(36).substr(2, 9);
    },

    // Get status badge HTML
    getStatusBadge: (status) => {
        const statusMap = {
            pending: 'Chờ xử lý',
            processing: 'Đang xử lý',
            shipping: 'Đang giao',
            completed: 'Hoàn thành',
            cancelled: 'Đã hủy'
        };

        return `<span class="status-badge ${status}">${statusMap[status] || status}</span>`;
    },

    // Create action buttons
    createActionButtons: (id, actions) => {
        const container = document.createElement('div');
        container.className = 'action-buttons';

        actions.forEach(action => {
            const btn = document.createElement('button');
            btn.className = `btn btn-${action.type} btn-sm`;
            btn.innerHTML = `<i class="${action.icon}"></i>${action.text ? ` ${action.text}` : ''}`;
            btn.addEventListener('click', () => action.handler(id));
            container.appendChild(btn);
        });

        return container;
    },

    // Copy text to clipboard
    copyToClipboard: async (text) => {
        try {
            await navigator.clipboard.writeText(text);
            Utils.showToast('Đã sao chép vào clipboard', 'success');
        } catch (err) {
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            try {
                document.execCommand('copy');
                Utils.showToast('Đã sao chép vào clipboard', 'success');
            } catch (fallbackErr) {
                Utils.showToast('Không thể sao chép', 'error');
            }
            document.body.removeChild(textArea);
        }
    },

    // Calculate pagination info
    calculatePagination: (total, limit, offset) => {
        const currentPage = Math.floor(offset / limit) + 1;
        const totalPages = Math.ceil(total / limit);
        const startItem = offset + 1;
        const endItem = Math.min(offset + limit, total);

        return {
            currentPage,
            totalPages,
            startItem,
            endItem,
            total
        };
    }
};
