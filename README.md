# PDFront - Frontend for Portal Data

Фронтенд для портала данных с мигрированной генерацией PDF на Go сервис.

## Описание

Этот проект содержит фронтенд для портала данных (порталданных.рф), который был обновлен для использования Go сервиса вместо PHP API для генерации PDF документов.

## Основные изменения

- ✅ Миграция PDF генерации с PHP API (`api.ostk.ru`) на Go сервис (`portaldata.ru`)
- ✅ Обновлены все URL в `js/cabinet.js` и `test_cabinet.html`
- ✅ Go сервис эндпоинты: `/api/buh/makeinvoice` и `/api/buh/makeinvoice.html`
- ✅ Production домен: `https://portaldata.ru/api`
- ✅ Удалены все ссылки на старый PHP API

## Структура проекта

```
pdfront/
├── css/                    # Стили
├── js/                     # JavaScript файлы
│   ├── cabinet.js         # Основная логика кабинета (обновлен)
│   └── api.js             # API интеграция
├── elements/              # PHP элементы (header, footer)
├── img/                   # Изображения и иконки
├── fonts/                 # Шрифты
├── libs/                  # Внешние библиотеки
├── cabinet.php            # Главная страница кабинета
├── test_cabinet.html      # Тестовая страница (обновлена)
└── README.md              # Этот файл
```

## API Endpoints

### PDF Generation (Go Service)
- **PDF**: `GET https://portaldata.ru/api/buh/makeinvoice?inn={ИНН}&email={EMAIL}&token={TOKEN}`
- **HTML**: `GET https://portaldata.ru/api/buh/makeinvoice.html?inn={ИНН}&email={EMAIL}&token={TOKEN}`

### Параметры
- `inn` - ИНН организации (10 или 12 цифр)
- `email` - Email пользователя
- `token` - JWT токен авторизации

## Тестирование

Для тестирования PDF генерации используйте:
- `test_cabinet.html` - веб-интерфейс для тестирования
- Прямые запросы к API эндпоинтам

## Домены

- **Frontend**: https://порталданных.рф
- **Backend API**: https://portaldata.ru/api
- **Go Service**: https://portaldata.ru/api

## Технологии

- HTML5, CSS3, JavaScript (ES6+)
- PHP (для элементов страниц)
- Go (для PDF генерации)
- JWT авторизация

## Статус миграции

✅ **Полностью завершена** - все PDF генерация переведена на Go сервис
