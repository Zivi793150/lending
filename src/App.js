import './App.css';
import { useState } from 'react';

function App() {
  const [menuOpen, setMenuOpen] = useState(false);

  return (
    <div className="fitmin-landing">
      {/* Header */}
      <header className="fitmin-header">
        <div className="fitmin-logo">FITMIN</div>
        <nav className={`fitmin-nav${menuOpen ? ' open' : ''}`}>
          <a href="#about">О бренде</a>
          <a href="#products">Продукция</a>
          <a href="#advantages">Преимущества</a>
          <a href="#contacts">Контакты</a>
        </nav>
        <a href="#form" className="fitmin-btn fitmin-header-btn">Оставить заявку</a>
        <button className="fitmin-burger" onClick={() => setMenuOpen(!menuOpen)} aria-label="Открыть меню">
          <span></span><span></span><span></span>
        </button>
        {menuOpen && (
          <div className="fitmin-mobile-menu">
            <a href="#about" onClick={()=>setMenuOpen(false)}>О бренде</a>
            <a href="#products" onClick={()=>setMenuOpen(false)}>Продукция</a>
            <a href="#advantages" onClick={()=>setMenuOpen(false)}>Преимущества</a>
            <a href="#contacts" onClick={()=>setMenuOpen(false)}>Контакты</a>
            <a href="#form" className="fitmin-btn fitmin-header-btn" onClick={()=>setMenuOpen(false)}>Оставить заявку</a>
          </div>
        )}
      </header>

      {/* Hero Section */}
      <section className="fitmin-hero">
        <div className="fitmin-hero-content">
          <h1>Забота о питомцах начинается с правильного питания</h1>
          <p>Премиальные корма Fitmin — свежесть, качество, забота</p>
          <a href="#form" className="fitmin-btn fitmin-hero-btn">Выбрать корм</a>
        </div>
        <div className="fitmin-hero-img">
          {/* Временное изображение */}
          <img src="https://www.fitmin.com/images/fitmin-hero-dog.jpg" alt="Fitmin Hero" />
        </div>
      </section>

      {/* О бренде */}
      <section className="fitmin-about" id="about">
        <div className="fitmin-about-img">
          <img src="https://www.fitmin.com/images/fitmin-factory.jpg" alt="Fitmin Factory" />
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
            <img src="https://www.fitmin.com/images/dog-food.jpg" alt="Для собак" />
            <h3>Для собак</h3>
            <p>Сухие и влажные корма для собак всех пород и возрастов.</p>
            <a href="#" className="fitmin-btn fitmin-product-btn">Подробнее</a>
          </div>
          <div className="fitmin-product-card">
            <img src="https://www.fitmin.com/images/cat-food.jpg" alt="Для кошек" />
            <h3>Для кошек</h3>
            <p>Питательные корма и лакомства для кошек.</p>
            <a href="#" className="fitmin-btn fitmin-product-btn">Подробнее</a>
          </div>
          <div className="fitmin-product-card">
            <img src="https://www.fitmin.com/images/vet-food.jpg" alt="Ветеринарные корма" />
            <h3>Ветеринарные корма</h3>
            <p>Специализированные диеты для здоровья питомцев.</p>
            <a href="#" className="fitmin-btn fitmin-product-btn">Подробнее</a>
          </div>
          <div className="fitmin-product-card">
            <img src="https://www.fitmin.com/images/treats.jpg" alt="Деликатесы" />
            <h3>Деликатесы</h3>
            <p>Натуральные лакомства для поощрения и заботы.</p>
            <a href="#" className="fitmin-btn fitmin-product-btn">Подробнее</a>
          </div>
        </div>
      </section>

      {/* Преимущества */}
      <section className="fitmin-advantages" id="advantages">
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
            <span role="img" aria-label="no-gmo">🚫🌽</span>
            <p>Без ГМО и искусственных добавок</p>
          </div>
        </div>
      </section>

      {/* Форма заявки */}
      <section className="fitmin-form-section" id="form">
        <h2>Оставить заявку</h2>
        <form className="fitmin-form">
          <input type="text" name="name" placeholder="Имя" required />
          <input type="tel" name="phone" placeholder="Телефон" required />
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
      <footer className="fitmin-footer" id="contacts">
        <div className="fitmin-footer-contacts">
          <div>
            <b>Телефон:</b> <a href="tel:+77001234567">+7 (700) 123-45-67</a>
          </div>
          <div>
            <b>E-mail:</b> <a href="mailto:info@fitmin.kz">info@fitmin.kz</a>
          </div>
          <div className="fitmin-footer-socials">
            <a href="#">VK</a> | <a href="#">Instagram</a> | <a href="#">WhatsApp</a>
          </div>
        </div>
        <div className="fitmin-footer-policy">
          <a href="#">Политика конфиденциальности</a> | <a href="#">Пользовательское соглашение</a>
        </div>
        <div className="fitmin-footer-copy">© 2024 Fitmin. Все права защищены.</div>
      </footer>
    </div>
  );
}

export default App;
