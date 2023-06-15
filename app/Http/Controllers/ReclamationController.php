<?php

namespace App\Http\Controllers;

use App\Models\reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReclamationController extends Controller
{
    public function index()
    {

        $reclamtion = DB::table('reclamations')
        ->join('users', 'reclamations.idUser', '=', 'users.id')
        ->select('users.id as user',"reclamations.id as idR", 'reclamations.*', 'users.*')
        ->get();
        return $reclamtion;
    }
    public function store(Request $request)
    {
        $reclamation = new reclamation();
        $reclamation->idUser = $request->idUser;
        $reclamation->reclamation = $request->reclamation;
        $reclamation->save();
    }
    public function update(Request $request, reclamation $reclamation)
    {
        if ($request->status) {
            $reclamation->update([
                'status' => $request->status,
            ]);
        }
        return $request->status;
    }
    public function destroy(reclamation $reclamation)
    {
        //
    }
}
