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
        <h4 class="card-title">Edit Products</h4>
        <p class="card-description"> Insert information </p>
        <form action="{{route('product.update',$product->id)}}" class="forms-sample" method="POST">
            @csrf
            @method('patch')
          <div class="form-group">
            <label for="exampleInputName1">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" value="{{$product->title}}">
          </div>

          <div class="form-group">
            <label for="summary">Summary</label>
            <textarea class="form-control" id="summary" placeholder="Write some text..." name="summary" rows="2">{{$product->summary}}</textarea>
          </div>

          <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <textarea class="form-control" id="exampleTextarea1" placeholder="Write some text..." name="description" rows="2">{{$product->description}}</textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Stock <span class="text-danger">*</span></label>
            <input type="number" name="stock" class="form-control" id="exampleInputName1" placeholder="Stock" value="{{$product->stock}}">
          </div>
          
          <div class="form-group">
            <label for="exampleInputName1">Price <span class="text-danger">*</span></label>
            <input type="number" name="price" step="any" class="form-control" id="exampleInputName1" placeholder="Price" value="{{$product->price}}">
          </div>
          
          <div class="form-group">
            <label for="exampleInputName1">Discount</label>
            <input type="number" min="0" max="100" name="discount" step="any" class="form-control" id="exampleInputName1" placeholder="Dsicount" value="{{$product->discount}}">
          </div>

          <div class="form-group">
            <label for="">Brands </label>
            <select name="brand_id" class="form-control form-control-sm" >
              <option>-- Brands --</option>
              @foreach (\App\Models\Brand::get()  as $brand)
                  <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' : ''}}>{{$brand->title}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Category </label>
            <select id="cat_id" name="cat_id" class="form-control form-control-sm" >
              <option>-- Category --</option>
              @foreach (\App\Models\Category::where('is_parent', 1)->get()  as $cat)
                  <option value="{{$cat->id}}" {{$cat->id == $product->cat_id ? 'selected' : ''}}>{{$cat->title}}</option>
              @endforeach
            </select>
          </div>
          
          <div class="form-group d-none" id="child_cat_div">
            <label for="">Child Category </label>
            <select id="child_cat_id" name="child_cat_id" class="form-control form-control-sm" >
            </select>
          </div>

          <div class="form-group">
            <label for="">Size </label>
            <select name="size" class="form-control form-control-sm" >
              <option>-- Size --</option>
              <option value="S" {{$product->size == 'S' ? 'selected' : ''}}>Small</option>
              <option value="M"  {{$product->size == 'M' ? 'selected' : ''}}>Medium</option>
              <option value="L"  {{$product->size == 'L' ? 'selected' : ''}}>Large</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Conditions </label>
            <select name="conditions" class="form-control form-control-sm" >
              <option>-- Conditions --</option>
              <option value="new" {{$product->conditions == 'new' ? 'selected' : ''}}>New</option>
              <option value="popular"  {{$product->conditions == 'popular' ? 'selected' : ''}}>Popular</option>
              <option value="winter"  {{$product->conditions == 'winter' ? 'selected' : ''}}>Winter</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Vendors </label>
            <select name="vendor_id" class="form-control form-control-sm" >
              <option>-- Vendors --</option>
              @foreach (\App\Models\User::where('role', 'vendor')->get()  as $vendor)
                  <option value="{{$vendor->id}}" {{$vendor->id == $product->vendor_id ? 'selected' : ''}}>{{$vendor->full_name}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="exampleTextarea1">Return Policy</label>
            <textarea class="form-control description" id="exampleTextarea1" placeholder="Write some text..." name="return_cancellation" rows="2">{{$product->return_cancellation}}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Additional information</label>
            <textarea class="form-control description" id="exampleTextarea1" placeholder="Write some text..." name="additional_info" rows="2">{{$product->additional_info}}</textarea>
          </div>


          <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select name="status" class="form-control form-control-sm" id="exampleFormControlSelect1">
              <option>-- Status --</option>
              <option value="active" {{$product->status == 'active' ? 'selected' : ''}}>Active</option>
              <option value="inactive"  {{$product->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
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
              <input id="thumbnail" name="photo" type="text" class="form-control file-upload-info" value="{{$product->photo}}"  placeholder="Upload Image">
              <span class="input-group-append">
                <button id="lfm" data-input="thumbnail" data-preview="holder" class="file-upload-browse btn btn-info" type="button">Upload</button>
              </span>
            </div>
          </div>
          <div id="holder" style="margin-top:15px;max-height:100px;"></div>

          <div class="form-group">
            <label>Size Guide</label>
            <input type="file" name="img[]" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input id="thumbnail1" name="size_guide" type="text" class="form-control file-upload-info" value="{{$product->size_guide}}"  placeholder="Upload Image">
              <span class="input-group-append">
                <button id="lfm1" data-input="thumbnail1" data-preview="holder1" class="file-upload-browse btn btn-info" type="button">Upload</button>
              </span>
            </div>
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
         $('#lfm, #lfm1').filemanager('image');
    </script>
    <script>
      var child_cat_id = {{$product->child_cat_id}};
      $('#cat_id').change(function () {
        var cat_id = $(this).val();
        // alert(cat_id);
        if(cat_id != null){
          $.ajax({
            url:"/admin/category/"+cat_id+"/child",
            type:"POST",
            data: {
              _token: "{{csrf_token()}}",
              cat_id: cat_id,
            },
            success:function(response){
              var html_option = "<option value=''>--- Child Category ---</option>";
              if(response.status){
                $('#child_cat_div').removeClass('d-none');
                $.each(response.data, function (id,title) { 
                  html_option += "<option value='"+id+"' "+(child_cat_id == id ? 'selected' : '')+">"+title+"</option>"
                });
              }
              else{
                $('#child_cat_div').addClass('d-none');
              }
              $('#child_cat_id').html(html_option);
            }
          });
        }
      });
      if(child_cat_id != null){
        $('#cat_id').change();
      }
    </script>
@endsection