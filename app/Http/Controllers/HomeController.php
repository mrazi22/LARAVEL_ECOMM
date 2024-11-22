<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Cart;
use App\Models\Order;



use Session;

use Stripe;
class HomeController extends Controller
{

    public function index()
    {
      $products = Products::all();
      
        return view('home.userpage',compact('products'));
    }
    public function redirect(){

        if(Auth::id())
        {
             $userType= Auth::user()->userType;
             $products = Products::all();

           if($userType=='0')
           {
            return view('home.userpage',compact('products'));
           }
           else  if($userType=='1')
           {
            $total_product = Products::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();

            $order = Order::all();
            $total_revenue = 0;

            foreach($order as $order)
            {
                $total_revenue = $total_revenue + $order->product_price;
            }

            $total_delivered = Order::where('delivery_status','=','Delivered')->get()->count();


           
            return view('admin.home',compact('total_product','total_order','total_user', 'total_revenue','total_delivered'));
           }
           else {
            return redirect()->back();
        }
        }


    }

    public function profile()
    {
        $user = Auth::user();
        
        return view('admin.blade',compact('user'));

        

        
    }
    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }

    public function ProductDetails( $id)
    {

        $products = Products::find($id);

        return view('home.ProductDetails',compact('products'));
    }
  

    public function addCart( Request $request,$id)
    {

        if(Auth::id())
        {
            $user = Auth::user();
            $product = Products::find($id);
            $cart = new Cart();

            $cart->name = $user->name;
            $cart->user_id = $user->id;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_id = $product->id;
            $cart->product_title = $product->title;
            $cart->product_price = $product->price*$request->quantity;
            $cart->image = $product->image;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back()->with('success', '"'. $product->title . '" added to cart successfully!');
        }
        else
        {
            return redirect('login');
        }

    
    }
    public function show_Cart()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id',$id)->get();
            return view('home.show_cart',compact('cart'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function remove_Cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function Cash_pay()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $data = Cart::where('user_id', '=', $user_id)->get();
    
        if ($data->isEmpty()) {
            return redirect()->back()->with('message', 'Please select some items first.');
        }
    
        foreach ($data as $item) {
            $order = new Order();
            $order->name = $item->name;
            $order->user_id = $item->user_id;
            $order->phone = $item->phone;
            $order->address = $item->address;
            $order->product_id = $item->product_id;
            $order->product_title = $item->product_title;
            $order->product_price = $item->product_price;
            $order->quantity = $item->quantity;
            $order->image = $item->image;
            $order->payment_status = "Cash On Delivery";
            $order->delivery_status = "Pending";
            $order->save();
            $item->delete();
        }
    
        return redirect()->back()->with('message', 'Order Placed Successfully');
    }
    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)

    {

        Stripe\Stripe::setApiKey(env('SECRET_KEY'));

    

        Stripe\Charge::create ([

                "amount" => $totalprice * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Thanks for the  payment" 

        ]);
        $user = Auth::user();
        $user_id = $user->id;
        $data = Cart::where('user_id','=',$user_id)->get();
       
        foreach($data as $data)
        {
            $order = new Order();
            $order->name = $data->name;
            $order->user_id = $data->user_id;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->product_id = $data->product_id;
            $order->product_title = $data->product_title;
            $order->product_price = $data->product_price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->payment_status = "Paid";
            $order->delivery_status = "Pending";
            $order->save();
            $data->delete();
        }

      

        Session::flash('success', 'Payment successful!');

              

        return redirect()->back();

    }

    public function maji($id)
    {
        $products = Products::find($id);
        return view('home.maji',compact('products'));
    }
    public function show_maji()
    {
        $products = Products::all();
        return view('home.show_maji',compact('products'));

    }



    
}
