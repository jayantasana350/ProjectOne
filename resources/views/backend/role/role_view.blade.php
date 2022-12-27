@extends('backend.master')

@section('content')
<div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40 mg-t-50">
      <div class="table-responsive">
        <div class="list">
            <a class="float-right mg-b-10" style="border: 1px solid rgb(71, 109, 236); padding: 10px;" href="" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i> Add Role</a>
            <a class="float-right mg-b-10" style="border: 1px solid rgb(71, 109, 236); padding: 10px;" href="" data-toggle="modal" data-target="#exampleModa2"> <i class="fa fa-plus"></i> Add Permission</a>
            <a class="float-right mg-b-10" style="border: 1px solid rgb(71, 109, 236); padding: 10px;" href="" data-toggle="modal" data-target="#exampleModa3"> <i class="fa fa-plus"></i> Role Add to Permission</a>
        </div>
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row row-sm mg-t-20">
                        <div class="col-xl-12 m-auto">
                          <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                              <form action="{{ route('RolePost') }}" method="POST">
                                  @csrf
                                  <div class="row">
                                      <label class="col-sm-5 form-control-label">Role Name: <span class="tx-danger">*</span></label>
                                      <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                      <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Role Name" name="name">
                                      @error('name')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                      </div>
                                  </div><!-- row -->
                                  <div class="row mg-t-20">
                                    <label class="col-sm-5 form-control-label">Guard Name: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                    <input type="text" class="form-control" value="" placeholder="Guard Name" name="guard_name">
                                    </div>
                                </div><!-- row -->

                                  <div class="row form-layout-footer" >
                                      <div class="col-lg-5 m-auto">
                                          <button style="cursor: pointer" class="btn btn-info mg-t-20">Submit Form</button>
                                      </div>

                                  </div><!-- form-layout-footer -->
                          </form>
                          </div><!-- card -->
                        </div><!-- col-6 -->
                      </div><!-- row -->
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row row-sm mg-t-20">
                        <div class="col-xl-12 m-auto">
                          <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                              <form action="{{ route('PermissionPost') }}" method="POST">
                                  @csrf
                                  <div class="row">
                                      <label class="col-sm-5 form-control-label">Permission Name: <span class="tx-danger">*</span></label>
                                      <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                      <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Permission Name" name="name">
                                      @error('name')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                      </div>
                                  </div><!-- row -->
                                  <div class="row mg-t-20">
                                    <label class="col-sm-5 form-control-label">Guard Name: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                    <input type="text" class="form-control" value="" placeholder="Guard Name" name="guard_name">
                                    </div>
                                </div><!-- row -->

                                  <div class="row form-layout-footer" >
                                      <div class="col-lg-5 m-auto">
                                          <button style="cursor: pointer" class="btn btn-info mg-t-20">Submit Form</button>
                                      </div>

                                  </div><!-- form-layout-footer -->
                          </form>
                          </div><!-- card -->
                        </div><!-- col-6 -->
                      </div><!-- row -->
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModa3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button style="cursor: pointer" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row row-sm mg-t-20">
                        <div class="col-xl-12 m-auto">
                          <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                              <form action="{{ route('RoleAddToPermission') }}" method="POST">
                                  @csrf
                                  <div class="row">
                                      <label class="col-sm-5 form-control-label">Role Name: <span class="tx-danger">*</span></label>
                                      <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                      <select class="form-control" name="role_name" id="role_name">
                                          @foreach ($roleview as $role)
                                          <option value="{{ $role->name }}">{{ $role->name }}</option>
                                          @endforeach

                                      </select>
                                      </div>
                                  </div><!-- row -->
                                  <div class="row mg-t-20">
                                    <label class="col-sm-5 form-control-label">Role Name: <span class="tx-danger">*</span></label>
                                      <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                      <select class="form-control" name="permission_name" id="permission_name">
                                          @foreach ($perview as $per)
                                          <option value="{{ $per->name }}">{{ $per->name }}</option>
                                          @endforeach

                                      </select>
                                      </div>
                                </div><!-- row -->

                                  <div class="row form-layout-footer" >
                                      <div class="col-lg-5 m-auto">
                                          <button style="cursor: pointer" class="btn btn-info mg-t-20">RoleAddToPermission</button>
                                      </div>

                                  </div><!-- form-layout-footer -->
                          </form>
                          </div><!-- card -->
                        </div><!-- col-6 -->
                      </div><!-- row -->
                </div>
                <div class="modal-footer">
                <button style="cursor: pointer" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
          <h6 class="card-body-title mg-b-10 text-center">Role Lists</h6>
        <table class="table table-hover table-bordered table-primary mg-b-0">
          <thead>
            <tr>
              <th>SL</th>
              <th>Name</th>
              <th>Permission</th>
              <th>Created_at</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($roleview as $key=>$roleviews)
                <tr>
                    <td>{{ $roleview->firstItem() + $key }}</td>
                    <td>{{ $roleviews->name }}</td>
                    <td>
                        @foreach ($roleviews->getPermissionNames() as $ro)
                            <li>{{ $ro }}</li>
                        @endforeach
                    </td>
                    <td>{{ $roleviews->created_at != null ? $roleviews->created_at->diffForHumans() : 'N/A' }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="">Edit</a>
                        <a class="btn btn-outline-danger" href="">Delete</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
          {{ $roleview->links() }}
        </table>
        <br>
        <h6 class="card-body-title mg-b-10 text-center">Permission Lists</h6>
        <table class="table table-hover table-bordered table-primary mg-b-0">
          <thead>
            <tr>
              <th>SL</th>
              <th>Name</th>
              <th>Gurad_name</th>
              <th>Created_at</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($perview as $perviews)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $perviews->name }}</td>
                    <td>{{ $perviews->guard_name }}</td>
                    <td>{{ $perviews->created_at != null ? $roleviews->created_at->diffForHumans() : 'N/A' }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="">Edit</a>
                        <a class="btn btn-outline-danger" href="">Delete</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <br>
        <h6 class="card-body-title mg-b-10 text-center">All User Lists</h6>
        <table class="table table-hover table-bordered table-primary mg-b-0">
            <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Permission</th>
                <th>Created_at</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($user as $key => $users)
                  <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $users->name }}</td>
                      <td>
                          @foreach ($users->getRoleNames() as $item)

                          @endforeach
                      </td>
                      <td></td>
                      <td>
                          <a class="btn btn-outline-primary" href="">Edit</a>
                          <a class="btn btn-outline-danger" href="">Delete</a>
                      </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
      </div><!-- table-responsive -->
    </div><!-- card -->

  </div><!-- sl-pagebody -->
@endsection
