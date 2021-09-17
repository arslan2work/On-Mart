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
        <h4 class="card-title">Add Categeries</h4>
        <p class="card-description"> Insert information </p>
        <form action="{{route('category.store')}}" class="forms-sample" method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" value="{{old('title')}}">
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Summary</label>
            <textarea class="form-control" id="exampleTextarea1" placeholder="Write some text..." name="summary" rows="2">{{old('summary')}}</textarea>
          </div>
          
          <div class="form-group">
            <label for="is_parent">Is Parent</label>
            <input id="is_parent" class="ml-4" type="checkbox" value="1" name="is_parent" checked> Yes
          </div>

          <div class="form-group d-none" id="parent_cat_div">
            <label for="parent_id">Parent Category</label>
            <select name="parent_id" class="form-control form-control-sm" >
              <option value="">-- Parent Category --</option>
              @foreach ($parent_cats as $pcats)
                  <option value="{{$pcats->id}}" {{old('parent_id') == $pcats->id ? 'selected' : ''}}>{{$pcats->title}}</option>
              @endforeach
            </select>
          </div>
          
          <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select name="status" class="form-control form-control-sm" id="exampleFormControlSelect1">
              <option>-- Status --</option>
              <option value="active" {{old('status') == 'active' ? 'selected' : ''}}>Active</option>
              <option value="inactive"  {{old('status') == 'inactive' ? 'selected' : ''}}>Inactive</option>
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
              <input id="thumbnail" name="photo" type="text" class="form-control file-upload-info"  placeholder="Upload Image">
              <span class="input-group-append">
                <button id="lfm" data-input="thumbnail" data-preview="holder" class="file-upload-browse btn btn-info" type="button">Upload</button>
              </span>
            </div>
          </div>
          <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          
          <button type="submit" class="btn btn-success mr-2">Submit</button>
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