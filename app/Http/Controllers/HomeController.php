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
use Illuminate\Support\Facades\DB;

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


            $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
            $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');

            $cart_sum = User::find($userid)->getProducts->sum('price');
            $user_products =  User::find($userid)->getProducts;

            return view('user.home', [
                'cart_sum' => $cart_sum,
                'products' => $products,
                'carts' => $carts,
                'user_products' => $user_products,
                'order_pending' => $order_pending,
                'order_done' => $order_done,

            ]);
        }
        $userid =  Auth::user()->id ??  $userid = 0;
        $products = Product::All();
        $carts = Cart::ALL()->where('user_id', $userid);


        $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
        $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');

        // $cart_sum = User::find($userid)->getProducts->sum('price') ??  $cart_sum = 0;
        // $user_products =  User::find($userid)->getProducts ??  $user_products = 0;

        return view('user.home', [
            // 'cart_sum' => $cart_sum,
            'products' => $products,
            'carts' => $carts,
            // 'user_products' => $user_products,
            'order_pending' => $order_pending,
            'order_done' => $order_done,

        ]);
    }
    public function products()
    {
        $products = Product::All();

        $order_sum_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending')->sum('total_price');
        $order_sum_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done')->sum('total_price');


        $userid =  Auth::user()->id;
        $carts = Cart::ALL()->where('user_id', $userid);


        $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
        $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');

        $user_products =  User::find($userid)->getProducts;
        $cart_sum = User::find($userid)->getProducts->sum('price');

        return view('user.products',  [
            'order_sum_pending' => $order_sum_pending,
            'order_sum_done' => $order_sum_done,
            'cart_sum' => $cart_sum,
            'order_pending' => $order_pending,
            'order_done' => $order_done,

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


        $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
        $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');

        $order_sum_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending')->sum('total_price');
        $order_sum_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done')->sum('total_price');

        $user_products =  User::find($userid)->getProducts;
        $cart_sum = User::find($userid)->getProducts->sum('price');


        return view('user.showproducts', [
            'order_sum_pending' => $order_sum_pending,
            'order_sum_done' => $order_sum_done,
            'cart_sum' => $cart_sum,
            'products' => $products,
            'carts' => $carts,
            'order_pending' => $order_pending,
            'order_done' => $order_done,

            'user_products' => $user_products,
        ]);
    }
    public function AddToOrders(Request $request, $product_id)
    {
        $userid =  Auth::user()->id;

        // return
        $product =  DB::table('users')
            ->join('carts', 'users.id', '=', 'carts.user_id')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('products.*')
            ->get();
        // return $request->Product_count;
        // return  $cart = Cart::find($product_id);
        // $product = Product::find($cart);
        $product[0]->name;
        $newCart = Order::insert([
            'user_id' => $userid,
            'product_id' => $product[0]->id,
            'Product_count' => $request->Product_count,
            // 'name' => $product[0]->name,
            // 'delivery_status' => 'pending',
            // 'cash_status' => 'pending',
            // 'payment_method' => 'pending',
            'total_price' => (($product[0]->price) * ($request->Product_count)),
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
            // 'name' => $product->name,
            // 'delivery_status' => 'pending',
            // 'cash_status' => 'pending',
            // 'payment_method' => 'pending',
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


        $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
        $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');

        $checkout = checkout::All()->where('user_id', $userid);
        $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
        $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');

        $order_sum_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending')->sum('total_price');
        $order_sum_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done')->sum('total_price');

        $cart_sum = User::find($userid)->getProducts->sum('price');


        $user_products =  User::find($userid)->getProducts;

        return view('user.orders', [
            'order_sum_pending' => $order_sum_pending,
            'order_sum_done' => $order_sum_done,
            'cart_sum' => $cart_sum,
            'order_pending' => $order_pending,
            'order_done' => $order_done,


            // 'products' => $products,
            'carts' => $carts,
            'user_products' => $user_products,
            'checkouts' => $checkout,
        ]);
    }
    public function finishedOrders()
    {
        // $products = Order::All();

        $userid =  Auth::user()->id;
        $carts = Cart::ALL()->where('user_id', $userid);

        $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
        $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');
        $checkout = checkout::All()->where('user_id', $userid);

        $order_sum_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending')->sum('total_price');
        $order_sum_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done')->sum('total_price');
        $cart_sum = User::find($userid)->getProducts->sum('price');


        $user_products =  User::find($userid)->getProducts;

        return view('user.finished_orders', [
            'order_sum_pending' => $order_sum_pending,
            'order_sum_done' => $order_sum_done,
            'cart_sum' => $cart_sum,
            'order_pending' => $order_pending,
            'order_done' => $order_done,

            // 'products' => $products,
            'carts' => $carts,
            'user_products' => $user_products,
            'checkouts' => $checkout,
        ]);
    }

    public function editorders()
    {
        $products = Order::All();



        $order_sum_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending')->sum('total_price');
        $order_sum_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done')->sum('total_price');

        $userid =  Auth::user()->id;
        $carts = Cart::ALL()->where('user_id', $userid);


        $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
        $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');

        $user_products =  User::find($userid)->getProducts;
        $cart_sum = User::find($userid)->getProducts->sum('price');

        return view('user.editorders', [
            'order_sum' => $order_sum,
            'cart_sum' => $cart_sum,
            'products' => $products,
            'carts' => $carts,
            'order_pending' => $order_pending,
            'order_done' => $order_done,

            'user_products' => $user_products,
        ]);

        // return view('user.editorders');
    }

    public function updateOrders()
    {
        $products = Order::All();

        $userid =  Auth::user()->id;
        $carts = Cart::ALL()->where('user_id', $userid);


        $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
        $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');

        // $carts = Cart::ALL();


        // $order = Order::All();
        $order_sum_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending')->sum('total_price');
        $order_sum_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done')->sum('total_price');

        $user_products =  User::find($userid)->getProducts;

        return view('user.updateOrders', [
            'order_sum_pending' => $order_sum_pending,
            'order_sum_done' => $order_sum_done,
            'products' => $products,
            'carts' => $carts,
            'order_pending' => $order_pending,
            'order_done' => $order_done,

            'user_products' => $user_products,
        ]);
        // return ('user.updateOrders');
    }
    public function deleteorders()
    {
        $products = Order::All();


        // $carts = Cart::ALL();


        // $order = Order::All();
        $order_sum_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending')->sum('total_price');
        $order_sum_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done')->sum('total_price');

        $userid =  Auth::user()->id;
        $carts = Cart::ALL()->where('user_id', $userid);


        $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
        $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');

        $user_products =  User::find($userid)->getProducts;

        return view('user.deleteorders', [
            'order_sum_pending' => $order_sum_pending,
            'order_sum_done' => $order_sum_done,
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


        $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
        $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');


        $user_products =  User::find($userid)->getProducts;
        $checkout = checkout::select('*')->where('user_id', $userid)->get();

        $order_sum_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending')->sum('total_price');
        $order_sum_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done')->sum('total_price');

        $cart_sum = User::find($userid)->getProducts->sum('price');

        if (!(count($checkout = checkout::where('user_id', $userid)->get()) == null)) {

            // return '1';
            if (checkout::where('user_id', $userid)->get()[0]->user_id ==  $userid) {

                // return 
                // $checkout = checkout::where('user_id', $userid)->get('user_id');

                return view(
                    'user.edit_checkout',
                    [
                        'cart_sum' => $cart_sum,
                        'order_sum_pending' => $order_sum_pending,
                        'order_sum_done' => $order_sum_done,
                        'products' => $products,
                        'order_pending' => $order_pending,
                        'order_done' => $order_done,

                        'checkouts' => $checkout,
                        'carts' => $carts,
                        'user_products' => $user_products,
                    ]
                );
            }
        }


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
            'user.checkout',
            [
                'cart_sum' => $cart_sum,
                'order_sum_pending' => $order_sum_pending,
                'order_sum_done' => $order_sum_done,
                'products' => $products,
                'order_pending' => $order_pending,
                'order_done' => $order_done,

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

        $carts = Cart::ALL();

        $userid =  Auth::user()->id;
        $user_products =  User::find($userid)->getProducts;

        $order_sum_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending')->sum('total_price');
        $order_sum_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done')->sum('total_price');
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

        if (!(count($checkout = checkout::where('user_id', $userid)->get()) == null)) {

            if (checkout::where('user_id', $userid)->get()[0]->user_id ==  $userid) {
                // return $request->payment;
                // return 
                // $checkout = checkout::where('user_id', $userid)->get('user_id');
                $newCheckout = checkout::Where('user_id', $userid)->update([
                    'first_name' => $request->first_name,
                    'last_name' =>  $request->last_name,
                    'email' => $request->email,
                    'address' =>  $request->address,
                    'city' => $request->city,
                    'country' => $request->country,
                    'tel' => $request->tel,
                    'notes' => $request->notes,
                    // 'Product_count' => $request->Product_count,
                    // 'payment_method' => $request->payment_method,
                    'user_id' => $userid,
                ]);
                Order::Where('user_id', $userid)->update([
                    'payment_method' => $request->payment,
                ]);
                return redirect(
                    route('orders')
                )->with(['success' => 'Done']);
            }
        }

        $newCheckout = checkout::insert([
            'first_name' => $request->first_name,
            'last_name' =>  $request->last_name,
            'email' => $request->email,
            'address' =>  $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'tel' => $request->tel,
            'notes' => $request->notes,
            // 'Product_count' => $request->Product_count,
            // 'payment_method' => $request->payment_method,
            'user_id' => $userid,
        ]);
        Order::Where('user_id', $userid)->update([
            // 'Product_count' => $request->Product_count,
            'payment_method' => $request->payment,
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

        $order_sum_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending')->sum('total_price');
        $order_sum_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done')->sum('total_price');

        $cart_sum = User::find($userid)->getProducts->sum('price');


        $products = Order::select('*')->get();
        $carts = Cart::ALL()->where('user_id', $userid);


        $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
        $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');

        return view(
            'user.cart',
            [
                'cart_sum' => $cart_sum,
                'order_sum_pending' => $order_sum_pending,
                'order_sum_done' => $order_sum_done,
                'products' => $products,
                'order_pending' => $order_pending,
                'order_done' => $order_done,

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
        $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
        $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');


        $cart_sum = User::find($userid)->getProducts->sum('price');
        $user_products =  User::find($userid)->getProducts;

        return view('user.category.category_lab', [
            'cart_sum' => $cart_sum,
            'products' => $products,
            'carts' => $carts,
            'order_pending' => $order_pending,
            'order_done' => $order_done,

            'user_products' => $user_products,
        ]);
    }
    public function category_tab()
    {
        $products = Product::All()->where('category', 'tab');

        $userid =  Auth::user()->id;
        $carts = Cart::ALL()->where('user_id', $userid);


        $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
        $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');

        $cart_sum = User::find($userid)->getProducts->sum('price');
        $user_products =  User::find($userid)->getProducts;

        return view('user.category.category_tab', [
            'cart_sum' => $cart_sum,
            'products' => $products,
            'carts' => $carts,
            'order_pending' => $order_pending,
            'order_done' => $order_done,

            'user_products' => $user_products,
        ]);
    }
    public function category_acc()
    {
        $products = Product::All()->where('category', 'accessories');
        $userid =  Auth::user()->id;

        $carts = Cart::ALL()->where('user_id', $userid);

        $order_pending = Order::All()->where('user_id', $userid)->where('delivery_status', 'pending');
        $order_done = Order::All()->where('user_id', $userid)->where('delivery_status', 'done');

        $cart_sum = User::find($userid)->getProducts->sum('price');
        $user_products =  User::find($userid)->getProducts;

        return view('user.category.category_acc', [
            'cart_sum' => $cart_sum,
            'products' => $products,
            'carts' => $carts,
            'order_pending' => $order_pending,
            'order_done' => $order_done,

            'user_products' => $user_products,
        ]);
    }

    // public function pendingMembers()
    // {

    //     return    $userid =  Auth::user()->pending;

    //     return view('admin.member.pendingmembers');
    // }
}