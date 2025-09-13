<?php 
$pageTitle = "Тарифы - Портал Данных";
$pageDescription = "Выберите подходящий тариф для использования нашего сервиса. Предлагаем гибкие условия для разных потребностей.";
include 'elements/header.php'; 
?>

		<main class="main">
			<section class="address section-pt-sm section-pb">
				<div class="_container">
					<h2 class="section-sm-title">Тарифы</h2>
					<p class="address__subtitle">Стоимость сервиса</p>
					<div class="address__slider">
						<div class="swiper">
							<div class="swiper-wrapper">
								<div class="address__slide swiper-slide">
									<h3 class="address__name">Старт</h3>
									<p class="address__descr">
										<b>1 000</b> <br>
										Запросов в сутки на получение данных. <br>
										Позволяет получать информацию о продуктах в количестве до 100 тыс. единиц ежедневно. <br><br>
										<b>Безлимит</b> <br>
										На загрузку данных в сервис и раздачу
									</p>
									<a href="#" class="address__btn primary-btn">Бесплатно <img src="./img/arr-right.svg" alt="" width="14" height="14"></a>
								</div>
								<div class="address__slide swiper-slide">
									<h3 class="address__name">Продвинутый</h3>
									<p class="address__descr">
										<b>2 000</b> <br>
										Запросов в сутки на получение данных. <br>
										Позволяет получать информацию о продуктах в количестве до 200 тыс. единиц ежедневно. <br><br>
										<b>Безлимит</b> <br>
										На загрузку данных в сервис и раздачу
									</p>
									<a href="#" class="address__btn primary-btn">10 000 руб./год <img src="./img/arr-right.svg" alt="" width="14" height="14"></a>
								</div>
								<div class="address__slide swiper-slide">
									<h3 class="address__name">Мастер</h3>
									<p class="address__descr">
										<b>4 000</b> <br>
										Запросов в сутки на получение данных. <br>
										Позволяет получать информацию о продуктах в количестве до 400 тыс. единиц ежедневно. <br><br>
										<b>Безлимит</b> <br>
										На загрузку данных в сервис и раздачу
									</p>
									<a href="#" class="address__btn primary-btn">16 000 руб./год <img src="./img/arr-right.svg" alt="" width="14" height="14"></a>
								</div>
								<div class="address__slide swiper-slide">
									<h3 class="address__name">Профи</h3>
									<p class="address__descr">
										<b>8 000</b> <br>
										Запросов в сутки на получение данных. <br>
										Позволяет получать информацию о продуктах в количестве до 800 тыс. единиц ежедневно. <br><br>
										<b>Безлимит</b> <br>
										На загрузку данных в сервис и раздачу
									</p>
									<a href="#" class="address__btn primary-btn">24 000 руб./год <img src="./img/arr-right.svg" alt="" width="14" height="14"></a>
								</div>
								<div class="address__slide swiper-slide">
									<h3 class="address__name">Эксперт</h3>
									<p class="address__descr">
										<b>15 000 +</b> <br>
										Запросов в сутки на получение данных. <br>
										Позволяет получать информацию о продуктах в количестве до 1.5 млн. единиц ежедневно. <br><br>
										<b>Безлимит</b> <br>
										На загрузку данных в сервис и раздачу
									</p>
									<a href="#" class="address__btn primary-btn">36 000 руб./год <img src="./img/arr-right.svg" alt="" width="14" height="14"></a>
								</div>
							</div>
						</div>

						<button type="button" class="address-btn-prev">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left-icon lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
						</button>
						<button type="button" class="address-btn-next">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
						</button>
					</div>
				</div>
			</section>
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
					<div class="field">
						<div class="field__main">
							<div class="field__prepend">
								<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5.25 8.75V5.75C5.25 4.75544 5.64509 3.80161 6.34835 3.09835C7.05161 2.39509 8.00544 2 9 2C9.99456 2 10.9484 2.39509 11.6517 3.09835C12.3549 3.80161 12.75 4.75544 12.75 5.75V8.75M3.75 8.75H14.25C15.0784 8.75 15.75 9.42157 15.75 10.25V15.5C15.75 16.3284 15.0784 17 14.25 17H3.75C2.92157 17 2.25 16.3284 2.25 15.5V10.25C2.25 9.42157 2.92157 8.75 3.75 8.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
							<input type="password" class="field__inp" name="password-repeat" placeholder="Повторите пароль" required>
						</div>
					</div>
				</div>

				<div class="popup-input-item">
					<label class="popup-checkbox-label">
						<input type="checkbox" class="popup-checkbox" checked required />
						<span class="custom-checkbox"></span>
						<span class="checkbox-text"> Даю согласие на обработку персональных данных </span>
					</label>

					<!-- <a class="rm-link" href="#">Запомнить меня</a> -->
				</div>

				<div class="popup-input-item popup-input-item--submit">
					<input type="submit" class="popup-submit-btn" value="Войти в систему" />
				</div>
			</form>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="./libs/swiper.min.js"></script>
	<script src="./js/main.js"></script>
</body>
</html> 