<footer>
    <div class="container">
      <div class="logo-description">
        <div class="logo">
          <div class="img">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" />
          </div>
          <div class="title">
            <h4>Bookie</h4>
            <small>Book Store Website</small>
          </div>
        </div>
        <div class="logo-body">
          <p>Bienvenue dans notre univers littéraire ! Découvrez une sélection de livres soigneusement choisis, des classiques intemporels aux nouveautés captivantes. Que vous soyez passionné de fiction ou en quête d'inspiration, chaque page est une nouvelle aventure. Trouvez votre prochaine lecture coup de cœur dès maintenant !</p>
        </div>
        <div class="social-links">
          <h4>Abonnez à nos pages</h4>
          <ul class="links">
            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- <div class="categories list">
        <h4>Book Categories</h4>
        <ul>
          <li><a href="#">Action</a></li>
          <li><a href="#">Adventure</a></li>
          <li><a href="#">Comedy</a></li>
          <li><a href="#">Crime</a></li>
          <li><a href="#">Drama</a></li>
          <li><a href="#">Fantasy</a></li>
          <li><a href="#">Horror</a></li>
        </ul>
      </div> -->
      <div class="quick-links list">
        <h4>Liens rpaide</h4>
        <ul>
          <li><a href="#">A propos</a></li>
          <li><a href="{{ route('client.contact') }}">Contactez nous</a></li>
          <li><a href="{{ route('client.book-filter') }}">Produits</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>
          <!-- <li><a href="#">Sign Up</a></li> -->
          <li><a href="{{ route('client.cart-item') }}">Panier</a></li>
          <li><a href="{{ route('client.checkout') }}">Paiement</a></li>
        </ul>
      </div>
      <div class="our-store list">
        <h4>Notre magasin</h4>
        <div class="map" style="margin-top: 1rem">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3198.6028586857915!2d2.9175377750175686!3d36.70808017288828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fa50f6375a613%3A0x7d68f1c310497baa!2sCit%C3%A9%20768%20Logements%20Souidania!5e0!3m2!1sfr!2sdz!4v1727376204783!5m2!1sfr!2sdz"
            height="70"
            style="width: 100%; border: none; border-radius: 5px"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
        <ul>
          <li><a href="#"><i class="fa-solid fa-location-dot"></i>Cité 768 Logements Souidania</a></li>
          <li><a href="#"><i class="fa-solid fa-phone"></i>+213 556 31 44 34</a></li>
          <li><a href="#"><i class="fa-solid fa-envelope"></i>KbBooks@books.dz</a></li>
        </ul>
      </div>
    </div>
  </footer>







 <!-- External JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.waypoints/4.0.1/jquery.waypoints.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
 <script
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
 integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
 crossorigin="anonymous"
 referrerpolicy="no-referrer"
></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


<script src="js/back-to-top.js"></script>
<script src="js/book-filter.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/repeat-js.js"></script>
<script src="js/add-to-cart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script> 
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>




 