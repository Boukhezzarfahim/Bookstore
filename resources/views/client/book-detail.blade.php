@include('layouts.navbarClient')

@section('title', 'Details')

<div class="breadcrumb-container">
  <ul class="breadcrumb">
    <li><a href="{{ route('homeBooks') }}">Home</a></li>
    <li><a href="{{ route('client.book-filter') }}" style="color: #6c5dd4">Books</a></li>
    <li><a href="#" style="color: #6c5dd4">{{ $livre->titre }}</a></li>
  </ul>
</div>

<section class="book-overview">
  <div class="img">
    <img src="{{ asset($livre->image) }}" alt="{{ $livre->titre }}" />
  </div>
  <div class="book-content">
    <h4>{{ $livre->titre }}</h4>
    <div class="meta">
      <div class="review">
        <!-- Add review details here if available -->
      </div>
    </div>
    <p>{{ $livre->description }}</p>
    <div class="footer">
      <div class="author-detail">
        <div class="author">
          <small>Written by</small>
          <strong>{{ $livre->auteur->nom }}</strong>
        </div>
        <div class="publisher">
          <small>Publisher</small>
          <strong>{{ $livre->edition->nom_edition }}</strong>
        </div>
        <div class="year">
          <small>Year</small>
          <strong>{{ $livre->date_publication }}</strong>
        </div>
      </div>
      <div class="badge">
        <span><i class="fa-solid fa-bolt-lightning"></i> free shipping</span>
        <span><i class="fa-solid fa-shield"></i> in stock</span>
      </div>
    </div>
    <div class="book-price">
      <div class="price">
        <strong>${{ $livre->prix }}</strong>
        @if($livre->reduction && $livre->reduction->reduction > 0)
          <strike>${{ $livre->ancien_prix }}</strike>
          <span>{{ $livre->reduction->reduction }}%</span>
        @endif
      </div>
      <div class="input-group">
        <div class="quantity">
          <input type="button" value="-" class="button-minus" data-field="quantity" />
          <input type="text" step="1" min="1" value="1" name="quantity" class="quantity-field" style="width: 4.5rem" />
          <input type="button" value="+" class="button-plus" data-field="quantity" />
        </div>
        <form id="add-to-cart-form" method="POST" action="{{ route('add.to.cart', $livre->id) }}">
          @csrf
          <input type="hidden" name="quantity" value="1" class="quantity-field" />
          <button type="button" class="cartbtn"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="book-info">
  <div class="detail-customer">
    <div class="tabbtns">
      <button class="tablink" data-btn="detail">Details Product</button>
    </div>
    <div class="book-detail tabcontent" id="detail">
      <div class="detail-line">
        <strong>Book Title</strong><span>{{ $livre->titre }}</span>
      </div>
      <div class="detail-line">
        <strong>Author</strong><span>{{ $livre->auteur->nom }}</span>
      </div>
      <div class="detail-line">
        <strong>ISBN</strong><span>{{ $livre->ISBN }}</span>
      </div>
      <div class="detail-line">
        <strong>Date Published</strong><span>{{ $livre->date_publication}}</span>
      </div>
      <div class="detail-line">
        <strong>Publisher</strong><span>{{ $livre->edition->nom_edition }}</span>
      </div>
      <div class="detail-line tag-line">
        <strong>Genre</strong>
        <div class="tags">
            <span>{{ $livre->genre }}</span>
        </div>
      </div>
    </div>
  </div>
</section>

<button class="back-to-top"><i class="fa-solid fa-chevron-up"></i></button>

@include('layouts.footerClient')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Gestion de la quantité
      const quantityFields = document.querySelectorAll('.quantity-field');
      const buttonPlus = document.querySelectorAll('.button-plus');
      const buttonMinus = document.querySelectorAll('.button-minus');
      const form = document.getElementById('add-to-cart-form');
      const cartButton = form.querySelector('.cartbtn');
      const cartCount = document.querySelector('.fa-cart-shopping + span'); // Sélectionnez l'élément du nombre d'articles
  
      buttonPlus.forEach(button => {
          button.addEventListener('click', function () {
              let quantityField = this.previousElementSibling;
              let currentValue = parseInt(quantityField.value);
              quantityField.value = currentValue + 1;
              updateHiddenQuantityField();
          });
      });
  
      buttonMinus.forEach(button => {
          button.addEventListener('click', function () {
              let quantityField = this.nextElementSibling;
              let currentValue = parseInt(quantityField.value);
              if (currentValue > 1) {
                  quantityField.value = currentValue - 1;
              }
              updateHiddenQuantityField();
          });
      });
  
      function updateHiddenQuantityField() {
          let hiddenFields = document.querySelectorAll('input[name="quantity"]');
          hiddenFields.forEach(field => {
              field.value = document.querySelector('.quantity-field').value;
          });
      }
  
      quantityFields.forEach(field => {
          field.addEventListener('input', function () {
              updateHiddenQuantityField();
          });
      });
  
      cartButton.addEventListener('click', function () {
          const formData = new FormData(form);
  
          fetch(form.action, {
              method: 'POST',
              body: formData,
              headers: {
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
              }
          })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  Swal.fire({
                      icon: 'success',
                      title: 'Success!',
                      text: 'Livre ajouté avec succèss au panier!',
                      showConfirmButton: false,
                      timer: 1500
                  });
  
                  // Mise à jour du nombre d'articles dans le panier
                  if (data.cartCount !== undefined) {
                      cartCount.textContent = data.cartCount;
                  }
              } else {
                  Swal.fire({
                      icon: 'error',
                      title: 'Error!',
                      text: 'Failed to add item to cart.',
                      showConfirmButton: false,
                      timer: 1500
                  });
              }
          })
          .catch(error => {
              console.error('Error:', error);
              Swal.fire({
                  icon: 'error',
                  title: 'Error!',
                  text: 'An error occurred. Please try again later.',
                  showConfirmButton: false,
                  timer: 1500
              });
          });
      });
  
      @if(Session::has('success_message'))
          Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: "{{ Session::get('success_message') }}",
              showConfirmButton: false,
              timer: 1500
          });
      @endif
  });
</script>