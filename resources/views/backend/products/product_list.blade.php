@extends('backend.master')

@section('content')
<div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40 mg-t-50">
      <div class="table-responsive">
        <div class="list">
            <a class="float-right mg-b-10" style="border: 1px solid rgb(71, 109, 236); padding: 10px;" href="{{ url('add/category') }}"> <i class="fa fa-plus"></i> Add Categories</a>
        </div>
          <h6 class="card-body-title mg-b-10 text-center">All Active Category ()</h6>
        <table class="table table-hover table-bordered table-primary mg-b-0">
          <thead>
            <tr>
              <th>SL</th>
              <th>Product_Name</th>
              <th>Thumbnail</th>
              <th>Attributes</th>
              <th>Images</th>
              <th>Created_at</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $key=>$product)
                <tr>
                    <td>{{ $products->firstItem() + $key }}</td>
                    <td>{{ $product->product_title }}</td>
                    <td><img src="{{ asset('images/' . $product->thumbnail) }}" style="width: 80px;" alt=""></td>
                    <td>
                        @foreach (App\Attributes::where('product_id', $product->id)->get() as $item)
                            <span>Size : {{ $item->size->size_name }},</span>
                            <span>Color : {{ $item->color->color_name }},</span>
                            <span>Price : {{ $item->price }},</span>
                            <span>Quantity : {{ $item->quantity }}</span><br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($product->gallery as $img)
                            <img src="{{ asset('gallery/'.$img->created_at->format('Y/m/'). $img->product_id .'/' . $img->image ) }}" alt="image" width="50" height="50">
                        @endforeach
                    </td>
                    <td>{{ $product->created_at != null ? $product->created_at->diffForHumans() : 'N/A' }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="">Edit</a>
                        <a class="btn btn-outline-danger" href="">Delete</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- table-responsive -->
      {{ $products->links() }}
    </div><!-- card -->
    {{-- <div class="card pd-20 pd-sm-40 mg-t-10">
        <div class="table-responsive">
            <h6 class="card-body-title mg-b-10 text-center">All Active Category ({{ $categories->count() }})</h6>
            <table class="table table-hover table-bordered table-danger mg-b-0">
            <thead>
              <tr>
                <th>SL</th>
                <th>Product Title</th>
                <th>Thumbnail</th>
                <th>Attributes</th>
                <th>Images</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($trush_category as $tcategory)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $tcategory->category_name }}</td>
                        <td>{{ $tcategory->slug ?? "NA" }}</td>
                        <td>{{ $tcategory->created_at != null ? $tcategory->created_at->diffForHumans() : 'N/A' }}</td>
                        <td>
                          <a class="btn btn-outline-primary" href="{{ route('CategoryRestore', $tcategory->id) }}">Restore</a>
                          <a class="btn btn-outline-danger" href="{{ route('CategoryParmanentDelete', $tcategory->id) }}">Parmanent Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div><!-- table-responsive -->
        {{-- {{ $categories->links() }} --}}
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

        @if(session('CategoryRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Category Restore Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('CategoryDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Category Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('CategoryParmanentDelete'))
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
