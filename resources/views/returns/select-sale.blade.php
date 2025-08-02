@extends('layouts.app')

@section('title', $title)

@push('page-css')
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">

    <style>
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
        <h3 class="page-title">Select Sale to Create Return</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Select Sale</li>
        </ul>
    </div>
@endpush

@section('content')
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($sales->count())
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-export" class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity Sold</th>
                                    <th>Total Price</th>
                                    <th>Purchase Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->product->purchase->name ?? 'N/A' }}</td>
                                        <td>{{ $sale->quantity }}</td>
                                        <td>{{AppSettings::get('app_currency', '$')}} {{ number_format($sale->total_price) }}</td>
                                        <td>{{ $sale->created_at->format('d M Y') }}</td>
                                        <td>
                                            @if($sale->quantity > 0)
                                                <a href="{{ route('returns.create', $sale->id) }}" class="btn btn-sm btn-primary">Create
                                                    Return</a>
                                            @else
                                                <span class="badge badge-success">Fully Returned</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <p>No sales records found.</p>
        @endif
    </div>
@endsection

@push('page-js')
    <!-- Select2 JS -->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/search-field.js')}}"></script>

    <!-- DataTables JS -->
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
@endpush