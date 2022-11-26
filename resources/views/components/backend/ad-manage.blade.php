<table class="table table-hover text-nowrap table-bordered">
    <thead>
        <tr class="text-center">
            <th width="2%">{{ __('sl') }}</th>
            <th width="5%">{{ __('thumbnail') }}</th>
            <th width="10%">{{ __('name') }}</th>
            <th width="10%">{{ __('price') }}</th>
            @if ($showCategory)
            <th width="10%">{{ __('category') }}</th>
            @endif
            @if ($showCustomer)
                <th width="10%">{{ __('customer_name') }}</th>
            @endif
            <th width="10%">{{ __('status') }}</th>
            <th width="5%">{{ __('actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($ads as $key =>$ad)
        <tr>
            <td class="text-center" tabindex="0">
                {{ $key+1 }}
            </td>
            <td class="text-center" tabindex="0">
                <img src="{{ $ad->image_url }}" class="rounded" height="50px" width="50px" alt="image">
            </td>
            <td class="text-center" tabindex="0">
                {{ $ad->title }}
                @if ($ad->featured)
                    <span class="badge badge-warning">
                        {{ __('featured') }}
                    </span>
                @endif
            </td>
            <td class="text-center" tabindex="0">
                ${{ $ad->price }}
                <span style="font-size: 15px;">
                    @if ($ad->price_method == 2)
                        <sub>Per Hour</sub>
                    @elseif ($ad->price_method == 3)
                        <sub>Per Day</sub>
                    @elseif ($ad->price_method == 4)
                        <sub>Per Week</sub>
                    @elseif ($ad->price_method == 5)
                        <sub>Per Month</sub>
                    @elseif ($ad->price_method == 6)
                        <sub>Per Year</sub>
                    @endif
                </span>
            </td>
            @if ($showCategory)
            <td class="text-center" tabindex="0">
                <a href="{{ route('module.category.show', $ad->category->slug) }}">{{ $ad->category->name }}</a>
            </td>
            @endif
            @if ($showCustomer) 
                <td class="text-center" tabindex="0">
                    @if(!empty($ad->customer->username))
                    <a href="{{ route('module.customer.show',['customer'=>$ad->customer->username]) }}">
                        {{ $ad->customer->username }}
                    </a>
                    @endif
                </td>
            @endif
            <td class="text-center" tabindex="0">
                <button type="button" class="dropdown-toggle btn-sm btn btn-{{ $ad->status == 'active' ? 'success': ($ad->status == 'pending' ? 'warning':'danger') }}" data-toggle="dropdown"
                    aria-expanded="false">
                    {{ ucfirst($ad->status) }}
                </button>
                <ul class="dropdown-menu" x-placement="bottom-start"
                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                    @if ($ad->status == 'pending' || $ad->status == 'expired' || $ad->status == 'declined')
                        <li><a onclick="return confirm('Are you sure to perform this action?')" class="dropdown-item" href="{{ route('module.ad.status', [$ad->slug,'active']) }}">
                                <i class="fas fa-check text-success"></i> {{ __('mark_as_active') }}
                            </a>
                        </li>
                    @endif
                    @if ($ad->status == 'active')
                    <li><a onclick="return confirm('Are you sure to perform this action?')" class="dropdown-item" href="{{ route('module.ad.status', [$ad->slug,'expired']) }}">
                            <i class="fas fa-hourglass-end text-danger"></i> {{ __('mark_as_expired') }}
                        </a>
                    </li>
                    @endif
                    @if ($ad->status == 'pending' && $settings->ads_admin_approval)
                    <li><a onclick="return confirm('Are you sure to perform this action?')" class="dropdown-item" href="{{ route('module.ad.status', [$ad->slug,'declined']) }}">
                            <i class="fas fa-times text-danger"></i> {{ __('mark_as_reject') }}
                        </a>
                    </li>
                    @endif
                </ul>
            </td>
            <td class="text-center" tabindex="0">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false">
                    {{ __('options') }}
                </button>
                <ul class="dropdown-menu" x-placement="bottom-start"
                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                    <li><a class="dropdown-item" href="{{ route('module.ad.show', $ad->slug) }}">
                            <i class="fas fa-eye text-info"></i> {{ __('view_details') }}
                        </a></li>

                        {{--  
                            <li>
                                <a class="dropdown-item" href="{{ route('module.ad.edit', $ad->id) }}">
                                    <i class="fas fa-edit text-success"></i> {{ __('edit_ad') }}
                                </a>
                            </li>
                       
                    <li><a class="dropdown-item" href="{{ route('module.ad.show_gallery', $ad->id) }}">
                            <i class="fas fa-images text-primary"></i></i> {{ __('ad_gellary') }}
                        </a></li>
                    <li> --}}
                        <form action="{{ route('module.ad.destroy', $ad->id) }}" method="POST"
                            class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="dropdown-item"
                                onclick="return confirm('Are you sure you want to delete this item?');">
                                <i class="fas fa-trash text-danger"></i> {{ __('delete_ad') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="10" class="text-center">
                <x-not-found word="Ad" />
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
