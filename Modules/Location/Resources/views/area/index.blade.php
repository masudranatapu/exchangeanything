@extends('layouts.backend.admin')

@section('title') {{ __('City List') }} @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">{{ __('City List') }}</h3>
                    <a href="{{ route('module.area.create') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                        <i class="fas fa-plus"></i>&nbsp; {{ __('Add City') }}
                    </a>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">{{ __('sl') }}</th>
                                <th>{{ __('Country Name') }}</th>
                                <th>{{ __('State Name') }}</th>
                                <th>{{ __('City Name') }}</th>
                                <th width="15%">{{ __('actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($areas as $area)
                                @php
                                    $country = DB::table('cities')->where('id', $area->country_id)->first();
                                    $state = DB::table('towns')->where('id', $area->state_id)->first();
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $country->name ?? ''}}</td>
                                    <td>{{ $state->name ?? ''}}</td>
                                    <td>{{ $area->city_name }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a title="{{ __('edit_area') }}" href="{{ route('module.area.edit', $area->id) }}" class="btn bg-info mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('module.area.delete', $area->id) }}" method="get" class="d-inline">
                                            <button data-toggle="tooltip" data-placement="top"
                                                title="{{ __('delete_area') }}"
                                                onclick="return confirm('{{ __('Are you sure want to delete this city ?') }}');"
                                                class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">
                                        <x-not-found word="City" route="module.area.create"/>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer ">
                    <div class="d-flex justify-content-center">
                        {{ $areas->links() }}
                    </div>
                </div>
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
