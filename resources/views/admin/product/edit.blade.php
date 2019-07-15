@extends('admin.master')

@section('title','Edit product')

@section('pageTitle','Product')

@section('function','Edit')

@section('content')
<?php 
function list_category($cate, $select=0){
    foreach ($cate as $key => $value) {
        $name = $value["name"];
        $id=$value["id"];
        if ($select != 0 && $id == $select) {
            echo "<option value='$id' selected='selected'>$name</option> ";
        }else{
            echo "<option value='$id'>$name</option> ";
        }
        // list_category($cate,$id);
    }
}
?>
<style type="text/css">
    .img-curent{
        width: 150px;
    }
    .img-detail{
        width: 100px;
        height: 100px;
        margin-bottom: 20px
    }
    .icon-del{
        position: relative;
        top: -75px;
        left: -20px;
    }
</style>
<form action="" method="POST" enctype="multipart/form-data" name="frmEditProduct">
    <div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.blocks.error')

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Danh mục sản phẩm *</label><br>
            <select class="form-control" name="sltCate">
                <option value="">--Select--</option>
                <?php list_category($cate, $product["cate_id"]); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tên sản phẩm *</label>
            <input class="form-control" name="txtName" placeholder="Điền tên sản phẩm" value="{!! old('txtName', isset($product)? $product['name']:null) !!}" />
        </div>
        <div class="form-group">
            <label>Đơn giá *</label>
            <input class="form-control" name="txtPrice" placeholder="Điền đơn giá sản phẩm" value="{!! old('txtPrice', isset($product)? $product['price']:null) !!}" />
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="txtContent" class="ckeditor">{!! old('txtContent', isset($product)? $product['description']:null) !!}</textarea>
        </div>
        <div class="form-group">
            <label>Ảnh đại diện hiện tại *</label><br>
            <img src="{!! asset('pictures/'.$product['image']) !!}" class="img-curent">
            <input type="hidden" name="img_current" value="{!!$product['image']!!}">
        </div>
        <div class="form-group">
            <label>Ảnh đại diện thay thế </label>
            <input type="file" name="fImages" value="{!! old('fImages', isset($product)? $product['image']:null) !!}">
        </div>
        <button type="submit" class="btn btn-default">Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
        <label>Ảnh chi tiết sản phẩm</label>
        @foreach($product_image as $key => $item)
        <div class="form-group" id="{!! $key+1 !!}">
            <label>Hình ảnh {!! $key+1 !!}</label><br>
            <img src="{!! asset('pictures/Details/'.$item['image']) !!}" class="img-detail" idHinh="{!! $item['id'] !!}" id="{!! $key+1 !!}"/>
            <a href="javascrip:void(0)" type="button" id="del_img_demo" class="btn btn-danger btn-circle icon-del">x</a>
        </div>
        @endforeach
        <button type="button" class="btn btn-primary" id="addImageDetails">Thêm ảnh</button>
        <div id="insert"></div>
    </div>
</form>
@endsection()