@extends('layouts.app')

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">

	<style>
		.form-control:hover,
		.select2-container--default .select2-selection--single:hover {
			border: 1px solid #ff9e35;
		}

		.form-control:focus {
			border-color: #ff9e35 !important;
			box-shadow: 0 0 5px #ff9e35;
		}

		.form-control:hover,
		.form-control:focus {
			border-color: #ff9e35 !important;
			box-shadow: 0 0 5px rgba(255, 158, 53, 0.5);
		}

		.select2-container--default .select2-results__option--highlighted {
			background-color: #ff9e35 !important;
			color: #fff !important;
		}

		.btn-primary:active,
		.btn:active {
			background-color: #ff9e35 !important;
			box-shadow: none !important;
			border: none !important;
		}
	</style>
@endpush

@push('page-header')
	<div class="col-sm-12">
		<h3 class="page-title">Edit Product</h3>
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
			<li class="breadcrumb-item active">Edit Product</li>
		</ul>
	</div>
@endpush

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body custom-edit-service">


					<!-- Edit Product -->
					<form method="post" enctype="multipart/form-data" id="update_service"
						action="{{route('edit-product', $product)}}">
						@csrf
						<div class="service-fields mb-3">
							<div class="row">

								<div class="col-lg-12">
									<div class="form-group">
										<label>Product <span class="text-danger">*</span></label>
										<select class="select2 form-select form-control" name="product">
											@foreach ($purchased_products as $purchased_product)
												<option @if($purchased_product->id==$product->purchase->id)selected @endif
													value="{{$purchased_product->id}}">{{$purchased_product->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="service-fields mb-3">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Selling Price<span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="price" value="{{$product->price}}">
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label>Discount (%)<span class="text-danger">*</span></label>
										<input class="form-control" value="{{$product->discount}}" type="text"
											name="discount" value="{{old('discount')}}">
									</div>
								</div>

							</div>
						</div>



						<div class="service-fields mb-3">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label>Descriptions <span class="text-danger">*</span></label>
										<textarea class="form-control service-desc" value="{{$product->description}}"
											name="description">{{$product->description}}</textarea>
									</div>
								</div>

							</div>
						</div>

						<div class="submit-section">
							<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit"
								style="border:none;">Submit</button>
						</div>
					</form>
					<!-- /Edit Product -->


				</div>
			</div>
		</div>
	</div>
@endsection


@push('page-js')
	<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush