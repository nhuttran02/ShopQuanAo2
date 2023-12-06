@extends('admin.main')

@section('content')
    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    @endpush

    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="menu">Tên</label>
                        <input type="text" name="name" required value="{{ $role->name }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="menu">List Router Admin</label>
                        <select class="form-control" required name="list_route_admin[]" id="list_route_admin">
                            @foreach($routes as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Role</button>
        </div>
        @csrf
    </form>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $('#list_route_admin').select2({
                multiple: true,
            });
            const listRouteAdmin = @json(json_decode($role->list_route_admin, true));
            $('#list_route_admin').val(listRouteAdmin).trigger('change');
        </script>
    @endpush
@endsection

