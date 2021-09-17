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
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                	<div class="open-hours">
                    	<strong>Billing Address</strong><br>
						Mon - Sat : 9am - 11pm<br>
						Sunday: 11am - 5pm
                    </div>
                	<hr />
                    <ul class="addressFooter">
                        <li><i class="icon icon-facebook"></i><p>{{$user->address}}</p></li>
                        <li><i class="icon anm anm-map-marker-al"></i><p>{{$user->city}} , {{$user->state}}</p></li>
                        <li><i class="icon anm anm-map-marker-al"></i><p>{{$user->country}}</p></li>
                        <li class="email"><i class="icon anm anm-envelope-l"></i><p>{{$user->email}}</p></li>
                        <li class="email"><i class="icon anm anm-envelope-l"></i><p>{{$user->postcode}}</p></li>
                    </ul>
                    <hr />
                    <ul class="list--inline site-footer__social-icons social-icons">
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Facebook"><i class="icon icon-facebook"></i></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Twitter"><i class="icon icon-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Pinterest"><i class="icon icon-pinterest"></i> <span class="icon__fallback-text">Pinterest</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Instagram"><i class="icon icon-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Tumblr"><i class="icon icon-tumblr-alt"></i> <span class="icon__fallback-text">Tumblr</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on YouTube"><i class="icon icon-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Vimeo"><i class="icon icon-vimeo-alt"></i> <span class="icon__fallback-text">Vimeo</span></a></li>
                    </ul>
                    <hr />
                    <input type="button" class="btn" data-toggle="modal" data-target="#editaddress" value="Edit Address">
                    <!-- Modal -->
                                <div class="modal fade" id="editaddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Address</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('billing.address',$user->id)}}" method="POST">
                                                @csrf
                                            <div class="modal-body">
                                            
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <textarea class="form-control" name="address">{{$user->address}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Country</label>
                                                    <input name='country' class="form-control" value="{{$user->country}}" placeholder="Country">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Post Code</label>
                                                    <input name='postcode' class="form-control" value="{{$user->postcode}} " placeholder="Postcode">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">City</label>
                                                    <input name='city' class="form-control" value="{{$user->city}}" placeholder="City">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">State</label>
                                                    <input name='state' class="form-control" value="{{$user->state}} " placeholder="State">
                                                </div>
                                            
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="open-hours">
                                            <strong>Shipping Address</strong><br>
                                            Mon - Sat : 9am - 11pm<br>
                                            Sunday: 11am - 5pm
                                        </div>
                                        <hr />
                                        <ul class="addressFooter">
                                            <li><i class="icon anm anm-map-marker-al"></i><p>{{$user->saddress}}</p></li>
                                            <li><i class="icon anm anm-map-marker-al"></i><p>{{$user->scity}} , {{$user->sstate}}</p></li>
                                            <li><i class="icon anm anm-map-marker-al"></i><p>{{$user->scountry}}</p></li>
                                            <li class="email"><i class="icon anm anm-envelope-l"></i><p>{{$user->spostcode}}</p></li>
                                        </ul>
                                        <hr />
                                        <input type="button" class="btn" data-toggle="modal" data-target="#editshippingaddress" value="Edit Address">
                                        <!-- Modal -->
                                <div class="modal fade" id="editshippingaddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Shipping Address</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('shipping.address', $user->id)}}" method="POST">
                                                @csrf
                                            <div class="modal-body">
                                            
                                                <div class="form-group">
                                                    <label for="">Shipping Address</label>
                                                    <textarea class="form-control" name="saddress">{{$user->saddress}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Shipping Country</label>
                                                    <input name='scountry' class="form-control" value="{{$user->scountry}}" placeholder="Country">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Shipping Post Code</label>
                                                    <input name='spostcode' class="form-control" value="{{$user->spostcode}} " placeholder="Postcode">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Shipping City</label>
                                                    <input name='scity' class="form-control" value="{{$user->scity}}" placeholder="City">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Shipping State</label>
                                                    <input name='sstate' class="form-control" value="{{$user->sstate}} " placeholder="State">
                                                </div>
                                            
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
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