<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
    public function informations_create()
    {
        return view('informations.create');
    }

    public function informations_store(Request $request)
    {
        $data = $request->only('info');

        // 画像がアップロードされた場合の保存処理
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('informations', 'public');
            $data['image_path'] = $path;
        }

        Information::create($data);

        return redirect()->route('informations.index')->with('success', '連絡を登録しました');
    }

    public function informations_index()
    {
        $informations = Information::orderBy('updated_at', 'desc')->get();
        return view('informations.index', compact('informations'));
    }

    public function informations_edit(Information $information)
    {
        return view('informations.edit', compact('information'));
    }

    public function informations_update(Request $request, Information $information)
    {
        $data = $request->only('info');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('informations', 'public');
            $data['image_path'] = $path;
        }

        $information->update($data);

        return redirect()->route('informations.index')->with('success', '連絡を更新しました');
    }


    public function informations_destroy(Information $information)
    {
        $information->delete();
        return redirect()->route('informations.index')->with('success', '削除しました');
    }
}
