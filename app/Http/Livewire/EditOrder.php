<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Order;
use Livewire\Component;

class EditOrder extends Component
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
    public $payment_note;
    public $payment_method;
    public $order_id;
    
    public function mount($order_id)
    {
        // $this->order_id = $order_id;
        $order = Order::where('id', $order_id)->first();
        $this->order_id = $order->id;
        $order->order_code = $order->order_code;
        $order->quantity = $order->quantity;
        $order->price = $order->price;
        $order->due_date = $order->due_date;
        $order->advance_paid = $order->advance;
        $order->balance = $order->balance;
        $order->full_name = $order->name;
        $order->address = $order->address;
        $order->mobile = $order->mobile;
        $order->description = $order->payment_note;
        $order->payment_method = $order->payment_method;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
             'order_code' => 'required',
             'quantity' => 'required|numeric',
             'price' => 'required|numeric',
             'advance' => 'required|numeric',
             'due_date' => 'required',
             'balance' => 'required',
             'name' => 'required',
             'address' => 'required',
             'mobile' => 'required',
             'payment_note' => 'required',
         ]);
    }

    public function updateOrder()
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
            'payment_note' => 'required',
        ]);

        $order= Order::find($this->order_id);
        $order->order_code = $this->order_code;
        $order->quantity = $this->quantity;
        $order->price = $this->price;
        $order->due_date = $this->due_date;
        $order->advance_paid = $this->advance;
        $order->balance = $this->balance;
        $order->full_name = $this->name;
        $order->address = $this->address;
        $order->mobile = $this->mobile;
        $order->description = $this->payment_note;
        $order->payment_method = $this->payment_method;
        $order->save();

        session()->flash('message', 'Order updated successfully!');
        
        return redirect()->to('orders');
    }

    public function render()
    {
        $categories = Category::all();
        $orders = Order::all();
               
        return view('livewire.edit-order', ['categories' => $categories, 'order' => $orders])->layout('layouts.base');
    }
}