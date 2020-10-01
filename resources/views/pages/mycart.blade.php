@extends('pages.index')

@section('content')
    <!-- PAGE TITLE -->
    <div class="page-title-cont page-title-small grey-light-bg">
        <div class="relative container align-left">
          <div class="row">
            
            <div class="col-md-8">
              <h1 class="page-title">MY CART</h1>
            </div>
            
            <div class="col-md-4">
              <div class="breadcrumbs">
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
              <!-- CONTENT -->
              <div class="page-section p-140-cont">
        <div class="container">
                <div class="row mb-40">
                
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-striped shopping-cart-table">
                      <thead>
                        <tr>
                        <th class="text-center"><input type="checkbox"></th>
                        <th></th>
                        <th>PRODUCT</th>
                        <th>UNIT PRICE</th>
                        <th>QUANTITY</th>
                        <th>TOTAL</th>
                        <th>ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr>
                          <td class="text-center"><input type="checkbox"></td>
                          <td><a href="#"><img src="/HTML/images/shop/recent/1.jpg" alt="img"></a></td>
                          <td><a href="#" >PRODUCT NAME</a></td> 
                          <td><div class="font-black">&#8369; PRODUCT PRICE</div></td>
                          {{-- <td><a href="#" >Product Name</a></td>
                          <td><div class="font-black">&#8369; productPrice</div></td> --}}
                          <td>
                            <form class="form">
                              <input type="number" class="input-border white-bg" style="width: 60px;" min="1" max="100" value="1">
                            </form>
                          </td>
                          <td><div class="font-black">$98.55</div></td>
                          <td><a href="#" class="icon-close" ><span aria-hidden="true" class="icon_close"></span></a></td>
                        </tr>
                        <tr>
                          <td colspan="7">
                            <center>No Data Available</center>
                          </td>
                        </tr>
                      </tbody>
                      </table>
                    </div>
                  </div>
                
                </div>
          
          <!-- DIVIDER -->
          <hr class="mt-0 mb-30">
          
          <div class="row">
          
            <div class="col-sm-6">
              <form action="#" class="form">
                <div class="row">
                
                  <div class="col-sm-6 mb-10">
                    <input placeholder="COUPON CODE" class="input-border w-100" type="text" required="">
                  </div>
                    
                  <div class="col-sm-6 mb-30">  
                    <button type="submit" class="button medium gray-light w-100-767">APPLY CODE</button>
                  </div>
                  
                </div>
              </form>
            </div>
            
            <div class="col-sm-6 text-right text-center-767 mb-30">
                   <span style="font-size:18px" class="font-light">ORDER TOTAL:</span> <strong style="font-size:18px">&#8369; 0.00</strong>
              <a href="#" class="button medium gray w-100-767">PROCEED TO CHECKOUT</a>
            </div>
            
          </div>
          
          <!-- DIVIDER -->
          <hr class="mt-0 mb-60">
          
          <!-- CALCULATE -->
          <div class="row">
          
            <div class="col-sm-6">
              <div class="grey-light-bg shipping-cont">
                
                <h4 class="blog-page-title mt-40 mb-25">CALCULATE SHIPPING</h4>
                
                <form action="#" class="form">
                  <div class="mb-20">
                    <select class="controled">
                      <option>SELECT COUNTRY</option>
                      <option>Australia</option>
                      <option>Germany</option>
                      <option>Italy</option>
                      <option>France</option>
                      <option>Spain</option>
                      <option>USA</option>
                    </select>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6 mb-20">
                      <input placeholder="STATE" class=" controled" type="text" >
                    </div>
                    
                    <div class="col-sm-6 mb-40">
                      <input placeholder="POSTCODE / ZIP" class=" controled" type="text" pattern=".{3,100}">
                    </div>
                  </div>
                  
                  <div class="mb-0">
                    <input type="submit" value="CALCULATE" class="button medium gray" data-loading-text="Loading...">
                  </div>
                </form>
                
              </div>
            </div>
                              
            <div class="col-sm-5 col-md-offset-1 ">

                <h5 class="mt-60 mb-10">
                  <span class="font-norm1 ">CART SUBTOTAL:</span> <strong>&#8369; 259.45</strong>
                </h5>
                
                <h5 class="mt-10 mb-10">
                  <span class="font-norm1 ">SHIPPING:</span> <strong>Free</strong>
                </h5>
                
                <h3 class="mt-10 mb-30">
                  <span class="font-light ">ORDER TOTAL:</span> <strong>&#8369; 259.45</strong>
                </h3>
                
                <div>
                  <a href="#" class="button medium gray">PROCEED TO CHECKOUT</a>
                </div>
                
            </div>
          
          </div>
          
        </div>
      </div>
   
@stop