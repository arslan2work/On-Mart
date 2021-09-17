@extends('frontend.layouts.master')

@section('content')
        <!--Body Content-->
        <div id="page-content" style="margin-top: 70px;">
            <!--Page Title-->
            <div class="page section-header text-center">
                <div class="page-title">
                    <div class="wrapper"><h1 class="page-width">Order Complete</h1></div>
                  </div>
            </div>
            <!--End Page Title-->

            <div class="container">
                <div class="row">
                    <div class="offset-1 col-md-10 " style="border:5px solid #46c2e8 ">
                        <div style="margin: 50px;">
                            <h5>Thank You For Completing Your Order</h5>
                            <p>You will reieve the email for your details</p>
                            <p>Your Order Id: <strong>#{{$order}}</strong></p>
                        </div>
                        <div class="order-button-payment" style="float: right; margin-bottom:30px; margin-right:30px;">
                            <a  class="btn mr-3" style="color:white;">Review</a>
                            <a href="{{route('home')}}" class="btn" style="color:white;" >Home</a>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
@endsection