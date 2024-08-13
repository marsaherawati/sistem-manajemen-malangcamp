<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about-us');
    }

    public function getRegency(Request $request)
    {
        $id_province = $request->id_province;

        $regencies = Regency::where('province_id', $id_province)->get();

        $option = "<option selected disabled>--Pilih Kab. / Kota--</option>";

        foreach ($regencies as $regency) {
            $option .=  "<option value='$regency->id' class='text-dark'>$regency->name</option>";
        }

        echo $option;
    }

    public function getDistrict(Request $request)
    {
        $id_regency = $request->id_regency;

        $districts = District::where('regency_id', $id_regency)->get();

        $option = "<option selected disabled>--Pilih Kecamatan--</option>";

        foreach ($districts as $district) {
            $option .= "<option value='$district->id' class='text-dark'>$district->name</option>";
        }

        echo $option;
    }
    public function getVillage(Request $request)
    {
        $id_district = $request->id_district;

        $villages = Village::where('district_id', $id_district)->get();

        $option = "<option selected disabled>--Pilih Desa / Kelurahan--</option>";

        foreach ($villages as $village) {
            $option .= "<option value='$village->id' class='text-dark'>$village->name</option>";
        }
        echo $option;
    }
}
