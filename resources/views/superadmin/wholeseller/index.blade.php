@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header mb-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Wholesellers') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('Wholesellers') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                @include('layouts.components.alert')
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-5 col-6 mb-2">
                    <form action="{{ route('superadmin.wholeseller.index') }}" method="GET" role="search">
                        <div class="input-group">
                            <input type="text" name="term"
                                placeholder="{{ __('Type name or email or company or desigantion ...') }}"
                                class="form-control" autocomplete="off"
                                value="{{ request('term') ? request('term') : '' }}" required>
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-lg-9 col-md-7 col-6">
                    <div class="card-tools text-md-right">
                        <a class="btn btn-secondary" href="">
                            <i class="fas fa-download"></i> @lang('Export')
                        </a>
                        <a href="{{ route('superadmin.wholeseller.create') }}" class="btn btn-primary">
                            {{ __('Add wholeseller') }} <i class="fas fa-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-0 table-responsive table-custom my-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Picture') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Company') }}</th>
                            <th>{{ __('Desigantion') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Created') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($wholesellers->total() > 0)
                            @foreach ($wholesellers as $key => $wholeseller)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                    <img src="{{asset($wholeseller->profile_picture)}}" class="table-image-preview">
                                    </td>
                                    <td><a
                                            href="{{ route('superadmin.wholeseller.edit', $wholeseller->id) }}">{{ $wholeseller->name }}</a>
                                    </td>
                                    <td>{{ $wholeseller->email }} </td>
                                    <td>{{ $wholeseller->phone_number }} </td>
                                    <td>{{ $wholeseller->company_name }} </td>
                                    <td>{{ $wholeseller->designation }} </td>
                                    <td>
                                        @if ($wholeseller->isActive())
                                            <span class="badge badge-success">{{ __('Active') }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ __('Inactive') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($wholeseller->created_at)->format('d-M-Y') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-secondary dropdown-toggle action-dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                @if ($wholeseller->isActive())
                                                    <a href="{{ route('superadmin.wholeseller.status', $wholeseller->id) }}"
                                                        class="dropdown-item"><i class="fas fa-window-close"></i>
                                                        {{ __('Inactive') }}</a>
                                                @else
                                                    <a href="{{ route('superadmin.wholeseller.status', $wholeseller->id) }}"
                                                        class="dropdown-item"><i class="fas fa-check-square"></i>
                                                        {{ __('Active') }}</a>
                                                @endif
                                                <a href="{{ route('superadmin.wholeseller.show', $wholeseller->id) }}"
                                                    class="dropdown-item"><i class="fas fa-eye"></i>
                                                    {{ __('View') }}</a>
                                                <a href="{{ route('superadmin.wholeseller.edit', $wholeseller->id) }}"
                                                    class="dropdown-item"><i class="fas fa-edit"></i>
                                                    {{ __('Edit') }}</a>
                                                <a href="{{ route('superadmin.wholeseller.delete', $wholeseller->id) }}"
                                                    class="dropdown-item delete-btn"
                                                    data-msg="{{ __('Are you sure you want to delete this wholeseller?') }}"><i
                                                        class="fas fa-trash"></i> {{ __('Delete') }}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">
                                    <div class="data_empty">
                                        <img src="{{ asset('img/result-not-found.svg') }}" alt="" title="">
                                        <p>{{ __('Sorry, no wholeseller found in the database. Create your very first wholeseller.') }}</p>
                                        <a href="{{ route('wholesellers.create') }}" class="btn btn-primary">
                                            {{ __('Add wholeseller') }} <i class="fas fa-plus-circle"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <!-- pagination start -->
            {{ $wholesellers->links() }}
            <!-- pagination end -->
        </div>
    </div>
    <!-- /.content -->
@endsection
