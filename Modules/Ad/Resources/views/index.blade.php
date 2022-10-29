@extends('layouts.backend.admin')

@section('title')
    {{ __('ad_list') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">
                            {{ __('ad_list') }}
                        </h3>
                        @if (userCan('ad.create'))
                           {{-- <a href="{{ route('module.ad.create') }}"
                                class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                    class="fas fa-plus"></i>&nbsp; {{ __('add_ad') }}</a>--}}
                        @endif
                    </div>
                    <div class="card-body table-responsive p-0">
                        <form action="{{ route('module.ad.index') }}" method="GET">
                            <div class="row justify-content-between my-3">
                                <div class="col-sm-12 col-md-6 ml-2">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <select name="perpage" class="form-control form-control-sm">
                                                <option {{ request('perpage') == '10' ? 'selected' : '' }} value="10">10
                                                </option>
                                                <option {{ request('perpage') == '25' ? 'selected' : '' }} value="25">25
                                                </option>
                                                <option {{ request('perpage') == '50' ? 'selected' : '' }} value="50">50
                                                </option>
                                                <option {{ request('perpage') == '100' ? 'selected' : '' }} value="100">100
                                                </option>
                                                <option {{ request('perpage') == 'all' ? 'selected' : '' }} value="all">All
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="sort_by" class="form-control form-control-sm">
                                                <option value="" class="d-none">Sort By</option>
                                                <option {{ request('sort_by') == 'latest' ? 'selected' : '' }}
                                                    value="latest">Latest</option>
                                                <option {{ request('sort_by') == 'oldest' ? 'selected' : '' }}
                                                    value="oldest">Oldest</option>
                                                <option {{ request('sort_by') == 'low_to_high' ? 'selected' : '' }}
                                                    value="low_to_high">Price: low_to_high</option>
                                                <option {{ request('sort_by') == 'high_to_low' ? 'selected' : '' }}
                                                    value="high_to_low">Price: high_to_low</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="filter_by" class="form-control form-control-sm">
                                                <option value="" class="d-none">Filter By</option>
                                                <option {{ request('filter_by') == 'active' ? 'selected' : '' }}
                                                    value="active">Active</option>
                                                @if ($settings->ads_admin_approval)
                                                    <option {{ request('filter_by') == 'pending' ? 'selected' : '' }}
                                                        value="pending">Pending</option>
                                                @endif
                                                <option {{ request('filter_by') == 'expired' ? 'selected' : '' }}
                                                    value="expired">Expired</option>
                                                @if ($settings->ads_admin_approval)
                                                    <option {{ request('filter_by') == 'declined' ? 'selected' : '' }}
                                                        value="expired">Declined</option>
                                                @endif
                                                <option {{ request('filter_by') == 'featured' ? 'selected' : '' }}
                                                    value="featured">Featured</option>
                                                <option {{ request('filter_by') == 'most_viewed' ? 'selected' : '' }}
                                                    value="most_viewed">Most Viewed</option>
                                                <option {{ request('filter_by') == 'all' ? 'selected' : '' }} value="all">
                                                    All</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-primary btn-sm" type="submit">Filter</button>
                                            @if (request('keyword') || request('filter_by') || request('sort_by') || request('perpage'))
                                                <a href="{{ route('module.ad.index') }}" class="btn btn-danger btn-sm"
                                                    type="submit">Clear</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 text-right mr-2">
                                    <input type="text" value="{{ request('keyword') }}" class="form-control"
                                        placeholder="{{ __('search') }}..." name="keyword"
                                        aria-label="Search in website">
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <x-backend.ad-manage :ads="$ads" />
                            </div>
                        </div>
                    </div>
                    @if (request('perpage') != 'all' && $ads->total() > $ads->count())
                        <div class="card-footer ">
                            <div class="d-flex justify-content-center">
                                {{ $ads->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .page-link.page-navigation__link.active {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

    </style>
@endsection
