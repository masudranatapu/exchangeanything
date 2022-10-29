@extends('backend.settings.setting-layout')

@section('title') {{ __('website_setting') }} @endsection

@section('admin-ads-setting')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title" style="line-height: 36px;">{{ __('Admins Ads') }}</h3>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i>
                                Add Ads
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create Admins Ads</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" action="{{ route('admin.ads.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <x-forms.label name="Ads Name" class="col-sm-4"/>
                                                <div class="col-sm-8">
                                                    <input name="ads_name" type="text" class="form-control @error('ads_name') is-invalid @enderror" autocomplete="off" placeholder="Ads Name" required>
                                                    @error('ads_name')
                                                        <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <x-forms.label name="Ads Image (Height: 90px & width: 960px)" class="col-sm-4" />
                                                <div class="col-sm-8">
                                                    <input  type="file" name="ads_img" class="form-control @error('ads_img') is-invalid @enderror" autocomplete="off" required>
                                                    @error('ads_img')
                                                        <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <x-forms.label name="Link" class="col-sm-4" />
                                                <div class="col-sm-8">
                                                     <input name="ads_link" type="text" class="form-control @error('ads_link') is-invalid @enderror" autocomplete="off" placeholder="Ads link" required>
                                                    @error('ads_link')
                                                        <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <x-forms.label name="Status" class="col-sm-4" />
                                                <div class="col-sm-8">
                                                    <select name="status" class="form-control">
                                                        <option value="1" selected>Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-8">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-upload"></i>
                                                        {{ __('Create Ads') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="5%">{{ __('sl') }}</th>
                                <th>{{ __('ads name') }}</th>
                                <th>{{ __('image') }}</th>
                                <th>{{ __('Ads Link') }}</th>
                                <th width="20%">{{ __('status') }}</th>
                                @if (userCan('admin.update') || userCan('admin.delete'))
                                    <th width="15%">{{ __('actions') }}</th>
                                @endif
                            </tr>
                            <tbody>
                                @foreach($adminads as $key => $adminad)
                                    <tr>
                                        <td>{{$key + 1 }}</td>
                                        <td>{{$adminad->ads_name}}</td>
                                        <td>
                                            <img width="80" height="50" src="{{ asset($adminad->ads_img) }}" alt="">
                                        </td>
                                        <td>{{$adminad->ads_link}}</td>
                                        <td>
                                            <form action="{{ route('admin.ads.status') }}" action="get">
                                                <input type="hidden" value="{{ $adminad->id }}" name="admin_ads_id">
                                                <select name="get_active_status" class="form-control" onchange="this.form.submit()">
                                                    <option value="1" @if($adminad->status == 1) selected @endif >Active</option>
                                                    <option value="0" @if($adminad->status == 0) selected @endif >Inactive</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-info" data-toggle="modal" data-target="#edit_{{$key}}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a onclick="return confirm('Are you really sure to delete ?')" href="{{ route('admin.ads.delete', $adminad->id) }}" class="btn btn-danger mt-2">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit_{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Admins Ads</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" action="{{ route('admin.ads.update',$adminad->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <x-forms.label name="Ads Name" class="col-sm-4" />
                                                            <div class="col-sm-8">
                                                                <input name="ads_name" type="text" value="{{$adminad->ads_name}}" class="form-control @error('ads_name') is-invalid @enderror" autocomplete="off" placeholder="Ads Name">
                                                                @error('ads_name')
                                                                    <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <x-forms.label name="Ads Image (Height: 90px & width: 960px)" class="col-sm-4" />
                                                            <div class="col-sm-8">
                                                                <input  type="file" name="ads_img" class="form-control @error('ads_img') is-invalid @enderror" autocomplete="off">
                                                                @error('ads_img')
                                                                    <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-4"></label>
                                                            <div class="col-sm-8">
                                                                <img width="80" height="50" src="{{ asset($adminad->ads_img)}}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <x-forms.label name="Link" class="col-sm-4" />
                                                            <div class="col-sm-8">
                                                                 <input name="ads_link" type="text" class="form-control @error('ads_link') is-invalid @enderror" autocomplete="off" placeholder="Ads link" value="{{ $adminad->ads_link }}" required>
                                                                @error('ads_link')
                                                                    <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <x-forms.label name="Status" class="col-sm-4" />
                                                            <div class="col-sm-8">
                                                                <select name="status" class="form-control">
                                                                    <option disabled selected>Select One</option>
                                                                    <option value="1" @if($adminad->status == 1) selected @endif >Active</option>
                                                                    <option value="0" @if($adminad->status == 0) selected @endif >Inactive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="offset-sm-4 col-sm-8">
                                                                <button type="submit" class="btn btn-success">
                                                                    <i class="fas fa-upload"></i>
                                                                    {{ __('Update Ads') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                    {{ $adminads->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')

@endsection