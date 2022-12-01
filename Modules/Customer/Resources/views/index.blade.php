@extends('layouts.backend.admin')

@section('title')
{{ __('customer_list') }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">{{ __('customer_list') }}</h3>
                    {{--<a href="{{ route('module.customer.create') }}"
                        class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                            class="fas fa-plus"></i>&nbsp; {{ __('add_customer') }}</a>--}}
                </div>
                <div class="card-body table-responsive p-0">
                    <form action="{{ route('module.customer.index')  }}" method="GET">
                        <div class="row justify-content-between my-3">
                            <div class="col-sm-12 col-md-6 ml-2">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <select name="perpage" class="form-control form-control-sm">
                                            <option {{ request('perpage') == '10' ? 'selected':''}} value="10">10
                                            </option>
                                            <option {{ request('perpage') == '25' ? 'selected':''}} value="25">25
                                            </option>
                                            <option {{ request('perpage') == '50' ? 'selected':''}} value="50">50
                                            </option>
                                            <option {{ request('perpage') == '100' ? 'selected':''}} value="100">100
                                            </option>
                                            <option {{ request('perpage') == 'all' ? 'selected':''}} value="all">All
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="sort_by" class="form-control form-control-sm">
                                            <option value="" class="d-none">Sort By</option>
                                            <option {{ request('sort_by') == 'latest' ? 'selected':''}} value="latest">
                                                Latest
                                            </option>
                                            <option {{ request('sort_by') == 'oldest' ? 'selected':''}} value="oldest">
                                                Oldest
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="filter_by" class="form-control form-control-sm">
                                            <option value="" class="d-none">Filter By</option>
                                            <option {{ request('filter_by') == 'verified' ? 'selected':''}}
                                                value="verified">
                                                Verified Customer</option>
                                            <option {{ request('filter_by') == 'unverified' ? 'selected':''}}
                                                value="unverified">
                                                Unverified Customer</option>
                                            <option {{ request('filter_by') == 'most_viewed' ? 'selected':''}}
                                                value="most_viewed">Most Viewd</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-primary btn-sm" type="submit">Filter</button>
                                        @if (request('keyword') || request('filter_by') || request('sort_by') ||
                                        request('perpage'))
                                        <a href="{{ route('module.customer.index')  }}" class="btn btn-danger btn-sm"
                                            type="submit">Clear</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 text-right mr-2">
                                <input type="text" value="{{ request('keyword') }}" class="form-control"
                                    placeholder="{{ __('search') }}..." name="keyword" aria-label="Search in website">
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th width="2%">{{ __('sl') }}</th>
                                        <th width="5%">{{ __('image') }}</th>
                                        <th width="10%">{{ __('name') }}</th>
                                        <th width="10%">{{ __('email') }}</th>
                                        <th width="10%">{{ __('username') }}</th>
                                        <th width="10%">{{ __('phone') }}</th>
                                        <th width="10%">{{ __('purchase_plan') }}</th>
                                        <th width="10%">User unique id</th>
                                        <th width="10%">Account Status</th>
                                        <th width="5%">{{ __('actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customers as $key =>$customer)
                                    <tr>
                                        <td class="text-center" tabindex="0">{{ $key+1 }}
                                        </td>
                                        <td class="text-center" tabindex="0">
                                            <div style="position: relative">
                                                <img src="{{ $customer->image_url }}" class="rounded" height="50px"  width="50px" alt="image">
                                                @if ($customer->certified_seller == 1 && $customer->certificate_validity > now())
                                                    @php
                                                        $certified = DB::table('get_certified_plans')->latest()->first();
                                                    @endphp
                                                    <img src="@if($certified->badge_image) {{asset($certified->badge_image)}} @else {{ asset('images/certified.jpg') }} @endif" style="width: 20px;height: 20px;border-radius: 50%;position: absolute; bottom: 0px; top: 32px; right: 0px;">
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center" tabindex="0">{{ $customer->name }}</td>
                                        <td class="text-center" tabindex="0">{{ $customer->email }}</td>
                                        <td class="text-center" tabindex="0">{{ $customer->username }}</td>
                                        <td class="text-center" tabindex="0">{{ $customer->phone }}</td>
                                        <td class="text-center" tabindex="0">
                                            {{ $customer->transactions_count }}
                                            {{ __('times') }}
                                        </td>
                                        <td class="text-center" tabindex="0">{{ $customer->code }}</td>

                                        <td class="text-center" tabindex="0">
                                            @if($customer['userPlan'] != null)
                                            <button type="button" class="dropdown-toggle btn-sm btn @if($customer['userPlan']['is_active'] == 0)
                                                btn-warning 
                                                @elseif($customer['userPlan']['is_active'] == 1) 
                                                btn-success 
                                                @elseif($customer['userPlan']['is_active'] == 2) 
                                                btn-danger
                                                @elseif($customer['userPlan']['is_active'] == 3) 
                                                btn-primary
                                                @endif" data-toggle="dropdown"
                                                aria-expanded="false">
                                                @if($customer['userPlan']['is_active'] == 0)
                                                    Pending 
                                                @elseif($customer['userPlan']['is_active'] == 1) 
                                                    Active 
                                                @elseif($customer['userPlan']['is_active'] == 2) 
                                                    Reject
                                                @elseif($customer['userPlan']['is_active'] == 3) 
                                                    Default
                                                @endif
                                            </button>
                                            
                                            <ul class="dropdown-menu" x-placement="bottom-start"
                                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">

                                                @if ($customer['userPlan']['is_active'] == 0)
                                                <li>
                                                    <a onclick="return confirm('Are you sure to perform this action?')" class="dropdown-item" href="{{ route('module.customer.status', [$customer->id, '1']) }}">
                                                        <i class="fas fa-check text-success"></i> 
                                                            Make as Active
                                                    </a>
                                                </li>
                                                <li>
                                                    <a onclick="return confirm('Are you sure to perform this action?')" class="dropdown-item" href="{{ route('module.customer.status', [$customer->id, '2']) }}">
                                                        <i class="fas fa-times text-danger"></i>
                                                        Make as Reject
                                                    </a>
                                                </li>
                                                @endif

                                                @if ($customer['userPlan']['is_active'] == 1)
                                                <li>
                                                    <a onclick="return confirm('Are you sure to perform this action?')" class="dropdown-item" href="{{ route('module.customer.status', [$customer->id,'0']) }}">
                                                    <i class="fas fa-times text-warning"></i>
                                                            Make as Pending
                                                    </a>
                                                </li>
                                                <li>
                                                    <a onclick="return confirm('Are you sure to perform this action?')" class="dropdown-item" href="{{ route('module.customer.status', [$customer->id,'2']) }}">
                                                    <i class="fas fa-times text-danger"></i>
                                                        Make as Reject
                                                    </a>
                                                </li>
                                                @endif

                                                @if ($customer['userPlan']['is_active'] == 2)
                                                <li>
                                                    <a onclick="return confirm('Are you sure to perform this action?')" class="dropdown-item" href="{{ route('module.customer.status', [$customer->id,'1']) }}">
                                                        <i class="fas fa-check text-success"></i> 
                                                            Make as Active
                                                    </a>
                                                </li>
                                                <li>
                                                    <a onclick="return confirm('Are you sure to perform this action?')" class="dropdown-item" href="{{ route('module.customer.status', [$customer->id,'0']) }}">
                                                    <i class="fas fa-times text-warning"></i> 
                                                            Make as Pending
                                                    </a>
                                                </li>
                                                @endif

                                                @if ($customer['userPlan']['is_active'] == 3)
                                                <li>
                                                    <a onclick="return confirm('Are you sure to perform this action?')" class="dropdown-item" href="{{ route('module.customer.status', [$customer->id,'1']) }}">
                                                        <i class="fas fa-check text-success"></i> 
                                                            Make as Active
                                                    </a>
                                                </li>
                                                <li>
                                                    <a onclick="return confirm('Are you sure to perform this action?')" class="dropdown-item" href="{{ route('module.customer.status', [$customer->id,'0']) }}">
                                                    <i class="fas fa-times text-warning"></i> 
                                                            Make as Pending
                                                    </a>
                                                </li>
                                                <li>
                                                    <a onclick="return confirm('Are you sure to perform this action?')" class="dropdown-item" href="{{ route('module.customer.status', [$customer->id,'2']) }}">
                                                    <i class="fas fa-times text-danger"></i> 
                                                            Make as Reject
                                                    </a>
                                                </li>
                                                @endif

                                            </ul>

                                          @endif
                                        </td>




















                        <td class="text-center" tabindex="0">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                                {{ __('options') }}
                            </button>
                            <ul class="dropdown-menu" x-placement="bottom-start"
                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                <li><a class="dropdown-item"
                                        href="{{ route('module.customer.show', $customer->username) }}">
                                        <i class="fas fa-eye text-info"></i> {{ __('view_details') }}
                                    </a></li>

                                <li><a class="dropdown-item"
                                        href="{{ route('module.customer.edit', $customer->username) }}">
                                        <i class="fas fa-edit text-success"></i> {{ __('edit_customer') }}
                                    </a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('module.customer.ads',$customer->username) }}">
                                        <i class="fab fa-adversal text-primary"></i></i>
                                        {{ __('view_customer_ads') }}
                                    </a></li>
                                <li>
                                    <form action="{{ route('module.customer.destroy', $customer->username) }}"
                                        method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="dropdown-item"
                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                            <i class="fas fa-trash text-danger"></i> {{ __('delete_customer') }}
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">
                                <x-not-found word="Customer" />
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if (request('perpage') != 'all' && $customers->total() > $customers->count())
            <div class="card-footer ">
                <div class="d-flex justify-content-center">
                    {{ $customers->links() }}
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

    .switch {
        position: relative;
        display: inline-block;
        width: 35px;
        height: 19px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        display: none;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 15px;
        width: 15px;
        left: 3px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input.success:checked+.slider {
        background-color: #28a745;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(15px);
        -ms-transform: translateX(15px);
        transform: translateX(15px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
@endsection



@section('script')
<script>
    $('.toggle-switch').change(function () {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var username = $(this).data('id');
        $.ajax({
            type: "POST",
            dataType: "json",
            url: '{{ route("module.customer.emailverified") }}',
            data: {
                'status': status,
                'username': username
            },
            success: function (response) {
                toastr.success(response.message, 'Success');
            }
        });
    })
</script>
@endsection
