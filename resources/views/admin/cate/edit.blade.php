@extends('admin.master')

@section('title','Edit Category')

@section('pageTitle','Category')

@section('function','Edit')

@section('content')

<div class="col-lg-7" style="padding-bottom:120px">
    @if (count($errors) > 0)
    <div id="edit-cate" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Tên danh mục</label>
            <input class="form-control" name="txtCateName" value="{!! old('txtCateName', isset($data)? $data['name']:null) !!}" />
        </div>
        <button type="submit" class="btn btn-default">Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>

@endsection()