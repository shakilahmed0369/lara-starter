<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Counter extends Component
{
  public $test = 'hello';

  // public function mount()
  // {
  //     return $this->test = Role::all();
  // }
    public function render()
    {
        return view('livewire.counter');
    }
}
