@extends('pages.index')

@section('content')
  
      
<!-- CONTENT -->
<div class="page-section p-140-cont">
  <div class="container">
    
        <!-- SHIPPING INFO -->
        <div id="shipping_info">
              <div >
                <h3 class="mt-0 mb-50">SHIPPING INFORMATION</h3>
              </div>
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

            <div class="row">
              <form id="add-form" autocomplete="off">
              <div class="col-sm-6">

                
                <div class=" shipping-address">
                  {{-- <div class="row mb-40">
                  </div> --}}
                  <h4 class="blog-page-title mt-5 mb-25">SHIPPING ADDRESS</h4>

                    <div class="mb-20">
                      <select class="controled region" name="region" id="region" data-msg-required="PLEASE SELECT REGION" required>
                        <option selected disabled="disabled" selected="selected" value="default">SELECT REGION</option>
                        <?php foreach ($data['tbl_region'] as $region): ?>
                        <option value="{{$region->regn_hash}}">{{$region->region}}</option>
                        <?php endforeach; ?> 
                      </select>
                    </div>

                    <div class="mb-20">
                      <select class="controled" name="province" id="province"  data-msg-required="PLEASE SELECT PROVINCE" required>
                        <option selected disabled="disabled" selected="selected" value="default">SELECT PROVINCE</option>
                        <option value=""></option>
                      </select>
                    </div>

                    <div class="row">
                      <div class="col-sm-6 mb-20">
                        <select class="controled city" name="city" id="city" data-msg-required="PLEASE SELECT CITY" required>
                          <option selected disabled="disabled" selected="selected" value="default">SELECT CITY</option>
                          <option value=""></option>
                        </select>
                      </div>

                      <div class="col-sm-6 mb-20">
                        <select class="controled barangay" name="barangay" id="barangay" data-msg-required="PLEASE SELECT BARANGAY" required>
                          <option selected  disabled="disabled" selected="selected" value="default">SELECT BARANGAY</option>
                          <option value=""></option>
                        </select>
                      </div>
                    </div>

                    <div class="mb-20">
                      <input type="text" data-msg-required="HOUSE NO, STREET, BLDG NO, ETC"
                        maxlength="100" class="controled" name="address" id="address" placeholder="HOUSE NO, STREET, BLDG NO, ETC"
                        required>
                        {{-- <input placeholder="HOUSE NO, STREET, BLDG NO, ETC" class=" controled" type="text" pattern=".{3,100}"> --}}
                      </div>

                        <!-- DIVIDER -->
                      <hr class="mt-0 mb-10">

                      <h4 class="blog-page-title mt-40 mb-25">PAYMENT METHOD</h4>

                      <div class="mb-20">
                        <div class="row">
                          <div class="col-sm-4 mb-20">
                            <input type="button" class="btn btn-lg btn-primary btn_cod"
                            style="width: 100%;" value="COD" name="cod" data-msg-required="PLEASE CHOOSE PAYMENT METHOD" required>
                          </div>

                          <div class="col-sm-4 mb-20">
                            <button type="button" disabled="disabled" class="btn btn-lg btn-primary"
                            style="width: 100%;">  <label>GCASH</label>
                            </button>
                          </div>
                          
                          </div>
                      </div>

                        <div id="divCOD" style="display:none;">
                          CASH ON DELIVERY.
                        </div>
                
                </div>
              </div>
              
                    

                <div class="col-sm-6 col-md-offset ">
                  
                  <?php 
                  
                    $cart_subtotal = 0; 
                    $total_shipping = 0; 
                    $total_payment = 0;

                    if(count($data['mycart']) > 0){
                      
                    foreach ($data['supplier'] as $sumr): 
                  ?>
                  <label>{{$sumr->seller_name}}</label>
                      <?php 
                        $unit_total = 0; 
                        $order_subtotal = 0; 
                        $total_qty = 0; 
                        $shipping = 0; 
                        $order_total = 0; 

                      ?>
                          <?php 
                            foreach ($data['mycart'] as $addcart):
                            if($addcart->sumr_hash == $sumr->sumr_hash)
                            {
                            $unit_total =$addcart->unit_price * $addcart->qty; 
                            $order_subtotal += $unit_total;
                            $shipping = 55;
                            $order_total = $order_subtotal+$shipping; 
                            $total_qty += $addcart->qty;
                          ?>

                                  <div class="row">
                                      <div class="col-md-2">  
                                        <input type="hidden" value="{{ $addcart->srln_hash }}" name="srln_hash" />
                                        <input type="hidden" value="{{ $addcart->sumr_hash }}" name="sumr_hash" />
                                        <input type="hidden" value="{{ $addcart->inmr_hash }}" name="inmr_hash[]" id="items"/>
                                        <img style="height: 60px; width: 45px;" src="/images/products/{{$addcart->image_path}}" alt="img">
                                      </div>
                                      <div class="col-md-8">  
                                      {{ $addcart->product_name }}<br>
                                      {{ $addcart->qty }} x {{ number_format($addcart->unit_price, 2) }}
                                      <input type="hidden" value="{{ $addcart->qty }}" name="qty[]" id="items" />
                                      <input type="hidden" value="{{ $addcart->unit_price }}" name="unit_price[]" id="items"/>
                                      </div>
                                      <div class="col-md-2">  
                                        {{ number_format($unit_total, 2) }}
                                      </div>
                                   </div>

                                <!-- DIVIDER -->
                                <hr class="mt-0 mb-10">
          
                          <?php }?> {{-- END OF SAME SELLER/SUPPLIER --}}
                      <?php 
                    
                    endforeach; ?> {{-- END OF CART --}}
                                <div class="row">
                                  <div class="col-md-6" style="float: right">  
                                    <input type="hidden" value="{{ $total_qty }}" name="total_qty" >
                                    <input type="hidden" value="{{ $order_subtotal }}" name="order_subtotal" >
                                    <input type="hidden" value="{{ $shipping }}" name="shipping" >
                                    <input type="hidden" value="{{ $order_total }}" name="order_total" >
                                    
                                    <input type="hidden" name="payment_method" data-msg-required="PLEASE CHECK PAYMENT METHOD" required>
                                    <span class="font-norm1">SHIPPING:</span> <strong>&#8369; {{ number_format($shipping, 2) }} </strong><br>
                                    <span class="font-norm1">ORDER TOTAL:</span> <strong>&#8369; {{ number_format($order_total, 2) }} </strong>
                                  </div>
                                </div>
                  <?php 
                
                
                $cart_subtotal += $order_subtotal; 
                $total_shipping += $shipping; 
                $total_payment = $cart_subtotal + $total_shipping;

                endforeach; ?> {{-- END OF SUPPLIER --}}

                  <h5 class="mt-60 mb-10" >
                    <span class="font-norm1">CART SUBTOTAL:</span> <strong style="font-size:20px" >&#8369; {{ number_format($cart_subtotal, 2) }} </strong>
                  </h5> 
                  
                  <h5 class="mt-10 mb-10">
                    <span class="font-norm1">SHIPPING:</span> <strong style="font-size:20px">&#8369; {{ number_format($total_shipping, 2) }}</strong>
                  </h5>
                  
                  <!-- DIVIDER -->
                  <hr class="mt-0 mb-10">

                  <h3 class="mt-10 mb-30">
                    <span class="font-norm1">TOTAL PAYMENT:</span> <strong style="font-size:22px">&#8369; {{ number_format($total_payment, 2) }} </strong>
                  </h3>
                  </div>

                  <?php }?>

                  <div class="mb-0" style="text-align: right">
                    {{-- <a href="/payment" class="button medium blue w-100-767">CONFIRM ORDER</a>  --}}
                    <button type="button" id="btnpayment" class="button medium blue">
                      <span class=""></span> <label class="btnpayment_label">CONFIRM ORDER</label>
                    </button>
                  </div>
              </form>
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

$(document).ready(function() {
  $('select[name="region"]').on('change', function() {
      var regn_hash = $(this).val();
      if(regn_hash) {
      $.ajax({
      url: '/get-province-list/'+encodeURI(regn_hash),
      type: "GET",
      dataType: "json",
      success:function(data) {
          $('select[name="province"]').empty();
          $('select[name="city"]').empty();
          $('select[name="barangay"]').empty();
          $.each(data, function(key, value) {
          // <option selected disabled="disabled" selected="selected" value="default">SELECT PROVINCE</option>
          $('select[name="province"]').append('<option value="'+ value.prov_hash +'">'+ value.province +'</option>');
          });
          }
        });
      }else{
      $('select[name="province"]').empty();
      }
  });
});

$(document).ready(function() {
  $('select[name="province"]').on('change', function() {
      var prov_hash = $(this).val();
      if(prov_hash) {
      $.ajax({
      url: '/get-city-list/'+encodeURI(prov_hash),
      type: "GET",
      dataType: "json",
      success:function(data) {
          $('select[name="city"]').empty();
          $.each(data, function(key, value) {
          $('select[name="city"]').append('<option value="'+ value.city_hash +'">'+ value.city +'</option>');
          });
          }
        });
      }else{
      $('select[name="city"]').empty();
      }
  });
});

