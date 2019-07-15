@extends('admin.master')

@section('title','Add product')

@section('pageTitle','Product')

@section('function','Add')

@section('content')

<?php 
function list_category($cate,$select=0){
    foreach ($cate as $key => $value) {
        $name = $value["name"];
        $id=$value["id"];
        if ($select != 0 && $id == $select) {
            echo "<option value='$id' select='selected'>$name</option> ";
        }else{
            echo "<option value='$id'>$name</option> ";
        }
        // list_category($cate,$id);
    }
}
?>
<form action="{!! route('add-product.create') !!}" method="POST" enctype="multipart/form-data">
    <div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.blocks.error')
        
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Danh mục sản phẩm *</label><br>
            <select class="form-control" name="sltCate">
                <option value="">--Select--</option>
                <?php list_category($cate); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tên sản phẩm *</label>
            <input class="form-control" name="txtName" placeholder="Điền tên sản phẩm" />
        </div>
        <div class="form-group">
            <label>Đơn giá *</label>
            <input class="form-control" name="txtPrice" placeholder="Điền đơn giá sản phẩm" />
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="txtContent" class="ckeditor"> </textarea>
        </div>
        <div class="form-group">
            <label>Ảnh đại diện *</label>
            <input type="file" name="fImages">
        </div>
        <button type="submit" class="btn btn-default">Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
        <label>Ảnh chi tiết sản phẩm</label>
        @for($i=1; $i<=3;$i++)
        <div class="form-group">
            <label>Ảnh {!! $i !!}</label>
            <input type="file" name="fProductDetail[]">
        </div>
        @endfor
    </div>
</form>
@endsection()