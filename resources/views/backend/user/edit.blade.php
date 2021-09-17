@extends('backend.layouts.master')

@section('content')

<div class="main-panel ">
    <div class="content-wrapper ">
      <div class="row">
          <div class="col-md-8 offset-2">
              @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li>
                            {{$error}}
                          </li>
                      @endforeach
                    </ul>
                </div>
              @endif
          </div>
<div class="col-md-8 offset-2 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Users</h4>
        <p class="card-description"> Insert information </p>
        <form action="{{route('user.update', $user->id)}}" class="forms-sample" method="POST">
            @csrf
            @method('patch')
          <div class="form-group">
            <label for="exampleInputName1">Full Name <span class="text-danger">*</span></label>
            <input type="text" name="full_name" class="form-control" id="exampleInputName1" placeholder="Full Name" value="{{$user->full_name}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">User Name</label>
            <input type="text" name="username" class="form-control" id="exampleInputName1" placeholder="User Name" value="{{$user->username}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputName1" placeholder="Enter Email" value="{{$user->email}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Phone</label>
            <input type="text" name="phone" class="form-control" id="exampleInputName1" placeholder="Enter Phone Number" value="{{$user->phone}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Address</label>
            <input type="text" name="address" class="form-control" id="exampleInputName1" placeholder="Enter Phone Number" value="{{$user->address}}">
          </div>
          <div class="form-group">
            <label for="">Role <span class="text-danger">*</span></label>
            <select name="role" class="form-control form-control-sm" >
              <option>-- Role --</option>
              <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>Admin</option>
              <option value="vendor"  {{$user->role == 'vendor' ? 'selected' : ''}}>Vendor</option>
              <option value="customer"  {{$user->role == 'customer' ? 'selected' : ''}}>Customer</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select name="status" class="form-control form-control-sm" id="exampleFormControlSelect1">
              <option>-- Status --</option>
              <option value="active" {{$user->status == 'active' ? 'selected' : ''}}>Active</option>
              <option value="inactive"  {{$user->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
            </select>
          </div>
          
          {{-- <div class="input-group">
            <span class="input-group-btn">
              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                <i class="fa fa-picture-o"></i> Choose
              </a>
            </span>
            <input id="thumbnail" class="form-control" type="text" name="filepath">
          </div> --}}
         
          <div class="form-group">
            <label>Upload</label>
            <input type="file" name="img[]" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input id="thumbnail" name="photo" value="{{$user->photo}}" type="text" class="form-control file-upload-info"  placeholder="Upload Image">
              <span class="input-group-append">
                <button id="lfm" data-input="thumbnail" data-preview="holder" class="file-upload-browse btn btn-info" type="button">Upload</button>
              </span>
            </div>
          </div>
          <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          
          <button type="submit" class="btn btn-success mr-2">Update</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
      </div>
    </div></div>
@endsection

@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
         $('#lfm').filemanager('image');
    </script>
@endsection