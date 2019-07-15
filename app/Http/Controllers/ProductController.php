<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Cate;
use App\Product;
use App\Product_image;
use Illuminate\Support\Facades\DB;
use File;
use Request;

class ProductController extends Controller{
    public function index()
    {
        $data = Product::select('id','name','price','image','description','cate_id')->orderBy('id','DESC')->get()->toArray();
        return view('admin.product.list',compact('data'));
    }

    public function create()
    {
        $cate = Cate::select('name','id')->get()->toArray();
        return view('admin.product.add',compact('cate'));
    }
    public function store(ProductRequest $request)
    {
        // DB::table('products')->insert([
        //     'name'=>$request->txtName,
        //     'price'=>$request->txtPrice,
        //     'description'=>$request->txtContent,
        //     'image'=>$request->fImages,
        // ]);
        $file_name = $request->file("fImages")->getClientOriginalName();
        $product = new Product();
        $product->name = $request->txtName;
        $product->price = $request->txtPrice;
        $product->description = $request->txtContent;
        $product->image = $file_name;
        $product->user_id = 1;
        $product->cate_id = $request->sltCate;
        $request->file("fImages")->move('pictures/',$file_name);
        $product->save();
        $product_id = $product->id;
        if($request->hasFile('fProductDetail')){
            foreach ($request->file('fProductDetail') as $file) {
                $product_img = new Product_image();
                if(isset($file)){
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id = $product_id;
                    $file->move('pictures/Details/',$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
        return redirect()->route('list-product.index')->with([
            'flash-level'=>'success',
            'flash_message'=>'Add product successfully!'
        ]);
    }

    public function show($id)
    {
        //$data = Product::select('id','name')->orderBy('id',)
        // return view('admin.product.list');
    }

    public function edit($id)
    {
        $cate = Cate::select('id','name')->get()->toArray();
        $product = Product::find($id);
        $product_image = Product::find($id)->product_images;
        return view('admin.product.edit',compact('cate','product','product_image'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id); 
        $product->name = Request::input('txtName');
        $product->price = Request::input('txtPrice');
        $product->description = Request::input('txtContent');
        $product->cate_id = Request::input('sltCate');
        $product->user_id = 1;
        $img_current = 'pictures/openssl_pkey_get_details(key)'.Request::input('img_current');
        if (!empty(Request::file('fImages'))) {
            $file_name = Request::file('fImages')->getClientOriginalName();
            $product->image = $file_name;
            Request::file('fImages')->move('pictures/',$file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        }else{
            echo "Không có file";
        }
        $product->save();
        return redirect()->route('list-product.index')->with([
            'flash-level'=>'success',
            'flash_message'=>'Edit product successfully!'
        ]);
    }

    public function destroy($id)
    {
        $product_detail = Product::find($id)->product_images->toArray();
        foreach ($product_detail as $value) {
            File::delete('pictures/Details/'.$value["image"]);  
        }
        $product = Product::find($id);
        File::delete('pictures'.$product->image);
        $product->delete($id);
        return redirect()->route('list-product.index')->with([
            'flash-level'=>'success',
            'flash_message'=>'Delete product successfully!'
        ]);
    }

    public function destroyImg($id){
        if (Request::ajax()) {
            $idHinh = (int)Request::get('idHinh');
            $image_detail= Product_image::find($idHinh);
            if (!empty($image_detail)) {
                $img = 'pictures/Details/'.$image_detail->image; 
                if (File::exists($img)) {
                    File::delete($img);
                };
                $image_detail->delete();
            }
            return ['result' => true];
        }
    }
}
