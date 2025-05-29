// API Service
class APIService {
    constructor() {
        this.baseURL = 'api/';
    }

    // Generic API request method
    async request(endpoint, options = {}) {
        const url = this.baseURL + endpoint;
        const config = {
            headers: {
                'Content-Type': 'application/json',
            },
            ...options
        };

        try {
            const response = await fetch(url, config);
            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.message || 'API request failed');
            }

            return data;
        } catch (error) {
            console.error('API Request Error:', error);
            throw error;
        }
    }

    // GET request
    async get(endpoint, params = {}) {
        const queryString = new URLSearchParams(params).toString();
        const url = queryString ? `${endpoint}?${queryString}` : endpoint;

        return this.request(url, {
            method: 'GET'
        });
    }

    // POST request
    async post(endpoint, data) {
        return this.request(endpoint, {
            method: 'POST',
            body: JSON.stringify(data)
        });
    }

    // PUT request
    async put(endpoint, data) {
        return this.request(endpoint, {
            method: 'PUT',
            body: JSON.stringify(data)
        });
    }

    // DELETE request
    async delete(endpoint, data = {}) {
        return this.request(endpoint, {
            method: 'DELETE',
            body: JSON.stringify(data)
        });
    }

    // Dashboard API
    async getDashboardStats() {
        return this.get('dashboard.php');
    }

    // Customers API
    async getCustomers(params = {}) {
        return this.get('customers.php', params);
    }

    async getCustomer(id) {
        return this.get('customers.php', { id });
    }

    async createCustomer(data) {
        return this.post('customers.php', data);
    }

    async updateCustomer(data) {
        return this.put('customers.php', data);
    }

    async deleteCustomer(id) {
        return this.delete('customers.php', { id });
    }

    // Products API
    async getProducts(params = {}) {
        return this.get('products.php', params);
    }

    async getProduct(id) {
        return this.get('products.php', { id });
    }

    async createProduct(data) {
        return this.post('products.php', data);
    }

    async updateProduct(data) {
        return this.put('products.php', data);
    }

    async deleteProduct(id) {
        return this.delete('products.php', { id });
    }

    // Orders API
    async getOrders(params = {}) {
        return this.get('orders.php', params);
    }

    async getOrder(id) {
        return this.get('orders.php', { id });
    }

    async createOrder(data) {
        return this.post('orders.php', data);
    }

    async updateOrder(data) {
        return this.put('orders.php', data);
    }

    async deleteOrder(id) {
        return this.delete('orders.php', { id });
    }
}

// Create global API instance
const API = new APIService();
