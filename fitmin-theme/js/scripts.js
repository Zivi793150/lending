/**
 * Дополнительные скрипты для темы Fitmin Landing
 */

jQuery(document).ready(function($) {
    
    // Плавная прокрутка для якорных ссылок
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        
        var target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 80
            }, 1000);
        }
    });
    
    // Анимация элементов при скролле
    function animateOnScroll() {
        $('.fitmin-product-card, .fitmin-advantage').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            
            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('animate-in');
            }
        });
    }
    
    // Запуск анимации при скролле
    $(window).on('scroll', animateOnScroll);
    animateOnScroll(); // Запуск при загрузке страницы
    
    // Обработка формы через AJAX
    $('.fitmin-form').on('submit', function(e) {
        e.preventDefault();
        
        var form = $(this);
        var submitBtn = form.find('button[type="submit"]');
        var originalText = submitBtn.text();
        var successMessage = $('.fitmin-form-success');
        
        // Показываем загрузку
        submitBtn.text('Отправка...').prop('disabled', true);
        
        // Собираем данные формы
        var formData = new FormData(this);
        formData.append('action', 'fitmin_form_submit');
        formData.append('nonce', fitmin_ajax.nonce);
        
        // Отправляем AJAX запрос
        $.ajax({
            url: fitmin_ajax.ajax_url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    successMessage.text(response.data).show();
                    form[0].reset();
                    
                    // Скрываем сообщение через 5 секунд
                    setTimeout(function() {
                        successMessage.fadeOut();
                    }, 5000);
                } else {
                    alert('Ошибка отправки. Попробуйте еще раз.');
                }
            },
            error: function() {
                alert('Ошибка отправки. Попробуйте еще раз.');
            },
            complete: function() {
                submitBtn.text(originalText).prop('disabled', false);
            }
        });
    });
    
    // Фиксированный хедер при скролле
    var header = $('.fitmin-header');
    var headerHeight = header.outerHeight();
    var lastScrollTop = 0;
    
    $(window).on('scroll', function() {
        var scrollTop = $(this).scrollTop();
        
        if (scrollTop > headerHeight) {
            header.addClass('scrolled');
        } else {
            header.removeClass('scrolled');
        }
        
        // Скрытие/показ хедера при скролле
        if (scrollTop > lastScrollTop && scrollTop > headerHeight) {
            header.addClass('header-hidden');
        } else {
            header.removeClass('header-hidden');
        }
        
        lastScrollTop = scrollTop;
    });
    
    // Мобильное меню
    $('#mobile-menu-toggle').on('click', function() {
        $(this).toggleClass('open');
        $('#mobile-menu').slideToggle();
    });
    
    // Закрытие мобильного меню при клике на ссылку
    $('#mobile-menu a').on('click', function() {
        $('#mobile-menu-toggle').removeClass('open');
        $('#mobile-menu').slideUp();
    });
    
    // Закрытие мобильного меню при клике вне его
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.fitmin-header').length) {
            $('#mobile-menu-toggle').removeClass('open');
            $('#mobile-menu').slideUp();
        }
    });
    
    // Анимация счетчиков (если есть)
    function animateCounters() {
        $('.counter').each(function() {
            var $this = $(this);
            var countTo = $this.attr('data-count');
            
            $({ countNum: $this.text() }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    }
    
    // Запуск анимации счетчиков при появлении в области видимости
    $('.counter').each(function() {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        
        if (elementBottom > viewportTop && elementTop < viewportBottom) {
            animateCounters();
        }
    });
    
    // Ленивая загрузка изображений
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
    
    // Плавная анимация появления элементов
    $('.fitmin-product-card, .fitmin-advantage').each(function(index) {
        $(this).css({
            'opacity': '0',
            'transform': 'translateY(30px)',
            'transition': 'opacity 0.6s ease, transform 0.6s ease',
            'transition-delay': (index * 0.1) + 's'
        });
    });
    
    // Активация анимации при появлении в области видимости
    function checkAnimation() {
        $('.fitmin-product-card, .fitmin-advantage').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            
            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).css({
                    'opacity': '1',
                    'transform': 'translateY(0)'
                });
            }
        });
    }
    
    $(window).on('scroll', checkAnimation);
    checkAnimation(); // Запуск при загрузке страницы
    
    // Оптимизация производительности
    var ticking = false;
    
    function updateOnScroll() {
        animateOnScroll();
        checkAnimation();
        ticking = false;
    }
    
    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateOnScroll);
            ticking = true;
        }
    }
    
    $(window).on('scroll', requestTick);
    
    // Поддержка клавиатуры для мобильного меню
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape') {
            $('#mobile-menu-toggle').removeClass('open');
            $('#mobile-menu').slideUp();
        }
    });
    
    // Улучшенная доступность
    $('.fitmin-btn').on('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            $(this).click();
        }
    });
    
    // Анимация при наведении на карточки продуктов
    $('.fitmin-product-card').hover(
        function() {
            $(this).find('.fitmin-product-card-img img').css('transform', 'scale(1.1)');
        },
        function() {
            $(this).find('.fitmin-product-card-img img').css('transform', 'scale(1)');
        }
    );
    
    // Плавная прокрутка к форме при клике на кнопку "Оставить заявку"
    $('.fitmin-header-btn, .fitmin-hero-btn').on('click', function(e) {
        if ($(this).attr('href') === '#form') {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $('#form').offset().top - 80
            }, 1000);
        }
    });
    
    // Валидация формы в реальном времени
    $('.fitmin-form input, .fitmin-form textarea').on('blur', function() {
        var field = $(this);
        var value = field.val().trim();
        
        if (field.attr('required') && !value) {
            field.addClass('error');
        } else {
            field.removeClass('error');
        }
        
        // Валидация email
        if (field.attr('type') === 'email' && value) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                field.addClass('error');
            } else {
                field.removeClass('error');
            }
        }
        
        // Валидация телефона
        if (field.attr('type') === 'tel' && value) {
            var phoneRegex = /^[\+]?[0-9\s\-\(\)]{10,}$/;
            if (!phoneRegex.test(value)) {
                field.addClass('error');
            } else {
                field.removeClass('error');
            }
        }
    });
    
    // Удаление класса ошибки при вводе
    $('.fitmin-form input, .fitmin-form textarea').on('input', function() {
        $(this).removeClass('error');
    });
    
    console.log('Fitmin Landing Theme scripts loaded successfully!');
}); 