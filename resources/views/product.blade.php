@extends('layouts.front-layout')
@section('content')

<div class="wrapper">


	  <div class="content-wrapper">
	    <div class="container">
            <h1 class="page-header">Product Detail</h1>
            @if(session('success'))

            <div class="alert alert-success mt-5">

              {{ session('success') }}

            </div>

        @endif
	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<div class="callout" id="callout" style="display:none">
	        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span class="message"></span>
	        		</div>
		            <div class="row">
		            	<div class="col-sm-6">
		            		<img src="{{(!empty($product->photo)) ? 'images/'.$product->photo : 'images/noimage.jpg'}}" width="100%" class="zoom" data-magnify-src="images/large-{{$product->photo}}">
		            		<br><br>

		            			<div class="form-group">
                                    <p class="btn-holder"><a href="{{ route('add.to.cart', $product->prodid) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
			            		</div>

		            	</div>
		            	<div class="col-sm-6">
		            		<h1 class="page-header">{{$product->prodname}}</h1>
		            		<h3><b>&#36; {{number_format($product->price, 2)}}</b></h3>
		            		<p><b>Category:</b> <a href="category?category={{$product->cat_slug}}">
                                {{$product->catname}}</a></p>
		            		<p><b>Description:</b></p>
		            		<p>{{$product->description}}</p>
		            	</div>
		            </div>
		            <br>
				    <div class="fb-comments" data-href="http://localhost/ecommerce/product?product={{$product->slug}}" data-numposts="10" width="100%"></div>
	        	</div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="box box-solid">
                              <div class="box-header with-border">
                                <h3 class="box-title"><b>Most Viewed Today</b></h3>
                              </div>
                              <div class="box-body">
                                  <ul id="trending">

                                    @foreach($mostViewed as $view)
                                       <li><a href='product?product={{$view->slug}}'>{{$item->name}}</a></li>";
                                    @endforeach

                                <ul>
                              </div>
                        </div>
                    </div>

                    <div class="row my-5">
                        <div class="box box-solid">
                              <div class="box-header with-border">
                                <h3 class="box-title"><b>Become a Subscriber</b></h3>
                              </div>
                              <div class="box-body">
                                <p>Get free updates on the latest products and discounts, straight to your inbox.</p>
                                <form method="POST" action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat"><i class="fa fa-envelope"></i> </button>
                                        </span>
                                    </div>
                                </form>
                              </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class='box box-solid'>
                              <div class='box-header with-border'>
                                <h3 class='box-title'><b>Follow us on Social Media</b></h3>
                              </div>
                              <div class='box-body'>
                                <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                                <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
                                <a class="btn btn-social-icon btn-google"><i class="fa fa-google-plus"></i></a>
                                <a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
                              </div>
                        </div>
                    </div>

                </div>

	        </div>
	      </section>

	    </div>
	  </div>
</div>




@endsection

@push('footer-script')
<script>

(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>

@endpush
