<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PG Bhosale Farm Producer Company Limited</title>
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body> 
  <header>
  <div class="brand-area">
    <img src="images/logo.jpeg" alt="PG Bhosale Farm Logo" />
    <h1>PG Bhosale Farm</h1>
  </div>
  <nav>
    <button class="mobile-menu-toggle" aria-label="Toggle menu" aria-expanded="false">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <ul class="nav-list">
      <li><a href="#home" class="active">Home</a></li>
      <li><a href="#about">About Us</a></li>
      <li><a href="#history">History</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#process">Process</a></li>
      <li><a href="#gallery">Gallery</a></li>
      <li><a href="#why-choose">Why Choose Us</a></li>
      <li><a href="#order">Place Order</a></li>
      <li><a href="#feedback">Feedback</a></li>
    </ul>
  </nav>
</header>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.querySelector('.mobile-menu-toggle');
    const navList = document.querySelector('.nav-list');
    const header = document.querySelector('header');
    const navLinks = document.querySelectorAll('.nav-list a');
    
    // Mobile menu toggle
    toggleButton.addEventListener('click', function() {
      const isExpanded = toggleButton.getAttribute('aria-expanded') === 'true';
      toggleButton.setAttribute('aria-expanded', !isExpanded);
      navList.classList.toggle('active');
      document.body.classList.toggle('no-scroll');
      
      // Animate the hamburger icon
      const spans = toggleButton.querySelectorAll('span');
      if (navList.classList.contains('active')) {
        spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
        spans[1].style.opacity = '0';
        spans[2].style.transform = 'rotate(-45deg) translate(5px, -5px)';
      } else {
        spans.forEach(span => {
          span.style.transform = '';
          span.style.opacity = '';
        });
      }
    });
    
    // Close menu when clicking on a link
    navLinks.forEach(link => {
      link.addEventListener('click', function() {
        if (window.innerWidth <= 768) {
          navList.classList.remove('active');
          toggleButton.setAttribute('aria-expanded', 'false');
          document.body.classList.remove('no-scroll');
          const spans = toggleButton.querySelectorAll('span');
          spans.forEach(span => {
            span.style.transform = '';
            span.style.opacity = '';
          });
        }
        
        // Update active link
        navLinks.forEach(navLink => navLink.classList.remove('active'));
        this.classList.add('active');
      });
    });
    
    // Header scroll effect
    window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
    
    // Highlight active section in navigation
    function highlightNav() {
      const scrollPosition = window.scrollY + 100;
      
      navLinks.forEach(link => {
        const section = document.querySelector(link.getAttribute('href'));
        if (section) {
          const sectionTop = section.offsetTop;
          const sectionHeight = section.offsetHeight;
          
          if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
            link.classList.add('active');
          } else {
            link.classList.remove('active');
          }
        }
      });
    }
    
    window.addEventListener('scroll', highlightNav);
    window.addEventListener('load', highlightNav);
  });
</script>

<section id="home" class="hero">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h2>Welcome to PG Bhosale Farm Producer Company Limited</h2>
    <p>Sustainable Choices for a Better Tomorrow</p>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const aboutBoxes = document.querySelectorAll('.about-box');
  
  // Immediately show all boxes (remove if you want scroll-triggered animation)
  aboutBoxes.forEach(box => {
    box.classList.add('show');
  });

  // Optional: Add viewport height adjustment for mobile browsers
  function adjustHeroHeight() {
    const hero = document.querySelector('.hero');
    // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
    let vh = window.innerHeight * 0.01;
    // Then we set the value in the --vh custom property to the root of the document
    document.documentElement.style.setProperty('--vh', `${vh}px`);
    // Set hero height accounting for any fixed headers (70px in your case)
    hero.style.height = `calc(var(--vh, 1vh) * 100 - 70px)`;
  }

  // Initial adjustment
  adjustHeroHeight();
  
  // Listen for resize events
  window.addEventListener('resize', adjustHeroHeight);
  window.addEventListener('orientationchange', adjustHeroHeight);
});
</script>

 <!-- About Us Section -->
