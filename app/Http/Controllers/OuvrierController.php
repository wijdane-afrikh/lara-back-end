<?php

namespace App\Http\Controllers;

use App\Models\Ouvrier;
use Illuminate\Http\Request;

class OuvrierController extends Controller
{
    public function index()
    {
        $ouvrier = Ouvrier::get();
        return $ouvrier;
    }

    public function store(Request $request)
    {
        $user = new Ouvrier();
        $user->name = $request->name;
        $user->cin = $request->Cin;
        $user->type = $request->Type;
        $user->service = $request->Service;
        $user->Telephon = $request->Telephon;
        $user->Salaire = $request->Salaire;
        $user->idrecalamtion = $request->reclamtion;
        $user->save();
        return "hhhh";
    }
    public function show(Ouvrier $ouvrier)
    {
        return $ouvrier;
    }
    public function update(Request $request, Ouvrier $ouvrier)
    {
        if ($request->Cin) {
            $ouvrier->update([
                'cin' => $request->Cin,
            ]);
        }
        if ($request->Salaire) {
            $ouvrier->update([
                'Salaire' => $request->Salaire,
            ]);
        }
        if ($request->Type) {
            $ouvrier->update([
                'type' => $request->Type,
            ]);
        }
        if ($request->Service) {
            $ouvrier->update([
                'service' => $request->Service,
            ]);
        }
        if ($request->Telephon) {
            $ouvrier->update([
                'Telephon' => $request->Telephon,
            ]);
        }
        if ($request->name) {
            $ouvrier->update([
                'name' => $request->name,
            ]);
        }
    }
    public function destroy(Ouvrier $ouvrier)
    {
        $ouvrier->delete();

    }
}
