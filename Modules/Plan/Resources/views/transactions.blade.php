@extends('layouts.backend.admin')

@section('title') {{ __('transactions') }} @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('category_list') }}</h3>
                        <a href="{{ url()->previous() }}"
                                class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                    class="fas fa-arrow-left"></i>&nbsp; {{ __('back') }}</a>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('customer') }}</th>
                                    <th>{{ __('amount') }}</th>
                                    <th>{{ __('plan_name') }}</th>
                                    <th>{{ __('payment_type') }}</th>
                                    <th>{{ __('created_time') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                    <tr>
                                        <td>
                                            <a href="{{ route('module.customer.show', $transaction->customer->username) }}">{{ $transaction->customer->name }}</a>
                                        </td>
                                        <td class="text-muted">${{  number_format($transaction->amount, 2, '.', ',') }}</td>
                                        <td class="text-muted">
                                            <span class="badge badge-primary">
                                                {{ $transaction->plan->label }}
                                            </span>
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
