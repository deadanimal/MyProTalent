<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function list_services(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;
        $profile_type = $profile->type;
        $profile_id = $profile->id;

        if ($profile_type == 'admin' || $profile_type == 'staff') {
            $services = Service::all();
            return view('service.staff_list', compact('services'));
        } else {

        }
    }

    public function detail_service(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;
        $profile_type = $profile->type;
        $profile_id = $profile->id;

        $service_id = (int) $request->route('service_id');
        if ($profile_type == 'admin' || $profile_type == 'staff') {
            $service = Service::find($service_id);
            return view('service.staff_detail', compact('service'));
        } else if ($profile_type == 'employee') {
            $service = Service::where([
                ['id', '=', $service_id],
                ['service_id', '=', $profile->service->id]
            ]);
            return view('service.service_detail', compact('service'));
        } else {

        }
    }

    public function create_service(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;
        $profile_type = $profile->type;
        $profile_id = $profile->id;

        if ($profile_type == 'admin' || $profile_type == 'staff') {
            $service = Service::create([
                
            ]);
        } else {

        }

        return back();
    }

    public function update_service(Request $request)
    {

        $user = $request->user();
        $profile = $user->profile;
        $profile_type = $profile->type;
        $profile_id = $profile->id;

        $service_id = (int) $request->route('service_id');

        if ($profile_type == 'admin' || $profile_type == 'staff') {
            $service = Service::find($service_id);
            $service->update([]);
        } else if ($profile_type == 'employee') {
            $service = Service::where([
                ['id', '=', $service_id],
            ])->first();
            $service->update([]);
        } else {

        }    

        return back();
    }
}
