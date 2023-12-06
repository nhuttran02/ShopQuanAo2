<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function destroy(Request $request)
    {
        $customer = Customer::where('id', $request->input('id', ''))->first();

        if ($customer) {
            $result = $customer->delete();
            if ($result) {
                return response()->json([
                    'error'   => false,
                    'message' => 'Xóa đơn hàng sản phẩm'
                ]);
            }
        }

        return response()->json(['error' => true]);
    }

    public function changeStatus(Request $request){
        $status = $this->cart->updateStatus($request);
        if($status){
            Session::flash('success', 'Cập nhật trạng thái thành công');
        }else{
            Session::flash('error', 'Cập nhật trạng thái thất bại');
        }

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.carts.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);

        return view('admin.carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
}
