@extends('pages.index')
@section('content')
<div id="wrap" class="boxed ">
  <div class="container-p-75 grey-bg"> <!-- Grey BG  -->	
     <div class="page-section indent-header">
      <div class="relative">
        <h5 class="widget-title">Categories</h5>	
        <div class="row mb-30" >
          <div class="owl-clients-nav owl-carousel owl-arrows-bg" >
            <?php foreach ($data['categories'] as $category): ?> 
            <div class="item m-bot-0 text-center"><a href="/categories/{{$category->inct_hash}}" class="widget-title">{{$category->cat_name}}<br><img src="/images/category/{{$category->img_path}}" alt="img"></a></div>
             <?php endforeach; ?>
          </div>
        </div>
      </div>
      </div>
    </div>
</div>  

<!-- CONTENT -->
<div class="page-section p-100-cont">
  <div class="container">
    <div class="row">
      
      <!-- CONTENT -->
      <div class="row">
      <div class="col-sm-9">
        <div class="clearfix mb-0">
               <!-- SEARCH -->
        <div class="widget">
          <form class="form-search widget-search-form" action="/search" method="get">
            <input type="text" name="product_details" class="input-search-widget" placeholder="Search">
            <button class="" type="submit" title="Start Search">
              <span aria-hidden="true" class="icon_search"></span>
            </button>
          </form>
          </div>
        </div>
      </div>
          
        <div class="col-sm3">
          <div class="right">
              <form method="post" action="/highprice" class="form">
                  <select class="select-md">
                      <option>Sort by</option>
                      <option><a href=/highprice>Price: High to Low</a></option>
                      <option><a href="/lowprice">Price: Low to High</a></option>
                  </select>
              </form>
          </div>
        </div>

       
        </div>
        
        <div class="row">

          <!-- SHOP Item -->
          <?php
              foreach ($data['cat'] as $cat): 
             ?>
          <div>
            <center>
              <h1 class="widget-title">{{$cat->cat_name}}</h1>	
          </center>
          </div><br><br>
          <?php
          if(count($data['content']) > 0){
          foreach ($data['content'] as $products):
          ?>
         
          <div class="col-md-3 col-lg-3 pb-80" >
            
            <div class="post-prev-img centeredImageContainer" style="">  
        
              <a href="/productdetails/{{$products->inmr_hash}}"><img class="centeredImage" style="height: 150px; width: 90px; " src="/images/products/{{$products->image_path}}" alt="img"></a>
              {{-- <a href="/productdetails/{{$products->id}}"><img src="{{ config('global.backend_site') }}{{ $data['content']->productImage1}}" alt="img"></a> --}}
              
            </div>
            {{-- <div class="sale-label-cont">
              <span class="sale-label label-danger bg-red">SALE</span>
            </div>   --}}
            <div class="post-prev-title mb-5">
              <h3><a class="font-norm a-inv" href="/productdetails/{{$products->inmr_hash}}">{{$products->product_details}}</a></h3>
            </div>
              
            <div class="shop-price-cont">
              {{-- <del>$130.00</del>&nbsp; --}}
              <strong>&#8369; {{ number_format($products->cost_amt, 2) }}</strong>
            </div>
              
          
          </div>
          <?php endforeach; ?>   
            
          <?php }else{ ?>
            <div>
              <h3>
                <center>No Result for this Category</center>
              </h3>
            </div>
            <?php }?>         
            <?php endforeach; ?>               
        </div>
                        
        <!-- PAGINATION -->
        <div class="mt-0">
          <nav class="blog-pag">
            {{ $data['content']->links() }}
          </nav> 
        </div>
      </div>
    </div>
  </div>
</div>
@stop
