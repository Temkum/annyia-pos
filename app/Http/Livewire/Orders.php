<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function updateOrderStatus()
    {
        # code...
    }
    
    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(12);

        return view('livewire.orders', ['orders' => $orders])->layout('layouts.base');
    }
}