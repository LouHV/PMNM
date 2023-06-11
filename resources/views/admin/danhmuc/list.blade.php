@extends('admin.main')
@section('content')
<form action="/admin/danhmuc/list" class = "form-inline" method="GET">
<a href="/admin/danhmuc/list" class="btn bg-blue">Reset</a>
    <div class="form-group">
        <lable class="sr-only" for=" ">lable</lable>
        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo tên">
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-search" aria-hidden="true"></i>
    </button>
</form>
<div class="functionalBTN d-flex gap-3 align-items-center w-100 justify-content-start my-2" style="gap:.5rem" >
        @include('share.error')
        <button type="button" class="btn btn-warning text-white ml-1" data-toggle="modal" data-target="#modal-warning">
            Cài đặt phân trang
        </button>
        <a href="{{ request()->fullUrlWithQuery(['order' => 'asc']) }}" class="btn btn-info">Order by ID (ASC)</a>
        <a href="{{ request()->fullUrlWithQuery(['order' => 'desc']) }}" class="btn btn-info">Order by ID (DESC)</a>
</div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Vị trí</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($danhmucs as $danhmuc)
                <tr>
                    <td>{{$danhmuc->id}}</td>
                    <td>{{$danhmuc->MaDM}}</td>
                    <td>{{$danhmuc->TenDM}}</td>
                    <td>{!! $danhmuc->MoTa !!}</td>
                    <td>{{$danhmuc->Vitri}}</td>
                    <td><a class="btn btn-primary mr-3" href="/admin/danhmuc/edit/{{$danhmuc->id}}"><i class="fa fa-edit "></i></a>
                        <a class="btn btn-danger" href="#" onclick="Delete({{$danhmuc->id}},'/admin/danhmuc/delete')"><i class = "fa fa-trash"></i></a>
                    </td>
                </tr
            @endforeach
        </tbody>
    </table>
{{ $danhmucs->appends($_GET)->links() }}
@endsection
