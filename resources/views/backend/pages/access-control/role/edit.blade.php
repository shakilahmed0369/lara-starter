@extends('backend.layouts.master')

@section('content')
<div class="header bg-primary pb-6"></div>
<div class="container-fluid mt--6">

<div class="">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0">Update Role</h3>
        </div>
        <div class="col-4 text-right">
          <a href="{{ route('admin.role.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Go back</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.role.update', $editRole->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="pl-lg-4">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-control-label" for="input-username">{{ __('Role Name') }}</label>
                <input name="role_name" type="text" id="input-username" class="form-control" placeholder="give a awesome role name" value="{{ $editRole->name }}">
                @error('role_name') <small class="text-danger">{{ $message }}</small> @enderror 
              </div>
            </div>
        </div>
        <h3>{{ __('Permissions') }}</h3>
        
        <br>

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
              <label class="custom-control-label" for="parent-{{ $groupName }}"><h3 class="text-danger">{{ $groupName }} *</h3></label>
            </div>
          </div>
          <div class="col-md-9 child-{{ $groupName }}">
            @foreach ($permission as $singlePermission)   
            <div class="">
              <div class="custom-control custom-checkbox">
              <input 
              @foreach ($editRole->permissions as $editPermission)
                  @if ($singlePermission->name === $editPermission->name)
                      checked
                  @endif
              @endforeach
               name="permissions[]" type="checkbox" class="custom-control-input" id="{{ $singlePermission->name }}" value="{{ $singlePermission->name }}">
               <label class="custom-control-label" for="{{ $singlePermission->name }}">{{ $singlePermission->name }}</label>
            </div>
            </div>
            @endforeach
          </div>
        </div>
        <hr class="m-2">
        @endforeach
        <button type="submit" class="btn btn-success">Update</button>
      </form>
    </div>
  </div>
</div>
</div>
@section('extraJs')
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
@endsection
@endsection