<section id="about" class="about-section">
  <div class="container">
    <h2>About Us</h2>
    
    <!-- Desktop Version (4 boxes) -->
    <div class="about-container">
      <div class="about-box">
        <i class="fas fa-lightbulb"></i>
        <div class="about-title">Who We Are</div>
        <div class="about-desc">
          PG Bhosale Farm Producer Company Limited is a farmer-centric organization committed to sustainable agriculture, high-quality grain production, and fair market practices.
        </div>
        <a href="#" class="read-more">Read More</a>
      </div>

      <div class="about-box">
        <i class="fas fa-bullhorn"></i>
        <div class="about-title">Our Mission</div>
        <div class="about-desc">
          To provide premium-quality grains, pulses, flour, and animal feed while promoting sustainable farming practices and improving farmers' livelihoods.
        </div>
        <a href="#" class="read-more">Read More</a>
      </div>

      <div class="about-box">
        <i class="fas fa-eye"></i>
        <div class="about-title">Our Vision</div>
        <div class="about-desc">
          To become a trusted leader in agricultural processing and distribution, fostering a resilient and prosperous farming community.
        </div>
        <a href="#" class="read-more">Read More</a>
      </div>

      <div class="about-box">
        <i class="fas fa-comments"></i>
        <div class="about-title">Our Values</div>
        <div class="about-desc">
          <ul style="list-style: none; padding: 0; line-height: 1.8; text-align: left;">
            <li>✔ Sustainability - Eco-friendly farming</li>
            <li>✔ Innovation - Embracing new techniques</li>
            <li>✔ Community Empowerment</li>
            <li>✔ Integrity & Ethical Business</li>
          </ul>
        </div>
        <a href="#" class="read-more">Read More</a>
      </div>
    </div>
    
    <!-- Mobile Version (Tab System) -->
    <div class="about-tabs">
      <button class="about-tab-btn active" data-tab="tab1">Who We Are</button>
      <button class="about-tab-btn" data-tab="tab2">Our Mission</button>
      <button class="about-tab-btn" data-tab="tab3">Our Vision</button>
      <button class="about-tab-btn" data-tab="tab4">Our Values</button>
    </div>
    
    <div id="tab1" class="about-tab-content active">
      <i class="fas fa-lightbulb"></i>
      <div class="about-title">Who We Are</div>
      <div class="about-desc">
        PG Bhosale Farm Producer Company Limited is a farmer-centric organization committed to sustainable agriculture, high-quality grain production, and fair market practices.
      </div>
      <a href="#" class="read-more">Read More</a>
    </div>
    
    <div id="tab2" class="about-tab-content">
      <i class="fas fa-bullhorn"></i>
      <div class="about-title">Our Mission</div>
      <div class="about-desc">
        To provide premium-quality grains, pulses, flour, and animal feed while promoting sustainable farming practices and improving farmers' livelihoods.
      </div>
      <a href="#" class="read-more">Read More</a>
    </div>
    
    <div id="tab3" class="about-tab-content">
      <i class="fas fa-eye"></i>
      <div class="about-title">Our Vision</div>
      <div class="about-desc">
        To become a trusted leader in agricultural processing and distribution, fostering a resilient and prosperous farming community.
      </div>
      <a href="#" class="read-more">Read More</a>
    </div>
    
    <div id="tab4" class="about-tab-content">
      <i class="fas fa-comments"></i>
      <div class="about-title">Our Values</div>
      <div class="about-desc">
        <ul style="list-style: none; padding: 0; line-height: 1.8;">
          <li>✔ Sustainability - Eco-friendly farming</li>
          <li>✔ Innovation - Embracing new techniques</li>
          <li>✔ Community Empowerment</li>
          <li>✔ Integrity & Ethical Business</li>
        </ul>
      </div>
      <a href="#" class="read-more">Read More</a>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Original box animation
  const aboutBoxes = document.querySelectorAll('.about-box');
  aboutBoxes.forEach(box => {
    box.classList.add('show');
  });

  // Mobile tab functionality
  const tabBtns = document.querySelectorAll('.about-tab-btn');
  const tabContents = document.querySelectorAll('.about-tab-content');
  
  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      // Remove active class from all buttons and contents
      tabBtns.forEach(btn => btn.classList.remove('active'));
      tabContents.forEach(content => content.classList.remove('active'));
      
      // Add active class to clicked button and corresponding content
      btn.classList.add('active');
      const tabId = btn.getAttribute('data-tab');
      document.getElementById(tabId).classList.add('active');
    });
  });
});
</script>

