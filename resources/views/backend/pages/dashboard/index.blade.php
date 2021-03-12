@extends('backend.layouts.master')
@section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                  <span class="h2 font-weight-bold mb-0">350,897</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                  <span class="h2 font-weight-bold mb-0">2,356</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-chart-pie-35"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                  <span class="h2 font-weight-bold mb-0">924</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="ni ni-money-coins"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                  <span class="h2 font-weight-bold mb-0">49,65%</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    <i class="ni ni-chart-bar-32"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card bg-default shadow">
        <div class="card-header bg-transparent border-0">
          <h3 class="text-white mb-0">Dark table</h3>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-dark table-flush">
            <thead class="thead-dark">
              <tr>
                <th scope="col" class="sort" data-sort="name">Project</th>
                <th scope="col" class="sort" data-sort="budget">Budget</th>
                <th scope="col" class="sort" data-sort="status">Status</th>
                <th scope="col">Users</th>
                <th scope="col" class="sort" data-sort="completion">Completion</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
              <tr>
                <th scope="row">
                  <div class="media align-items-center">
                    <a href="#" class="avatar rounded-circle mr-3">
                      <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                    </a>
                    <div class="media-body">
                      <span class="name mb-0 text-sm">Argon Design System</span>
                    </div>
                  </div>
                </th>
                <td class="budget">
                  $2500 USD
                </td>
                <td>
                  <span class="badge badge-dot mr-4">
                    <i class="bg-warning"></i>
                    <span class="status">pending</span>
                  </span>
                </td>
                <td>
                  <div class="avatar-group">
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                      <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                      <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                      <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                      <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                    </a>
                  </div>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="completion mr-2">60%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  <div class="media align-items-center">
                    <a href="#" class="avatar rounded-circle mr-3">
                      <img alt="Image placeholder" src="../assets/img/theme/angular.jpg">
                    </a>
                    <div class="media-body">
                      <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                    </div>
                  </div>
                </th>
                <td class="budget">
                  $1800 USD
                </td>
                <td>
                  <span class="badge badge-dot mr-4">
                    <i class="bg-success"></i>
                    <span class="status">completed</span>
                  </span>
                </td>
                <td>
                  <div class="avatar-group">
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                      <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                      <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                      <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                      <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                    </a>
                  </div>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="completion mr-2">100%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  <div class="media align-items-center">
                    <a href="#" class="avatar rounded-circle mr-3">
                      <img alt="Image placeholder" src="../assets/img/theme/sketch.jpg">
                    </a>
                    <div class="media-body">
                      <span class="name mb-0 text-sm">Black Dashboard</span>
                    </div>
                  </div>
                </th>
                <td class="budget">
                  $3150 USD
                </td>
                <td>
                  <span class="badge badge-dot mr-4">
                    <i class="bg-danger"></i>
                    <span class="status">delayed</span>
                  </span>
                </td>
                <td>
                  <div class="avatar-group">
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                      <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                      <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                      <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                      <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                    </a>
                  </div>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="completion mr-2">72%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  <div class="media align-items-center">
                    <a href="#" class="avatar rounded-circle mr-3">
                      <img alt="Image placeholder" src="../assets/img/theme/react.jpg">
                    </a>
                    <div class="media-body">
                      <span class="name mb-0 text-sm">React Material Dashboard</span>
                    </div>
                  </div>
                </th>
                <td class="budget">
                  $4400 USD
                </td>
                <td>
                  <span class="badge badge-dot mr-4">
                    <i class="bg-info"></i>
                    <span class="status">on schedule</span>
                  </span>
                </td>
                <td>
                  <div class="avatar-group">
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                      <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                      <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                      <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                      <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                    </a>
                  </div>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="completion mr-2">90%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  <div class="media align-items-center">
                    <a href="#" class="avatar rounded-circle mr-3">
                      <img alt="Image placeholder" src="../assets/img/theme/vue.jpg">
                    </a>
                    <div class="media-body">
                      <span class="name mb-0 text-sm">Vue Paper UI Kit PRO</span>
                    </div>
                  </div>
                </th>
                <td class="budget">
                  $2200 USD
                </td>
                <td>
                  <span class="badge badge-dot mr-4">
                    <i class="bg-success"></i>
                    <span class="status">completed</span>
                  </span>
                </td>
                <td>
                  <div class="avatar-group">
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                      <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                      <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                      <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                    </a>
                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                      <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                    </a>
                  </div>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="completion mr-2">100%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
</div>

@endsection