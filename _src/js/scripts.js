import "ion-rangeslider/css/ion.rangeSlider.min.css";
import "ion-rangeslider";

import "flatpickr/dist/flatpickr.min.css";
import flatpickr from "flatpickr";
import "flatpickr/dist/esm/l10n/ru.js";

import $ from "jquery";
import "inputmask";
import {Flag, fadeIn, fadeOut, enforceMinMax} from './utilities.js';
import {FilterButtonUpdater} from './FilterButtonUpdater.js';

document.addEventListener('DOMContentLoaded', () => {
    init();

    function init(){
        const flag = new Flag();

        eventListeners(flag);
        initCalendar();
        setPhoneMask();
        rangeSliders();
    }


    function eventListeners(flag) {
        headerFixedHandler();

        const openModalButtons = document.querySelectorAll('.open-modal');
        openModalButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                flag.toggle(() => {
                    const modalSelector = this.dataset.modal;
                    const modal = document.querySelector(modalSelector);

                    fadeIn(modal, 'flex');
                });
            });
        });

        const closeModalButtons = document.querySelectorAll('.modal-close');
        closeModalButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                flag.toggle(() => {
                    const modal = this.closest('.modal');

                    fadeOut(modal);
                });
            });
        });

        const modalBg = document.querySelectorAll('.modal__bg');
        modalBg.forEach(function(block) {
            block.addEventListener('click', function() {
                flag.toggle(() => {
                    const modal = this.closest('.modal');

                    fadeOut(modal);
                });
            });
        });

        const inputsNumber = document.querySelectorAll('.minmax');
        inputsNumber.forEach(function(input) {
            input.addEventListener('keyup', function() {
                enforceMinMax(input);
            });
        });

        const reservationForm = document.querySelector('#reservationForm');
        const reservationModal = document.querySelector('#reservationModal');
        reservationForm?.addEventListener('submit', function (event) {
            event.preventDefault();

            // fetch
            console.log('fetch');

            resultSuccess(reservationForm, reservationModal);
        });

        const filterForm = document.querySelector('#filterForm');
        filterForm?.addEventListener('submit', function (event) {
            event.preventDefault();

            // fetch
            console.log('fetch');
        });
    }

    function initCalendar() {
        document.getElementById('filterDate').valueAsDate = new Date();

        flatpickr("#filterDate", {
            minDate: "today",
            defaultDate: "today",
            dateFormat: "d.m.Y",
            disableMobile: "true",
            "locale": "ru",
        });
    }

    function setPhoneMask() {
        let inputPhone = document.querySelector('#modalPhone');
        let im = new Inputmask("+7 (999) 999-99-99", {
            oncomplete: function() {
                inputPhone.setCustomValidity('');
            },
            onincomplete: function() {
                inputPhone.setCustomValidity('Введите полный номер телефона');
            }
        });
        im.mask(inputPhone);
    }

    function resultSuccess(form, modal) {
        form.reset();

        setTimeout(() => fadeOut(modal), 200);

        const successModal = document.querySelector('#successModal');
        fadeIn(successModal, 'flex');
        setTimeout(() => fadeOut(successModal), 3500);
    }

    function headerFixedHandler() {
        const siteHeader = document.querySelector('.header');
        const siteHeaderHeight = siteHeader.offsetHeight;

        headerFixed();

        window.addEventListener('scroll', () => {
            headerFixed();
        }, false);

        function headerFixed() {
            const top = document.documentElement.scrollTop || document.body.scrollTop;
            if(top > 20) {
                siteHeader.classList.add('header_fixed');
            } else {
                siteHeader.classList.remove('header_fixed');
            }
        }

    }

    function rangeSliders() {
        initHoursSlider();
        initPriceSlider();

        function initHoursSlider() {
            const rangeHours = $('#rangeHours');
            const rangeHoursInput = document.querySelector('#rangeHoursInput');
            const filterPeople = document.querySelector('#filterPeople');
            const filterHours = document.querySelector('#filterHours');
            const filterDate = document.getElementById('filterDate');
            const filterButton = document.querySelector('.filter__submit .filter__pre-result');

            const filterButtonUpdater = new FilterButtonUpdater(filterPeople, filterHours, filterDate, rangeHoursInput, filterButton);
            filterButtonUpdater.setupListeners();
            filterButtonUpdater.updateButton();

            rangeHours.ionRangeSlider({
                grid: true,
                grid_snap: true,
                step: 1,
                hide_min_max: true,
                hide_from_to: true,
                force_edges: true,
                onChange: function (data) {
                    if (rangeHoursInput) {
                        rangeHoursInput.value = data.from;
                    }
                    filterButtonUpdater.updateButton();
                },
            });

            let rangeHoursSlider = rangeHours.data("ionRangeSlider");
            rangeHoursInput.addEventListener('input', function() {
                let value = Number( this.value );
                value = isNaN(value) ? 0 : value;
                rangeHoursSlider.update({
                    from: value
                });
            } );
        }
        function initPriceSlider() {
            const rangePrice = $('#rangePrice');
            const rangePriceInputFrom = document.querySelector('#rangePriceInputFrom');
            const rangePriceInputTo = document.querySelector('#rangePriceInputTo');
            rangePrice.ionRangeSlider({
                type: "double",
                grid: true,
                grid_snap: true,
                step: 1000,
                hide_min_max: true,
                hide_from_to: true,
                force_edges: true,
                onChange: function (data) {
                    if (rangePriceInputFrom) {
                        rangePriceInputFrom.value = data.from;
                    }
                    if (rangePriceInputTo) {
                        rangePriceInputTo.value = data.to;
                    }
                },
            });

            let rangePriceSlider = rangePrice.data("ionRangeSlider");

            rangePriceInputFrom.addEventListener('input', function() {
                let value = Number( this.value );
                value = isNaN(value) ? 0 : value;
                rangePriceSlider.update({
                    from: value
                });
            } );
            rangePriceInputTo.addEventListener('input', function() {
                let value = Number( this.value );
                value = isNaN(value) ? 0 : value;
                rangePriceSlider.update({
                    to: value
                });
            } );
        }
    }

});