<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <!-- FontAwesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <!-- Custom CSS -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/Btn.css') }}">
  


  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .slider {
      width: 100%;
      margin: 0 auto;
      height: 500px;
    }
    .slide {
      text-align: center;
      padding: 40px 20px;
      box-sizing: border-box;
    }
    .slide img {
      max-width: 100%;
      height: 500px;
      border-radius: 10px;
    }
    .slide h2 {
      margin: 20px 0 10px;
    }
    .slide p {
      margin: 10px 0;
    }
  </style>
</head>
<body>
  
  <header>
    <nav class="navbar">
      <div class="logo">
        <div class="img">
          <img src="images/logo.png" alt="" />
        </div>
        <div class="logo-header">
          <h4><a href="{{ route('homeBooks') }}">Bookoe</a></h4>
          <small>Book Store Website</small>
        </div>
      </div>
      <ul class="nav-list">
        <div class="logo">
          <div class="title">
            <div class="img">
              <img src="images/logo.png" alt="" />
            </div>
            <div class="logo-header">
              <h4><a href="index.html">Bookoe</a></h4>
              <small>Book Store Website</small>
            </div>
          </div>
          <button class="close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <li><a href="{{ route('homeBooks') }}">Acceuil</a></li>
        <li><a href="{{ route('service') }}">Service</a></li>
        <li><a href="{{ route('client.contact') }}">Contact</a></li>
        <li><a href="{{ route('client.book-filter') }}">Livres</a></li>
        <button class="login"><a href="{{ route('login') }}">Log In</a></button>
      
        {{-- <button class="signup">
          <i class="fa-solid fa-user"></i><a href="registration.html">Sign Up</a>
        </button> --}}
      </ul>
      <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </nav>
  </header>
