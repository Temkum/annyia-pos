<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $term;
    public $search;
    public $sorting;
    public $page_size;
    public $order_id;

    // public function mount()
    // {
    //     $this->sorting = 'default';
    //     $this->pagesize = '12';
    //     $this->fill(request()->only('search', 'order_id'));
    // }


    public function deleteOrder($id)
    {
        $category = Order::find($id);
        $category->delete();

        session()->flash('message', 'Deleted successfully!');
    }
    
    public function render()
    {
        $orders = Order::when($this->term, function ($query, $term) {
            return $query->where('full_name', 'LIKE', "%$term%")->orWhere('status', 'LIKE', "%$term%")->groupBy();
        })->orderBy('created_at', 'ASC')->paginate(12);
        
        $categories = Category::all();

        return view('livewire.orders', ['orders' => $orders, 'categories'=>$categories])->layout('layouts.base');
    }
}