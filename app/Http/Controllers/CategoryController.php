<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($validator->fails()){
            return redirect(route('index_create_category'))->withInput()->withErrors($validator);
        }

        $category = new Category();
        $category->name = $request->input('name');
        if ($category->save()){
            if (isset($request->image)){
                $imageName = time().'.'.$request->image->extension();
                $profile =  $request->image->move(public_path('images'), $imageName);
                $category->image = $imageName;
                $category->save();
            }
        }
        return redirect(route('category'));
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $category = Category::find($request->id);
        if ($category){
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->save();

            if (isset($request->image)){
                $imageName = $category->image;
                $profile = $request->image->move(public_path('images'), $imageName);
                $category->image = $imageName;
                $category->save();
            }
        }

//        if ($category->save()){
//            $imageName = time().'.'.$request->image->extension();
//            $profile =  $request->image->move(public_path('images'), $imageName);
//            $category->image = $imageName;
//            $category->save();
//        }
        return redirect(route('category'));
    }

    public static function index_update(Request $request){
        $category_id = $request->query('id');
        $data = Category::find($category_id);
        return view('category.update', ['data'=>$data]);
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
