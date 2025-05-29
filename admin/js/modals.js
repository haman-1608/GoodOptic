// Modal Management
class ModalManager {
    constructor() {
        this.container = document.getElementById('modalContainer');
        this.currentModal = null;
    }

    // Show modal
    show(content) {
        this.hide(); // Hide any existing modal

        const overlay = document.createElement('div');
        overlay.className = 'modal-overlay';
        overlay.innerHTML = content;

        this.container.appendChild(overlay);
        this.currentModal = overlay;

        // Show modal with animation
        setTimeout(() => {
            overlay.classList.add('show');
        }, 10);

        // Handle close events
        this.bindCloseEvents(overlay);

        return overlay;
    }

    // Hide modal
    hide() {
        if (this.currentModal) {
            this.currentModal.classList.remove('show');
            setTimeout(() => {
                if (this.currentModal && this.currentModal.parentNode) {
                    this.currentModal.parentNode.removeChild(this.currentModal);
                }
                this.currentModal = null;
            }, 300);
        }
    }

    // Bind close events
    bindCloseEvents(overlay) {
        // Close on overlay click
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                this.hide();
            }
        });

        // Close on close button click
        const closeBtn = overlay.querySelector('.modal-close');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                this.hide();
            });
        }

        // Close on Escape key
        const escapeHandler = (e) => {
            if (e.key === 'Escape') {
                this.hide();
                document.removeEventListener('keydown', escapeHandler);
            }
        };
        document.addEventListener('keydown', escapeHandler);
    }

    // Customer modal
    showCustomerModal(customer = null) {
        const isEdit = customer !== null;
        const title = isEdit ? 'Chỉnh sửa khách hàng' : 'Thêm khách hàng mới';

        const content = `
            <div class="modal">
                <div class="modal-header">
                    <h3 class="modal-title">${title}</h3>
                    <button class="modal-close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="customerForm">
                        ${isEdit ? `<input type="hidden" name="id" value="${customer.id}">` : ''}

                        <div class="form-group">
                            <label class="form-label">Tên khách hàng *</label>
                            <input type="text" name="name" class="form-input" required
                                value="${isEdit ? Utils.sanitizeHTML(customer.name) : ''}"
                                placeholder="Nhập tên khách hàng">
                            <div class="form-error" id="name-error"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" class="form-input" required
                                value="${isEdit ? Utils.sanitizeHTML(customer.email) : ''}"
                                placeholder="Nhập địa chỉ email">
                            <div class="form-error" id="email-error"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Số điện thoại</label>
                            <input type="tel" name="phone" class="form-input"
                                value="${isEdit ? Utils.sanitizeHTML(customer.phone || '') : ''}"
                                placeholder="Nhập số điện thoại">
                            <div class="form-error" id="phone-error"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Địa chỉ</label>
                            <textarea name="address" class="form-textarea"
                                placeholder="Nhập địa chỉ">${isEdit ? Utils.sanitizeHTML(customer.address || '') : ''}</textarea>
                            <div class="form-error" id="address-error"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="modal.hide()">Hủy</button>
                    <button type="submit" form="customerForm" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        ${isEdit ? 'Cập nhật' : 'Tạo mới'}
                    </button>
                </div>
            </div>
        `;

        const overlay = this.show(content);

        // Handle form submission
        const form = overlay.querySelector('#customerForm');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            await this.handleCustomerSubmit(form, isEdit);
        });

        return overlay;
    }

    // Product modal
    showProductModal(product = null) {
        const isEdit = product !== null;
        const title = isEdit ? 'Chỉnh sửa sản phẩm' : 'Thêm sản phẩm mới';

        const content = `
            <div class="modal">
                <div class="modal-header">
                    <h3 class="modal-title">${title}</h3>
                    <button class="modal-close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="productForm">
                        ${isEdit ? `<input type="hidden" name="id" value="${product.id}">` : ''}

                        <div class="form-group">
                            <label class="form-label">Tên sản phẩm *</label>
                            <input type="text" name="name" class="form-input" required
                                value="${isEdit ? Utils.sanitizeHTML(product.name) : ''}"
                                placeholder="Nhập tên sản phẩm">
                            <div class="form-error" id="name-error"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Mô tả</label>
                            <textarea name="description" class="form-textarea"
                                placeholder="Nhập mô tả sản phẩm">${isEdit ? Utils.sanitizeHTML(product.description || '') : ''}</textarea>
                            <div class="form-error" id="description-error"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Giá *</label>
                            <input type="number" name="price" class="form-input" required min="0" step="1000"
                                value="${isEdit ? product.price : ''}"
                                placeholder="Nhập giá sản phẩm">
                            <div class="form-error" id="price-error"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Tồn kho</label>
                            <input type="number" name="stock" class="form-input" min="0"
                                value="${isEdit ? product.stock : 0}"
                                placeholder="Nhập số lượng tồn kho">
                            <div class="form-error" id="stock-error"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Danh mục</label>
                            <input type="text" name="category" class="form-input"
                                value="${isEdit ? Utils.sanitizeHTML(product.category || '') : ''}"
                                placeholder="Nhập danh mục sản phẩm">
                            <div class="form-error" id="category-error"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="modal.hide()">Hủy</button>
                    <button type="submit" form="productForm" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        ${isEdit ? 'Cập nhật' : 'Tạo mới'}
                    </button>
                </div>
            </div>
        `;

        const overlay = this.show(content);

        // Handle form submission
        const form = overlay.querySelector('#productForm');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            await this.handleProductSubmit(form, isEdit);
        });

        return overlay;
    }

    // Order modal
    showOrderModal(order = null) {
        const isEdit = order !== null;
        const title = isEdit ? 'Chỉnh sửa đơn hàng' : 'Tạo đơn hàng mới';

        const content = `
            <div class="modal" style="max-width: 700px;">
                <div class="modal-header">
                    <h3 class="modal-title">${title}</h3>
                    <button class="modal-close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="orderForm">
                        ${isEdit ? `<input type="hidden" name="id" value="${order.id}">` : ''}

                        <div class="form-group">
                            <label class="form-label">Khách hàng *</label>
                            <select name="customer_id" class="form-select" required id="customerSelect">
                                <option value="">Chọn khách hàng</option>
                            </select>
                            <div class="form-error" id="customer_id-error"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Tổng tiền *</label>
                            <input type="number" name="total" class="form-input" required min="0" step="1000"
                                value="${isEdit ? order.total : ''}"
                                placeholder="Nhập tổng tiền">
                            <div class="form-error" id="total-error"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Trạng thái</label>
                            <select name="status" class="form-select">
                                <option value="pending" ${isEdit && order.status === 'pending' ? 'selected' : ''}>Chờ xử lý</option>
                                <option value="processing" ${isEdit && order.status === 'processing' ? 'selected' : ''}>Đang xử lý</option>
                                <option value="shipping" ${isEdit && order.status === 'shipping' ? 'selected' : ''}>Đang giao</option>
                                <option value="completed" ${isEdit && order.status === 'completed' ? 'selected' : ''}>Hoàn thành</option>
                                <option value="cancelled" ${isEdit && order.status === 'cancelled' ? 'selected' : ''}>Đã hủy</option>
                            </select>
                            <div class="form-error" id="status-error"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="modal.hide()">Hủy</button>
                    <button type="submit" form="orderForm" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        ${isEdit ? 'Cập nhật' : 'Tạo mới'}
                    </button>
                </div>
            </div>
        `;

        const overlay = this.show(content);

        // Load customers for select
        this.loadCustomersForSelect(overlay, isEdit ? order.customer_id : null);

        // Handle form submission
        const form = overlay.querySelector('#orderForm');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            await this.handleOrderSubmit(form, isEdit);
        });

        return overlay;
    }

    // Handle customer form submission
    async handleCustomerSubmit(form, isEdit) {
        try {
            Utils.showLoading();

            // Clear previous errors
            form.querySelectorAll('.form-error').forEach(error => error.textContent = '');

            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());

            // Validate
            if (!this.validateCustomerForm(data)) {
                return;
            }

            let response;
            if (isEdit) {
                response = await API.updateCustomer(data);
            } else {
                response = await API.createCustomer(data);
            }

            Utils.showToast(response.message, 'success');
            this.hide();

            // Refresh customers list if on customers page
            if (window.app && window.app.currentPage === 'customers') {
                await window.app.loadCustomers();
            }

        } catch (error) {
            Utils.showToast(error.message, 'error');
        } finally {
            Utils.hideLoading();
        }
    }

    // Handle product form submission
    async handleProductSubmit(form, isEdit) {
        try {
            Utils.showLoading();

            // Clear previous errors
            form.querySelectorAll('.form-error').forEach(error => error.textContent = '');

            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());

            // Convert numeric fields
            data.price = parseFloat(data.price);
            data.stock = parseInt(data.stock) || 0;

            // Validate
            if (!this.validateProductForm(data)) {
                return;
            }

            let response;
            if (isEdit) {
                response = await API.updateProduct(data);
            } else {
                response = await API.createProduct(data);
            }

            Utils.showToast(response.message, 'success');
            this.hide();

            // Refresh products list if on products page
            if (window.app && window.app.currentPage === 'products') {
                await window.app.loadProducts();
            }

        } catch (error) {
            Utils.showToast(error.message, 'error');
        } finally {
            Utils.hideLoading();
        }
    }

    // Handle order form submission
    async handleOrderSubmit(form, isEdit) {
        try {
            Utils.showLoading();

            // Clear previous errors
            form.querySelectorAll('.form-error').forEach(error => error.textContent = '');

            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());

            // Convert numeric fields
            data.customer_id = parseInt(data.customer_id);
            data.total = parseFloat(data.total);

            // Validate
            if (!this.validateOrderForm(data)) {
                return;
            }

            let response;
            if (isEdit) {
                response = await API.updateOrder(data);
            } else {
                response = await API.createOrder(data);
            }

            Utils.showToast(response.message, 'success');
            this.hide();

            // Refresh orders list if on orders page
            if (window.app && window.app.currentPage === 'orders') {
                await window.app.loadOrders();
            }

        } catch (error) {
            Utils.showToast(error.message, 'error');
        } finally {
            Utils.hideLoading();
        }
    }

    // Load customers for select dropdown
    async loadCustomersForSelect(overlay, selectedId = null) {
        try {
            const response = await API.getCustomers({ limit: 100 });
            const select = overlay.querySelector('#customerSelect');

            response.data.forEach(customer => {
                const option = document.createElement('option');
                option.value = customer.id;
                option.textContent = `${customer.name} (${customer.email})`;
                if (selectedId && customer.id == selectedId) {
                    option.selected = true;
                }
                select.appendChild(option);
            });
        } catch (error) {
            console.error('Error loading customers:', error);
        }
    }

    // Validate customer form
    validateCustomerForm(data) {
        let isValid = true;

        if (!data.name.trim()) {
            this.showFieldError('name', 'Tên khách hàng là bắt buộc');
            isValid = false;
        }

        if (!data.email.trim()) {
            this.showFieldError('email', 'Email là bắt buộc');
            isValid = false;
        } else if (!Utils.validateEmail(data.email)) {
            this.showFieldError('email', 'Email không hợp lệ');
            isValid = false;
        }

        if (data.phone && !Utils.validatePhone(data.phone)) {
            this.showFieldError('phone', 'Số điện thoại không hợp lệ');
            isValid = false;
        }

        return isValid;
    }

    // Validate product form
    validateProductForm(data) {
        let isValid = true;

        if (!data.name.trim()) {
            this.showFieldError('name', 'Tên sản phẩm là bắt buộc');
            isValid = false;
        }

        if (!data.price || data.price <= 0) {
            this.showFieldError('price', 'Giá sản phẩm phải lớn hơn 0');
            isValid = false;
        }

        if (data.stock < 0) {
            this.showFieldError('stock', 'Tồn kho không thể âm');
            isValid = false;
        }

        return isValid;
    }

    // Validate order form
    validateOrderForm(data) {
        let isValid = true;

        if (!data.customer_id) {
            this.showFieldError('customer_id', 'Khách hàng là bắt buộc');
            isValid = false;
        }

        if (!data.total || data.total <= 0) {
            this.showFieldError('total', 'Tổng tiền phải lớn hơn 0');
            isValid = false;
        }

        return isValid;
    }

    // Show field error
    showFieldError(fieldName, message) {
        const errorElement = document.getElementById(`${fieldName}-error`);
        if (errorElement) {
            errorElement.textContent = message;
        }
    }

    // Confirmation modal
    showConfirmModal(title, message, onConfirm) {
        const content = `
            <div class="modal">
                <div class="modal-header">
                    <h3 class="modal-title">${title}</h3>
                    <button class="modal-close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>${message}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="modal.hide()">Hủy</button>
                    <button type="button" class="btn btn-danger" id="confirmBtn">
                        <i class="fas fa-check"></i>
                        Xác nhận
                    </button>
                </div>
            </div>
        `;

        const overlay = this.show(content);

        const confirmBtn = overlay.querySelector('#confirmBtn');
        confirmBtn.addEventListener('click', () => {
            onConfirm();
            this.hide();
        });

        return overlay;
    }
}

// Create global modal instance
const modal = new ModalManager();
