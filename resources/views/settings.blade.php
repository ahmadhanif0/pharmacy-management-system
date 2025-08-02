@php
	$title = "app Settings";
@endphp
@extends('layouts.app')

@push('page-css')
	<!-- Select2 css-->
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
		<h3 class="page-title">General Settings</h3>
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
			<li class="breadcrumb-item active">Settings</li>
		</ul>
	</div>
@endpush

@section('content')

	<div class="row">
		<div class="col-12">
			@include('app_settings::_settings')
		</div>
	</div>
@endsection

@push('page-js')
	<!-- Select2 js-->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush