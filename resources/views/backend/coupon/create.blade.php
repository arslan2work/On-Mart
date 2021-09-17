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
        <h4 class="card-title">Add Coupons</h4>
        <p class="card-description"> Insert information </p>
        <form action="{{route('coupon.store')}}" class="forms-sample" method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Coupon Code <span class="text-danger">*</span></label>
            <input type="text" name="code" class="form-control" id="exampleInputName1" placeholder="Code" value="{{old('code')}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Coupon Value <span class="text-danger">*</span></label>
            <input type="text" name="value" class="form-control" id="exampleInputName1" placeholder="Value" value="{{old('value')}}">
          </div>
         
          <div class="form-group">
            <label for="">Coupon Type </label>
            <select name="type" class="form-control form-control-sm" >
              <option>-- Type --</option>
              <option value="fixed" {{old('type') == 'fixed' ? 'selected' : ''}}>Fixed</option>
              <option value="percentage"  {{old('type') == 'percentage' ? 'selected' : ''}}>Percentage</option>
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
@endsection