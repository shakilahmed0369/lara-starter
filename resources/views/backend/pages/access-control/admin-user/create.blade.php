@extends('backend.layouts.master')

@section('content')
<div class="header bg-primary pb-6"></div>
<div class="container-fluid mt--6">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0">Create Admin User</h3>
        </div>
        <div class="col-4 text-right">
          <a href="{{ route('admin.admin-user.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Go back</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.admin-user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group ">
              <label for="exampleFormControlInput1">Name</label>
              <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
              @error('name')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="form-group ">
              <label for="exampleFormControlInput1">Email</label>
              <input name="email" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
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
            <option>{{ $role->name }}</option>
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

