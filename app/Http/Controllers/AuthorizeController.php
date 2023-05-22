<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
class AuthorizeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    } 
    public function contact()
    {
        return view('contact');
    } 
    public function about()
    {
        return view('about');
    } 
    public function dashboard()
    {
        return view('dashboard');
    } 
    public function viewlogin()
    {
        return view('login');
    }  
    public function viewregister()
    {
        return view('signup');
    }  
    public function product()
    {
        return view('products');
    }     
    public function cart()
    {
        return view('cart');
    }     
    public function singleproduct()
    {
        return view('singleproduct');
    }     

    public function loginpost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;
            if ($role == '1') {
                $products = Product::latest()->paginate(5);
                return view('products.index', compact('products'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
            } else {
                return view('welcome');
            }
        }
    }
    public function store(Request $request)
    {  
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','Registered Successfull');
    } 

}