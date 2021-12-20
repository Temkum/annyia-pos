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
    public $order_status;
    public $order_id;
    
    public function mount($order_id)
    {
        $this->order_id = $order_id;
        $order = Order::where('id', $order_id)->first();
        // $this->order_id = $order->id;
        $this->order_code = $order->order_code;
        $this->quantity = $order->quantity;
        $this->price = $order->price;
        $this->due_date = $order->due_date;
        $this->advance = $order->advance_paid;
        $this->balance = $order->balance;
        $this->name = $order->full_name;
        $this->address = $order->address;
        $this->mobile = $order->mobile;
        $this->order_status = $order->status;
        $this->payment_note = $order->description;
        $this->payment_method = $order->payment_method;
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
             'order_status' => 'required',
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
            'order_status' => 'required',
            'payment_note' => 'required',
        ]);

        $order = Order::find($this->order_id);
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