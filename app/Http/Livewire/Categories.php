<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Categories extends Component
{
    public $cat_code;
    public $cat_name;
    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = 'default';
        $this->pagesize = '12';
    }

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
        
    public function render()
    {
        $categories = Category::all();
        
        return view('livewire.categories', ['categories'=>$categories])->layout('layouts.base');
    }
}