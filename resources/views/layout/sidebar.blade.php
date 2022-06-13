<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel ">
        
            <div class="pull-left image">
                {{-- <a href="{{url('my-profile')}}"> --}}
                     <img src="{{asset('public/upload_images/'.Auth::user()->image)}}"  class="img-circle" alt="">
                {{-- </a> --}}
            </div>
        
        
            <div class="pull-left info ">
                <a href="{{url('my-profile')}}">
                    <p>{{ Auth::user()->name }}</p>
                </a>    
               
               
                {{-- <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> Online</a> --}}
            </div>
    
    </div>
    <!-- search form -->
    {{-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> --}}
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu " data-widget="tree">
      <li class="header ">MAIN NAVIGATION</li>
 
 
      <li class="nav-item" {{Request::is('home')?'active':''}}>
        <a class="nav-link" href="{{url('home')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>   
        </a>
      </li>
      

      <li class="nav-item" {{Request::is('users')?'active':''}}>
        <a class="nav-link" href="{{url('users')}}">
          <i class="fa fa-user"></i> <span>Users</span>   
        </a>
      </li>

    </ul>
  </section>
