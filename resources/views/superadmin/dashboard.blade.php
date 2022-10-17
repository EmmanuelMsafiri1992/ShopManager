@extends('layouts.admin')
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
        <div class="container-fluid">
           <div class="row">
                <div class="col-12 col-sm-6 col-md-3 stats">
                    <a href="">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tags"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Stock</span>
                                <span class="info-box-number">0</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3 stats">
                    <a href="">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tags"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Sales</span>
                                <span class="info-box-number">0</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3 stats">
                    <a href="">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tags"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Debtors</span>
                                <span class="info-box-number">0</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3 stats">
                    <a href="">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tags"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Daily</span>
                                <span class="info-box-number">0</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3 stats">
                    <a href="">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tags"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Alerts</span>
                                <span class="info-box-number">0</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3 stats">
                    <a href="">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tags"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Analytics</span>
                                <span class="info-box-number">0</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3 stats">
                    <a href="">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tags"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Admin</span>
                                <span class="info-box-number">0</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3 stats">
                    <a href="">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tags"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Expenses</span>
                                <span class="info-box-number">0</span>
                            </div>
                        </div>
                    </a>
                </div>

        </div>
    </div>
    </div>
    {{--  end main content --}}
@endsection
@section('extra-script')
    {{-- ChartScript --}}
    <script src="{{ asset('js/Chart.min.js') }}" charset=utf-8></script>
    @if($purchasesChart)
        {!! $purchasesChart->script() !!}
    @endif

    @if($finishedQtyChart)
        {!! $finishedQtyChart->script() !!}
    @endif

    @if($transferredQtyChart)
        {!! $transferredQtyChart->script() !!}
    @endif

    @if($expenseChart)
        {!! $expenseChart->script() !!}
    @endif
@endsection
