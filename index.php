<?php
session_start();
include 'db.php'; // Подключаем файл с настройками базы данных

// Запрос к базе данных
$sql = "SELECT * FROM apartments";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$apartments = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ЭлитДом</title>
  <link rel="stylesheet" href="">
  <script src="scripts/main.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.8/inputmask.min.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
  <style>
    html {
    box-sizing: border-box;
}

*,
*::before,
*::after {
    box-sizing: inherit;
}

img {
    max-width: 100%;
}

/* Задал максимальную ширину картинкам */
a {
    text-decoration:none;
}

/* Сбросили стили ссылок */
p {
    margin: 0;
}

.flex {
    display: flex;
}

/* Создал инструмент flex */
/* Задал */


h1,
h2,
h3 {
    margin: 0;
}

i {
    font-style: italic;
}


body {
    font-family: 'Muller', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #F1F1F1;
}

.header-list {
    margin-right: auto;
}

.list-reset {
    margin: 0;
    padding: 0;
    list-style-type: none;
}

.container {
    width: 1800px;
    margin: 0 auto;
    overflow: hidden;
}

.header-logo {
    display: flex;
    align-items: center;
    margin-top: 15px;
    margin-right: 40px;
}

.top-header-telephone {
    margin-left: 335px;
    margin-top: 0;
    font-weight: 500;
    font-size: 20px;
    line-height: 20px;
    color: #666666;
}

.top-header {
    align-items: center;
}

.header-paragraph {
    opacity: 0.55;
    color: black;
    font-Size: 20px;
    font-Family: Tahoma, sans-serif;
    font-Weight: 300;
    margin-right: 50px;
    margin-bottom: 0;
    word-wrap: break-word;
}

.header-social-networks img {
    width: 2.5%;
    margin-left: 15px;
}

.input-text {
    align-items: center;
    border-radius: 15px;
    width: 145px;
    height: 45px;
}


/* Стили для затемняющего фона */
.overlay {
    display: none; /* Скрыто по умолчанию */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Полупрозрачный черный фон */
    z-index: 9998; /* Под модальным окном */
}

/* Стили для модального окна */
.modal {
    display: none; /* Скрыто по умолчанию */
    background: #fff;
    position: fixed;
    top: 150px;
    width: 400px;
    left: 50%;
    margin-left: -200px;
    z-index: 9999; /* Поверх затемняющего фона */
    box-shadow: 0 0 10px rgba(0, 0, 0, .6);
    transition: .3s;
    border-radius: 10px;
    max-height: calc(100vh - 200px);
    overflow: auto;
}

/* Дополнительные стили для модального окна и фона */
.modal-header {
    border-bottom: 1px solid #efefef;
    width: 100%;
    background: #fff;
    padding: 10px;
    box-sizing: border-box;
}

.modal-content {
    padding: 10px;
}

.close-modal {
    cursor: pointer;
    float: right;
}


.send-modal-form{
    cursor: pointer;
}

.bg,
.modal,
.bg2 {
    display: none;
}


.modal-header {
    border-bottom: 1px solid #efefef;
    float: left;
    width: 100%;
    position: sticky;
    top: 0;
    background: #fff;
}

.modal-header span {
    width: 100%;
}

.modal-header span {
    float: left;
    width: 90%;
    line-height: 50px;
    font-weight: 600;
    padding: 10px 5% 5px 5%;
    font-size: 20px;
    text-transform: uppercase;
}

.modal-header a {
    color: #111;
}

.modal-header a {
    position: absolute;
    right: 5px;
    top: 15px;
    width: 30px;
    text-align: center;
    line-height: 30px;
    font-weight: bold;
    font-size: 20px;
}

