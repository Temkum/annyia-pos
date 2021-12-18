<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Search extends Component
{
    public $sorting;
    public $search;
    public $order;
    public $order_cat_id;

    protected $queryString = ['search'];
    
    use WithPagination;
 
    public function render()
    {
        $orders = Order::where('full_name', 'like', '%'.$this->search.'%')->get();
    
        $data = [
            'orders'=> $orders,
        ];

        return view('livewire.search', $data)->layout('layouts.base');
    }
}
