@extends('layouts.app')

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">

	<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">

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
		<h3 class="page-title">Add Purchase</h3>
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
			<li class="breadcrumb-item active">Add Purchase</li>
		</ul>
	</div>
@endpush


@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body custom-edit-service">

					<!-- Add Purchase -->
					<form method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('add-purchase')}}">
						@csrf
						<div class="service-fields mb-3">
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label>Medicine Name<span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="name">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>Category <span class="text-danger">*</span></label>
										<select class="select2 form-select form-control" name="category">
											@foreach ($categories as $category)
												<option value="{{$category->id}}">{{$category->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>Supplier <span class="text-danger">*</span></label>
										<select class="select2 form-select form-control" name="supplier">
											@foreach ($suppliers as $supplier)
												<option value="{{$supplier->id}}">{{$supplier->name}}</option>
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
										<label>Cost Price<span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="price">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Quantity<span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="quantity">
									</div>
								</div>
							</div>
						</div>

						<div class="service-fields mb-3">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Expire Date<span class="text-danger">*</span></label>
										<input class="form-control" type="date" name="expiry_date">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Medicine Image</label>
										<input type="file" name="image" class="form-control">
									</div>
								</div>
							</div>
						</div>


						<div class="submit-section">
							<button class="btn btn-primary submit-btn" type="submit">Submit</button>
						</div>
					</form>
					<!-- /Add Purchase -->

				</div>
			</div>
		</div>
	</div>
@endsection

@push('page-js')
	<!-- Datetimepicker JS -->
	<script src="{{asset('assets/js/moment.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
	<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush