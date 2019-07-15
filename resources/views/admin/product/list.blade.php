@extends('admin.master')

@section('title','List product')

@section('pageTitle','Product')

@section('function','List')

@section('content')

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Danh mục</th>
            <th>Tên</th>
            <th>Đơn giá (VNĐ)</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt=0 ?>
        @foreach($data as $item)
        <?php $stt = $stt + 1 ?>
        <tr class="odd gradeX" align="center">
            <td>{!! $stt !!}</td>
            <td>
                <?php $cate = DB::table('cates')->where('id', $item['cate_id'])->first() ?>
                @if(!empty($cate->name))
                    {!! $cate->name !!}
                @endif
            </td>
            <td>{!! $item["name"] !!}</td>
            <td>{!! number_format($item["price"],0,",",".") !!} </td>
            <td>{!! $item["image"] !!}</td>
            <td>{!! $item["description"] !!}</td>
            <td class="center">
                <i class="fa fa-trash-o  fa-fw"></i>
                <a href="{!! URL::route('edit-product.edit',$item['id']) !!}"> Sửa</a>
            </td>
            <td class="center">
                <i class="fa fa-pencil fa-fw"></i> 
                <a onclick="return DeleteConfirm('Are you sure?')" href="{!! URL::route('delete-product.destroy',$item['id']) !!}">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection()