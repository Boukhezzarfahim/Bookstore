@include('layouts.navbarClient')
@section('title', 'Contact')

<div class="breadcrumb-container">
  <ul class="breadcrumb">
    <li><a href="{{ route('homeBooks') }}">Home</a></li>
    <li><a href="#">Contact</a></li>
  </ul>
</div>

<section class="contact">
  <h3>Contact Us</h3>
  <div class="main">
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6310.594819201665!2d-122.42768319999999!3d37.73616639999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7e60a337d5f5%3A0xfa0bb626904e5ab2!2z4KSV4KWJ4KSy4KWH4KScIOCkueCkv-Cksiwg4KS44KS-4KSoIOCkq-CljeCksOCkvuCkguCkuOCkv-CkuOCljeCkleCliywg4KSV4KWI4KSy4KWA4KSr4KWL4KSw4KWN4KSo4KS_4KSv4KS-LCDgpK_gpYLgpKjgpL7gpIfgpJ_gpYfgpKEg4KS44KWN4KSf4KWH4KSf4KWN4oCN4KS4!5e0!3m2!1shi!2sin!4v1686917463994!5m2!1shi!2sin"
          height="70"
          style="width: 100%; border: none; border-radius: 5px"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
    </div>
    <div class="contact-form">
      <h4>Contact Us</h4>
      <p>Get in touch with us</p>
      <form  action="{{ route('contact.submit') }}" method="POST" id="contact-form">
        @csrf
        <div class="input-form">
          <div class="input-field">
            <label for="nom">Nom *</label>
            <input type="text" name="nom" id="nom" placeholder="Full Name" required />
          </div>
          <div class="input-field">
            <label for="prenom">Prénom *</label>
            <input type="text" name="prenom" id="prenom" placeholder="Full Name" required />
          </div>
          <div class="input-field">
            <label for="email">E-mail *</label>
            <input type="email" name="email" id="email" placeholder="Email Address" required />
          </div>
          <div class="input-field">
            <label for="telephone">Téléphone *</label>
            <input type="text" name="telephone" id="telephone" placeholder="Phone Number" required />
          </div>
          <div class="message">
              <label for="message">Message *</label>
              <textarea name="message" id="message" placeholder="Message" required></textarea>
          </div>
          <button type="submit">Envoyer</button>
        </div>
      </form>
    </div>
  </div>
</section>

@include('layouts.footerClient')

<script> 
  $(document).ready(function() {
      $('#contact-form').on('submit', function(event) {
          event.preventDefault(); // Empêcher le rechargement de la page
    
          $.ajax({
              url: "{{ route('contact.submit') }}",
              method: 'POST',
              data: $(this).serialize(),
              success: function(response) {
                  if (response.success) {
                      Swal.fire({
                          icon: 'success',
                          title: 'Succès',
                          text: 'Votre message a été envoyé avec succès !',
                          confirmButtonText: 'OK'
                      }).then(() => {
                          $('#contact-form')[0].reset();
                      });
                  }
              },
              error: function(xhr) {
                  Swal.fire({
                      icon: 'error',
                      title: 'Erreur',
                      text: 'Une erreur est survenue. Veuillez réessayer.',
                      confirmButtonText: 'OK'
                  });
              }
          });
      });
    });
 </script>