@extends('backend.master')

@section('content')
<div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40 mg-t-50">
      <div class="table-responsive">
        <div class="list">
            <a class="float-right mg-b-10" style="border: 1px solid rgb(71, 109, 236); padding: 10px;" href="{{ route('BrandAdd') }}"> <i class="fa fa-plus"></i> Add Brand</a>
        </div>
          <h6 class="card-body-title mg-b-10 text-center">All Active Category ({{ $brandcount }})</h6>
        <table class="table table-hover table-bordered table-primary mg-b-0">
          <thead>
            <tr>
              <th class="text-center">SL</th>
              <th class="text-center">Brand_Name</th>
              <th class="text-center">Slug</th>
              <th class="text-center">Created_at</th>
              <th class="text-center">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($brands as $key=>$brand)
                <tr class="text-center">
                    <td>{{ $brands->firstItem() + $key }}</td>
                    <td>{{ $brand->brand_name }}</td>
                    <td>{{ $brand->slug ?? "NA" }}</td>
                    <td>{{ $brand->created_at != null ? $brand->created_at->diffForHumans() : 'N/A' }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="{{ route('BrandEdit', $brand->id) }}">Edit</a>
                        <a class="btn btn-outline-danger" href="{{ route('BrandDelete', $brand->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- table-responsive -->
      {{ $brands->links() }}
    </div><!-- card -->
    <div class="card pd-20 pd-sm-40 mg-t-10">
        <div class="table-responsive">
            <h6 class="card-body-title mg-b-10 text-center">All Deleted Brand ()</h6>
            <table class="table table-hover table-bordered table-danger mg-b-0">
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
                @foreach ($trashbrand as $brand)
                    <tr class="text-center">
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $brand->brand_name }}</td>
                        <td>{{ $brand->slug ?? "NA" }}</td>
                        <td>{{ $brand->created_at != null ? $brand->created_at->diffForHumans() : 'N/A' }}</td>
                        <td>
                          <a class="btn btn-outline-primary" href="{{ route('BrandRestore', $brand->id) }}">Restore</a>
                          <a class="btn btn-outline-danger" href="{{ route('BrandParmanentDelete', $brand->id) }}">Parmanent Delete</a>
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

        @if(session('BrandDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Brand Delete Successfully',
                showConfirmButton: false,
                timer: 1500
            })
        @endif
        @if(session('BrandRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Brand Restore Successfully',
                showConfirmButton: false,
                timer: 1500
            })
        @endif
        @if(session('BrandParmanentDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Brand Parmanent Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
    </script>


@endsection
