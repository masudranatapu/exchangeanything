@extends('layouts.backend.admin')
@section('title') {{ __('customer_details') }} @endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 mb-3">
                <div class="card card-widget widget-user shadow">
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">{{ $customer->name }}</h3>
                        <h5 class="widget-user-desc">{{ $customer->email }}</h5>
                    </div>
                    <div class="widget-user-image">
                        @if ($customer->image)
                            <img class="img-circle elevation-2" src="{{ asset($customer->image) }}" alt="Customer Image">
                            @if ($customer->certified_seller == 1 && $customer->certificate_validity > now())
                                @php
                                    $certified = DB::table('get_certified_plans')->latest()->first();
                                @endphp
                                <img src="@if($certified->badge_image) {{asset($certified->badge_image)}} @else {{ asset('images/certified.jpg') }} @endif" style="width: 50px;height: 50px;border-radius: 50%;position: absolute; bottom: 0px; top: 62px; right: -5px;">
                            @endif
                        @else
                            <img class="img-circle elevation-2" src="{{ asset('backend/image/thumbnail.jpg') }}" alt="Customer Image">
                            @if ($customer->certified_seller == 1 && $customer->certificate_validity > now())
                                @php
                                    $certified = DB::table('get_certified_plans')->latest()->first();
                                @endphp
                                <img src="@if($certified->badge_image) {{asset($certified->badge_image)}} @else {{ asset('images/certified.jpg') }} @endif" style="width: 50px;height: 50px;border-radius: 50%;position: absolute; bottom: 0px; top: 45px; right: -10px;">
                            @endif
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{ __('username') }}</h5>
                                    <span class="description-text">{{ $customer->username }}</span>
                                </div>
                            </div>
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{ __('phone') }}</h5>
                                    <span class="description-text">{{ $customer->phone }}</span>
                                </div>
                            </div>
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{ __('website') }}</h5>
                                    <span class="description-text">{{ $customer->web ? $customer->web:'-' }}</span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="description-block">
                                    <h5 class="description-header">{{ __('registered_at') }}</h5>
                                    <span class="description-text">{{ date('M d, Y', strtotime($customer->created_at))  }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@php 
$user_plan = App\Models\UserPlan::where('customer_id', $customer->id)->first();
$plans = Modules\Plan\Entities\Plan::where('id', $user_plan->plans_id)->first();
@endphp
            
                <div class="card card-widget widget-user shadow">

                    <div class="card-header">
                        <div class="row justify-content-center" >
                            <div class="col-md-10" style="text-align: center" >
                                <h4 class="bg-blue p-1">Package Info</h4>
                            </div>
                        </div>
                        <div class="row justify-content-center" >
                            <div class="col-md-8" >
                                <table class="table table-striped">
                                    <tr>
                                        <td>User Unique Id</td>
                                        <td>:</td>
                                        <td>{{$customer->code}}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Note</td>
                                        <td>:</td>
                                        <td>{{$customer->payment_note}}</td>
                                    </tr>
                                    <tr>
                                        <td>Package Name</td>
                                        <td>:</td>
                                        <td>{{$plans->label}}</td>
                                    </tr>
                                    <tr>
                                        <td>Package Price</td>
                                        <td>:</td>
                                        <td>{{$plans->price}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                {{-- category wise ads --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('customer') }} {{ __('ads') }}</h3>
                        <a href="{{ route('module.category.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp; {{ __('back') }}</a>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <x-backend.ad-manage :ads="$ads" :showCustomer="false"/>
                    </div>
                </div>

                {{-- purchase plan --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('purchase_plan') }}</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('sl') }}</th>
                                    <th>{{ __('amount') }}</th>
                                    <th>{{ __('plan_name') }}</th>
                                    <th>{{ __('payment_type') }}</th>
                                    <th>{{ __('created_time') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $key => $transaction)
                                    <tr>
                                        <td>
                                            {{ $key+1 }}
                                        </td>
                                        <td class="text-muted">${{  number_format($transaction->amount, 2, '.', ',') }}</td>
                                        <td class="text-muted">
                                            @if($transaction->transaction_type == 1)
                                                <span class="badge badge-primary">
                                                    Plan Purchase
                                                </span>
                                            @else 
                                                <span class="badge badge-primary">
                                                    Certificate Purchase
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-muted">{{ ucfirst($transaction->payment_type) }}</td>
                                        <td class="text-muted">{{ date('M d, Y', strtotime($transaction->created_at))  }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <span class="">{{ __('no_transactions_found') }}...</span>
                                        </td>
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

@section('style')
    <style>
        .widget-user .widget-user-image>img {
            width: 110px;
        }
        .widget-user .card-footer {
            padding-top: 80px;
        }
    </style>
@endsection
