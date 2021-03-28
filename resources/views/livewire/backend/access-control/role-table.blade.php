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
              <div class="col-6"><h3 class="mb-0">Roles</h3></div>
            <div class="col-6 text-right">
              @if (auth()->guard('admin')->user()->can('create-Role'))
              <a href="{{ route('admin.role.create') }}" class="btn-sm btn-success"><b><i class="fas fa-plus"></i> Add Role</b></a>
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
                  <th scope="col" class="sort" data-sort="budget">Role</th>
                  <th scope="col" class="sort" data-sort="name">Role Users</th>
                  <th scope="col" class="sort" data-sort="name">Permissions</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach ($roles as $role)
                <tr>
                  <td class="budget">
                    {{ ++$loop->index }}
                  </td> 
                  <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status">{{ $role->name }}</span>
                    </span>
                  </td>
                  <td class="budget">
                    <div class="avatar-group">
                    @foreach ($role->users as $roleUser)
                      <a href="#" class="avatar rounded-circle" data-trigger="hover" rel="popover" data-html="true" data-content='
                        <div class="row p-2">
                          <div>
                            <img width="70px" class="img-fluid rounded" src="{{$roleUser->avatar ? asset("storage/backend/avatar/$roleUser->avatar") : 'https://media.tenor.com/images/4fd49de4149a6d348e04f2465a3970af/tenor.gif' }}" alt="">
                          </div>
                          <div class=" ml-2">
                            <h4 class="mb-0">{{ $roleUser->name }}</h4>
                            <small>{{ $roleUser->email }}</small><br>
                            <small>{{ $role->name }}</small>
                          </div>
                        </div>'>
                        <img width="70px" class="img-fluid rounded" src="{{$roleUser->avatar ? asset("storage/backend/avatar/$roleUser->avatar") : 'https://media.tenor.com/images/4fd49de4149a6d348e04f2465a3970af/tenor.gif' }}" alt="">
                      </a>
                      @endforeach
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status">( {{  $role->permissions()->count()  }} )</span>
                    </span>
                  </td>
                  <td class="table-actions">
                    @if (auth()->guard('admin')->user()->can('edit-Role'))
                      <a href="{{ route('admin.role.edit', $role->id) }}" class=" table-action-edit btn-sm btn-primary mr-3
                      @if ($role->name === 'super-admin') disable @endif" data-toggle="tooltip" data-original-title="Edit Role">
                        <i class="fas fa-user-edit"></i> Edit
                      </a>
                    @endif
                    @if (auth()->guard('admin')->user()->can('delete-Role'))
                      <a href="#!" wire:click.prevent="alertConfirm({{ $role->id }})" class="table-action-delete  btn-sm btn-danger @if ($role->name === 'super-admin') disable @endif" data-toggle="tooltip" data-original-title="Delete Role">
                        <i class="fas fa-trash"></i> Delete
                      </a>
                    @endif
                  </td>
                </tr> 
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer py-4">
            <nav aria-label="...">
              <ul class="pagination justify-content-end mb-0">
                {{ $roles->links() }}
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