<!-- History Section -->
<section id="history" class="history-section">
  <div class="history-content">
    <h2>Our History</h2>
    <p>
      Founded in December 2020, PG Bhosale Farm Producer Company Limited was created with a mission to transform
      agricultural practices in Maharashtra. From humble beginnings, we have grown into a leading agro-processing
      company, offering sustainable solutions to farmers and high-quality products to the market.
    </p>
    
    <div class="history-container">
      <div class="history-timeline">
        <div class="timeline-item">
          <div class="timeline-year">2020</div>
          <div class="timeline-text">Company founded with 50 farmer members</div>
        </div>
        <div class="timeline-item">
          <div class="timeline-year">2021</div>
          <div class="timeline-text">Established first processing unit in Maharashtra</div>
        </div>
        <div class="timeline-item">
          <div class="timeline-year">2022</div>
          <div class="timeline-text">Expanded to 200+ farmer members and launched animal feed production</div>
        </div>
        <div class="timeline-item">
          <div class="timeline-year">2023</div>
          <div class="timeline-text">Recognized as one of the fastest growing agro-companies in the region</div>
        </div>
      </div>
      
      <div class="history-image-container">
        <div class="history-image">
          <img src="images/history-image.jpg" alt="PG Bhosale Farm History" loading="lazy" />
        </div>
      </div>
    </div>
  </div>
</section>

<!-- JavaScript for Animations -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const timelineItems = document.querySelectorAll('.timeline-item');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.1 });
  
  timelineItems.forEach(item => {
    observer.observe(item);
  });
});
</script>

<!-- Services Section -->
<section id="services" class="services-section">
  <h2>Services</h2>
  <div class="underline"></div>
  <div class="services-container">
    <div class="service-box">
      <img src="images/grain.jpg" alt="Grain Buying and Selling" />
      <div class="service-content">
        <h3>Grain Buying and Selling</h3>
        <p>We provide comprehensive grain trading services with quality assurance and competitive pricing for all your agricultural needs.</p>
      </div>
    </div>
    <div class="service-box">
      <img src="images/pulses.jpg" alt="Pulse Processing" />
      <div class="service-content">
        <h3>Pulse Processing</h3>
        <p>Professional pulse processing services including cleaning, sorting, grading and packaging to meet industry standards.</p>
      </div>
    </div>
    <div class="service-box">
      <img src="images/animal_feed.jpg" alt="Animal Feed" />
      <div class="service-content">
        <h3>Animal Feed</h3>
        <p>High-quality animal feed products formulated for optimal nutrition and health of your livestock and poultry.</p>
      </div>
    </div>
  </div>
</section>


<!-- Our Process Section -->
<section id="process" class="process-section">
  <h2>Our Process</h2>
  <div class="process-container">
    <div class="process-box" data-step="1">
      <img src="images/raw-material.jpeg" alt="Raw Material" />
      <h3>Raw Material Collection</h3>
      <p>We source the finest raw materials directly from trusted farmers.</p>
      <div class="sub-content">
        <p>Ethically Sourced</p>
        <p>High Quality</p>
      </div>
    </div>
    <div class="process-box" data-step="2">
      <img src="images/cleaning.jpg" alt="Cleaning & Grading" />
      <h3>Cleaning & Grading</h3>
      <p>Thorough cleaning and grading to ensure purity and consistency.</p>
      <div class="sub-content">
        <p>Advanced Machinery</p>
        <p>Quality Standards</p>
      </div>
    </div>
    <div class="process-box" data-step="3">
      <img src="images/packaging.jpg" alt="Processing & Packaging" />
      <h3>Processing & Packaging</h3>
      <p>State-of-the-art processing and eco-friendly packaging.</p>
      <div class="sub-content">
        <p>Sustainable Practices</p>
        <p>Hygienic Packaging</p>
      </div>
    </div>
    <div class="process-box" data-step="4">
      <img src="images/quality.jpg" alt="Quality Control" />
      <h3>Quality Control</h3>
      <p>Rigorous quality checks to meet industry standards.</p>
      <div class="sub-content">
        <p>Certified Labs</p>
        <p>Consistent Quality</p>
      </div>
    </div>
    <div class="process-box" data-step="5">
      <img src="images/market.jpg" alt="Market Delivery" />
      <h3>Market Delivery</h3>
      <p>Efficient logistics for timely delivery to markets.</p>
      <div class="sub-content">
        <p>Fast Delivery</p>
        <p>Reliable Service</p>
      </div>
    </div>
  </div>
  <div class="carousel-controls">
    <button class="carousel-prev" aria-label="Previous process step">❮</button>
    <div class="carousel-indicators"></div>
    <button class="carousel-next" aria-label="Next process step">❯</button>
  </div>

  <script>
