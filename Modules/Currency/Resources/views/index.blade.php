@extends('layouts.backend.admin')

@section('title')
    {{ __('currency_list') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('module.currency.default') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                            <x-forms.label name="set_default_currency" for="inlineFormCustomSelect" class="mr-sm-2" />
                            <select name="currency_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option value="" hidden>{{ __('currency') }}</option>
                                @foreach ($currencies as $currency)
                                    <option {{ $currency->code == env('APP_CURRENCY') ? 'selected' : '' }}
                                        value="{{ $currency->id }}">
                                        {{ $currency->name }}({{ $currency->code }})</option>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('currency_list') }}</h3>
                        <a href="{{ route('module.currency.create') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-plus"></i>&nbsp; {{ __('add_currency') }}</a>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">{{ __('sl') }}</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('code') }}</th>
                                    <th>{{ __('symbol') }}</th>
                                    <th>{{ __('position') }}</th>
                                    <th width="15%">{{ __('actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($currencies as $key => $currency)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $currency->name }}
                                            @if (config('adlisting.currency') == $currency->code)
                                                <span class="badge badge-pill badge-primary">
                                                    {{ __('default') }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $currency->code }}</td>
                                        <td>{{ $currency->symbol }}</td>
                                        <td>{{ $currency->symbol_position }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            @if ($currency->code == 'USD')
                                                <a href="javascript:void(0)" class="btn btn-warning mt-0 mr-2"
                                                    data-toggle="tooltip" title="You can't delete or edit this currency">
                                                    <i class="fas fa-lock"></i>
                                                </a>
                                            @endif
                                            @if ($currency->code != 'USD')
                                                <a href="{{ route('module.currency.edit', $currency->id) }}"
                                                    class="btn btn-info mt-0 mr-2"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('module.currency.delete', $currency->id) }}"
                                                    class="d-inline" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button data-toggle="tooltip" data-placement="top"
                                                        title="{{ __('delete_language') }}"
                                                        onclick="return confirm('{{ __('Are you sure want to delete this item?') }}');"
                                                        class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">
                                            <x-not-found word="currency" route="module.currency.create" />
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($currencies->total() > $currencies->count())
                        <div class="card-footer ">
                            <div class="d-flex justify-content-center">
                                {{ $currencies->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
