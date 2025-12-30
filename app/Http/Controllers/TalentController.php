<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Talent;

class TalentController extends Controller
{
    public function talents_index()
    {
        $talents = Talent::all();
        return view('talents.index', compact('talents'));
    }

    public function talents_create()
    {
        return view('talents.create');
    }

    public function talents_store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
        ]);

        Talent::create($validated);

        return redirect()->route('talents.create')->with('success', '人材バンク情報を登録しました。');
    }

    public function talents_edit(Talent $talent)
    {
        return view('talents.edit', compact('talent'));
    }

    public function talents_update(Request $request, Talent $talent)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
        ]);
        
        $talent->update($validated);

        return redirect()->route('talents.index')->with('success', '人材バンク情報を更新しました。');
    }

    public function talents_destroy(Talent $talent)
    {
        $talent->delete();
        return redirect()->route('talents.index')->with('success', '人材バンク情報を削除しました。');
    }
}