document.addEventListener('DOMContentLoaded', function() {
  const container = document.querySelector('.process-container');
  const boxes = document.querySelectorAll('.process-box');
  const prevBtn = document.querySelector('.carousel-prev');
  const nextBtn = document.querySelector('.carousel-next');
  const indicatorsContainer = document.querySelector('.carousel-indicators');
  
  // Create indicators
  boxes.forEach((_, index) => {
    const indicator = document.createElement('div');
    indicator.classList.add('carousel-indicator');
    if (index === 0) indicator.classList.add('active');
    indicator.addEventListener('click', () => {
      goToSlide(index);
    });
    indicatorsContainer.appendChild(indicator);
  });
  
  const indicators = document.querySelectorAll('.carousel-indicator');
  
  let currentIndex = 0;
  
  function updateCarousel() {
    const boxWidth = boxes[0].offsetWidth;
    const scrollPosition = currentIndex * (boxWidth + 30); // 30px gap
    
    container.scrollTo({
      left: scrollPosition,
      behavior: 'smooth'
    });
    
    // Update indicators
    indicators.forEach((indicator, index) => {
      indicator.classList.toggle('active', index === currentIndex);
    });
  }
  
  function goToSlide(index) {
    currentIndex = index;
    updateCarousel();
  }
  
  function nextSlide() {
    currentIndex = (currentIndex + 1) % boxes.length;
    updateCarousel();
  }
  
  function prevSlide() {
    currentIndex = (currentIndex - 1 + boxes.length) % boxes.length;
    updateCarousel();
  }
  
  nextBtn.addEventListener('click', nextSlide);
  prevBtn.addEventListener('click', prevSlide);
  
  // Handle swipe events for touch devices
  let touchStartX = 0;
  let touchEndX = 0;
  
  container.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
  }, {passive: true});
  
  container.addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    handleSwipe();
  }, {passive: true});
  
  function handleSwipe() {
    if (touchEndX < touchStartX - 50) {
      nextSlide();
    } else if (touchEndX > touchStartX + 50) {
      prevSlide();
    }
  }
});
</script>

</section>

<!-- Gallery Section -->
<section id="gallery" class="gallery-section">
  <div class="container">
    <!-- Products Gallery -->
    <div class="gallery-wrapper">
      <div class="gallery-trigger" onclick="toggleGallery('products')" style="background-image: url('images/product.jpg')">
        <div class="overlay"></div>
        <div class="trigger-content">
          <div class="gallery-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path d="M19.5 21a3 3 0 0 0 3-3v-12a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h15zm-10.5-8.25v2.25a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3v-2.25a3 3 0 0 0-3-3h-2.25a3 3 0 0 0-3 3z"/>
            </svg>
          </div>
          <h3>Our Product Gallery</h3>
          <div class="view-button">
            <span>View Gallery</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06z" clip-rule="evenodd"/>
            </svg>
          </div>
        </div>
      </div>
      <div class="gallery-grid" id="products-gallery">
        <div class="gallery-item">
          <div class="image-container">
            <img src="images/wheat.jpg" alt="Wheat Flour" class="img-fluid">
          </div>
          <div class="item-info">
            <h4>Wheat Flour</h4>
            <p>Premium wheat flour, nutrient-rich and ideal for baking and cooking.</p>
          </div>
        </div>
        <div class="gallery-item">
          <div class="image-container">
            <img src="images/jowar.jpeg" alt="Jowar Flour" class="img-fluid">
          </div>
          <div class="item-info">
            <h4>Jowar Flour</h4>
            <p>Nutritious, gluten-free jowar flour, rich in fiber and protein, perfect for healthy rotis and baked goods.</p>
          </div>
        </div>
        <div class="gallery-item">
          <div class="image-container">
            <img src="images/OIP (1).jpeg" alt="Pulses Flour" class="img-fluid">
          </div>
          <div class="item-info">
            <h4>Pulses Flour</h4>
            <p>Protein-rich pulse flour, packed with nutrients, ideal for snacks, chapatis, and gluten-free baking.</p>
          </div>
        </div>
        <div class="gallery-item">
          <div class="image-container">
            <img src="images/corn-flour-starch.jpg" alt="Corn Flour" class="img-fluid">
          </div>
          <div class="item-info">
            <h4>Corn Flour</h4>
            <p>Gluten-free corn flour with a slight sweetness, perfect for sauces, tortillas, and baking.</p>
          </div>
        </div>
        <div class="gallery-item">
          <div class="image-container">
            <img src="images/animal.jpeg" alt="Animal Feed" class="img-fluid">
          </div>
          <div class="item-info">
            <h4>Animal Feed</h4>
            <p>We repurpose milling by-products into nutrient-rich animal feed, ensuring sustainability and reducing waste.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Process Gallery -->
    <div class="gallery-wrapper">
      <div class="gallery-trigger" onclick="toggleGallery('process')" style="background-image: url('images/process.jpg')">
        <div class="overlay"></div>
        <div class="trigger-content">
          <div class="gallery-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113zM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0z" clip-rule="evenodd"/>
            </svg>
          </div>
          <h3>Production Process Gallery</h3>
          <div class="view-button">
            <span>View Gallery</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06z" clip-rule="evenodd"/>
            </svg>
          </div>
        </div>
      </div>
      <div class="gallery-grid" id="process-gallery">
        <div class="gallery-item">
          <div class="image-container">
            <img src="images/cleaning.jpg" alt="Cleaning" class="img-fluid">
          </div>
          <div class="item-info">
            <h4>Cleaning</h4>
            <p>Removing impurities and ensuring high-quality raw materials.</p>
          </div>
        </div>
        <div class="gallery-item">
          <div class="image-container">
            <img src="images/IMG-20250204-WA0003.jpg" alt="Colour Sortex" class="img-fluid">
          </div>
          <div class="item-info">
            <h4>Colour Sortex</h4>
            <p>Advanced sorting technology for grain purity.</p>
          </div>
        </div>
        <div class="gallery-item">
          <div class="image-container">
            <img src="images/miling.jpg" alt="Milling" class="img-fluid">
          </div>
          <div class="item-info">
            <h4>Milling</h4>
            <p>Precision milling for fine and consistent flour texture.</p>
          </div>
        </div>
        <div class="gallery-item">
          <div class="image-container">
            <img src="images/pack.jpg" alt="Packaging" class="img-fluid">
          </div>
          <div class="item-info">
            <h4>Packaging</h4>
            <p>Secure and hygienic packaging for freshness.</p>
          </div>
        </div>
        <div class="gallery-item">
          <div class="image-container">
            <img src="images/market.jpg" alt="Marketing" class="img-fluid">
          </div>
          <div class="item-info">
            <h4>Marketing</h4>
            <p>Ensuring product reach and distribution to consumers.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
