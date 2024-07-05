<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }


    public function store(ProductRequest $request)
    {
        Product::create($request->validated());
        return redirect('products')->with('success', 'Thêm sản phẩm thành công');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }


    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());
        return redirect('products')->with('success', 'Cập nhật thành công.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Người dùng không tồn tại'
            ], 404);
        }

        // Xóa
        $product->delete();

        // Trả về phản hồi thành công
        return response()->json([
            'message' => 'Xóa người dùng thành công'
        ], 200);
    }
}
