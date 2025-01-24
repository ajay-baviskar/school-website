@extends('layouts.main')

@section('m1','Application')
@section('m2','SELECT THE BELOW APP TO CONTINUE')
@section('title','Application')
@section('content')
<style type="text/css">
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:40px;
/*        background-color:#25d366;*/
/*        color:#FFF;*/
        border-radius:50px;
        text-align:center;
        font-size:30px;
        box-shadow: 2px 2px 3px #999;
        z-index:100;
    }

    .my-float{
        margin-top:16px;
    }
</style>

@section('content')

<!-- <div class="row justify-content-center">
    <div class="checkout-tabs"> -->
        <div class="row">
            @foreach($application_data as $value)
            
            <div class="col-lg-2 col-6 mb-3">
               
                <div class="card">
                <div class="card-body p-4">
                    <div class="text-center mb-3">
                        <a href="{{url('home')}}?app_id={{$value->id}}" class="text-body">
                        <img src="{{ asset($value->photo) }}" alt="" 
                        style="width:100%;" 
                        class="avatar-sm_old"
                        >
                        
                            <h5 class="mt-4 mb-2 font-size-15">{{$value->name}}</h5>
                        </a>
                    </div>
                </div>
            </div>
                <!--end card-->
            </div>
            <!-- <div class="col-md-6 nav nav-pills" >
                <a class="nav-link active" id="v-pills-gen-ques-tab" style="width:100%;" href="{{url('home')}}?app_id={{$value->id}}" >
                    <br>
                    <p class="fw-bold mb-4">{{$value->name}}</p>
                </a>
            </div> -->
            @endforeach
        <!-- </div>
    </div> -->
</div>
@endsection