function toggleGallery(type) {
  const gallery = document.getElementById(`${type}-gallery`);
  const trigger = gallery.previousElementSibling;
  const buttonText = trigger.querySelector('.view-button span');
  const buttonIcon = trigger.querySelector('.view-button svg');
  
  gallery.classList.toggle('active');
  trigger.classList.toggle('active');
  
  if (gallery.classList.contains('active')) {
    buttonText.textContent = 'Close Gallery';
    buttonIcon.style.transform = 'rotate(180deg)';
  } else {
    buttonText.textContent = 'View Gallery';
    buttonIcon.style.transform = 'rotate(0)';
  }
}
</script>

    <!-- Why Choose Us Section -->

    <section id="why-choose" class="why-choose-section">
  <div class="container">
    <h2>Why Choose Us</h2>
    <p>Why Choose PG Bhosale Farm Producer Company?</p>
    <div class="why-choose-container">
      <div class="why-choose-box">
        <i class="fas fa-leaf"></i>
        <p>We adopt eco-friendly farming and processing methods to reduce environmental impact. By prioritizing soil health and water conservation, we ensure long-term sustainability and food security.</p>
        <div class="why-choose-title">Sustainability</div>
      </div>
      <div class="why-choose-box">
        <i class="fas fa-tags"></i>
        <p>We provide high-quality products at competitive prices by eliminating middlemen. This approach ensures farmers receive fair compensation while customers get the best value.</p>
        <div class="why-choose-title">Fair Pricing</div>
      </div>
      <div class="why-choose-box">
        <i class="fas fa-lightbulb"></i>
        <p>We use advanced technology and modern techniques to improve efficiency and quality. From precision farming to automated processing, we ensure high industry standards.</p>
        <div class="why-choose-title">Innovation</div>
      </div>
      <div class="why-choose-box">
        <i class="fas fa-hand-holding-heart"></i>
        <p>We empower farmers through training, financial aid, and better market access. By fostering growth and self-reliance, we help improve rural livelihoods and strengthen the agricultural sector.</p>
        <div class="why-choose-title">Farmer Support</div>
      </div>
    </div>
  </div>
</section>

<script>
  // Function to show elements when scrolling
  function revealOnScroll() {
    const section = document.getElementById('why-choose');
    const boxes = document.querySelectorAll('.why-choose-box');

    if (section.getBoundingClientRect().top < window.innerHeight - 100) {
      section.classList.add('show');
      setTimeout(() => {
        boxes.forEach((box, index) => {
          setTimeout(() => {
            box.classList.add('show');
          }, index * 300);
        });
      }, 300);
    }
  }

  window.addEventListener('scroll', revealOnScroll);
  window.addEventListener('load', revealOnScroll);
