<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hazard;
use App\Models\Shelter;
use App\Models\Help;

class MapController extends Controller
{
    // トップページ
    public function index()
    {
        $hazards = Hazard::all();
        $shelters = Shelter::all();
        $helps = Help::all();
        return view('map.index', compact('hazards', 'shelters', 'helps'));
    }

    // 施設情報
    public function shelters_create()
    {
        return view('shelters.create');
    }

    public function shelters_store(Request $request)
    {
        Shelter::create($request->only('name', 'latitude', 'longitude', 'capacity', 'accessibility'));
        return redirect()->route('shelters.index')->with('success', '施設を登録しました');
    }

    public function shelters_index()
    {
        $shelters = Shelter::all();
        return view('shelters.index', compact('shelters'));
    }

        public function shelters_edit(Shelter $shelter)
    {
        return view('shelters.edit', compact('shelter'));
    }

        public function shelters_update(Request $request, Shelter $shelter)
    {
        $data = $request->only('name', 'capacity', 'accessibility', 'description', 'latitude', 'longitude');

        $shelter->update($data);

        return redirect()->route('shelters.index')->with('success', '施設情報を更新しました');
    }

        public function shelters_destroy(Shelter $shelter)
    {
        $shelter->delete();
        return redirect()->route('shelters.index')->with('success', '削除しました');
    }

    // 危険・注意箇所
    public function hazards_create()
    {
        return view('hazards.create');
    }

    public function hazards_store(Request $request)
    {
        $data = $request->only('name', 'description', 'latitude', 'longitude', 'reporter', 'phone');

        // 画像がアップロードされた場合
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('hazards', 'public'); // storage/app/public/hazards に保存
            $data['image_path'] = $path;
        }

        Hazard::create($data);

        return redirect()->route('hazards.index')->with('success', '危険箇所を登録しました');
    }


    public function hazards_index()
    {
        $hazards = Hazard::all();
        return view('hazards.index', compact('hazards'));
    }

    public function hazards_edit(Hazard $hazard)
    {
        return view('hazards.edit', compact('hazard'));
    }

    public function hazards_destroy(Hazard $hazard)
    {
        $hazard->delete();
        return redirect()->route('hazards.index')->with('success', '削除しました');
    }

    public function hazards_update(Request $request, Hazard $hazard)
    {
        $data = $request->only('name', 'type', 'description', 'latitude', 'longitude', 'reporter', 'phone');
        $data['resolved'] = $request->has('resolved') ? true : false;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('hazards', 'public');
            $data['image_path'] = $path;
        }

        $hazard->update($data);

        return redirect()->route('hazards.index')->with('success', '危険箇所を更新しました');
    }

    // 要支援者
    public function helps_create()
    {
        return view('helps.create');
    }

    public function helps_store(Request $request)
    {
        $data = $request->only('name', 'description', 'latitude', 'longitude', 'reporter', 'phone', 'resolved');

        Help::create($data);

        return redirect()->route('helps.index')->with('success', '要支援者情報を登録しました');
    }

    public function helps_index()
    {
        $helps = Help::all();
        return view('helps.index', compact('helps'));
    }

    public function helps_edit(Help $help)
    {
        return view('helps.edit', compact('help'));
    }

    public function helps_destroy(Help $help)
    {
        $help->delete();
        return redirect()->route('helps.index')->with('success', '削除しました');
    }

    public function helps_update(Request $request, Help $help)
    {
        $data = $request->only('name', 'description', 'latitude', 'longitude', 'reporter', 'phone', 'resolved');

        $help->update($data);

        return redirect()->route('helps.index')->with('success', '要支援者情報を更新しました');
    }
}
