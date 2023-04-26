<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>FootLooker</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
        <!-- DataTables -->
      <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
      <!-- Magnify -->
      <link rel="stylesheet" href="{{asset('magnify/magnify.min.css')}}">


        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />      <link rel="stylesheet" href=" {{asset('css/style.css')}}">

        <!-- Custom CSS -->
      <style type="text/css">
      /* Small devices (tablets, 768px and up) */
      @media (min-width: 768px){
        #navbar-search-input{
          width: 60px;
        }
        #navbar-search-input:focus{
          width: 100px;
        }
      }

      /* Medium devices (desktops, 992px and up) */
      @media (min-width: 992px){
        #navbar-search-input{
          width: 150px;
        }
        #navbar-search-input:focus{
          width: 250px;
        }
      }

      .word-wrap{
        overflow-wrap: break-word;
      }
      .prod-body{
        height:300px;
      }

      .box:hover {
          box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
      }
      .register-box{
        margin-top:20px;
      }

      #trending{
        list-style: none;
        padding:10px 5px 10px 15px;
      }
      #trending li {
        padding-left: 1.3em;
      }
      #trending li:before {
        content: "\f046";
        font-family: FontAwesome;
        display: inline-block;
        margin-left: -1.3em;
        width: 1.3em;
      }

      /*Magnify*/
      .magnify > .magnify-lens {
        width: 100px;
        height: 100px;
      }
      .thumbnail {

position: relative;

padding: 0px;

margin-bottom: 20px;

}

.thumbnail img {

width: 80%;

}

.thumbnail .caption{

margin: 7px;

}

.main-section{

background-color: #F8F8F8;

}

.dropdown{

float:right;

padding-right: 30px;

}

.btn{

border:0px;

margin:10px 0px;

box-shadow:none !important;

}

.dropdown .dropdown-menu{

padding:20px;

top:30px !important;

width:350px !important;

left:-110px !important;

box-shadow:0px 5px 30px black;

}

.total-header-section{

border-bottom:1px solid #d2d2d2;

}

.total-section p{

margin-bottom:20px;

}

.cart-detail{

padding:15px 0px;

}

.cart-detail-img img{

width:100%;

height:100%;

padding-left:15px;

}

.cart-detail-product p{

margin:0px;

color:#000;

font-weight:500;

}

.cart-detail .price{

font-size:12px;

margin-right:10px;

font-weight:500;

}

.cart-detail .count{

color:#C2C2DC;

}

.checkout{

border-top:1px solid #d2d2d2;

padding-top: 15px;

}

.checkout .btn-primary{

border-radius:50px;

height:50px;

}

