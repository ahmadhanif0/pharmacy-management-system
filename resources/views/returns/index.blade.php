@extends('layouts.app')

@section('title', $title)

@push('page-css')
	<!-- Select2 CSS -->
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
	</style>
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Returns</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">Returns</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="{{route('returns.select-sale')}}" class="btn btn-primary float-right mt-2" style="border:none;">Select Sale</a>
</div>
@endpush

@section('content')
<div class="row">
	<div class="col-md-12">

		@if(session('success'))
		<div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2 text-white auto-dismiss" role="alert">
			<span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<strong>Success!</strong> {{ session('success') }}
		</div>
	@elseif(session('info'))
		<div class="alert bg-info alert-icon-left alert-arrow-left alert-dismissible mb-2 text-white auto-dismiss" role="alert">
			<span class="alert-icon"><i class="la la-info-circle"></i></span>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<strong>Note:</strong> {{ session('info') }}
		</div>
	@elseif(session('error'))
		<div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2 text-white auto-dismiss" role="alert">
			<span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<strong>Oh snap!</strong> {{ session('error') }}
		</div>
	@endif
	

		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable-export" class="table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>User</th>
								<th>Product</th>
								<th>Return Quantity</th>
								<th>Reason</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@forelse($returns as $return)
								<tr>
									<td>{{ $return->user->name ?? 'N/A' }}</td>
									<td>{{ $return->sale->product->purchase->name ?? 'N/A' }}</td>							
									<td>{{ $return->quantity }}</td>
									<td>{{ $return->reason }}</td>
									<td>
										@if($return->status === 'pending')
											<span class="badge badge-warning">Pending</span>
										@elseif($return->status === 'approved')
											<span class="badge badge-success">Approved</span>
										@elseif($return->status === 'rejected')
											<span class="badge badge-danger">Rejected</span>
										@endif
									</td>
									<td>
										@can('update-return')
											@if($return->status === 'pending')
												<form action="{{ route('returns.update', $return->id) }}" method="POST" class="d-inline">
													@csrf
													@method('PUT')
													<input type="hidden" name="status" value="approved">
													<button type="submit" class="btn btn-sm btn-success">Approve</button>
												</form>

												<form action="{{ route('returns.update', $return->id) }}" method="POST" class="d-inline">
													@csrf
													@method('PUT')
													<input type="hidden" name="status" value="rejected">
													<button type="submit" class="btn btn-sm btn-danger">Reject</button>
												</form>
											@else
												<span class="text-muted">No actions</span>
											@endif
										@else
											<span class="text-muted">Restricted</span>
										@endcan
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="6" class="text-center">No return requests found.</td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection

@push('page-js')
	<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
	<script src="{{asset('assets/plugins/select2/js/search-field.js')}}"></script>

	<!-- DataTables JS -->
	<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('assets/js/jszip.min.js')}}"></script>
	<script src="{{asset('assets/js/pdfmake.min.js')}}"></script>
	<script src="{{asset('assets/js/vfs_fonts.js')}}"></script>
	<script src="{{asset('assets/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('assets/js/buttons.print.min.js')}}"></script>

	<script>
		// Automatically dismiss alerts after 3 seconds
		setTimeout(function() {
			$('.auto-dismiss').fadeOut('slow', function() {
				$(this).remove();
			});
		}, 3000);
	</script>
	
@endpush
