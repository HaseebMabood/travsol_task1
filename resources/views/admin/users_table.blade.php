@extends('admin.adminmain')


@section('heading')

<h1>
    Users List
    <small>it all starts here</small>
  </h1>

@endsection

@section('content')
<section class="content">
    <div class="row ">
      <div class="col-xs-12">
        <div class="box ">
            @can('create user')
                <div class="box-header">
                    <a href="{{route('users.create')}}" class="btn btn-info">Add User +</a>
                </div>
           @endcan
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>

                @can('action')
                    <th>Action</th>
                @endcan

              </tr>
              </thead>
              <tbody>

                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td>




                    @can('action')

                        <td class="d-flex">

                                <a href="{{route('users.edit',$user)}}">
                                <i class=" btn btn-success btn-anim  btn-s fa fa-edit" style="height: 34px"></i></a>


                                @if ($user->usertype=='0')
                                    <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    <button type="submit" class="btn btn-danger " style="margin-left: 10px"><i class="fa fa-trash btn-anim btn-s" style="height: 10px;"></i></button>
                                    </form>
                                @endif

                        </td>
                    @endcan
                  </tr>

                @endforeach

              </tbody>

            </table>
            <style>
                .d-flex{
                    display: flex;
                }
            </style>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection