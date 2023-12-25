<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    //
    public static function index(Request $request){
        $data = Category::orderBy('id', 'DESC')->select('*')->get();
        return view('category.category', ['data'=>$data]);
    }

    public static function index_create(Request $request){
        return view('category.create');
    }

    public static function confirm_delete(Request $request){
        $user_id = $request->query('id');
        $data = Category::find($user_id);
        return view('category.confirm_delete', ['data'=>$data]);
    }

    public function create(Request $request){

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $category = new Category();
        $category->name = $request->input('name');
        if ($category->save()){
            $imageName = time().'.'.$request->image->extension();
            $profile =  $request->image->move(public_path('images'), $imageName);
            $category->image = $imageName;
            $category->save();
        }
        return redirect(route('category'));
    }

    public function delete(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);
        $category_id = $request->id;
        $data = Category::find($category_id);
        if ($data){
            $data->delete();
        }

        return redirect(route('category'));
    }
}
