@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Is Admin</th>
            <th>Ngày tạo</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{!! \App\Helpers\Helper::active($user->is_admin) !!}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/users/edit/{{ $user->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    @if($user->id != auth()->user()->getKey())
                        <a href="#" class="btn btn-danger btn-sm"
                           onclick="removeRow({{ $user->id }}, '/admin/users/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $users->links() !!}
@endsection


