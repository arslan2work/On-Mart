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
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Payment Method</th>
                <th> Payment Status</th>
                <th> Status</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($orders as $order)
              <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$order->first_name}} {{$order->last_name}}</td>
                  <td>{{$order->email}}</td>
                  <td>{{$order->payment_method == 'cod' ? "Cash On Demand" : $order->payment_method}}</td>
                  <td>{{ucfirst($order->payment_status)}}</td>
                  <td>{{$order->total_amount}}</td>
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
                    <a href="{{route('order.show', $order->id)}}"  title="view" data-placement="bottom" style="width: 40px;" class="float-left btn btn-sm btn-outline-warning"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                    <form class="float-left " action="{{route('order.destroy', $order->id)}}" method="POST">
                      @csrf
                      @method('delete')
                      <a href="" data-toggle="tooltip" title="delete" data-id="{{$order->id}}" data-placement="bottom" style="width: 40px;" class="dltBtn ml-1 btn btn-sm btn-outline-danger"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                    </form>
                  </td>
                </tr>
              @empty
              <tr>
                  <td colspan="8" class="text-center"> No Orders</td>
              </tr>
              @endforelse
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