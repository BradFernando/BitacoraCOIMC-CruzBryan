<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\MilitaryUnit;
use App\Models\Rank;
use Illuminate\Support\Facades\DB;


class DriverController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $unitUser = $user->military_unit_id;
        $roleUser = $user->roles->first()->name;

        $military_units = MilitaryUnit::all();
        $ranks = Rank::all();

        $drivers = Driver::join('military_units as U', 'drivers.military_unit_id', '=', 'U.id')
            ->join('ranks as R', 'drivers.rank_id', '=', 'R.code')
            ->select('drivers.id', 'U.abbreviation as unit', 'R.name as ranks',
            DB::raw("CONCAT(drivers.last_names, ' ', drivers.names) as driver"),
            'drivers.identification_card', 'drivers.phone', 'drivers.blood_type', 'drivers.license_type')
            ->where('drivers.military_unit_id', $unitUser)
            ->orderBy('U.abbreviation')
            ->orderBy('R.name')
            ->orderBy(DB::raw("CONCAT(drivers.last_names, ' ', drivers.names)"))
            ->get();
        return view('admin.driver.index', compact('drivers', 'military_units' , 'ranks'));
    }

    public function store(Request $request)
    {
        $driver = new Driver();
        $driver->names = $request->names;
        $driver->last_names = $request->last_names;
        $driver->identification_card = $request->identification_card;
        $driver->phone = $request->phone;
        $driver->blood_type = $request->blood_type;
        $driver->license_type = $request->license_type;
        $driver->rank_id = $request->rank_id;
        $driver->military_unit_id = $request->military_unit_id;
        $driver->is_active = true;
        $driver->save();



        return redirect()->route('drivers.index');
    }
}
