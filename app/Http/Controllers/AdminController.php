<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AdminController extends Controller
{
    // use AuthenticatesUsers;

    //

    public function __construct()
    {
        $this->middleware(['admin'])->except('home', 'login', 'logout');
        # code...
    }
    public function home(Request $request)
    {
        // $admin = Auth::guard('admin');
        // if ($request->session()->has('admin')) 
        {

            return redirect('admin/dashboard');
        }

        //     return view('admin/login');
    }
    public function login(Request $request)
    {

        return redirect('admin/dashboard');

        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required|min:3'
        // ]);
        // $admin = Admin::select('email', 'password', 'name')->where('email', $request->email)->get();

        // if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // $request->session()->put('admin',  $admin[0]->name);
        // if successful, redirect to intended location
        // return redirect()->intended('admin/dashboard');
        // } else {
        //     return back()->withInput($request->only('email'));
        // }



        // $credentials = $request->only('email', 'password');
        // $admin = $request->email;


        // return  response()->json([  $admin = auth('admin')]);



        // return $request->email;
        // return $dmin = Admin::findorfail($request->email);
        // $admin = Admin::where('email', $request->email)->first();



        // if (!$admin || !Hash::check($request->password, $admin->password)) {
        //     return back()->with('error', 'not matched');
        // }
        // Auth::guard('admin');
        // $request->session()->put('admin', $admin);
        // return view('admin/dashboard');
    }


    // public function logout(Request $request)
    // {
    //     Auth::guard('admin');
    //     if ($request->session()->has('admin')) {
    //         $request->session()->forget('admin');
    //     }
    //     return view('admin/login');
    // }


    public function show(Request $request)
    {
        // $admin = Auth::guard('admin');
        // $request->session()->has('admin');
        // if ($request->session()->has('admin')) 

        // if ($request->session()->has('user'))
        {
            $products = Product::paginate(5);
            $orders = Order::paginate(10);
            $users = User::where('admin', 0)->where('pending', 0)->paginate(5);
            $admins = Admin::paginate(5);
            $pending_users = User::where('pending', 1)->paginate(5);
            return view('admin/dashboard', [
                'products' => $products,
                'orders' => $orders,
                'users' => $users,
                'admins' => $admins,
                'pending_users' => $pending_users,
            ]);
        }

        // return view('admin/login');
    }

    // products roles

    public function addProduct()
    {
        return view('admin.product.addproduct');
    }
    public function storeProduct(Request $request)
    {
        // $userid = Auth::user('id')->admin_status;
        // return $request->gallary;

        $file_ext =  $request->gallary->getClientOriginalExtension();
        $file_name = time() . '.' . $file_ext;
        $path = './images/products';
        $request->gallary->move($path, $file_name);

        $newProduct = new Product;
        $newProduct->name = $request->name;
        $newProduct->description = $request->description;
        $newProduct->price = $request->price;
        $newProduct->category  = $request->category;
        $newProduct->gallary = $file_name;
        $newProduct->save();

        return redirect('/admin/all-products')->with(['success' => 'Done']);
    }
    public function showProduct($product_id)
    {
        $product =  Product::findorfail($product_id);
        return view('admin.product.showproduct', ['product' =>  $product]);
    }
    public function allProducts()
    {
        $products = Product::All();

        return view('admin.product.allproducts', ['products' => $products]);
    }
    public function editProduct($product_id)
    {
        $product =  Product::findorfail($product_id);
        return view('admin.product.editproduct', ['product' => $product]);
    }
    public function UpdateProduct(Request $request, $product_id)
    {
        $product = Product::where('id', $product_id);

        $file_ext =  $request->gallary->getClientOriginalExtension();
        $file_name = time() . '.' . $file_ext;
        $path = './images/products';
        $request->gallary->move($path, $file_name);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'gallary' =>  $file_name,

        ]);
        return  redirect('/admin/all-products')->with($request->session()->flash('success', 'Done'));
    }
    public function deleteProduct($product_id)
    {
        $product = Product::where('id', $product_id);
        $product->delete();
        return back()->with(['success' => 'Done']);
    }

    // members roles

    public function addMember()
    {
        return view('admin.member.newmember');
    }
    public function storeMember(Request $request)
    {
        // $userid = Auth::user('id')->admin_status;
        // return $request->gallary;
        // return  $request;
        $newMember = new User;
        $newMember->name = $request->name;
        $newMember->email = $request->email;
        $newMember->password = bcrypt($request->password);
        $newMember->save();

        return redirect('/admin/all-members')->with(['success' => 'Done']);
    }
    // public function showMember($product_id)
    // {
    //     $product =  Product::findorfail($product_id);
    //     return view('admin.product.showproduct', ['product' =>  $product]);
    // }
    public function allMembers()
    {
        $users = User::All()->where('admin', '0');

        return view('admin.member.members', ['users' => $users]);
    }
    public function editMember($member_id)
    {
        $users =  User::findorfail($member_id);
        return view('admin.member.editmember', ['users' => $users]);
    }
    public function UpdateMember(Request $request, $member_id)
    {
        $users = User::where('id', $member_id);

        // $file_ext =  $request->gallary->getClientOriginalExtension();
        // $file_name = time() . '.' . $file_ext;
        // $path = './images/products';
        // $request->gallary->move($path, $file_name);

        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            // 'gallary' =>  $file_name,

        ]);
        return  redirect('/admin/all-members')->with($request->session()->flash('success', 'Done'));
    }
    public function deleteMember($member_id)
    {
        $users = User::where('id', $member_id);
        $users->delete();
        return back()->with(['success' => 'Done']);
    }


    public function editPendingMember($member_id)
    {
        $users =  User::findorfail($member_id);
        return view('admin.member.editpendingmembers', ['users' => $users]);
    }
    public function UpdatePendingMember(Request $request, $member_id)
    {
        $users = User::where('id', $member_id);


        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'pending' => $request->pending,

        ]);
        return  redirect('/admin/all-members')->with($request->session()->flash('success', 'Done'));
    }

    // Orders roles

    public function addOrder()
    {
        return view('admin.order.addorder');
    }
    public function storeOrder(Request $request)
    {
        // $userid = Auth::user('id')->admin_status;
        // return $request->gallary;

        // $file_ext =  $request->gallary->getClientOriginalExtension();
        // $file_name = time() . '.' . $file_ext;
        // $path = './images/products';
        // $request->gallary->move($path, $file_name);

        $neworder = new Order;
        $neworder->name = $request->name;
        $neworder->user_id = $request->user_id;
        $neworder->product_id = $request->product_id;
        $neworder->delivery_status = $request->delivery_status;
        $neworder->cash_status  = $request->cash_status;
        $neworder->payment_method  = $request->payment_method;
        $neworder->total_price  = $request->total_price;
        $neworder->save();

        return redirect('/admin/all-orders')->with(['success' => 'Done']);
    }
    public function showOrder($order_id)
    {
        $order =  Order::findorfail($order_id);
        return view('admin.order.showorder', ['order' =>  $order]);
    }
    public function allOrders()
    {
        $order = Order::paginate(10);

        return view('admin.order.orders', ['orders' => $order]);
    }
    public function editOrder($order_id)
    {
        $order  =  Order::findorfail($order_id);
        return view('admin.order.editorder', ['order' => $order]);
    }
    public function UpdateOrder(Request $request, $order_id)
    {
        $order = Order::where('id', $order_id);

        // $file_ext =  $request->gallary->getClientOriginalExtension();
        // $file_name = time() . '.' . $file_ext;
        // $path = './images/products';
        // $request->gallary->move($path, $file_name);

        $order->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'delivery_status' => $request->delivery_status,
            'cash_status' => $request->cash_status,
            'payment_method' => $request->payment_method,
            'total_price' => $request->total_price,

        ]);
        return  redirect('/admin/all-orders')->with($request->session()->flash('success', 'Done'));
    }
    public function deleteOrder($order_id)
    {
        $product = Order::where('id', $order_id);
        $product->delete();
        return back()->with(['success' => 'Done']);
    }
}