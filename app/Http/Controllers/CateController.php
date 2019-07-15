<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Cate;
use Illuminate\Support\Facades\DB;

class CateController extends Controller
{
    public function index(){
    	return view('admin.cate.add');
    }

    public function store(CateRequest $request){
    	//return $cate->name;
    	//$cate->save();
    	DB::table('cates')->insert(['name'=>$request->txtCateName]);
    	return redirect()->route('list-category.show')->with([
    		'flash_level'=>'success',
    		'flash_message'=>'Add category successfully!'
    	]);
    }

    public function show(){
    	$data = Cate::select('id','name')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.cate.list',compact('data'));
    }

    public function edit($id){
    	$data = Cate::findOrFail($id)->toArray();
    	return view('admin.cate.edit',compact('data','id'));
    }

    public function showEdit(Request $request,$id){
    	$this->validate($request,
    		['txtCateName'=>'required|unique:cates,name'],
    		['txtCateName.required'=>"Tên danh mục không được để trống!"],
    		['txtCateName.unique'=>"Tên danh mục đã tồn tại! Vui lòng nhập một tên khác!"],
    	);
    	$cate = Cate::find($id);
    	$cate->name = $request->txtCateName;
    	$cate->save();
    	return redirect()->route('list-category.show')->with(['flash_level'=>'success','flash_message'=>'Edit category successfully!']);
    }

    public function destroy($id){
    	$cate = Cate::find($id);
    	$cate->delete();
    	return redirect()->route('list-category.show')->with(['flash_level'=>'success','flash_message'=>'Delete successfully!']);
    }
}
