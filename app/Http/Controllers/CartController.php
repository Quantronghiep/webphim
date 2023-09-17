<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\RegisterMovieMonth;
use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function historyRegisterMovieMonth(){
        if(isset($_GET['vnp_TransactionStatus']) && $_GET['vnp_TransactionStatus'] == 0){
            $movie_month = new RegisterMovieMonth();
            $movie_month->id = $_GET['vnp_TxnRef'];
            $movie_month->user_id = auth()->user()->id;
            $movie_month->price = $_GET['vnp_Amount']/100;
            $movie_month->payment_status = 1;
            $movie_month->registration_date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $movie_month->expiration_date = Carbon::now('Asia/Ho_Chi_Minh')->addMonth()->toDateString();
            $movie_month->save();

            $existing_orders = Statistic::whereDate('order_date', $movie_month->registration_date)->exists();
            if($existing_orders){ // nếu đã có ngày đó
                $statistic = Statistic::whereDate('order_date', $movie_month->registration_date)->first();
                $statistic->revenue += $movie_month->price;
                $statistic->count_order_month += 1;
                $statistic->save();
            }
            else {
                $statistic = new Statistic();
                $statistic->order_date = $movie_month->registration_date;
                $statistic->revenue =  $movie_month->price;
                $statistic->count_order_month = 1;
                $statistic->save();
            }
        }
        $registerMonth = RegisterMovieMonth::with('user')->where('user_id',auth()->user()->id)->get();
        // echo "<pre>";
        // print_r($orders);
        if(isset($_GET['vnp_TransactionStatus']) && $_GET['vnp_TransactionStatus'] == 0){
            return redirect()->route('historyRegisterMovieMonth')->with('success','Thanh toán thành công');
        }else{
            return view('pages.history-register-movie-month',[
                'registerMonth' => $registerMonth,
                'now' => Carbon::now('Asia/Ho_Chi_Minh')->toDateString(),
            ]);
        }
    }

    public function historyBuyMovie(){
        // $orders = Order::with('movies')->where('user_id','=',auth()->user()->id)->get();
        if(isset($_GET['vnp_TransactionStatus']) && $_GET['vnp_TransactionStatus'] == 0){
            $order = new Order();
            $order->id = $_GET['vnp_TxnRef'];
            $order->user_id = auth()->user()->id;
            $order->price_total = session()->get('total');
            $order->payment_status = 1;
            $order->save();

            $total_price = 0;
            $carts = session()->get('cart');
            foreach($carts as $id => $cart){
                $total_price += $cart['price'];
                $order_detail = new OrderDetail();
                $order_detail->order_id = $order->id;
                $order_detail->movie_id = $id;
                $order_detail->created_at = $order->created_at;
                $order_detail->save();
            }

            $order_date = Carbon::parse($order->created_at)->format('Y-m-d');
            $existing_orders = Statistic::whereDate('order_date', $order_date)->exists();
            if($existing_orders){ // nếu đã có ngày đó
                $statistic = Statistic::whereDate('order_date', $order_date)->first();
                $statistic->revenue += $total_price;
                foreach($carts as $id => $cart){
                    $statistic->quantity_movie += 1;
                }
                $statistic->total_order += 1;
                $statistic->save();
            }
            else {
                $statistic = new Statistic();
                $statistic->order_date = $order_date;
                $statistic->revenue = $total_price;
                foreach($carts as $id => $cart){
                    $statistic->quantity_movie += 1;
                }
                $statistic->total_order = 1;
                $statistic->save();
            }
            session()->forget('cart');
            // return redirect()->route('historyBuyMovie')->with('success','Thanh toán thành công');
        }
        $orders = DB::table('movies')
                    ->join('order_details','order_details.movie_id','=','movies.id')
                    ->join('orders','orders.id','=','order_details.order_id')
                    ->join('users','orders.user_id','=','users.id')
                    ->where('user_id','=',auth()->guard('web')->user()->id)
                    ->select('order_details.*', 'movies.title as movie_title',
                                'movies.image as movie_image','movies.price as movie_price',
                                'movies.slug as movie_slug','orders.price_total as price_total',)
                    ->get();
        // echo "<pre>";
        // print_r($orders);
        if(isset($_GET['vnp_TransactionStatus']) && $_GET['vnp_TransactionStatus'] == 0){
            return redirect()->route('historyBuyMovie')->with('success','Thanh toán thành công');
        }else{
            return view('pages.history-buy-movie',[
                'orders' => $orders
            ]);
        }
    }

    public function addToCart($id){
        $movie = Movie::find($id);
        $cart = session()->get('cart');
        if(!isset($cart[$id])){
            // $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
            // dd('Ban da them vao gio hang');
            // return "Ban da them vao gio hang";
            $cart[$id] = [
                'title' => $movie->title,
                'price' => $movie->price,
                'image' => $movie->image,
            ];
        }
        else{
            return response()->json([
                'code' => 1,
            ]);
        }
        session()->put('cart',$cart);
        $count_cart = count(session()->get('cart'));
        return response()->json([
            'code' => 200,
            'message' => 'success',
            'count_cart' => $count_cart,
        ],200);
    }

    public function showCart(){
            if(Session::get('cart')){
                $carts = session()->get('cart');
                return view('pages.cart',[
                    'carts' => $carts
                ]);
            }
            else{
                return redirect()->back()->with('error','Không có phim nào trong giỏ');
            }
    }

    public function deleteCart(Request $request){
        if($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart',$carts);
            $carts = session()->get('cart');
            $count_cart = count(session()->get('cart'));
            if($count_cart != 0 ){
                $cartComponent = view('pages.include.cart-component',compact('carts'))->render();
                return response()->json([
                    'cart_component' => $cartComponent,
                    'code' => 200,
                    'count_cart' => $count_cart,
                ],200);
            }
        }
    }
}