</script>

<!-- Place Order Section -->
<section id="order" class="order-section">
  <div class="container-fluid px-0">
    <div class="row justify-content-center mx-0">
      <div class="col-12 col-xxl-10 px-0">
        <div class="order-card">
          <div class="order-header">
            <h2>Place Your Order</h2>
            <p class="subtitle">Fill out the form below to complete your purchase</p>
            <div class="progress-steps">
              <div class="step active">Order Details</div>
            </div>
          </div>
          
          <form action="process.php" method="POST" class="order-form">
            <div class="form-section">
              <h3 class="section-title">Personal Information</h3>
              <div class="row gx-5">
                <div class="col-md-6 mb-4">
                  <label class="form-label">Full Name</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="fullname" class="form-control" placeholder="Ex. Shardul Mane" required>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <label class="form-label">Email Address</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="your@email.com" required>
                  </div>
                </div>
              </div>
              <div class="row gx-5">
                <div class="col-md-6 mb-4">
                  <label class="form-label">Phone Number</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input type="tel" name="phone" class="form-control" placeholder="+1 (123) 456-7890" required>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <label class="form-label">Address</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    <textarea name="address" class="form-control" rows="1" placeholder="123 Main St, City" required></textarea>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="form-section">
              <h3 class="section-title">Order Details</h3>
              <div class="row gx-5">
                <div class="col-md-6 mb-4">
                  <label class="form-label">Select Product</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-shopping-basket"></i></span>
                    <select name="product" class="form-select" required>
                      <option value="" disabled selected>Choose a product</option>
                      <option value="Wheat">Wheat</option>
                      <option value="Rice">Rice</option>
                      <option value="Barley">Barley</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <label class="form-label">Quantity (Kg)</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-weight-hanging"></i></span>
                    <input type="number" name="quantity" class="form-control" placeholder="e.g. 10" required>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="order-summary">
              <h3 class="section-title">Order Summary</h3>
              <div class="summary-item">
                <span>Product:</span>
                <span id="summary-product">-</span>
              </div>
              <div class="summary-item">
                <span>Quantity:</span>
                <span id="summary-quantity">-</span>
              </div>
              
            </div>
            
            <div class="form-footer">
              <button type="submit" class="btn btn-primary btn-block btn-submit">
                <i class="fas fa-paper-plane me-2"></i> Place Order
              </button>
              <p class="security-note">
                <i class="fas fa-lock"></i> Your information is secure and will not be shared
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const productSelect = document.querySelector('select[name="product"]');
  const quantityInput = document.querySelector('input[name="quantity"]');
  
  function updateSummary() {
    document.getElementById('summary-product').textContent = productSelect.value || '-';
    document.getElementById('summary-quantity').textContent = quantityInput.value ? quantityInput.value + ' Kg' : '-';
    
    if(productSelect.value && quantityInput.value) {
      // Simple price calculation - you can replace with your actual pricing logic
      const prices = { Wheat: 5, Rice: 7, Barley: 6 };
      const total = prices[productSelect.value] * quantityInput.value;
      document.getElementById('summary-total').textContent = '$' + total.toFixed(2);
    } else {
      document.getElementById('summary-total').textContent = '-';
    }
  }
  
  productSelect.addEventListener('change', updateSummary);
  quantityInput.addEventListener('input', updateSummary);
});
</script>


