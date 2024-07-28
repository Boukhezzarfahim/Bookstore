@include('layouts.navbarClient')
@section('title', 'Books')

<div class="breadcrumb-container">
  <ul class="breadcrumb">
    <li><a href="{{ route('homeBooks') }}">Home</a></li>
    <li><a href="#">Books</a></li>
  </ul>
</div>
<section class="filter">
  <form action="{{ route('client.book-filter') }}" method="GET">
      <div class="book-grid-container">
          <div class="filter-option">
              <div class="filter-group">
                  <h4>Filter Options</h4>

                  <div class="editor-pick select-box">
                      <div class="opt-title">
                          <h4>Editor Picks</h4>
                          <i class="fa-solid fa-caret-down"></i>
                      </div>
                      <div class="option">
                          <ul>
                              <li><a href="">Best Sales</a></li>
                              <li><a href="">Most Recommended</a></li>
                              <li><a href="">Newest Books</a></li>
                              <li><a href="">Featured</a></li>
                          </ul>
                      </div>
                  </div>

                  <div class="genre-category select-box">
                      <div class="opt-title">
                          <h4>Shop By Category</h4>
                          <i class="fa-solid fa-caret-down"></i>
                      </div>
                      <div class="option">
                          @foreach($categories as $category)
                              <div class="category">
                                  <input type="checkbox" name="categories[]" value="{{ $category->nom }}" />
                                  <small>{{ $category->nom }}</small>
                              </div>
                          @endforeach
                      </div>
                  </div>

                  <div class="footer-btn">
                    <button type="submit">Refine Search</button>
                    <button type="reset">Reset Filter</button>
                </div>
              </div>
              <i class="fa fa-chevron-right rightbtn"></i>
          </div>

          <div class="book-collections">
            <h4>Books</h4>
            <div class="category">
                <div class="category-list">
                    <button>Today</button>
                    <button>This Week</button>
                    <button>This Month</button>
                </div>
            </div>
            <div class="books">
                @foreach($livres as $livre)
                    <div class="book-card">
                        <div class="img">
                            <a href="{{ route('client.book-detail', $livre->id) }}">
                                <img src="{{ asset($livre->image) }}" alt="{{ $livre->titre }}" />
                            </a>
                            <button class="like" id="likebtn">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                        <h5>{{ $livre->titre }}</h5>
                        <small>
                            <a href="">{{ $livre->genre }}</a>
                        </small>
                        <div class="star-rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="footer">
                <div class="data-shown">
                    <p>Showing {{ $livres->count() }} from {{ $livres->total() }} data</p>
                </div>
                <div class="pagination">
                    {{ $livres->links() }}
                </div>
            </div>
        </div>
    </div>
</form>
</section>

<section class="book-sale">
<div class="heading">
    <h4>Books On Sale</h4>
    <div class="arrowbtn">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
</div>
<div class="book-container">
    <div class="wrapper">
        <ul class="carousel">
            @foreach($livresOnSale as $livre)
                <li class="card">
                    <div class="img">
                      <a href="{{ route('client.book-detail', ['id' => $livre->id]) }}"><img src="{{ $livre->image }}" alt="{{ $livre->titre }}" /></a>
                      @if($livre->reduction)
                      <span class="badge">{{ $livre->reduction->reduction }}%</span>
                     @endif
                    </div>
                    <h5>{{ $livre->titre }}</h5>
                    <div class="genre">
                        @foreach(explode(',', $livre->genre) as $genre)
                            <span>{{ $genre }}</span>
                        @endforeach             
                    </div>
                    <div class="footer">
                        <span class="star"><i class="fa fa-star"></i> 4.7</span>
                        <div class="price">
                            <span>${{ $livre->prix }}</span>
                            <span><strike>${{ $livre->ancien_prix }}</strike></span>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="circle-1"></div>
<div class="circle-2"></div>
</section>

<section class="service">
<div class="service-container">
  <!-- Your service section code remains the same -->
</div>
</section>

<section class="subscription">
<div class="container">
  <!-- Your subscription section code remains the same -->
</div>
<div class="circle-1"></div>
<div class="circle-2"></div>
</section>

<button class="back-to-top"><i class="fa-solid fa-chevron-up"></i></button>

@include('layouts.footerClient')