@extends('backend.master')

@section('content')
<div class="sl-pagebody">

    <div class="row row-sm mg-t-20">
      <div class="col-xl-8 m-auto">
        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
            <div class="list">
                <a class="float-right mg-b-10 btn btn-outline-primary" href="{{ route('BrandList') }}"> <i class="fa fa-list"></i> View Brand List</a>
            </div>
          <h6 class="card-body-title">Left Label Alignment</h6>
          <p class="mg-b-20 mg-sm-b-30">A basic form where labels are aligned in left.</p>
            <form action="{{ route('BrandPost') }}" method="POST">
                @csrf
                <div class="row">
                    <label class="col-sm-3 form-control-label">Brand Name: <span class="tx-danger">*</span></label>
                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control @error('brand_name') is-invalid @enderror" value="" placeholder="Brand Name" name="brand_name">
                    @error('brand_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div><!-- row -->

                <div class="row form-layout-footer" >
                    <div class="col-lg-5 m-auto">
                        <button style="cursor: pointer" class="btn btn-info mg-t-20">Add Brand</button>
                    </div>

                </div><!-- form-layout-footer -->
        </form>
        </div><!-- card -->
      </div><!-- col-6 -->
    </div><!-- row -->

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

        @if(session('BrandAdd'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Brand Added Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
    </script>


@endsection
