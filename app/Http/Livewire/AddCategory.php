<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class AddCategory extends Component
{
    public $category_name;
    public $category_code;
    
    public function store()
    {
        # validate form input
        $this->validate([ 'category_code'=> 'required', 'category_name' => 'required']);

        $category = new Category();
        $category->category_code = $this->category_code;
        $category->category_name = $this->category_name;
        $category->save();

        // clear input fields
        $category->category_code = $this->reset();
        $category->category_name = $this->reset();


        session()->flash('message', 'Category created successfully!');

        // return redirect()->to('categories');
    }
    
    public function render()
    {
        return view('livewire.add-category')->layout('layouts.base');
    }
}
