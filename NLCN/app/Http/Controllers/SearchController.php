<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        return view('search', [
            'title'    => 'Tìm kiếm',
            'products' => Product::where('name', 'LIKE', '%' . $request->input('q', '') . '%')
                ->paginate(16)
        ]);
    }
}
