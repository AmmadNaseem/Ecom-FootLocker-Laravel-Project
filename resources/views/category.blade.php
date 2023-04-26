@extends('layouts.front-layout')
@section('content')

<div class="content-wrapper">
    <div class="container">

      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-sm-9">
                <h1 class="page-header">{{$category}}</h1>
                <div class='row'>
                   @foreach ($products as $row)
                        <div class='col-sm-4'>
                            <div class='box box-solid'>
                                <div class='box-body prod-body'>
                                    <img src="{{ $row->photo ? '/images/' . $row->photo : '/images/noimage.jpg' }}" width='100%' height='230px' class='thumbnail'>
                                    <h5><a href='product?product={{$row->slug}}'>{{$row->name}}</a></h5>
                                </div>
                                <div class='box-footer'>
                                    <b>&#36; {{number_format($row->price, 2)}}</b>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
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




@endsection