.fa {
    display: inline-block;
    display: none;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

i {
    font-style: italic;
}



.modal-content {
    float: left;
    width: 100%;
    padding: 0 5%;
    overflow: auto;
}

.modal-content .line {
    float: left;
    width: 100%;
    margin-top: 20px;
    margin-bottom: 5px;
}

.modal-content .line label:not(.checkbox-label) {
    float: left;
    width: 100%;
    margin-bottom: 5px;
    color: #666;
}

label {
    cursor: default;
}

.modal-content .line input {
    border: 1px solid #ccc;
}

.modal-content .line input {
    float: left;
    width: 100%;
    padding: 12px;
    border-radius: 4px;
    transition: .3s;
}

input,
textarea {
    font-family: "Open Sans";
}


.modal-content .line label em {
    color: #601615;
}

.modal-content .line em {
    color: #601615;
}

modal-content .main-question-confirm {
    margin: 20px 0 0;
    float: left;
    width: 100%;
    display: flex;
    align-items: center;
}

.modal-content .main-question-confirm input {
    float: left;
    margin: 0;
    height: 18px;
    width: 18px;
}

.modal-content .main-question-confirm span {
    float: left;
    line-height: 20px;
    margin-left: 5px;
    max-width: calc(100% - 23px);
}

.main-question-confirm a {
    color: #601615;
}


.send-modal-form, .send-modal-form-style {
    background: #601615;
    color: #fff;
}
.send-modal-form, .send-modal-form-style {
    float: left;
    width: 50%;
    margin: 20px 25%;
    border: none;
    text-align: center;
    padding: 8px 0;
    border-radius: 20px;
}

.main-question-confirm {
    color: #444;
}

.main-question-confirm {
    font-size: 13px;
}

.menu button {
    /* height: 200px; */
    height: auto;
    /* Сохраняем пропорции изображений */
    border-radius: 15px;
}

.menu button:hover {
    cursor: pointer;
}

.menu img {
    width: 25%;
    /* Задайте конкретную ширину для изображений, чтобы они были одинаковыми */
    height: auto;
    /* Сохраняем пропорции изображений */
    border-radius: 15px;
}

.paragraph-orders {
    padding-left: 15px;
    font-size: 15px;
    font-family: Pattaya, sans-serif;
    text-align: center;
}


.menu-nav {
    background-color: #FFFFFF;
    border-radius: 15px;
    padding: 0 45px;
    align-items: center;
}

.list-item {
    margin-top: 25px;
    padding: 13px 5px;
}

.list-item:not(:last-child) {
    margin-right: 45px;
}

.list-item>a {
    font-weight: 400;
    font-size: 20px;
    line-height: 30px;
    color: black;
    /* Цвет текста по умолчанию */
    text-decoration: none;
    /* Убираем подчеркивание ссылок */
    transition: color 0.3s ease, background-color 0.3s ease;
    /* Плавное изменение цвета текста и фона */
    display: inline-block;
    /* Позволяет устанавливать padding и margin */
    padding: 5px 10px;
    /* Добавляем отступы для улучшения кликабельности */
    border-radius: 5px;
    /* Закругленные углы фона при наведении */
}

.list-item>a.active {
    color: #601615;
    /* Цвет активной ссылки */
    font-weight: bold;
    /* Выделение активной ссылки жирным */
}

/* Стили для ссылки при наведении */
.list-item>a:hover {
    color: #ffffff;
    /* Цвет текста при наведении */
    background-color: #601615;
    /* Фон при наведении */
    border-radius: 5px;
    /* Закругленные углы фона при наведении */
}

.carousel {
    width: 80vw;
    /* Ширина карусели */
    height: 60vh;
    /* Высота карусели */
    position: relative;
    margin: auto;
    /* Центрирование карусели */
    overflow: hidden;
    /* Обрезать содержимое, выходящее за границы */
}

.carousel ul {
    margin: 0;
    padding: 0;
    list-style: none;
    position: relative;
    height: 100%;
    /* Убедиться, что список занимает всю высоту карусели */
}

.slide {
    position: absolute;
    opacity: 0;
    inset: 0;
    transition: 300ms opacity ease-in-out;
}

.slide[data-active] {
    opacity: 1;
    z-index: 1;
}

.slide img {
    display: block;
    width: 100%;
    /* Ширина изображения равна ширине контейнера */
    height: 100%;
    /* Высота изображения равна высоте контейнера */
    object-fit: cover;
    /* Сохраняет пропорции изображения и обрезает его, чтобы заполнить контейнер */
    object-position: center;
    /* Центрировать изображение */
}

.carousel-button {
    position: absolute;
    z-index: 2;
    font-size: 2rem;
    /* Размер шрифта кнопок */
    background: none;
    border: none;
    top: 50%;
    color: rgba(255, 255, 255, 0.8);
    /* Цвет текста кнопок */
    cursor: pointer;
    border-radius: .25rem;
    padding: 0 .5rem;
    background-color: rgba(0, 0, 0, .5);
    /* Фон кнопок */
    transform: translateY(-50%);
    /* Центрировать кнопки по вертикали */
}

.carousel-button:hover,
.carousel-button:focus {
    color: white;
    background-color: rgba(0, 0, 0, .8);
}

.carousel-button.next {
    right: 1rem;
    /* Позиционирование кнопки "Следующий" справа */
}

.carousel-button.prev {
    left: 1rem;
    /* Позиционирование кнопки "Предыдущий" слева */
}

.carousel-indicators {
    position: absolute;
    bottom: 1rem;
    /* Расположить точки внизу карусели */
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 0.5rem;
    /* Отступ между точками */
    z-index: 3;
    /* Убедитесь, что индикаторы выше других элементов */
}

.carousel-indicators .indicator {
    width: 1rem;
    height: 1rem;
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.3s;
}

.carousel-indicators .indicator.active {
    background-color: white;
}

/* Стили для смещения блока вправо */
.slide_right {
    width: 50%;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 10px;
    z-index: 2;
    /* Убедитесь, что блоки поверх изображений */
    right: 45%;
    /* Смещаем блок вправо */
}

/* Стили для полупрозрачного фона */
.slide_right.slide-dark {
    background-color: rgba(0, 0, 0, 0.6);
    padding: 10px;
    border-radius: 10px;
}

/* Стили для текста */
.slide_right>span {
    position: relative;
}

.slide_right span {
    line-height: 1.2;
}

.slide_right span,
.slide_right p {
    width: 100%;
    text-align: left;
}

.slide-dark span,
.slide-dark p {
    color: #fff;
}

.h2-adv {
    width: 100%;
    text-align: center;
    position: relative;
    font-size: 40px;
    line-height: 48px;
    margin: 0;
    color: #601615;
    padding: 10px 0 24px;
    text-transform: uppercase;
    font-weight: 900;
}

.slide_right p {
    margin: 20px 0px 40px;
}

.h2-adv-after {
    width: 100%;
    text-align: center;
    color: #3d3d3d;
    font-size: 22px;
}

.slide_right .paint {
    display: flex;
    margin-top: 20px;
    position: relative;
    margin: 20px 0;
}

.slide_right .paint:before {
    content: '';
    width: 100%;
    position: absolute;
    height: 1px;
    left: 0;
    top: -10px;
    background: #d8d8d8;
}

.slide_right .ad-info {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}

.slide_right a {
    text-transform: uppercase;
    font-size: 14px;
    font-weight: 700;
    border-radius: 6px;
    padding: 12px 23px;
    transition: background-color 0.3s ease, color 0.3s ease;
    background: #840202;
    /* Обычный цвет кнопки */
    color: #fff;
}

.slide_right a:hover {
    background: #f4f4f4;
    /* Светло-белый цвет при наведении */
    color: #840202;
}

.btn-site {
    background: #601615;
    color: #fff;
    transition: background-color 0.3s ease;
    border: 1px solid #601615;
}

.btn-site:hover {
    background: #f4f4f4;
    /* Светло-белый цвет при наведении */
    color: #601615;
}

.btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 6px 20px;
    font-size: 15px;
    line-height: 1.5;
    border-radius: 4px;
}



/* Стили для точек над линией */
.slide_right .paint .dot {
    position: absolute;
    width: 10px;
    height: 10px;
    background-color: #601615;
    /* Красный цвет точек */
    border-radius: 50%;
    transform: translateY(-50%);
    /* Центрируем точки вертикально относительно линии */
}

/* Позиционирование точек относительно слов */
.slide_right .paint span {
    position: relative;
    margin-right: 40px;
    /* Отступ между точками и словами */
}

/* Позиционирование первой точки */
.slide_right .paint span:first-child .dot {
    left: 0;
    top: -10px;
}

/* Позиционирование второй точки */
.slide_right .paint span:nth-child(2) .dot {
    left: 1%;
    transform: translate(-50%, -50%);
    top: -10px;
}

/* Позиционирование третьей точки */
.slide_right .paint span:nth-child(3) .dot {
    left: -1%;
    top: -10px;
}

.section-title {
    display: flex;
    margin: 0;
    margin-top: 150px;
    font-size: 40px;
    margin-left: 125px;
    line-height: 40px;
    padding-bottom: 20px;
    font-weight: 400;
    color: #840202;
    padding-left: 40px;
}

.section-paragraph {
    display: flex;
    margin: 0;
    color: #838383;
    font-size: 20px;
    font-weight: 400;
}

.section-paragraph p {
    margin-left: auto;
    margin-right: auto;
}

.section-popularObject-title {
    width: 100%;
    font-size: 26px;
    font-weight: 600;
    padding: 30px 0;
    position: relative;
    display: flow-root;
}

.section-popularObject-title:before {
    height: 1px;
    content: '';
    position: absolute;
    display: block;
    width: 100%;
    background: #0003;
    top: 50%;
}

.section-popularObject-title>span {
    padding-right: 40px;
    background: #fff;
    display: flex;
    align-items: center;
    width: fit-content;
    position: relative;
}

.section-popularObject-title>span:before {
    content: "\f111";
    color: #2873a9;
    font: normal normal normal 14px / 1 FontAwesome;
    padding-right: 5px;
}

.section-items {
    float: left;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    margin-bottom: -2%;
    margin-left: 100px;
}

.section-item {
    width: 24%;
    margin-bottom: 2%;
    margin-right: calc(4% / 3);
    border: 1px solid rgba(148, 173, 193, 0.53);
    border-radius: 4px;
    overflow: hidden;
    margin-right: 100px;
    position: relative;
}

.section-img {
    position: relative;
    width: 100%;
    overflow: hidden;
    float: left;
}

.section-img:after {
    content: '';
    float: left;
    width: 100%;
    padding-bottom: 70%;
}

.section-img img {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .3s;
}

.section-img:after {
    content: '';
    float: left;
    width: 100%;
    padding-bottom: 70%;
}

