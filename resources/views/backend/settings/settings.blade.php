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
        <h4 class="card-title">Edit Setting</h4>
        <p class="card-description"> Insert information </p>
        <form action="{{route('setting.update')}}" class="forms-sample" method="POST">
            @method('put')
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Software Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" value="{{$setting->title}}">
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Meta Description</label>
            <textarea class="form-control" id="exampleTextarea1"  name="meta_description" rows="2">{{$setting->meta_description}}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Meta Keywords</label>
            <textarea class="form-control" id="exampleTextarea1"  name="meta_keywords" rows="2">{{$setting->meta_keywords}}</textarea>
          </div>
         
          <div class="form-group">
            <label>Logo</label>
            <input type="file" name="img[]" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input id="thumbnail" name="logo" type="text" value="{{$setting->logo}}" class="form-control file-upload-info"  placeholder="Upload Image">
              <span class="input-group-append">
                <button id="lfm" data-input="thumbnail" data-preview="holder" class="file-upload-browse btn btn-info" type="button">Upload</button>
              </span>
            </div>
          </div>
          <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          <div class="form-group">
            <label>Favicon</label>
            <input type="file" name="img[]" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input id="thumbnail1" name="favicon" type="text" value="{{$setting->favicon}}" class="form-control file-upload-info"  placeholder="Upload Image">
              <span class="input-group-append">
                <button id="lfm1" data-input="thumbnail1" data-preview="holder1" class="file-upload-browse btn btn-info" type="button">Upload</button>
              </span>
            </div>
          </div>
          <div id="holder1" style="margin-top:15px;max-height:100px;"></div>

          <div class="form-group">
            <label for="exampleInputName1">Footer <span class="text-danger">*</span></label>
            <input type="text" name="footer" class="form-control" id="exampleInputName1" placeholder="Title" value="{{$setting->footer}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Address <span class="text-danger">*</span></label>
            <input type="text" name="address" class="form-control" id="exampleInputName1" placeholder="Title" value="{{$setting->address}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" id="exampleInputName1" placeholder="Title" value="{{$setting->email}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Phone <span class="text-danger">*</span></label>
            <input type="text" name="phone" class="form-control" id="exampleInputName1" placeholder="Title" value="{{$setting->phone}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Fax <span class="text-danger">*</span></label>
            <input type="text" name="fax" class="form-control" id="exampleInputName1" placeholder="Title" value="{{$setting->fax}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Facebook Url <span class="text-danger">*</span></label>
            <input type="text" name="facebook_url" class="form-control" id="exampleInputName1" placeholder="Title" value="{{$setting->facebook_url}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Twitter Url <span class="text-danger">*</span></label>
            <input type="text" name="twitter_url" class="form-control" id="exampleInputName1" placeholder="Title" value="{{$setting->twitter_url}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Linkedin Url <span class="text-danger">*</span></label>
            <input type="text" name="linkedin_url" class="form-control" id="exampleInputName1" placeholder="Title" value="{{$setting->linkedin_url}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Pinterest Url <span class="text-danger">*</span></label>
            <input type="text" name="pinterest_url" class="form-control" id="exampleInputName1" placeholder="Title" value="{{$setting->pinterest_url}}">
          </div>
          
          
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
         $('#lfm1').filemanager('image');
    </script>
@endsection