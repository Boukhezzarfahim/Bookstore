@include('layouts.navbarClient')
@section('title', 'Details')

<div class="breadcrumb-container">
  <ul class="breadcrumb">
    <li><a href="{{ route('homeBooks') }}">Home</a></li>
    <li><a href="#" style="color: #6c5dd4">Books</a></li>
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
    <!-- You can add more fields here if needed -->
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
        <span><i class="fa-solid fa-bolt-lightning"></i>free shipping</span>
        <span><i class="fa-solid fa-shield"></i>in stock</span>
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
        <button class="cartbtn"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</button>
        {{-- <button class="like"><i class="fa-regular fa-heart"></i></button> --}}
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
        {{-- <strong>Edition Language</strong><span>{{ $livre->language }}</span> --}}
      </div>
      <div class="detail-line">
        {{-- <strong>Book Format</strong><span>{{ $livre->format }}</span> --}}
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
