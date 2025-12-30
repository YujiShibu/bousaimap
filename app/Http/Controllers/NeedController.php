<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Need;

class NeedController extends Controller
{
    public function needs_create()
    {
        return view('needs.create');
    }

    public function needs_store(Request $request)
    {
        $data = $request->only('content', 'name', 'reporter', 'phone');
        $data['resolved'] = $request->has('resolved') ? true : false;

        Need::create($data);

        return redirect()->route('needs.index')->with('success', '困り事・心配事を登録しました');
    }

    public function needs_index()
    {
        $needs = Need::orderBy('updated_at', 'desc')->get();
        return view('needs.index', compact('needs'));
    }

    public function needs_edit(Need $need)
    {
        return view('needs.edit', compact('need'));
    }

    public function needs_update(Request $request, Need $need)
    {
        $data = $request->only('content', 'name', 'reporter', 'phone');
        $data['resolved'] = $request->has('resolved') ? true : false;

        $need->update($data);

        return redirect()->route('needs.index')->with('success', '困り事・心配事を更新しました');
    }

    public function needs_destroy(Need $need)
    {
        $need->delete();
        return redirect()->route('needs.index')->with('success', '削除しました');
    }
}
