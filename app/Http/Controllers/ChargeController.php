<?php
namespace App\Http\Controllers;

use App\Models\Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reclamtion = DB::table('charges')
            ->join('users', 'charges.idUser', '=', 'users.id')
            ->select('users.id as user', "charges.id as idR", 'charges.created_at as date', 'charges.*', 'users.*')
            ->get();
        return $reclamtion;
    }


    public function store(Request $request)
    {

        // "",
        // "Stauts",
        foreach ($request->users as $key) {
            $charge = new Charge();
            $charge->idUser = $key["id"];
            $charge->moins = $key["id"];
            $charge->Stauts = "Non paye";
            $charge->save();

        }
        return "hhh";

    }

    public function update(Request $request, Charge $charge)
    {
        $charge->update([
            "Stauts"=>$request->status,
        ]);
    }
    public function destroy(Charge $charge)
    {
        $charge->delete();
    }
}
