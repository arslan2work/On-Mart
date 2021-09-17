@extends('backend.layouts.master')

@section('content')
<div class="main-panel ">
  <div class="content-wrapper ">
    <div class="row">
  <div class="col-lg-12">
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
    @include('backend.layouts.notification')
  </div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><strong>{{$product->title}}</strong></h4>
        <div class="row">
            <div class="col-md-7">
              <form action="{{route('product.attribute', $product->id)}}" method="POST">
                @csrf
                <div id="product-attribute" class="content" data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}'>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" id="btnAdd-1" class="btn btn-sm my-2 btn-primary">
                                <i class="fa fa-plus-circle"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row group mt-3">
                        <div class="col-md-2">
                          <label for="">Size</label>
                            <input class="form-control form-control-sm" name="size[]" placeholder="eg. S" type="text">
                        </div>
                        <div class="col-md-3">
                          <label for="">Original Price</label>
                            <input class="form-control form-control-sm" name="original_price[]" step="any" placeholder="eg .1200" type="number">
                        </div>
                        <div class="col-md-3">
                          <label for="">Offer Price</label>
                            <input class="form-control form-control-sm" name="offer_price[]" step="any" placeholder="eg .1200" type="number">
                        </div>
                        <div class="col-md-2">
                          <label for="">Stock</label>
                            <input class="form-control form-control-sm" name="stock[]" placeholder="eg .4" type="number">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class=" mt-4 btn btn-sm btn-danger btnRemove"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                  </div>
                  <button type="submit" class=" mt-3 btn btn-sm btn-info">Submit</button>
              </form>
            </div>
            <div class="col-md-5">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th> Size </th>
                      <th> Original </th>
                      <th> Offer </th>
                      <th> Stock </th>
                      <th> Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if (count($productattr) > 0)
                          @foreach($productattr as $item)
                            <tr>
                              <td>
                                {{$item->size}}
                              </td>
                              <td>
                                $ {{$item->original_price}}
                              </td>
                              <td>
                                $ {{$item->offer_price}}
                              </td>
                              <td>
                                {{$item->stock}}
                              </td>
                              <td>
                                <form class="float-left " action="{{route('product.attribute.destroy', $item->id)}}" method="POST">
                                  @csrf
                                  @method('delete')
                                  <a href="" data-toggle="tooltip" title="delete" data-id="{{$item->id}}" data-placement="bottom" style="width: 40px;" class="dltBtn ml-1 btn btn-sm btn-outline-danger"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                      @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
    </div></div></div>
    
@endsection

@section('scripts')
<script src="{{asset('backend/assets/js/jquery.multifield.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('#product-attribute').multifield();
</script>
    <script>
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('.dltBtn').click(function (e) {
        var form = $(this).closest('form');
        var dataID = $(this).data('id');
        e.preventDefault();
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });
      });
    </script>
@endsection