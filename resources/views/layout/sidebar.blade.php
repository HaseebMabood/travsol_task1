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


      <li class="nav-item">
        <a class="nav-link {{Request::routeIs('home') ? 'active' : ''}}" href="{{url('home')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>


      <li class="nav-item" >
        <a class="nav-link {{Request::is('users')?'active':''}} " href="{{url('users')}}">
          <i class="fa fa-user"></i> <span>Users</span>
        </a>
      </li>

      @role('admin')
      <li class="nav-item" >
        <a class="nav-link {{Request::is('roles')?'active':''}}" href="{{url('roles')}}">
          <i class="fa fa-user"></i> <span>Roles</span>
        </a>
      </li>

      <li class="nav-item" >
        <a class="nav-link {{Request::is('permissions')?'active':''}}" href="{{url('permissions')}}">
          <i class="fa fa-user"></i> <span>Permissions</span>
        </a>
      </li>



      <li class="nav-item" >
        <a class="nav-link {{Request::is('agencies')?'active':''}}" href="{{route("agencies.index")}}">
          <i class="fa fa-user"></i> <span>Agencies</span>
        </a>
      </li>

      @endrole

      {{-- <li class="nav-item" {{Request::is('agency')?'active':''}}>
        <a class="nav-link" href="{{route("agency.index")}}">
          <i class="fa fa-user"></i> <span>Agency Detail</span>
        </a>
      </li> --}}


      {{-- These are the agents relevant to a specific manager who created them --}}
      @role('manager')
      <li class="nav-item" >
        <a class="nav-link {{Request::is('agents_new')?'active':''}}" href="{{route("agents_new.index")}}">
          <i class="fa fa-user"></i> <span>Agents</span>
        </a>
      </li>
      @endrole


      {{-- These are all the Agents created by individual managers--}}
      @role('admin')
      <li class="nav-item" >
        <a class="nav-link {{Request::is('agents_all')?'active':''}}" href="{{url("/agents_all")}}">
          <i class="fa fa-user"></i> <span>Agents</span>
        </a>
      </li>
      @endrole



      {{-- this agency is related to their corresponding manager --}}
      @role('manager')

      <li class="nav-item" >
        <a class="nav-link {{Request::is('agency')?'active':''}}" href="{{route("agency.index")}}">
          <i class="fa fa-user"></i> <span>Agency</span>
        </a>
      </li>

      @endrole
{{--
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Super Admin</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=""><i class="fa fa-circle-o"></i> Admin</a></li>
          <li><a href="{{route("agencies.index")}}"><i class="fa fa-circle-o"></i> Agencies</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i> Manager</a></li>

        </ul>
      </li>



      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Manager</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=""><i class="fa fa-circle-o"></i> Agency</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i> Users</a></li>

        </ul>
      </li> --}}




    </ul>
  </section>
