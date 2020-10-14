@extends('pages.index')

@section('content')
  
      
              <!-- CONTENT -->
              <div class="page-section p-140-cont">
        <div class="container">
                <div class="row mb-40">
                  <div class="row row-error">
                    <div class="col-md-12">
                        <div class="alert alert-danger nobottommargin">
                            <span aria-hidden="true" class="alert-icon icon_blocked"></span>
                            <span class="error_msg"></span>
                        </div>
                    </div>
                </div>
                <div class="row div_success">
                    <div class="col-md-12" style="align-content: center;">
                        <div class="row row-success">
                            <div class="col-md-12">
                                <div class="alert alert-success">
                                    <span aria-hidden="true" class="alert-icon icon_like"></span>
                                    <span class="success_msg"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
          <!-- SHIPPING INFO -->
          <div id="shipping_info">
            {{-- <div >
              <h3 class="mt-0 mb-50">&nbsp;</h3>
            </div> --}}
            <div >
              <h3 class="mt-0 mb-50">SHIPPING INFORMATION</h3>
            </div>
  
          <div class="row">
          
            <div class="col-sm-6">
              <div class=" shipping-address">
                
                <h4 class="blog-page-title mt-40 mb-25">SHIPPING ADDRESS</h4>
                
                <form id="add-form" autocomplete="off">
                  <div class="mb-20">
                    <input type="text" data-msg-required="PLEASE ENTER REGION"
                    maxlength="100" class="controled" name="region" id="region" placeholder="ENTER REGION"
                    required>
                    {{-- <select class="controled">
                      <option>SELECT REGION</option>
                      <option>METRO MANILA</option>
                      <option>MINDANAO</option>
                      <option>NORTH LUZON</option>
                      <option>SOUTH LUZON</option>
                      <option>VISAYAS</option>
                    </select> --}}
                  </div>

                  <div class="mb-20">
                    <input type="text" data-msg-required="PLEASE ENTER PROVINCE"
                    maxlength="100" class="controled" name="province" id="province" placeholder="ENTER PROVINCE"
                    required>
                    {{-- <select class="controled">
                      <option>SELECT PROVINCE</option>
                      <option>METRO MANILA</option>
                      <option>MINDANAO</option>
                      <option>NORTH LUZON</option>
                      <option>SOUTH LUZON</option>
                      <option>VISAYAS</option>
                    </select> --}}
                  </div>

                  
                  <div class="row">
                    <div class="col-sm-6 mb-20">
                      <input type="text" data-msg-required="PLEASE ENTER CITY"
                      maxlength="100" class="controled" name="city" id="city" placeholder="ENTER CITY"
                      required>
                      {{-- <select class="controled">
                        <option>SELECT CITY</option>
                        <option>METRO MANILA</option>
                        <option>MINDANAO</option>
                        <option>NORTH LUZON</option>
                        <option>SOUTH LUZON</option>
                        <option>VISAYAS</option>
                      </select> --}}
                    </div>

                    <div class="col-sm-6 mb-20">
                      <input type="text" data-msg-required="PLEASE ENTER BARANGAY"
                      maxlength="100" class="controled" name="barangay" id="barangay" placeholder="ENTER BARANGAY"
                      required>
                      {{-- <select class="controled">
                        <option>SELECT BARANGAY</option>
                        <option>METRO MANILA</option>
                        <option>MINDANAO</option>
                        <option>NORTH LUZON</option>
                        <option>SOUTH LUZON</option>
                        <option>VISAYAS</option>
                      </select> --}}
                    </div>
                    
                    {{-- <div class="col-sm-6 mb-40">
                      <input placeholder="SHIPPING CITY" class=" controled" type="text" pattern=".{3,100}">
                    </div> --}}
                  </div>

                  <div class="mb-20">
                    <input type="text" data-msg-required="HOUSE NO, STREET, BLDG NO, ETC"
                      maxlength="100" class="controled" name="house" id="house" placeholder="HOUSE NO, STREET, BLDG NO, ETC"
                      required>
                      {{-- <input placeholder="HOUSE NO, STREET, BLDG NO, ETC" class=" controled" type="text" pattern=".{3,100}"> --}}
                    </div>

                      <!-- DIVIDER -->
                <hr class="mt-0 mb-10">

                <h4 class="blog-page-title mt-40 mb-25">PAYMENT METHOD</h4>

                <div class="mb-20">
                  <div class="row">
                    <div class="col-sm-6 mb-20">
                      <button type="button" disabled="disabled" class="button medium thin blue"
                      style="width: 100%;"> <span class=""></span> <label>COD</label>
                      </button>
                    </div>

                    <div class="col-sm-6 mb-20">
                      <button type="button" disabled="disabled" class="button medium thin blue"
                      style="width: 100%;"> <span class=""></span> <label>GCASH</label>
                      </button>
                    </div>

                    <div class="col-sm-6 mb-20">
                      <button type="button" disabled="disabled" class="button medium thin blue"
                      style="width: 100%;"> <span class=""></span> <label>ONLINE PAYMENT</label>
                      </button>
                    </div>
                     </div>
                  </div>

                  
                  <div class="mb-0" style="text-align: right">
                    {{-- <a href="/payment" class="button medium blue w-100-767">CONFIRM ORDER</a>  --}}
                    <button type="button" id="btnpayment" data-user-id="<?php echo session('user_hash'); ?>" class="button medium blue">
                      <span class=""></span> <label class="btnpayment_label">CONFIRM ORDER</label>
                  </button>
                  </div>
                </form>
                {{-- <!-- DIVIDER -->
                <div class="vl" style="border-right: 6px solid green;  height: 500px;"></div> --}}
              </div>
            </div>
                  

              <div class="col-sm-5 col-md-offset-1 ">

                <?php 
                        $unit_total = 0;
                        $sub_total = 0;
                        $shipping = 0;
                        $order_total = 0;
                         ?>
                <?php 
                if(count($data['mycart']) > 0){
                  foreach ($data['supplier'] as $sumr): 
                 ?>
                  <?php 
                    foreach ($data['mycart'] as $addcart):
                    if($addcart->sumr_hash == $sumr->sumr_hash)
                    {
                    $unit_total =$addcart->unit_price * $addcart->qty; 
                    $sub_total +=$unit_total; 
                    $shipping =$sub_total * 0.05;
                    $order_total = $sub_total +$shipping; 
        
                  ?>
                  <div class="row">
                    <div class="col-md-2">  
                      <img src="/HTML/images/shop/recent/1.jpg" alt="img">
                    </div>
                    <div class="col-md-8">  
                  {{ $addcart->product_name }}<br>
                  {{ $addcart->qty }} x
                </div>
                <div class="col-md-2">  
                  {{ number_format($addcart->unit_price, 2) }}
                </div>
                  <input type="hidden" value="{{ number_format($unit_total, 2) }}" name="unit_total">
                  </div>
                   <!-- DIVIDER -->
          <hr class="mt-0 mb-10">
                
              <?php }?> {{-- END OF SAME SELLER/SUPLIER --}}
              <?php endforeach; ?> {{-- END OF CART --}}
              <?php endforeach; ?> {{-- END OF SUPPLIER --}}
              <?php }?>

                <h5 class="mt-60 mb-10" >
                  <span class="font-norm1">CART SUBTOTAL:</span> <strong style="font-size:20px" >&#8369; {{ number_format($sub_total, 2) }}</strong>
                </h5> 
                
                <h5 class="mt-10 mb-10">
                  <span class="font-norm1">SHIPPING:</span> <strong style="font-size:20px">&#8369; {{ number_format($shipping, 2) }}</strong>
                </h5>
                
                 <!-- DIVIDER -->
                <hr class="mt-0 mb-10">

                <h3 class="mt-10 mb-30">
                  <span class="font-norm1">ORDER TOTAL:</span> <strong style="font-size:22px">&#8369; {{ number_format($order_total, 2) }}</strong>
                </h3>
  
            </div>
           
          
          </div>
          </div>
          <br>

              <!-- DIVIDER -->
          <hr class="mt-0 mb-60">

        </div>
      </div>
   
