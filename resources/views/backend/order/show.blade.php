@extends('backend.layouts.master')

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
        <h4 class="card-title"><strong>Order List</strong></h4>
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Payment Method</th>
                <th>Payment Status</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                  <tr>
                    <td>{{$order->first_name}} {{$order->last_name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->payment_method == 'cod' ? "Cash On Demand" : $order->payment_method}}</td>
                    <td>{{ucfirst($order->payment_status)}}</td>
                    <td>${{number_format($order->total_amount,2)}}</td>
                    <td>
                      <span class="badge 
                      @if ($order->condition = 'pending')
                      badge-info
                      @elseif($order->condition = 'processing')
                      badge-primary
                      @elseif($order->condition = 'delivered')
                      badge-success
                      @else
                      badge-danger
                      @endif
                          ">{{$order->condition}}</span>
                    </td>
                    <td>
                      <a href="{{route('coupon.edit', $order->id)}}"  title="download" data-placement="bottom" style="width: 40px;" class="float-left btn btn-sm btn-outline-warning"> <i class="fa fa-download" aria-hidden="true"></i></a>
                      <form class="float-left " action="{{route('order.destroy', $order->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="" data-toggle="tooltip" title="delete" data-id="{{$order->id}}" data-placement="bottom" style="width: 40px;" class="dltBtn ml-1 btn btn-sm btn-outline-danger"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                      </form>
                    </td>
                  </tr>
            </tbody>
          </table>



          <table class="table table-striped table-hover my-5">
            <thead>
              <tr>
                <th>S.N</th>
                <th>Product Image</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order->products as $item)
               <tr>
                 <td></td>
                <td><img src="{{$item->photo}}" alt="photo" style="max-width: 100px;"></td>
                <td>{{$item->title}}</td>
                <td>{{$item->pivot->quantity}}</td>
                <td>${{number_format($item->price,2)}}</td>
               </tr>
                  
              @endforeach
            </tbody>
          </table>

          <div class="row">
            <div class="col-7">
              
            </div>
            <div class="col-5 border p-3">
              <p>
                <strong>Subtotal</strong>: ${{number_format($order->sub_total,2)}}
              </p>
              @if ($order->delivery_charge > 0)
              <p>
                <strong>Shipping Cost</strong>: ${{number_format($order->delivery_charge,2)}}
              </p>
              @endif
              @if ($order->coupon > 0)
                <p>
                  <strong>Coupon</strong>: ${{number_format($order->sub_total,2)}}
                </p>
              @endif
              <p>
                <strong>Total</strong>: ${{number_format($order->total_amount,2)}}
              </p>
              <form action="{{route('order.status', $order->id)}}" method="POST">
                @csrf
                <input type="hidden" name="order_id" value="{{$order->id}}">
                <strong>Status</strong>
                <select name="condition" class="form-control" id="">
                    <option value="pending" {{$order->condition == 'pending' ? 'selected' : ''}}>Pending</option>
                    <option value="processing" {{$order->condition == 'processing' ? 'selected' : ''}}>Processing</option>
                    <option value="delivered" {{$order->condition == 'delivered' ? 'selected' : ''}}>Delivered</option>
                    <option value="cancelled" {{$order->condition == 'cancelled' ? 'selected' : ''}}>Cancelled</option>
                </select>
                <button type="submit" class="btn btn-sm btn-success mt-3">Update</button>
              </form>
            </div>
          </div>
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
          url:"{{route('coupon.status')}}",
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