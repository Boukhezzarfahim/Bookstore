@include('layouts.navbarClient')
@section('title', 'checkout')

      <div class="breadcrumb-container">
        <ul class="breadcrumb">
          <li><a href="#" style="color: #6c5dd4">Shop</a></li>
          <li><a href="#">Checkout</a></li>
        </ul>
      </div>

      <section class="checkout-section page">
        <h2>Checkout</h2>
        <div class="main">
          <div class="checkout-form">
            <h4>Billing & Shipping Address</h4>
            <div class="form-container">
              <div class="form-control Country-field">
                <select class="select-box" style="border: 1px solid #f0f0f0;padding: 5px 10px;height: 45px;border-radius: 5px;width: 100%;    appearance: none;
                background-image: url(../images/chevron-down.svg);
                background-repeat: no-repeat;
                background-size: 16px 20px;
                background-position: right 0.75rem center;font-size: 15px;outline: none;">
                  <option>USA</option>
                  <option>India</option>
                  <option>Australia</option>
                  <option>New Zealand</option>
                  <option>russia</option>
                  <option>United Kingdom</option>
                  <option>Africa</option>
                  <option>Sri Lanka</option>
                  <option>Pakistan</option>
                  <option>USA</option>
                  <option>USA</option>
                </select>
              </div>
              <div class="name-field input-field">
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Last Name">
              </div>
              <div class="address-field">
                <textarea rows="3" placeholder="Address"></textarea>
              </div>
              <div class="input-field">
                <input type="text" placeholder="City / Town">
                <input type="text" placeholder="State">
              </div>
              <div class="input-field">
                <input type="text" placeholder="Company Name">
                <input type="email" placeholder="Email">
              </div>
              <div class="input-field">
                <input type="text" placeholder="Phone no." maxlength="10">
                <input type="text" placeholder="Postcode/Zip">
              </div>
              <button>Add Address</button>
            </div>
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
                <tr>
                  <td>
                    <img src="../images/book-4.jpg" alt="">
                  </td>
                  <td>Red Queen</td>
                  <td>$25</td>
                </tr>
                <tr>
                  <td>
                    <img src="../images/book-7.jpg" alt="">
                  </td>
                  <td>Heroes Of Olympus</td>
                  <td>$20</td>
                </tr>
                <tr>
                  <td>
                    <img src="../images/book-9.jpg" alt="">
                  </td>
                  <td>The Ruins Of Gorlan</td>
                  <td>$15</td>
                </tr>
                <tr>
                  <td>
                    <img src="../images/book-10.jpg" alt="">
                  </td>
                  <td>Percy Jackson</td>
                  <td>$30</td>
                </tr>
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
                <td>$125</td>
              </tr>
              <tr>
                <td>Shipping</td>
                <td>Free Shipping</td>
              </tr>
              <tr>
                <td>Coupon</td>
                <td>$5</td>
              </tr>
              <tr>
                <td>Total</td>
                <td>$506</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="payment-section">
          <h4>Payment Method</h4>
          <div class="payment-form">
            <div class="payment-option">
              <select>
                <option>Paytm</option>
                <option>Credit Card</option>
                <option>Debit Card</option>
                <option>Cash On Delivery</option>
              </select>
            </div>
            <div class="card-name">
              <input type="text" placeholder="Card Holder Name">
            </div>
            <div class="card-no">
              <input type="text" placeholder="Card Number">
            </div>
            <div class="card-meta">
              <input type="text" placeholder="MM/YY" onfocus="(this.type='month')">
              <input type="text" placeholder="CVV">
              <input type="text" placeholder="Postal">
            </div>
            <button>Place Order Now</button>
          </div>
        </div>
      </section>

      @include('layouts.footerClient')