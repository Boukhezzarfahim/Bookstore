@include('layouts.navbarClient')

@section('title', 'Checkout')

<div class="breadcrumb-container">
    <ul class="breadcrumb">
        <li><a href="{{ route('client.book-filter') }}" style="color: #6c5dd4">Shop</a></li>
        <li><a href="#">Checkout</a></li>
    </ul>
</div>

<section class="checkout-section page">
    <h2>Checkout</h2>
    <div class="main">
        <div class="checkout-form">
            <h4>Billing & Shipping Address</h4>
            <form id="checkout-form" action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <div class="form-container">
                    <div class="name-field input-field">
                        <input type="text" name="nom" placeholder="Nom" required>
                        <input type="text" name="prenom" placeholder="Prénom" required>
                    </div>
                    <div class="address-field">
                        <textarea rows="3" placeholder="Message" name="message"></textarea>
                    </div>
                    
                    <div class="input-field">
                        <input type="text" name="ville" placeholder="Ville-Commune" required>
                        <input type="text" name="wilaya" placeholder="Wilaya" required>
                    </div>
                    <div class="input-field">
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-field">
                        <input type="text" name="telephone" placeholder="Téléphone" maxlength="10" required>
                        <input type="text" name="code_postale" placeholder="Code Postale" required>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="your-order">
            <h4>Your Order</h4>
            <div class="order-table">
                <table cellspacing="0">
                    <tr class="heading">
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Total</th>
                    </tr>
                    @foreach($cartItems as $item)
                    <tr>
                        <td>
                            <img src="{{ asset($item['image']) }}" alt="{{ $item['titre'] }}">
                        </td>
                        <td>{{ $item['titre'] }}</td>
                        <td>${{ $item['prix'] * $item['quantity'] }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>

<section class="detail-payment">
    <div class="summary-section">
        <h4>Order Total</h4>
        <div class="order-detail-table">
            <table>
                <tr>
                    <td>Order Subtotal</td>
                    <td>${{ $subtotal }}</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free Shipping</td>
                </tr>
                <tr>
                    <td>Coupon</td>
                    <td>$0</td> <!-- Update this if you have a coupon system -->
                </tr>
                <tr>
                    <td>Total</td>
                    <td>${{ $subtotal }}</td> <!-- Adjust this if you have additional calculations -->
                </tr>
            </table>
        </div>
        <!-- Button moved here -->
        <button type="submit" form="checkout-form" class="submit-button">Valider</button>
    </div>
</section>

@include('layouts.footerClient')
