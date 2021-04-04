@extends('backend.layouts.master')

@section('content')
<div class="main-content" id="panel">
  <div class="header bg-primary" style="padding-bottom: 150px;">
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--8">
    <div class="row">
      <div class="col-xl-4">
        <div class="card card-profile">
          <img src="https://i.pinimg.com/originals/af/80/39/af8039261a387be71514bb4c2e5e54b5.gif" alt="Image placeholder" class="card-img-top">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img id="profile" src="{{ $profile->avatar ? asset('storage/backend/avatar/'.$profile->avatar ) : 'https://media.tenor.com/images/4fd49de4149a6d348e04f2465a3970af/tenor.gif' }}" class="rounded-circle" width="120px" height="120px" style="object-fit: cover">
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
              <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
              <a href="#" class="btn btn-sm btn-default float-right">Message</a>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center">
                  <div>
                    <span class="heading">0</span>
                    <span class="description">Extra</span>
                  </div>
                  <div>
                    <span class="heading">0</span>
                    <span class="description">Extra</span>
                  </div>
                  <div>
                    <span class="heading">0</span>
                    <span class="description">Extra</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <h5 class="h3">
                {{ $profile->name }}<span class="font-weight-light">
              </h5>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>{{ $profile->email }}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Edit Profile</h3>
              </div>
              <div class="col-4 text-right">
                <a href="" onclick="event.preventDefault()" class="btn btn-sm btn-primary send"><i
                    class="fas fa-save"></i> Save</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form class="form" action="{{ route('admin.profile.update', [$profile->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $profile->name }}">
                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" class="form-control" id="email" value="{{ $profile->email }}">
                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="form-group mb-0">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password"
                      placeholder="">
                  </div>
                </div>
                <div class="col-md-6 ">
                  <div class="form-group mb-0">
                    <label for="c-password">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="c-password"
                      placeholder="">
                    <br>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="">Avater</label>
                <div class="custom-file">
                  <input onchange="document.getElementById('profile').src = window.URL.createObjectURL(this.files[0])" name="avatar" type="file" class="custom-file-input" id="customFileLang" lang="en">
                  <label class="custom-file-label" for="customFileLang">Avatar</label>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@section('extraJs')
    <script>
      $('.send').click(function(){
        $(".form").submit();
      })
    </script>
@endsection
@endsection