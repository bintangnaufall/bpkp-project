@extends('layout.main')

@section('css')

<link href="{{ asset('assets/css/app.min.css') }}" id="app-stylesheet" rel="stylesheet" type="text/css" />

<style>
    .card {
        background-color: #191C24 !important;
    }
    .header-title {
        font-size: 1rem;
        margin: 0 0 7px 0;
    }
    .card-box {
        background-color: #191C24;
        padding: 1.5rem;
        -webkit-box-shadow: 0 0.75rem 6rem rgba(56,65,74,.03);
        box-shadow: 0 0.75rem 6rem rgba(56,65,74,.03);
        margin-bottom: 24px;
        border-radius: 0.25rem;
    }
    .font-weight-normal {
        font-weight: 400!important;
    }
    .pt-2, .py-2 {
        padding-top: 0.75rem!important;
    }

    .mb-1, .my-1 {
        margin-bottom: 0.375rem!important;
    }
</style>
@endsection

@section('content')
<h1>Score Box</h1>

<div class="col-xl-3 col-md-6 mx-3">
    <div class="card-box">

        <h4 class="header-title mt-0 mb-2 text-center">Total Surat</h4>

        <div class="widget-chart-1 ">
            <div class="widget-detail-1 text-center">
                <h2 class="font-weight-normal pt-2 mb-1"> 256 </h2>
                <p class="text-muted mb-1">Revenue today</p>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
 <!-- Vendor js -->
 <script src="{{ asset('assets/js/vendor.min.js')}}"></script>

 <!-- knob plugin -->
 <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>

 <!--Morris Chart-->
 <script src="{{ asset('assets/libs/morris-js/morris.min.js')}}"></script>
 <script src="{{ asset('assets/libs/raphael/raphael.min.js')}}"></script>

 <!-- Dashboard init js-->
 <script src="{{ asset('assets/js/pages/dashboard.init.js')}}"></script>

 <!-- App js -->
<script src="{{ asset('assets/js/app.min.js')}}"></script>

{{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> --}}
@endsection