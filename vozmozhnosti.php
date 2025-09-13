<?php include 'elements/header.php'; 
$pageTitle = "Возможности для онлайн-торговли, ритейла и аналитики";
$pageDescription = "Описание возможностей платформы для онлайн-торговли, ритейла и аналитики";
?>
<main class="main">
  <div class="_container features-layout">
    <div class="features-main">
      <h1 class="section-title" style="margin-bottom: 40px;">Возможности использования</h1>
      <div class="features-vertical">
        <section class="feature-row feature-row--img-left" id="online-trade">
          <div class="feature-img-col">
            <img class="feature-img" src="./img/online-trade-900x600.jpg" alt="Онлайн-торговля" width="900" height="600" />
          </div>
          <div class="feature-text-col">
            <h2 class="feature-title">Торговля</h2>
            <p class="feature-desc"><b>Поставщик данных:</b><br>Стратегически значимый рост продаж. Получение заказов в ПорталДанных.РФ без комиссий напрямую от покупателей. Автоматическая интеграция в закупочные системы покупателей. <br><br><b>Получатель данных:</b><br>Кратное увеличение ассортимента с актуальными данными о ценах, остатках и т.д., а также выгодными условиями.<br>Увеличение скорости вывода новых продуктов на рынок, тестирование ниш и т.д. Мощнейшие возможности для аналитики.</p>
          </div>
        </section>
        <section class="feature-row feature-row--img-right" id="manufacturing">
          <div class="feature-text-col">
            <h2 class="feature-title">Производство</h2>
            <p class="feature-desc"><b>Поставщик данных:</b><br>Проникновение данных о продукции во все среды (закупочные системы, центры компетенций о товарах на основе искусственного интеллекта и т.д.). Углубление обратной связи от конечного клиента. Интеграция с цифровыми цепочками поставок, повышение загрузки производственных мощностей.<br><br><b>Получатель данных:</b><br>Доступ к актуальным данным производителей о качественных характеристиках продукции, ценах, остатках не только на складах производителя, но и всей дилерской цепочки, сокращение времени на поиск поставщика, прозрачность условий.</p>
          </div>
          <div class="feature-img-col">
            <img class="feature-img" src="./img/manufacturing-900x600.jpg" alt="Производство" width="900" height="600" />
          </div>
</section>  
        <section class="feature-row feature-row--img-left" id="analytics">
          <div class="feature-img-col">
            <img class="feature-img" src="./img/analytics-900x600.jpg" alt="Аналитика" width="900" height="600" />
          </div>
          <div class="feature-text-col">
            <h2 class="feature-title">Аналитика и разработка</h2>
            <p class="feature-desc"><b>Поставщик данных:</b><br>Получение вторичных выгод в виде дополнительного спроса на продукцию за счет использованя данных о продукции и ее характеристиках (обучение искусственного интеллекта, индексация поисковыми системами созданных карточек товаров, отчетов, рейтингов и т.д.). <br><br><b>Получатель данных:</b><br>Доступ к большим данным и возможность создавать на их основе новые продукты, модели принятия оптимальных решений и т.д.</p>
          </div>
        </section>
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
</body>


<style>
.features-layout {
  display: flex;
  gap: 48px;
  align-items: flex-start;
}
.features-main {
  flex: 1 1 0%;
  min-width: 0;
}
.features-auth {
  flex: 0 0 340px;
  max-width: 340px;
  width: 100%;
  position: sticky;
  top: 32px;
  align-self: flex-start;
}
.auth-block {
  background: #fff;
  border-radius: 20px;
  box-shadow: 0 2px 16px rgba(0,0,0,0.04);
  padding: 32px 24px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 18px;
}
.auth-title {
  font-size: 22px;
  font-weight: 700;
  margin-bottom: 8px;
  color: var(--main-text-color, #1C1C1C);
}
.auth-desc {
  font-size: 15px;
  color: #888;
  text-align: center;
}
@media (max-width: 1100px) {
  .features-layout {
    flex-direction: column;
    gap: 32px;
  }
  .features-auth {
    max-width: 100%;
    width: 100%;
    position: static;
  }
}
.features-vertical {
  display: flex;
  flex-direction: column;
  gap: 56px;
  margin-bottom: 60px;
}
.feature-row {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 48px;
  background: #fff;
  border-radius: 24px;
  box-shadow: 0 2px 16px rgba(0,0,0,0.04);
  padding: 32px 24px;
  flex-wrap: wrap;
  transition: box-shadow 0.3s;
  cursor: pointer;
}
.feature-row--img-right {
  flex-direction: row-reverse;
}
.feature-img-col {
  flex: 0 0 420px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.feature-img {
  width: 100%;
  max-width: 900px;
  height: auto;
  aspect-ratio: 3/2;
  border-radius: 16px;
  object-fit: cover;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  transition: transform 0.35s cubic-bezier(.4,1.6,.6,1), box-shadow 0.35s cubic-bezier(.4,1.6,.6,1);
}
.feature-row:hover .feature-img,
.feature-row:focus .feature-img,
.feature-row:active .feature-img {
  transform: scale(1.06);
  box-shadow: 0 8px 32px rgba(0,0,0,0.13);
}
@media (hover: none) and (pointer: coarse) {
  .feature-row:active .feature-img,
  .feature-row:focus .feature-img {
    transform: scale(1.06);
    box-shadow: 0 8px 32px rgba(0,0,0,0.13);
  }
}
.feature-text-col {
  flex: 1 1 320px;
  min-width: 260px;
  max-width: 600px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
}
.feature-title {
  font-size: 28px;
  font-weight: 700;
  margin-bottom: 18px;
  color: var(--main-text-color, #1C1C1C);
}
.feature-desc {
  font-size: 18px;
  color: #444;
  margin-bottom: 0;
}
@media (max-width: 1200px) {
  .feature-row, .feature-row--img-right {
    flex-direction: column !important;
    gap: 28px;
    text-align: center;
  }
  .feature-img-col, .feature-text-col {
    max-width: 100%;
    width: 100%;
    align-items: center;
    justify-content: center;
  }
  .feature-text-col {
    align-items: center;
  }
}
</style>
</html>