$(document).ready(function() {
  $('select[name="city"]').on('change', function() {
      var city_hash = $(this).val();
      if(city_hash) {
      $.ajax({
      url: '/get-barangay-list/'+encodeURI(city_hash),
      type: "GET",
      dataType: "json",
      success:function(data) {
      // console.log(data);
          $('select[name="barangay"]').empty();
          $.each(data, function(key, value) {
          $('select[name="barangay"]').append('<option value="'+ value.brgy_hash +'">'+ value.barangay +'</option>');
          });
          }
        });
      }else{
      $('select[name="barangay"]').empty();
      }
  });
});


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
                if ($(this).val() == null || $(this).val() == "") {
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
            "url": "{{ url('/placeorder/create') }}",
            "data": _data
        });
    });

    $('#btnpayment').click(function() {
     
            if (validateRequiredFields($('#add-form'))) {
            $(this).toggleClass('disabled');
            $(this).find('span').toggleClass('fa fa-spinner fa-spin');
            $('.btnpayment_label').html('CONFIRM ORDER');

            var payment_method = $('input[name="payment_method"]').val();
            
            if(payment_method == ""){
                $('.error_msg').html($(this).data('msg-required'));
                $('.row-error').fadeIn(400);

            }else{
              AddCart().done(function(response) {

              if (response.stat == "success") {
                  $('.div_success').show();
                  $('.div_sign_up').hide();
                  $('.success_msg').html(response.msg);
                  $('.row-success').fadeIn(400);
                  setTimeout(function() {
                      window.location.href = "/profile";
                  },1000);
              } 
              })
              .always(function() {
              $(this).toggleClass('disabled');
              $(this).find('span').toggleClass('fa fa-spinner fa-spin');
              });
            }

            }

    });

$('.btn_cod').click(function() {
    var clicked_button = $(this).val();
    // alert(clicked_button);

    $('input[name="payment_method"]').val(clicked_button);

    var x = document.getElementById("divCOD");
  if (x.style.display == "none") {
    x.style.display = "block";
  }
});

// $(".city").change(function(){
// 	var dataType=$(this).dataType();
// 	$(".barangay option").hide();
//   $(".barangay").dataType("");
// 	$(".barangay option[value='city"+dataType+"']").show();
//   $(".barangay").change();
// });

    $('input').keypress(function(evt) {

        if (evt.keyCode == 13) {
            $('#btnpayment').click();
        }

    });
 


  </script>
  @endsection