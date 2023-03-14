window.onload = function () {
  "use strict";
  //pop-up start
  const popupLinks = document.querySelectorAll('.popup--link');
  const body = document.querySelector('body');
  const lockPadding = document.querySelectorAll('.lock--padding');
  const lockPaddingItem = document.querySelectorAll('.lock--padding--item');
  const lockPaddingValue = window.innerWidth - document.querySelector('.body').offsetWidth + 'px';

  let unlock = true;

  const timeOut = 500;

  if (popupLinks.length > 0) {
    for (let index = 0; index < popupLinks.length; index++) {
      const popupLink = popupLinks[index];
      popupLink.addEventListener("click", function (e) {
        const popupName = popupLink.getAttribute('href').replace('#', '');
        const curentPopup = document.getElementById(popupName);
        popupOpen(curentPopup);
        e.preventDefault();
      });
    }
  }

  const popupCloseIcon = document.querySelectorAll('.popup--close');
  if (popupCloseIcon.length > 0) {
    for (let index = 0; index < popupCloseIcon.length; index++) {
      const el = popupCloseIcon[index];
      el.addEventListener('click', function (e) {
        popupClose(el.closest('.popup'));
        e.preventDefault();
      });
    }
  }

  function popupOpen(curentPopup) {
    if (curentPopup && unlock) {
      const popupActive = document.querySelector('.popup.open');
      if (popupActive) {
        popupClose(popupActive, false);
      } else {
        bodyLock();
      }
      curentPopup.classList.add('open');
      curentPopup.addEventListener("click", function (e) {
        if (!e.target.closest('.popup__content')) {
          popupClose(e.target.closest('.popup'));
        }
      });
    }
  }

  function popupClose(popupActive, doUnlock) {
    if (unlock) {
      popupActive.classList.remove('open');
      if (doUnlock === undefined) {
        bodyUnLock();
      }
    }
  }

  function bodyLock() {
    const lockPaddingValue = window.innerWidth - document.querySelector('.body').offsetWidth + 'px';
    body.style.paddingRight = lockPaddingValue;
    body.classList.add('_fixed');
    unlock = false;
    if (lockPadding.length > 0) {
      for (let index = 0; index < lockPadding.length; index++) {
        const el = lockPadding[index];
        el.style.paddingRight = lockPaddingValue;
      }
    }
    setTimeout(function () {
      unlock = true;
    }, timeOut);
  };

  function bodyUnLock() {
    setTimeout(function () {
      if (lockPadding.length > 0) {
        for (let index = 0; index < lockPadding.length; index++) {
          const el = lockPadding[index];
          el.style.paddingRight = '0px';
        }
      }
      if (lockPaddingItem.length > 0) {
        for (let index = 0; index < lockPaddingItem.length; index++) {
          const el = lockPaddingItem[index];
          let currentValue = parseInt(getComputedStyle(el).right);
          let finalValue = currentValue - parseInt(lockPaddingValue) + 'px';
          el.style.right = finalValue;
        }
      }
      body.style.paddingRight = '0px';
      body.classList.remove('_fixed');
    }, timeOut);

    unlock = false;
    setTimeout(function () {
      unlock = true;
    }, timeOut);
  }
  document.addEventListener('keydown', function (e) {
    if (e.which === 27) {
      const popupActive = document.querySelectorAll('.popup.open');
      popupClose(popupActive);
    }
  });
  //pop-up end
};


