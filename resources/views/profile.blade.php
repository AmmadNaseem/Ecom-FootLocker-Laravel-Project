@extends('layouts.front-layout')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <h1 class="page-header" style="text-transform: uppercase">{{$user->firstname.' '.$user->lastname}} Profile Information</h1>


      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-sm-9">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="col-sm-3">
                            <img src="{{(!empty($user->photo)) ? 'images/'.$user->photo : 'images/noimage.jpg'}}" width="100%">
                        </div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h4>Name:</h4>
                                    <h4>Email:</h4>
                                    <h4>Contact Info:</h4>
                                    <h4>Address:</h4>
                                    <h4>Member Since:</h4>
                                </div>
                                <div class="col-sm-9">
                                    <h4>{{$user->firstname.' '.$user->lastname}}</h4>
                                    <h4><?php echo $user['email']; ?></h4>
                                    <h4>{{(!empty($user->contact_info)) ? $user->contact_info : 'N/a'}}</h4>
                                    <h4>{{(!empty($user->address)) ? $user->address : 'N/a'}}</h4>
                                    <h4><?php echo date('M d, Y', strtotime($user->created_at)); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
      </section>

    </div>
  </div>

@endsection

@push('footer-script')
<script type="text/javascript">



</script>


@endpush
