<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public static function index(Request $request){
        $data = Product::join('category', 'product.category_id', '=','category.id')
            ->orderBy('product.id', 'DESC')
            ->select(
                'product.*',
                "category.name as category"
            )
            ->get();
        return view('product.product', ['data'=>$data]);
    }

    public static function index_create(Request $request){
        $category = Category::all();
        return view('product.create', ['category'=>$category]);
    }

    public static function confirm_delete(Request $request){
        $user_id = $request->query('id');
        $data = Product::find($user_id);
        return view('product.confirm_delete', ['data'=>$data]);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required|numeric',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($validator->fails()){
            return redirect(route('index_create_product'))->withInput()->withErrors($validator);
        }

        $product = new Product();
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->cost = $request->input('cost');
        $product->price = $request->input('price');
        $product->stock_alert = $request->input('stock_alert');
        $product->description = $request->input('description');
        if ($product->save()){
            if (isset($request->image)){
                $imageName = time().'.'.$request->image->extension();
                $profile =  $request->image->move(public_path('images/product'), $imageName);
                $product->image = $imageName;
                $product->save();
            }
        }
        return redirect(route('product'));
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $product = Product::find($request->id);
        if ($product){
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->save();

            if (isset($request->image)){
                $imageName = $product->image;
                $profile = $request->image->move(public_path('images'), $imageName);
                $product->image = $imageName;
                $product->save();
            }
        }
        return redirect(route('product'));
    }

    public static function index_update(Request $request){
        $product_id = $request->query('id');
        $data = Product::find($product_id);
        return view('product.update', ['data'=>$data]);
    }

    public function delete(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);
        $product_id = $request->id;
        $data = Product::find($product_id);
        if ($data){
            $data->delete();
        }

        return redirect(route('product'));
    }
}
