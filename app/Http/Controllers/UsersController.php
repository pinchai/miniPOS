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
        return view('users.users', ['data'=>$data]);
    }

    public static function index_create(Request $request){
        return view('users.create');
    }

    public static function confirm_delete(Request $request){
        $user_id = $request->query('id');
        $data = User::find($user_id);
        return view('users.confirm_delete', ['data'=>$data]);
    }

    public function create(Request $request){

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = New User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        if ($user->save()){
            $imageName = time().'.'.$request->image->extension();
            $profile =  $request->image->move(public_path('images'), $imageName);
            $user->profile = $imageName;
            $user->save();
        }
        return redirect(route('user'));
    }
}
