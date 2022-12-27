@extends('backend.master')

@section('content')
<div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40 mg-t-50">
      <div class="table-responsive">
        <div class="list">
            <a class="float-right mg-b-10" style="border: 1px solid rgb(71, 109, 236); padding: 10px;" href="{{ route('ColorAdd') }}"> <i class="fa fa-plus"></i> Add Categories</a>
        </div>
          <h6 class="card-body-title mg-b-10 text-center">All Active Category ({{ $colors->count() }})</h6>
        <table class="table table-hover table-bordered table-primary mg-b-0">
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
            @foreach ($colors as $key=>$color)
                <tr>
                    <td>{{ $colors->firstItem() + $key }}</td>
                    <td>{{ $color->color_name }}</td>
                    <td>{{ $color->slug ?? "NA" }}</td>
                    <td>{{ $color->created_at != null ? $color->created_at->diffForHumans() : 'N/A' }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="{{ route('ColorEdit', $color->id) }}">Edit</a>
                        <a class="btn btn-outline-danger" href="{{ route('ColorDelete', $color->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- table-responsive -->
      {{ $colors->links() }}
    </div><!-- card -->
    <div class="card pd-20 pd-sm-40 mg-t-10">
        <div class="table-responsive">
            <h6 class="card-body-title mg-b-10 text-center">All Active Category ({{ $trush_color->count() }})</h6>
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
                @foreach ($trush_color as $tcolor)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $tcolor->color_name }}</td>
                        <td>{{ $tcolor->slug ?? "NA" }}</td>
                        <td>{{ $tcolor->created_at != null ? $tcolor->created_at->diffForHumans() : 'N/A' }}</td>
                        <td>
                          <a class="btn btn-outline-primary" href="{{ route('ColorRestore', $tcolor->id) }}">Restore</a>
                          <a class="btn btn-outline-danger" href="{{ route('ColorParmanentDelete', $tcolor->id) }}">Parmanent Delete</a>
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

        @if(session('ColorDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Color Delete Successfully',
                showConfirmButton: false,
                timer: 1500
            })
        @endif
        @if(session('ColorRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Color Restore Successfully',
                showConfirmButton: false,
                timer: 1500
            })
        @endif
        @if(session('ColorParmanentDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Color Parmanent Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
    </script>


@endsection
