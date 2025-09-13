document.addEventListener('userready', async () => {
    // Проверяем, что пользователь авторизован
    if (!window.user) {
        console.log('Пользователь не авторизован, перенаправляем на главную страницу');
        window.location.href = '/index.php';
        return;
    }
    
    if (!window.user.verify) {
        alert('Мы ожидаем подтверждение почты. Перейдите по ссылке, которая была отправлена на Вашу почту!');

        const cabinet_blocks = document.querySelectorAll('.dashboard__block');

        cabinet_blocks.forEach(cabinet_block => {
            cabinet_block.insertAdjacentHTML('beforeend', `
                <span class="dashboard__blur">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-off-icon lucide-eye-off"><path d="M10.733 5.076a10.744 10.744 0 0 1 11.205 6.575 1 1 0 0 1 0 .696 10.747 10.747 0 0 1-1.444 2.49"/><path d="M14.084 14.158a3 3 0 0 1-4.242-4.242"/><path d="M17.479 17.499a10.75 10.75 0 0 1-15.417-5.151 1 1 0 0 1 0-.696 10.75 10.75 0 0 1 4.446-5.143"/><path d="m2 2 20 20"/></svg>
                
                    Почта не подтверждена!
                </span>
            `);
        });
        
        return;
    }
    const el_api_key_container = document.querySelector('.api-key');
    if (el_api_key_container) {
        const el_api_key      = el_api_key_container.querySelector('#api-key');
        const el_copy_btn     = el_api_key_container.querySelector('[data-copy]');
        const el_generate_btn = el_api_key_container.querySelector('.api-key__generate');
        // 1. Сначала показываем из localStorage
        let cachedApiKey = localStorage.getItem('apiKey');
        if (cachedApiKey) {
            el_api_key.textContent = cachedApiKey;
            el_copy_btn.setAttribute('data-copy', cachedApiKey);
        }
        // 2. Потом обновляем с сервера
        let api_key = await window.api.getAPIKey();
        if (api_key && api_key !== cachedApiKey) {
            el_api_key.textContent = api_key;
            el_copy_btn.setAttribute('data-copy', api_key);
            localStorage.setItem('apiKey', api_key);
        }
        el_generate_btn.addEventListener('click', async () => {
            const let_generate = confirm('Вы уверены, что хотите сгенерировать новый ключ? Интеграции со старым ключом перестанут работать.');
            if (!let_generate) return;
            api_key = await window.api.generateNewAPIKey();
            if (api_key) {
                el_api_key.textContent = api_key;
                el_copy_btn.setAttribute('data-copy', api_key);
                localStorage.setItem('apiKey', api_key);
            }
        });
    }

    // === КЭШ ИНН ===
    const el_inn_form   = document.querySelector('#inn-form');
    const el_inn_field  = document.querySelector('#inn-field');
    const el_inn_status = document.querySelector('#inn-status');
    let   inn_timeout = null;
    const innInput = el_inn_field.querySelector('input');
    // 1. Сначала показываем из localStorage
    let cachedInn = localStorage.getItem('userInn');
    if (cachedInn) {
        innInput.value = cachedInn;
    } else {
        innInput.value = window.user.inn || '';
    }
    // 2. При изменении сохраняем в localStorage и проверяем на автосохранение
    let autoSaveTimeout = null;
    innInput.addEventListener('input', function() {
        const value = innInput.value.trim();
        localStorage.setItem('userInn', value);
        
        // Автосохранение при вводе валидного ИНН (только если отличается от текущего)
        if (/^\d{10,12}$/.test(value) && value !== window.user.inn && value !== '') {
            clearTimeout(autoSaveTimeout);
            autoSaveTimeout = setTimeout(async () => {
                try {
                    await window.api.saveINN(value);
                    
                    // Обновляем данные пользователя
                    window.user.inn = value;
                    window.user.verify_inn = false;
                    
                    // Показываем уведомление об успешном сохранении
                    showAlert('ИНН автоматически сохранен', 'success');
                    
                    // Обновляем статус ИНН
                    renderInnStatus(el_inn_status, value, false);
                    
                } catch (error) {
                    console.error('Ошибка автоматического сохранения ИНН:', error);
                    if (error.data && error.data.code === 'INN_EXISTS') {
                        showAlert('Данный ИНН уже используется другим пользователем. Введите другой ИНН.', 'error');
                        // Очищаем поле ввода, если ИНН уже используется
                        innInput.value = '';
                    } else {
                        showAlert('Ошибка сохранения ИНН: ' + error.message, 'error');
                    }
                }
            }, 2000); // Сохраняем через 2 секунды после окончания ввода
        }
    });
    
    // Функция для загрузки подсказок
    const loadSuggestions = async (query) => {
        if (query.length >= 3) {
            try {
                const suggestions = await window.api.getDadataInns(query);
                renderSuggestions(
                    el_inn_field.querySelector('.autocomplete__suggestions'),
                    suggestions,
                    query
                );

                // Добавляем обработчики для выбора подсказок
                el_inn_field.querySelectorAll('.autocomplete__suggestions li').forEach(sg => {
                    sg.addEventListener('mousedown', async () => {
                        const selectedInn = sg.dataset.inn;
                        el_inn_field.querySelector('input').value = selectedInn;
                        
                        // Автоматически сохраняем выбранный ИНН
                        if (selectedInn && selectedInn !== window.user.inn) {
                            try {
                                await window.api.saveINN(selectedInn);
                                localStorage.setItem('userInn', selectedInn);
                                
                                // Обновляем данные пользователя
                                window.user.inn = selectedInn;
                                window.user.verify_inn = false;
                                
                                // Показываем уведомление об успешном сохранении
                                showAlert('ИНН автоматически сохранен', 'success');
                                
                                // Обновляем статус ИНН
                                renderInnStatus(el_inn_status, selectedInn, false);
                                
                            } catch (error) {
                                console.error('Ошибка автоматического сохранения ИНН:', error);
                                if (error.data && error.data.code === 'INN_EXISTS') {
                                    showAlert('Данный ИНН уже используется другим пользователем. Выберите другой ИНН.', 'error');
                                    // Очищаем поле ввода, если ИНН уже используется
                                    el_inn_field.querySelector('input').value = '';
                                } else {
                                    showAlert('Ошибка сохранения ИНН: ' + error.message, 'error');
                                }
                            }
                        }
                    });
                });
            } catch (error) {
                console.error('Ошибка загрузки подсказок:', error);
                renderSuggestions(
                    el_inn_field.querySelector('.autocomplete__suggestions'),
                    [],
                    query
                );
            }
        } else {
            renderSuggestions(
                el_inn_field.querySelector('.autocomplete__suggestions'),
                [],
                query
            );
        }
    };

    // Обработчик события focus
    el_inn_field.querySelector('input').addEventListener('focus', async e => {
        const query = e.target.value.trim();
        await loadSuggestions(query);
    });

    // Обработчик события input для загрузки подсказок при вводе
    el_inn_field.querySelector('input').addEventListener('input', async e => {
        const query = e.target.value.trim();
        await loadSuggestions(query);
    });


    
    if (window.user.inn) {
        renderInnStatus(el_inn_status, window.user.inn, window.user.verify_inn);
        
        if (!window.user.verify_inn) document.addEventListener("visibilitychange", () => document.visibilityState === 'visible' && window.location.reload());
    }
    
    // === ГЕНЕРАЦИЯ PDF СЧЕТА ===
    const pdfInvoiceSection = document.getElementById('pdf-invoice-section');
    const generatePdfInvoiceBtn = document.getElementById('generate-pdf-invoice-btn');
    const pdfInvoiceResult = document.getElementById('pdf-invoice-result');
    
    // Показываем секцию генерации PDF, если есть ИНН
    if (window.user.inn && pdfInvoiceSection) {
        pdfInvoiceSection.style.display = 'block';
    }
    
    // Обработчик для кнопки генерации PDF счета
    if (generatePdfInvoiceBtn) {
        generatePdfInvoiceBtn.addEventListener('click', async function() {
            const inn = innInput.value.trim();
            const email = window.user?.email || '';
            const token = window.AUTH_TOKEN || '';
            
            if (!inn || !/^\d{10,12}$/.test(inn)) {
                pdfInvoiceResult.innerHTML = '<span style="color:red;">Пожалуйста, укажите корректный ИНН для генерации счета.</span>';
                return;
            }
            
            if (!email) {
                pdfInvoiceResult.innerHTML = '<span style="color:red;">Email пользователя не найден.</span>';
                return;
            }
            
            if (!token) {
                pdfInvoiceResult.innerHTML = '<span style="color:red;">Токен авторизации не найден.</span>';
                return;
            }
            
            // Показываем индикатор загрузки
            generatePdfInvoiceBtn.disabled = true;
            generatePdfInvoiceBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px; animation: spin 1s linear infinite;">
                    <path d="M21 12a9 9 0 11-6.219-8.56"/>
                </svg>
                Генерация счета...
            `;
            pdfInvoiceResult.innerHTML = '';
            
            try {
                // Генерируем PDF счет через Go API
                const pdfUrl = `https://portaldata.ru/api/buh/makeinvoice?inn=${encodeURIComponent(inn)}&email=${encodeURIComponent(email)}&token=${encodeURIComponent(token)}`;
                
                // Создаем ссылку для скачивания PDF
                const downloadLink = document.createElement('a');
                downloadLink.href = pdfUrl;
                downloadLink.download = `invoice_${inn}_${new Date().toISOString().slice(0,10)}.pdf`;
                downloadLink.target = '_blank';
                downloadLink.className = 'primary-btn';
                downloadLink.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px;">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7,10 12,15 17,10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                    Скачать PDF счет
                `;
                
                // Также добавляем ссылку для просмотра HTML версии
                const htmlUrl = `https://portaldata.ru/api/buh/makeinvoice.html?inn=${encodeURIComponent(inn)}&email=${encodeURIComponent(email)}&token=${encodeURIComponent(token)}`;
                const viewLink = document.createElement('a');
                viewLink.href = htmlUrl;
                viewLink.target = '_blank';
                viewLink.className = 'primary-btn primary-btn--outline';
                viewLink.style.marginLeft = '10px';
                viewLink.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px;">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                    Просмотреть HTML
                `;
                
                pdfInvoiceResult.appendChild(downloadLink);
                pdfInvoiceResult.appendChild(viewLink);
                
                // Автоматически скачиваем PDF
                downloadLink.click();
                
            } catch (error) {
                console.error('Ошибка генерации PDF счета:', error);
                pdfInvoiceResult.innerHTML = '<span style="color:red;">Ошибка генерации счета: ' + error.message + '</span>';
            } finally {
                // Восстанавливаем кнопку
                generatePdfInvoiceBtn.disabled = false;
                generatePdfInvoiceBtn.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px;">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14,2 14,8 20,8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10,9 9,9 8,9"/>
                    </svg>
                    Сгенерировать счет на оплату
                `;
            }
        });
    }
    
    // Показываем секцию генерации PDF при изменении ИНН
    innInput.addEventListener('input', function() {
        const value = innInput.value.trim();
        if (pdfInvoiceSection) {
            if (/^\d{10,12}$/.test(value)) {
                pdfInvoiceSection.style.display = 'block';
            } else {
                pdfInvoiceSection.style.display = 'none';
            }
        }
    });
    
    // Дублирующий код генерации API ключей удален - используется единый подход через el_generate_btn
    
    // Копирование API ключа
    document.getElementById('copy-btn')?.addEventListener('click', copyApiKey);
    
    // === ПОПОЛНЕНИЕ БАЛАНСА ===
    const topupBtn = document.getElementById('balance-topup-btn');
    const topupForm = document.getElementById('balance-topup-form');
    const topupAmount = document.getElementById('topup-amount');
    const createInvoiceBtn = document.getElementById('create-invoice-btn');
    const invoiceResult = document.getElementById('invoice-result');
    if (topupBtn && topupForm && topupAmount && createInvoiceBtn && invoiceResult) {
        topupBtn.addEventListener('click', function() {
            topupForm.style.display = topupForm.style.display === 'none' ? 'block' : 'none';
            invoiceResult.innerHTML = '';
        });
        createInvoiceBtn.addEventListener('click', function() {
            const inn = innInput.value.trim();
            const email = window.user?.email || '';
            const token = window.AUTH_TOKEN || '';
            const amount = parseInt(topupAmount.value, 10);
            if (!inn || !/^\d{10,12}$/.test(inn)) {
                invoiceResult.innerHTML = '<span style="color:red;">Пожалуйста, укажите корректный ИНН для выставления счета.</span>';
                return;
            }
            if (!amount || amount < 1) {
                invoiceResult.innerHTML = '<span style="color:red;">Пожалуйста, введите сумму пополнения.</span>';
                return;
            }
            // Формируем ссылку на счет через Go API
            const url = `https://portaldata.ru/api/buh/makeinvoice?inn=${encodeURIComponent(inn)}&email=${encodeURIComponent(email)}&token=${encodeURIComponent(token)}`;
            invoiceResult.innerHTML = `<a href="${url}" target="_blank" class="primary-btn">Открыть счет на оплату на ${amount} ₽</a>`;
        });
    }
    
    // Функции помощники
    function showAlert(message, type) {
        const alertBox = document.getElementById('alert');
        if (!alertBox) return;

        alertBox.textContent = message;
        alertBox.className = 'alert';
        alertBox.classList.add(`alert-${type}`);
        alertBox.style.display = 'block';
        
        setTimeout(() => {
            alertBox.style.display = 'none';
        }, 5000);
    }
    
    // Функция generateApiKey удалена - теперь используется window.api.generateNewAPIKey()
    
    function copyApiKey() {
        const apiKey = document.getElementById('api-key').textContent;
        if (!apiKey) return;
        navigator.clipboard.writeText(apiKey)
            .then(() => {
                const originalText = this.textContent;
                this.textContent = '✓ Скопировано!';
                
                setTimeout(() => {
                    this.textContent = originalText;
                }, 2000);
            })
            .catch(err => {
                showAlert('Не удалось скопировать ключ', 'error');
                console.error('Ошибка копирования: ', err);
            });
    }
});

