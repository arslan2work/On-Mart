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
        <h4 class="card-title">Edit Banners</h4>
        <p class="card-description"> Insert information </p>
        <form action="{{route('banner.update', $banner->id)}}" class="forms-sample" method="POST">
            @csrf
            @method('patch')
          <div class="form-group">
            <label for="exampleInputName1">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" value="{{$banner->title}}">
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <textarea class="form-control" id="exampleTextarea1" placeholder="Write some text..." name="description" rows="2">{{$banner->description}}</textarea>
          </div>
          <div class="form-group">
            <label for="">Condition </label>
            <select name="condition" class="form-control form-control-lg" >
              <option>-- Condition --</option>
              <option value="banner" {{$banner->condition == 'banner' ? 'selected' : ''}}>Banner</option>
              <option value="promo"  {{$banner->condition == 'promo' ? 'selected' : ''}}>Promote</option>
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
              <input id="thumbnail" name="photo" type="text" class="form-control file-upload-info" value="{{$banner->photo}}"  placeholder="Upload Image">
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