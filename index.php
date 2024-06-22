<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anyships</title>
    <link rel="icon" href="/public/img/icons/favicon.png">
    <link rel="stylesheet" href="./_dist/css/app.css?v=<?=filemtime('./_dist/css/app.css');?>">
</head>
<body>

    <header class="header">
        <div class="header__container container">
            <div class="header__logo">
                <a href="/"><img src="/public/img/logo.png" alt="logo"></a>
            </div>
            <button class="header__button">
                <span>Войти</span>
                <img src="/public/img/icons/login.svg" alt="login">
            </button>
        </div>
    </header>

    <main class="page-home">
        <div class="page-home__first-block">
            <div class="container">
                <h1 class="page-home__title page-home__title_desktop">Сервис бронирования яхт</h1>
                <div class="page-home__title h1 page-home__title_mobile">Бронирование <br>яхт в Дубае</div>
                <div class="page-home__filter">
                    <div class="filter">
                        <form class="filter__form form" id="filterForm">
                            <div class="filter__grid1 form__input-grid">
                                <div class="form__input-wrap">
                                    <input class="filter__input filter__input_left form__input form__input_right minmax" id="filterPeople" name="people" type="number" min="1" max="50" value="3" required>
                                    <label class="form__label form__label_left" for="filterPeople">Количество персон</label>
                                </div>
                                <div class="form__input-wrap">
                                    <input class="filter__input filter__input_middle form__input form__input_right minmax" id="filterHours" name="hours" type="number" min="1" max="50" value="16" required>
                                    <label class="form__label form__label_left" for="filterHours">Количество часов</label>
                                </div>
                                <div class="form__input-wrap">
                                    <input class="filter__input filter__input_right form__input form__input_date form__input_right minmax" id="filterDate" name="date" type="date" required>
                                    <label class="form__label form__label_date form__label_left" for="filterDate">
                                        <span class="form__label_date-text">Дата</span>
                                        <img class="form__label_date-icon" src="/public/img/icons/calendar.svg" alt="calendar">
                                    </label>
                                </div>
                            </div>

                            <div class="filter__grid2">
                                <div class="range-slider">
                                    <label class="range-slider__input-wrap" for="rangeHoursInput">
                                        <span class="range-slider__label">Время начала</span>
                                        <input type="number" class="range-slider__input minmax" id="rangeHoursInput" value="6" min="1" max="24">
                                    </label>
                                    <input type="text" id="rangeHours" name="hours" value=""
                                           data-min="1"
                                           data-max="24"
                                           data-from="6" />
                                </div>
                                <div class="range-slider range-slider_without-numbers">
                                    <label class="range-slider__input-wrap" for="rangePriceInput">
                                        <span class="range-slider__label">Цена / час</span>

                                        <span class="range-slider__input-group">
                                            <input type="number" class="range-slider__input range-slider__input_w65 minmax" id="rangePriceInputFrom" value="8000" min="5000" max="130000">
                                            <span class="range-slider__input-separator">-</span>
                                            <input type="number" class="range-slider__input range-slider__input_w65 minmax" id="rangePriceInputTo" value="54000" min="5000" max="130000">
                                        </span>

                                    </label>
                                    <input type="text" id="rangePrice" name="hours" value=""
                                           data-min="5000"
                                           data-max="130000"
                                           data-from="8000"
                                           data-to="54000" />
                                    <label class="range-slider__grid-label" for="rangePrice">
                                        <span>От 5 000 руб</span>
                                        <span>До 130 000 руб</span>
                                    </label>
                                </div>
                            </div>

                            <button class="filter__submit form__submit" type="submit">
                                Найти яхту по фильтру
                                <span class="filter__pre-result">Для 8 человек на 16 часов - 25 февраля 2024 с 15:00</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-list">
            <div class="card-list__container container">
                <div class="card-list__grid">

                    <?php for ($i = 1; $i <= 20; $i++): ?>
                    <div class="card <?=$i == 2 ? ' card_disabled' : ''; ?> open-modal" data-modal="#reservationModal">
                        <div class="card__image-wrap">
                            <img class="card__image" src="/public/img/card1.jpg" alt="Яхта Azimut 68 Princess" loading="lazy">
                        </div>
                        <div class="card__content">
                            <div class="card__header">
                                <img class="card__logo" src="/public/img/icons/card-logo.png" alt="card-logo">
                                <button class="card__button">
                                    <img class="card__button-arrow" src="/public/img/icons/arrow-right.svg" alt="card-logo">
                                </button>
                            </div>

                            <div class="card__footer">
                                <div class="card__title">Яхта Azimut 68 Princess</div>

                                <div class="card__info-list">
                                    <div class="card__info card__info_desktop">
                                        <div class="card__value">1 500 РУБ</div>
                                        <div class="card__label">Рекомендованная цена</div>
                                    </div>
                                    <div class="card__info-animate">
                                        <div class="card__info-wrap">
                                            <div class="card__info card__info_mobile">
                                                <div class="card__value">1 500 РУБ</div>
                                                <div class="card__label">Рек. цена</div>
                                            </div>
                                            <div class="card__info">
                                                <div class="card__value">3 000 РУБ</div>
                                                <div class="card__label">Текущая цена</div>
                                            </div>
                                            <div class="card__info">
                                                <div class="card__value">40 м</div>
                                                <div class="card__label">Длина яхты</div>
                                            </div>
                                            <div class="card__info">
                                                <div class="card__value">8 чел.</div>
                                                <div class="card__label">Вместимость</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php endfor; ?>
                    

                </div>

                <button class="card-list__more">
                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.33333 9.16667H9.66667V0.833333C9.66667 0.61232 9.75446 0.400358 9.91074 0.244078C10.067 0.0877975 10.279 0 10.5 0C10.721 0 10.933 0.0877975 11.0893 0.244078C11.2455 0.400358 11.3333 0.61232 11.3333 0.833333V9.16667H19.6667C19.8877 9.16667 20.0996 9.25446 20.2559 9.41074C20.4122 9.56702 20.5 9.77899 20.5 10C20.5 10.221 20.4122 10.433 20.2559 10.5893C20.0996 10.7455 19.8877 10.8333 19.6667 10.8333H11.3333V19.1667C11.3333 19.3877 11.2455 19.5996 11.0893 19.7559C10.933 19.9122 10.721 20 10.5 20C10.279 20 10.067 19.9122 9.91074 19.7559C9.75446 19.5996 9.66667 19.3877 9.66667 19.1667V10.8333H1.33333C1.11232 10.8333 0.900358 10.7455 0.744078 10.5893C0.587797 10.433 0.5 10.221 0.5 10C0.5 9.77899 0.587797 9.56702 0.744078 9.41074C0.900358 9.25446 1.11232 9.16667 1.33333 9.16667Z" fill="black"/>
                    </svg>
                    <span>Показать больше яхт</span>
                </button>
            </div>
        </div>

    </main>

    <footer class="footer">
        <div class="footer__desktop">
            <div class="footer__container container">
                <div class="footer__phone">
                    По всем вопросам <a href="tel:+971585174744">+971 58 517 4744</a>
                </div>

                <div class="footer_social social">
                    <a class="social__item" href="#" target="_blank">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.972 3.68334C18.6643 1.384 15.5954 0.117178 12.3256 0.115845C5.58848 0.115845 0.105137 5.57253 0.102507 12.2796C0.101564 14.4236 0.664411 16.5163 1.73409 18.361L0 24.6646L6.47963 22.973C8.26493 23.9422 10.275 24.453 12.3208 24.4537H12.3257C19.0622 24.4537 24.546 18.9964 24.5488 12.2893C24.55 9.03885 23.2797 5.98258 20.972 3.68334ZM12.3257 22.3993H12.3216C10.4986 22.3986 8.71063 21.9111 7.15079 20.9899L6.77986 20.7708L2.93475 21.7746L3.96111 18.0436L3.71953 17.661C2.7026 16.0513 2.1655 14.1907 2.1663 12.2802C2.16848 6.70564 6.72603 2.17036 12.3298 2.17036C15.0433 2.1712 17.5941 3.22431 19.5122 5.13543C21.4303 7.04655 22.486 9.58686 22.4849 12.2884C22.4827 17.8635 17.9253 22.3993 12.3257 22.3993Z" fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8983 14.8268C17.5929 14.6747 16.0913 13.9394 15.8114 13.8379C15.5314 13.7365 15.3278 13.6858 15.1242 13.9901C14.9207 14.2943 14.3353 14.979 14.1572 15.1819C13.979 15.3846 13.8008 15.4102 13.4955 15.2579C13.1901 15.1057 12.206 14.7848 11.0395 13.7493C10.1315 12.9433 9.51858 11.948 9.34036 11.6436C9.16224 11.3394 9.32141 11.1749 9.47433 11.0233C9.61171 10.8871 9.77976 10.6683 9.93248 10.4908C10.0852 10.3134 10.1361 10.1865 10.2379 9.98379C10.3397 9.78089 10.2888 9.60337 10.2124 9.45128C10.1361 9.29914 9.52528 7.80306 9.2708 7.19436C9.02282 6.60176 8.77107 6.68205 8.58357 6.67262C8.40569 6.66378 8.20182 6.66195 7.99824 6.66195C7.79467 6.66195 7.46373 6.73805 7.18384 7.04227C6.90391 7.34659 6.11486 8.082 6.11486 9.57794C6.11486 11.0741 7.20925 12.5194 7.36196 12.7222C7.51463 12.9252 9.51556 15.9952 12.5793 17.3117C13.3079 17.625 13.8768 17.812 14.3203 17.952C15.052 18.1834 15.7178 18.1507 16.244 18.0724C16.8308 17.9852 18.051 17.3372 18.3055 16.6273C18.56 15.9172 18.56 15.3085 18.4836 15.1818C18.4073 15.0551 18.2037 14.979 17.8983 14.8268Z" fill="white" />
                        </svg>
                    </a>
                    <a class="social__item" href="#" target="_blank">
                        <svg width="12" height="25" viewBox="0 0 12 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.4635 8.26146H7.66326V5.8294C7.66326 4.91604 8.28362 4.7031 8.72056 4.7031H11.4023V0.72126C11.2773 0.705996 11.1512 0.694337 11.0241 0.686392L7.70899 0.673767L7.70476 0.673768C3.6084 0.675828 2.67602 3.66915 2.67602 5.58493V8.26146H0.304932V12.399H2.67602V23.0777V24.1067H7.66326V23.0777V12.399H11.0285L11.4635 8.26146Z" fill="white" />
                        </svg>
                    </a>
                    <a class="social__item" href="#" target="_blank">
                        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.6097 6.42516C9.83022 6.42516 6.69863 9.50275 6.69863 13.3363C6.69863 17.1697 9.77623 20.2473 13.6097 20.2473C17.4432 20.2473 20.5208 17.1158 20.5208 13.3363C20.5208 9.55675 17.3892 6.42516 13.6097 6.42516ZM13.6097 17.7637C11.18 17.7637 9.18231 15.7659 9.18231 13.3363C9.18231 10.9066 11.18 8.90883 13.6097 8.90883C16.0394 8.90883 18.0371 10.9066 18.0371 13.3363C18.0371 15.7659 16.0394 17.7637 13.6097 17.7637Z" fill="white" />
                            <path d="M20.7908 7.82897C21.6556 7.82897 22.3566 7.12794 22.3566 6.26318C22.3566 5.39841 21.6556 4.69738 20.7908 4.69738C19.926 4.69738 19.225 5.39841 19.225 6.26318C19.225 7.12794 19.926 7.82897 20.7908 7.82897Z" fill="white" />
                            <path d="M24.8403 2.21371C23.4364 0.755901 21.4387 0 19.171 0H8.04846C3.35107 0 0.219482 3.13159 0.219482 7.82897V18.8975C0.219482 21.2192 0.975383 23.217 2.48719 24.6748C3.94499 26.0786 5.88874 26.7805 8.10245 26.7805H19.117C21.4387 26.7805 23.3824 26.0246 24.7863 24.6748C26.2441 23.2709 27 21.2732 27 18.9515V7.82897C27 5.56127 26.2441 3.61752 24.8403 2.21371ZM24.6243 18.9515C24.6243 20.6253 24.0304 21.9751 23.0585 22.893C22.0866 23.8109 20.7368 24.2968 19.117 24.2968H8.10245C6.48266 24.2968 5.13284 23.8109 4.16097 22.893C3.18909 21.9211 2.70316 20.5713 2.70316 18.8975V7.82897C2.70316 6.20918 3.18909 4.85936 4.16097 3.88749C5.07885 2.96961 6.48266 2.48367 8.10245 2.48367H19.225C20.8448 2.48367 22.1946 2.96961 23.1665 3.94148C24.0844 4.91336 24.6243 6.26318 24.6243 7.82897V18.9515Z" fill="white" />
                        </svg>
                    </a>
                </div>

                <div class="footer__politicy"><a href="#" target="_blank">Политика конфиденциальности</a></div>
            </div>
        </div>

        <div class="footer__mobile">
            <div class="footer__container container">
                <div class="footer__phone">
                    Rental yacht - customer service <a href="tel:+971585174744">+971 58 517 4744</a>
                </div>

                <div class="footer_social social">
                    <a class="social__item social__item_big-whatsapp" href="#" target="_blank">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.972 3.68334C18.6643 1.384 15.5954 0.117178 12.3256 0.115845C5.58848 0.115845 0.105137 5.57253 0.102507 12.2796C0.101564 14.4236 0.664411 16.5163 1.73409 18.361L0 24.6646L6.47963 22.973C8.26493 23.9422 10.275 24.453 12.3208 24.4537H12.3257C19.0622 24.4537 24.546 18.9964 24.5488 12.2893C24.55 9.03885 23.2797 5.98258 20.972 3.68334ZM12.3257 22.3993H12.3216C10.4986 22.3986 8.71063 21.9111 7.15079 20.9899L6.77986 20.7708L2.93475 21.7746L3.96111 18.0436L3.71953 17.661C2.7026 16.0513 2.1655 14.1907 2.1663 12.2802C2.16848 6.70564 6.72603 2.17036 12.3298 2.17036C15.0433 2.1712 17.5941 3.22431 19.5122 5.13543C21.4303 7.04655 22.486 9.58686 22.4849 12.2884C22.4827 17.8635 17.9253 22.3993 12.3257 22.3993Z" fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8983 14.8268C17.5929 14.6747 16.0913 13.9394 15.8114 13.8379C15.5314 13.7365 15.3278 13.6858 15.1242 13.9901C14.9207 14.2943 14.3353 14.979 14.1572 15.1819C13.979 15.3846 13.8008 15.4102 13.4955 15.2579C13.1901 15.1057 12.206 14.7848 11.0395 13.7493C10.1315 12.9433 9.51858 11.948 9.34036 11.6436C9.16224 11.3394 9.32141 11.1749 9.47433 11.0233C9.61171 10.8871 9.77976 10.6683 9.93248 10.4908C10.0852 10.3134 10.1361 10.1865 10.2379 9.98379C10.3397 9.78089 10.2888 9.60337 10.2124 9.45128C10.1361 9.29914 9.52528 7.80306 9.2708 7.19436C9.02282 6.60176 8.77107 6.68205 8.58357 6.67262C8.40569 6.66378 8.20182 6.66195 7.99824 6.66195C7.79467 6.66195 7.46373 6.73805 7.18384 7.04227C6.90391 7.34659 6.11486 8.082 6.11486 9.57794C6.11486 11.0741 7.20925 12.5194 7.36196 12.7222C7.51463 12.9252 9.51556 15.9952 12.5793 17.3117C13.3079 17.625 13.8768 17.812 14.3203 17.952C15.052 18.1834 15.7178 18.1507 16.244 18.0724C16.8308 17.9852 18.051 17.3372 18.3055 16.6273C18.56 15.9172 18.56 15.3085 18.4836 15.1818C18.4073 15.0551 18.2037 14.979 17.8983 14.8268Z" fill="white" />
                        </svg>
                        <span>WhatApp us</span>
                    </a>
                </div>

                <div class="footer__adress">Dubai, United Arab Emirates</div>
            </div>
        </div>
    </footer>

    <div class="modal" id="reservationModal">
        <div class="modal__bg"></div>
        <div class="modal__container reservation">
            <button class="modal__close modal-close">
                <svg class="modal-close__icon" width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.2" d="M10.8917 10.3077L7.084 6.50002L10.8917 2.69235C11.3028 2.28126 11.3028 1.61943 10.8917 1.20834C10.4806 0.797252 9.81877 0.797252 9.40768 1.20834L5.6 5.01602L1.79232 1.20834C1.38123 0.797252 0.719406 0.797252 0.308317 1.20834C-0.102772 1.61943 -0.102772 2.28126 0.308317 2.69235L4.116 6.50002L0.308317 10.3077C-0.102772 10.7188 -0.102772 11.3806 0.308317 11.7917C0.719406 12.2028 1.38123 12.2028 1.79232 11.7917L5.6 7.98403L9.40768 11.7917C9.81877 12.2028 10.4806 12.2028 10.8917 11.7917C11.2999 11.3806 11.2999 10.7159 10.8917 10.3077Z" fill="black" />
                </svg>
                <span class="modal-close__text">Закрыть</span>
            </button>

            <div class="reservation__left">
                <img class="reservation__image" src="/public/img/modal.jpg" alt="modal-img" loading="lazy">
            </div>
            <div class="reservation__right">
                <div class="modal__title reservation__title h1">Бронирование яхты</div>
                <div class="modal__text reservation__title">Заполните форму ниже, чтобы забронировать яхту, после чего наши специалисты свяжутся с вами, чтобы уточнить детали.</div>

                <form class="reservation__form form" id="reservationForm">
                    <div class="reservation__form-grid form__input-grid">
                        <div class="form__input-wrap">
                            <input class="form__input form__input_right minmax" id="modalPeople" name="people" type="number" min="1" max="24" value="3" required>
                            <label class="form__label form__label_left" for="modalPeople">Количество персон</label>
                        </div>
                        <div class="form__input-wrap">
                            <input class="form__input form__input_right minmax" id="modalHours" name="hours" type="number" min="1" max="72" value="16" required>
                            <label class="form__label form__label_left" for="modalHours">Количество часов</label>
                        </div>
                        <div class="form__input-wrap">
                            <input class="form__input form__input_fio" id="modalFIO" name="fio" type="text" required>
                            <label class="form__label" for="modalFIO">ФИО</label>
                        </div>
                        <div class="form__input-wrap">
                            <input class="form__input form__input_phone" id="modalPhone" name="phone" type="text" required>
                            <label class="form__label" for="modalPhone">
                                <span class="form__span-desktop">Номер телефона</span>
                                <span class="form__span-mobile">Телефон</span>
                            </label>
                        </div>
                    </div>
                    <button class="form__submit" type="submit">Отправить</button>
                    <div class="form__politicy"><span>Пользуясь данной формой вы соглашаетесь с</span> <a href="#" target="_blank">политикой компании</a></div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="successModal">
        <div class="modal__bg"></div>
        <div class="modal__container success-modal">
            <button class="modal__close modal-close">
                <svg class="modal-close__icon" width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.2" d="M10.8917 10.3077L7.084 6.50002L10.8917 2.69235C11.3028 2.28126 11.3028 1.61943 10.8917 1.20834C10.4806 0.797252 9.81877 0.797252 9.40768 1.20834L5.6 5.01602L1.79232 1.20834C1.38123 0.797252 0.719406 0.797252 0.308317 1.20834C-0.102772 1.61943 -0.102772 2.28126 0.308317 2.69235L4.116 6.50002L0.308317 10.3077C-0.102772 10.7188 -0.102772 11.3806 0.308317 11.7917C0.719406 12.2028 1.38123 12.2028 1.79232 11.7917L5.6 7.98403L9.40768 11.7917C9.81877 12.2028 10.4806 12.2028 10.8917 11.7917C11.2999 11.3806 11.2999 10.7159 10.8917 10.3077Z" fill="black" />
                </svg>
                <span class="modal-close__text">Закрыть</span>
            </button>

            <div class="modal__title success-modal__title h1">Все отлично!</div>
            <div class="modal__text success-modal__title">Ваша заявка была успешно отправлена и в ближайшее время с вами свяжется специалист нашей компании, чтобы подтвердить информацию и сориентировать вас по вопросам.</div>
            <div class="success-modal__button-wrap form">
                <button class="modal__button success-modal__button modal-close">Далее</button>
                <div class="form__politicy"><span>Пользуясь данной формой вы соглашаетесь с</span> <a href="#" target="_blank">политикой компании</a></div>
            </div>
        </div>
    </div>

    <!--<script defer type="module" src="http://localhost:5173/@vite/client"></script>
    <script defer type="module" src="http://localhost:5173/_src/js/app.js"></script>-->

    <script src="./_dist/js/app.js"></script>

</body>
</html>