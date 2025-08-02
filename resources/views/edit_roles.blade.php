@php
    $title = 'Edit Role';
@endphp

@extends('layouts.app')

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
	<h3 class="page-title">Edit Role</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
		<li class="breadcrumb-item active">Edit Role</li>
	</ul>
</div>
@endpush

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body custom-edit-service">

				<form method="POST" action="{{ route('roles.update', $role->id) }}">
					@csrf
					@method('PUT')

					<input type="hidden" name="id" value="{{ $role->id }}">

					<div class="service-fields mb-3">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label>Role Name <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="name" value="{{ $role->name }}" required>
								</div>
							</div>
						</div>
					</div>

					<div class="service-fields mb-3">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label>Permissions <span class="text-danger">*</span></label>
									<select class="form-control select2" name="permissions[]" multiple required>
										@foreach ($permissions as $permission)
											<option value="{{ $permission->id }}" 
												@if($role->permissions->contains('id', $permission->id)) selected @endif>
												{{ $permission->name }}
											</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="submit-section">
						<button class="btn btn-primary submit-btn" type="submit">Update Role</button>
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
	$(document).ready(function() {
		$('.select2').select2({
			width: '100%'
		});
	});
</script>
@endpush
