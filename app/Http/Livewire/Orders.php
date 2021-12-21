<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Orders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $term;
    public $search;
    public $sorting;
    public $page_size;
    public $order_id;

    public function mount()
    {
        $this->sorting = 'default';
        $this->pagesize = '12';
        $this->fill(request()->only('search', 'order_id'));
    }


    public function deleteOrder($id)
    {
        $category = Order::find($id);
        $category->delete();

        session()->flash('message', 'Deleted successfully!');
    }
    
    public function render()
    {
        if ($this->sorting=='due_date') {
            $orders = Order::orderBy('created_at', 'ASC')->paginate(12);
        } elseif ($this->sorting == 'name') {
            $orders = Order::orderBy('full_name', 'ASC')->paginate(12);
        } elseif ($this->sorting == 'status') {
            $orders = Order::orderBy('status', 'DESC')->paginate(12);
        } else {
            $orders = Order::when($this->term, function ($query, $term) {
                return $query->where('full_name', 'LIKE', "%$term%")->orWhere('status', 'LIKE', "%$term%");
            })->orderBy('created_at', 'ASC')->paginate(12);
        }
       
        
        // group by months
        /* $groupMonths = Order::select(DB::raw("count(id) as `data`"), DB::raw("CONCAT_WS('-',MONTH(created_at),YEAR(created_at)) as monthyear"))
               ->groupBy('monthyear')
               ->get();

        $orders = Order::when($this->term, function ($query, $term) {
            return $query->where('full_name', 'LIKE', "%$term%")->orWhere('status', 'LIKE', "%$term%");
        })->orderBy('created_at', 'ASC')->paginate(12); */
        
        $categories = Category::all();

        $data =['orders' => $orders,
        'categories'=>$categories,
    ];

        return view('livewire.orders', $data)->layout('layouts.base');
    }
}