<?php
/**
 * Главный шаблон темы Fitmin Landing
 */

get_header(); ?>

<div class="fitmin-landing">
    <!-- Hero Section -->
    <section class="fitmin-hero">
        <div class="fitmin-hero-content">
            <h1><?php echo get_theme_mod('hero_title', 'Забота о питомцах начинается с правильного питания'); ?></h1>
            <p><?php echo get_theme_mod('hero_subtitle', 'Премиальные корма Fitmin — свежесть, качество, забота'); ?></p>
            <a href="<?php echo get_theme_mod('hero_button_url', 'https://www.fitmin.com'); ?>" target="_blank" rel="noopener noreferrer" class="fitmin-btn fitmin-hero-btn"><?php echo get_theme_mod('hero_button_text', 'Выбрать корм'); ?></a>
        </div>
        <div class="fitmin-hero-img">
            <?php 
            $hero_image = get_theme_mod('hero_image', get_template_directory_uri() . '/images/banner.png');
            if ($hero_image) : ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="Fitmin Banner" />
            <?php endif; ?>
        </div>
    </section>

    <!-- О бренде -->
    <section class="fitmin-about" id="about">
        <div class="fitmin-container">
            <div class="fitmin-about-img">
                <?php 
                $about_image = get_theme_mod('about_image', get_template_directory_uri() . '/images/korm.png');
                if ($about_image) : ?>
                    <img src="<?php echo esc_url($about_image); ?>" alt="Fitmin Factory" />
                <?php endif; ?>
            </div>
            <div class="fitmin-about-content">
                <h2><?php echo get_theme_mod('about_title', 'О бренде Fitmin'); ?></h2>
                <p><?php echo get_theme_mod('about_text', 'Fitmin — чешский бренд кормов для домашних животных с более чем 25-летней историей. Производство расположено в сердце Европы, в предгорьях Орлицких гор. Мы используем только свежие мясные ингредиенты и научный подход к питанию.'); ?></p>
            </div>
        </div>
    </section>

    <!-- Продукция -->
    <section class="fitmin-products" id="products">
        <div class="fitmin-container">
            <h2><?php echo get_theme_mod('products_title', 'Линейка продукции'); ?></h2>
            <div class="fitmin-products-list">
                <?php
                // Получаем продукты из кастомных полей или используем дефолтные
                $products = array(
                    array(
                        'title' => get_theme_mod('product_1_title', 'Для собак'),
                        'description' => get_theme_mod('product_1_description', 'Сухие и влажные корма для собак всех пород и возрастов.'),
                        'image' => get_theme_mod('product_1_image', get_template_directory_uri() . '/images/feeding dogs.jpg'),
                        'link' => get_theme_mod('product_1_link', 'https://www.fitmin.com/ru/sobaki/lakomstva-dlya-sobak')
                    ),
                    array(
                        'title' => get_theme_mod('product_2_title', 'Для кошек'),
                        'description' => get_theme_mod('product_2_description', 'Питательные корма и лакомства для кошек.'),
                        'image' => get_theme_mod('product_2_image', get_template_directory_uri() . '/images/20200401155735_DSC02018-01 (1).jpeg'),
                        'link' => get_theme_mod('product_2_link', 'https://www.fitmin.com/ru/koshki/fitmin-dlya-koshek')
                    ),
                    array(
                        'title' => get_theme_mod('product_3_title', 'Ветеринарные корма'),
                        'description' => get_theme_mod('product_3_description', 'Специализированные диеты для здоровья питомцев.'),
                        'image' => get_theme_mod('product_3_image', get_template_directory_uri() . '/images/dental sticks kelp.png'),
                        'link' => get_theme_mod('product_3_link', 'https://www.fitmin.com/ru/sobaki/pishchevye-dobavki-0')
                    ),
                    array(
                        'title' => get_theme_mod('product_4_title', 'Деликатесы'),
                        'description' => get_theme_mod('product_4_description', 'Натуральные лакомства для поощрения и заботы.'),
                        'image' => get_theme_mod('product_4_image', get_template_directory_uri() . '/images/EUROBEEF.jpg'),
                        'link' => get_theme_mod('product_4_link', 'https://www.fitmin.com/ru/sobaki/lakomstva-dlya-sobak')
                    )
                );

                foreach ($products as $product) : ?>
                    <div class="fitmin-product-card">
                        <div class="fitmin-product-card-img">
                            <img src="<?php echo esc_url($product['image']); ?>" alt="<?php echo esc_attr($product['title']); ?>" />
                        </div>
                        <h3><?php echo esc_html($product['title']); ?></h3>
                        <p><?php echo esc_html($product['description']); ?></p>
                        <a href="<?php echo esc_url($product['link']); ?>" target="_blank" rel="noopener noreferrer" class="fitmin-btn fitmin-product-btn">Подробнее</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Преимущества -->
    <section class="fitmin-advantages" id="advantages">
        <div class="fitmin-advantages-bg" style="--fitmin-advantages-bg-img: url('<?php echo esc_url(get_theme_mod('advantages_bg_image', get_template_directory_uri() . '/images/Fitmin_interzoo_1586x1058.png')); ?>')"></div>
        <div class="fitmin-advantages-inner">
            <div class="fitmin-container">
                <h2><?php echo get_theme_mod('advantages_title', 'Преимущества FITMIN'); ?></h2>
                <div class="fitmin-advantages-list">
                    <?php
                    $advantages = array(
                        array(
                            'icon' => '🥩',
                            'text' => get_theme_mod('advantage_1_text', 'Свежие мясные ингредиенты')
                        ),
                        array(
                            'icon' => '✅',
                            'text' => get_theme_mod('advantage_2_text', 'Проверенное европейское качество')
                        ),
                        array(
                            'icon' => '🔬',
                            'text' => get_theme_mod('advantage_3_text', 'Научный подход к питанию')
                        ),
                        array(
                            'icon' => '🌱',
                            'text' => get_theme_mod('advantage_4_text', 'Без ГМО и искусственных добавок')
                        )
                    );

                    foreach ($advantages as $advantage) : ?>
                        <div class="fitmin-advantage">
                            <span role="img" aria-label="advantage"><?php echo $advantage['icon']; ?></span>
                            <p><?php echo esc_html($advantage['text']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Форма заявки -->
    <section class="fitmin-form-section" id="form">
        <div class="fitmin-container">
            <h2><?php echo get_theme_mod('form_title', 'Оставить заявку'); ?></h2>
            <form class="fitmin-form" action="<?php echo esc_url(get_theme_mod('form_action_url', 'https://formspree.io/f/xpwrkkya')); ?>" method="POST">
                <input type="hidden" name="_captcha" value="false" />
                <div class="fitmin-form-row">
                    <input type="text" name="name" placeholder="<?php echo esc_attr(get_theme_mod('form_name_placeholder', 'Имя')); ?>" required />
                    <input type="tel" name="phone" placeholder="<?php echo esc_attr(get_theme_mod('form_phone_placeholder', 'Телефон')); ?>" required />
                </div>
                <input type="email" name="email" placeholder="<?php echo esc_attr(get_theme_mod('form_email_placeholder', 'E-mail')); ?>" required />
                <select name="interest" required>
                    <option value=""><?php echo esc_html(get_theme_mod('form_interest_placeholder', 'Тип интереса')); ?></option>
                    <option value="opt"><?php echo esc_html(get_theme_mod('form_interest_opt', 'Опт')); ?></option>
                    <option value="retail"><?php echo esc_html(get_theme_mod('form_interest_retail', 'Розница')); ?></option>
                </select>
                <textarea name="message" placeholder="<?php echo esc_attr(get_theme_mod('form_message_placeholder', 'Сообщение')); ?>" rows="3"></textarea>
                <button type="submit" class="fitmin-btn fitmin-form-btn"><?php echo esc_html(get_theme_mod('form_submit_text', 'Отправить')); ?></button>
            </form>
            <div class="fitmin-form-success" style="display: none;">
                <?php echo esc_html(get_theme_mod('form_success_message', 'Спасибо! Ваша заявка отправлена.')); ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?> 