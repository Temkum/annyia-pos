<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class EditCategory extends Component
{
    public $category_code;
    public $category_name;
    public $category_id;

    public function mount($category_id)
    {
        # code...
        $this->category_id = $category_id;
        $category = Category::where('id', $category_id)->first();
        $this->category_id = $category->id;
        $this->category_code = $category->category_code;
        $this->category_name = $category->category_name;
    }

    public function updated($fields)
    {
        # code...
        $this->validateOnly($fields, [
            'category_code' => 'required',
            'category_name' => 'required',
        ]);
    }

    public function updateCat()
    {
        $this->validate(['category_code' => 'required', 'category_name' => 'required',]);

        $category = Category::find($this->category_id);
        $category->category_code = $this->category_code;
        $category->category_name = $this->category_name;
        $category->save();

        session()->flash('message', 'Category updated successfully!');
    }
    
    public function render()
    {
        return view('livewire.edit-category')->layout('layouts.base');
    }
}