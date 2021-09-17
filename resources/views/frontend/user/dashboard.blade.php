@extends('frontend.layouts.master')

@section('content')
        <!--Body Content-->
        <div id="page-content" style="padding-top: 70px">
            <!--Page Title-->
            <div class="page section-header text-center">
                <div class="page-title">
                    <div class="wrapper"><h1 class="page-width">My Account</h1></div>
                  </div>
            </div>
            <!--End Page Title-->
            
            <div class="container">
                <div class="row">
                    @include('frontend.user.sidebar')
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-4" style="padding-top: 100px;">
                        <h2>Hello Welcome!</h2>
                        <p>Hello <strong>{{$user->full_name}}</strong> !</p>
                        <p>From here you can manage your accoutn dashboard, view recent orders, manage shipment address and see account details.</p>
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
        <!--End Body Content-->
@endsection