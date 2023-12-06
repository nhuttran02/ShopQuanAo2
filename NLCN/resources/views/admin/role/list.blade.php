@extends('admin.main')

@section('content')
    <a class="btn btn-outline-primary w-25 m-2" href="/admin/roles/add">Tạo mới</a>
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên</th>
            <th>Ngày tạo</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->created_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/roles/edit/{{ $role->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $role->id }}, '/admin/roles/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $roles->links() !!}
@endsection


