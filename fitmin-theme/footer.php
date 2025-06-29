<!-- Footer -->
<footer class="fitmin-footer" id="contacts">
    <div class="fitmin-container">
        <div class="fitmin-footer-content">
            <div class="fitmin-footer-section">
                <h3><?php echo esc_html(get_theme_mod('footer_company_name', 'Fitmin Kazakhstan')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('footer_company_description', 'Качественные корма для ваших животных')); ?></p>
                <p><?php echo esc_html(get_theme_mod('footer_address', 'АЛМАТЫ, ПР. АБАЯ, Д. 115/96, 101')); ?></p>
            </div>
            
            <div class="fitmin-footer-section">
                <h3><?php echo esc_html(get_theme_mod('footer_contacts_title', 'Контакты')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('footer_phone_label', 'Телефон отдела продаж:')); ?><br/>
                <?php echo esc_html(get_theme_mod('footer_phone_1', '+7 707 933 7737')); ?>,<br/>
                <?php echo esc_html(get_theme_mod('footer_phone_2', '+7 777 237 3030')); ?></p>
                <p>Email: <a href="mailto:<?php echo esc_attr(get_theme_mod('footer_email', 'order@fitmin.com.kz')); ?>" style="color: #95AC23; text-decoration: underline;"><?php echo esc_html(get_theme_mod('footer_email', 'order@fitmin.com.kz')); ?></a></p>
            </div>
            
            <div class="fitmin-footer-section">
                <h3><?php echo esc_html(get_theme_mod('footer_social_title', 'Социальные сети')); ?></h3>
                <div class="fitmin-social-links">
                    <?php 
                    $instagram_url = get_theme_mod('social_instagram');
                    $youtube_url = get_theme_mod('social_youtube');
                    $tiktok_url = get_theme_mod('social_tiktok');
                    ?>
                    
                    <?php if ($instagram_url) : ?>
                        <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer" class="fitmin-social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php else : ?>
                        <span class="fitmin-social-link"><i class="fab fa-instagram"></i></span>
                    <?php endif; ?>
                    
                    <?php if ($youtube_url) : ?>
                        <a href="<?php echo esc_url($youtube_url); ?>" target="_blank" rel="noopener noreferrer" class="fitmin-social-link">
                            <i class="fab fa-youtube"></i>
                        </a>
                    <?php else : ?>
                        <span class="fitmin-social-link"><i class="fab fa-youtube"></i></span>
                    <?php endif; ?>
                    
                    <?php if ($tiktok_url) : ?>
                        <a href="<?php echo esc_url($tiktok_url); ?>" target="_blank" rel="noopener noreferrer" class="fitmin-social-link">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    <?php else : ?>
                        <span class="fitmin-social-link"><i class="fab fa-tiktok"></i></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="fitmin-footer-bottom">
            <p><?php echo esc_html(get_theme_mod('footer_copyright', 'Copyright © 2025 Fitmin Kazakhstan')); ?></p>
            <?php if (get_theme_mod('show_privacy_policy', true)) : ?>
                <p><a href="<?php echo esc_url(get_privacy_policy_url()); ?>" style="color: #95AC23; text-decoration: underline;"><?php echo esc_html(get_theme_mod('privacy_policy_text', 'Политика конфиденциальности')); ?></a></p>
            <?php endif; ?>
        </div>
    </div>
</footer>

<script>
// Обработка формы
document.querySelector('.fitmin-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    
    // Показываем загрузку
    submitBtn.textContent = 'Отправка...';
    submitBtn.disabled = true;
    
    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.ok) {
            // Показываем успех
            document.querySelector('.fitmin-form-success').style.display = 'block';
            this.reset();
            
            // Скрываем сообщение через 5 секунд
            setTimeout(() => {
                document.querySelector('.fitmin-form-success').style.display = 'none';
            }, 5000);
        } else {
            alert('Ошибка отправки. Попробуйте еще раз.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Ошибка отправки. Попробуйте еще раз.');
    })
    .finally(() => {
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    });
});

// Анимация при скролле
function animateOnScroll() {
    const elements = document.querySelectorAll('.fitmin-product-card, .fitmin-advantage');
    
    elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;
        
        if (elementTop < window.innerHeight - elementVisible) {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }
    });
}

// Инициализация анимации
document.addEventListener('DOMContentLoaded', function() {
    // Устанавливаем начальное состояние для анимации
    const elements = document.querySelectorAll('.fitmin-product-card, .fitmin-advantage');
    elements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });
    
    // Запускаем анимацию
    animateOnScroll();
    window.addEventListener('scroll', animateOnScroll);
});

// Google Analytics (если настроен)
<?php if (get_theme_mod('google_analytics_id')) : ?>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', '<?php echo esc_js(get_theme_mod('google_analytics_id')); ?>', 'auto');
ga('send', 'pageview');
<?php endif; ?>

// Yandex Metrika (если настроена)
<?php if (get_theme_mod('yandex_metrika_id')) : ?>
(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

ym(<?php echo esc_js(get_theme_mod('yandex_metrika_id')); ?>, "init", {
    clickmap:true,
    trackLinks:true,
    accurateTrackBounce:true
});
<?php endif; ?>
</script>

<?php wp_footer(); ?>
</body>
</html> 