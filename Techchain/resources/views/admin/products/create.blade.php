@extends('admin.layouts.master')

@section('style-libs')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- quill css -->
    <link href="{{ asset('theme/admin/assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title')
    Thêm mới sản phẩm
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
    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thêm sản phẩm</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <a href="{{ route('admin.catalogues.index') }}" class="btn btn-secondary m-3">Quay lại</a>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row">
                                <!-- Row 1 -->
                                <div class="col-lg-12">
                                    <label class="form-label">Danh mục sản phẩm</label>
                                    <select class="js-example-basic-single" name="catalogue_id">
                                        @foreach ($catalogues as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Sku sản phẩm</label>
                                    <input type="text" class="form-control" name="sku" value="{{ strtoupper(Str::random(10)) }}">
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Ảnh sản phẩm</label>
                                    <input class="form-control" type="file" id="formFile" name="img_thumbnail">
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Chất liệu sản phẩm</label>
                                    <textarea name="material" class="form-control" id="material" cols="10" rows="2"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Giá bán sản phẩm</label>
                                    <input type="text" class="form-control" name="price_regular">
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Giá sale sản phẩm</label>
                                    <input type="text" class="form-control" name="price_sale">
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Mô tả sản phẩm</label>
                                    <textarea name="description" class="form-control" id="description" cols="10" rows="5"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Nội dung sản phẩm</label>
                                    <textarea name="content" class="form-control" id="content" cols="10" rows="8"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Hướng dẫn sử dụng</label>
                                    <textarea name="user_manual" class="form-control" id="user_manual" cols="10" rows="4"></textarea>
                                </div>
                                <!-- Row 2 -->
                                <div class="col-lg-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="is_active" checked>
                                        <label class="form-check-label" for="is_active">Is active</label>
                                    </div>
                                    <div class="form-check form-switch form-switch-secondary">
                                        <input class="form-check-input" type="checkbox" role="switch" id="is_hot_deal" checked>
                                        <label class="form-check-label" for="is_hot_deal">Is hot deal</label>
                                    </div>
                                    <div class="form-check form-switch form-switch-success">
                                        <input class="form-check-input" type="checkbox" role="switch" id="is_good_deal" checked>
                                        <label class="form-check-label" for="is_good_deal">Is good deal</label>
                                    </div>
                                    <div class="form-check form-switch form-switch-warning">
                                        <input class="form-check-input" type="checkbox" role="switch" id="is_new" checked>
                                        <label class="form-check-label" for="is_new">Is new</label>
                                    </div>
                                    <div class="form-check form-switch form-switch-danger">
                                        <input class="form-check-input" type="checkbox" role="switch" id="is_show_home" checked>
                                        <label class="form-check-label" for="is_show_home">Is show home</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Biến thể sản phẩm</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row">
                                <!-- Row 1 -->
                                <table>
                                    <tr class="text-center">
                                        <th class="text-center">Size</th>
                                        <th class="text-center">Color</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Image</th>
                                    </tr>
                                    @foreach ($sizes as $sizeID => $sizeName)
                                        @foreach ($colors as $colorID => $colorName)
                                            <tr class="text-center">
                                                <td>{{ $sizeName }}</td>
                                                <td>
                                                    <div style="width: 50px; height: 50px; background-color: {{ $colorName }}"></div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="product_variants[{{ $sizeID . '-' . $colorID }}][quantity]" value="100">
                                                </td>
                                                <td>
                                                    <input type="file" class="form-control" name="product_variants[{{ $sizeID . '-' . $colorID }}][images]">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Gallery</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row">
                                <!-- Row 1 -->
                                <div class="col-lg-12">
                                    <label name="product_gallery_1" class="form-label">Name</label>
                                    <input type="file" class="form-control" name="product_gallery[]" multiple="multiple">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Tag</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="col-lg-4">
                                <h6 class="fw-semibold">Multi Select</h6>
                                <select class="js-example-basic-multiple" name="tags[]" multiple="multiple">
                                    @foreach ($tags as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
@section('script-libs')
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- select2 cdn -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- ckeditor -->
    <script src="{{ asset('theme/admin/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <!-- quill js -->
    <script src="{{ asset('theme/admin/assets/libs/quill/quill.min.js') }}"></script>
    <!-- init js -->
    <script src="{{ asset('theme/admin/assets/js/pages/form-editor.init.js') }}"></script>
    <script src="{{ asset('theme/admin/assets/js/pages/select2.init.js') }}"></script>
    <script src="{{ asset('theme/admin/assets/libs/prismjs/prism.js') }}"></script>
@endsection
