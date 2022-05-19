@extends('admin.layouts.app', [
    'activePage' => 'dashboard',
  ])

@section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Dashboard</h3>
                  <h6 class="font-weight-normal mb-0">Change Password</h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <a href="/" target="_blank">
                    <button type="button" class="btn btn-outline-primary btn-md"><i class="ti-home mr-2"></i> Visit Homepage</button>
                  </a>
                 </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h3><i class="ti-reload"></i> Change Password</h3>
                    <a href="/admin/home">
                      <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="ti-arrow-left mr-1"></i> Back</button>
                    </a>
                  </div>
                  <hr>
                  @if (session('error'))
                  <div class="alert alert-danger">
                    {{ session('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  <form class="forms-sample" action="/admin/change_password" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleInputUsername1">Password Lama</label>
                      <input type="text" autofocus required class="form-control" name="current-password" placeholder="Masukan Password Lama...">
                      @if ($errors->has('password-lama'))
                        <span class="help-block">
                          <strong>{{ $errors->first('password-lama') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Password Baru</label>
                      <input type="text" autofocus required class="form-control" name="new-password" placeholder="Masukan Password Baru...">
                      @if ($errors->has('password-baru'))
                        <span class="help-block">
                          <strong>{{ $errors->first('password-baru') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Konfirmasi Password Baru</label>
                      <input type="text" autofocus required class="form-control" name="new-password_confirmation" placeholder="Masukan Konfirmasi Password Baru...">
                      @if ($errors->has('password-baru'))
                        <span class="help-block">
                          <strong>{{ $errors->first('password-baru') }}</strong>
                        </span>
                      @endif
                    </div>
                    <button type="submit" class="btn btn-primary mt-1 mr-2"><i class="mdi mdi-content-save-all"></i> Update Data</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
@endsection
