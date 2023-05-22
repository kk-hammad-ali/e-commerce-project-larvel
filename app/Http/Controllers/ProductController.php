<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
  
class ProductController extends Controller{

    public function index(){
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){
        return view('products.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }
        $product = new Product();
        $product->name = $input['name'];
        $product->detail = $input['detail'];
        $product->price = $input['price'];
        $product->image = $input['image'];
        $product->category = $input['category'];
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product){
        return view('products.edit',compact('product'));
    }

    // public function showSingleProduct($id){
    //     $product = Product::find($id);
    //     return view('singleproduct', compact('product'));
    // }

    public function update(Request $request, Product $product){
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            if ($product->image && Storage::exists('image/' . $product->image)) {
                Storage::delete('image/' . $product->image);
            }
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        } else {
            unset($input['image']);
        }
        $product->name = $input['name'];
        $product->detail = $input['detail'];
        $product->price = $input['price'];
        $product->category = $input['category'];
        if (isset($input['image'])) {
            $product->image = $input['image'];
        }
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
    public function categorywise(){
        $menCategory = 'men';
        $womenCategory = 'women';
        $kidsCategory = 'kids';

        $menProducts = Product::where('category', $menCategory)->latest()->get();
        $womenProducts = Product::where('category', $womenCategory)->latest()->get();
        $kidsProducts = Product::where('category', $kidsCategory)->latest()->get();

        return view('welcome', compact('menProducts', 'womenProducts', 'kidsProducts'));
    }
}   