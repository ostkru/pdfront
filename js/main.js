"use strict";

const API_ENDPOINT = 'https://portaldata.ru/api';

const ERRORS = {
    'user_exists': 'Пользователь с такой почтой уже существует',
    'account_already_verified': 'Почта аккаунта уже верифицирована',
    'Недействительный или истекший токен': 'Токен верификации недействителен или истек. Пожалуйста, запросите новое письмо подтверждения.',
};

const AUTH_TOKEN = localStorage.getItem('token') || null;

window.AUTH_TOKEN   = AUTH_TOKEN || undefined;
window.API_ENDPOINT = API_ENDPOINT;

document.addEventListener('DOMContentLoaded', async () => {
    window.user = (await getUser())?.item || undefined;
    
    // ВАЖНО: Устанавливаем поле verify для совместимости с cabinet.js
    if (window.user) {
        window.user.verify = window.user.isVerified || false;
    }
    
    document.dispatchEvent(new CustomEvent('userready'));
    
    const header_right = document.querySelector('.header-right');
    if (window.user) {
        header_right.insertAdjacentHTML('afterbegin', `
            <div class="header-user dropdown">
                <div class="header-user__curr login-link dropdown__trigger">${window.user.name}</div>
                <ul class="header-user__list dropdown__content">
                    <li><a href="/cabinet.php">Личный кабинет</a></li>
		    <li><a href="/balance.php">Пополнить баланс</a></li>
                    <li><a href="#" class="logout-btn">Выйти</a></li>
                </ul>
            </div>
        `);
    } else {
        header_right.insertAdjacentHTML('afterbegin', `
            <button class="login-link" type="button" data-popup="login-popup">Войти в сервис</button>
        `);
    }
    
    
    const overlay = document.querySelector("#popup-overlay");
    
    const openBtns = document.querySelectorAll("[data-popup]");
    const closeBtns = document.querySelectorAll("[data-popup-close]");

    function openPopup(popupId) {
        overlay.querySelectorAll(".popup.show").forEach(p=>p.classList.remove('show'));
        
        const popup = document.getElementById(popupId);
        if (popup && overlay) {
            overlay.classList.add("show");
            popup.classList.add("show");
        }
    }
    
    openBtns.forEach((btn) => {
        const popupId = btn.getAttribute("data-popup");
        if (popupId) {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                openPopup(popupId);
            });
        }
    });
    
    closeBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            const popup = btn.closest(".popup");
            if (popup) {
                closePopup(popup);
            }
        });
    });
    
    if (overlay) {
        overlay.addEventListener("click", (e) => {
            if (e.target === overlay) {
                const openedPopups = overlay.querySelectorAll(".popup.show");
                openedPopups.forEach((popup) => popup.classList.remove("show"));
                overlay.classList.remove("show");
            }
        });
    }
    
    const passed_email_token = (new URL(window.location.href)).searchParams.get('email_token');
    
    if (passed_email_token) await verifyUser(passed_email_token);
    

    const cookie          = document.querySelector('.cookie');
    const cookie_accepted = localStorage.getItem('cookie') || false;
    const cookie_accept   = cookie.querySelector('.cookie__btn');
    if (!cookie_accepted) cookie.classList.add('cookie--active');
    cookie_accept.addEventListener('click', () => {
        cookie.classList.remove('cookie--active');
        localStorage.setItem('cookie', true);
    });

    const copiables = document.querySelectorAll('[data-copy]');
    copiables.forEach(copiable => {
        copiable.addEventListener('click', () => {
            const text = copiable.dataset.copy;
            const el_to_show = document.createElement('span');
            el_to_show.classList.add('copy-done');
            el_to_show.textContent = 'Скопировано!';
            navigator.clipboard.writeText(text);

            if (copiable.querySelector('.copy-done')) return;
            
            copiable.insertAdjacentElement('beforeend', el_to_show);
            setTimeout(() => copiable.querySelector('.copy-done').remove(), 3000);
        });
    });
    
    const body       = document.body;
    const header     = document.querySelector(".header");
    const menuBurger = document.querySelector(".header__burger");
    const hmLinks    = document.querySelectorAll(".header-nav ul li a");
    
    if (menuBurger) {
        menuBurger.onclick = function () {
            body.classList.toggle("no-scroll");
            menuBurger.classList.toggle("open");
            header.classList.toggle("mobile-menu-opened");
        };
    }
    
    for (let link of hmLinks) {
        link.addEventListener("click", () => {
            body.classList.remove("no-scroll");
            menuBurger.classList.remove("open");
            header.classList.remove("mobile-menu-opened");
        });
    }
    
    const popupLinks = document.querySelectorAll("popup-subtitle");
    
    for (let item of popupLinks) {
        popupLinks.addEventListener("click", (evt) => {
            evt.preventDefault();
        });
    }
    
    const logout_btn = document.querySelector('.logout-btn');
    if (logout_btn) {
        logout_btn.addEventListener('click', e => {
            e.preventDefault();
    
            localStorage.removeItem('token');
            window.location.reload();
        });
    }
    
    // Обработка ссылки баланса
    const balance_btn = document.querySelector('a[href="/balance.php"]');
    if (balance_btn) {
        balance_btn.addEventListener('click', e => {
            e.preventDefault();
            alert('На этапе старта проекта действует ограничение на использование платных тарифов. Вам подключен Бесплатный тариф Старт с лимитом 1000 запросов в сутки');
        });
    }
    
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        const trigger = dropdown.querySelector('.dropdown__trigger');

        trigger.addEventListener('click', e => {
            e.preventDefault();

            dropdown.classList.toggle('dropdown--active');
        });

        document.addEventListener("click", (e) => {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove('dropdown--active');
            }
        });
    });
    
    // Проверка авторизации при переходе в кабинет
    document.addEventListener('click', function(e) {
        if (e.target.matches('a[href="/cabinet.php"]')) {
            e.preventDefault();
            
            if (!window.AUTH_TOKEN) {
                // Если пользователь не авторизован, показываем попап входа
                openPopup('login-popup');
            } else {
                // Если авторизован, переходим в кабинет
                window.location.href = '/cabinet.php';
            }
        }
    });
    
    if (window.innerWidth > 768) {
        if (document.querySelector('.address__slider')) {
            new Swiper('.address__slider .swiper', {
                slidesPerView: 'auto',
                spaceBetween: 20,
                navigation: {
                    prevEl: '.address-btn-prev',
                    nextEl: '.address-btn-next'
                }
            });
        }
    }

    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', e => {
            const required_checkboxes = form.querySelectorAll('[data-required-checkbox]');

            required_checkboxes.forEach(required_checkbox => {
                if (!required_checkbox.checked) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    alert(required_checkbox.dataset.requiredCheckbox);
                }
            });
        });
    });
    
    const reg_popup = document.querySelector('#registration-popup');
    const reg_form  = document.querySelector('#registration-form');
    
    if (reg_form) {
        reg_form.addEventListener('submit', async e => {
            e.preventDefault();
    
            const { name, email, password } = reg_form;
    
            const resp = await fetch(window.API_ENDPOINT + '/user/registration', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ name: name.value, email: email.value, password: password.value })
            });
    
            const data = await resp.json();
            
            if (data.item) {
                closePopup(reg_popup);
                openPopup('registration-success-popup');
            } else if (data.message && data.code) {
                if (data.code === 300) {
                    const error = data.payload.map(p=>Object.values(p).map(e=>e.message)).map(p=>p.join('\n')).join('\n');
    
                    alert(error);
                } else {
                    alert(ERRORS[data.message] || 'Неизвестная ошибка. Повторите позже');
                }
            } else {
                alert('Неизвестная ошибка. Повторите позже');
            }
        });
    }
    
    const login_form = document.querySelector('#login-form');
    
    if (login_form) {
        login_form.addEventListener('submit', async e => {
            e.preventDefault();
    
            const { email, password } = login_form;
    
            const resp = await fetch(window.API_ENDPOINT + '/authentication_token', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email: email.value, password: password.value })
            });
    
            const data = await resp.json();
    
            if (data.token) {
                localStorage.setItem('token', data.token);
    
                const email_token = (new URL(window.location.href)).searchParams.get('email_token');
                if (email_token) window.location.href = '/';
                else             window.location.reload();
    
            } else if (data.message && data.code) {
                if (data.code === 401) {
                    alert('Неправильные данные');
                } else {
                    alert(ERRORS[data.message] || 'Неизвестная ошибка. Повторите позже');
                }
            }
        });
    }
    
    async function getUser() {
        try {
            const resp = await fetch(window.API_ENDPOINT + '/user/data', {
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + window.AUTH_TOKEN
                }
            });
            
            const data = await resp.json();
        
            return data;
        } catch (e) {
            alert(e.message);
        }
    }
    
    async function verifyUser(token) {
        const resp = await fetch(window.API_ENDPOINT + '/user/verify', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ token })
        });
    
        const data = await resp.json();

        if (data.code === 200) {
            // Email успешно подтвержден - обновляем состояние пользователя
            try {
                // Получаем обновленные данные пользователя
                const userResp = await fetch(window.API_ENDPOINT + '/user/data', {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${window.AUTH_TOKEN}`
                    }
                });
                
                if (userResp.ok) {
                    const userData = await userResp.json();
                    if (userData.success && userData.item) {
                        // Обновляем глобальные переменные
                        window.user = userData.item;
                        window.AUTH_TOKEN = localStorage.getItem('token');
                        
                        // ВАЖНО: Обновляем поле verify для совместимости с cabinet.js
                        if (userData.item.isVerified) {
                            window.user.verify = true;  // ← Это поле проверяет cabinet.js
                        } else {
                            window.user.verify = false; // Явно устанавливаем false если не верифицирован
                        }
                        
                        // Обновляем UI - показываем верифицированного пользователя
                        updateHeaderForVerifiedUser(userData.item);
                        
                        console.log('✅ Пользователь успешно верифицирован:', userData.item);
                        
                        // Генерируем событие userready для переинициализации кабинета
                        document.dispatchEvent(new CustomEvent('userready'));
                    }
                }
            } catch (error) {
                console.error('⚠️ Ошибка при обновлении данных пользователя:', error);
            }
            
            openPopup('success-verify-popup');
        } else if (data.code === 310) {
            alert(ERRORS[data.message] || 'Неизвестная ошибка. Повторите позже');
        }
    }
    
    // Функция для обновления UI после верификации
    function updateHeaderForVerifiedUser(user) {
        const headerRight = document.querySelector('.header-right');
        if (headerRight && user.isVerified) {
            // Удаляем старую кнопку входа, если есть
            const oldLoginBtn = headerRight.querySelector('.login-link');
            if (oldLoginBtn) {
                oldLoginBtn.remove();
            }
            
            // Добавляем информацию о верифицированном пользователе
            if (!headerRight.querySelector('.header-user')) {
                headerRight.insertAdjacentHTML('afterbegin', `
                    <div class="header-user dropdown">
                        <div class="header-user__curr login-link dropdown__trigger">${user.name}</div>
                        <ul class="header-user__list dropdown__content">
                            <li><a href="/cabinet.php">Личный кабинет</a></li>
                            <li><a href="/balance.php">Пополнить баланс</a></li>
                            <li><a href="#" class="logout-btn">Выйти</a></li>
                        </ul>
                    </div>
                `);
            }
        }
    }
    
    const dropdown = document.querySelector(".dropdown-link");
    
    if (dropdown) {
        const toggle = dropdown.querySelector("a");
    
        toggle.addEventListener("click", (e) => {
            e.preventDefault();
            dropdown.classList.toggle("dropdown-open");
        });
    
        document.addEventListener("click", (e) => {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove("dropdown-open");
            }
        });
    }
    
    // closeRegistrBtn.addEventListener("click", () => {
    //     document.querySelector("#registration-popup").classList.remove("show");
    // });
    
    function closePopup(popup) {
        popup.classList.remove("show");
        const openedPopups = overlay.querySelectorAll(".popup.show");
        if (openedPopups.length === 0) {
            overlay.classList.remove("show");
        }
    }

    // --- Восстановление пароля ---
    document.body.addEventListener('click', function(e) {
        if (e.target.classList.contains('forgot-password-link')) {
            openPopup('forgot-password-popup');
        }
    });

    // Обработка формы восстановления пароля
    const forgotForm = document.getElementById('forgot-password-form');
    if (forgotForm) {
        forgotForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const email = forgotForm.email.value;
            const resp = await fetch(window.API_ENDPOINT + '/user/create_password_reset', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ email })
            });
            const data = await resp.json();
            if (data.code === 200) {
                alert('Письмо для восстановления отправлено!');
                closePopup(document.getElementById('forgot-password-popup'));
            } else {
                alert('Ошибка: ' + (data.message || ''));
            }
        });
    }

    // --- Автоматическое открытие попапа смены пароля по токену из URL ---
    const urlParams = new URLSearchParams(window.location.search);
    const resetToken = urlParams.get('password_reset_token');
    if (resetToken) {
        openPopup('reset-password-popup');
    }

    // Обработка формы смены пароля по токену
    const resetForm = document.getElementById('reset-password-form');
    if (resetForm) {
        resetForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const urlParams = new URLSearchParams(window.location.search);
            const token = urlParams.get('password_reset_token');
            const newPassword = resetForm.newPassword.value;
            if (!token) {
                alert('Некорректная ссылка для восстановления!');
                return;
            }
            const resp = await fetch(window.API_ENDPOINT + '/user/password_reset/' + encodeURIComponent(token), {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ newPassword })
            });
            const data = await resp.json();
            if (data.code === 200) {
                alert('Пароль успешно изменён!');
                closePopup(document.getElementById('reset-password-popup'));
                openPopup('login-popup');
            } else {
                alert('Ошибка: ' + (data.message || ''));
            }
        });
    }
});
