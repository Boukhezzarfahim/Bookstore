@include('layouts.navbarClient')
@section('title', 'service')

      <div class="breadcrumb-container">
        <ul class="breadcrumb">
          <li><a href="{{ route('homeBooks') }}">Home</a></li>
          <li><a href="#">Service</a></li>
        </ul>
      </div>
      <div class="service-title">
          <h3>Service</h3>
      </div>
      <section class="service" style="margin-top: 3rem;">
        <div class="service-container">
          <div class="service-card">
            <div class="icon">
              <i class="fa-solid fa-bolt-lightning"></i>
            </div>
            <div class="service-content">
              <h5>Quick Delivery</h5>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Id,
                exercitationem.
              </p>
            </div>
          </div>
          <div class="service-card">
            <div class="icon">
              <i class="fa-solid fa-shield"></i>
            </div>
            <div class="service-content">
              <h5>Secure Payment</h5>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Id,
                exercitationem.
              </p>
            </div>
          </div>
          <div class="service-card">
            <div class="icon">
              <i class="fa-solid fa-thumbs-up"></i>
            </div>
            <div class="service-content">
              <h5>Best Quality</h5>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Id,
                exercitationem.
              </p>
            </div>
          </div>
          <div class="service-card">
            <div class="icon">
              <i class="fa-solid fa-star"></i>
            </div>
            <div class="service-content">
              <h5>Return Guarantee</h5>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Id,
                exercitationem.
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="countdown">
        <div class="container">
          <div class="customer counter">
            <div class="icon">
              <i class="fa-solid fa-user-group"></i>
            </div>
            <div class="content">
              <h4 class="count">125,663</h4>
              <small>Happy Customers</small>
            </div>
          </div>
          <div class="book counter">
            <div class="icon">
              <i class="fa-solid fa-book"></i>
            </div>
            <div class="content">
              <h4 class="count">50,672</h4>
              <small>Book Collections</small>
            </div>
          </div>
          <div class="store counter">
            <div class="icon">
              <i class="fa-solid fa-store"></i>
            </div>
            <div class="content">
              <h4 class="count">1,562</h4>
              <small>Our Stores</small>
            </div>
          </div>
          <div class="writer counter">
            <div class="icon">
              <i class="fa-solid fa-feather"></i>
            </div>
            <div class="content">
              <h4 class="count">457</h4>
              <small>Famous Writer</small>
            </div>
          </div>
        </div>
      </section>
      <section class="subscription">
        <div class="container">
          <h4>
            Subscribe our newsletter for Latest <br />
            books updates
          </h4>
          <div class="input">
            <input type="text" placeholder="Type your email here" />
            <button>subscribe</button>
          </div>
        </div>
        <div class="circle-1"></div>
        <div class="circle-2"></div>
      </section>

@include('layouts.footerClient')