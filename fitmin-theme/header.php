<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- SEO Meta Tags -->
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="description" content="<?php echo esc_attr(get_theme_mod('meta_description', 'Премиальные корма Fitmin для собак и кошек. Качественное питание из свежих ингредиентов.')); ?>">
    <meta name="keywords" content="<?php echo esc_attr(get_theme_mod('meta_keywords', 'корма для собак, корма для кошек, Fitmin, премиальные корма')); ?>">
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); ?>">
    <meta property="og:description" content="<?php echo esc_attr(get_theme_mod('meta_description', 'Премиальные корма Fitmin для собак и кошек.')); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
    <meta property="og:image" content="<?php echo esc_url(get_theme_mod('og_image', get_template_directory_uri() . '/images/banner.png')); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo esc_url(get_theme_mod('favicon', get_template_directory_uri() . '/images/favicon.ico')); ?>">
    
    <!-- Font Awesome для иконок -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Header -->
<header class="fitmin-header">
    <div class="fitmin-container">
        <div class="fitmin-logo">
            <?php 
            $logo_text = get_theme_mod('logo_text', 'Fitmin');
            $logo_image = get_theme_mod('logo_image');
            
            if ($logo_image) : ?>
                <img src="<?php echo esc_url($logo_image); ?>" alt="<?php echo esc_attr($logo_text); ?>" />
            <?php else : ?>
                <?php echo esc_html($logo_text); ?>
            <?php endif; ?>
        </div>
        
        <nav class="fitmin-nav">
            <a href="#about"><?php echo esc_html(get_theme_mod('nav_about', 'О бренде')); ?></a>
            <a href="#products"><?php echo esc_html(get_theme_mod('nav_products', 'Продукция')); ?></a>
            <a href="#advantages"><?php echo esc_html(get_theme_mod('nav_advantages', 'Преимущества')); ?></a>
            <a href="#contacts"><?php echo esc_html(get_theme_mod('nav_contacts', 'Контакты')); ?></a>
        </nav>
        
        <a href="#form" class="fitmin-btn fitmin-header-btn"><?php echo esc_html(get_theme_mod('header_button_text', 'Оставить заявку')); ?></a>
        
        <button class="fitmin-burger" id="mobile-menu-toggle" aria-label="Открыть меню">
            <span></span><span></span><span></span>
        </button>
        
        <div class="fitmin-mobile-menu" id="mobile-menu">
            <a href="#about" onclick="closeMobileMenu()"><?php echo esc_html(get_theme_mod('nav_about', 'О бренде')); ?></a>
            <a href="#products" onclick="closeMobileMenu()"><?php echo esc_html(get_theme_mod('nav_products', 'Продукция')); ?></a>
            <a href="#advantages" onclick="closeMobileMenu()"><?php echo esc_html(get_theme_mod('nav_advantages', 'Преимущества')); ?></a>
            <a href="#contacts" onclick="closeMobileMenu()"><?php echo esc_html(get_theme_mod('nav_contacts', 'Контакты')); ?></a>
            <a href="#form" class="fitmin-btn fitmin-header-btn" onclick="closeMobileMenu()"><?php echo esc_html(get_theme_mod('header_button_text', 'Оставить заявку')); ?></a>
        </div>
    </div>
</header>

<script>
// Мобильное меню
document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
    this.classList.toggle('open');
    document.getElementById('mobile-menu').style.display = 
        this.classList.contains('open') ? 'flex' : 'none';
});

function closeMobileMenu() {
    document.getElementById('mobile-menu-toggle').classList.remove('open');
    document.getElementById('mobile-menu').style.display = 'none';
}

// Плавная прокрутка для якорных ссылок
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script> 