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
        <h3>Manage Beverages</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 form-group pull-right top_search">
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
            <h2>Add Beverage</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form action="{{ route('beverages.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="bname">Name <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" name="bname" id="bname" required="required" class="form-control ">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="descrip">Description <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                  <textarea id="descrip" name="descrip" required="required" class="form-control"></textarea>
                </div>
              </div>
              <div class="item form-group">
                <label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="price" class="form-control" type="number" name="price" required="required" step="0.01">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Published</label>
                <div class="col-md-6 col-sm-6 ">
                  <div class="checkbox">
                    <label>
                      <input name="published" id="published" type="checkbox" class="flat">
                    </label>
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Special</label>
                <div class="col-md-6 col-sm-6 ">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="special" id="special" class="flat">
                    </label>
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="file" id="image" name="image" required="required" class="form-control">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="category">Category <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="form-control" name="category_id" id="category" required>
                    <option value="">Please Select Category</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                  <button class="btn btn-primary" type="button">Cancel</button>
                  <button type="submit" value="Submit" class="btn btn-success">Add</button>
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
<!-- /footer content -->
@include('adminIncludes.footer')
</body>
</html>
