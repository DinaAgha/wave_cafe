<!DOCTYPE html>
<html lang="en">
  @include('adminIncludes.header')
  @include('adminIncludes.head')

  <!-- /sidebar menu -->
  @include('adminIncludes.sidebar')
  <!-- /menu footer buttons -->
  @include('adminIncludes.menu')
  <!-- /menu footer buttons -->
</div>
</div>

<!-- top navigation -->
@include('adminIncludes.topnav')
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Manage Users</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5  form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit User</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form action="{{ route('updateUser', $users->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Full Name <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="name" name="name" value="{{ $users->name }}" required="required" class="form-control">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="username" name="username" value="{{ $users->username }}" required="required" class="form-control">
                </div>
              </div>
              <div class="item form-group">
                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="email" class="form-control" type="email" name="email" value="{{ $users->email }}" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label for="active" class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="checkbox" id="active" name="active" class="flat" {{ $users->active ? 'checked' : '' }}>
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="password" id="password" name="password" class="form-control">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                  <button class="btn btn-primary" type="button">Cancel</button>
                  <button type="submit" value="Submit" class="btn btn-success">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<!-- footer content -->
<footer>
  <div class="pull-right">
    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
@include('adminIncludes.footer')
</body>
</html>
