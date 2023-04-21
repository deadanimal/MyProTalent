<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use Illuminate\Http\Request;

class TalentController extends Controller
{
    public function list_talents(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;
        $profile_type = $profile->type;
        $profile_id = $profile->id;

        if ($profile_type == 'admin' || $profile_type == 'staff') {
            $talents = Talent::all();
            return view('talent.staff_list', compact('talents'));
        } else {

        }
    }

    public function detail_talent(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;
        $profile_type = $profile->type;
        $profile_id = $profile->id;

        $talent_id = (int) $request->route('talent_id');
        if ($profile_type == 'admin' || $profile_type == 'staff') {
            $talent = Talent::find($talent_id);
            return view('talent.staff_detail', compact('talent'));
        } else if ($profile_type == 'employee') {
            $talent = Talent::where([
                ['id', '=', $talent_id],
                ['talent_id', '=', $profile->talent->id]
            ]);
            return view('talent.talent_detail', compact('talent'));
        } else {

        }
    }

    public function create_talent(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;
        $profile_type = $profile->type;
        $profile_id = $profile->id;

        if ($profile_type == 'admin' || $profile_type == 'staff') {
            $talent = Talent::create([
                
            ]);
        } else {

        }

        return back();
    }

    public function update_talent(Request $request)
    {

        $user = $request->user();
        $profile = $user->profile;
        $profile_type = $profile->type;
        $profile_id = $profile->id;

        $talent_id = (int) $request->route('talent_id');

        if ($profile_type == 'admin' || $profile_type == 'staff') {
            $talent = Talent::find($talent_id);
            $talent->update([]);
        } else if ($profile_type == 'employee') {
            $talent = Talent::where([
                ['id', '=', $talent_id],
            ])->first();
            $talent->update([]);
        } else {

        }    

        return back();
    }
}
