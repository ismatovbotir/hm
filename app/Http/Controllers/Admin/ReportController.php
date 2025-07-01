<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Shop;

class ReportController extends Controller
{
    public function index()
{
    $shops=Shop::whereIn('id',[1,25])->get();
    $repDate = now()->format('Y-m-d');
    //dd($date);
    return view('report',['shops'=>$shops,'shopId'=>0,'repDate'=>$repDate,'data'=>[]]);
    
}
public function reportbody(Request $request){
    $data=$request->all();
    //dd($data);
    $shop_id=$data["shop"];
    $rep_date=$data["repDate"];
    if ($shop_id==0){
        dd('all');
    }else{
        $rep_data= Item::select(
            'items.*',
            
            'stocks.qty as stock_qty',
            'stocks.total as stock_total',
            'sells.qty as sell_qty',
            'sells.total as sell_total',
            'sells.cost as sell_cost ',
            'sells.discount as sell_discount '
        )->with('partner')->with('category')
       // ->where('items.status',true)
        ->leftJoin('stocks', function ($join) use ($rep_date, $shop_id) {
            $join->on('stocks.item_id', '=', 'items.id')
                 ->where('stocks.stock_date', $rep_date)
                 ->where('stocks.shop_id', $shop_id);
        })
        ->leftJoin('sells', function ($join) use ($rep_date, $shop_id) {
            $join->on('sells.item_id', '=', 'items.id')
                 ->where('sells.sell_date', $rep_date)
                 ->where('sells.shop_id', $shop_id);
        })
        ->orderBy('sell_qty', 'desc') 
        ->paginate(50);

        //dd($rep_data);
    }
    $shopIds=[1,25];
    $shops=Shop::whereIn('id',[1,25])->get();
    //$query = Item::query();

   
   //dd($report);






    return view('report',['shops'=>$shops,'shopId'=>$shop_id,'repDate'=>$rep_date,'data'=>$rep_data]);
}


}
