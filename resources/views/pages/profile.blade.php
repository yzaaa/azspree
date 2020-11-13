@extends('pages.index')

@section('embeddedcss')
<style scoped>
 .fa-star:before {
    content: "\f005";
}

.rating-list li i.yellow {
    color: #FFD700;
}

.rating-list li i.gray {
    color: #bbb;
}

.list-inline>li {
    display: inline-block;
    padding-right: 5px;
    padding-left: 5px;
}

.rating-list li {
    padding: 0px;
}
.star {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size:50px !important;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    transform: translate(0, 0);
    cursor:pointer;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 30px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>
@endsection

@section('content')
    <div class="container p-140-cont">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <center> <b style="color:black">{{ $data['profile']->fullname }}</b> </center>
                        <hr style="margin:0;padding:0px;">
                        <br>
                        <i class="fa fa-envelope"></i> <b style="color:black">{{ $data['profile']->email }}</b><br>
                        <i class="fa fa-phone"></i> <b style="color:black">{{ $data['profile']->contact_no }}</b>
                    </div>
                </div>
            </div>
            <div class="col-md-9">

                <div class="panel panel-default">
                <div class="panel-heading">
                    <center><label>MY PURCHASE</label></center>
                  </div>
                    <div class="panel-body">
                        <div class="table-responsive mb-40">
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><b><a href="#">ALL</a></b></th>
                                        <th><b><a href="#">TO SHIP</a></b></th>
                                        <th><b><a href="#">TO RECEIVE</a></b></th>
                                        <th><b><a href="#">COMPLETED</a></b></th>
                                        <th><b><a href="#">CANCELED</a></b></th>
                                    </tr>
                                </thead>
                          
                            <tbody>
                              <?php 
                              if(count($data['order']) > 0){
                              foreach ($data['order_no'] as $order_no): ?>
                                <tr >
                                    <td colspan="5">  
                                      <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row" >
                                                <div class="col-md-6">
                                                  <label class="label label-primary" style="color:white; font-size:15px">Order Number {{ $order_no->order_no }}</label><br>
                                                </div>
                                                <div class="col-md-6">
                                                  <b style="color:rgb(72, 99, 160); float: right;"> {{ $order_no->status }}</b><br>
                                                </div>
                                            </div>
                                            <br><hr class="mt-0 mb-10">
                                            <?php 
                                            foreach ($data['order'] as $order):
                                            if($order->order_no == $order_no->order_no){
                                            ?>
                                            <div class="row">
                                              <div class="col-md-2">
                                                {{-- <a href="/productdetails/{{$order->inmr_hash}}"><img src="/HTML/images/shop/recent/1.jpg" alt="img"></a> --}}
                                                <img style="height: 60px; width: 45px;" src="/images/products/{{$order->image_path}}" alt="img">
                                              </div>
                                              <div class="col-md-6">
                                                <b style="color:black">{{ $order->product_name }}</b>
                                                <br>
                                                <label style="color:black"> x {{ $order->qty }} </label>
                                                <br>
                                                <br>
                                              </div>
                                              <div class="col-md-4">
                                                <br>
                                                <label style="font-size:16px; color:rgb(72, 99, 160); float: right;">  &#8369; {{ number_format($order->unit_price, 2) }} </label><br>
                                                
                                              </div>
                                              <div class="row">
                                              {{-- SHOW ONCED RECEIVED ORDER --}}
                                              <?php 
                                              if($order->status == 'COMPLETED'){
                                              ?> 
                                              <div class="col-md-12" >
                                              <div style="float: right" >
                                                <?php 
                                              if($order->rating == '0'){
                                              ?> 
                                              <a href="" data-toggle="modal" data-target="#ModalReview{{$order->inmr_hash}}" class="button medium blue w-100-100">RATE NOW</a>
                                              <span class="slash-divider"></span>
                                              <?php }?>
                                              <a href="/productdetails/{{$order->inmr_hash}}" class="button medium blue w-100-100">BUY AGAIN</a>
                                              </div>
                                              </div>
                                              <?php }?>
                                              </div>
                                          </div><br>
                                          
                                          <!-- DIVIDER -->
                                          <hr class="mt-0 mb-10">     

                                          <?php }?> {{-- END OF SAME SELLER/SUPLIER --}}
                                          <?php endforeach; ?> {{-- END OF CART --}}
                                            <div class="row">
                                              <div class="col-md-12" >
                                                  {{-- <label style="color:black">Order Total:</label> --}}
                                                  <label style="font-size:16px; color:black; float:right;">Order Total:
                                                  <label style="font-size:18px; color:rgb(72, 99, 160);">&#8369; {{ number_format($order_no->order_total, 2) }} </label></label><br>
                                              </div>
                                            </div>
                                            {{-- SHOW WHEN ORDER DELIVERED--}}
                                            <?php 
                                            if($order_no->status == 'DELIVERED'){
                                            ?> 
                                            <div class="row">
                                            <div class="col-md-12" >
                                              <div style="float: right" >
                                                <a href="" data-toggle="modal" data-target="#ModalReceive{{$order_no->sohr_hash}}" class="button medium blue w-100-100">RECEIVE ORDER</a>
                                              </div>
                                            </div>
                                            </div>
                                            <?php }?> 
                                      </div>
                                    </div>    
                                    </td>
                                </tr>
                                <?php endforeach; ?> {{-- END OF SUPPLIER --}}
                                <?php }else{ ?>
                                  <tr>
                                    <td colspan="5">
                                      <center>No Purchase Yet</center>
                                      <br>
                                      {{-- <center><a href="/" class="button medium blue w-100-767">SHOP NOW!</a></center> --}}
                                    </td>
                                  </tr>
                                  <?php }?>
                              </tbody>
                            </table>
                    </div>
                    </div>

                    <div class="col-md-6 mb-30">
                      <!-- Button trigger modal -->

                      <?php 
                      foreach ($data['order'] as $order):
                      ?>
                      <!-- Modal 1-->
                      <div class="modal fade bootstrap-modal" id="ModalReview{{$order->inmr_hash}}" tabindex="-1" role="dialog" aria-labelledby="ModalReviewLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-body">
                            <form method="get" action="/review/{{$order->soln_hash}}" class="form">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h5 class="modal-title" style="text-align: center; color: rgb(72, 99, 160); font-weight: bold;" id="ModalReviewLabel">PRODUCT REVIEW</h5>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-2">
                                    <img style="height: 80px; width: 70px;" src="/images/products/{{$order->image_path}}" alt="img">
                                  </div>
                                  <div class="col-md-10">
                                    <b style="color: rgb(72, 99, 160)">{{ $order->product_name }}</b>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12 star" style="text-align: center">
                                      <input class="star star-5" id="star-5" type="radio" name="rating" value="5"/>
                                      <label class="star star-5" for="star-5"></label>
                                      <input class="star star-4" id="star-4" type="radio" name="rating" value="4"/>
                                      <label class="star star-4" for="star-4"></label>
                                      <input class="star star-3" id="star-3" type="radio" name="rating" value="3"/>
                                      <label class="star star-3" for="star-3"></label>
                                      <input class="star star-2" id="star-2" type="radio" name="rating" value="2"/>
                                      <label class="star star-2" for="star-2"></label>
                                      <input class="star star-1" id="star-1" type="radio" name="rating" value="1"/>
                                      <label class="star star-1" for="star-1"></label>
                                      {{-- <ul class="list-inline rating-list"> 
                                      <li><i class="star fa fa-star yellow" name="rating" value="1"></i></li>
                                      <li><i class="star fa fa-star yellow" name="rating" value="2"></i></li>
                                      <li><i class="star fa fa-star yellow" name="rating" value="3"></i></li>
                                      <li><i class="star fa fa-star yellow" name="rating" value="4"></i></li>
                                      <li><i class="star fa fa-star yellow" name="rating" value="5"></i></li> 
                                    </ul> --}}
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12" style="text-align: center">
                                    <textarea maxlength="1000" data-msg-required="Please enter your message" class="form-control" name="remarks" id="remarks" placeholder="ENTER YOUR PRODUCT REVIEW HERE"></textarea>
                                  </div>
                                </div>
                                <input type="hidden" name="inmr_hash" value={{ $order->inmr_hash }}>
                                <input type="hidden" name="no" value="1">
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit Review</button>
                                <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>
                      <?php endforeach; ?> 

                      <?php 
                      foreach ($data['order_no'] as $order_no):
                      ?>
                       <!-- Modal RECEIVE ORDER -->
                       <div class="modal fade bootstrap-modal" id="ModalReceive{{$order_no->sohr_hash}}" tabindex="-1" role="dialog" aria-labelledby="ModalReceiveLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-body">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h5 class="modal-title" style="text-align: center; color: rgb(72, 99, 160); font-weight: bold;" id="ModalReceiveLabel">RECEIVE ORDER</h5>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12" style="text-align: center; color:black">
                                    <Strong>THANK YOU FOR CONFIRMING YOUR ORDER!</Strong>
                                    <label>your payment will release to the merchant.</label>
                                  </div>
                                </div>
                                <br>
                                <?php 
                                foreach ($data['order'] as $order):
                                if($order->sohr_hash == $order_no->sohr_hash){
                                ?>
                                <div class="row" >
                                  <div class="col-md-2">
                                    <img style="height: 80px; width: 70px;" src="/images/products/{{$order->image_path}}" alt="img">
                                  </div>
                                  <div class="col-md-10">
                                    <b style="color: rgb(72, 99, 160)">{{ $order->product_name }}</b>
                                  </div>
                                </div>
                                <?php } ?>
                                <?php endforeach; ?>
                                <input type="hidden" name="status" value="COMPLETED">
                              </div>
                              <div class="modal-footer">
                                <a href="/updatestatus/{{ $order_no->sohr_hash }}" type="button" class="btn btn-primary">Confirm Now</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php endforeach; ?>
                    </div>	

         {{-- <!-- PAGINATION -->
        <div class="mt-0">
          <nav class="blog-pag">
            {{ $data['order']->links() }}
          </nav> 
        </div> --}}
                </div> 
            </div>
        </div>
    </div>
@stop

@section('embeddedjs')
<script type="text/javascript">

document.getElementById("btn-close").addEventListener("click", function(){ 
   document.getElementById("#ModalReview{{$order->inmr_hash}}").reset();
});

</script>
@endsection
