@extends('layouts.frontend.layout_one')

@section('title', __('ads'))

@section('content')
    <div class="banner banner--three">
        <div class="row">
            <div class="col-lg-7">
                <div class="home_banner">
                    <x-frontend.adlist-search class="adlist-search" :categories="$categories" :towns="$towns" :dark="true"
                        :total-ads="$total_ads" :marginTop="124" />
                </div>
            </div>
        </div>
    </div>
    <section class="section ad-list" style="margin-top: 0;">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <div class="list-sidebar">
                        {{-- <div class="product-filter">
                            <h3>Product Filters</h3>
                            <span class="close">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.625 4.375L4.375 15.625" stroke="#767E94" stroke-width="1.6"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15.625 15.625L4.375 4.375" stroke="#767E94" stroke-width="1.6"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div> --}}
                        <form method="GET" action="{{ route('frontend.adlist.search') }}" id="adFilterForm">
                            <div class="accordion list-sidebar__accordion" id="accordionGroup">
                                {{-- <div class="accordion-item list-sidebar__accordion-item category"> --}}
                                    {{-- <h2 class="accordion-header list-sidebar__accordion-header">
                                        <button class="accordion-button list-sidebar__accordion-button" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#categoryCollapse"
                                            aria-expanded="true" aria-controls="categoryCollapse">
                                            {{ __('categories') }}
                                        </button>
                                    </h2>
                                    <div id="categoryCollapse" class="accordion-collapse collapse show"
                                        aria-labelledby="category" data-bs-parent="#accordionGroup">
                                        <div class="accordion-body list-sidebar__accordion-body">
                                            <div class="accordion list-sidebar__accordion-inner" id="subcategoryGroup">
                                                @foreach ($categories as $category)
                                                @if ($category->subcategories->count() > 1)
                                                    <div class="accordion-item list-sidebar__accordion-inner-item">
                                                        <h2 class="accordion-header"
                                                            id="{{ Str::slug($category->slug) }}">
                                                            <div class="accordion-button list-sidebar__accordion-inner-button {{ isActiveCategorySidebar($category) ? '' : 'collapsed' }}"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#{{ Str::slug($category->slug) }}Collapse"
                                                                aria-expanded="true"
                                                                aria-controls="{{ Str::slug($category->slug) }}Collapse">
                                                                <span class="list-sidebar__accordion-inner-icon">
                                                                    <i class="{{ $category->icon }}"></i>
                                                                </span>
                                                                @php
                                                                     $cat_count = DB::table('ads')->where('category_id', $category->id)->count();
                                                                @endphp
                                                                <span>
                                                                    {{ $category->name }}
                                                                    <strong>({{ $cat_count }})</strong>
                                                                </span>

                                                                    <span class="icon icon--plus">
                                                                        <x-svg.plus-light-icon />
                                                                    </span>


                                                                     <span class="icon icon--minus">
                                                                    <x-svg.minus-icon />
                                                                </span>


                                                            </div>
                                                        </h2>
                                                        <div id="{{ Str::slug($category->slug) }}Collapse"
                                                            class="accordion-collapse collapse {{ isActiveCategorySidebar($category) ? 'show' : '' }}"
                                                            aria-labelledby="{{ $category->slug }}"
                                                            data-bs-parent="#subcategoryGroup">
                                                            <div class="accordion-body list-sidebar__accordion-inner-body">
                                                                @foreach ($category->subcategories as $subcategory)
                                                                    <div class="list-sidebar__accordion-inner-body--item">
                                                                <div class="form-check">
                                                                    @php
                                                                        $subcat_count = DB::table('ads')->where('subcategory_id', $subcategory->id)->count();
                                                                    @endphp
                                                                    <input id="{{ $subcategory->slug }}"
                                                                        type="checkbox" name="subcategory[]"
                                                                        value="{{ $subcategory->slug }}"
                                                                        class="form-check-input"
                                                                        {{ request('subcategory') && in_array($subcategory->slug, request('subcategory')) ? 'checked' : '' }}
                                                                        onchange="changeFilter()" />

                                                                    <x-forms.label
                                                                        name="{!! $subcategory->name !!} ({{ $subcat_count }})"
                                                                        for="{{ $subcategory->slug }}"
                                                                        class="form-check-label" />
                                                                </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div> --}}
                                {{-- </div> --}}
                                <div class="accordion-item list-sidebar__accordion-item condition">
                                    <h2 class="accordion-header list-sidebar__accordion-header" id="condition">
                                        <button class="accordion-button list-sidebar__accordion-button collapsed"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#conditionCollapse"
                                            aria-expanded="false" aria-controls="conditionCollapse">
                                            {{ __('condition') }}
                                        </button>
                                    </h2>
                                    <div id="conditionCollapse" class="accordion-collapse collapse show"
                                        aria-labelledby="condition" data-bs-parent="#accordionGroup">
                                        <div class="accordion-body list-sidebar__accordion-body">
                                            <div class="list-sidebar__accordion-inner-body--item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="condition"
                                                        id="condition1" value="" onchange="changeFilter()"
                                                        {{ request('condition') == '' ? 'checked' : '' }} />
                                                    <x-forms.label name="{{ __('any') }}" class="form-check-label"
                                                        for="condition1" />
                                                </div>
                                            </div>
                                            <div class="list-sidebar__accordion-inner-body--item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="condition"
                                                        id="condition2" value="new" onchange="changeFilter()"
                                                        {{ request('condition') == 'new' ? 'checked' : '' }} />
                                                    <x-forms.label name="{{ __('new') }}" class="form-check-label"
                                                        for="condition2" />
                                                </div>
                                            </div>
                                            <div class="list-sidebar__accordion-inner-body--item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="condition"
                                                        id="condition3" value="Like New" onchange="changeFilter()"
                                                        {{ request('condition') == 'Like New' ? 'checked' : '' }} />
                                                    <x-forms.label name="{{ __('Like New') }}" class="form-check-label"
                                                        for="condition3" />
                                                </div>
                                            </div>
                                            <div class="list-sidebar__accordion-inner-body--item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="condition"
                                                        id="condition4" value="Excellent" onchange="changeFilter()"
                                                        {{ request('condition') == 'Excellent' ? 'checked' : '' }} />
                                                    <x-forms.label name="{{ __('Excellent') }}" class="form-check-label"
                                                        for="condition4" />
                                                </div>
                                            </div>
                                            <div class="list-sidebar__accordion-inner-body--item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="condition"
                                                        id="condition5" value="Good" onchange="changeFilter()"
                                                        {{ request('condition') == 'Good' ? 'checked' : '' }} />
                                                    <x-forms.label name="{{ __('Good') }}" class="form-check-label"
                                                        for="condition5" />
                                                </div>
                                            </div>
                                            <div class="list-sidebar__accordion-inner-body--item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="condition"
                                                        id="condition6" value="Fair" onchange="changeFilter()"
                                                        {{ request('condition') == 'Fair' ? 'checked' : '' }} />
                                                    <x-forms.label name="{{ __('Fair') }}" class="form-check-label"
                                                        for="condition6" />
                                                </div>
                                            </div>
                                            <div class="list-sidebar__accordion-inner-body--item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="condition"
                                                        id="condition6" value="Salvage" onchange="changeFilter()"
                                                        {{ request('condition') == 'Salvage' ? 'checked' : '' }} />
                                                    <x-forms.label name="{{ __('Salvage') }}" class="form-check-label"
                                                        for="condition6" />
                                                </div>
                                            </div>
                                            <!-- <div class="list-sidebar__accordion-inner-body--item">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="condition"
                                                            id="condition" value="used" onchange="changeFilter()"
                                                            {{ request('condition') == 'used' ? 'checked' : '' }} />
                                                        <x-forms.label name="{{ __('used') }}" class="form-check-label"
                                                            for="condition" />
                                                    </div>
                                                </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item list-sidebar__accordion-item price d-none">
                                    <h2 class="accordion-header list-sidebar__accordion-header" id="priceTag">
                                        <button class="accordion-button list-sidebar__accordion-button collapsed"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#priceCollapse"
                                            aria-expanded="false" aria-controls="priceCollapse">
                                            {{ __('prices') }}
                                        </button>
                                    </h2>
                                    <input type="hidden" name="price_min" id="price_min">
                                    <input type="hidden" name="price_max" id="price_max">
                                    <div id="priceCollapse" class="accordion-collapse collapse show"
                                        aria-labelledby="priceTag" data-bs-parent="#accordionGroup">
                                        <div class="accordion-body list-sidebar__accordion-body">
                                            <div class="price-range-slider">
                                                <div id="priceRangeSlider"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="ad-list__content row">
                        @forelse ($adlistings as $ad)
                            <x-frontend.single-ad :ad="$ad" className="col-lg-4 col-md-6 mb-4">
                            </x-frontend.single-ad>
                        @empty
                            <x-not-found2 message="No ads found" />
                        @endforelse
                    </div>
                    <div class="page-navigation">
                        {{ $adlistings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('adlisting_style')
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/select2-bootstrap-5-theme.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/nouislider.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/select2.min.css" />
@endsection

@section('frontend_script')
    {{-- <script src="{{ asset('frontend') }}/js/plugins/bvselect.js"></script> --}}
    <script src="{{ asset('frontend') }}/js/plugins/nouislider.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/wNumb.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/select2/js/select2.min.js"></script>
    <script>
        function changeFilter() {
            const slider = document.getElementById('priceRangeSlider')
            const value = slider.noUiSlider.get(true);
            document.getElementById('price_min').value = value[0]
            document.getElementById('price_max').value = value[1]
            const form = $('#adFilterForm')
            const data = form.serializeArray();
            $('#adFilterForm').submit()
        }

        function setDefaultPriceRangeValue() {
            const slider = document.getElementById('priceRangeSlider')
            slider.noUiSlider.set([{{ request('price_min') }}, {{ request('price_max') }}]);
        }

        $(document).ready(function() {
            const slider = document.getElementById('priceRangeSlider')
            let maxRange = Number.parseInt("{{ $adMaxPrice ?? 500 }}")
            let minPrice = 0;
            let maxPrice = maxRange;
            @if (request()->has('price_min') && request()->has('price_max'))
                minPrice = Number.parseInt("{{ request('price_min', 0) }}")
                maxPrice = Number.parseInt("{{ request('price_max', 500) }}")
            @endif
            noUiSlider.create(slider, {
                start: [minPrice, maxPrice],
                connect: true,
                range: {
                    min: [0],
                    max: [maxRange],
                },
                format: wNumb({
                    decimals: 2,
                    thousand: ',',
                    suffix: ' ({{ env('APP_CURRENCY_SYMBOL') }})',
                }),
                tooltips: true,
            });

            slider.noUiSlider.on('change', function() {
                changeFilter();
            });

            // ===== Select2 ===== \\
            $('#country').select2({
                theme: 'bootstrap-5',
                width: $(this).data('width') ?
                    $(this).data('width') : $(this).hasClass('w-100') ?
                    '100%' : 'style',
                placeholder: 'By Country',
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });

            // ===== Select2 ===== \\
            $('#town').select2({
                theme: 'bootstrap-5',
                width: $(this).data('width') ?
                    $(this).data('width') : $(this).hasClass('w-100') ?
                    '100%' : 'style',
                placeholder: 'By Region',
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });
        });
    </script>
@endsection
