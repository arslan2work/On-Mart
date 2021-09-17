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
                            <!--Body Content-->
    <div id="page-content">
    	
        
        <div class="container">
            <div class="row">
            	<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4">
                	<h2>User Account</h2>
                    <p>Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500 </p>
                	<div class="formFeilds contact-form form-vertical">
                      <form action="{{route('update.account', $user->id)}}" method="post"  id="contact_form" class="contact-form">	
                        @csrf
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        	<div class="form-group">
                            <label for="ContactFormName">Full Name</label>
                          	<input type="text" id="ContactFormName" name="full_name" value="{{$user->full_name}}" placeholder="full name" >
                              @error('full_name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        	<div class="form-group">
                            <label for="ContactFormEmail">User Name</label>
							<input type="txt" id="ContactFormEmail" name="username" value="{{$user->username}}"  placeholder="anything" >  
                            @error('username')
                                <p class="text-danger">{{$message}}</p>
                            @enderror                      	
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          	<div class="form-group">
                                <label for="ContactFormPhone">Phone Number</label>
                            <input  type="tel" id="ContactFormPhone" name="phone" pattern="[0-9\-]*" placeholder="9845345634" value="{{$user->phone}}">
                            @error('phone')
                                <p class="text-danger">{{$message}}</p>
                            @enderror 
                            </div>
                          </div>
                          <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          	<div class="form-group">
                                <label for="ContactSubject">Email Address</label>
                            <input  type="email" id="ContactSubject" name="email" placeholder="Email" disabled value="{{$user->email}}">
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror 
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                              <label for="ContactSubject">Current Password (Leave blank to leave unchanged)</label>
                                <input  type="password" id="ContactSubject" name="oldpassword">
                          </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                              <label for="ContactFormPhone">New Password</label>
                                <input  type="password" id="ContactFormPhone" name="newpassword" >
                          </div>
                        </div>
                        
                      </div>
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="submit" class="btn" value="Send Message">
                        </div>
                     </div>
                     </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
                    </div>
                    
                </div>
            </div>
            
        </div>
        <!--End Body Content-->
@endsection