<?php

namespace App\Livewire\Report;

use Livewire\Component;
use App\Models\Shop;
use App\Models\Item;
use App\Models\Partner;
use Livewire\WithPagination;

class ItemReport extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $partner;
    public $partnerId;
    public $partners;
    public $category;
    public $shop_id;
    public $date1;
    public $date2;
    public $shops;
    public $buttonStatus = 'disabled';





    public function mount()
    {

        $this->shops = Shop::whereIn('id', [1, 25])->get();
        $this->date1 = now()->format('Y-m-d');
        $this->date2 = now()->format('Y-m-d');
        $this->partners = collect();
        //dd($this->date1);

    }

    public function selectPartner($partnerName, $partnerId)
    {
        $this->partners = collect();
        $this->partner = $partnerName;
        $this->partnerId = $partnerId;
        //dd($itemId);


    }
    public function updatedPartner($value)
    {

        $this->partners = Partner::where('name', 'like', '%' . $value . '%')->get();
        //dd($this->partners);





    }

    public function selectCategory($partnerName, $partnerId)
    {
        $this->partners = collect();
        $this->partner = $partnerName;
        $this->partnerId = $partnerId;
        //dd($itemId);


    }
    public function updatedCategory($value)
    {

        $this->partners = Partner::where('name', 'like', '%' . $value . '%')->get();
        //dd($this->partners);





    }

    public function render()
    {


        $items = Item::with(['partner', 'category'])
            ->when($this->partnerId, function ($query, $partner) {
                $query->where('partner_id', $partner);
            })
            ->when($this->category, function ($query, $category) {
                $query->where('category_id', $category);
            })
            ->paginate(15);

        return view('livewire.report.item-report', ['items' => $items, 'shops' => $this->shops, 'items' => $items, 'partners' => $this->partners]);
    }
}
