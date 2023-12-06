<?php

namespace App\Http\Controllers;

use App\Http\Services\ArticelService\ServiceArticel;
use App\Models\article;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticelController extends Controller
{
    protected $ArticelService;
    public function __construct(ServiceArticel $ArticelService){
        $this->ArticelService= $ArticelService;
    }
    public function create(){
        return view('admin.Qlbaiviet.add', [
            'title'=>'them bai viet vao danh sach',
            'dsdanhmuc'=> $this->ArticelService->get()
        ]);
    }

    public function detail($id)
    {
        $article = article::findOrFail($id);
        return view('article.detail', [
            'title' => $article->name,
            'sliders' => [],
            'menus' => [],
            'products' => [],
            'article' => $article,
            'comments' => Comment::where('article_id', $id)->get()
        ]);
    }

    public function update(Request $request, $article)
    {
        $article = article::findOrFail($article);
        $result = $this->ArticelService->update($request, $article);
        if ($result) {
            return redirect('/admin/Qlbaiviet/list');
        }

        return redirect()->back();
    }

    public function InsertArticel(Request $request){
      $this->ArticelService->insert($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.Qlbaiviet.list', [
            'title' => 'Danh Sách Bài Viết',
            'articles' => $this->ArticelService->GetAllArticel()
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->ArticelService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công bài viết'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }

    public function show($article)
    {
        $article = article::findOrFail($article);
        return view('admin.Qlbaiviet.edit', [
            'title' => 'Chỉnh Sửa Sản Phẩm',
            'article' => $article,
            'dsdanhmuc'=> $this->ArticelService->get()
        ]);
    }
}