<!-- Feedback Section -->
<section id="feedback" class="feedback-section">
  <div class="container">
    <div class="section-header text-center mb-5">
      <h2>Customer Feedback</h2>
      <p class="section-subtitle">What our customers say about us</p>
      <div class="divider"></div>
    </div>
    
    <div class="row g-4">
      <!-- Feedback Form -->
      <div class="col-lg-6">
        <div class="feedback-card form-card">
          <h3 class="card-title">Share Your Experience</h3>
          <form action="process_feedback.php" method="POST" class="feedback-form">
            <div class="mb-4">
              <label class="form-label">Your Name</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
              </div>
            </div>
            <div class="mb-4">
              <label class="form-label">Your Feedback</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-comment"></i></span>
                <textarea name="feedback" class="form-control" rows="4" placeholder="Tell us about your experience..." required></textarea>
              </div>
            </div>
            <div class="mb-4 rating-container">
              <label class="form-label">Rating</label>
              <div class="star-rating">
                <i class="far fa-star" data-rating="5"></i>
                <i class="far fa-star" data-rating="4"></i>
                <i class="far fa-star" data-rating="3"></i>
                <i class="far fa-star" data-rating="2"></i>
                <i class="far fa-star" data-rating="1"></i>
                <input type="hidden" name="rating" id="rating-value" value="0" required>
              </div>
              <div class="rating-text text-muted small mt-1">Click to rate</div>
            </div>
            <button type="submit" class="btn btn-primary btn-submit">
              <i class="fas fa-paper-plane me-2"></i> Submit Feedback
            </button>
          </form>
        </div>
      </div>

      <!-- Display Feedbacks -->
      <div class="col-lg-6">
        <div class="feedback-card reviews-card">
          <h3 class="card-title">Customer Testimonials</h3>
          <div class="reviews-container">
            <?php
            require 'db_connect.php';
            $query = "SELECT * FROM feedbacks ORDER BY created_at DESC LIMIT 3";
            $result = $conn->query($query);
            
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<div class="review-item">';
                echo '<div class="review-header">';
                echo '<div class="review-author">';
                echo '<h5 class="author-name">' . htmlspecialchars($row['name']) . '</h5>';
                echo '<div class="review-meta">';
                if (isset($row['created_at'])) {
                  echo '<div class="review-date">' . date("M j, Y", strtotime($row['created_at'])) . '</div>';
                }
                if (isset($row['rating']) && $row['rating'] > 0) {
                  echo '<div class="review-stars">';
                  for ($i = 1; $i <= 5; $i++) {
                    $starClass = ($i <= $row['rating']) ? 'fas fa-star' : 'far fa-star';
                    echo '<i class="'.$starClass.'"></i>';
                  }
                  echo '</div>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="review-content">';
                echo '<p>' . nl2br(htmlspecialchars($row['feedback'])) . '</p>';
                echo '</div>';
                echo '</div>';
              }
            } else {
              echo '<div class="no-reviews">';
              echo '<i class="far fa-comment-dots"></i>';
              echo '<p>No reviews yet. Be the first to share your feedback!</p>';
              echo '</div>';
            }
            ?>
            
            <!-- Hidden reviews that will be shown when "View More" is clicked -->
            <div class="more-reviews" style="display: none;">
              <?php
              $query = "SELECT * FROM feedbacks ORDER BY created_at DESC LIMIT 3, 10";
              $result = $conn->query($query);
              
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo '<div class="review-item">';
                  echo '<div class="review-header">';
                  echo '<div class="review-author">';
                  echo '<h5 class="author-name">' . htmlspecialchars($row['name']) . '</h5>';
                  echo '<div class="review-meta">';
                  if (isset($row['created_at'])) {
                    echo '<div class="review-date">' . date("M j, Y", strtotime($row['created_at'])) . '</div>';
                  }
                  if (isset($row['rating']) && $row['rating'] > 0) {
                    echo '<div class="review-stars">';
                    for ($i = 1; $i <= 5; $i++) {
                      $starClass = ($i <= $row['rating']) ? 'fas fa-star' : 'far fa-star';
                      echo '<i class="'.$starClass.'"></i>';
                    }
                    echo '</div>';
                  }
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '<div class="review-content">';
                  echo '<p>' . nl2br(htmlspecialchars($row['feedback'])) . '</p>';
                  echo '</div>';
                  echo '</div>';
                }
              }
              ?>
            </div>
          </div>
          
          <?php 
          $countQuery = "SELECT COUNT(*) as total FROM feedbacks";
          $countResult = $conn->query($countQuery);
          $totalReviews = $countResult->fetch_assoc()['total'];
          
          if ($totalReviews > 3): ?>
          <div class="text-center mt-4">
            <button id="view-more-btn" class="btn btn-outline-primary">
              <span class="view-more-text">View More Reviews</span>
              <span class="view-less-text" style="display: none;">View Less</span>
              <i class="fas fa-chevron-down ms-2"></i>
            </button>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
