@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">user</div>
                    <div class="card-body">
                        <a href="{{ url('user-create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive" >
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>role</th>
                                    <th>status</th>
                                    <th class="text-centre">on/off</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role_as }}</td>
                                        <td> <input  type="checkbox" class="toggle-class" data-id="{{ $item->id }}" onclick="return confirm('Are you Sure?')" data-toggle="toggle" data-style="slow" data-on="Enabled" data-off="Disabled" {{ $item->status == true ? 'checked' : ''}}></td>

                                        <td class="text-centre">
                                            @if ($item->isUserOnline())
                                                <li class="text-success">
                                                    Online
                                                </li>
                                            @else
                                                <li class="text-warning">
                                                   Offline
                                               </li>
                                            @endif
                                        </td>

                                        <td>

                                            <a href="{{ url('/user-liste'. '/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/user-liste'. '/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/user-liste' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
</script>


<script>
    $(document).ready(function(){
    $('.toggle-class').on('change', function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var user_id = $(this).data('id');
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: '{{ route('changeStatus') }}',
            data: {
                'status': status,
                'user_id': user_id
            },
            success:function(data) {
                $('#notifDiv').fadeIn();
                $('#notifDiv').css('background', 'green');
                $('#notifDiv').text('Status Updated Successfully');
                setTimeout(() => {
                    $('#notifDiv').fadeOut();
                }, 3000);
            }
        });
    });
});
</script>


@endpush
