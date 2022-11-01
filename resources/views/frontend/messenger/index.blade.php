@extends('layouts.frontend.layout_one')

@section('title',__('message'))

@section('frontend_style')
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/select2.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/select2-bootstrap-5-theme.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/slick.css" />
    @if (auth('customer')->check() && isset(session('user_plan')->ad_limit) && session('user_plan')->ad_limit < $settings->free_ad_limit)
        <style>
            .header--one {
                top: 50px !important;
            }
            .header--fixed {
                top: 0 !important;
            }
        </style>
    @endif
@endsection

@section('content')
    
    <!-- Banner section start  -->
    {{-- 
    <div class="banner banner--three" style="background:url('https://adlisting.templatecookie.com/frontend/default_images/index3_search_filter_background.png') center center/cover no-repeat;">
        <div class="container">
            @include('frontend.user-search-filter')
        </div>
    </div>
    <!-- Banner section end   -->
 --}}
    <!-- dashboard section start  -->
    <section class="section dashboard">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    @include('layouts.frontend.partials.dashboard-sidebar')
                </div>
                <div class="col-xl-9">
                    <div class="dashboard__message active">
                        <div class="dashboard__message-left dashboard__message-users">
                            <h2 class="title text--body-2-600">{{ __('message') }}</h2>
                            <div class="dashboard__message-userscontent">
                                @forelse ($users as $chatuser)
                                    <x-messenger.user-list :user="$chatuser"></x-messenger.user-list>
                                @empty
                                    <div class="user user--profile active">
                                        <div class="user-info">
                                            <p class="message-hint center-el"><span>{{ __('empty_contact') }}</span></p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="dashboard__message-right dashboard__message-user">
                            <div class="message-header">
                                @if (!is_null($selected_user))
                                    <x-messenger.message-header :user="$selected_user"></x-messenger.message-header>
                                @endif
                            </div>

                            <div class="message-body">
                                @if (!is_null($selected_user))
                                    @forelse ($messages as $message)
                                        <x-messenger.message :message="$message" :user="$selected_user"></x-messenger.message>
                                    @empty
                                        <p class="message-hint center-el" style="text-align:center;margin-top:30px;"><span>{{ __('empty_message') }}</span></p>
                                    @endforelse
                                @else
                                <div class="vertical-center">
                                    <p>{{ __('select_someone_to_start_conversation') }}</p>
                                </div>
                                @endif
                            </div>
                            <div class="message-footer">
                                @if (!is_null($selected_user))
                                    <x-messenger.message-form :user="$selected_user"></x-messenger.message-form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- dashboard section end  -->
@endsection

@section('frontend_script')
    <script src="{{ asset('frontend') }}/js/plugins/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/venobox.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/select2.min.js"></script>
    <script>
        function adFilterFunction(slug) {
            $('#adFilterInput').val(slug);
            $('#adFilterForm').submit();
        }
        $(document).ready(function() {
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