$(function () {
  let width = $(window).width();
  let body = $('.body');
  let menu = $('.menu');

  $(document).on('click', '.js-toggle-menu', function () {
    $(this).toggleClass('_open');
    menu.toggleClass('_open');
    body.toggleClass('_fixed');
  });

  //scroll to section
  $(".js-to-section").on("click", function () {

    if ($('.menu').hasClass('_open')) {
      $('.menu').removeClass('_open');
      body.removeClass('_fixed');
      $('.js-toggle-menu').removeClass('_open')
    }

    let href = $(this).attr("href");

    $("html, body").animate({
      scrollTop: $(href).offset().top + 50
    }, {
      duration: 370, // по умолчанию «400»
      easing: "linear" // по умолчанию «swing»
    });

    return false;
  });
  //scroll to section


  //timer
  let time = $('#timer').attr('data-time');

  const countDownEl = document.getElementById('timer');
  const countDownElHour = document.getElementById('time-hour');
  const countDownElMin = document.getElementById('time-minute');
  const countDownElSec = document.getElementById('time-seconds');

  setInterval(updateCountDown, 1000);

  function updateCountDown() {
    const hours = Math.floor(time / 3600);
    const minutes = Math.floor(time / 60) % 60;
    const seconds = time % 60;
    countDownElHour.innerHTML = hours;
    countDownElMin.innerHTML = minutes;
    countDownElSec.innerHTML = seconds;
    time--;
  }
  //timer

  //sliders
  $('.js-reviews-slider').slick({
    arrows: false,
    slidesToShow: 3,
    dots: true,
    slidesToScroll: 1,
    responsive: [{
        breakpoint: 769,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 577,
        settings: {
          slidesToShow: 1,
          adaptiveHeight: true,
        }
      }
    ]
  });

  $('.js-products-slider').slick({
    dots: true,
    arrows: true,
    appendDots: $('.products__slider-dots'),
    prevArrow: $('.products__slider-arrow_prev'),
    nextArrow: $('.products__slider-arrow_next'),
    infinite: false,
    responsive: [{
      breakpoint: 767,
      settings: {
        adaptiveHeight: true,
      }
    }]
  })



  $('.js-slider-main-1').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    prevArrow: '<div class="slider__arrow slider__arrow_prev"><img class="slider__arrow-img" src="http://win03.beget.tech/wp-content/themes/winning/images/icon/arrow-prev-2.svg"></div>',
    nextArrow: '<div class="slider__arrow slider__arrow_next"><img class="slider__arrow-img" src="http://win03.beget.tech/wp-content/themes/winning/images/icon/arrow-prev-2.svg"></div>',
    asNavFor: '.js-slider-left-1',
  });

  $('.js-slider-left-1').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.js-slider-main-1',
    dots: false,
    arrows: false,
    vertical: true,
    focusOnSelect: true,
    responsive: [{
      breakpoint: 1025,
      settings: {
        slidesToShow: 3,
      }
    }]
  });

  $('.js-slider-main-2').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    prevArrow: '<div class="slider__arrow slider__arrow_prev"><img class="slider__arrow-img" src="http://win03.beget.tech/wp-content/themes/winning/images/icon/arrow-prev-2.svg"></div>',
    nextArrow: '<div class="slider__arrow slider__arrow_next"><img class="slider__arrow-img" src="http://win03.beget.tech/wp-content/themes/winning/images/icon/arrow-prev-2.svg"></div>',
    asNavFor: '.js-slider-left-2'
  });
  $('.js-slider-left-2').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.js-slider-main-2',
    dots: false,
    arrows: false,
    vertical: true,
    focusOnSelect: true,
    responsive: [{
      breakpoint: 1025,
      settings: {
        slidesToShow: 3,
      }
    }]
  });

  $('.js-slider-main-3').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    prevArrow: '<div class="slider__arrow slider__arrow_prev"><img class="slider__arrow-img" src="http://win03.beget.tech/wp-content/themes/winning/images/icon/arrow-prev-2.svg"></div>',
    nextArrow: '<div class="slider__arrow slider__arrow_next"><img class="slider__arrow-img" src="http://win03.beget.tech/wp-content/themes/winning/images/icon/arrow-prev-2.svg"></div>',
    asNavFor: '.js-slider-left-3'
  });
  $('.js-slider-left-3').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.js-slider-main-3',
    dots: false,
    arrows: false,
    vertical: true,
    focusOnSelect: true,
    responsive: [{
      breakpoint: 1025,
      settings: {
        slidesToShow: 3,
      }
    }]
  });
  $('.js-slider-main-4').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    prevArrow: '<div class="slider__arrow slider__arrow_prev"><img class="slider__arrow-img" src="http://win03.beget.tech/wp-content/themes/winning/images/icon/arrow-prev-2.svg"></div>',
    nextArrow: '<div class="slider__arrow slider__arrow_next"><img class="slider__arrow-img" src="http://win03.beget.tech/wp-content/themes/winning/images/icon/arrow-prev-2.svg"></div>',
    asNavFor: '.js-slider-left-4'
  });
  $('.js-slider-left-4').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.js-slider-main-4',
    dots: false,
    arrows: false,
    vertical: true,
    focusOnSelect: true,
    responsive: [{
      breakpoint: 1025,
      settings: {
        slidesToShow: 3,
      }
    }]
  });

  //обработка цветов

  $(".input-colors__input").change(function(){
    let color1 = $('input[name="pr-c-1"]:checked').val();
    let color2 = $('input[name="pr-c-2"]:checked').val();
    let color3 = $('input[name="pr-c-3"]:checked').val();
    let color4 = $('input[name="pr-c-4"]:checked').val();
 
    if (color1){
      $('.js-slider-main-1').slick('slickGoTo', color1);
    }
    if (color2){
      $('.js-slider-main-2').slick('slickGoTo', color2);
    }
    if (color3){
      $('.js-slider-main-3').slick('slickGoTo', color3);
    }
    if (color4){
      $('.js-slider-main-4').slick('slickGoTo', color4);
    }
  })

  //обработка цветов
  //sliders


});