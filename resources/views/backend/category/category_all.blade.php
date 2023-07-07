@extends('admin.master');


@section('main-content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Category</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ Route('add.category') }}" class="btn btn-primary btn-sm">Add Category</a>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            dd($categories)
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <img src="{{ (!empty($category->category_image)? url('upload/category/'.$category->category_image): url('upload/2.png')) }}" alt="{{ $category->category_name }}" width="120" height="120">
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-secondary">Show</a>
                                        <a href="" class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{ route('delete.category', $category->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#SL</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
