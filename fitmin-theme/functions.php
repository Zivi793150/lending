<?php
/**
 * Функции темы Fitmin Landing
 */

// Настройка темы
function fitmin_theme_setup() {
    // Поддержка переводов
    load_theme_textdomain('fitmin-landing', get_template_directory() . '/languages');
    
    // Поддержка HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Поддержка title tag
    add_theme_support('title-tag');
    
    // Поддержка кастомного логотипа
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Поддержка кастомных изображений
    add_theme_support('post-thumbnails');
    
    // Поддержка кастомных цветов
    add_theme_support('custom-background');
    
    // Поддержка кастомных заголовков
    add_theme_support('custom-header');
    
    // Регистрация меню
    register_nav_menus(array(
        'primary' => __('Главное меню', 'fitmin-landing'),
    ));
}
add_action('after_setup_theme', 'fitmin_theme_setup');

// Подключение стилей и скриптов
function fitmin_scripts() {
    wp_enqueue_style('fitmin-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Подключение скриптов
    wp_enqueue_script('fitmin-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true);
    
    // Локализация для AJAX
    wp_localize_script('fitmin-scripts', 'fitmin_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('fitmin_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'fitmin_scripts');

// Кастомайзер темы
function fitmin_customize_register($wp_customize) {
    
    // Секция Hero
    $wp_customize->add_section('fitmin_hero', array(
        'title' => __('Hero секция', 'fitmin-landing'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Забота о питомцах начинается с правильного питания',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => __('Заголовок Hero', 'fitmin-landing'),
        'section' => 'fitmin_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Премиальные корма Fitmin — свежесть, качество, забота',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Подзаголовок Hero', 'fitmin-landing'),
        'section' => 'fitmin_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_button_text', array(
        'default' => 'Выбрать корм',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_button_text', array(
        'label' => __('Текст кнопки Hero', 'fitmin-landing'),
        'section' => 'fitmin_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_button_url', array(
        'default' => 'https://www.fitmin.com',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('hero_button_url', array(
        'label' => __('URL кнопки Hero', 'fitmin-landing'),
        'section' => 'fitmin_hero',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('hero_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label' => __('Фоновое изображение Hero', 'fitmin-landing'),
        'section' => 'fitmin_hero',
    )));
    
    // Секция О бренде
    $wp_customize->add_section('fitmin_about', array(
        'title' => __('О бренде', 'fitmin-landing'),
        'priority' => 31,
    ));
    
    $wp_customize->add_setting('about_title', array(
        'default' => 'О бренде Fitmin',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_title', array(
        'label' => __('Заголовок секции', 'fitmin-landing'),
        'section' => 'fitmin_about',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('about_text', array(
        'default' => 'Fitmin — чешский бренд кормов для домашних животных с более чем 25-летней историей. Производство расположено в сердце Европы, в предгорьях Орлицких гор. Мы используем только свежие мясные ингредиенты и научный подход к питанию.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('about_text', array(
        'label' => __('Текст о бренде', 'fitmin-landing'),
        'section' => 'fitmin_about',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('about_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label' => __('Изображение секции', 'fitmin-landing'),
        'section' => 'fitmin_about',
    )));
    
    // Секция Продукция
    $wp_customize->add_section('fitmin_products', array(
        'title' => __('Продукция', 'fitmin-landing'),
        'priority' => 32,
    ));
    
    $wp_customize->add_setting('products_title', array(
        'default' => 'Линейка продукции',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('products_title', array(
        'label' => __('Заголовок секции', 'fitmin-landing'),
        'section' => 'fitmin_products',
        'type' => 'text',
    ));
    
    // Продукт 1
    $wp_customize->add_setting('product_1_title', array(
        'default' => 'Для собак',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('product_1_title', array(
        'label' => __('Продукт 1 - Название', 'fitmin-landing'),
        'section' => 'fitmin_products',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('product_1_description', array(
        'default' => 'Сухие и влажные корма для собак всех пород и возрастов.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('product_1_description', array(
        'label' => __('Продукт 1 - Описание', 'fitmin-landing'),
        'section' => 'fitmin_products',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('product_1_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'product_1_image', array(
        'label' => __('Продукт 1 - Изображение', 'fitmin-landing'),
        'section' => 'fitmin_products',
    )));
    
    $wp_customize->add_setting('product_1_link', array(
        'default' => 'https://www.fitmin.com/ru/sobaki/lakomstva-dlya-sobak',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('product_1_link', array(
        'label' => __('Продукт 1 - Ссылка', 'fitmin-landing'),
        'section' => 'fitmin_products',
        'type' => 'url',
    ));
    
    // Продукт 2
    $wp_customize->add_setting('product_2_title', array(
        'default' => 'Для кошек',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('product_2_title', array(
        'label' => __('Продукт 2 - Название', 'fitmin-landing'),
        'section' => 'fitmin_products',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('product_2_description', array(
        'default' => 'Питательные корма и лакомства для кошек.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('product_2_description', array(
        'label' => __('Продукт 2 - Описание', 'fitmin-landing'),
        'section' => 'fitmin_products',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('product_2_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'product_2_image', array(
        'label' => __('Продукт 2 - Изображение', 'fitmin-landing'),
        'section' => 'fitmin_products',
    )));
    
    $wp_customize->add_setting('product_2_link', array(
        'default' => 'https://www.fitmin.com/ru/koshki/fitmin-dlya-koshek',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('product_2_link', array(
        'label' => __('Продукт 2 - Ссылка', 'fitmin-landing'),
        'section' => 'fitmin_products',
        'type' => 'url',
    ));
    
    // Продукт 3
    $wp_customize->add_setting('product_3_title', array(
        'default' => 'Ветеринарные корма',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('product_3_title', array(
        'label' => __('Продукт 3 - Название', 'fitmin-landing'),
        'section' => 'fitmin_products',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('product_3_description', array(
        'default' => 'Специализированные диеты для здоровья питомцев.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('product_3_description', array(
        'label' => __('Продукт 3 - Описание', 'fitmin-landing'),
        'section' => 'fitmin_products',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('product_3_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'product_3_image', array(
        'label' => __('Продукт 3 - Изображение', 'fitmin-landing'),
        'section' => 'fitmin_products',
    )));
    
    $wp_customize->add_setting('product_3_link', array(
        'default' => 'https://www.fitmin.com/ru/sobaki/pishchevye-dobavki-0',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('product_3_link', array(
        'label' => __('Продукт 3 - Ссылка', 'fitmin-landing'),
        'section' => 'fitmin_products',
        'type' => 'url',
    ));
    
    // Продукт 4
    $wp_customize->add_setting('product_4_title', array(
        'default' => 'Деликатесы',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('product_4_title', array(
        'label' => __('Продукт 4 - Название', 'fitmin-landing'),
        'section' => 'fitmin_products',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('product_4_description', array(
        'default' => 'Натуральные лакомства для поощрения и заботы.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('product_4_description', array(
        'label' => __('Продукт 4 - Описание', 'fitmin-landing'),
        'section' => 'fitmin_products',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('product_4_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'product_4_image', array(
        'label' => __('Продукт 4 - Изображение', 'fitmin-landing'),
        'section' => 'fitmin_products',
    )));
    
    $wp_customize->add_setting('product_4_link', array(
        'default' => 'https://www.fitmin.com/ru/sobaki/lakomstva-dlya-sobak',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('product_4_link', array(
        'label' => __('Продукт 4 - Ссылка', 'fitmin-landing'),
        'section' => 'fitmin_products',
        'type' => 'url',
    ));
    
    // Секция Преимущества
    $wp_customize->add_section('fitmin_advantages', array(
        'title' => __('Преимущества', 'fitmin-landing'),
        'priority' => 33,
    ));
    
    $wp_customize->add_setting('advantages_title', array(
        'default' => 'Преимущества FITMIN',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('advantages_title', array(
        'label' => __('Заголовок секции', 'fitmin-landing'),
        'section' => 'fitmin_advantages',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('advantages_bg_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'advantages_bg_image', array(
        'label' => __('Фоновое изображение', 'fitmin-landing'),
        'section' => 'fitmin_advantages',
    )));
    
    // Преимущества
    $wp_customize->add_setting('advantage_1_text', array(
        'default' => 'Свежие мясные ингредиенты',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('advantage_1_text', array(
        'label' => __('Преимущество 1', 'fitmin-landing'),
        'section' => 'fitmin_advantages',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('advantage_2_text', array(
        'default' => 'Проверенное европейское качество',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('advantage_2_text', array(
        'label' => __('Преимущество 2', 'fitmin-landing'),
        'section' => 'fitmin_advantages',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('advantage_3_text', array(
        'default' => 'Научный подход к питанию',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('advantage_3_text', array(
        'label' => __('Преимущество 3', 'fitmin-landing'),
        'section' => 'fitmin_advantages',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('advantage_4_text', array(
        'default' => 'Без ГМО и искусственных добавок',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('advantage_4_text', array(
        'label' => __('Преимущество 4', 'fitmin-landing'),
        'section' => 'fitmin_advantages',
        'type' => 'text',
    ));
    
    // Секция Форма
    $wp_customize->add_section('fitmin_form', array(
        'title' => __('Форма заявки', 'fitmin-landing'),
        'priority' => 34,
    ));
    
    $wp_customize->add_setting('form_title', array(
        'default' => 'Оставить заявку',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('form_title', array(
        'label' => __('Заголовок формы', 'fitmin-landing'),
        'section' => 'fitmin_form',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('form_action_url', array(
        'default' => 'https://formspree.io/f/xpwrkkya',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('form_action_url', array(
        'label' => __('URL отправки формы', 'fitmin-landing'),
        'section' => 'fitmin_form',
        'type' => 'url',
    ));
    
    // Секция Контакты
    $wp_customize->add_section('fitmin_contacts', array(
        'title' => __('Контакты', 'fitmin-landing'),
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('footer_company_name', array(
        'default' => 'Fitmin Kazakhstan',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_company_name', array(
        'label' => __('Название компании', 'fitmin-landing'),
        'section' => 'fitmin_contacts',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('footer_phone_1', array(
        'default' => '+7 707 933 7737',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_phone_1', array(
        'label' => __('Телефон 1', 'fitmin-landing'),
        'section' => 'fitmin_contacts',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('footer_phone_2', array(
        'default' => '+7 777 237 3030',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_phone_2', array(
        'label' => __('Телефон 2', 'fitmin-landing'),
        'section' => 'fitmin_contacts',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('footer_email', array(
        'default' => 'order@fitmin.com.kz',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('footer_email', array(
        'label' => __('Email', 'fitmin-landing'),
        'section' => 'fitmin_contacts',
        'type' => 'email',
    ));
    
    // Социальные сети
    $wp_customize->add_setting('social_instagram', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_instagram', array(
        'label' => __('Instagram URL', 'fitmin-landing'),
        'section' => 'fitmin_contacts',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('social_youtube', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_youtube', array(
        'label' => __('YouTube URL', 'fitmin-landing'),
        'section' => 'fitmin_contacts',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('social_tiktok', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_tiktok', array(
        'label' => __('TikTok URL', 'fitmin-landing'),
        'section' => 'fitmin_contacts',
        'type' => 'url',
    ));
    
    // Секция SEO
    $wp_customize->add_section('fitmin_seo', array(
        'title' => __('SEO настройки', 'fitmin-landing'),
        'priority' => 36,
    ));
    
    $wp_customize->add_setting('meta_description', array(
        'default' => 'Премиальные корма Fitmin для собак и кошек. Качественное питание из свежих ингредиентов.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('meta_description', array(
        'label' => __('Meta Description', 'fitmin-landing'),
        'section' => 'fitmin_seo',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('meta_keywords', array(
        'default' => 'корма для собак, корма для кошек, Fitmin, премиальные корма',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('meta_keywords', array(
        'label' => __('Meta Keywords', 'fitmin-landing'),
        'section' => 'fitmin_seo',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('google_analytics_id', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('google_analytics_id', array(
        'label' => __('Google Analytics ID', 'fitmin-landing'),
        'section' => 'fitmin_seo',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('yandex_metrika_id', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('yandex_metrika_id', array(
        'label' => __('Yandex Metrika ID', 'fitmin-landing'),
        'section' => 'fitmin_seo',
        'type' => 'text',
    ));
}
add_action('customize_register', 'fitmin_customize_register');

// AJAX обработка формы
function fitmin_handle_form_submission() {
    // Проверка nonce
    if (!wp_verify_nonce($_POST['nonce'], 'fitmin_nonce')) {
        wp_die('Security check failed');
    }
    
    // Получение данных формы
    $name = sanitize_text_field($_POST['name']);
    $phone = sanitize_text_field($_POST['phone']);
    $email = sanitize_email($_POST['email']);
    $interest = sanitize_text_field($_POST['interest']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Отправка email
    $to = get_option('admin_email');
    $subject = 'Новая заявка с сайта Fitmin';
    $body = "Имя: $name\n";
    $body .= "Телефон: $phone\n";
    $body .= "Email: $email\n";
    $body .= "Тип интереса: $interest\n";
    $body .= "Сообщение: $message\n";
    
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    $sent = wp_mail($to, $subject, nl2br($body), $headers);
    
    if ($sent) {
        wp_send_json_success('Заявка успешно отправлена');
    } else {
        wp_send_json_error('Ошибка отправки заявки');
    }
}
add_action('wp_ajax_fitmin_form_submit', 'fitmin_handle_form_submission');
add_action('wp_ajax_nopriv_fitmin_form_submit', 'fitmin_handle_form_submission');

// Удаление ненужных элементов WordPress
function fitmin_remove_wp_elements() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('init', 'fitmin_remove_wp_elements');

// Оптимизация изображений
function fitmin_image_sizes() {
    add_image_size('fitmin-hero', 1920, 1080, true);
    add_image_size('fitmin-product', 400, 300, true);
    add_image_size('fitmin-about', 600, 400, true);
}
add_action('after_setup_theme', 'fitmin_image_sizes');

// Добавление поддержки WooCommerce (если нужно)
function fitmin_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'fitmin_woocommerce_support'); 