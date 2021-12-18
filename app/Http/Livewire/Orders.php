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
    

    public function updateOrderStatus()
    {
        # code...
    }

    public function deleteOrder($id)
    {
        $category = Order::find($id);
        $category->delete();

        session()->flash('message', 'Deleted successfully!');
    }
    
    public function render()
    {
        /*    if ($this->sorting == 'due_date') {
               $orders = Order::where('full_name', 'like', '%' . $this->search . '%')->where('advance_paid', 'like', '%' . $this->order_cat_id . '%')->orderBy('created_at', 'DESC')->paginate($this->page_size);
           } elseif ($this->sorting == 'price') {
               $orders = Order::where('full_name', 'like', '%' . $this->search . '%')->where('advance_paid', 'like', '%' . $this->order_cat_id . '%')->orderBy('price', 'DESC')->paginate($this->page_size);
           } else {
               $orders = Order::where('full_name', 'like', '%' . $this->search . '%')->where('advance_paid', 'like', '%' . $this->order_cat_id . '%');
           } */

        $orders = Order::when($this->term, function ($query, $term) {
            return $query->where('full_name', 'LIKE', "%$term%");
        })->paginate(5);
        
        $categories = Category::all();

        return view('livewire.orders', ['orders' => $orders, 'categories'=>$categories])->layout('layouts.base');
    }
}