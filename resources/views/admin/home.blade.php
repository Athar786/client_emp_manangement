@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in AS a Admin!') }}

                    <a href="{{route('emp.create')}}" class="btn btn-primary">Employee Create</a>

                    <!-- <table class="table table-bordered emp-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table> -->


                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr> 
                        </thead>
                        <tbody>
                        @if(count($data) > 0)
                            @foreach($data as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td>NO data found</td>
                        </tr>
                        @endif
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(function () {
    
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    });

    // var table = $('.emp-data-table').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: "{{ route('admin.home') }}",
    //     columns: [
    //         {data: 'id', name: 'id'},
    //         {data: 'name', name: 'name'},
    //         {data: 'email', name: 'email'},
    //         {data: 'phone', name: 'phone'},
    //         {data: 'status', name: 'status'},
    //     ]
    // });
      
  });
</script>
@endsection