// Функции getDadataInns и getApiKey удалены - теперь используются методы из window.api

function renderSuggestions(container, suggestions, query) {
    container.innerHTML = '';

    suggestions.forEach(sg => {
        const sg_el = document.createElement('li');

        let text = `${sg.data.inn || ''} ${sg.value || ''}`;
        
        sg_el.innerHTML = text.replace(new RegExp(query, 'gi'), match => `<span class="autocomplete__match">${match}</span>`);
        sg_el.setAttribute('data-inn', sg.data.inn);

        container.insertAdjacentElement('beforeend', sg_el);
    });
}

// Автоматическое сохранение ИНН происходит при вводе и выборе из подсказок

async function renderInnStatus(el, inn, status) {
    if (status) {
        el.classList.add('status', 'status--success');

        el.innerHTML = '';
        el.insertAdjacentHTML('beforeend', `
            <div class="status__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="M20 6 9 17l-5-5"/></svg>
            </div>
            <div class="status__main">
                <div class="status__text">
                    <div class="status__title">${inn}</div>
                    <div class="status__descr">ИНН подтвержден</div>
                </div>
            </div>
        `);
    } else {
        el.classList.add('status', 'status--error');

        el.innerHTML = '';
        el.insertAdjacentHTML('beforeend', `
            <div class="status__icon status__icon--inn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2 2 22"/><circle cx="12" cy="12" r="10"/></svg>
            </div>
            <div class="status__main">
                <div class="status__text">
                    <div class="status__descr status__descr--inn">ИНН ${inn} не подтвержден, на текущий момент вы можете подтвердить ИНН организации отправкой платежа 100 руб (без НДС) по счету.</div>
                </div>
                <div class="status__append">
                    <a href="https://portaldata.ru/api/buh/makeinvoice?inn=${inn}&email=${window.user.email}&token=${window.AUTH_TOKEN}" target="_blank" class="primary-btn">Подтвердить</a>
                </div>
            </div>
        `);
    }
}