.section-favorite-overley {
    top: 20px;
}

.object_overlay-icon {
    width: 34px;
    background: #ffffffab;
    border-radius: 50%;
    text-align: center;
    cursor: pointer;
    position: absolute;
    right: 20px;
    opacity: 0;
    color: #111;
    transition: .3s;
}

.object_overlay-icon i {
    font-size: 22px;
    line-height: 34px;
}

.fa {
    display: inline-block;
    font: normal normal normal 14px / 1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.fa-heart-o:before {
    content: "\f08a";
}

.section-info {
    padding: 19px;
    display: flow-root;
}

.section-name {
    float: left;
    color: #0e0e0e;
    font-weight: 500;
    width: 100%;
    font-size: 22px;
    transition-duration: .3s;
}

.section-adress {
    float: left;
    width: 100%;
    margin-top: 20px;
    font-size: 15px;
    color: #111;
    display: flex;
    align-items: center;
    font-weight: 500;
}

.section-adress i:not(.admin-text-edit) {

    float: left;
}

.section-adress i {
    color: #111;
    font-size: 15px;
}

.linearicons,
[class^="linearicons-"],
[class*=" linearicons-"] {
    font-family: 'Linearicons' !important;
    speak-as: none;

    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.linearicons-map-marker:before {
    content: "\ea7a";

}

.section-options {
    float: left;
    width: 100%;
    margin: 6px 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
}

.object__option {
    width: 100%;
    display: flex;
    align-items: center;
}

.object__option i {
    width: 30px;
    line-height: 30px;
    color: #111;
    font-size: 20px;
    flex-shrink: 0;
}

.linearicons-expand4:before {
    content: "\ec52";
}

.object__option i {
    width: 30px;
    line-height: 30px;
    color: #111;
    font-size: 20px;
    flex-shrink: 0;
}

.object__option span {
    width: 100%;
    font-size: 15px;
    color: #111;
    font-weight: 500;
}

sup {
    vertical-align: super;
    font-size: smaller;
}

.object__price {
    float: left;
    width: 100%;
    margin-top: 15px;
    font-weight: 400;
    font-size: 24px;
    line-height: 20px;
    color: #601615;
    display: flex;
    align-items: center;
}

.price-calc {
    position: relative;
    padding: 3px 0 3px 3px;
}

.price-currency-calculator {
    display: none;
    position: absolute;
    bottom: 100%;
    padding: 5px;
    background: #fff;
    box-shadow: 0 0 5px #000;
    border-radius: 6px;
    right: 0;
}

.object-currency-item {
    white-space: nowrap;
}


.price-currency-calculator span {
    font-size: 16px;
    padding: 3px;
}

.object__price.object__sub-price {
    margin-top: 5px;
    font-size: 20px;
    color: #999;
}

.ad-info a {
    text-transform: uppercase;
    font-size: 14px;
    font-weight: 700;
    border-radius: 6px;
    padding: 12px 23px;
    transition: background-color 0.3s ease, color 0.3s ease;
    background: #840202;
    color: #fff;
}

.button {
    margin-top: 50px;
    margin-left: 1000px;
}

.button .btn-site {
    background: #601615;
    color: #fff;
    transition: background-color 0.3s ease;
    border: 1px solid #601615;
}

.button .btn-site:hover {
    background: #fac8c7;
    /* Светло-белый цвет при наведении */
    color: #601615;
}

.advantage-bl {
    float: left;
    width: 100%;
    margin-top: 40px;
    display: flex;
    flex-wrap: wrap;
    margin-bottom: -20px;
    margin-left: 5%;
    margin-bottom: 5px;
}

.advantage {
    min-width: 25%;
    padding: 30px;
    background: #fff;
    box-shadow: 0 0 5px 0 rgba(0 0 0 / 37%);
    border-radius: 10px;
    margin-bottom: 40px;
    margin-right: 5%;
}

.advantage {
    width: 20%;
    display: table-cell;
    position: relative;
    vertical-align: top;
}

.advantage span {
    font-weight: 700;
    color: #000;
    font-size: 20px;
}

.advantage span {
    padding-bottom: 0;
    margin-top: 20px;
}

.advantage span,
.advantage p {
    float: left;
    width: 100%;
    text-align: left;
    position: relative;
    z-index: 2;
}

.advantage p {
    color: #575757;
    font-size: 16px;
}

.advantage p {
    margin-top: 5px;
    padding: 0;
    margin-bottom: 0;
}


.block-footer {
    padding: 15px 0 10px;
    background: #601615;
    color: #fff;
}

.outer-block {
    float: left;
    width: 100%;
}

.footer__item:first-child {
    padding: 0 20px 0 0;
    font-size: 13px;
}

.footer-site-name {
    float: left;
}

.footer-author {
    float: right;
    font-size: 13px;
    text-align: center;
    text-align: right;
    float: right;
}

input[type="text"] {
    font-family: inherit;
    /* 1 */
    font-size: inherit;
    /* 1 */
    line-height: inherit;
    /* 1 */
    margin: 0;
    /* 2 */
}
/* @font-face для иконок */
@font-face {
    font-family: 'Material Icons';
    font-style: normal;
    font-weight: 400;
    src: url(flUhRq6tzZclQEJ-Vdg-IuiaDsNc.woff2) format('woff2');
  }
  
  /* Стили для затемняющего фона */
  .overlay {
    display: none; /* Скрыто по умолчанию */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Полупрозрачный черный фон */
    z-index: 1000;  /* Под модальным окном */
  }
  
  /* Общие стили для модальных окон */
  
  
  .bg, .modal, .bg2 {
      display: none;
  }
  .modal {
    display: none;
      background: #fff;
      position: fixed;
      top: 150px;
      width: 400px;
      left: 50%;
      margin-left: -200px;
      z-index: 9999;
      box-shadow: 0 0 10px rgba(0, 0, 0, .6);
      transition: .3s;
      border-radius: 10px;
      max-height: calc(100vh - 200px);
      overflow: auto;
  }
  
  /* Заголовок модального окна */
  .modal-header {
      border-bottom: 1px solid #efefef;
  }
  .modal-header {
      float: left;
      width: 100%;
      position: sticky;
      top: 0;
      background: #fff;
  }
  
  .modal-header span {
      width: 100%;
  }
  
  .modal-header span {
      float: left;
      width: 90%;
      line-height: 50px;
      font-weight: 600;
      padding: 10px 5% 5px 5%;
      font-size: 20px;
      text-transform: uppercase;
  }
  
  .close-modal {
    cursor: pointer;
    font-size: 20px;
    color: #111;
  }
  
  .modal-header a {
      color: #111;
  }
  .modal-header a {
      position: absolute;
      right: 5px;
      top: 15px;
      width: 30px;
      text-align: center;
      line-height: 30px;
      font-weight: bold;
      font-size: 20px;
  }
  /* Контент модального окна */
  .modal-content {
      float: left;
      width: 100%;
      padding: 0 5%;
      overflow: auto;
  }
  
  /* Общие стили для строк в модальном окне */
  .modal-content .line {
      float: left;
      width: 100%;
      margin-top: 20px;
  }
  
  /* Метки и поля ввода */
  .line label:not(.checkbox-label) {
    display: block;
    margin-bottom: 5px;
    color: #666;
  }
  
  .line input, .line textarea {
    border: 1px solid #ccc;
    width: 100%;
    padding: 12px;
    border-radius: 4px;
    transition: .3s;
  }
  
  .line textarea {
    height: 80px;
    resize: none;
  }
  
  /* Элементы с чекбоксами и радио-кнопками */
  .line input[type="checkbox"], .line input[type="radio"] {
    width: auto;
  }
  
  .line em {
    color: #601615;
  }
  
  /* Подтверждение */
  .main-question-confirm {
    margin: 20px 0;
    display: flex;
    align-items: center;
  }
  
  .main-question-confirm input {
    margin-right: 5px;
    height: 18px;
    width: 18px;
  }
  
  .main-question-confirm span {
    line-height: 20px;
  }
  
  .main-question-confirm a {
    color: #601615;
  }
  
  /* Кнопки отправки */
  .send-modal-form, .send-modal-form-style {
      background: #601615;
      color: #fff;
  }
  .send-modal-form, .send-modal-form-style {
      float: left;
      width: 50%;
      margin: 20px 25%;
      border: none;
      text-align: center;
      padding: 8px 0;
      border-radius: 2px;
  }
  /* Специальные стили для полей ввода с маской телефона */
  .phone-masked {
    padding-left: 60px; /* Увеличьте это значение в зависимости от длины префикса */
  }
  
  .phone-masked::before {
    content: "+375 ";
    position: absolute;
    left: 10px; /* Расположение префикса */
    top: 50%;
    transform: translateY(-50%);
    color: #999; /* Цвет префикса */
  }
  
  /* Кнопка расширения поиска */
  .btn-main {
    margin-right: 7px;
    border-radius: 1px;
    overflow: hidden;
    display: flex;
    align-items: center;
    position: relative;
    padding: 5px 10px; /* Добавлено для наглядности */
  }
  
  .btn-main .search-input {
    border: none;
    outline: none;
    padding: 12px; /* Увеличенный внутренний отступ для удобства ввода */
    font-size: 16px; /* Увеличенный размер шрифта */
    opacity: 0;
    width: 0;
    transition: all 0.3s ease;
    background: #fff;
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
    box-shadow: 0 0 5px rgba(0,0,0,0.2);
  }
  
  .btn-main.expanded .search-input {
    opacity: 1;
    width: 500px; /* Adjust the width as needed */
  }
  
  .btn-main i {
    margin-right: 5px; /* Начальный небольшой отступ */
  }
  
  .btn-main.expanded i {
    margin-right: 10px; /* Отступ при расширенном состоянии */
  }
  
  .btn-main span, .btn-main i:not(.admin-text-edit) {
    padding: 13px 18px;
    font-size: 14px;
    line-height: 14px;
    background: #601615;
    color: #fff;
    float: left;
    font-weight: 600;
    transition-duration: .3s;
  }
  
  /* Иконки Material Icons */
  .material-icons {
    font-family: 'Material Icons';
    font-weight: normal;
    font-style: normal;
    font-size: 24px;
    line-height: 1;
    letter-spacing: normal;
    text-transform: none;
    display: inline-block;
    white-space: nowrap;
    word-wrap: normal;
    direction: ltr;

    -webkit-font-smoothing: antialiased;
  }
  
  /* Заголовок */
  .header-left {
    display: flex;
    align-items: center;
    margin-left: 200px;
  }
  
  .modal-content .line label:not(.checkbox-label) {
      float: left;
      width: 100%;
      margin-bottom: 5px;
      color: #666;
  }
  
  
  .modal-content .line input {
      border: 1px solid #ccc;
  }
  .modal-content .line input {
      float: left;
      width: 100%;
      padding: 12px;
      border-radius: 4px;
      transition: .3s;
  }
  input, textarea {
      font-family: "Open Sans";
  }
  
  .modal-content .main-question-confirm {
      margin: 20px 0 0;
      float: left;
      width: 100%;
      display: flex;
      align-items: center;
  }
  .main-question-confirm {
      color: #444;
  }
  .main-question-confirm {
      font-size: 13px;
  }
  .modal-content .main-question-confirm input {
      float: left;
      margin: 0;
      height: 18px;
      width: 18px;
  }
  .modal-content .main-question-confirm span {
      float: left;
      line-height: 20px;
      margin-left: 5px;
      max-width: calc(100% - 23px);
  }
  .main-question-confirm a {
      color: #601615;
  }
  
  .send-modal-form, .send-modal-form-style {
      background: #601615;
      color: #fff;
  }
  
  .send-modal-form, .send-modal-form-style {
      float: left;
      width: 50%;
      margin: 20px 25%;
      border: none;
      text-align: center;
      padding: 8px 0;
      cursor:pointer;
      border-radius: 2px;
  }
  
  .modal-content .line label[for^=leave-order]:not(:last-child) {
      margin-right: 10px;
  }
  .modal-content .line label[for^=leave-order] {
      float: left;
      display: flex;
      align-items: center;
  }
  .modal-content .line label[for^=leave-order]>input[type='radio'] {
      margin-top: 0;
  }
  
  .modal-content .line input[type="checkbox"], .modal-content .line input[type="radio"] {
      width: auto;
  }
  
  .button {
      margin-top: 50px;
      margin-left: 1050px;
  }
  
  
   /* @font-face для иконок */
@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(flUhRq6tzZclQEJ-Vdg-IuiaDsNc.woff2) format('woff2');
}

/* Стили для затемняющего фона */
.overlay {
  display: none; /* Скрыто по умолчанию */
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5); /* Полупрозрачный черный фон */
  z-index: 1000;  /* Под модальным окном */
}

