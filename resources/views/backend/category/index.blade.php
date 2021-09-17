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
        <h4 class="card-title"><strong>Categories</strong></h4>
        <table class="table table-hover">
          <thead>
            <tr>
              <th> S.N. </th>
              <th> Title </th>
              <th> Photo </th>
              <th> Is Parent </th>
              <th> Parents </th>
              <th> Status</th>
              <th> Actions</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($categories as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->title}}</td>
                    <td><img src="{{$item->photo}}" alt="banner image" style="max-height: 90px; max-width:120px "></td>
                    <td>
                      {{$item->is_parent === 1 ? 'Yes' : 'No'}}
                    </td>
                    <td>
                      {{\App\Models\Category::where('id', $item->parent_id)->value('title')}}
                    </td>
                    <td>
                      <input type="checkbox"  data-toggle="toggle" name="toggle" value="{{$item->id}}" {{$item->status == 'active' ? 'checked' : ''}} data-on="Active" data-off="Inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                    </td>
                    <td>
                      <a href="{{route('category.edit', $item->id)}}"  title="edit" data-placement="bottom" style="width: 40px;" class="float-left btn btn-sm btn-outline-warning"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
 
                      <form class="floar-left " action="{{route('category.destroy', $item->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="" data-toggle="tooltip" title="delete" data-id="{{$item->id}}" data-placement="bottom" style="width: 40px;" class="dltBtn ml-1 btn btn-sm btn-outline-danger"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                      </form>
                    </td>
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
          url:"{{route('category.status')}}",
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