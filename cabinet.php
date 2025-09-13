<?php include 'elements/header.php'; ?>

        <main class="main">
            <div class="_container">
                <div class="dashboard">
                    <h2 class="dashboard__title section-title">Личный кабинет</h2>
                    
                    <div id="alert" class="alert"></div>

                    <div class="dashboard__block">
                        <div class="dashboard__subtitle">API ключ</div>

                        
                        <div class="api-key">
                            <div class="api-key__lbl">Используйте этот ключ для доступа к API сервиса. Никому не сообщайте ваш ключ.</div>
                            <div class="api-key__content">
                                <div class="api-key__main">
                                    <div id="api-key" class="api-key__key"></div>
                                    <button type="button" class="api-key__copy" data-copy="" aria-label="Скопировать API ключ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect width="14" height="14" x="8" y="8" rx="2" ry="2"/>
                                            <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/>
                                        </svg>
                                    </button>
                                </div>
                                <button type="button" class="api-key__generate primary-btn primary-btn--lg" aria-label="Сгенерировать новый API ключ">Сгенерировать новый ключ</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="dashboard__block">
                        <div class="dashboard__subtitle">Ваше предприятие</div>
                        <form id="inn-form">
                            <div id="inn-field" class="autocomplete">
                                <div class="autocomplete__field">
                                    <div class="field">
                                        <label class="field__lbl">ИНН организации или ИП</label>
                                        <div class="field__main">
                                            <input type="text" class="field__inp" placeholder="ИНН" name="inn" required>
                                        </div>
                                    </div>
                                </div>
                                <ul class="autocomplete__suggestions"></ul>
                            </div>
                            <!-- <div class="input-container">
                                <input 
                                    type="text" 
                                    id="inn" 
                                    class="form-input" 
                                    placeholder="Введите ваш ИНН" 
                                    maxlength="12"
                                    value="7707083893"
                                />
                                <div id="suggestions" class="suggestions" style="display: none;"></div>
                            </div> -->
                            <small class="form-text">10 или 12 цифр</small><br>
                            
                        </form>
                        <br>
                        <div id="inn-status"></div>
                        
                        <!-- Кнопка для генерации PDF счета -->
                        <div id="pdf-invoice-section" style="margin-top: 20px; display: none;">
                            <button type="button" id="generate-pdf-invoice-btn" class="primary-btn primary-btn--lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px;">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14,2 14,8 20,8"/>
                                    <line x1="16" y1="13" x2="8" y2="13"/>
                                    <line x1="16" y1="17" x2="8" y2="17"/>
                                    <polyline points="10,9 9,9 8,9"/>
                                </svg>
                                Сгенерировать счет на оплату
                            </button>
                            <div id="pdf-invoice-result" style="margin-top: 10px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

	<?php include 'elements/footer.php'; ?>
    </div>

    <div class="cookie">
		<div class="cookie__text">Используем куки для улучшения работы сайта</div>
		<button class="cookie__btn primary-btn" type="button">ОК</button>
	</div>

	<div id="popup-overlay" class="popup-overlay">
		<div id="login-popup" class="popup">
			<button class="close-popup-btn" type="button" aria-label="Закрыть попап" data-popup-close></button>

			<img class="popup-logo" src="./img/logo.svg" alt="logo" />
			<div class="popup-subtitle">Войдите или <a href="#" data-popup="registration-popup">зарегистрируйтесь</a></div>

			<form id="login-form" class="popup-form" action="#">
				<div class="fields">
					<div class="field">
						<div class="field__main">
							<div class="field__prepend">
								<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M16.5 5.75L9.7725 10.025C9.54095 10.1701 9.27324 10.247 9 10.247C8.72676 10.247 8.45905 10.1701 8.2275 10.025L1.5 5.75M3 3.5H15C15.8284 3.5 16.5 4.17157 16.5 5V14C16.5 14.8284 15.8284 15.5 15 15.5H3C2.17157 15.5 1.5 14.8284 1.5 14V5C1.5 4.17157 2.17157 3.5 3 3.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
							<input type="text" class="field__inp" name="email" placeholder="Почта" required>
						</div>
					</div>
					<div class="field">
						<div class="field__main">
							<div class="field__prepend">
								<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5.25 8.75V5.75C5.25 4.75544 5.64509 3.80161 6.34835 3.09835C7.05161 2.39509 8.00544 2 9 2C9.99456 2 10.9484 2.39509 11.6517 3.09835C12.3549 3.80161 12.75 4.75544 12.75 5.75V8.75M3.75 8.75H14.25C15.0784 8.75 15.75 9.42157 15.75 10.25V15.5C15.75 16.3284 15.0784 17 14.25 17H3.75C2.92157 17 2.25 16.3284 2.25 15.5V10.25C2.25 9.42157 2.92157 8.75 3.75 8.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
							<input type="password" class="field__inp" name="password" placeholder="Пароль" required>
						</div>
					</div>
				</div>

				<!-- <div class="popup-input-item">
					<label class="popup-checkbox-label">
						<input type="checkbox" class="popup-checkbox" checked required />
						<span class="custom-checkbox"></span>
						<span class="checkbox-text"> Запомнить меня </span>
					</label>

					<a class="rm-link" href="#">Запомнить меня</a>
				</div> -->

				<div class="popup-input-item popup-input-item--submit">
					<input type="submit" class="popup-submit-btn" value="Войти в систему" />
				</div>
			</form>
		</div>

		<div id="registration-popup" class="popup">
			<button class="close-popup-btn" type="button" aria-label="Закрыть попап" data-popup-close></button>

			<img class="popup-logo" src="./img/logo.svg" alt="logo" />
			<div class="popup-subtitle"><a href="#" class="close-registration-popup" data-popup="login-popup">Войдите</a> или зарегистрируйтесь</div>

			<form id="registration-form" class="popup-form" action="#">
				<div class="fields">
					<div class="field">
						<div class="field__main">
							<div class="field__prepend">
								<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M14.25 16.25V14.75C14.25 13.9544 13.9339 13.1913 13.3713 12.6287C12.8087 12.0661 12.0456 11.75 11.25 11.75H6.75C5.95435 11.75 5.19129 12.0661 4.62868 12.6287C4.06607 13.1913 3.75 13.9544 3.75 14.75V16.25M12 5.75C12 7.40685 10.6569 8.75 9 8.75C7.34315 8.75 6 7.40685 6 5.75C6 4.09315 7.34315 2.75 9 2.75C10.6569 2.75 12 4.09315 12 5.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
							<input type="text" class="field__inp" name="name" placeholder="Имя" required>
						</div>
					</div>
					<div class="field">
						<div class="field__main">
							<div class="field__prepend">
								<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M16.5 5.75L9.7725 10.025C9.54095 10.1701 9.27324 10.247 9 10.247C8.72676 10.247 8.45905 10.1701 8.2275 10.025L1.5 5.75M3 3.5H15C15.8284 3.5 16.5 4.17157 16.5 5V14C16.5 14.8284 15.8284 15.5 15 15.5H3C2.17157 15.5 1.5 14.8284 1.5 14V5C1.5 4.17157 2.17157 3.5 3 3.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
							<input type="text" class="field__inp" name="email" placeholder="Почта" required>
						</div>
					</div>
					<div class="field">
						<div class="field__main">
							<div class="field__prepend">
								<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5.25 8.75V5.75C5.25 4.75544 5.64509 3.80161 6.34835 3.09835C7.05161 2.39509 8.00544 2 9 2C9.99456 2 10.9484 2.39509 11.6517 3.09835C12.3549 3.80161 12.75 4.75544 12.75 5.75V8.75M3.75 8.75H14.25C15.0784 8.75 15.75 9.42157 15.75 10.25V15.5C15.75 16.3284 15.0784 17 14.25 17H3.75C2.92157 17 2.25 16.3284 2.25 15.5V10.25C2.25 9.42157 2.92157 8.75 3.75 8.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
							<input type="password" class="field__inp" name="password" placeholder="Пароль" required>
						</div>
					</div>

					<label class="checkbox">
						<input type="checkbox" checked />
						<div class="checkbox__sq"></div>
						<div class="checkbox__txt">Раз в месяц получать рассылку с обновлениями, чтобы не пропускать полезные функции</div>
					</label>

					<label class="checkbox">
						<input type="checkbox" data-required-checkbox="Примите публичную оферту" checked />
						<div class="checkbox__sq"></div>
						<div class="checkbox__txt">Я принимаю <a href="#">публичную оферту</a></div>
					</label>
				</div>


				<div class="popup-input-item popup-input-item--submit">
					<input type="submit" class="popup-submit-btn" value="Зарегистрироваться" />
				</div>

				<div class="popup-error"></div>
			</form>
		</div>

		
		<div id="registration-success-popup" class="popup">
			<button class="close-popup-btn" type="button" aria-label="Закрыть попап" data-popup-close></button>

			<img class="popup-logo" src="./img/logo.svg" alt="logo" />
			<div class="popup-subtitle">Письмо с подтверждением было отправлено на почту!</div>
			<div class="popup-input-item popup-input-item--submit">
				<button type="button" class="popup-submit-btn" data-popup-close>Хорошо</button>
			</div>
		</div>
		
		<div id="success-verify-popup" class="popup">
			<button class="close-popup-btn" type="button" aria-label="Закрыть попап" data-popup-close></button>

			<img class="popup-logo" src="./img/logo.svg" alt="logo" />
			<div class="popup-subtitle">Аккаунт верифицирован!</div>
			<div class="popup-input-item popup-input-item--submit">
				<button type="button" class="popup-submit-btn" data-popup="login-popup">Войти в аккаунт</button>
			</div>
		</div>
	</div>

    <script src="./js/main.js"></script>
    <script src="./js/api.js"></script>
    <script src="./js/cabinet.js"></script>
    
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // Генерация API ключа
            const generateBtn = document.getElementById('generate-btn');
            const apiKeyElement = document.getElementById('api-key');
            
            generateBtn.addEventListener('click', function() {
                if (confirm('Вы уверены, что хотите сгенерировать новый API ключ? Старый ключ перестанет работать.')) {
                    // Эмуляция AJAX запроса
                    showAlert('Генерация нового ключа...', 'success');
                    
                    setTimeout(() => {
                        const newKey = generateApiKey();
                        apiKeyElement.textContent = newKey;
                        
                        // Добавляем обратно кнопку копирования
                        const copyBtn = document.createElement('button');
                        copyBtn.className = 'copy-btn';
                        copyBtn.id = 'copy-btn';
                        copyBtn.title = 'Скопировать';
                        copyBtn.textContent = '📋';
                        copyBtn.addEventListener('click', copyApiKey);
                        apiKeyElement.appendChild(copyBtn);
                        
                        showAlert('Новый API ключ успешно сгенерирован', 'success');
                    }, 1500);
                }
            });
            
            // Копирование API ключа
            document.getElementById('copy-btn').addEventListener('click', copyApiKey);
            
            // Функции помощники
            function showAlert(message, type) {
                alertBox.textContent = message;
                alertBox.className = 'alert';
                alertBox.classList.add(`alert-${type}`);
                alertBox.style.display = 'block';
                
                setTimeout(() => {
                    alertBox.style.display = 'none';
                }, 5000);
            }
            
            function generateApiKey() {
                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                let key = 'sk_live_';
                
                for (let i = 0; i < 56; i++) {
                    key += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                
                return key;
            }
            
            function copyApiKey() {
                const apiKey = document.getElementById('api-key').textContent;
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
    </script> -->

    <!-- Проверка авторизации -->
    <script>
    // Проверка авторизации на клиентской стороне
    document.addEventListener('DOMContentLoaded', function() {
        // Исправляем возможные проблемы со скроллингом
        document.body.classList.remove('no-scroll');
        
        const token = localStorage.getItem('token');
        
        if (!token) {
            // Если токена нет, перенаправляем на главную страницу
            window.location.href = '/index.php';
            return;
        }
        
        // Дополнительная проверка через API
        fetch('https://portaldata.ru/api/user/data', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token
            }
        })
        .then(response => {
            if (!response.ok) {
                // Если токен недействителен, удаляем его и перенаправляем
                localStorage.removeItem('token');
                window.location.href = '/index.php';
            }
        })
        .catch(error => {
            console.error('Ошибка проверки авторизации:', error);
            // В случае ошибки сети также перенаправляем
            window.location.href = '/index.php';
        });
    });
    </script>
</body>
</html>