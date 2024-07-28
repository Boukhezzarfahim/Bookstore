@include('layouts.navbarClient')
@section('title', 'cart')

    <div class="breadcrumb-container">
        <ul class="breadcrumb">
          <li><a href="#" style="color: #6c5dd4">Shop</a></li>
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
                <tr class="data">
                    <td>
                        <img src="../images/book-2.jpg" alt="">
                    </td>
                    <td>The Wright Brothers</td>
                    <td>$45</td>
                    <td>
                        <div class="input-group">
                            <div class="quantity">
                                <input
                                  type="button"
                                  value="-"
                                  class="button-minus"
                                  data-field="quantity"
                                />
                                <input
                                  type="text"
                                  step="1"
                                  min="1"
                                  value="1"
                                  name="quantity"
                                  class="quantity-field"
                                  style="width: 4.5rem"
                                />
                                <input
                                  type="button"
                                  value="+"
                                  class="button-plus"
                                  data-field="quantity"
                                />
                              </div>
                        </div>
                    </td>
                    <td>$45</td>
                    <td><i class="fa-solid fa-trash"></i></td>
                </tr>
                <tr class="data">
                    <td>
                        <img src="../images/book-6.jpg" alt="">
                    </td>
                    <td>Harry Potter</td>
                    <td>$28</td>
                    <td>
                        <div class="input-group">
                            <div class="quantity">
                                <input
                                  type="button"
                                  value="-"
                                  class="button-minus"
                                  data-field="quantity"
                                />
                                <input
                                  type="text"
                                  step="1"
                                  min="1"
                                  value="1"
                                  name="quantity"
                                  class="quantity-field"
                                  style="width: 4.5rem"
                                />
                                <input
                                  type="button"
                                  value="+"
                                  class="button-plus"
                                  data-field="quantity"
                                />
                              </div>
                        </div>
                    </td>
                    <td>$28</td>
                    <td><i class="fa-solid fa-trash"></i></td>
                </tr>
                <tr class="data">
                    <td>
                        <img src="../images/book-7.jpg" alt="">
                    </td>
                    <td>Heroes Of Olympus</td>
                    <td>$25</td>
                    <td>
                        <div class="input-group">
                            <div class="quantity">
                                <input
                                  type="button"
                                  value="-"
                                  class="button-minus"
                                  data-field="quantity"
                                />
                                <input
                                  type="text"
                                  step="1"
                                  min="1"
                                  value="1"
                                  name="quantity"
                                  class="quantity-field"
                                  style="width: 4.5rem"
                                />
                                <input
                                  type="button"
                                  value="+"
                                  class="button-plus"
                                  data-field="quantity"
                                />
                              </div>
                        </div>
                    </td>
                    <td>$25</td>
                    <td><i class="fa-solid fa-trash"></i></td>
                </tr>
                <tr class="data">
                    <td>
                        <img src="../images/book-9.jpg" alt="">
                    </td>
                    <td>The Ruins Of Gorlan</td>
                    <td>$40</td>
                    <td>
                        <div class="input-group">
                            <div class="quantity">
                                <input
                                  type="button"
                                  value="-"
                                  class="button-minus"
                                  data-field="quantity"
                                />
                                <input
                                  type="text"
                                  step="1"
                                  min="1"
                                  value="1"
                                  name="quantity"
                                  class="quantity-field"
                                  style="width: 4.5rem"
                                />
                                <input
                                  type="button"
                                  value="+"
                                  class="button-plus"
                                  data-field="quantity"
                                />
                              </div>
                        </div>
                    </td>
                    <td>$40</td>
                    <td><i class="fa-solid fa-trash"></i></td>
                </tr>
                
                          
            </table>
        </div>
                <!-- <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr> -->
    </section>

    <section class="discount-summary">
      <div class="discount-section">
        <h4>Discount Coupon</h4>
        <div class="discount-form">
          <input type="text" placeholder="Enter Coupon Code" style="text-transform: uppercase;">
          <button>Apply Coupon</button>
        </div>
      </div>
      <div class="summary-section">
        <h4>Cart Subtotal</h4>
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
          <button><a href="checkout.html">Proceed To Checkout</a></button>
        </div>
      </div>
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
            <li class="card">
              <div class="img">
                <img src="../images/book-1.jpg" alt="" />
                <span class="badge">50%</span>
              </div>
              <h5>The Giver</h5>
              <div class="genre">
                <span>adventure,</span><span>survival</span>
              </div>
              <div class="footer">
                <span class="star"><i class="fa fa-star"></i> 4.7</span>
                <div class="price">
                  <span>$45.4</span>
                  <span><strike>$90.4</strike></span>
                </div>
              </div>
            </li>
            <li class="card">
              <div class="img">
                <img src="../images/book-2.jpg" alt="" />
                <span class="badge">50%</span>
              </div>
              <h5>The Wright ...</h5>
              <div class="genre">
                <span>adventure,</span><span>survival</span>
              </div>
              <div class="footer">
                <span class="star"><i class="fa fa-star"></i> 4.7</span>
                <div class="price">
                  <span>$45.4</span>
                  <span><strike>$90.4</strike></span>
                </div>
              </div>
            </li>
            <li class="card">
              <div class="img">
                <img src="../images/book-9.jpg" alt="" />
                <span class="badge">50%</span>
              </div>
              <h5>The Ruins Of...</h5>
              <div class="genre">
                <span>adventure,</span><span>survival</span>
              </div>
              <div class="footer">
                <span class="star"><i class="fa fa-star"></i> 4.7</span>
                <div class="price">
                  <span>$45.4</span>
                  <span><strike>$90.4</strike></span>
                </div>
              </div>
            </li>
            <li class="card">
              <div class="img">
                <img src="../images/book-10.jpg" alt="" />
                <span class="badge">50%</span>
              </div>
              <h5>Percy Jackson</h5>
              <div class="genre">
                <span>adventure,</span><span>survival</span>
              </div>
              <div class="footer">
                <span class="star"><i class="fa fa-star"></i> 4.7</span>
                <div class="price">
                  <span>$45.4</span>
                  <span><strike>$90.4</strike></span>
                </div>
              </div>
            </li>
            <li class="card">
              <div class="img">
                <img src="../images/book-5.jpg" alt="" />
                <span class="badge">50%</span>
              </div>
              <h5>To kill a...</h5>
              <div class="genre">
                <span>adventure,</span><span>survival</span>
              </div>
              <div class="footer">
                <span class="star"><i class="fa fa-star"></i> 4.7</span>
                <div class="price">
                  <span>$45.4</span>
                  <span><strike>$90.4</strike></span>
                </div>
              </div>
            </li>
            <li class="card">
              <div class="img">
                <img src="../images/book-6.jpg" alt="" />
                <span class="badge">50%</span>
              </div>
              <h5>Horry Potter</h5>
              <div class="genre">
                <span>adventure,</span><span>survival</span>
              </div>
              <div class="footer">
                <span class="star"><i class="fa fa-star"></i> 4.7</span>
                <div class="price">
                  <span>$45.4</span>
                  <span><strike>$90.4</strike></span>
                </div>
              </div>
            </li>
            <li class="card">
              <div class="img">
                <img src="../images/book-7.jpg" alt="" />
                <span class="badge">50%</span>
              </div>
              <h5>Heroes of ...</h5>
              <div class="genre">
                <span>adventure,</span><span>survival</span>
              </div>
              <div class="footer">
                <span class="star"><i class="fa fa-star"></i> 4.7</span>
                <div class="price">
                  <span>$45.4</span>
                  <span><strike>$90.4</strike></span>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>

   
        
 
    <button class="back-to-top"><i class="fa-solid fa-chevron-up"></i></button>

 
    @include('layouts.footerClient')