<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Портал Данных'; ?></title>
    <meta name="description" content="<?php echo isset($pageDescription) ? $pageDescription : 'Портал Данных'; ?>" />

    <link rel="stylesheet" href="./libs/swiper.min.css">
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/h-style.css" />
    <link rel="stylesheet" href="./css/cabinet.css" />
    
    <style>
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .primary-btn--outline {
            background: transparent;
            border: 2px solid #007bff;
            color: #007bff;
        }
        
        .primary-btn--outline:hover {
            background: #007bff;
            color: white;
        }
    </style>

    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicons/favicon-16x16.png" />
    <link rel="manifest" href="./img/favicons/site.webmanifest" />
    <link rel="mask-icon" href="./img/favicons/safari-pinned-tab.svg" color="#3e6470" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="theme-color" content="#ffffff" />
</head>

<body class="body">
    <div class="wrapper">
        <header class="header">
            <div class="header__inner _container">
                <a href="/" class="logo-box header__logo">
                    <img src="./img/logo.svg" alt="logo" />
                </a>

                <ul class="navigate">
                    <li class="dropdown">
                        <a href="/vozmozhnosti.php" class="dropdown__trigger">Возможности</a>
                        <ul class="dropdown__content">
                            <li><a href="/vozmozhnosti.php">Торговля</a></li>
                            <li><a href="/vozmozhnosti.php#manufacturing">Производство</a></li>
                            <li><a href="/vozmozhnosti.php#analytics">Аналитика</a></li>
                        </ul>
                    </li>
                    <li><a href="">Документация</a></li>
                    <li><a href="/tarrifs.php">Цены</a></li>
                    <li><a href="">Поддержка</a></li>
                </ul>

                <div class="header-right">
                    <button class="header__burger" type="button" aria-label="Мобильное меню">
                        <span></span>
                    </button>
                </div>
            </div>
        </header>

        <main class="main">