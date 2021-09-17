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
        <h4 class="card-title">Edit Currency</h4>
        <p class="card-description"> Insert information </p>
        <form action="{{route('currency.update', $currency->id)}}" class="forms-sample" method="POST">
            @csrf
            @method('patch')
          <div class="form-group">
            <label for="exampleInputName1">Currency Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="eg. Dollar" value="{{$currency->name}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Currency Symbol <span class="text-danger">*</span></label>
            <input type="text" name="symbol" class="form-control" id="exampleInputName1" placeholder="eg. $" value="{{$currency->symbol}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Exchange rate <span class="text-danger">*</span></label>
            <input type="number" step="any" name="exchange_rate" class="form-control" id="exampleInputName1" placeholder="eg. 123" value="{{$currency->exchange_rate}}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Currency Code <i class="fas fa-code-branch    "></i> <span class="text-danger">*</span></label>
            <input type="text" name="code" class="form-control" id="exampleInputName1" placeholder="eg.USD" value="{{$currency->code}}">
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