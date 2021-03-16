@extends('backend.layouts.master')

@section('content')
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

              <a href="{{ route('admin.role.create') }}" class="btn-sm btn-success"><b><i class="fas fa-plus"></i> Add Role</b></a>
          
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
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                <tr>
                  <td class="budget">
                    $2500 USD
                  </td>
                  
                  <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status">pending</span>
                    </span>
                  </td>

                  <td class="budget">
                    $2500 USD
                  </td>
                  
                  <td class="table-actions">
                    <a href="#!" class="table-action-edit btn-sm btn-primary mr-3" data-toggle="tooltip" data-original-title="Edit Role">
                      <i class="fas fa-user-edit"></i> Edit
                    </a>
                    <a href="#!" class="table-action-delete  btn-sm btn-danger" data-toggle="tooltip" data-original-title="Delete Role">
                      <i class="fas fa-trash"></i> Delete
                    </a>
                  </td>

                </tr>
              </tbody>
            </table>
          </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
            <nav aria-label="...">
              <ul class="pagination justify-content-end mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <i class="fas fa-angle-left"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">
                    <i class="fas fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  

@endsection

