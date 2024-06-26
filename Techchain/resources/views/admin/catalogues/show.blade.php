@extends('admin.layouts.master')
@section('title')
    Chi tiết danh mục sản phẩm
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Form Layout</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Layout</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Chi tiết danh mục {{ $model->name }}</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <a href="{{ route('admin.catalogues.index') }}" class="btn btn-secondary m-3">Quay lại</a>

                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.catalogues.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <!-- Row 1 -->
                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $model->name }}" disabled>
                                        <label for="name">Tên danh mục</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <img src="{{ \Storage::url($model->cover) }}" alt="" width="100px">
                                </div>

                                <!-- Row 2 -->
                                <div class="col-lg-12">
                                    <label for="is_active" class="form-label">Is Active:</label>
                                    {!! $model->is_active
                                        ? ' <span class="badge bg-danger">No</span>'
                                        : ' <span class="badge bg-success">Yes</span>' !!}
                                </div>

                                <!-- Row 3 -->
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        {{-- <a href="{{ route('admin.catalogues.edit', $model->id) }}" type="submit" class="btn btn-primary">Sửa</button> --}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-libs')
    <script src="{{ asset('theme/admin/assets/libs/prismjs/prism.js') }}"></script>
@endsection


