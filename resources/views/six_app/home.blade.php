@extends('layouts.six_main')

@section('m1','Dashboard')
@section('m2','Dashboard')
@section('title',$title)
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
@role('6S Champion')
<div class="row">
    <div class="my-float float">
        <a class="float btn btn-primary" href="{{ route('audit-card.create') }}">
            <i class="bx bx-plus-medical font-size-24"></i>
        </a>
    </div>
</div>
@endrole
@endsection
@section('css')
<!-- DataTables -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  -->
@endsection
@section('js')
 
@endsection
