<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\checkout;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'pending'])->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()) {
            $userid =  Auth::user()->id ??  $userid = 0;
            $products = Product::All();
            $carts = Cart::ALL()->where('user_id', $userid);


            $order = Order::All()->where('user_id', $userid);

            $cart_sum = User::find($userid)->getProducts->sum('price');
            $user_products =  User::find($userid)->getProducts;

            return view('user.home', [
                'cart_sum' => $cart_sum,
                'products' => $products,
                'carts' => $carts,
                'user_products' => $user_products,
                'orders' => $order,
            ]);
        }
        $userid =  Auth::user()->id ??  $userid = 0;
        $products = Product::All();
        $carts = Cart::ALL()->where('user_id', $userid);


        $order = Order::All()->where('user_id', $userid);

        // $cart_sum = User::find($userid)->getProducts->sum('price') ??  $cart_sum = 0;
        // $user_products =  User::find($userid)->getProducts ??  $user_products = 0;

        return view('user.home', [
            // 'cart_sum' => $cart_sum,
            'products' => $products,
            'carts' => $carts,
            // 'user_products' => $user_products,
            'orders' => $order,
        ]);
    }
    public function products()
    {
        $products = Product::All();

        $order_sum = Order::All('total_price')->sum('total_price');

        $userid =  Auth::user()->id;
        $carts = Cart::ALL()->where('user_id', $userid);


        $order = Order::All()->where('user_id', $userid);
        $user_products =  User::find($userid)->getProducts;
        $cart_sum = User::find($userid)->getProducts->sum('price');

        return view('user.products',  [
            'order_sum' => $order_sum,
            'cart_sum' => $cart_sum,
            'orders' => $order,
            'products' => $products,
            'carts' => $carts,
            'user_products' => $user_products,
        ]);
    }
    public function showProducts($product_id)
    {
        $products = Product::All();



        $product = Product::Find($product_id);
        $userid =  Auth::user()->id;

        $carts = Cart::ALL()->where('user_id', $userid);


        $order = Order::All()->where('user_id', $userid);
        $order_sum = Order::All('total_price')->sum('total_price');

        $user_products =  User::find($userid)->getProducts;
        $cart_sum = User::find($userid)->getProducts->sum('price');


        return view('user.showproducts', [
            'order_sum' => $order_sum,
            'cart_sum' => $cart_sum,
            'products' => $products,
            'carts' => $carts,
            'orders' => $order,
            'user_products' => $user_products,
        ]);
    }
    public function AddToOrders($product_id)
    {
        $cart = Cart::find($product_id)->product_id;
        $product = Product::find($cart);
        $userid =  Auth::user()->id;
        $newCart = Order::insert([
            'user_id' => $userid,
            'product_id' => $product->id,
            'name' => $product->name,
            'delivery_status' => 'pending',
            'cash_status' => 'pending',
            'payment_method' => 'pending',
            'total_price' => $product->price,
        ]);
        Cart::find($product_id)->delete();
        return back()->with(['success' => 'Done']);
        // return view('user.showproducts');
    }
    public function AddOrders()
    {
        $cart = Cart::All()[0];
        $product = Product::find($cart)[0];
        $userid =  Auth::user()->id;
        $newCart = Order::insert([
            'user_id' => $userid,
            'product_id' => $product->id,
            'name' => $product->name,
            'delivery_status' => 'pending',
            'cash_status' => 'pending',
            'payment_method' => 'pending',
            'total_price' => $product->price,
        ]);
        Cart::select('*')->delete();
        return back()->with(['success' => 'Done']);
        // return view('user.showproducts');
    }
    public function orders()
    {
        // $products = Order::All();

        $userid =  Auth::user()->id;
        $carts = Cart::ALL()->where('user_id', $userid);


        $order = Order::All()->where('user_id', $userid);
        $checkout = checkout::All()->where('user_id', $userid);

        $order_sum = Order::All()->where('user_id', $userid)->sum('total_price');
        $cart_sum = User::find($userid)->getProducts->sum('price');


        $user_products =  User::find($userid)->getProducts;

        return view('user.orders', [
            'order_sum' => $order_sum,
            'cart_sum' => $cart_sum,
            'orders' => $order,

            // 'products' => $products,
            'carts' => $carts,
            'user_products' => $user_products,
            'checkouts' => $checkout,
        ]);
    }


    public function editorders()
    {
        $products = Order::All();



        $order_sum = Order::All('total_price')->sum('total_price');
        $userid =  Auth::user()->id;
        $carts = Cart::ALL()->where('user_id', $userid);


        $order = Order::All()->where('user_id', $userid);
        $user_products =  User::find($userid)->getProducts;
        $cart_sum = User::find($userid)->getProducts->sum('price');

        return view('user.editorders', [
            'order_sum' => $order_sum,
            'cart_sum' => $cart_sum,
            'products' => $products,
            'carts' => $carts,
            'orders' => $order,
            'user_products' => $user_products,
        ]);

        // return view('user.editorders');
    }

    public function updateOrders()
    {
        $products = Order::All();

        $userid =  Auth::user()->id;
        $carts = Cart::ALL()->where('user_id', $userid);


        $order = Order::All()->where('user_id', $userid);
        // $carts = Cart::ALL();


        // $order = Order::All();
        $order_sum = Order::All('total_price')->sum('total_price');

        $user_products =  User::find($userid)->getProducts;

        return view('user.updateOrders', [
            'order_sum' => $order_sum,
            'products' => $products,
            'carts' => $carts,
            'orders' => $order,
            'user_products' => $user_products,
        ]);
        // return ('user.updateOrders');
    }
    public function deleteorders()
    {
        $products = Order::All();


        // $carts = Cart::ALL();


        // $order = Order::All();
        $order_sum = Order::All('total_price')->sum('total_price');

        $userid =  Auth::user()->id;
        $carts = Cart::ALL()->where('user_id', $userid);


        $order = Order::All()->where('user_id', $userid);
        $user_products =  User::find($userid)->getProducts;

        return view('user.deleteorders', [
            'order_sum' => $order_sum,
            'products' => $products,
            'carts' => $carts,
            'user_products' => $user_products,
        ]);

        // return ('user.deleteorders');
    }
    public function checkout()
    {


        $userid =  Auth::user()->id;
        $products = Order::All()->where('user_id', $userid);
        $carts = Cart::ALL()->where('user_id', $userid);


        $order = Order::All()->where('user_id', $userid);

        $user_products =  User::find($userid)->getProducts;
        $checkout = checkout::select('*')->where('user_id', $userid)->get();

        $order_sum =  $order->sum('total_price');
        $cart_sum = User::find($userid)->getProducts->sum('price');

        // if (array_filter($checkout) == []) {
        // if (is_array($checkout)) {
        // if (is_object(($checkout)) and (ob_get_length()  == 0)) {

        //     return view(
        //         'user.edit_checkout',
        //         [
        //             'order_sum' => $order_sum,
        //             'products' => $products,
        //             'carts' => $carts,
        //             'user_products' => $user_products,
        //             'checkouts' => $checkout,
        //         ]
        //     );
        //     // return view('user.checkout');
        // } else {
        return view(
            'user.edit_checkout',
            [
                'cart_sum' => $cart_sum,
                'order_sum' => $order_sum,
                'products' => $products,
                'orders' => $order,
                'checkouts' => $checkout,
                'carts' => $carts,
                'user_products' => $user_products,
            ]
        );
        // }
    }

    public function cofirmCheckout(Request $request)
    {

        // $order = Order::All();
        $products = Order::All();
        $order_sum = Order::All('total_price')->sum('total_price');
        $carts = Cart::ALL();

        $userid =  Auth::user()->id;
        $user_products =  User::find($userid)->getProducts;

        $checkout = checkout::All();
        // if (is_object(($checkout)) and (ob_get_length()  == 0)) {
        //     // return 'emptyArray ';
        //     $newCheckout = checkout::where('user_id', $userid)->update([
        //         'first_name' => $request->first_name,
        //         'last_name' =>  $request->last_name,
        //         'email' => $request->email,
        //         'address' =>  $request->address,
        //         'city' => $request->city,
        //         'country' => $request->country,
        //         'tel' => $request->tel,
        //         'notes' => $request->notes,
        //         'user_id' => $userid,
        //     ]);
        // } else {

        $newCheckout = checkout::insert([
            'first_name' => $request->first_name,
            'last_name' =>  $request->last_name,
            'email' => $request->email,
            'address' =>  $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'tel' => $request->tel,
            'notes' => $request->notes,
            'user_id' => $userid,
        ]);
        // } 

        // Cart::select('*')->delete();
        return redirect(
            route('orders')
        )->with(['success' => 'Done']);


        // return view('user.checkout');
    }


    public function cart()
    {
        // return   $user->getProducts;
        // $products = Product::where('',  $user);
        $userid =  Auth::user()->id;
        $user_products =  User::find($userid)->getProducts;

        $order_sum = Order::All('total_price')->sum('total_price');
        $cart_sum = User::find($userid)->getProducts->sum('price');


        $products = Order::select('*')->get();
        $carts = Cart::ALL()->where('user_id', $userid);


        $order = Order::All()->where('user_id', $userid);

        return view(
            'user.cart',
            [
                'cart_sum' => $cart_sum,
                'order_sum' => $order_sum,
                'products' => $products,
                'orders' => $order,
                'carts' => $carts,
                'user_products' => $user_products,
            ]
        );
    }
    public function addToCart($product_id)
    {
        $product = Product::find($product_id)->id;
        $user = Auth::user()->id;
        $newCart = Cart::insert([
            'user_id' => $user,
            'product_id' => $product,
        ]);
        return back()->with(['success' => 'Done']);
    }
    public function deleteFromCart($product_id)

    {
        $product = Cart::where('id', $product_id);
        $product->delete();
        return back()->with(['success' => 'Done']);
    }

    public function category_lab()
    {
        $products = Product::All()->where('category', 'lab');

        $userid =  Auth::user()->id;
        $carts = Cart::ALL()->where('user_id', $userid);
        $order = Order::All()->where('user_id', $userid);



        $cart_sum = User::find($userid)->getProducts->sum('price');
        $user_products =  User::find($userid)->getProducts;

        return view('user.category.category_lab', [
            'cart_sum' => $cart_sum,
            'products' => $products,
            'carts' => $carts,
            'orders' => $order,
            'user_products' => $user_products,
        ]);
    }
    public function category_tab()
    {
        $products = Product::All()->where('category', 'tab');

        $userid =  Auth::user()->id;
        $carts = Cart::ALL()->where('user_id', $userid);


        $order = Order::All()->where('user_id', $userid);
        $cart_sum = User::find($userid)->getProducts->sum('price');
        $user_products =  User::find($userid)->getProducts;

        return view('user.category.category_tab', [
            'cart_sum' => $cart_sum,
            'products' => $products,
            'carts' => $carts,
            'orders' => $order,
            'user_products' => $user_products,
        ]);
    }
    public function category_acc()
    {
        $products = Product::All()->where('category', 'accessories');
        $userid =  Auth::user()->id;

        $carts = Cart::ALL()->where('user_id', $userid);

        $order = Order::All()->where('user_id', $userid);

        $cart_sum = User::find($userid)->getProducts->sum('price');
        $user_products =  User::find($userid)->getProducts;

        return view('user.category.category_acc', [
            'cart_sum' => $cart_sum,
            'products' => $products,
            'carts' => $carts,
            'orders' => $order,
            'user_products' => $user_products,
        ]);
    }

    // public function pendingMembers()
    // {

    //     return    $userid =  Auth::user()->pending;

    //     return view('admin.member.pendingmembers');
    // }
}