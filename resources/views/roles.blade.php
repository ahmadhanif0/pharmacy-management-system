@extends('layouts.app')

@push('page-css')
	<!-- Select2 css-->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">

	<style>
		/* Change search bar border color on hover */
		.dataTables_filter input:hover {
			border: 1px solid #ff9e35;
		}

		.dataTables_filter input:focus {
			border-color: #ff9e35 !important;
			box-shadow: 0 0 5px #ff9e35;
		}

		/* Change select box border color on hover */
		.dataTables_length select:hover {
			border: 1px solid #ff9e35;
		}

		.dataTables_length select:focus {
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

		button:active,
		.btn:active {
			background-color: inherit !important;
			box-shadow: none !important;
			outline: none !important;
		}

		.permission-badges {
			display: flex;
			flex-wrap: wrap;
			gap: 5px;
		}

		.permission-badges .badge {
			padding: 6px 12px;
			font-size: 0.85rem;
			color: #fff;
		}

		.badge-custom-primary {
			background-color: #14BC7D;
			color: white;
		}
	</style>
@endpush

@push('page-header')
	<div class="col-sm-7 col-auto">
		<h3 class="page-title">Roles</h3>
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
			<li class="breadcrumb-item active">Roles</li>
		</ul>
	</div>
	<div class="col-sm-5 col">
		<a href="#add_role" data-toggle="modal" class="btn btn-primary float-right mt-2">Add Role</a>
	</div>

@endpush

@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="roles-table"
							class="datatable table table-striped table-bordered table-hover table-center mb-0">
							<thead>
								<tr style="boder:1px solid black;">
									<th>Name</th>
									<th>Permissions</th>
									<th class="text-center action-btn">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($roles as $role)
									<tr>
										<td>
											{{$role->name}}
										</td>
										<td class="permission-badges">
											@foreach ($role->getAllPermissions() as $permission)
												<span class="badge rounded-pill badge-custom-primary">{{ $permission->name }}</span>
											@endforeach
										</td>

										<td class="text-center">
											<div class="actions">
												<a href="{{ route('roles.edit', $role->id) }}"
													class="btn btn-sm bg-success-light">
													<i class="fe fe-pencil"></i> Edit
												</a>

												<a data-id="{{$role->id}}" data-toggle="modal" href="javascript:void(0)"
													class="btn btn-sm bg-danger-light deletebtn">
													<i class="fe fe-trash"></i> Delete
												</a>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Add Modal -->
	<div class="modal fade" id="add_role" aria-hidden="true" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Role</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{route('roles')}}">
						@csrf
						<div class="row form-row">
							<div class="col-12">
								<div class="form-group">
									<label>Role</label>
									<input type="text" name="role" class="form-control">
								</div>
								<div class="form-group">
									<lable>Select Permissions</lable>
									<select class="select2 form-select form-control" name="permission[]"
										multiple="multiple">
										@foreach ($permissions as $permission)
											<option value="{{$permission->name}}">{{$permission->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /ADD Modal -->


	<!-- Delete Modal -->
	<x-modals.delete :route="'roles'" :title="'Roles'" />
	<!-- /Delete Modal -->
@endsection


@push('page-js')
	<!-- Select2 js-->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush