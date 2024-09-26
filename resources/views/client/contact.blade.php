@include('layouts.navbarClient1')
@section('title', 'Contact')
 


<section class="contact">
  <h3>Contactez nous</h3>
  <div class="main">
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3198.6028586857915!2d2.9175377750175686!3d36.70808017288828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fa50f6375a613%3A0x7d68f1c310497baa!2sCit%C3%A9%20768%20Logements%20Souidania!5e0!3m2!1sfr!2sdz!4v1727376204783!5m2!1sfr!2sdz"
          height="70"
          style="width: 100%; border: none; border-radius: 5px"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
    </div>
    <div class="contact-form">
      <h4>Contactez nous</h4>
      <p>En un seul clic</p>
      <form  action="{{ route('contact.submit') }}" method="POST" id="contact-form">
        @csrf
        <div class="input-form">
          <div class="input-field">
            <label for="nom">Nom *</label>
            <input type="text" name="nom" id="nom" placeholder="Nom" required />
          </div>
          <div class="input-field">
            <label for="prenom">Prénom *</label>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" required />
          </div>
          <div class="input-field">
            <label for="email">E-mail *</label>
            <input type="email" name="email" id="email" placeholder="Adresse e-mail" required />
          </div>
          <div class="input-field">
            <label for="telephone">Téléphone *</label>
            <input type="text" name="telephone" id="telephone" placeholder="Numéro de téléphone" required />
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