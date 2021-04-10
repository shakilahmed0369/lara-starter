@extends('backend.layouts.master')
@section('content')

<div class="header bg-primary pb-6"></div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Site Settings</h3>
                </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3 col-sm-12">
                    <ul class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                      <li><a class="nav-link text-left active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                          role="tab" aria-controls="v-pills-home" aria-selected="false">Web Info</a></li>
                      <li><a class="nav-link text-left" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                          role="tab" aria-controls="v-pills-profile" aria-selected="false">Contact Info</a></li>
                      <li><a class="nav-link text-left" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                          role="tab" aria-controls="v-pills-messages" aria-selected="false">Web Properties</a></li>
                    </ul>
                  </div>
                  <div class="col-md-9 col-sm-12">
                    <div class="tab-content" id="v-pills-tabContent">
                      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <form action="{{ route('admin.settings.webinfoupdate') }}" method="POST">
                          @csrf
                          <div class="form-group">
                            <label class="floating-label" for="Email">Company Name</label>
                            <input name="c_name" type="text" class="form-control" id="Email" aria-describedby="emailHelp"
                              value="{{ $webInfo->c_name }}">
                          </div>
          
                          <div class="form-group">
                            <label class="floating-label" for="Email">Website Name</label>
                            <input name="web_name" type="text" class="form-control" id="Email" aria-describedby="emailHelp"
                              value="{{ $webInfo->web_name }}">
                          </div>
          
                          <div class="form-group">
                            <label class="floating-label" for="Email">Website Url</label>
                            <input name="web_url" type="text" class="form-control" id="Email" aria-describedby="emailHelp"
                              value="{{ $webInfo->web_url }}">
                          </div>
          
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="floating-label" for="Email">Website Description</label>
                                <textarea name="site_description" class="form-control" id="exampleFormControlTextarea1"
                                  rows="3">{{ $webInfo->site_description }}</textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="floating-label" for="Email">Meta Description</label>
                                <textarea name="meta_keyword" class="form-control" id="exampleFormControlTextarea1"
                                  rows="3">{{ $webInfo->meta_keyword }}</textarea>
                              </div>
                            </div>
                          </div>
          
                          <div class="form-group">
                            <label class="floating-label" for="Email">Cradit Footer</label>
                            <textarea name="footer_info" class="form-control" id="exampleFormControlTextarea1"
                              rows="3">{{ $webInfo->footer_info }}</textarea>
                          </div>
          
                          <input class="float-right btn btn-primary" type="submit" value="Save">
          
                        </form>
                      </div>
          
                      <div class="tab-pane fade " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <form action="{{ route('admin.settings.contactInfoUpdate') }}" method="POST">
                          @csrf
                          <div class="form-group">
                            <label class="floating-label" for="Email">Street</label>
                            <input name="street" type="text" class="form-control" id="Email" aria-describedby="emailHelp"
                              value="{{ $contactInfo->street }}">
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="floating-label" for="Email">City</label>
                                <input name="city" type="text" class="form-control" id="Email" aria-describedby="emailHelp"
                                  value="{{ $contactInfo->city }}">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="floating-label" for="Email">Postal Coad</label>
                                <input name="post_code" type="text" class="form-control" id="Email" aria-describedby="emailHelp"
                                  value="{{ $contactInfo->post_code }}">
                              </div>
                            </div>
                          </div>
          
          
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="floating-label" for="Email">State</label>
                                <input name="state" type="text" class="form-control" id="Email" aria-describedby="emailHelp"
                                  value="{{ $contactInfo->state }}">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="floating-label" for="Email">Country</label>
                                <input name="country" type="text" class="form-control" id="Email" aria-describedby="emailHelp"
                                  value="{{ $contactInfo->country }}">
                              </div>
                            </div>
                          </div>
          
                          <div class="form-group">
                            <label class="floating-label" for="Email">Full Address</label>
                            <input name="full_adds" type="text" class="form-control" id="Email" aria-describedby="emailHelp"
                              value="{{ $contactInfo->full_adds }}">
                          </div>
          
          
                          <br>
                          <h6>Social Links</h6>
                          <br>
          
                          <div class="form-group">
                            <label class="floating-label" for="Email">Facebook</label>
                            <input name="fb" type="text" class="form-control" id="Email" aria-describedby="emailHelp"
                              value="{{ $contactInfo->fb }}">
                          </div>
          
                          <div class="form-group">
                            <label class="floating-label" for="Email">Twtter</label>
                            <input name="tw" type="text" class="form-control" id="Email" aria-describedby="emailHelp"
                              value="{{ $contactInfo->tw }}">
                          </div>
          
                          <div class="form-group">
                            <label class="floating-label" for="Email">Youtube</label>
                            <input name="yt" type="text" class="form-control" id="Email" aria-describedby="emailHelp"
                              value="{{ $contactInfo->yt }}">
                          </div>
          
                          <div class="form-group">
                            <label class="floating-label" for="Email">Email</label>
                            <input name="email" type="text" class="form-control" id="Email" aria-describedby="emailHelp"
                              value="{{ $contactInfo->yt }}">
                          </div>
          
                          <input class="float-right btn btn-primary" type="submit" value="Save">
          
                        </form>
                      </div>
          
                      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <form action="{{ route('admin.settings.imageUpdate') }}" enctype="multipart/form-data" method="POST">
                          @csrf
                          <div class="row">
                            <div class="col-md-6">
                              <div><img width="300px" id="header_logo"
                                  src="{{ asset('storage/backend/logos/'.$webProperties->header_logo) }}" alt=""></div><br>
                              <label for="" class="">Header Logo</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input name="header_logo" type="file" class="custom-file-input" id="inputGroupFile01"
                                    onchange="document.getElementById('header_logo').src = window.URL.createObjectURL(this.files[0])">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div><img width="300px" id="footer_logo"
                                  src="{{ asset('storage/backend/logos/'.$webProperties->footer_logo) }}" alt=""></div><br>
                              <label for="">Footer Logo</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input name="footer_logo" type="file" class="custom-file-input" id="inputGroupFile01"
                                    onchange="document.getElementById('footer_logo').src = window.URL.createObjectURL(this.files[0])">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <br>
                              <div><img width="300px" id="favicon"
                                  src="{{ asset('storage/backend/logos/'.$webProperties->favicon) }}" alt=""></div><br>
                              <label for="">Favicon</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input name="favicon" type="file" class="custom-file-input" id="inputGroupFile02"
                                    onchange="document.getElementById('favicon').src = window.URL.createObjectURL(this.files[0])">
                                  <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <br>
                              <div><img width="300px" id="admin_logo"
                                  src="{{ asset('storage/backend/logos/'.$webProperties->admin_logo) }}" alt=""></div><br>
                              <label for="">Admin Logo</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input name="admin_logo" type="file" class="custom-file-input" id="inputGroupFile03"
                                    onchange="document.getElementById('admin_logo').src = window.URL.createObjectURL(this.files[0])">
                                  <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <input type="submit" class="btn btn-primary mt-3 float-right" value="Save">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
        </div>
    </div>
</div>

@endsection