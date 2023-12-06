@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

{{-- section content --}}
@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">header tiêu đề của bài báo</label>
                        <input type="text" name="header" value="{{ old('header') }}" class="form-control"
                            placeholder="Nhập tiêu đề bài đăng">
                            <input type="hidden" name="id" id="id" value="{{ old('id') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>danh mục của bài báo</label>
                        <select class="form-control" name="menu_id">
                            @foreach ($dsdanhmuc as $danhmuc)
                                <option value="{{ $danhmuc->id }}">{{ $danhmuc->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>nội dung chi tiết bài báo</label>
                <textarea name="content_article" id="content_article" class="form-control ckeditor">{{ old('content_article') }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh minh họa bài báo</label>
                <input type="file" name="_linkheader_" id="linkheader" class="form-control">
                <div id="image_show">

                </div>
            </div>
            <div class="form-group">
                <label for="menu">Ảnh chi tiết báo</label>
                <input type="file" class="form-control" name="mutiImg[]" id="mutiImg" multiple/>
                <div id="image_show">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>Kích Hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                               checked="">
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label>Nổi bật</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="feature" name="feature"
                               checked="">
                        <label for="feature" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_feature" name="feature">
                        <label for="no_feature" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">thêm bài viết vào danh sách</button>
        </div>
        @csrf
    </form>
@endsection
