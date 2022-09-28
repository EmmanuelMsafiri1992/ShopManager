@extends('wholeseller.layouts.app')
@section('content')
    {{--   Content Header (Page header) --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Dashboard') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">{{ __('Dashboard') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{--  end content-header --}}

    {{-- Main content --}}
    <div class="content">

    </div>
    {{--  end main content --}}
@endsection

@section('extra-script')
    {{-- ChartScript --}}
    <script src="{{ asset('js/Chart.min.js') }}" charset=utf-8></script>
@endsection

