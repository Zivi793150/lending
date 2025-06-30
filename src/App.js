import './App.css';
import { useState } from 'react';

const bgAdvantages = process.env.PUBLIC_URL + '/images/Fitmin_interzoo_1586x1058.png';

function App() {
  const [menuOpen, setMenuOpen] = useState(false);

  return (
    <div className="fitmin-landing">
      {/* Header */}
      <header className="fitmin-header">
        <div className="fitmin-logo">Fitmin</div>
        <nav className="fitmin-nav">
          <a href="#about">О бренде</a>
          <a href="#products">Продукция</a>
          <a href="#advantages">Преимущества</a>
          <a href="#contacts">Контакты</a>
        </nav>
        <a href="#form" className="fitmin-btn fitmin-header-btn">Оставить заявку</a>
        <button 
          className={`fitmin-burger${menuOpen ? ' open' : ''}`} 
          onClick={() => setMenuOpen(!menuOpen)} 
          aria-label="Открыть меню"
        >
          <span></span><span></span><span></span>
        </button>
        {menuOpen && (
          <div className="fitmin-mobile-menu">
            <a href="#about" onClick={() => setMenuOpen(false)}>О бренде</a>
            <a href="#products" onClick={() => setMenuOpen(false)}>Продукция</a>
            <a href="#advantages" onClick={() => setMenuOpen(false)}>Преимущества</a>
            <a href="#contacts" onClick={() => setMenuOpen(false)}>Контакты</a>
            <a href="#form" className="fitmin-btn fitmin-header-btn" onClick={() => setMenuOpen(false)}>Оставить заявку</a>
          </div>
        )}
      </header>

      {/* Hero Section */}
      <section className="fitmin-hero">
        <div className="fitmin-hero-img">
          <img src="/images/banner.png" alt="Fitmin Banner" />
        </div>
      </section>
      <section className="fitmin-hero-content-section">
        <div className="fitmin-hero-content">
          <h1>Забота о питомцах начинается с правильного питания</h1>
          <p>Премиальные корма Fitmin — свежесть, качество, забота</p>
          <a href="https://www.fitmin.com" target="_blank" rel="noopener noreferrer" className="fitmin-btn fitmin-hero-btn">Выбрать корм</a>
        </div>
      </section>

      {/* О бренде */}
      <section className="fitmin-about" id="about">
        <div className="fitmin-about-img">
          <img src="/images/korm.png" alt="Fitmin Factory" />
        </div>
        <div className="fitmin-about-content">
          <h2>О бренде Fitmin</h2>
          <p>Fitmin — чешский бренд кормов для домашних животных с более чем 25-летней историей. Производство расположено в сердце Европы, в предгорьях Орлицких гор. Мы используем только свежие мясные ингредиенты и научный подход к питанию.</p>
        </div>
      </section>

      {/* Продукция */}
      <section className="fitmin-products" id="products">
        <h2>Линейка продукции</h2>
        <div className="fitmin-products-list">
          <div className="fitmin-product-card">
            <div className="fitmin-product-card-img">
              <img src="/images/feeding dogs.jpg" alt="Для собак" />
            </div>
            <h3>Для собак</h3>
            <p>Сухие и влажные корма для собак всех пород и возрастов.</p>
            <a href="https://www.fitmin.com/ru/sobaki/lakomstva-dlya-sobak" target="_blank" rel="noopener noreferrer" className="fitmin-btn fitmin-product-btn">Подробнее</a>
          </div>
          <div className="fitmin-product-card">
            <div className="fitmin-product-card-img">
              <img src="/images/20200401155735_DSC02018-01 (1).jpeg" alt="Для кошек" />
            </div>
            <h3>Для кошек</h3>
            <p>Питательные корма и лакомства для кошек.</p>
            <a href="https://www.fitmin.com/ru/koshki/fitmin-dlya-koshek" target="_blank" rel="noopener noreferrer" className="fitmin-btn fitmin-product-btn">Подробнее</a>
          </div>
          <div className="fitmin-product-card">
            <div className="fitmin-product-card-img">
              <img src="/images/dental sticks kelp.png" alt="Ветеринарные корма" />
            </div>
            <h3>Ветеринарные корма</h3>
            <p>Специализированные диеты для здоровья питомцев.</p>
            <a href="https://www.fitmin.com/ru/sobaki/pishchevye-dobavki-0" target="_blank" rel="noopener noreferrer" className="fitmin-btn fitmin-product-btn">Подробнее</a>
          </div>
          <div className="fitmin-product-card">
            <div className="fitmin-product-card-img">
              <img src="/images/EUROBEEF.jpg" alt="Деликатесы" />
            </div>
            <h3>Деликатесы</h3>
            <p>Натуральные лакомства для поощрения и заботы.</p>
            <a href="https://www.fitmin.com/ru/sobaki/lakomstva-dlya-sobak" target="_blank" rel="noopener noreferrer" className="fitmin-btn fitmin-product-btn">Подробнее</a>
          </div>
        </div>
      </section>

      {/* Преимущества */}
      <section
        className="fitmin-advantages"
        id="advantages"
      >
        <div
          className="fitmin-advantages-bg"
          style={{
            '--fitmin-advantages-bg-img': `url(${bgAdvantages})`
          }}
        ></div>
        <div className="fitmin-advantages-inner" style={{maxWidth: '1200px', margin: '0 auto', width: '100%'}}>
          <h2>Преимущества FITMIN</h2>
          <div className="fitmin-advantages-list">
            <div className="fitmin-advantage">
              <span role="img" aria-label="meat">🥩</span>
              <p>Свежие мясные ингредиенты</p>
            </div>
            <div className="fitmin-advantage">
              <span role="img" aria-label="quality">✅</span>
              <p>Проверенное европейское качество</p>
            </div>
            <div className="fitmin-advantage">
              <span role="img" aria-label="science">🔬</span>
              <p>Научный подход к питанию</p>
            </div>
            <div className="fitmin-advantage">
              <span role="img" aria-label="no-gmo">🌱</span>
              <p>Без ГМО и искусственных добавок</p>
            </div>
          </div>
        </div>
      </section>

      {/* Форма заявки */}
      <section className="fitmin-form-section" id="form">
        <h2>Оставить заявку</h2>
        <form className="fitmin-form" action="https://formspree.io/f/xpwrkkya" method="POST">
          <input type="hidden" name="_captcha" value="false" />
          <div className="fitmin-form-row">
            <input type="text" name="name" placeholder="Имя" required />
            <input type="tel" name="phone" placeholder="Телефон" required />
          </div>
          <input type="email" name="email" placeholder="E-mail" required />
          <select name="interest" required>
            <option value="">Тип интереса</option>
            <option value="opt">Опт</option>
            <option value="retail">Розница</option>
          </select>
          <textarea name="message" placeholder="Сообщение" rows="3"></textarea>
          <button type="submit" className="fitmin-btn fitmin-form-btn">Отправить</button>
        </form>
        <div className="fitmin-form-success" style={{ display: 'none' }}>
          Спасибо! Ваша заявка отправлена.
        </div>
      </section>

      {/* Контакты и подвал */}
      <footer className="fitmin-footer">
        <div className="fitmin-container">
          <div className="fitmin-footer-content">
            <div className="fitmin-footer-section">
              <h3>Fitmin Kazakhstan</h3>
              <p>Качественные корма для ваших животных</p>
              <p>АЛМАТЫ, ПР. АБАЯ, Д. 115/96, 101</p>
            </div>
            <div className="fitmin-footer-section">
              <h3>Контакты</h3>
              <p>Телефон отдела продаж:<br/>+7 707 933 7737,<br/>+7 777 237 3030</p>
              <p>Email: <a href="mailto:order@fitmin.com.kz" style={{color: '#95AC23', textDecoration: 'underline'}}>order@fitmin.com.kz</a></p>
            </div>
            <div className="fitmin-footer-section">
              <h3>Социальные сети</h3>
              <div className="fitmin-social-links">
                <span className="fitmin-social-link"><i className="fab fa-instagram"></i></span>
                <span className="fitmin-social-link"><i className="fab fa-youtube"></i></span>
                <span className="fitmin-social-link"><i className="fab fa-tiktok"></i></span>
              </div>
            </div>
          </div>
          <div className="fitmin-footer-bottom">
            <p>Copyright © 2025 Fitmin Kazakhstan</p>
          </div>
        </div>
      </footer>
    </div>
  );
}

export default App;
