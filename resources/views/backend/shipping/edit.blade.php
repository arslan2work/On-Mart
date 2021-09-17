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
        <form action="{{route('shipping.update', $shipping->id)}}" class="forms-sample" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
              <label for="exampleInputName1">Shipping Address <span class="text-danger">*</span></label>
              <input type="text" name="shipping_address" class="form-control" id="exampleInputName1" placeholder="Shipping Address" value="{{$shipping->shipping_address}}">
            </div>
            <div class="form-group">
              <label for="exampleInputName1">Delivery Time <span class="text-danger">*</span></label>
              <input type="text" name="delivery_time" class="form-control" id="exampleInputName1" placeholder="Delivery Time" value="{{$shipping->delivery_time}}">
            </div>
            <div class="form-group">
              <label for="exampleInputName1">Delivery Charge <span class="text-danger">*</span></label>
              <input type="text" name="delivery_charge" class="form-control" id="exampleInputName1" placeholder="Delivery Charge" value="{{$shipping->delivery_charge}}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Status</label>
              <select name="status" class="form-control form-control-sm" id="exampleFormControlSelect1">
                <option>-- Status --</option>
                <option value="active" {{$shipping->status == 'active' ? 'selected' : ''}}>Active</option>
                <option value="inactive"  {{$shipping->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
              </select>
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
    </script>
@endsection