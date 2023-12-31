@extends('admin.master');


@section('main-content')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Add Category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('store.category') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                               
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Category Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name" id="category_name"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Category Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" class="form-control" name="category_image" id="photo"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <img src="{{ url('upload/2.png') }}" alt="Admin"
                                        class="rounded-circle p-1" style="width: 120px; height: 120px" id="show_image">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                    </div>
                                </div>

                            </form>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- For Dynamic Image Change jquery Code --}}

    <script type="text/javascript">

            $(document).ready(function(){
                $("#photo").change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $("#show_image").attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0'])
                });
            });

    </script>

@endsection
