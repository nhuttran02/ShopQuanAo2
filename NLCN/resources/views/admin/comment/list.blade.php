@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Bài viết</th>
            <th>Người bình luận</th>
            <th>Nội dung</th>
            <th>Ngày gửi</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $key => $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->article->header ?? "" }}</td>
                <td>{{ $comment->user->name ?? ""}}</td>
                <td>{{ $comment->content }}</td>
                <td>{{ $comment->created_at }}</td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $comment->id }}, '/admin/comments/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $comments->links() !!}
    </div>
@endsection


