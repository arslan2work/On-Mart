@extends('frontend.layouts.master')

@section('content')
    <!--Body Content-->
    <div id="page-content" style="margin-top: 70px!important;">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Create an Account</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                	<div class="mb-4">
                       <form method="post" action="{{route('register.submit')}}" id="CustomerLoginForm"  class="contact-form">	
                        {{csrf_field()}}
                          <div class="row">
	                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="FirstName">Full Name</label>
                                    <input type="text" name="full_name" placeholder="" id="FirstName" value="{{old('full_name')}}" autofocus="">
                                    @error('full_name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                               </div>
                               <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="LastName">User Name</label>
                                    <input type="text" name="username" placeholder="" id="LastName" value="{{old('username')}}">
                                    @error('username')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                               </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerEmail">Email</label>
                                    <input type="email" name="email" placeholder="" id="CustomerEmail" value="{{old('email')}}" class="" autocorrect="off" autocapitalize="off" autofocus="">
                                    @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Password</label>
                                    <input type="password" value="" name="password"  placeholder="" id="CustomerPassword" class="">       
                                    @error('password')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror                 	
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Confirm Password</label>
                                    <input type="password" value="" name="password_confirmation"  placeholder="" id="CustomerPassword" class="">  
                                    @error('password_confirmation')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror                      	
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" value="Create">
                            </div>
                         </div>
                     </form>
                    </div>
               	</div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
@endsection