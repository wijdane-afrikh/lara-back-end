<?php

namespace App\Http\Controllers;

use App\Models\Immeuble;
use Illuminate\Http\Request;

class ImmeubleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $immeuble = Immeuble::get();
        return $immeuble;
    }

    public function store(Request $request)
    {
        $Immeuble = new Immeuble();
        $Immeuble->name = $request->name;
        $Immeuble->adress = $request->adress;
        $Immeuble->Total_etage = $request->Total_etage;
        $Immeuble->save();
    }



    public function update(Request $request, Immeuble $immeuble)
    {
        if ($request->adress) {
            $immeuble->update([
                'adress' => $request->adress,
            ]);
        }
        if ($request->Total_etage) {
            $immeuble->update([
                'Total_etage' => $request->Total_etage,
            ]);
        }
        if ($request->name) {
            $immeuble->update([
                'name' => $request->name,
            ]);
        }
     
    }

    public function show(Immeuble $immeuble)
    {
        return $immeuble;
    }
    public function destroy(Immeuble $immeuble)
    {
        $immeuble->delete();
    }
}
