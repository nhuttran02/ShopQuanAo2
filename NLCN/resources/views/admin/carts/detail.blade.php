@extends('admin.main')

@section('content')
    <div class="customer mt-3">
        <ul>
            <li>Tên khách hàng: <strong>{{ $customer->name }}</strong></li>
            <li>Số điện thoại: <strong>{{ $customer->phone }}</strong></li>
            <li>Địa chỉ: <strong>{{ $customer->address }}</strong></li>
            <li>Email: <strong>{{ $customer->email }}</strong></li>
            <li>Ghi chú: <strong>{{ $customer->content }}</strong></li>
            <li>Trạng thái <strong>{!! \App\Helpers\Helper::statusCart($customer->status) !!}</strong></li>
        </ul>
    </div>

    <div class="carts">
        @php
            $total = 0;
            $status = [
                        0 => 'Đang chờ',
                        1 => 'Đã xác nhận',
                        2 => 'Đang giao hàng',
                        3 => 'Hoàn thành',
                        4 => 'Bị hủy',
                      ];
        @endphp
        <table class="table">
            <tbody>
            <tr class="table_head">
                <th class="column-1">IMG</th>
                <th class="column-2">Product</th>
                <th class="column-3">Price</th>
                <th class="column-4">Quantity</th>
                <th class="column-5">Total</th>
            </tr>

            @foreach($carts as $key => $cart)
                @php
                    $price = $cart->price * $cart->pty;
                    $total += $price;
                @endphp
                <tr>
                    <td class="column-1">
                        <div class="how-itemcart1">
                            <img src="{{ $cart->product->thumb }}" alt="IMG" style="width: 100px">
                        </div>
                    </td>
                    <td class="column-2">{{ $cart->product->name }}</td>
                    <td class="column-3">{{ number_format($cart->price, 0, '', '.') }}</td>
                    <td class="column-4">{{ $cart->pty }}</td>
                    <td class="column-5">{{ number_format($price, 0, '', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right">Tổng Tiền</td>
                <td>{{ number_format($total, 0, '', '.') }}</td>
            </tr>
            </tbody>
        </table>
        @if(count($carts) > 0)
            <div>
                <form action="/admin/customers/change-status" method="POST" class="d-flex">
                    @csrf
                    <input type="text" hidden name="customer_id" value="{{$customer->id}}">
                    <div class="form-group">
                        <select name="status" id="status" class="form-control">
                            @foreach($status as $key => $value)
                                @if($customer->status != $key)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div>
                    <button class="btn btn-success" type="submit">Thay đổi trạng thái đơn hàng</button>
                </div>
            </form>
        </div>
        @endif
    </div>
@endsection


