<?php

namespace App\Http\Livewire\Backend\AccessControl;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Admin;

class AdminUserTable extends Component
{

  use WithPagination;

  protected $paginationTheme = 'bootstrap';
  protected $listeners       = ['remove'];


  /**
   * Write code on Method
   *
   * @return response()
   */

  public function alertConfirm($userId)
  {

    $this->dispatchBrowserEvent('swal:confirm', [
      'type'    => 'warning',
      'message' => 'Are you sure?',
      'text'    => 'If deleted, you will not be able to recover the data',
      'roleId'  => $userId
    ]);
  }

  /**
   * Write code on Method
   *
   * @return response()
   */

  public function remove($roleId)
  {
    if (auth()->guard('admin')->user()->can('delete-Admin-User')) {
      $destroyRole = Admin::findOrFail($roleId);
      $destroyRole->delete();
      /* Write Delete Logic */
      $this->dispatchBrowserEvent('swal:modal', [
        'type'    => 'success',
        'message' => 'Role Deleted Successfully!',
        'text'    => 'regret wont be enough ( ͡❛ ₃ ͡❛)'
      ]);
    }
  }

  public function render()
  {
    return view('livewire.backend.access-control.admin-user-table', ['adminUsers' => Admin::with('roles')->paginate(10)]);
  }
}
