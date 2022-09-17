<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function show($id)
    {
        $ads = Ad::where([
            ['active', '=', 1],
            ['subcategory_id', '=', $id],
        ])->get();

        return view('ad.show', [
            'title' => 'Список объявлений',
            'ads' => $ads,
            'subcategoryId' => $id,
        ]);
    }

    public function showAll()
    {
        $ads = Ad::orderBy('created_at', 'desc')->get();

        return view('ad.showAll', [
            'title' => 'Список объявлений',
            'ads' => $ads,
        ]);
    }

    public function store(Request $request)
    {
        if (auth()->check()){
            $ad = Ad::create([
                'text' => $request->text,
                'subcategory_id' => $request->subcategoryId,
            ]);

            return redirect()->route('show_ads', ['id' => $request->subcategoryId]);
        }
    }

    public function active($id)
    {
        $ad = Ad::find($id);

        if ($ad->active) {
            $ad->active = 0;
        } else {
            $ad->active = 1;
        }

        $ad->save();
        return redirect()->route('admin_all_ads');
    }
}
