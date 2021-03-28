<?php

namespace App\Http\Livewire\Backend\AccessControl;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleTable extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';
  protected $listeners       = ['remove'];

  /**
   * Write code on Method
   *
   * @return response()
   */

  public function alertConfirm($roleId)
  {

    $this->dispatchBrowserEvent('swal:confirm', [
      'type'    => 'warning',
      'message' => 'Are you sure?',
      'text'    => 'If deleted, you will not be able to recover the data',
      'roleId'  => $roleId
    ]);
  }

  /**
   * Write code on Method
   *
   * @return response()
   */

  public function remove($roleId)
  {
    if (auth()->guard('admin')->user()->can('delete-Role')) {
      if ($roleId != 1) {
        $distroyRole = Role::findOrFail($roleId);
        $distroyRole->delete();
        /* Write Delete Logic */
        $this->dispatchBrowserEvent('swal:modal', [
          'type'    => 'success',
          'message' => 'Role Deleted Successfully!',
          'text'    => 'regret wont be enough ( ͡❛ ₃ ͡❛)'
        ]);
      }
    }
  }


  public function render()
  {
    return view('livewire.backend.access-control.role-table', ['roles' => Role::with('permissions')->paginate(10)]);
  }
}
