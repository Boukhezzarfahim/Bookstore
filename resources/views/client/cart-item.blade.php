@include('layouts.navbarClient')
@section('title', 'Cart')

<div class="breadcrumb-container">
    <ul class="breadcrumb">
        <li><a href="{{ route('client.book-filter') }}" style="color: #6c5dd4">Shop</a></li>
        <li><a href="#">Cart</a></li>
    </ul>
</div>

<section class="cart-item page">
    <h2>Book Cart</h2>
    <div class="product-table">
        <table cellspacing=0>
            <tr class="heading">
                <th>Product Img</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Delete</th>
            </tr>
            @foreach(session('cart', []) as $id => $details)
                @if(isset($details['titre'], $details['prix'], $details['quantity'], $details['image']))
                <tr class="data" data-id="{{ $id }}">
                    <td>
                        <img src="{{ asset($details['image']) }}" alt="{{ $details['titre'] }}">
                    </td>
                    <td>{{ $details['titre'] }}</td>
                    <td>${{ $details['prix'] }}</td>
                    <td>
                        <form method="POST" action="{{ route('update.cart', $id) }}" class="update-quantity-form">
                            @csrf
                            <div class="input-group">
                                <div class="quantity">
                                    <input type="button" value="-" class="button-minus">
                                    <input type="text" step="1" min="1" value="{{ $details['quantity'] }}" name="quantity" class="quantity-field" style="width: 4.5rem">
                                    <input type="button" value="+" class="button-plus">
                                </div>
                            </div>
                        </form>
                    </td>
                    <td class="item-total">${{ $details['prix'] * $details['quantity'] }}</td>
                    <td>
                      <form method="POST" action="{{ route('remove.from.cart', $id) }}">
                          @csrf
                          <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                      </form>
                    </td>
                </tr>
                @endif
            @endforeach
        </table>
    </div>

    <section class="discount-summary">
        <div class="discount-section">
            <!-- Discount Section Content -->
        </div>
        <div class="summary-section">
            <h4>Cart Subtotal</h4>
            <div class="order-detail-table">
                <table>
                    <tr>
                        <td>Order Subtotal</td>
                        <td id="order-subtotal">$0</td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Free Shipping</td>
                    </tr>
                    <tr>
                        <td>Coupon</td>
                        <td id="coupon-discount">$0</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td id="cart-total">$0</td>
                    </tr>
                </table>
                <button><a href="{{ route('client.checkout') }}">Proceed To Checkout</a></button>
            </div>
        </div>
    </section>
</section>

@include('layouts.footerClient')

<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Gestion de la quantité
        const quantityFields = document.querySelectorAll('.quantity-field');
        const buttonPlus = document.querySelectorAll('.button-plus');
        const buttonMinus = document.querySelectorAll('.button-minus');
    
        buttonPlus.forEach(button => {
            button.addEventListener('click', function () {
                let quantityField = this.previousElementSibling;
                let currentValue = parseInt(quantityField.value);
                quantityField.value = currentValue + 1;
                updateCart(quantityField);
            });
        });
    
        buttonMinus.forEach(button => {
            button.addEventListener('click', function () {
                let quantityField = this.nextElementSibling;
                let currentValue = parseInt(quantityField.value);
                if (currentValue > 1) {
                    quantityField.value = currentValue - 1;
                    updateCart(quantityField);
                }
            });
        });
    
        quantityFields.forEach(field => {
            field.addEventListener('input', function () {
                updateCart(this);
            });
        });
    
        function updateCart(quantityField) {
            let form = quantityField.closest('form');
            let formData = new FormData(form);
    
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateSummary();
                }
            });
        }
    
        function updateSummary() {
            let cartItems = document.querySelectorAll('.data');
            let subtotal = 0;
    
            cartItems.forEach(item => {
                let quantity = parseInt(item.querySelector('.quantity-field').value);
                let price = parseFloat(item.querySelector('td:nth-child(3)').textContent.replace('$', ''));
                let total = price * quantity;
                item.querySelector('.item-total').textContent = `$${total.toFixed(2)}`;
                subtotal += total;
            });
    
            document.getElementById('order-subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('cart-total').textContent = `$${subtotal.toFixed(2)}`; // Adjust this if you have additional calculations
        }
    
        updateSummary(); // Initial call to set correct values on page load
    
        @if(Session::has('success_message'))
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ Session::get('success_message') }}',
                showConfirmButton: false,
                timer: 500,
                customClass: {
                    popup: 'small-swal-popup'
                }
            }).then(() => {
                <?php session()->forget('success_message'); ?>
            });
        @endif
    });

    // Custom styles for SweetAlert2
    const style = document.createElement('style');
    style.innerHTML = `
        .small-swal-popup {
            width: 250px !important;
            font-size: 14px !important;
        }
    `;
    document.head.appendChild(style);
</script>
