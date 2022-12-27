@extends('backend.master')

@section('content')
<div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40 mg-t-50">
      <div class="table-responsive">
        <div class="list">
            <a class="float-right mg-b-10" style="border: 1px solid rgb(71, 109, 236); padding: 10px;" href="{{ route('SubCategoryAdd') }}"> <i class="fa fa-plus"></i> Add SubCategories</a>
        </div>
          <h6 class="card-body-title mg-b-10 text-center">All Active Category ({{ $subcategory_view->count() }})</h6>
        <table class="table table-hover table-bordered table-primary mg-b-0">
          <thead>
            <tr>
              <th>SL</th>
              <th>Cateogry_Id</th>
              <th>SubCateogry_Name</th>
              <th>Slug</th>
              <th>Created_at</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($subcategory_view as $key=>$sub_cat)
                <tr>
                    <td>{{ $subcategory_view->firstItem() + $key }}</td>
                    <td>{{ $sub_cat->category->category_name }}</td>
                    <td>{{ $sub_cat->subcategory_name }}</td>
                    <td>{{ $sub_cat->slug ?? "NA" }}</td>
                    <td>{{ $sub_cat->created_at != null ? $sub_cat->created_at->diffForHumans() : 'N/A' }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="{{ route('SubCategoryEdit', $sub_cat->id ) }}">Edit</a>
                        <a class="btn btn-outline-danger" href="{{ route('SubCategoryDelete', $sub_cat->id ) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- table-responsive -->
      {{ $subcategory_view->links() }}
    </div><!-- card -->
    <div class="card pd-20 pd-sm-40 mg-t-10">
        <div class="table-responsive">
            <h6 class="card-body-title mg-b-10 text-center">All Active Category ({{ $ts_category->count() }})</h6>
            <table class="table table-hover table-bordered table-danger mg-b-0">
            <thead>
              <tr>
                <th>SL</th>
                <th>Cateogry_Id</th>
                <th>Cateogry_Name</th>
                <th>Slug</th>
                <th>Created_at</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($ts_category as $tscategory)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $tscategory->category->category_name }}</td>
                        <td>{{ $tscategory->subcategory_name }}</td>
                        <td>{{ $tscategory->slug ?? "NA" }}</td>
                        <td>{{ $tscategory->created_at != null ? $tscategory->created_at->diffForHumans() : 'N/A' }}</td>
                        <td>
                          <a class="btn btn-outline-primary" href="{{ route('SubCategoryRestore', $tscategory->id) }}">Restore</a>
                          <a class="btn btn-outline-danger" href="{{ route('SubCategoryParmanentDelete', $tscategory->id) }}">Parmanent Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div><!-- table-responsive -->
        {{-- {{ $categories->links() }}
      </div><!-- card -->
  </div><!-- sl-pagebody --> --}}
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

        @if(session('SubCategoryDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'SubCategory Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('SubCategoryRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'SubCategory Restore Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('SubCategoryParmanentDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Category Parmanent Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif

    </script>


@endsection
