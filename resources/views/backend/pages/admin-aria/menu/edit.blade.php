@extends('backend.layouts.master')
@section('content')
@section('extraCss')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/nestable/nestable.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/iconpicker/fontawesome-iconpicker.min.css') }}">
@endsection
<div class="header bg-primary pb-6"></div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header border-1">
                    <div class="row">
                    <div class="col-6"><h3 class="mb-0">Menu</h3></div>
                        <div class="col-6 text-right">
													<button class="submit btn-sm btn-success"><b><i class="fas fa-save"></i>  Save Menu</b></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dd">
                        <ol class="dd-list">
                            @foreach ($parentItems as $parentItem)
                            <li class="dd-item" data-id="{{ $parentItem->id }}">
                                <div class="dd-handle"><i class="{{ $parentItem->icon }}"></i>  {{ $parentItem->name }}</div>
                                <!--action buttons-->
                                <div class="float-right" style="margin-top: -35px;
                                margin-right: 10px;">
                                  <a href="{{ route('admin.menu.edit', $parentItem->id) }}" class="btn-sm btn-primary ">Edit</a>
                                  <a href="" id="{{ $parentItem->id }}" class="btn-sm btn-danger delete">Delete</a>
                                </div>
                                <ol class="dd-list">
                                    @foreach ($menu as $menuChild)
                                    @if ($parentItem->id == $menuChild->parent_id)
                                        <li class="dd-item" data-id="{{ $menuChild->id }}">
                                            <div class="dd-handle"><i class="{{ $menuChild->icon }}"></i>  {{ $menuChild->name }}
                                            </div>
																						<!--action buttons-->
                                            <div class="float-right" style="margin-top: -35px;
																						margin-right: 10px;">
                                              <a href="{{ route('admin.menu.edit', $menuChild->id) }}" class="btn-sm btn-primary ">Edit</a>
                                              <a href="" id="{{ $menuChild->id }}"  class="btn-sm btn-danger delete">Delete</a>
                                            </div>
                                        </li>
                                    @endif  
                                    @endforeach
                                </ol>
                            </li>
                            @endforeach
                        </ol>
                    </div> 
                </div>
            </div>
        </div>
				
					<div class="col-md-6">
						<div class="card">
							<div class="card-header border-1">
								<div class="row">
									<div class="col-6"><h3 class="mb-0">Edit menu item</h3></div>
											<div class="col-6 text-right">
												<a href="{{ route('admin.menu.index') }}" class="btn-sm btn-warning"><i class="fas fa-arrow-left"></i> <b>Go back</b></a>
													<a href="" onclick="event.preventDefault(); $('.form').submit()" class="btn-sm btn-success"><b><i class="fas fa-save"></i>   Save Item</b></a>
											</div>
									</div>
							</div>
							<div class="card-body">

								<form action="{{ route('admin.menu.update', $editValue->id) }}" method="POST" class="form">
									@csrf
                  @method('PUT')
									<div class="form-group">
										<label for="" class="form-control-label">Title</label>
										<input name="name" class="form-control" type="text" value="{{ $editValue->name }}" id="example-text-input">
										@error('name') <small class="text-danger">{{ $message }}</small> @enderror 

									</div>

									<div class="form-group">
										<label for="example-text-input" class="form-control-label">Url</label>
										<input name="uri" class="form-control" type="text" value="{{ $editValue->uri }}" id="example-text-input">
										@error('uri') <small class="text-danger">{{ $message }}</small> @enderror 

									</div>

									<div class="form-group">
										<label for="example-text-input" class="form-control-label">Icon</label>
										<input name="icon" class="form-control iconpicker" type="text" value="{{ $editValue->icon }}" id="example-text-input">
										@error('icon') <small class="text-danger">{{ $message }}</small> @enderror 

									</div>
									<h3>{{ __('Permissions') }}</h3>
									@error('permissions') <small class="text-danger">{{ $message }}</small> @enderror 

									<br>
									<div style="
									height: 45vh;
									overflow-x: hidden;
									border: 1px solid #5e72e4;
									padding: 6px;">						
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="checkAll custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">{{ __('Give All Permission') }}</label>
									</div>
									<hr class="m-2">
					
									@foreach ($permissions as $groupName => $permission )
									<div class="row">
										<div class="col-md-3">
											<div class="custom-control custom-checkbox my-2">
												<input onclick="selectByGroup('child-{{ $groupName }}', this)" type="checkbox" class="custom-control-input" id="parent-{{ $groupName }}">
												<label class="custom-control-label" for="parent-{{ $groupName }}"><h4 class="text-danger">{{ $groupName }} *</h4></label>
											</div>
										</div>
										<div class="col-md-9 child-{{ $groupName }}">
											@foreach ($permission as $singlePermission)   
											<div class="">
												<div class="custom-control custom-checkbox">
												<input
                        @if ($editValue->permissions != 'null')
                        @foreach (json_decode($editValue->permissions) as $check)
                        @if ($singlePermission->name == $check)
                            checked
                        @endif
                        @endforeach
                        @endif
												
                        name="permissions[]" type="checkbox" class="custom-control-input" id="{{ $singlePermission->name }}" value="{{ $singlePermission->name }}">
												<label class="custom-control-label" for="{{ $singlePermission->name }}">{{ $singlePermission->name }}</label>
											</div>
											</div>
											@endforeach
										</div>
									</div>
									<hr class="m-2">
									@endforeach
								</div>

								</form>
							</div>
						</div>
					</div>
    </div>
</div>


    @section('extraJs')
		<!-- Script links-->
			<script src="{{ asset('backend/assets/vendor/nestable/jquery.nestable.js') }}"></script>
			<script src="{{ asset('backend/assets/vendor/iconpicker/fontawesome-iconpicker.min.js') }}"></script>
			<!--ajax token--->
			<script>
				$.ajaxSetup({
					headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
			</script>

			<!-- calling icon piker -->
			<script>
				$('.iconpicker').iconpicker();
			</script>
			<script>
				/* Nestable extra js scripts */
					$('.dd').nestable();
					$('.submit').on('click', function() {

						/* on change event */
						let data = $('.dd').nestable('serialize');
						// console.log(data);
						let url = "{{ url('/admin/menu/updaterow') }}";
						$.ajax({
							type: "POST",
							url: url,
							data: {'menu': data},
							dataType: 'json',
							success: function(responce){
								window.location.replace('/admin/menu');
							}
						});
					});   
			</script>

		<!-- scripts for permissions checkbox multi click-->
		<script>
			$(document).ready(function(){
				$(".checkAll").click(function () {
					$('input:checkbox').not(this).prop('checked', this.checked);
				}); 
			})

			function selectByGroup(childClass, parentClass){
					const permissionGroup = $('#'+parentClass.id);
					const checkPermission = $('.'+childClass+' input');

					if(permissionGroup.is(':checked')){
						checkPermission.prop('checked', true)
					}else{
						checkPermission.prop('checked', false)
					}
				}
		</script>

    	{{-- delete nestable item with sweet alert --}}
    <script>
      $('.delete').on('click', function(){
        event.preventDefault();
        let id = $(this).attr('id');
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
                type: "DELETE",
                url: "/admin/menu/" + id,
                success: function (response) {
                  window.location.replace('/admin/menu')
                }
            });
          }
        });
      })
    </script>

    @endsection
@endsection