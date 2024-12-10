<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BT LOGISTICS</title>

  <link rel="stylesheet" href="{{ asset('styles.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

  <div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

  <header class="navbar">
    <div class="logo">

      <img src="{{ asset('storage/images/logo.png') }}" alt="BICCOUNT GROUP Logo" />
    </div>
    <nav>

      <a href="{{ route('about') }}"><i class="fas fa-info-circle"></i> About</a>
      <a href="{{ route('register', 2) }}"><i class="fas fa-industry"></i> Become a Manufacturer</a>

      {{-- <a href="{{ route('signup') }}"><i class="fas fa-truck-loading"></i> Become a Supplier</a> --}}
      <a href="about.html"><i class="fas fa-question-circle"></i> FAQ</a>
      @if(Auth::check())
    <p>Welcome, {{ Auth::user()->name }}!</p>
@else

      <a href="{{ route('login', 2) }}" class="login-btn"><i class="fas fa-sign-in-alt"></i> Login</a>
      @endif
      {{-- <a href="{{ route('signup') }}"class="login-btn"><i class="fas fa-sign-in-alt"></i>Work With Us</a> --}}
    </nav>
  </header>
  <div class="hero">
    <div class="slider">

      <img src="{{ asset('storage/images/home3.jpeg') }}" alt="Body image" class="slide active">
    </div>
    <div class="content">
      <h1 style="color: black; font-weight: bold;">Effortless Transportation & E-commerce Solutions for your minerals</h1>
      <div class="buttons">
        <button onclick="navigateTo('transportation')">GET TRANSPORTATION</button>
        <button onclick="navigateTo('products')">GET PRODUCTS</button>
      </div>
    </div>
  </div>
   <!-- Footer -->
   <footer>
    <div class="footer-content">
      <p>Contact us: info@biccounttechnologies.com</p>
      <p>Call us: 0718200660</p>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/biccounttechnologies/"><i class="fab fa-instagram"></i></a>
        <a href="https://ke.linkedin.com/company/biccount-technologies"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
    <div class="side-popup">
      <a href="mailto:info@biccounttechnologies.com"><i class="fas fa-envelope"></i></a>
      <a href="https://wa.me/0718200660"><i class="fab fa-whatsapp"></i></a>
      <a href="tel:+254718200660"><i class="fas fa-phone-alt"></i></a>
    </div>
  </footer>
  <script src="script.js"></script>

  <script>
window.addEventListener("load", function () {
    setTimeout(function () {
        const preloader = document.getElementById("preloader");
        preloader.style.opacity = "0"; // Start fading out the preloader
        preloader.style.visibility = "hidden"; // Hide the preloader after fading out
    }, 1000); // Delay of 5000 milliseconds (5 seconds)
});

  </script>
</body>
</html>
