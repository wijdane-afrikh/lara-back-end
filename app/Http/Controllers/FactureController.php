<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FactureController extends Controller
{
    public function index()
    {
        $facture = DB::table('factures')
            ->join('users', 'factures.idUser', '=', 'users.id')
            ->select('users.id as user', 'factures.*', 'factures.id as facture', 'users.*')
            ->get();
        return $facture;

    }


    public function store(Request $request)
    {
        foreach ($request->user as $key) {
            $facture = new Facture();
            $facture->idUser = $key["id"];
            ;
            $facture->Total = $request->Cin;
            $facture->Raison = $request->Telephon;
            $facture->Stauts = "Non payé";
            $facture->save();

        }

    }
    public function update(Facture $facture)
    {
        $facture->update([
            "Stauts" => "payé",
        ]);
        return $facture;
    }
    public function destroy(Facture $facture)
    {
        $facture->delete();
    }
}