@stop

@section('embeddedjs')
<script type="text/javascript">
 var initializeControls = function() {
        $('.row-error').hide();
        $('.row-success').hide();
        $('.div_success').hide();
    }();


    var validateRequiredFields = function(f) {
        var stat = true;

        $('.row-error').hide();
        $('div.form-group').removeClass('has-error');
        $('div.fg-line').removeClass('has-error');
        $('input[required],textarea[required],select[required]', f).each(function() {

            if ($(this).is('select')) {
                if ($(this).val() == 0 || $(this).val() == null) {
                    $('.error_msg').html($(this).data('msg-required'));
                    $('.row-error').fadeIn(400);
                    $(this).focus();
                    stat = false;
                    return false;
                }
            } else {
                if ($(this).val() == 0 || $(this).val() == "") {
                    $('.error_msg').html($(this).data('msg-required'));
                    $('.row-error').fadeIn(400);
                    $(this).closest('.fg-line').addClass('has-error');
                    $(this).focus();
                    stat = false;
                    return false;
                }
            }

        });

        return stat;
    };

    var AddCart = (function() {
        var _data = $('#add-form').serializeArray();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        return $.ajax({
            "dataType": "json",
            "type": "POST",
            // "url": "{{ url('/cart/create') }}",
            "data": _data
        });
    });

    $('#btnpayment').click(function() {
     
            if (validateRequiredFields($('#add-form'))) {
            $(this).toggleClass('disabled');
            $(this).find('span').toggleClass('fa fa-spinner fa-spin');
            $('.btnpayment_label').html('CONFIRM ORDER');


            AddCart().done(function(response) {

                if (response.stat == "success") {
                    $('.div_success').show();
                    $('.div_sign_up').hide();
                    $('.success_msg').html(response.msg);
                    $('.row-success').fadeIn(400);
                    setTimeout(function() {
                        window.location.href = "/payment";
                    },1000);
                } 
            })
            .always(function() {
                $(this).toggleClass('disabled');
                $(this).find('span').toggleClass('fa fa-spinner fa-spin');
            });
            }

    });

    $('input').keypress(function(evt) {

        if (evt.keyCode == 13) {
            $('#btnpayment').click();
        }

    });
 


  </script>
  @endsection