<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Ballast, Soil, and Stones</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">
          <img src="{{ asset('storage/images/logo.png') }}" alt="BICCOUNT GROUP Logo" />
        </div>
        <nav>

            <a href="index.html"><i class="fas fa-info-circle"></i> Home</a>
          <a href="{{ route('about') }}"><i class="fas fa-info-circle"></i> About</a>
          <a href="{{ route('register') }}"><i class="fas fa-industry"></i> Become a Manufacturer</a>
          <a href="signup.html"><i class="fas fa-truck-loading"></i> Become a Supplier</a>
          <a href="#faq"><i class="fas fa-question-circle"></i> FAQ</a>
          <a href="login.html" class="login-btn"><i class="fas fa-sign-in-alt"></i> Login</a>
          <a href="signup.html" class="login-btn"><i class="fas fa-sign-in-alt"></i>Work With Us</a>
        </nav>
      </header>

  <!-- Main About Section -->
  <main>
    <section class="about-section">
      <div class="content-container">
        <h1>About Us</h1>
        <p>
          Welcome to our business! We specialize in providing high-quality ballast, soil, and stones for construction,landscaping, and other projects. With a commitment to customer satisfaction and environmental sustainability, we deliver reliable materials tailored to your needs.
        </p>
        <p>
          Our goal is to become your trusted partner for all your material needs. Whether you are constructing roads, setting up a foundation, or designing landscapes, we have the perfect solutions for you.
        </p>
      </div>
      <div class="image-container">

        <img src="{{ asset('storage/images/ssp.jpg') }}" alt="Ballast, Soil, and Stones">
        <style>
            img {
                float: right;
                margin-right: 20px; /* Optional, adds space between image and text */
            }
        </style>

      </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq-section" class="faq-section">
    <section class="faq-section">
      <h2>Frequently Asked Questions</h2>
      <div class="faq-item">
        <h3>1. What types of stones do you provide?</h3>
        <p>We offer a variety of stones, including crushed stones for construction and decorative stones for landscaping projects.</p>
      </div>
      <div class="faq-item">
        <h3>2. Do you deliver materials to the site?</h3>
        <p>Yes, we provide delivery services to your site for convenience and efficiency.</p>
      </div>
      <div class="faq-item">
        <h3>3. Can I place a bulk order for ballast and soil?</h3>
        <p>Absolutely! We cater to both small and large orders, ensuring timely delivery for all projects.</p>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="contact-info">
        <p>Email: info@yourbusiness.com</p>
        <p>Phone: +123 456 7890</p>
      </div>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>
</body>
</html>
