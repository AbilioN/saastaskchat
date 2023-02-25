<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Task extends Component
{

    public $name = '';

    public $category = '';

    public $priority = '';

    public $when = '';

    
    public $isOpen = false;

    public function mount()
    {
        $this->tasks = \App\Models\Task::all();
    }
    public function render()
    {
        return view('livewire.task.task');
    }


    public function create()

    {

        // $this->resetInputFields();

        $this->openModal();

    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
    public function openModal()
    {
        $this->isOpen  = true;
    }
}
