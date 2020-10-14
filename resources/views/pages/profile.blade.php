@extends('pages.index')

@section('content')
    <div class="container p-140-cont">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default" style="-webkit-box-shadow: 10px 10px 35px -5px rgba(227,227,227,1);
                -moz-box-shadow: 10px 10px 35px -5px rgba(227,227,227,1);
                box-shadow: 10px 10px 35px -5px rgba(227,227,227,1);">
                    <div class="panel-body">
                        <center> <b style="color:black">{{ $data['profile']->fullname }}</b> </center>
                        <hr style="margin:0;padding:0px;">
                        <br>
                        <i class="fa fa-envelope"></i> <b style="color:black">{{ $data['profile']->email }}</b><br>
                        <i class="fa fa-phone"></i> <b style="color:black">{{ $data['profile']->contact_no }}</b>
                    </div>
                </div>
            </div>
            <div class="col-md-8">

                <div class="panel panel-default" style="-webkit-box-shadow: 10px 10px 35px -5px rgba(227,227,227,1);
                -moz-box-shadow: 10px 10px 35px -5px rgba(227,227,227,1);
                box-shadow: 10px 10px 35px -5px rgba(227,227,227,1);">
                <div class="panel-heading">
                    <center><label>My Purchase</label></center>
                  </div>
                    <div class="panel-body">

                        {{-- <div class="row mb-30">
                            <div class="col-md-12">
                              <div class="tabs-3">
                                <ul class="nav nav-tabs bootstrap-tabs">
                                  <center><li class="active"><a href="#topay" class="a-inv" data-toggle="tab">TO PAY</a></li></center>
                                  <center><li><a href="#toship" class="a-inv" data-toggle="tab">TO SHIP</a></li></center>
                                  <li><a href="#toreceive" class="a-inv" data-toggle="tab">TO RECEIVE</a></li>
                                  <li><a href="#complete" class="a-inv" data-toggle="tab">COMPLETE</a></li>
                                  <li><a href="#cancelled" class="a-inv" data-toggle="tab">CANCELLED</a></li>
                                </ul>
                                <div class="tab-content">
                                  <div class="tab-pane fade in active" id="topay">
                                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                                  </div>
                                  <div class="tab-pane fade" id="toship">
                                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                                  </div>
                                  <div class="tab-pane fade" id="toreceive">
                                    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                                  </div>
                                  <div class="tab-pane fade" id="complete">
                                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                                  </div>
                                  <div class="tab-pane fade" id="cancelled">
                                    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                                  </div>
                                </div>
                              </div>
                                        </div>
                          </div> --}}

                        <div class="table-responsive mb-40">
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><b><a href="#">To Pay</a></b></th>
                                        <th><b><a href="#">To Ship</a></b></th>
                                        <th><b><a href="#">To Receive</a></b></th>
                                        <th><b><a href="#">Completed</a></b></th>
                                        <th><b><a href="#">Cancelled</a></b></th>
                                    </tr>
                                </thead>
                          
                            <tbody>
                           
                                <tr >
                                    <td colspan="5">      
                                        <div class="col-md-12 col-lg-12" >
                                          <div class="row">
                                            <div class="col-md-2">
                                              {{-- <a href="/productdetails/{{$order->id}}"><img src="/HTML/images/shop/recent/1.jpg" alt="img"></a> --}}
                                              <img src="/HTML/images/shop/recent/1.jpg" alt="img">
                                          </div>
                                          <div class="col-md-6">
                                            {{-- <a href="/productdetails/{{$order->id}}"><b style="color:black">{{ $order->productName }}</b></a> --}}
                                            {{-- <b style="color:black">{{ $order->productName }}</b> --}}
                                          <br>
                                          {{-- x{{ $order->quantity }} --}}
                                            <br>
                                            {{-- <label style="font-size:16px">  &#8369; {{ $order->productPrice }}</label><br> --}}
                                          </div>
                                          <div class="col-md-4">
                                          {{-- <label style="color:blue; font-size:18px"> {{ $order->orderStatus }}</label><br> --}}
                                          </div>
                                        </div>
                                      </td>
                                </tr>
                                
                                  <tr>
                                    <td colspan="5">
                                      <center>No Data Available</center>
                                    </td>
                                  </tr>
                               
                              </tbody>
                            </table>
                    </div>
                    </div>
                </div> 



            </div>
        </div>
    </div>
@stop