<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Shop;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $rep_date = $request->input('repDate', now()->format('Y-m-d'));
        $shop_id = (int) $request->input('shop', 0);
    
        $shops = Shop::whereIn('id', [1, 25])->get();
        $rep_data = collect(); // пустая коллекция по умолчанию
    
        if ($shop_id !== 0) {
            $rep_data = Item::select([
                    'items.*',
                   'stocks.qty as stock_qty',
                    'stocks.total as stock_total',
                    'sells.qty as sell_qty',
                    'sells.total as sell_total',
                    'sells.cost as sell_cost',
                    'sells.discount as sell_discount',
                ])
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
                ->with(['partner', 'category'])
                ->groupBy(
                    'items.id', 'items.name',
                    'stocks.qty', 'stocks.total',
                    'sells.qty', 'sells.total', 'sells.cost', 'sells.discount'
                )
                ->orderByDesc(DB::raw('COALESCE(sells.qty, 0)'))
                ->paginate(20)
                ->withQueryString(); // сохранить фильтры при пагинации
        }
    
        return view('report', [
            'shops'   => $shops,
            'shopId'  => $shop_id,
            'repDate' => $rep_date,
            'data'    => $rep_data,
        ]);
    }


}
