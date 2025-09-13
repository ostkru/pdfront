export class ContentLoader {
  constructor() {
    this.currentContent = null;
    this.version = Date.now(); // Добавляем версию для избежания кэширования
  }

  async loadPageContent(pageName, forceUpdate = false) {
    try {
      // Добавляем параметр версии для избежания кэширования
      const { contentData } = await import(`../data/content.js?version=${this.version}`);
      
      // Если контент не изменился и не требуется принудительное обновление
      if (!forceUpdate && JSON.stringify(this.currentContent) === JSON.stringify(contentData[pageName])) {
        return;
      }

      this.currentContent = contentData[pageName] || contentData.home;
      await this.renderContent(this.currentContent);
      
      // Возвращаем данные для возможного использования
      return this.currentContent;
    } catch (error) {
      console.error('Error loading content:', error);
      throw error;
    }
  }

  async renderContent(data, parentSelector = null) {
    const parent = parentSelector ? document.querySelector(parentSelector) : document;
    
    // Очищаем предыдущие обработчики событий
    this.clearEventListeners();
    
    for (const [key, value] of Object.entries(data)) {
      const elements = parent.querySelectorAll(`.${key}`);
      
      elements.forEach(element => {
        if (Array.isArray(value)) {
          if (element.classList.contains('dropdown-list') || 
              element.classList.contains('navigation')) {
            this.renderList(element, value);
          } else {
            element.textContent = value.join(' ');
          }
        } else if (typeof value === 'object') {
          this.renderContent(value, `.${key}`);
        } else {
          if (element.tagName === 'INPUT' && element.type !== 'submit') {
            element.placeholder = value