// Star Rating System
// Update the star rating system logic to handle reversed order
document.addEventListener('DOMContentLoaded', function() {
  const stars = Array.from(document.querySelectorAll('.star-rating i')).reverse(); // Reverse the array
  const ratingInput = document.getElementById('rating-value');
  const ratingText = document.querySelector('.rating-text');
  
  stars.forEach(star => {
    star.addEventListener('click', function() {
      const rating = this.getAttribute('data-rating');
      ratingInput.value = rating;
      
      // Update rating text
      const ratingMessages = [
        "", 
        "Poor", 
        "Fair", 
        "Good", 
        "Very Good", 
        "Excellent"
      ];
      ratingText.textContent = ratingMessages[rating];
      
      // Update stars display (now checking if current star's rating <= selected rating)
      stars.forEach(s => {
        const starRating = s.getAttribute('data-rating');
        if (starRating <= rating) {
          s.classList.remove('far');
          s.classList.add('fas');
        } else {
          s.classList.remove('fas');
          s.classList.add('far');
        }
      });
    });
    
    star.addEventListener('mouseover', function() {
      const hoverRating = this.getAttribute('data-rating');
      stars.forEach(s => {
        const starRating = s.getAttribute('data-rating');
        if (starRating <= hoverRating) {
          s.classList.add('hover');
        } else {
          s.classList.remove('hover');
        }
      });
    });
    
    star.addEventListener('mouseout', function() {
      stars.forEach(s => s.classList.remove('hover'));
      const currentRating = ratingInput.value;
      stars.forEach(s => {
        const starRating = s.getAttribute('data-rating');
        if (starRating <= currentRating) {
          s.classList.remove('far');
          s.classList.add('fas');
        } else {
          s.classList.remove('fas');
          s.classList.add('far');
        }
      });
    });
  });  
  // View More/Less functionality
  const viewMoreBtn = document.getElementById('view-more-btn');
  if (viewMoreBtn) {
    viewMoreBtn.addEventListener('click', function() {
      const moreReviews = document.querySelector('.more-reviews');
      const viewMoreText = document.querySelector('.view-more-text');
      const viewLessText = document.querySelector('.view-less-text');
      const icon = this.querySelector('i');
      
      if (moreReviews.style.display === 'none') {
        moreReviews.style.display = 'block';
        viewMoreText.style.display = 'none';
        viewLessText.style.display = 'inline';
        icon.classList.remove('fa-chevron-down');
        icon.classList.add('fa-chevron-up');
        
        // Animate the newly shown reviews
        const hiddenReviews = moreReviews.querySelectorAll('.review-item');
        hiddenReviews.forEach((review, index) => {
          setTimeout(() => {
            review.classList.add('animate');
          }, index * 100);
        });
      } else {
        moreReviews.style.display = 'none';
        viewMoreText.style.display = 'inline';
        viewLessText.style.display = 'none';
        icon.classList.remove('fa-chevron-up');
        icon.classList.add('fa-chevron-down');
      }
    });
  }
  
  // Animation for feedback items
  const reviewItems = document.querySelectorAll('.review-item');
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate');
      }
    });
  }, { threshold: 0.1 });
  
  reviewItems.forEach(item => {
    observer.observe(item);
  });
});
</script>

<!-- Footer Section -->

<footer>
  <div class="footer-container">
    <div class="footer-section">
      <h3>PG Bhosale Farm</h3>
      <p>Committed to sustainable agriculture and empowering farmers for a better tomorrow.</p>
    </div>
    <div class="footer-section">
      <h4>Quick Links</h4>
      <ul>
      <li><a href="#home">Home</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#history">History</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#why-choose">Why Choose Us</a></li>
        <li><a href="#order">Place Order</a></li>
        <li><a href="#feedback">Feedback</a></li> 
        <li><a href="admin_login.php">Admin</a></li> 

      </ul>
    </div>
    <div class="footer-section">
      <h4>Contact Us</h4>
      <p><i class="fas fa-map-marker-alt"></i> Address: Registered Office and Factory: Gate No 12 A/P - Perle, TAL - Karad, DIST - Satara PIN - 415109</p>
      <p><i class="fas fa-phone"></i> Phone: +91 9503501133</p>
      <p><i class="fas fa-envelope"></i> Email: pgbhosalefarm@gmail.com</p>
    </div>
    <div class="footer-section">
      <h4>Follow Us</h4>
      <div class="social-icons">
        <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
    <!-- Add the "Our Location" section here -->
    <div class="footer-section">
      <h5>Our Location</h5>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1903.0661474627875!2d74.11141593857057!3d17.453380995861274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc229000e36c4b5%3A0x239d60dd2b4ab216!2sPG%20Bhosale%20Farm%20Producer%20Co.%20Ltd%3B%20Perale.!5e0!3m2!1sen!2sin!4v1740986500703!5m2!1sen!2sin"
        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2022 PG Bhosale Farm Producer Company Limited. All Rights Reserved.</p>
  </div>
</footer>
</body>

</html>