/* Общие стили для модальных окон */


.bg, .modal, .bg2 {
    display: none;
}
.modal {
  display: none;
    background: #fff;
    position: fixed;
    top: 150px;
    width: 400px;
    left: 50%;
    margin-left: -200px;
    z-index: 9999;
    box-shadow: 0 0 10px rgba(0, 0, 0, .6);
    transition: .3s;
    border-radius: 10px;
    max-height: calc(100vh - 200px);
    overflow: auto;
}

/* Заголовок модального окна */
.modal-header {
    border-bottom: 1px solid #efefef;
}
.modal-header {
    float: left;
    width: 100%;
    position: sticky;
    top: 0;
    background: #fff;
}

.modal-header span {
    width: 100%;
}

.modal-header span {
    float: left;
    width: 90%;
    line-height: 50px;
    font-weight: 600;
    padding: 10px 5% 5px 5%;
    font-size: 20px;
    text-transform: uppercase;
}

.close-modal {
  cursor: pointer;
  font-size: 20px;
  color: #111;
}

.modal-header a {
    color: #111;
}
.modal-header a {
    position: absolute;
    right: 5px;
    top: 15px;
    width: 30px;
    text-align: center;
    line-height: 30px;
    font-weight: bold;
    font-size: 20px;
}
/* Контент модального окна */
.modal-content {
    float: left;
    width: 100%;
    padding: 0 5%;
    overflow: auto;
}

/* Общие стили для строк в модальном окне */
.modal-content .line {
    float: left;
    width: 100%;
    margin-top: 20px;
}

