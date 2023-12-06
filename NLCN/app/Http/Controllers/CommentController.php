<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        $comment = Comment::create([
            'content'    => $request->input('content'),
            'article_id' => $request->input('article_id'),
            'user_id'    => auth()->user()->getKey(),
        ]);

        return [
            'content'    => $request->input('content'),
            'user'       => auth()->user()->name ?? '',
            'created_at' => $comment->created_at
        ];
    }

    public function index(Request $request)
    {
        return view('admin.comment.list', [
            'title' => 'Danh Sách Comment Mới Nhất',
            'comments' => Comment::orderBy('id', 'DESC')->paginate(15)
        ]);
    }

    public function destroy(Request $request)
    {
        $result = Comment::where('id', $request->input('id'))->first()->delete();
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công comment'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
