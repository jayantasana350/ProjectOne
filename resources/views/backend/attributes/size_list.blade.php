@extends('backend.master')

@section('content')
<div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40 mg-t-50">
      <div class="table-responsive">
        <div class="list">
            <a class="float-right mg-b-10" style="border: 1px solid rgb(71, 109, 236); padding: 10px;" href="{{ route('SizeAdd') }}"> <i class="fa fa-plus"></i> Add Size</a>
        </div>
          <h6 class="card-body-title mg-b-10 text-center">All Active Category ({{ $sizecount }})</h6>
        <table class="table table-hover table-bordered table-primary mg-b-0">
          <thead>
            <tr>
              <th class="text-center">SL</th>
              <th class="text-center">Cateogry_Name</th>
              <th class="text-center">Slug</th>
              <th class="text-center">Created_at</th>
              <th class="text-center">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sizes as $key=>$size)
                <tr class="text-center">
                    <td>{{ $sizes->firstItem() + $key }}</td>
                    <td>{{ $size->size_name }}</td>
                    <td>{{ $size->slug ?? "NA" }}</td>
                    <td>{{ $size->created_at != null ? $size->created_at->diffForHumans() : 'N/A' }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="{{ route('SizeEdit', $size->id) }}">Edit</a>
                        <a class="btn btn-outline-danger" href="{{ route('SizeDelete', $size->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- table-responsive -->
      {{ $sizes->links() }}
    </div><!-- card -->
    <div class="card pd-20 pd-sm-40 mg-t-10">
        <div class="table-responsive">
            <h6 class="card-body-title mg-b-10 text-center">All Active Category ({{ $trush_size->count() }})</h6>
            <table class="table table-hover table-bordered table-danger mg-b-0">
            <thead>
              <tr>
                <th>SL</th>
                <th>Cateogry_Name</th>
                <th>Slug</th>
                <th>Created_at</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($trush_size as $tsize)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $tsize->size_name }}</td>
                        <td>{{ $tsize->slug ?? "NA" }}</td>
                        <td>{{ $tsize->created_at != null ? $tsize->created_at->diffForHumans() : 'N/A' }}</td>
                        <td>
                          <a class="btn btn-outline-primary" href="{{ route('SizeRestore', $tsize->id) }}">Restore</a>
                          <a class="btn btn-outline-danger" href="{{ route('SizeParmanentDelete', $tsize->id) }}">Parmanent Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div><!-- table-responsive -->
        {{-- {{ $categories->links() }} --}}
      </div><!-- card -->
  </div><!-- sl-pagebody -->
@endsection

@section('footer_js')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        @if(session('SizeDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Size Delete Successfully',
                showConfirmButton: false,
                timer: 1500
            })
        @endif
        @if(session('SizeRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Size Restore Successfully',
                showConfirmButton: false,
                timer: 1500
            })
        @endif
        @if(session('SizeParmanentDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Size Parmanent Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
    </script>


@endsection
