@extends('admin.master')

@section('title','List category')

@section('pageTitle','Category')

@section('function','List')

@section('content')

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt=0 ?>
        @foreach($data as $item)
        <?php  $stt= $stt + 1  ?>
        <tr class="odd gradeX" align="center">
            <td>{!! $stt !!}</td>
            <td>{!! $item["name"] !!}</td>
            <td class="center">
                <i class="fa fa-trash-o  fa-fw"></i>
                <a onclick="return DeleteConfirm('Are you sure?')" href="{!! URL::route('delete-category.destroy',$item['id']) !!}"> Delete</a>
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('edit-category.edit',$item['id']) !!}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection()