<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    //     $this->middleware('role:admin')->except(['index', 'show']);
    // }

    public function index(){
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // IMAGE UPLOAD
       // Custom directory
    $uploadPath = 'images/uploads/product_images/';

    $imageURL = null;

    if ($request->hasFile('image')) {

        $imageName = time().'.'.$request->image->extension();

        // Save to your custom folder inside public/
        $request->image->move(public_path($uploadPath), $imageName);

        // Save full URL or relative path (your choice)
        $imageURL = $uploadPath . $imageName;   // relative path
        // or full URL:
        // $imageURL = url($uploadPath . $imageName);
    }

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $imageURL,
    ]);

        return redirect()->route('products.index');
    }

    public function show(Product $product){
        return view('products.show', compact('product'));
    }

    public function edit(Product $product){
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product){
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        

        // NEW IMAGE UPLOAD
       $uploadPath = 'uploads/product_images/';
       $imageURL = $product->image;

    if ($request->hasFile('image')) {

        // old image delete
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path($uploadPath), $imageName);

        $imageURL = $uploadPath . $imageName;
    }

    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $imageURL,
    ]);


        return redirect()->route('products.index');
    }

    public function destroy(Product $product){
        // Delete image
        if($product->image && file_exists(public_path('products/'.$product->image))){
            unlink(public_path('products/'.$product->image));
        }

        $product->delete();
        return redirect()->route('products.index');
    }
}