/* Метки и поля ввода */
.line label:not(.checkbox-label) {
  display: block;
  margin-bottom: 5px;
  color: #666;
}

.line input, .line textarea {
  border: 1px solid #ccc;
  width: 100%;
  padding: 12px;
  border-radius: 4px;
  transition: .3s;
}

.line textarea {
  height: 80px;
  resize: none;
}

/* Элементы с чекбоксами и радио-кнопками */
.line input[type="checkbox"], .line input[type="radio"] {
  width: auto;
}

.line em {
  color: #601615;
}

/* Подтверждение */
.main-question-confirm {
  margin: 20px 0;
  display: flex;
  align-items: center;
}

.main-question-confirm input {
  margin-right: 5px;
  height: 18px;
  width: 18px;
}

.main-question-confirm span {
  line-height: 20px;
}

.main-question-confirm a {
  color: #601615;
}

/* Кнопки отправки */
.send-modal-form, .send-modal-form-style {
    background: #601615;
    color: #fff;
}
.send-modal-form, .send-modal-form-style {
    float: left;
    width: 50%;
    margin: 20px 25%;
    border: none;
    text-align: center;
    padding: 8px 0;
    border-radius: 2px;
}
/* Специальные стили для полей ввода с маской телефона */
.phone-masked {
  padding-left: 60px; /* Увеличьте это значение в зависимости от длины префикса */
}

.phone-masked::before {
  content: "+375 ";
  position: absolute;
  left: 10px; /* Расположение префикса */
  top: 50%;
  transform: translateY(-50%);
  color: #999; /* Цвет префикса */
}

/* Кнопка расширения поиска */
.btn-main {
  margin-right: 7px;
  border-radius: 1px;
  overflow: hidden;
  display: flex;
  align-items: center;
  position: relative;
  padding: 5px 10px; /* Добавлено для наглядности */
}

.btn-main .search-input {
  border: none;
  outline: none;
  padding: 12px; /* Увеличенный внутренний отступ для удобства ввода */
  font-size: 16px; /* Увеличенный размер шрифта */
  opacity: 0;
  width: 0;
  transition: all 0.3s ease;
  background: #fff;
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 1;
  box-shadow: 0 0 5px rgba(0,0,0,0.2);
}

.btn-main.expanded .search-input {
  opacity: 1;
  width: 500px; /* Adjust the width as needed */
}

.btn-main i {
  margin-right: 5px; /* Начальный небольшой отступ */
}

.btn-main.expanded i {
  margin-right: 10px; /* Отступ при расширенном состоянии */
}

.btn-main span, .btn-main i:not(.admin-text-edit) {
  padding: 13px 18px;
  font-size: 14px;
  line-height: 14px;
  background: #601615;
  color: #fff;
  float: left;
  font-weight: 600;
  transition-duration: .3s;
}

/* Иконки Material Icons */
.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}

/* Заголовок */
.header-left {
  display: flex;
  align-items: center;
  margin-left: 200px;
}

.modal-content .line label:not(.checkbox-label) {
    float: left;
    width: 100%;
    margin-bottom: 5px;
    color: #666;
}


.modal-content .line input {
    border: 1px solid #ccc;
}
.modal-content .line input {
    float: left;
    width: 100%;
    padding: 12px;
    border-radius: 4px;
    transition: .3s;
}
input, textarea {
    font-family: "Open Sans";
}

.modal-content .main-question-confirm {
    margin: 20px 0 0;
    float: left;
    width: 100%;
    display: flex;
    align-items: center;
}
.main-question-confirm {
    color: #444;
}
.main-question-confirm {
    font-size: 13px;
}
.modal-content .main-question-confirm input {
    float: left;
    margin: 0;
    height: 18px;
    width: 18px;
}
.modal-content .main-question-confirm span {
    float: left;
    line-height: 20px;
    margin-left: 5px;
    max-width: calc(100% - 23px);
}
.main-question-confirm a {
    color: #601615;
}

.send-modal-form, .send-modal-form-style {
    background: #601615;
    color: #fff;
}

.send-modal-form, .send-modal-form-style {
    float: left;
    width: 50%;
    margin: 20px 25%;
    border: none;
    text-align: center;
    padding: 8px 0;
    cursor:pointer;
    border-radius: 2px;
}

.modal-content .line label[for^=leave-order]:not(:last-child) {
    margin-right: 10px;
}
.modal-content .line label[for^=leave-order] {
    float: left;
    display: flex;
    align-items: center;
}
.modal-content .line label[for^=leave-order]>input[type='radio'] {
    margin-top: 0;
}

.modal-content .line input[type="checkbox"], .modal-content .line input[type="radio"] {
    width: auto;
}

.button {
    margin-top: 50px;
    margin-left: 1050px;
}

.registr {
    /* margin-left: auto; */
    display: flex;
    align-items: center;
    position: relative; /* Для правильного позиционирования выпадающего меню */
    padding: 13px 18px;
    font-size: 14px;
    line-height: 14px;
    background: #601615;
    color: #efefef;
    font-weight: 600;
    transition-duration: .3s;
    border-radius: 20%;
}

.registr:hover {
    cursor: pointer;
    /* background-color: blue; */
}


.regist{
  text-decoration: none;
  color: #fff;
}

.dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        
        /* Стили для кнопки, чтобы она выглядела как кнопка */
        .dropbtn {
          
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover {
            /* background-color: #45a049; */
        }
  </style>

</head>

<body>

  <header>
    <div class="container header-container">
      <div class="top-header flex ">

        <a href="#" class="header-logo">
          <img src="images/ЭЛИТДОМ.png" alt="ЭлитДом - продажа квартир">
        </a>
        <p class="header-paragraph">Свяжитесь с нами удобным способом</p>
        <div class="header-left">
          <a href="#" class=" btn-main" onclick="showModal('modal-phoneOrder'); return false;">
            <i class="material-icons">phone_enabled</i>
            <span>Заказать звонок</span>
          </a>
          <a href="#" class="btn-main show-leave-order" onclick="showModal('modal-leaveOrder'); return false;">
            <i class="material-icons">edit</i>
            <span>Оставить заявку</span>
          </a>
          <a href="#" class="btn-main" id="searchBtn">
            <i class="material-icons">search</i>
            <input type="search" class="search-input" placeholder="Search...">
          </a>
        </div>
        <div class="registr">
            <?php if (isset($_SESSION['username'])): ?>
                <div class="dropdown">
                    <a href="#" class="dropbtn"><?php echo htmlspecialchars($_SESSION['username']); ?></a>
                    <div class="dropdown-content">
                        <a href="#">Profile</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="dw/Registration.php" class="regist" id="register-button">
                    <span>Регистрация</span>
                </a>
            <?php endif; ?>
        </div>
      </div>
      <div class="header-contacts">
        <a href="tel:+375291751025" class="top-header-telephone">+375 29 175-10-25</a>
        <a href="https://viber.click/375291751025" class="header-social-networks" target="_blank"><img src="images/viber.png"
            alt="Viber"></a>
        <a href="https://t.me/Flipi23" class="header-social-networks" target="_blank"><img src="images/telegram.png"
            alt="Telegram"></a>
        <a href="https://vk.com/flipii" class="header-social-networks" target="_blank"><img src="images/vk.png" alt="Vk"></a>
      </div>
      <div class="header-right-contacts">
      </div>

      <nav class="menu-nav flex">
        <ul class="header-list list-reset flex">
          <li class="list-item"><a href="#" class="active">Главная</a></li>
          <li class="list-item"><a href="#">Недвижимость</a></li>
          <li class="list-item"><a href="#">Услуги</a></li>
          <li class="list-item"><a href="#">Контакты</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="carousel">
    <button class="carousel-button next" onclick="onNext();">&#187;</button>
    <button class="carousel-button prev" onclick="onPrev();">&#171;</button>
    <ul class="slides">
      <li class="slide" data-active>
        <img src="images/юриэл.webp" alt="">
        <div class="slide_right slide-dark">
          <span class="h2-adv">РИЭЛТЕРСКИЕ УСЛУГИ ДЛЯ ЛЮДЕЙ И БИЗНЕСА</span>
          <p class="h2-adv-after">Решаем любые вопросы с недвижимостью</p>
          <div class="paint">
            <span>Продажа
              <span class="dot"></span>
            </span>
            <span>Аренда
              <span class="dot"></span>
            </span>
            <span>Строительство
              <span class="dot"></span>
            </span>
          </div>
          <div class="ad-info">
            <a href="/objects?category=sell&amp;type=apartment,room,share" class="btn btn-site">Узнать подробнее</a>
          </div>
        </div>
      </li>
      <li class="slide">
        <img src="images/комната.png" alt="">
        <div class="slide_right slide-dark">
          <span class="h2-adv">Каталог недвижимости</span>
          <p class="h2-adv-after">Выгодно инвестируйте в квадратные метры</p>
          <div class="paint">
            <span>Продажа
              <span class="dot"></span>
            </span>
            <span>Аренда
              <span class="dot"></span>
            </span>
            <span>Строительство
              <span class="dot"></span>
            </span>
          </div>
          <div class="ad-info">
            <a href="/objects?category=sell&amp;type=apartment,room,share" class="btn btn-site">Узнать подробнее</a>
          </div>
        </div>
      </li>
      <li class="slide">
        <img src="images/дом.webp" alt="">
        <div class="slide_right slide-dark">
          <span class="h2-adv">ОЦЕНКА НЕДВИЖИМОСТИ</span>
          <p class="h2-adv-after">Узнайте рыночную стоимость жилья</p>
          <div class="paint">
            <span>Продажа
              <span class="dot"></span>
            </span>
            <span>Аренда
              <span class="dot"></span>
            </span>
            <span>Строительство
              <span class="dot"></span>
            </span>
          </div>
          <div class="ad-info">
            <a href="/objects?category=sell&amp;type=apartment,room,share" class="btn btn-site">Узнать подробнее</a>
          </div>
        </div>
      </li>
    </ul>
    <div class="carousel-indicators">
      <!-- Динамически добавляем точки через JavaScript -->
    </div>
  </div>
  
  
 <!-- Затемняющий фон -->
<div class="overlay" id="overlay" onclick="closeModal('modal-phoneOrder');"></div>

<!-- Модальное окно -->
<div class="modal" id="modal-phoneOrder" style="opacity: 1; display: none;">
    <div class="modal-header">
        <span>Заказать звонок</span>
        <a class="close-modal" onclick="closeModal('modal-phoneOrder'); return false;"><i class="fa fa-times"></i>&#9747;</a>
    </div>
    <div class="modal-content">
        <div id="notification" style="display: none; position: fixed; top: 10px; right: 10px; background-color: #4CAF50; color: white; padding: 15px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.2); z-index: 1000;"></div>
        <form id="phoneOrderForm">
            <div class="line">
                <label for="phoneOrder-name">Имя: </label>
                <input type="text" id="phoneOrder-name" name="name" required>
            </div>
            <div class="line">
                <label for="phoneOrder-phone">Телефон: <em>*</em></label>
                <input type="text" id="phoneOrder-phone" name="phone" class="phone-masked" required>
            </div>
            <div class="main-question-confirm">
                <input type="checkbox" id="confirm" class="checkbox" name="confirm" value="1" required>
                <label for="confirm"> Я согласен на <a href="#">обработку персональных данных</a></label>
            </div>
            <button class="send-modal-form" id="submitBtn" type="submit" disabled>Отправить</button>
        </form>
    </div>
</div>



<div class="overlays" id="overlays" onclick="closModal('modal-leaveOrder');"></div>
<!-- Модальное окно "Оставить заявку" -->
<!-- Кнопка открытия второй формы -->

<!-- Модальное окно "Оставить заявку" -->
<!-- Затемняющий фон -->
<div class="overlays" id="overlays" onclick="closeModal('modal-leaveOrder');"></div>

<!-- Модальное окно -->
<div id="modal-leaveOrder" class="leave-order-form modal" style="display: none;">
    <div class="modal-header">
        <span>Оставить заявку</span>
        <a class="close-modal" onclick="closeModal('modal-leaveOrder'); return false;"><i class="fa fa-times"></i>&#9747;</a>
    </div>
    <div class="modal-content">
        <form id="leaveOrderForm">
            <div class="line">
                <label class="checkbox-label" for="leave-order-rent">
                    <input type="radio" id="leave-order-rent" name="rent_sell" value="rent">Сдать
                </label>
                <label class="checkbox-label" for="leave-order-sell">
                    <input type="radio" id="leave-order-sell" name="rent_sell" value="sell" checked>Продать
                </label>
            </div>
            <div class="line">
                <span>Адрес объекта:</span>
                <input type="text" id="leave-order-form-address" name="address" required>
            </div>
            <div class="line">
                <span>Вид объекта:</span>
                <input type="text" id="leave-order-form-name" name="object_type" required>
            </div>
            <div class="line">
                <span>Телефон: <em>*</em></span>
                <input type="text" id="leave-order-form-phone" class="phone-masked" name="phone" required>
            </div>
            <div class="line">
                <span>Email:</span>
                <input type="text" id="leave-order-form-email" name="email" required>
            </div>
            <div class="line">
                <span>Комментарий:</span>
                <textarea id="leave-order-form-comment" name="comment" required></textarea>
            </div>
            <div class="main-question-confirm">
                <input type="checkbox" id="confirme" name="confirm" value="1" required>
                <span> Я согласен на <a href="/personal-terms">обработку персональных данных</a></span>
            </div>
            <button class="send-modal-form-style" id="leave-order-send" type="submit" disabled>Отправить</button>
        </form>
        <div id="notificatione" style="display: none; position: fixed; top: 10px; right: 10px; background-color: #4CAF50; color: white; padding: 15px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.2); z-index: 1000;"></div>
    </div>
</div>



  <main>
    <section>
      <div class="container">
        <h1 class="section-title">АКТУАЛЬНЫЕ ПРЕДЛОЖЕНИЯ НАШЕГО АГЕНСТВА</h1>
        <div class="section-paragraph">
          <p>Наиболее востребованные объекты недвижимости в настоящее время.</p>
        </div>
        <div class="section-group">
          <div class="section-popularObject-title">
            <span>Продажа квартир, комнат</span>
          </div>
          <div class="section-items">
            <?php foreach ($apartments as $apartment): ?>
            <div class="section-item" id="list" data-rooms="<?php echo htmlspecialchars($apartment['number_of_rooms']); ?>">
                <a href="#" class="section-img">
                    <picture>
                      <img src="<?php echo htmlspecialchars($apartment['image']); ?>" alt="Изображение квартиры">
                    </picture>
                </a>
                <div class="section-favorite-overley object_overlay-icon" data-id="<?php echo htmlspecialchars($apartment['id']); ?>">
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                </div>
                <div class="section-info">
                    <a href="#" class="section-name">
                    <?php echo htmlspecialchars($apartment['number_of_rooms']); ?> комнатная квартира
                    </a>
                    <span class="section-adress">
                        &#174; <?php echo htmlspecialchars($apartment['address']); ?>
                    </span>
                    <div class="section-options">
                        <div class="object__option">
                            <span>&#8862; Площадь(О/Ж/К): <?php echo htmlspecialchars($apartment['space']); ?><sup>2</sup></span>
                        </div>
                    </div>
                    <div class="object__price">
                        <span><?php echo htmlspecialchars($apartment['price']); ?> BYN</span>
                        <div class="price-calc">
                            <img src="https://urielt.by/media/img/icons/calc.svg">
                            <div class="price-currency-calculator">
                                <div class="object-currency-item" data-curr="3.1719">
                            <span class="object-currency-price">28000</span><span class="curr-symbol">$</span>
                                </div>
                                <div class="object-currency-item" data-curr="3.5105">
                                    <span class="object-currency-price">25299</span><span class="curr-symbol">€</span>
                                </div>
                                <div class="object-currency-item" data-curr="0.0353">
                                    <span class="object-currency-price">2515955</span><span class="curr-symbol">₽</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="object__price object__sub-price">
                        <span><?php echo htmlspecialchars($apartment['price-currency']); ?> $</span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            </div>
            </div>
        </div>
      </div>
    </section>
    <div class="button">
      <div class="ad-info">
        <a href="/objects?category=sell&amp;type=apartment,room,share" class="btn btn-site">ПОКАЗАТЬ ЕЩЕ</a>
      </div>
    </div>
    <section>
      <div class="container">
        <h1 class="section-title">ПРЕИМУЩЕСТВА РАБОТЫ С НАШЕЙ КОМПАНИЕЙ</h1>
        <div class="section-paragraph">
          <p>Заботимся о вашем спокойствии и решаем вопросы в срок!</p>
        </div>
        <div class="advantage-bl">
          <div class="advantage">
            <div class="advantage-text">
              <span>Безопасность</span>
              <p>Оказываем юридическое сопровождение наших клиентов во время сделки и после регистрации прав собственности. Конфиденциальность. Грамотные, профессиональные переговоры при любой сделке.</p>
            </div>
          </div>
          <div class="advantage">
            <i class="linearicons-color-sampler"></i>
            <div class="advantage-text">
              <span>Эффективность</span>
              <p>Оперативно решаем поставленные задачи. Наши представительства имеются в каждой области Республики Беларусь. При дистанционной продаже заключить договор о сотрудничестве можно в одном городе, а уже в другом наши сотрудники займутся реализацией объекта. Возможность охвата максимальной целевой аудитории – главный козырь АН «Юриэлт».</p>
            </div>
          </div>
          <div class="advantage">
            <i class="linearicons-register"></i>
            <div class="advantage-text">
              <span>Большой выбор</span>
              <p>Предлагаем обширную и постоянно пополняемую базу жилой и коммерческой недвижимости. Новое объявление о продаже/аренде/обмене недвижимости появится на ведущих площадках в интернете, корпоративном сайте компании и в персональных социальных сетях.</p>
            </div>
          </div>
          <div class="advantage">
            <i class="linearicons-alarm-check"></i>
            <div class="advantage-text">
              <span>Надежность </span>
              <p>Юридическая грамотность и многолетний опыт команды профессионалов. Кредитная поддержка. Организуем расчёты между продавцом и покупателем через банк. Наша организация работает по государственным тарифам на риэлтерские услуги, в соответствии с законодательством Республики Беларусь.</p>
            </div>
          </div>
          <div class="advantage">
            <i class="linearicons-list3"></i>
            <div class="advantage-text">
              <span>Гарантия </span>
              <p>Ещё до заключения договора о сотрудничестве клиент может получить бесплатную консультацию специалиста, а также узнать рыночную стоимость недвижимости. Вы платите только за положительный результат в день сделки.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="outer-block block-footer">
      <div class="container">
        <div class="footer">
            <div class="footer__item footer-site-name">
                2024 © ОДО "ЭлитДом". Использование материалов сайта только с разрешения владельца. <br>
                Св-во о госрегистрации № 1557 от 28.12.2000. Зарегистрировано Минским горисполкомом
            </div>
            <div class="footer__item footer-author">
              Представленная на сайте информация носит справочный характер и не является публичной офертой
            </div>
        </div>
    </div>
    </footer>
  </main>
  <script>
 
    // Функция для отображения модального окна
function showModal(modalId) {
    const modal = document.getElementById(modalId);
    const overlay = document.getElementById('overlay');
    if (modal && overlay) {
        modal.style.display = 'block';
        overlay.style.display = 'block';
    }
}

// Функция для закрытия модального окна
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    const overlay = document.getElementById('overlay');
    if (modal && overlay) {
        modal.style.display = 'none';
        overlay.style.display = 'none';
    }
}

