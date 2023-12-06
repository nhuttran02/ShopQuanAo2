@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Is Admin</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="is_admin" name="is_admin"
                        {{ $user->is_admin == 1 ? 'checked' : '' }}>
                    <label for="is_admin" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_is_admin" name="is_admin"
                        {{ $user->is_admin == 0 ? 'checked' : '' }}>
                    <label for="no_is_admin" class="custom-control-label">Không</label>
                </div>
            </div>

            @if($user->is_admin == 1)
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Chọn quyền user</label>
                            <select class="form-control" name="role_id" id="role_id">
                                <option>Chọn quyền</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if($role->id == $user->role_id) selected @endif>{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            @endif

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật User</button>
        </div>
        @csrf
    </form>
@endsection

