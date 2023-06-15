<?php

namespace App\Http\Controllers;

use App\Models\appartement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{

    public function index()
    {
        $user = DB::table('users')
        ->join('appartements', 'appartements.idUser', '=', 'users.id')
        ->select('users.id as user',"appartements.id as idP", 'appartements.*', 'users.*')
        ->get();
        return $user;

    }public function getUser()
    {
        $user = DB::table('users')
       ->get();
        return $user;

    }
    public function login(Request $request)
    {
        $user = User::count();

        if ($user === 0) {
            $user = new User();
            $user->name = "admin";
            $user->email = $request->email;
            $user->type = "admin";
            $user->password = $request->password;
            $user->save();
            $user = User::where("email", $request->email)->where("password", $request->password)->get();
            return response()->json([
                'user' => $user
            ]);
        } else {
            $count = User::where("email", $request->email)->where("password", $request->password)->count();
            if ($count > 0) {
                $user = User::where("email", $request->email)->where("password", $request->password)->get();
                return response()->json([
                    'user' => $user
                ]);
            } else {
                return response()->json([
                    'status' => 402,
                    'message' => "No Account"
                ]);
            }

        }
    }
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        // upload img
        $image = $request->file('image');
        $imgName = time() . "." . $image->getClientOriginalExtension();
        $image->move('User/', $imgName);
        // end
        $user->image = $imgName;
        $user->Telephon = $request->Telephon;
        $user->save();
        $appretemt = new appartement();
        $appretemt->idUser = $user->id;
        $appretemt->numero = $request->Apparetement;
        $appretemt->IdImmeubles = $request->IdImmeubles;
        $appretemt->save();
        return "hhhh";
    }
    public function update(Request $request, string $id)
    {
        $user = User::where('id', $id)->first();
        if ($request->name) {
            $user->update([
                'name' => $request->name,
            ]);
        }
        if ($request->email) {
            $user->update([
                'email' => $request->email,
            ]);
        }
        if ($request->password) {
            $user->update([
                "password" => $request->password,
            ]);
        }
        // upload img
        if ($request->file('image')) {
            $image = $request->file('image');
            $imgName = time() . "." . $image->getClientOriginalExtension();
            $image->move('User/', $imgName);
            $user->update([
                "image" => $imgName,
            ]);
        }
        // end

        if ($request->Telephon) {
            $user->update([
                "Telephon" => $request->Telephon,
            ]);
        }
    }
    public function destroy(string $id)
    {
        User::where("id", $id)->delete();


        return "user";
    }
}