.dropdown-menu:before{

content: " ";

position:absolute;

top:-20px;

right:50px;

border:10px solid transparent;

border-bottom-color:#fff;

}

      </style>

  </head>
  <body  class="hold-transition layout-top-nav">
        <header class="main-header" >
        <nav class="navbar navbar-static-top">
            <div class="container">
              <div class="navbar-header">
                <a href="/" class="navbar-brand"><b>FootLocker</b>Site</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                  <i class="fa fa-bars"></i>
                </button>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                  <li><a href="/">HOME</a></li>
                  <li><a href="/about">ABOUT US</a></li>
                  <li><a href="/contact">CONTACT US</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORY <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                    @foreach($navbars as $category)
                        <li><a href="/category?category={{$category->cat_slug}}">{{$category->name}}</a></li>
                    @endforeach
                    </ul>
                  </li>
                </ul>

              </div>
              <!-- /.navbar-collapse -->
              <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <button type="button" class="btn btn-info" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </button>

                        <div class="dropdown-menu">

                            <div class="row total-header-section">

                                <div class="col-lg-6 col-sm-6 col-6">

                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>

                                </div>

                                @php $total = 0 @endphp

                                @foreach((array) session('cart') as $id => $details)

                                    @php $total += $details['price'] * $details['quantity'] @endphp

                                @endforeach

                                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">

                                    <p>Total: <span class="text-info">$ {{ $total }}</span></p>

                                </div>

                            </div>

                            @if(session('cart'))

                                @foreach(session('cart') as $id => $details)

                                    <div class="row cart-detail">

                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">

                                            <img src="{{(!empty($details['image'])) ? 'images/'.$details['image'] : 'images/noimage.jpg'}}" />

                                        </div>

                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">

                                            <p>{{ $details['name'] }}</p>

                                            <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>

                                        </div>

                                    </div>

                                @endforeach

                            @endif

                            <div class="row">

                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">

                                    <a href="{{ route('cart') }}" class="btn btn-primary btn-block p-3" style="padding: 15px 0 15px 0">View all</a>

                                </div>

                            </div>

                        </div>

                    </li>
                  @guest
                    <li><a href='{{ route('login') }}'>LOGIN</a></li>
                    <li><a href='{{ route('register') }}'>Register</a></li>
                  @else
                    <li class="dropdown user user-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{(!empty(Auth::user()->photo)) ? 'images/'.Auth::user()->photo : 'images/profile.jpg'}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->firstname .' '.Auth::user()->lastname}}</span>
                          </a>
                          <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                              <img src="{{(!empty(Auth::user()->photo)) ? 'images/'.Auth::user()->photo : 'images/profile.jpg'}}" class="img-circle" alt="User Image">

                              <p>
                                {{Auth::user()->firstname .' '.Auth::user()->lastname}}
                                <small>Member since '{{date('M. Y', strtotime(Auth::user()->created_on))}}'</small>
                              </p>
                            </li>
                            <li class="user-footer">
                              <div class="pull-left">
                                <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                              </div>
                              <div class="pull-right">
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                   {{ __('Logout') }}
                               </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                              </div>
                            </li>
                          </ul>
                        </li>

                  @endguest



                </ul>
              </div>
            </div>
          </nav>
        </header>

    {{-- -------------FOR ALL PAGES CONTENT---------- --}}
    @yield('content')


    <br>
    <footer class="section-p1">
        <div class="col">
            <h2>FOOT LOCKER</h2>
            <br>
            <h4>Contact</h4>
            <p><strong>Address:</strong> 23-A Whadat Road, Muslim Town, Lahore</p>
            <p><strong>Phone:</strong> +92 344 841 4250 / 051 603 12 002</p>
            <p><strong>Hours</strong> 10:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign in</a>
            <a href="#">View cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>
        <div class="col install">
            <h4>Install App</h4>
            <p>From App store or Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            <p>Secured Payement Gateways</p>
            <img src="img/pay/pay.png" alt="">
        </div>
        <div class="copyright">
            <p>@ 2022, NUML etc - FootLocker Website</p>
        </div>
    </footer>

    {{-- ===============SCRIPT AREA============ --}}
    <!-- jQuery 3 {{asset('')}}-->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- CK Editor -->
<script src="{{asset('bower_components/ckeditor/ckeditor.js')}}"></script>
<script>
  $(function () {
    // Datatable
    $('#example1').DataTable()
    //CK Editor
    CKEDITOR.replace('editor1')
  });
</script>
<!--Magnify -->
<script src="magnify/magnify.min.js"></script>
<script>
$(function(){
	$('.zoom').magnify();
});
</script>
<!-- Custom Scripts -->
<script>
$(function(){
  $('#navbar-search-input').focus(function(){
    $('#searchBtn').show();
  });

  $('#navbar-search-input').focusout(function(){
    $('#searchBtn').hide();
  });

  getCart();

  $('#productForm').submit(function(e){
  	e.preventDefault();
  	var product = $(this).serialize();
  	$.ajax({
  		type: 'POST',
  		url: 'cart_add.php',
  		data: product,
  		dataType: 'json',
  		success: function(response){
  			$('#callout').show();
  			$('.message').html(response.message);
  			if(response.error){
  				$('#callout').removeClass('callout-success').addClass('callout-danger');
  			}
  			else{
				$('#callout').removeClass('callout-danger').addClass('callout-success');
				getCart();
  			}
  		}
  	});
  });

  $(document).on('click', '.close', function(){
  	$('#callout').hide();
  });

});

function getCart(){
	$.ajax({
		type: 'POST',
		url: 'cart_fetch.php',
		dataType: 'json',
		success: function(response){
			$('#cart_menu').html(response.list);
			$('.cart_count').html(response.count);
		}
	});
}
</script>


    @stack('footer-script')

  </body>
</html>
