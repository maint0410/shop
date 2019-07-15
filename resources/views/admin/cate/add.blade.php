@extends('admin.master')

@section('title','Add Category')

@section('pageTitle','Category')

@section('function','Add')

@section('content')


<div class="col-lg-7" style="padding-bottom:120px">

    @include('admin.blocks.error')
    
    <form action="{!! route('add-category.index') !!}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Tên danh mục</label>
            <input class="form-control" name="txtCateName" placeholder="Vui lòng điền tên danh mục" />
        </div>
        <!-- <div class="form-group">
            <label>Trạng thái</label><br>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" checked="" type="radio">Hiển thị
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="2" type="radio">Ẩn
            </label>
        </div> -->
        <button type="submit" class="btn btn-default">Thêm</button>
        <button type="reset" class="btn btn-default">Làm mới</button>
    </form>
</div>

@endsection