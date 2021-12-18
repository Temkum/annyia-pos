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
        /*  if ($this->sorting == 'due_date') {
             $orders = Order::where('due_date', 'LIKE', '%' . $this->search . '%')->where('due_date', 'LIKE', '%' . $this->order_id . '%')->orderBy('created_at', 'DESC')->paginate($this->page_size);
         } elseif ($this->sorting == 'price') {
             $orders = Order::where('full_name', 'like', '%' . $this->search . '%')->where('advance_paid', 'like', '%' . $this->order_id . '%')->orderBy('price', 'DESC')->paginate($this->page_size);
         } else {
             $orders = Order::where('full_name', 'like', '%' . $this->search . '%')->where('advance_paid', 'like', '%' . $this->order_id . '%');
         } */

        $orders = Order::when($this->term, function ($query, $term) {
            return $query->where('full_name', 'LIKE', "%$term%")->orWhere('status', 'LIKE', "%$term%")->orderBy('created_at', 'ASC');
        })->paginate(12);
        
        
        $categories = Category::all();

        return view('livewire.orders', ['orders' => $orders, 'categories'=>$categories])->layout('layouts.base');
    }
}