<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role as Model;
class Role extends Component
{

    public $isOpen = false;

    public $name = '';

    public $roleId = null;

    public function mount()
    {
        $this->roles = Model::all();
    }
    public function render()
    {
        return view('livewire.role.role');
    }

    public function create()

    {

        $this->resetInputFields();
        $this->openModal();

    }

    public function resetInputFields()
    {
        $this->name = '';

    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);

        $role = new Model();
        if($this->roleId)
        {
            $role = Model::find($this->roleId);
        }

        $role->name = $this->name;
        $role->save();
        $this->resetInputFields();
        $this->roles = Model::all();
        $this->closeModal();

    }

    public function edit($roleId)
    {
        $role = Model::find($roleId);
        $this->name = $role->name;
        $this->roleId = $role->id;
        $this->openModal();
    }

    public function delete($roleId)
    {
        $role = Model::find($roleId);
        $role->delete();
        $this->roles = Model::all();
        $this->resetInputFields();
        
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
