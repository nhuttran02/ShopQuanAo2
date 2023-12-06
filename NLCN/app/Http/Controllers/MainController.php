<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(SliderService $slider, MenuService $menu,
        ProductService $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }

    public function index()
    {
        return view('home', [
            'title' => 'Gardeners',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'products' => $this->product->get(),
        ]);
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if (count($result) != 0) {
            $html = view('products.list', ['products' => $result ])->render();

            return response()->json([ 'html' => $html ]);
        }

        return response()->json(['html' => '' ]);
    }

    public function addContact(Request $request)
    {
        try {
            $request->validate([
                'name'    => 'required',
                'email'   => 'required|email',
                'phone'   => 'required',
                'message' => 'required',
            ]);

            Contact::create($request->all());
            Session::flash('success', 'Gửi liên hệ thành công');
        } catch (Exception $exception) {
            Session::flash('error', 'Vui lòng nhập đầy đủ thông tin và thử lại');
        }
        return redirect()->back();
    }

    public function contactList()
    {
        return view('admin.contact.list', [
            'title'    => 'Danh sách liên hệ',
            'contacts' => Contact::orderByDesc('id')->paginate(15)
        ]);
    }

    public function destroyContact(Request $request)
    {
        $product = Contact::where('id', $request->input('id'))->first();
        if ($product) {
            $result = $product->delete();
            if ($result) {
                return response()->json([
                    'error'   => false,
                    'message' => 'Xóa thành công sản phẩm'
                ]);
            }
        }

        return response()->json(['error' => true]);
    }

    public function blogList(Request $request)
    {
        return view('blog', [
            'title' => 'Blog',
            'sliders' => [],
            'menus' => [],
            'products' => [],
            'articles' => article::with('menu')
                ->orderByDesc('id')->paginate(10)
        ]);
    }
}
