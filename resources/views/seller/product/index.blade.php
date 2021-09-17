@extends('seller.layouts.master')

@section('content')
<div class="main-panel ">
  <div class="content-wrapper ">
    <div class="row">
  <div class="col-lg-12">
    @include('backend.layouts.notification')
  </div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><strong>Products</strong></h4>
        <table class="table table-hover">
          <thead>
            <tr>
              <th> S.N. </th>
              <th> Title </th>
              <th> Photo </th>
              <th> Price </th>
              <th> Discount </th>
              <th> size </th>
              <th> Condition </th>
              <th> Status</th>
              <th> Actions</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($products as $item)
                @php
                    $photo = explode(',', $item->photo);
                @endphp
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->title}}</td>
                    <td><img src="{{$photo[0]}}" alt="product image" style="max-height: 90px; max-width:120px "></td>
                    <td>${{number_format($item->price,2)}}</td>
                    <td>{{$item->discount}}%</td>
                    <td>{{$item->size}}</td>
                    <td>
                      @if($item->conditions == 'new')
                        <span class="badge badge-success">{{$item->conditions}}</span>
                      @elseif($item->conditions == 'popular')
                        <span class="badge badge-warning">{{$item->conditions}}</span>
                      @else
                        <span class="badge badge-primary">{{$item->conditions}}</span>
                      @endif
                    </td>
                    <td>
                      <input type="checkbox"  data-toggle="toggle" name="toggle" value="{{$item->id}}" {{$item->status == 'active' ? 'checked' : ''}} data-on="Active" data-off="Inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                    </td>
                    <td>
                      <a href="{{route('seller-product.show', $item->id)}}"   title="add-attribute" data-placement="bottom" style="width: 40px;" class="mr-1 mb-1 float-left btn btn-sm btn-outline-primary"> <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                      <a href="javascript:void(0);" data-toggle="modal" data-target="#productID{{$item->id}}"  title="view" data-placement="bottom" style="width: 40px;" class=" mb-1 float-left btn btn-sm btn-outline-primary"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                      <a href="{{route('seller-product.edit', $item->id)}}"  title="edit" data-placement="bottom" style="width: 40px;" class="float-left btn btn-sm btn-outline-warning"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
 
                      <form class="float-left " action="{{route('seller-product.destroy', $item->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="" data-toggle="tooltip" title="delete" data-id="{{$item->id}}" data-placement="bottom" style="width: 40px;" class="dltBtn ml-1 btn btn-sm btn-outline-danger"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                      </form>
                    </td>

                    <!-- Modal -->
                      <div class="modal fade" id="productID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          @php
                             $product = \App\Models\Product::where('id', $item->id)->first();
                          @endphp
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">{{\Illuminate\Support\Str::upper($product->title)}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <strong>Summary:</strong>
                              <p>{!! html_entity_decode($product->summary) !!}</p>
                              <strong>Description:</strong>
                              <p>{!! html_entity_decode($product->description) !!}</p>
                              
                              

                              <div class="row">
                                <div class="col-md-6">
                                  <strong>Price:</strong>
                                  <p>${{number_format($product->price)}}</p>
                                </div>
                                <div class="col-md-6">
                                  <strong>Offer Price:</strong>
                                  <p>${{number_format($product->offer_price)}}</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <strong>Category:</strong>
                                  <p>{{\App\Models\Category::where('id',$product->cat_id)->value('title')}}</p>
                                </div>
                                <div class="col-md-6">
                                  <strong>Child Category:</strong>
                                  <p>{{\App\Models\Category::where('id',$product->child_cat_id)->value('title')}}</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <strong>Brand:</strong>
                                  <p>{{\App\Models\Brand::where('id',$product->brand_id)->value('title')}}</p>
                                </div>
                                <div class="col-md-6">
                                  <strong>Size:</strong>
                                  <p class="badge badge-success">{{$product->size}}</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <strong>Condition:</strong>
                                  <p class="badge badge-primary">{{$product->conditions}}</p>
                                </div>
                                <div class="col-md-6">
                                  <strong>Status:</strong>
                                  <p class="badge badge-warning">{{$product->status}}</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <strong>Discount:</strong>
                                  <p>{{$product->discount}}%</p>
                                </div>
                                <div class="col-md-6">
                                  <strong>Stock:</strong>
                                  <p>{{$product->stock}}</p>
                                </div>
                              </div>
                                  <strong>Vendor:</strong>
                                  <p>{{\App\Models\User::where('id', $product->vendor_id)->value('full_name')}}</p>
                              
                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
    </div></div></div>
    
@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
    <script>
      $('input[name=toggle]').change(function () {
        var mode = $(this).prop('checked');
        var id = $(this).val();
        // alert(id);
        $.ajax({
          url:"{{route('seller.product.status')}}",
          type:"POST",
          data:{
            _token: '{{csrf_token()}}',
            mode: mode,
            id: id,
          },
          success: function(response){
            if(response.status) {
              alert(response.msg);
            }
            else{
              alert('Please try again');
            }
          }
        })
      });
    </script>
@endsection