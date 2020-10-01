@extends('pages.index')

@section('embeddedcss')
<style>

</style>
@endsection

@section('content')
<div class="grey-light-bg clearfix">    
    <!-- COTENT CONTAINER -->
    <div class="container white-bg mt-80 mb-10 " style="width:600px;">
    
      <div class="relative">
                  
        <div class="col-md-12" style="align-content: center;">
            <div class="contact-form-cont" style="padding:40px;">
              <!-- TITLE -->
              <div class="mb-40">
                <h2 class="bold" style="color:rgb(57, 57, 199)">LOG <span style="color:black">IN</span> </h2>
                <label>Hello, Welcome to your account.</label>
              </div>
                            
              <!-- LOGIN FORM -->
              <div>
                <form id="login_form" autocomplete="off">

                  <div class="row row-error">
                    <div class="col-md-12">
                      <div class="alert alert-danger nobottommargin">
                        <span aria-hidden="true" class="alert-icon icon_blocked"></span>Invalid email or password.
                      </div>
                    </div>
                  </div>
                  <div class="row row-success">
                    <div class="col-md-12">
                      <div class="alert alert-success">
                        <span aria-hidden="true" class="alert-icon icon_like"></span>Successfully Logged In.
                      </div>
                    </div>
                  </div>                  

                  <div class="row">
                    <div class="col-md-12 mb-30">
                      <!-- <label>Your name *</label> -->
                      <input type="text"  name="email" value="" data-msg-required="Please enter your email" maxlength="100" class="controled" name="email" id="email" placeholder="EMAIL" required>
                    </div>
                  </div>
                  
                  <div class="row">    
                    <div class="col-md-12 mb-30">
                      <input type="password"  name="password" value="" data-msg-required="Please enter your password" data-msg-password="Please enter a password" maxlength="100" class="controled" name="password" id="password" placeholder="PASSWORD" required>
                      </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12 text-center-xxs">
                        <button type="button" class="button medium gray" id="btnlogin" style="width: 100%">
                          Log In
                        </button>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <h5>Don't have an account? <a href="/signup" style="color:rgb(57, 57, 199)" ><u>Create an Account</u></a></h5>
                    </div>
                  </div>
                  
                </form>	
              </div>
            </div>
          </div>
      
      </div>
    
    </div>
    
  </div>

  @stop
  

 
 
@section('embeddedjs')
<script type="text/javascript">

  var initializeControls = function(){
    $('.row-error').hide();
    $('.row-success').hide();
  }();

  var validateUser=(function(){
    var _data={email : $('input[name="email"]').val() , password : $('input[name="password"]').val()};    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    return $.ajax({
        "dataType":"json",
        "type":"POST",
        "url":"{{ url('/validatelogin') }}",
        "data" : _data
    });
  });

  var validateRequiredFields=function(f){
    var stat=true;

        $('.row-error').hide();
        $('div.form-group').removeClass('has-error');
        $('div.fg-line').removeClass('has-error');
        $('input[required],textarea[required],select[required]',f).each(function(){

                if($(this).is('select')){
                if($(this).val()==0 || $(this).val()==null){
                    $('.row-error').fadeIn(400);
                    $(this).focus();
                    stat=false;
                    return false;
                }
            
                }else{
                if($(this).val()==""){
                    $('.row-error').fadeIn(400);
                    $(this).closest('.fg-line').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }
            }
            
        });

        return stat;
    };


  $('#btnlogin').click(function(){

    if(validateRequiredFields($('#login_form'))){
      validateUser().done(function(response){
        
          if(response.stat=="success"){
              $('.row-success').fadeIn(200);
              setTimeout(function(){
                  window.location.href = "/profile";
              },600);
          }else{
            $('.row-error').fadeIn(200);
          }
      });
    }

  });

 
  $('input').keypress(function(evt){

    if(evt.keyCode==13){ $('#btnlogin').click(); }

  });

</script>
@endsection