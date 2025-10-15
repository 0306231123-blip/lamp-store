@extends('layout.layout_admin')

@section('title', 'Thêm sản phẩm')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thêm sản phẩm mới</h1>
        <p>Nhập thông tin sản phẩm</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-10">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('sanpham.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="TenSP" class="form-control" placeholder="Nhập tên sản phẩm" required>
            </div>

            <div class="form-group">
                <label>Giá</label>
                <input type="number" name="Gia" class="form-control" placeholder="Nhập giá sản phẩm" required>
            </div>

            <div class="form-group">
                <label>Giá khuyến mãi</label>
                <input type="number" name="GiaKhuyenMai" class="form-control" placeholder="Nhập giá khuyến mãi (nếu có)">
            </div>

            <div class="form-group">
                <label>Loại sản phẩm</label>
                <input type="text" name="Loai" class="form-control" placeholder="Ví dụ: Đèn học, Đèn trang trí" required>
            </div>

            <div class="form-group">
                <label>Trạng thái</label>
                <select name="TrangThai" class="form-control" required>
                    <option value="Còn hàng">Còn hàng</option>
                    <option value="Hết hàng">Hết hàng</option>
                </select>
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="MoTa" class="form-control" rows="3" placeholder="Nhập mô tả sản phẩm"></textarea>
            </div>

            <div class="form-group">
                <label>Hình ảnh</label>
                <input type="file" name="Hinh" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">+ Thêm sản phẩm</button>
            <a href="{{ url('/index_admin') }}" class="btn btn-default">Quay lại</a>
        </form>
    </div>
</div>

<hr>

<!-- ✅ Bảng hiển thị danh sách sản phẩm -->
<div class="row" style="margin-top: 30px;">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Danh sách sản phẩm hiện có
            </div>
            <div class="panel-body">
                @if(isset($products) && count($products) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Mã SP</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Giá KM</th>
                                    <th>Hình ảnh</th>
                                    <th>Mô tả</th>
                                    <th>Loại</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->MaSP }}</td>
                                        <td>{{ $product->TenSP }}</td>
                                        <td>{{ number_format($product->Gia, 0, ',', '.') }} đ</td>
                                        <td>{{ number_format($product->GiaKhuyenMai, 0, ',', '.') }} đ</td>
                                        <td>
                                            @if($product->Hinh)
                                                <img src="{{ asset('uploads/'.$product->Hinh) }}" width="70" height="70">
                                            @else
                                                <span>Không có ảnh</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->MoTa }}</td>
                                        <td>{{ $product->Loai }}</td>
                                        <td>{{ $product->TrangThai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Hiện chưa có sản phẩm nào trong hệ thống.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
