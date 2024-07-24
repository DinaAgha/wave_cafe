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
                <h3>Manage Beverage</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
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
                    <h2>List of Beverages</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Beverage Date</th>
                          <th>Title</th>
                          <th>Published</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                        @foreach ($bevereges as $beverege)
                        </tr>
                        <tr>
                          <td>{{$beverege->beverage_date}}</td>
                 
                          <td>{{$beverege->bname}}</td>
                          <td>{{$beverege->published ? 'Yes' : 'No' }}</td>
                          <td><a href="{{ route('editBevereg', $beverege->id) }}"><img src="{{asset('adminassets/./images/edit.png')}}" alt="Edit"></td>
                          <td><form action="{{ route('forceDeleteBevereg', $beverege->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this beverage?')" style="border: none; background: none; padding: 0;">
            <img src="{{ asset('adminassets/images/delete.png') }}" alt="Delete">
        </button>
    </form>
                        </tr>
                        @endforeach 
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <footer>
				<div class="pull-right">
					Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
				</div>
				<div class="clearfix"></div>
			</footer>

        <!-- footer content -->
        @include('adminIncludes.footer')
  </body>
</html>