// Закрытие модального окна при клике вне его содержимого
window.addEventListener('click', function(event) {
    const overlay = document.getElementById('overlay');
    if (overlay && event.target === overlay) {
        closeModal('modal-phoneOrder');
        closeModal('modal-leaveOrder');
    }
});

 
    document.addEventListener('DOMContentLoaded', () => {
    // Функция для прокрутки к элементу
    function scrollToElement(element) {
        if (element) {
            element.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    // Обработчик ввода в поисковой строке
    // document.querySelector('.search-input').addEventListener('input', function() {
    //     const searchTerm = this.value.toLowerCase();
    //     const items = document.querySelectorAll('.section-item');
    //     let foundElement = null;

    //     items.forEach(item => {
    //         const rooms = item.getAttribute('data-rooms').toLowerCase();
    //         if (rooms.includes(searchTerm)) {
    //             item.style.display = ''; // Показываем элемент
    //             if (!foundElement) {
    //                 foundElement = item; // Запоминаем первый найденный элемент
    //             }
    //         } else {
    //             item.style.display = 'none'; // Скрываем элемент
    //         }
    //     });

    //     // Прокручиваем к найденному элементу
    //     if (foundElement) {
    //         scrollToElement(foundElement);
    //     }
    // });

    // Обработчик нажатия клавиши Enter в поисковой строке
    document.querySelector('.search-input').addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Предотвращаем стандартное поведение формы
            const searchTerm = this.value.toLowerCase();
            const items = document.querySelectorAll('.section-item');
            let foundElement = null;

            items.forEach(item => {
                const rooms = item.getAttribute('data-rooms').toLowerCase();
                if (rooms.includes(searchTerm)) {
                    item.style.display = ''; // Показываем элемент
                    if (!foundElement) {
                        foundElement = item; // Запоминаем первый найденный элемент
                    }
                } else {
                    item.style.display = 'none'; // Скрываем элемент
                }
            });

            // Прокручиваем к найденному элементу
            if (foundElement) {
                scrollToElement(foundElement);
            }
        }
    });

    // Обработка клика по кнопке поиска
    document.getElementById('searchBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default anchor behavior
        this.classList.toggle('expanded');
        const input = this.querySelector('.search-input');
        
        if (this.classList.contains('expanded')) {
            input.focus();
        } else {
            input.blur();
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const dropdown = document.querySelector('.dropdown');
    const dropdownContent = dropdown.querySelector('.dropdown-content');
    const dropbtn = dropdown.querySelector('.dropbtn');

    dropbtn.addEventListener('click', function(event) {
        event.preventDefault();
        dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
    });

    document.addEventListener('click', function(event) {
        if (!dropdown.contains(event.target)) {
            dropdownContent.style.display = 'none';
        }
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('modal-phoneOrder');
    const submitBtn = document.getElementById('submitBtn');

    // Функция для проверки состояния полей формы
    function checkFormValidity() {
        const name = document.getElementById('phoneOrder-name').value.trim();
        const phone = document.getElementById('phoneOrder-phone').value.trim();
        const confirm = document.getElementById('confirm').checked;

        if (name && phone && confirm) {
        submitBtn.style.pointerEvents = 'auto'; // Активируем кнопку
        submitBtn.style.opacity = '1'; // Делает кнопку видимой
        submitBtn.disabled = false; // Разблокируем кнопку
    } else {
        submitBtn.style.pointerEvents = 'none'; // Деактивируем кнопку
        submitBtn.style.opacity = '0.5'; // Делает кнопку полупрозрачной
        submitBtn.disabled = true; // Блокируем кнопку
    }
    }

    // Функция для отображения уведомления
    function showNotification(message) {
        console.log('Showing notification:', message); // Отладка
    const notification = document.getElementById('notificationi');
    notification.textContent = message;
    notification.style.display = 'block';
    setTimeout(() => {
        notification.style.display = 'none';
    }, 3000); // Уведомление исчезает через 3 секунды
    }

    // Функция для отправки формы и отображения уведомления
    function submitForm() {
        console.log('Submitting form'); // Отладка
        showNotification('Звонок заказан, мы скоро с вами свяжемся.');
        setTimeout(() => {
            closeModal('modal-phoneOrder'); // Убедитесь, что функция closeModal определена
        }, 3000); // Закрываем модальное окно через 3 секунды
    }

    // Обработчики событий для проверки валидности формы
    document.querySelectorAll('#modal-phoneOrder input').forEach(input => {
        input.addEventListener('input', checkFormValidity);
        input.addEventListener('change', checkFormValidity);
    });

    // Глобально доступная функция для отправки формы
    window.submitForm = submitForm;

    // Обновляем состояние кнопки отправки при загрузке страницы
    checkFormValidity();
});

document.addEventListener('DOMContentLoaded', function () {
    const phoneInput = document.getElementById('phoneOrder-phone');

    // Устанавливаем `+375` при первом фокусе и форматируем ввод
    let isFirstFocus = true;
    phoneInput.addEventListener('focus', function () {
        if (isFirstFocus) {
            phoneInput.value = '+375 ';
            isFirstFocus = false;
        }
    });

});   
document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('leaveOrderForm');
        const submitBtn = document.getElementById('leave-order-send');

        // Функция для проверки состояния полей формы
        function checkFormValidity() {
            // Получаем значения всех полей формы
            const address = document.getElementById('leave-order-form-address').value.trim();
            const objectType = document.getElementById('leave-order-form-name').value.trim();
            const phone = document.getElementById('leave-order-form-phone').value.trim();
            const email = document.getElementById('leave-order-form-email').value.trim();
            const comment = document.getElementById('leave-order-form-comment').value.trim();
            const confirm = document.getElementById('confirme').checked;

            // Логируем значения для отладки
            console.log({
                address,
                objectType,
                phone,
                email,
                comment,
                confirm
            });

            // Проверка, все ли обязательные поля заполнены и подтверждено согласие
            if (address && objectType && phone && email && comment && confirm) {
                submitBtn.style.pointerEvents = 'auto'; // Активируем кнопку
                submitBtn.style.opacity = '1'; // Делает кнопку видимой
                submitBtn.disabled = false; // Разблокируем кнопку
            } else {
                submitBtn.style.pointerEvents = 'none'; // Деактивируем кнопку
                submitBtn.style.opacity = '0.5'; // Делает кнопку полупрозрачной
                submitBtn.disabled = true; // Блокируем кнопку
            }
        }

        // Функция для отображения уведомления
        function showNotification(message, backgroundColor) {
            console.log('Showing notification:', message); // Отладка
            const notification = document.getElementById('notificatione');
            notification.textContent = message;
            notification.style.backgroundColor = backgroundColor;
            notification.style.display = 'block';
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000); // Уведомление исчезает через 3 секунды
        }

        // Функция для отправки формы
        function submitForm() {
            console.log('Submitting form'); // Отладка
            
            $.ajax({
                url: 'mael.php', // Путь к вашему PHP файлу
                type: 'POST',
                data: $(form).serialize(), // Серийно преобразуем данные формы
                success: function(response) {
                    showNotification('Заявка оставлена, мы скоро с вами свяжемся.', '#4CAF50');
                    form.reset(); // Очистить форму
                    setTimeout(() => {
                        closeModal('modal-leaveOrder'); // Закрываем модальное окно
                    }, 1000); // Закрываем модальное окно через 3 секунды
                },
                error: function() {
                    showNotification('Не удалось отправить сообщение.', '#f44336');
                }
            });
        }

        // Привязка обработчика события к кнопке
        submitBtn.addEventListener('click', (event) => {
            event.preventDefault(); // Отключаем стандартное действие кнопки
            if (!submitBtn.disabled) {
                submitForm();
            }
        });

        // Обработчики событий для проверки валидности формы
        document.querySelectorAll('#modal-leaveOrder input, #modal-leaveOrder textarea').forEach(input => {
            input.addEventListener('input', checkFormValidity);
            input.addEventListener('change', checkFormValidity);
        });

        // Обновляем состояние кнопки отправки при загрузке страницы
        checkFormValidity();
    });

$(document).ready(function() {
    $('#phoneOrderForm').on('submit', function(event) {
        event.preventDefault(); // Отключаем стандартную отправку формы

        $.ajax({
            url: 'mail.php', // Путь к вашему PHP файлу
            type: 'POST',
            data: $(this).serialize(), // Серийно преобразуем данные формы
            success: function(response) {
                showNotification('Сообщение отправлено успешно!', '#4CAF50');
                $('#phoneOrderForm')[0].reset(); // Очистить форму
                setTimeout(() => {
                    closeModal('modal-phoneOrder'); // Закрываем модальное окно
                }, 1000); // Закрываем модальное окно через 3 секунды
            },
            error: function() {
                showNotification('Не удалось отправить сообщение.', '#f44336');
            }
        });
    });

    function showNotification(message, backgroundColor) {
        const notification = $('#notification');
        notification.text(message);
        notification.css('background-color', backgroundColor);
        notification.show();
        setTimeout(() => {
            notification.hide();
        }, 3000); // Уведомление исчезает через 3 секунды
    }
});


  </script>
</body>

</html>
