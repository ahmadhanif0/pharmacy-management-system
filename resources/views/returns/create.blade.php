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
		<h3 class="page-title">Return Product</h3>
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
			<li class="breadcrumb-item active">Returns</li>
		</ul>
	</div>
@endpush

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body custom-edit-service">
					@if ($errors->any())
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.
							<ul class="mb-0">
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form action="{{ route('returns.store') }}" method="POST">
						@csrf

						<input type="hidden" name="sale_id" value="{{ $sale->id }}">

						<div class="service-fields mb-3">
							<div class="row">
								<div class="col-lg-12">
									<div>
										<label>Return Product</label>
										<input type="text" class="form-control"
											value="{{ $sale->product->purchase->name ?? 'N/A' }}" readonly>
									</div>
								</div>
							</div>
						</div>

						<div class="service-fields mb-3">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label>Return Quantity <small class="text-muted">(Max:
												{{ $sale->quantity }})</small></label>
										<input type="number" name="quantity" id="quantity" class="form-control" min="1"
											max="{{ $sale->quantity }}" required>
									</div>
								</div>
							</div>
						</div>

						<div class="service-fields mb-3">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label>Return Reason</label>
										<textarea name="reason" id="reason" rows="4" class="form-control"
											required></textarea>
									</div>
								</div>
							</div>
						</div>

						<div class="submit-section">
							<button type="submit" class="btn btn-primary submit-btn">Submit Return Request</button>
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
@endpush