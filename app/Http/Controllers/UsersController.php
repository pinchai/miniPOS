<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public static function index(Request $request){
        //$data = User::orderBy('id', 'DESC')->select('*')->get();
        $data = DB::select("select * from users order by id desc");
        return view('users', ['data'=>$data]);
    }

    public function create(Request $request){
        $user = New User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect(url('/admin/users'));
    }
}
