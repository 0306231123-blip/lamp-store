<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class SanPhamController extends Controller
{
    public function index()
    {
        // ✅ Hiển thị danh sách sản phẩm
        $products = SanPham::all();
        return view('admin.add_product', compact('products'));
    }

    public function create()
    {
        // ✅ Khi bấm "Thêm mới" vẫn hiển thị danh sách
        $products = SanPham::all();
        return view('admin.add_product', compact('products'));
    }

    public function store(Request $request)
    {
        $product = new SanPham();
        $product->TenSP = $request->TenSP;
        $product->Gia = $request->Gia;
        $product->GiaKhuyenMai = $request->GiaKhuyenMai ?? 0;
        $product->Loai = $request->Loai;
        $product->TrangThai = $request->TrangThai;
        $product->MoTa = $request->MoTa;
        $product->MaDM = 0;
        $product->Tags = '';
        $product->UserID = 1;

        if ($request->hasFile('Hinh')) {
            $file = $request->file('Hinh');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $product->Hinh = $filename;
        }

        $product->save();
        
       return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');

    }
}
