<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class ProductController extends Controller
{
    //show product design
    public function ShowProductPage()
    {
        $products = Product::with('staff')
            ->where('StaffID', session('admin')->StaffID)
            ->get();
        return view('admin.products', compact('products'));
    }
    // add products
    public function AddProducts(Request $request)
    {
        // insert to database
        Product::create([
            'StaffID'      => session('admin')['StaffID'],
            'ProductName'  => $request->pName,
            'ProductQty'   => $request->pQty,
            'ProductPrice' => $request->pPrice,
        ]);
        // redirect to products and message
        return redirect()->back()->with('success', 'Product added successfully!');
    }
    // update table information
    public function EditProducts(Request $request)
    {
        // change infrmation fo the id
        Product::where('ProductID', $request->editid)->update([
            'ProductName'  => $request->editpname,
            'ProductQty'   => $request->editqty,
            'ProductPrice' => $request->editprice,
        ]);
        // redirect to products and message
        return back()->with('success', 'Product updated successfully!');
    }

    // delete table information
    public function DeleteProducts(Request $request)
    {
        // delete user id
        Product::where('ProductID', $request->deleteid)->delete();
        // redirect back and message
        return back()->with('success', 'Product deleted successfully!');
    }
}
