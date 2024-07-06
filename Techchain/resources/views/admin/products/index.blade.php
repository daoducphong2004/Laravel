@extends('admin.layouts.master')
@section('title')
    Danh sách sản phẩm
@endsection
@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Datatables</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Datatables</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Danh sách</h5>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-success">Thêm mới</a>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10px;">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                    </div>
                                </th>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Sku</th>
                                <th>Ảnh</th>
                                <th>Giá bán</th>
                                <th>Giá sale</th>
                                <th>View</th>
                                <th>Trạng thái</th>
                                <th>Bán chạy</th>
                                <th>Giá tốt</th>
                                <th>Mới</th>
                                <th>Hiện thị</th>
                                <th>Tag</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                                value="option1">
                                        </div>
                                    </th>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->catalogue->name }}</td>
                                    <td>{{ $item->sku }}</td>
                                    <td>
                                        @php
                                            $url = $item->img_thumbnail;
                                            if (!\Illuminate\Support\Str::contains($url, 'http')) {
                                                $url = \Illuminate\Support\Facades\Storage::url($url);
                                            }
                                        @endphp
                                        <img src="{{ $url }}" alt="" width="100px">
                                    </td>
                                    <td>{{ $item->price_regular }}</td>
                                    <td>{{ $item->price_sale }}</td>
                                    <td>{{ $item->view }}</td>
                                    <td>{!! $item->is_active ? '<span class="badge bg-danger">No</span>' : '<span class="badge bg-success">Yes</span>' !!}</td>
                                    <td>{!! $item->is_hot_deal ? '<span class="badge bg-danger">No</span>' : '<span class="badge bg-success">Yes</span>' !!}</td>
                                    <td>{!! $item->is_good_deal
                                        ? '<span class="badge bg-danger">No</span>'
                                        : '<span class="badge bg-success">Yes</span>' !!}</td>
                                    <td>{!! $item->is_new ? '<span class="badge bg-danger">No</span>' : '<span class="badge bg-success">Yes</span>' !!}</td>
                                    <td>{!! $item->is_show_home
                                        ? '<span class="badge bg-danger">No</span>'
                                        : '<span class="badge bg-success">Yes</span>' !!}</td>
                                    <td>
                                        @foreach ($item->tags as $tag)
                                            <span class="badge bg-info">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('admin.products.show', $item) }}"
                                                        class="dropdown-item"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                                </li>
                                                <li><a href="{{ route('admin.products.edit', $item) }}"
                                                        class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit</a></li>
                                                <li>
                                                    <form action="{{ route('admin.products.destroy', $item) }} " method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item edit-item-btn" onclick="return confirm('Are you sure?')"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div @endsection @section('script-libs') <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script>
        new DataTable("#example")
        order([
            [0, 'desc']
        ]);
    </script>
@endsection
