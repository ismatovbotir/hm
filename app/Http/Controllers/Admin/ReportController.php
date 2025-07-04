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
        
        return view('report.dashboard');
        $rep_date = $request->input('repDate', now()->format('Y-m-d'));
        $shop_id = (int) $request->input('shop', 0);
    
        $shops = Shop::whereIn('id', [1, 25])->get();
        $rep_data = collect(); // пустая коллекция по умолчанию
    
        if ($shop_id !== 0) {
            $rep_data = Item::select([
                    'items.*',
                   'stocks1.qty as stock1_qty',
                    'stocks1.total as stock1_total',
                    'sells1.qty as sell1_qty',
                    'sells1.total as sell1_total',
                    'sells1.cost as sell1_cost',
                    'sells1.discount as sell1_discount',
                ])
                //->whereNot('partner_id',null)
                ->leftJoin('stocks as stocks1', function ($join) use ($rep_date, $shop_id) {
                    $join->on('stocks1.item_id', '=', 'items.id')
                         ->where('stocks1.stock_date', $rep_date)
                         ->where('stocks1.shop_id', $shop_id);
                })
                ->leftJoin('sells as sells1', function ($join) use ($rep_date, $shop_id) {
                    $join->on('sells1.item_id', '=', 'items.id')
                         ->where('sells1.sell_date', $rep_date)
                         ->where('sells1.shop_id', $shop_id);
                })
                ->with(['partner', 'category'])
                // ->groupBy(
                //     'items.id', 'items.name',
                //     'stocks.qty', 'stocks.total',
                //     'sells.qty', 'sells.total', 'sells.cost', 'sells.discount'
                // )
                ->orderByDesc(DB::raw('COALESCE(items.id, 0)'))
                ->paginate(20)
                ->withQueryString(); // сохранить фильтры при пагинации
        }else{
            $rep_data = Item::select([
                'items.*',
               'stocks1.qty as stock1_qty',
                'stocks1.total as stock1_total',
                'sells1.qty as sell1_qty',
                'sells1.total as sell1_total',
                'sells1.cost as sell1_cost',
                'sells1.discount as sell1_discount',
                'stocks2.qty as stock2_qty',
                'stocks2.total as stock2_total',
                'sells2.qty as sell2_qty',
                'sells2.total as sell2_total',
                'sells2.cost as sell2_cost',
                'sells2.discount as sell2_discount',
            ])
            ->leftJoin('stocks as stocks1', function ($join) use ($rep_date) {
                $join->on('stocks1.item_id', '=', 'items.id')
                     ->where('stocks1.stock_date', $rep_date)
                     ->where('stocks1.shop_id', 1);
            })
            ->leftJoin('sells as sells1', function ($join) use ($rep_date) {
                $join->on('sells1.item_id', '=', 'items.id')
                     ->where('sells1.sell_date', $rep_date)
                     ->where('sells1.shop_id', 1);
            })
            ->leftJoin('stocks as stocks2', function ($join) use ($rep_date) {
                $join->on('stocks2.item_id', '=', 'items.id')
                     ->where('stocks2.stock_date', $rep_date)
                     ->where('stocks2.shop_id', 24);
            })
            ->leftJoin('sells as sells2', function ($join) use ($rep_date) {
                $join->on('sells1.item_id', '=', 'items.id')
                     ->where('sells2.sell_date', $rep_date)
                     ->where('sells2.shop_id', 24);
            })
            ->with(['partner', 'category'])
            // ->groupBy(
            //     'items.id', 'items.name',
            //     'stocks.qty', 'stocks.total',
            //     'sells.qty', 'sells.total', 'sells.cost', 'sells.discount'
            // )
            ->orderByDesc(DB::raw('COALESCE(items.id, 0)'))
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
    public function sell(){
        return view('layouts.app');

    }
    public function stock(){
        return view('report.item');
    }

    public function item(){
        return view('report.item');
    }

}
