@extends('layouts.app')

@section('title', $title)

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

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
		<h3 class="page-title">Exchange Product</h3>
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
			<li class="breadcrumb-item active">Exchanges</li>
		</ul>
	</div>
@endpush

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body custom-edit-service">
					<form action="{{ route('product_exchanges.store') }}" method="POST">
						@csrf

						<input type="hidden" name="sale_id" value="{{ $sale->id }}">

						<div class="service-fields mb-3">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="form-group">
											<label>Old Product</label>
											<input type="text" class="form-control"
												value="{{ $sale->product->purchase->name ?? 'N/A' }}" readonly>
										</div>
										<label for="new_product_id">New Product</label>
										<select name="new_product_id" id="new_product_id" class="form-control select2"
											required>
											<option value="">Select a product</option>
											@foreach($products as $product)
												<option value="{{ $product->id }}">
													{{ $product->purchase->name ?? 'N/A' }}
												</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="service-fields mb-3">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="quantity">Exchange Quantity</label>
										<input type="number" name="quantity" id="quantity" class="form-control" min="1"
											required>
									</div>
								</div>
							</div>
						</div>

						<div class="service-fields mb-3">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="reason">Exchange Reason</label>
										<textarea name="reason" id="reason" class="form-control" rows="4"
											required></textarea>
									</div>
								</div>
							</div>
						</div>

						<div class="submit-section">
							<button type="submit" class="btn btn-primary submit-btn">Submit Exchange Request</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
@endsection

@push('page-js')
	<!-- Select2 JS -->
	<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function () {
			$('#new_product_id').select2({
				placeholder: 'Select a product',
				allowClear: true
			});
		});
	</script>
@endpush