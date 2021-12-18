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
    public $term;

    // public function mount()
    // {
    //     $this->sorting = 'default';
    //     $this->pagesize = '12';
    // }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        session()->flash('message', 'Delete successful!');
    }

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
        
    public function render()
    {
        $categories = Category::when($this->term, function ($query, $term) {
            return $query->where('category_name', 'LIKE', "%$term%");
        })->paginate(5);
        
        return view('livewire.categories', ['categories'=>$categories])->layout('layouts.base');
    }
}
