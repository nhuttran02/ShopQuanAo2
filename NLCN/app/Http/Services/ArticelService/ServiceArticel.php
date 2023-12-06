<?php

namespace App\Http\Services\ArticelService;

use App\Models\article;
use App\Models\DetailArticel;
use DB;
use Illuminate\Support\Facades\Session;
use App\Models\Menu;

class ServiceArticel
{
    public function get()
    {
        return Menu::get();
    }

    public function validateInput($request)
    {
        if (
            empty($request->input('harder')) &&
            empty($request->input('description')) &&
            empty($request->input('content_article'))
        ) {
            Session::flash('error', 'bạn đang dể trống 1 trường nào đó');
            return false;
        }
        return true;
    }

    public function update($request, $article)
    {
        $isValidPrice = $this->validateInput($request);
        if ($isValidPrice === false)
            return false;

        try {
            $img = array();

            if ($request->file('_linkheader_')) {
                $file = $request->file('_linkheader_');
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = public_path('Multilple_image');
                $file->move($upload_path, $image_full_name);
                $request->merge([
                    'linkheader' => 'Multilple_image/' . $image_full_name
                ]);
            }

            $article->fill($request->all());
            $article->save();

            if ($files = $request->file('mutiImg')) {
                foreach ($files as $file) {
                    $image_name = md5(rand(1000, 10000));
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $image_name . '.' . $ext;
                    $upload_path = public_path('Multilple_image');
                    $image_url = 'Multilple_image/' . $image_full_name;
                    $file->move($upload_path, $image_full_name);
                    $img[] = $image_url;
                }
            }
            DetailArticel::insert([
                'articel_id' => $article->id,
                'mutiImg' => implode('|', $img)
            ]);

            Session::flash('success', 'sửa thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Sửa lỗi');
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->validateInput($request);
        if ($isValidPrice === false)
            return false;
        try {
            $img = array();

            if ($request->file('_linkheader_')) {
                $file = $request->file('_linkheader_');
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = public_path('Multilple_image');
                $file->move($upload_path, $image_full_name);
                $request->merge([
                    'linkheader' => 'Multilple_image/' . $image_full_name
                ]);
            }

            $articel = article::create($request->all());

            if ($files = $request->file('mutiImg')) {
                foreach ($files as $file) {
                    $image_name = md5(rand(1000, 10000));
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $image_name . '.' . $ext;
                    $upload_path = public_path('Multilple_image');
                    $image_url = 'Multilple_image/' . $image_full_name;
                    $file->move($upload_path, $image_full_name);
                    $img[] = $image_url;
                }
            }
                DetailArticel::insert([
                    'articel_id' => $articel->id,
                    'mutiImg' => implode('|', $img)
                ]);

            Session::flash('success', 'thêm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm lỗi');
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function GetAllArticel()
    {
        return article::with('menu')
            ->orderByDesc('id')->paginate(15);
    }

    public function delete($request)
    {
        $article = article::where('id', $request->input('id'))->first();
        if ($article) {
            DB::transaction(function () use ($article) {
                DetailArticel::where('articel_id', $article->id)->delete();
                $article->delete();
            });
            return true;
        }

        return false;
    }
}
