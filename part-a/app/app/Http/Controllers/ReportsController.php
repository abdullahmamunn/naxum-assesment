<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use DB;
use Cache;

class ReportsController extends Controller
{
      public function comission(Request $request)
      {
        $query = Order::query();
        if($request->start_date && $request->end_date)
        {
            $from = date('Y-m-d',strtotime($request->from_date));
            $to = date('Y-m-d',strtotime($request->to_date));

            $query = $query->whereBetween('order_date',[$from,$to]);
        }
          $query = $query->with([
            'purchaser.referrer.category',
            'purchaser.category',
            'purchaser.referrer' => function($q) {
                $q->withCount('customers');
            },
            'items.product'
            ])->orderBy('id', 'DESC')
              ->take(100)
              ->get();
            // return $query;

            return view('reports.comission_reports',compact('query'));
      }


      public function topDistributor()
      {

          $top_distributor = Cache::remember('top',5 , function(){
            return DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.purchaser_id')
                ->join('order_items', 'order_items.order_id', '=', 'orders.id')
                ->join('user_category', 'user_category.user_id', '=', 'users.referred_by')
                ->where('user_category.category_id', 1)
                ->select('users.id','users.first_name','users.last_name', DB::raw('count(order_items.order_id) as total_sale'))
                ->groupBy('users.username')
                ->orderBy('total_sale','DESC')
                // ->take(100)
                ->get();
          });

          return view('reports.rank',compact('top_distributor'));
      }

      public function getItem(Request $request)
      {
        $items = Order::with(['items.product'])->where('id',$request->id)->get();
        return response(['data'=>$items]);
      }


}
