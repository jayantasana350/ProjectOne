@extends('backend.master')

@section('content')
<div class="sl-pagebody">

    <div class="row row-sm mg-t-20">
      <div class="col-xl-12 m-auto">
        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
            <div class="list">
                <a class="float-right mg-b-10 btn btn-outline-primary" href=""> <i class="fa fa-list"></i> View Categories</a>
            </div>
          <h6 class="card-body-title">Left Label Alignment</h6>
          <p class="mg-b-20 mg-sm-b-30">A basic form where labels are aligned in left.</p>
            <form action="{{ route('ProductPost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <label class="col-sm-2 form-control-label">Product Name: <span class="tx-danger">*</span></label>
                    <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control" value="" placeholder="Product Name" name="product_title">
                    </div>
                </div><!-- row -->
                <div class="row  mg-t-20">
                    <label class="col-sm-2 form-control-label">Brand Name: <span class="tx-danger">*</span></label>
                    <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                        <select class="form-control" name="brand_id" id="">
                            <option value="">Select Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div><!-- row -->
                <div class="row  mg-t-20">
                    <label class="col-sm-2 form-control-label">Category Name: <span class="tx-danger">*</span></label>
                    <div class="col-sm-5 mg-t-10 mg-sm-t-0">
                        <select class="form-control" name="category_id" id="">
                            <option value="">Select Category</option>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-5 mg-t-10 mg-sm-t-0">
                        <select class="form-control" name="subcategory_id" id="">
                            <option value="">Select SubCategory</option>
                            @foreach ($scat as $sub_cat)
                                <option value="{{ $sub_cat->id }}">{{ $sub_cat->subcategory_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!-- row -->
                    <div class="">
                        <div class="row mg-t-20">
                            <div class="col-sm-2 form-control-label">
                                <label class="">Attributes Name: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="customer_records">
                            <div class="row">
                            <div class="col-sm-3 mg-t-10 mg-sm-t-0">
                                <select name="color_id[]" id="color_id" class="form-control">
                                    <option value="">Choose Color</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 mg-t-10 mg-sm-t-0">
                                <select name="size_id[]" id="size_id" class="form-control">
                                    <option value="">Choose Size</option>
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" value="" placeholder="Ex: $50" name="price[]">
                            </div>
                            <div class="col-sm-3 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" value="" placeholder="Quantity" name="quantity[]">
                            </div>
                        </div>
                        <style>
                            a.extra-fields-customer {
                            position: absolute;
                            right: 66px;
                            top: 42%;
                            font-size: 17px;
                        }

                            .remove {
                                margin-left: 185px;
                            }

                        .customer_records {
                            margin-left: 15px;
                            margin-bottom: 10px;
                        }
                        </style>
                        </div><!-- row -->
                        <a class="extra-fields-customer" href="#"><i class="fa fa-plus"></i> Add</a>
                        <div class="customer_records_dynamic"></div>
                    </div>
                <div class="row  mg-t-20">
                    <label class="col-sm-2 form-control-label">Summery: <span class="tx-danger">*</span></label>
                    <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                        <textarea class="form-control" name="summery" id=""></textarea>
                    </div>
                </div><!-- row -->

                <div class="row  mg-t-20">
                    <label class="col-sm-2 form-control-label">Description: <span class="tx-danger">*</span></label>
                    <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                        <textarea class="form-control" name="descripiton" id="" cols="30" rows="10"></textarea>
                    </div>
                </div><!-- row -->
                <div class="row  mg-t-20">
                    <label class="col-sm-2 form-control-label">Thumbnail: <span class="tx-danger">*</span></label>
                    <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                        <input class="form-control" type="file" name="thumbnail">
                    </div>
                </div><!-- row -->
                <div class="row  mg-t-20">
                    <label class="col-sm-2 form-control-label">Images: <span class="tx-danger">*</span></label>
                    <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                        <input class="form-control" type="file" multiple name="image[]">
                    </div>
                </div><!-- row -->

                <div class="row form-layout-footer" >
                    <div class="col-lg-5 m-auto">
                        <button style="cursor: pointer" class="btn btn-info mg-t-20">Add Product</button>
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

        @if(session('CategoryAdd'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Category Added Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif


        $('.extra-fields-customer').click(function() {
        $('.customer_records').clone().appendTo('.customer_records_dynamic');
        $('.customer_records_dynamic .customer_records').addClass('single remove');
        $('.single .extra-fields-customer').remove();
        $('.single').append('<a href="#" class="remove-field btn-remove-customer">Remove Fields</a>');
        $('.customer_records_dynamic > .single').attr("class", "remove");

        $('.customer_records_dynamic input').each(function() {
            var count = 0;
            var fieldname = $(this).attr("name");
            $(this).attr('name', fieldname + count);
            count++;
        });

        });

        $(document).on('click', '.remove-field', function(e) {
        $(this).parent('.remove').remove();
        e.preventDefault();
        });
    </script>


@endsection
