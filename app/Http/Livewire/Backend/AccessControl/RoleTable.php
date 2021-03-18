<?php

namespace App\Http\Livewire\Backend\AccessControl;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleTable extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public function mount()
  {
    
    
  }
 
    public function render()
    {
        return view('livewire.backend.access-control.role-table', ['roles' => Role::paginate(1)]);
    }
}
