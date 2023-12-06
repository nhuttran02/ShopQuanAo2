@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Nội dung</th>
            <th>Ngày gửi</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $key => $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at }}</td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $contact->id }}, '/admin/contact/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $contacts->links() !!}
    </div>
@endsection


