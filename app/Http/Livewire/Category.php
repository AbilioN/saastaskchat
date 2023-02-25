<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category as Model;

class Category extends Component
{

    public $isOpen = false;

    public $name = '';

    public $categoryId = null;

    public function mount()
    {
        $this->categories = Model::all();
    }
    public function render()
    {
        return view('livewire.category.category');
    }

    public function create()

    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
    public function resetInputFields()
    {
        $this->categoryId = null;
        $this->name = '';
    }

    public function openModal()
    {
        $this->isOpen  = true;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $category = new Model();

        if($this->categoryId)
        {
            $category = Model::find($this->categoryId);
        }

        $category->name = $this->name;

        $category->save();

        $this->categories = Model::all();
        $this->resetInputFields();
        $this->closeModal();

    }


    public function edit($categoryId)
    {
        $category = Model::find($categoryId);
        $this->name = $category->name;
        $this->categoryId = $category->id;
        $this->openModal();
    }

    public function delete($categoryId)
    {
        $deletedCategory = Model::find($categoryId)->delete();
        $this->categories = Model::all();
        $this->resetInputFields();

    }

}
