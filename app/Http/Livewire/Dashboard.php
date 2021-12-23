<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $term;

    public function render()
    {
        $categories = Category::when($this->term, function ($query, $term) {
            return $query->where('category_name', 'LIKE', "%$term%");
        })->paginate(5);

        $orders = Order::when($this->term, function ($query, $term) {
            return $query->where('full_name', 'LIKE', "%$term%")->orWhere('due_date', 'LIKE', "%$term%")
            ->orWhere('status', 'LIKE', "%$term%")
            ->orWhere('balance', 'LIKE', "%$term%")
            ->orWhere('advance_paid', 'LIKE', "%$term%")
            ->orWhere('price', 'LIKE', "%$term%")
            ->orWhere('quantity', 'LIKE', "%$term%");
        })->paginate(10);

        $data = [
            'categories' => $categories,
            'orders' => $orders
        ];

        return view('livewire.dashboard', $data)->layout('layouts.base');
    }
}