@extends('admin.layouts.master')

@section('title')
{{ 'Edit user' }}
@endsection

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Edit user</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
              <li class="breadcrumb-item active">{{ $user->name }}</li>
            </ol>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.user.update',$user->id) }}" method="post" id="form">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Email</label>
                                    <input type="text" class="form-control form-control-sm" id="title" name="email" value="{{ $user->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ $user->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control form-control-sm">
                                        <option value="user" @if ($user->role=="user") selected @endif>User</option>
                                        <option value="admin" @if ($user->role=="admin") selected @endif>Admin</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="status" id="role" class="form-control form-control-sm">
                                        <option value="0" @if ($user->status==0) selected @endif>Disabled</option>
                                        <option value="1" @if ($user->status==1) selected @endif>Enabled</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="float-left mr-3">Password</label>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-xs float-left" id="pass">Create Password</a>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-xs float-left" style="display: none" id="cancel">Cansel</a>
                                    <input type="text" class="form-control form-control-sm" style="display: none" id="password" name="password" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="card" id="save-card">
                        <div class="card-body">
                            <a href="javascript:void(0);" class="btn btn-success btn-sm float-right" id="submit">Update</a>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </div><!-- /.content -->
</div>
@endsection

@section('script')
<script>
    $("#pass").click(function(){
        $("#password").css('display',"block");
        $("#cancel").css('display',"block");
        $("#pass").css('display',"none");
    })
    $("#cancel").click(function(){
        $("#password").css('display',"none");
        $("#password").val(null);
        $("#cancel").css('display',"none");
        $("#pass").css('display',"block");
    })
</script>
@endsection
