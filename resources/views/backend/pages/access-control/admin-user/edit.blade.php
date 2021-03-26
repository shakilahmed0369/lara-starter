@extends('backend.layouts.master')

@section('content')
<div class="header bg-primary pb-6"></div>
<div class="container-fluid mt--6">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0">Edit Admin User</h3>
        </div>
        <div class="col-4 text-right">
          <a href="{{ route('admin.admin-user.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Go back</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.admin-user.update', $adminUserEdit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-6">
            <div class="form-group ">
              <label for="exampleFormControlInput1">Name</label>
              <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ $adminUserEdit->name }}">
              @error('name')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="form-group ">
              <label for="exampleFormControlInput1">Email</label>
              <input name="email" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ $adminUserEdit->email }}">
              @error('email')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="form-group ">
              <label for="exampleFormControlInput1">Password</label>
              <input name="password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
              @error('password')
              <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="form-group ">
              <label for="exampleFormControlInput1">Confirm Password</label>
              <input name="password_confirmation" type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
              @error('password_confirmation')
              <small class="text-danger">{{ $message }}</small>
              @enderror <br>
            </div>
          </div>
        </div>
        <div class="previwe-avatar img-fluid rounded mb-2">
          <img width="150px" class="img-fluid rounded" src="{{$adminUserEdit->avatar ? asset("storage/backend/avatar/$adminUserEdit->avatar") : 'https://media.tenor.com/images/4fd49de4149a6d348e04f2465a3970af/tenor.gif' }}" alt="">
        </div>
        <div class="form-group">
          <label for="">Avater</label>
          <div class="custom-file">
            <input name="avatar" type="file" class="custom-file-input" id="customFileLang" lang="en">
            <label class="custom-file-label" for="customFileLang">Avatar</label>
          </div>
          @error('avatar')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect2">Assign Role <small class="text-danger text-muted">( you can select multiple role -> hold ctrl+click )</small></label>
          <select name="role[]" multiple class="form-control" id="exampleFormControlSelect2">
            @foreach ($roles as $role)
            <option
            @foreach ($adminUserEdit->getRoleNames() as $userRoleName)
            @if ($userRoleName === $role->name)
                selected
            @endif 
            @endforeach
            >{{ $role->name }}</option>
            @endforeach
          </select>
          @error('role')
              <small class="text-danger">{{ $message }}</small>
          @enderror <br>
        </div>
        <button class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</div>
@endsection


