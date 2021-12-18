<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Order;
use Livewire\Component;

class AddOrder extends Component
{
    public $order_code;
    public $quantity;
    public $price;
    public $advance;
    public $due_date;
    public $balance;
    public $name;
    public $address;
    public $mobile;
    public $order_status;
    public $payment_note;
    public $payment_method;

    public function store()
    {
        $this->validate([
            'order_code' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'advance' => 'required|numeric',
            'due_date' => 'required',
            'balance' => 'required',
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'order_status' => 'required',
            'payment_note' => 'required',
        ]);

        $order= new Order();
        $order->order_code = $this->order_code;
        $order->quantity = $this->quantity;
        $order->price = $this->price;
        $order->due_date = $this->due_date;
        $order->advance_paid = $this->advance;
        $order->balance = $this->balance;
        $order->full_name = $this->name;
        $order->address = $this->address;
        $order->mobile = $this->mobile;
        $order->status = $this->order_status;
        $order->description = $this->payment_note;
        $order->payment_method = $this->payment_method;
        $order->save();

        session()->flash('message', 'Order created successfully!');
        
        return redirect()->to('orders');
    }

    public function render()
    {
        $categories = Category::all();
        
        return view('livewire.add-order', ['categories' => $categories])->layout('layouts.base');
    }
}
