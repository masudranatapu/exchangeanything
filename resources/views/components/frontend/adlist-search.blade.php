<form action="{{ route('frontend.adlist.search') }}" method="GET">
    
    <div class="ad-list__search-box" @if($marginTop) style="margin-top : {{$marginTop}}px; @endif">
        <div class="container">
            <!-- Search Box -->
            <div class="search {{ $dark ? 'search-no-borders border-0' : '' }}">
                <div class="search__content">
                    <!-- search by keyword/title -->
                    <div class="search__content-item">
                        <div class="input-field {{ $dark ? 'input-field--transparent' : '' }}">
                            <input type="text" placeholder="{{ __('search_by_ads_title_keywords') }}..."
                                name="keyword" value="{{ request('keyword', '') }}" required />
                            
                        </div>
                    </div>
                    {{--
                    <!-- Search By location -->
                    <div class="search__content-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <div class="input-field {{ $dark ? 'input-field--transparent' : '' }}">
                            @php
                                $countries = Modules\Location\Entities\City::latest('name')->get();
                                $country_name = explode(',', request('country'));
                            @endphp
                            @if(!empty(request()->get('town')))
                              <span class="by_location" style="width: calc(100% - 60px);">{{request()->get('town')}}</span>
                              @else
                              <span class="by_location" style="width: calc(100% - 60px);">By Location</span>
                              @endif
                             
                                <select name="country"  style="width: calc(100% - 60px);">
                                     <option value="" class="d-none">By Location</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->name }}" {{ in_array($country->name, $country_name) ? 'selected' : '' }} >
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                </select>
                           
                            <span class="icon icon--left">
                                <x-svg.search-location-icon />
                            </span>
                        </div>
                    </div>
                   --}}  
                    <!-- Search By location -->
                 {{--   <div class="search__content-item">
                        <div class="input-field {{ $dark ? 'input-field--transparent' : '' }}">
                            @php
                                $town_name = explode(',', request('town'));
                            @endphp
                            <select name="town" id="town" style="width: calc(100% - 60px);">
                                @foreach ($towns as $town)
                                    <option value="{{ $town->name }}" {{ in_array($town->name, $town_name) ? 'selected' : '' }}>
                                        {{ $town->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="icon icon--left">
                                <x-svg.search-location-icon />
                            </span>
                        </div>
                    </div>
                     --}}

                    {{--

                    <!-- Select Category temprorary disable -->
                    <div class="search__content-item" data-bs-toggle="modal" data-bs-target="#staticBackdropCat">
                        <div class="input-field {{ $dark ? 'input-field--transparent' : '' }}">
                            <input type="hidden" name="country" value="{{request()->get('country')}}" id="selected_country">
                            <input type="hidden" name="town" value="{{request()->get('town')}}" id="selected_town">
                            <span class="by_location" style="width: calc(100% - 60px);">{{ request()->get('category') ?? 'By Category' }} </span>
                            
                            <select name="category" id="category" style="width: calc(100% - 60px);">
                                @php
                                    $categories_slug = explode(',', request('category'));
                                @endphp
                                <option value="" style="display: none;">{{ __('By Category') }}</option>
                                @foreach ($categories as $category)
                                    @php
                                        $cat_ads_count = DB::table('ads')->where('category_id', $category->id)->count();
                                    @endphp
                                    <option value="{{ $category->slug }}"
                                        {{ in_array($category->slug, $categories_slug) ? 'selected' : '' }}>
                                        {{ $category->name }} ({{ $cat_ads_count }})
                                    </option>
                                @endforeach
                            </select>
                            
                            <span class="icon icon--left">
                                <x-svg.category-icon />
                            </span>
                        </div>
                    </div>
                    --}}
                    <!-- Search Btn -->
                    <div class="search__content-item">
                        <button class="btn btn--lg" type="submit">
                            <span class="icon--left">
                                <x-svg.search-icon stroke="#fff" />
                            </span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
   


    <div class="mobile-search-filed">
        <div class="container">
             
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search for anything">
                <button class="btn btn--lg input-group-text" type="submit">
                    <span class="icon--left">
                        <x-svg.search-icon stroke="#fff" />
                    </span>
                    {{ __('search') }}
                </button>
            </div>
        </div>
    </div>


    <div class="offcanvas-overlay"></div>

    {{ $slot }}
</form>


<script src="{{ asset('frontend') }}/js/plugins/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('frontend/css') }}/select2.min.css" />
<script src="{{ asset('frontend') }}/js/plugins/select2.min.js"></script>




<script>
    $(document).ready(function() {
        // ===== Select2 ===== \\
        $('.country').select2({
            theme: 'bootstrap-5',
            width: $(this).data('width') ?
                $(this).data('width') : $(this).hasClass('w-100') ?
                '100%' : 'style',
            allowClear: Boolean($(this).data('allow-clear')),
            closeOnSelect: !$(this).attr('multiple'),
        });
        // ===== Select2 ===== \\
        $('#towns').select2({
            theme: 'bootstrap-5',
            width: $(this).data('width') ?
                $(this).data('width') : $(this).hasClass('w-100') ?
                '100%' : 'style',
            allowClear: Boolean($(this).data('allow-clear')),
            closeOnSelect: !$(this).attr('multiple'),
        });
    });

</script>
