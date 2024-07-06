@extends('admin.layouts.master')

@section('style-libs')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- quill css -->
    <link href="{{ asset('theme/admin/assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/admin/assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title')
    Chi tiết sản phẩm {{ $product->name }}
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
                    <h4 class="card-title mb-0 flex-grow-1">Chi tiết sản phẩm {{ $product->name }}</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary m-3">Quay lại</a>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <!-- Row 1 -->
                            <div class="col-lg-12">
                                <label class="form-label">Danh mục sản phẩm</label>
                                <input type="text" class="form-control" name="catalogue_id"
                                    value="{{ $product->catalogue ? $product->catalogue->name : 'N/A' }}" readonly>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}"
                                    readonly>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Sku sản phẩm</label>
                                <input type="text" class="form-control" name="sku" value="{{ $product->sku }}"
                                    readonly>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Ảnh sản phẩm</label>
                                <img src="{{ \Storage::url($product->img_thumbnail) }}" alt="" width="100px">
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Chất liệu sản phẩm</label>
                                <textarea name="material" class="form-control" id="material" cols="10" rows="2" readonly>{{ $product->material }}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Giá bán sản phẩm</label>
                                <input type="text" class="form-control" name="price_regular"
                                    value="{{ $product->price_regular }}" readonly>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Giá sale sản phẩm</label>
                                <input type="text" class="form-control" name="price_sale"
                                    value="{{ $product->price_sale }}" readonly>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Mô tả sản phẩm</label>
                                <textarea name="description" class="form-control" id="description" cols="10" rows="4" readonly>{{ $product->description }}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Nội dung sản phẩm</label>
                                <textarea name="content" class="form-control" id="content" cols="10" rows="8" readonly>{{ $product->content }}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Hướng dẫn sử dụng</label>
                                <textarea name="user_manual" class="form-control" id="user_manual" cols="10" rows="5" readonly>{{ $product->user_manual }}</textarea>
                            </div>
                            <!-- Row 2 -->
                            <div class="col-lg-12">
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="is_active">Is active</label>
                                    {!! $product->is_active
                                        ? '<span class="badge bg-success">Yes</span>'
                                        : '<span class="badge bg-danger">No</span>' !!}
                                </div>
                                <div class="form-check form-switch form-switch-secondary">
                                    <label class="form-check-label" for="is_hot_deal">Is hot deal</label>
                                    {!! $product->is_hot_deal
                                        ? '<span class="badge bg-success">Yes</span>'
                                        : '<span class="badge bg-danger">No</span>' !!}
                                </div>
                                <div class="form-check form-switch form-switch-success">
                                    <label class="form-check-label" for="is_good_deal">Is good deal</label>
                                    {!! $product->is_good_deal
                                        ? '<span class="badge bg-success">Yes</span>'
                                        : '<span class="badge bg-danger">No</span>' !!}
                                </div>
                                <div class="form-check form-switch form-switch-warning">
                                    <label class="form-check-label" for="is_new">Is new</label>
                                    {!! $product->is_new ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>' !!}
                                </div>
                                <div class="form-check form-switch form-switch-danger">
                                    <label class="form-check-label" for="is_show_home">Is show home</label>
                                    {!! $product->is_show_home
                                        ? '<span class="badge bg-success">Yes</span>'
                                        : '<span class="badge bg-danger">No</span>' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Variants Section -->
    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Biến thể sản phẩm</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <!-- Variants Table -->
                            <table class="table table-bordered">
                                <thead class="thead-light text-center">
                                    <tr>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Số lượng</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($sizes as $sizeID => $sizeName)
                                        @foreach ($colors as $colorID => $colorName)
                                            <tr>
                                                <td>{{ $sizeName }}</td>
                                                <td>
                                                    <div
                                                        style="width: 50px; height: 50px; background-color: {{ $colorName }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="product_variants[{{ $sizeID . '-' . $colorID }}][quantity]"
                                                        value="100" readonly>
                                                </td>
                                                <td>
                                                    <input type="file" class="form-control"
                                                        name="product_variants[{{ $sizeID . '-' . $colorID }}][images]"
                                                        disabled>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
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
                            <div class="col-lg-12">
                                <label class="form-label">Upload Images</label>
                                <input type="file" class="form-control" name="product_gallery[]" multiple="multiple"
                                    disabled>
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
                            <label class="form-label">Tag</label>
                            <input type="text" class="form-control" name="tag_id"
                                value="{{ $product->tag ? $product->tag->name : 'N/A' }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('script-libs')
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
