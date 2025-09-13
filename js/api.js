/**
 * Утилиты для работы с API
 */

class API {
    constructor() {
        this.baseURL = 'https://portaldata.ru/api';
    }

    /**
     * Выполнение GET запроса
     */
    async get(endpoint, options = {}) {
        return this.request(endpoint, {
            method: 'GET',
            ...options
        });
    }

    /**
     * Выполнение POST запроса
     */
    async post(endpoint, data = null, options = {}) {
        return this.request(endpoint, {
            method: 'POST',
            body: data ? JSON.stringify(data) : null,
            ...options
        });
    }

    /**
     * Выполнение PUT запроса
     */
    async put(endpoint, data = null, options = {}) {
        return this.request(endpoint, {
            method: 'PUT',
            body: data ? JSON.stringify(data) : null,
            ...options
        });
    }

    /**
     * Выполнение DELETE запроса
     */
    async delete(endpoint, options = {}) {
        return this.request(endpoint, {
            method: 'DELETE',
            ...options
        });
    }

    /**
     * Выполнение запроса с автоматическим управлением токенами
     */
    async request(endpoint, options = {}) {
        const url = `${this.baseURL}${endpoint}`;
        
        try {
            // Добавляем заголовки авторизации
            const headers = {
                'Content-Type': 'application/json',
                ...options.headers
            };

            if (window.AUTH_TOKEN) {
                headers['Authorization'] = `Bearer ${window.AUTH_TOKEN}`;
            }

            const response = await fetch(url, {
                ...options,
                headers
            });
            
            // Проверяем статус ответа
            if (!response.ok) {
                const errorData = await response.json().catch(() => ({}));
                throw new APIError(response.status, response.statusText, errorData);
            }
            
            // Парсим JSON ответ
            const data = await response.json();
            return data;
            
        } catch (error) {
            if (error instanceof APIError) {
                throw error;
            }
            
            // Обрабатываем сетевые ошибки
            console.error('❌ API запрос не выполнен:', error);
            throw new APIError(0, 'Network Error', { message: error.message });
        }
    }

    /**
     * Сохранение ИНН пользователя
     */
    async saveINN(inn) {
        try {
            const response = await this.post('/user/set-inn', { inn });
            return response;
        } catch (error) {
            console.error('❌ Ошибка сохранения ИНН:', error);
            throw error;
        }
    }

    /**
     * Получение API ключа
     */
    async getAPIKey() {
        try {
            const response = await this.post('/user/generate-api-key', {
                email: window.user?.email,
                token: window.AUTH_TOKEN
            });
            return response.api_key;
        } catch (error) {
            console.error('❌ Ошибка получения API ключа:', error);
            throw error;
        }
    }

    /**
     * Генерация нового API ключа
     */
    async generateNewAPIKey() {
        try {
            const response = await this.post('/user/generate-api-key', {
                email: window.user?.email,
                token: window.AUTH_TOKEN,
                revoke: 1
            });
            return response.api_key;
        } catch (error) {
            console.error('❌ Ошибка генерации API ключа:', error);
            throw error;
        }
    }

    /**
     * Получение подсказок ИНН от DaData через userapi
     */
    async getDadataInns(query) {
        try {
            const response = await this.get(`/suggest/party?query=${encodeURIComponent(query)}&count=10`);
            return response.data.suggestions;
        } catch (error) {
            console.error('❌ Ошибка получения подсказок ИНН:', error);
            throw error;
        }
    }
}

/**
 * Класс для ошибок API
 */
class APIError extends Error {
    constructor(status, statusText, data = {}) {
        super(data.message || statusText || 'API Error');
        this.name = 'APIError';
        this.status = status;
        this.statusText = statusText;
        this.data = data;
    }
}

// Создаем глобальный экземпляр API
window.api = new API();

// Экспортируем для использования в других модулях
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { API, APIError };
}


