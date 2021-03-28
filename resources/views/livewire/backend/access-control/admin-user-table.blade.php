<div>
  <!-- Page content -->
<div class="header bg-primary pb-6"></div>
<div class="container-fluid mt--6">
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <div class="row">
          <div class="col-6"><h3 class="mb-0">Admin Users</h3></div>
        <div class="col-6 text-right">
          @if (auth()->guard('admin')->user()->can('create-Admin-User'))
          <a href="{{ route('admin.admin-user.create') }}" class="btn-sm btn-success"><b><i class="fas fa-plus"></i> Add New Admin</b></a>
          @endif
        </div>
        </div>
      </div>
      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col" class="sort" data-sort="name">No.</th>
              <th scope="col" class="sort" data-sort="budget">Avatar</th>
              <th scope="col" class="sort" data-sort="name">Name</th>
              <th scope="col" class="sort" data-sort="name">Role</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody class="list">
            @foreach ($adminUsers as $user)
            <tr>
              <td class="budget">
                {{ ++$loop->index }}
              </td> 
              <td><img width="70px" class="img-fluid rounded" src="{{$user->avatar ? asset("storage/backend/avatar/$user->avatar") : 'https://media.tenor.com/images/4fd49de4149a6d348e04f2465a3970af/tenor.gif' }}" alt=""></td>

              <td class="budget">
                {{ $user->name }}
              </td>

              <td>
               @foreach ($user->getRoleNames() as $roleName)
               @if ($user->hasRole('super-admin'))
               <i class="fas fa-crown text-warning"></i> 
               @endif
               <span class="badge badge-success"><b> {{ $roleName }}</b></span>   
               @endforeach
              </td>

              @if ($user->id == 1)
                <td class="table-actions">
                  <a href="{{ route('admin.admin-user.edit', $user->id) }}" class=" table-action-edit btn-sm disable btn-primary mr-3 " data-toggle="tooltip" data-original-title="Edit Role">
                    <i class="fas fa-user-edit"></i> Edit
                  </a>
                  <a href="#!" wire:click.prevent="alertConfirm({{ $user->id }})" class="table-action-delete disable  btn-sm btn-danger" data-toggle="tooltip" data-original-title="Delete Role">
                    <i class="fas fa-trash"></i> Delete
                  </a>
                </td>
              @else
                <td class="table-actions">
                  @if (auth()->guard('admin')->user()->can('edit-Admin-User'))
                  <a href="{{ route('admin.admin-user.edit', $user->id) }}" class=" table-action-edit btn-sm btn-primary mr-3 " data-toggle="tooltip" data-original-title="Edit Role">
                    <i class="fas fa-user-edit"></i> Edit
                  </a>
                  @endif
                  @if (auth()->guard('admin')->user()->can('delete-Admin-User'))
                  <a href="#!" wire:click.prevent="alertConfirm({{ $user->id }})" class="table-action-delete  btn-sm btn-danger" data-toggle="tooltip" data-original-title="Delete Role">
                    <i class="fas fa-trash"></i> Delete
                  </a>
                  @endif
              </td>
              @endif
            </tr> 
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-footer py-4">
        <nav aria-label="...">
          <ul class="pagination justify-content-end mb-0">
            {{ $adminUsers->links() }}
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
</div>
</div>
