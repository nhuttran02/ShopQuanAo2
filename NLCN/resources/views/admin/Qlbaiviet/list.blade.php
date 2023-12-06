@php use App\Helpers\Helper; @endphp
@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th> Tiêu đề</th>
            <th>Danh Mục</th>
            <th>Mô tả</th>
            <th>Active</th>
            <th>Feature</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $key => $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->header }}</td>
                <td>{{ $article->menu ? $article->menu->name : "Không có danh mục" }}</td>
                <td>{{ $article->description }}</td>
                <td>{!! Helper::active($article->active) !!}</td>
                <td>{!! Helper::active($article->feature) !!}</td>
                <td>{{ $article->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/Qlbaiviet/edit/{{ $article->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $article->id }}, '/admin/Qlbaiviet/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $articles->links() !!}
    </div>

@endsection
