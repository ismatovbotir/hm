<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ReportController extends Controller
{
    public function stock($date = '2024-06-05', array $shopIds = [1, 2, 3,4,5,6,7,9])
{
    $query = Item::query();

    foreach ($shopIds as $shopId) {
        $alias = 's' . $shopId;

        $query->leftJoin("stocks as {$alias}", function ($join) use ($alias, $date, $shopId) {
            $join->on('items.id', '=', "{$alias}.item_id")
                 ->where("{$alias}.stock_date", '=', $date)
                 ->where("{$alias}.shop_id", '=', $shopId);
        });
    }

    // базовые select поля
    $select = ['items.*'];

    // добавляем колонки остатков по складам
    foreach ($shopIds as $shopId) {
        $alias = 's' . $shopId;
        $select[] = "{$alias}.qty as stock_qty_shop_{$shopId}";
        $select[] = "{$alias}.total as stock_total_shop_{$shopId}";
    }

    $report = $query->select($select)->paginate(50);

    dd($report);
}


}
