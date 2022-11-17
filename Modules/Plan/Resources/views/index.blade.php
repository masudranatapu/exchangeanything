@extends('layouts.backend.admin')
@section('title')
    {{ __('plan_list') }}
@endsection
@section('content')
    <div class="container-fluid">
        @if (userCan('plan.update') && $plans->count())
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('module.plan.recommended') }}" method="get">
                        <div class="form-row align-items-center">
                            <div class="col-auto my-1">
                                <x-forms.label name="set_recommended_package" for="inlineFormCustomSelect" class="mr-sm-2" />
                                <select name="plan_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                    <option value="0" selected>NULL</option>
                                    @foreach ($plans as $plan)
                                        <option {{ $plan->recommended ? 'selected' : '' }} value="{{ $plan->id }}">
                                            {{ $plan->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto my-2 py-2 ">
                                <button type="submit" class="btn btn-primary "
                                    style="margin-top:25px">{{ __('save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="text-right" style="margin-bottom: 10px">
                        @if (userCan('plan.create'))
                            <a href="{{ route('module.plan.create') }}" class="btn2"><i class="fas fa-plus"></i>&nbsp;
                                {{ __('add_plan') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            @forelse ($plans as $plan)
                <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                    <div class="plan-card plan-card--active">
                        <div class="plan-card__top">

                            @if ($plan->recommended)
                                <span class="cards__tag text--body-5" style="background-color: #28a745">
                                    {{ __('recommended') }}</span>
                            @endif

                            <h2 class="plan-card__title text--body-1">{{ $plan->label }}</h2>
                            <div class="plan-card__price">
                                <h5 class="text--display-3">${{ $plan->price }}</h5>
                            </div>
                            <p class="plan-card__title">
                                @if ($plan->package_duration == 1)
                                    Lifetime Membership
                                @elseif($plan->package_duration == 2)
                                    Annually
                                @elseif($plan->package_duration == 3)
                                    Monthly
                                @endif
                            </p>
                        </div>
                        <div class="plan-card__bottom">
                            <div class="plan-card__package">

                                <div class="plan-card__package-list">
                                    <i class="fas fa-check-circle"
                                        style="color:#108ab1; margin-right: 5px; font-size: 21px;"></i>
                                    <h5 class="text--body-3">
                                        @if ($plan->ad_limit == 0)
                                            Unlimited adverts
                                        @else
                                            {{ __('ads_limit') }} : {{ $plan->ad_limit }}
                                        @endif
                                    </h5>
                                </div>

                                <div class="plan-card__package-list active">
                                    <span class="icon">
                                        <x-svg.check-icon />
                                    </span>
                                    <h5 class="text--body-3">{{ __('featured_ads_limit') }} : {{ $plan->featured_limit }}
                                    </h5>
                                </div>

                                <div class="plan-card__package-list {{ $plan->badge == true ? 'active' : '' }}">
                                    @if ($plan->badge == true)
                                        <span class="icon">
                                            <x-svg.check-icon />
                                        </span>
                                    @else
                                        <span class="icon text-danger">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    @endif

                                    <h5 class="text--body-3">{{ __('badge') }}</h5>
                                </div>


                                @if (is_array($plan->new_featured))
                                    @foreach ($plan->new_featured as $value)
                                        <div class="plan-card__package-list active">
                                            <span class="icon">
                                                <x-svg.check-icon />
                                            </span>
                                            <h5 class="text--body-3">{{ $value }}</h5>
                                        </div>
                                    @endforeach
                                @endif


                            </div>
                        </div>
                        @if (userCan('plan.update') || userCan('plan.delete'))
                            <div class="row">
                                <div class="col-6">
                                    @if (userCan('plan.update'))
                                        <a href="{{ route('module.plan.edit', $plan->id) }}"
                                            class="plan-card__select-pack btn btn--bg card_footer-bg">
                                            <i class="fas fa-edit"></i>
                                            {{ __('edit_plan') }}
                                        </a>
                                    @endif
                                </div>
                                @if (!$loop->first)
                                    <div class="col-6">
                                        @if (userCan('plan.delete'))
                                            <form action="{{ route('module.plan.delete', $plan->id) }}"
                                                class="plan-card__select-pack card_footer-bg" method="POST"
                                                onclick="return confirm('Are You Sure?')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn--bg" style="width: 100%">
                                                    <i class="fas fa-trash"></i>
                                                    {{ __('delete_plan') }}
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-body" style="padding:55px">
                            <img src="{{ asset('backend/image') }}/not-found.svg" height="128px" class="plan-img">
                            <h5 class="plan-h5">{{ __('no_results_found') }}</h5>
                            <p class="plan-p">{{ __('there_is_no_plan_found_in_this_page') }}.</p>
                            <a href="{{ route('module.plan.create') }}" class="plan-btn">
                                <x-svg.plus-icon />
                                {{ __('add_your_first_plan') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection


@section('style')
    <style>
        .btn2 {
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            color: #fff;
            background-color: #007bff;
            font-weight: 400;
            padding: .375rem .75rem;
        }

        .btn2:hover {
            background-color: #0062cc;
            color: #fff;
        }

        .col-6 {
            padding-right: 1px;
            padding-left: 1px;
        }

        .card_footer-bg {
            background-color: #e8f7ff;
            color: #0088cc;
            width: 100%;
        }

        .card_footer-bg button {
            color: #0088cc;
        }

        .card_footer-bg:hover button {
            color: #0088cc;
        }

        .card_footer-bg:hover {
            background-color: #cceeff;
            color: #0088cc;
        }

        .cards__tag {
            position: absolute;
            top: 20px;
            left: -40px;
            padding: 8px 57px 8px 30px;
            color: #fff;
            text-transform: uppercase;
            transform: rotate(-45deg);

        }

        .plan-card {
            position: relative;
            border-radius: 12px;
            background-color: #fff;
            overflow: hidden;
        }

        .plan-card--active {
            border: 2px solid #0088cc;
        }

        .plan-card__top {
            background-color: #0088cc;
            border: 0px;
            border-radius: 0px;
            text-align: center;
            padding: 32px;
        }

        .plan-card__title {
            color: #fff;
            margin-bottom: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .text--body-1 {
            line-height: 36px;
            font-family: "Nunito", sans-serif;
            font-size: 24px;
        }

        .plan-card__price {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            margin-bottom: 32px;
            color: #fff;
        }

        .text--display-3 {
            line-height: 67.2px;
            font-weight: 700;
            font-family: "Nunito Sans", sans-serif;
            font-size: 56px;
            text-transform: capitalize;
        }

        .plan-card__bottom {
            border-top: 0px;
            padding: 32px;
            border: 1px solid #ebeef7;
        }

        .plan-card__package-list {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .plan-card__package-list.active .icon {
            color: #fff;
            background-color: #0088cc;
        }

        .plan-card__package-list .icon {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            margin-right: 12px;
            color: #66ccff;
        }
    </style>
@endsection
