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
        <h4 class="card-title">Edit Category</h4>
        <p class="card-description"> Insert information </p>
        <form action="{{route('category.update', $category->id)}}" class="forms-sample" method="POST">
            @csrf
            @method('patch')

            <div class="form-group">
              <label for="exampleInputName1">Title <span class="text-danger">*</span></label>
              <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" value="{{$category->title}}">
            </div>
            <div class="form-group">
              <label for="exampleTextarea1">Summary</label>
              <textarea class="form-control" id="exampleTextarea1" placeholder="Write some text..." name="summary" rows="2">{{$category->summary}}</textarea>
            </div>
            
            <div class="form-group">
              <label for="is_parent">Is Parent</label>
              <input id="is_parent" class="ml-4" type="checkbox" name="is_parent" value="1" {{$category->is_parent == 1 ? 'checked' : ''}}  > Yes
            </div>
  
            <div class="form-group {{$category->is_parent == 1 ? 'd-none' : ''}}" id="parent_cat_div">
              <label for="parent_id">Parent Category</label>
              <select name="parent_id" class="form-control form-control-sm" >
                <option value="">-- Parent Category --</option>
                @foreach ($parent_cats as $pcats)
                    <option value="{{$pcats->id}}" {{$pcats->id == $category->parent_id ? 'selected' : ''}}>{{$pcats->title}}</option>
                @endforeach
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
                <input id="thumbnail" name="photo" type="text" value="{{$category->photo}}" class="form-control file-upload-info"  placeholder="Upload Image">
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
    <script>
      $('#is_parent').change(function (e) {
        e.preventDefault();
        var is_checked = $('#is_parent').prop('checked');
        // alert(is_checked);
        if(is_checked){
          $('#parent_cat_div').addClass('d-none');
          $('#parent_cat_div').val('');
        }
        else{
          $('#parent_cat_div').removeClass('d-none');
        }
      })
    </script>
@endsection