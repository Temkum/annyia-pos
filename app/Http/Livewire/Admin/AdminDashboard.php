<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class AdminDashboard extends Component
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
            return $query->where('full_name', 'LIKE', "%$term%")->orderBy('created_at', 'ASC')->paginate(5);
        })->paginate(5);
        

        $data = [
            'categories' => $categories,
            'orders' => $orders
        ];

        return view('livewire.admin.admin-dashboard', $data)->layout('layouts.base');
    }
}