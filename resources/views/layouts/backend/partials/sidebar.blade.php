<style>
         h4.site_name{
                padding: 12px 0px;
                color: #fff;
                font-weight: 500;
                font-size: 20px;
                border-bottom: 1px solid #2b2828;
                margin-bottom: 29px;
            }
     </style> 
<aside id="sidebar" class="main-sidebar sidebar-dark-primary elevation-4"
    style="background-color: {{ $settings->dark_mode ? '' : $settings->sidebar_color }}">
    <!-- Brand Logo -->
   {{-- <a href="{{ route('home') }}" class="brand_logo">
        <img src="{{ $settings->logo2_image_url }}" alt="Logo" class="">
    </a> --}}

      <a href="{{ route('home') }}" class="brand_logo">
        <h4 class="text-center site_name">ExchangeAnything</h4>
     </a> 
       
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <div class="avatar">
                    <img src="{{ $user->image_url }}" class="elevation-2" alt="User Image">
                </div>
            </div>
            <div class="info">
                <a href="{{ route('profile') }}" class="d-block">{{ $user->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy nav-flat"
                data-widget="treeview" role="menu" data-accordion="false">
                {{-- Dashboard --}}
                <x-sidebar-list :linkActive="Route::is('home') ? true : false" route="home"
                    icon="fas fa-tachometer-alt">
                    {{ __('dashboard') }}
                </x-sidebar-list>

                {{-- Newsletter Subscription --}}
                @if (Module::collections()->has('Newsletter') && $newsletter_enable)
                    @if (userCan('newsletter.view') || userCan('newsletter.mailsend'))
                        <x-sidebar-dropdown :linkActive="Route::is('module.newsletter.*') ? true : false"
                            :subLinkActive="Route::is('module.newsletter.*') ? true : false" icon="fas fa-envelope">
                            @slot('title')
                                {{ __('newsletter') }}
                            @endslot

                            @if (userCan('newsletter.view'))
                                <ul class="nav nav-treeview">
                                    <x-sidebar-list :linkActive="Route::is('module.newsletter.index') ? true : false"
                                        route="module.newsletter.index" icon="fas fa-circle">
                                        {{ __('emails') }}
                                    </x-sidebar-list>
                                </ul>
                            @endif
                            @if (userCan('newsletter.mailsend'))
                                <ul class="nav nav-treeview">
                                    <x-sidebar-list
                                        :linkActive="Route::is('module.newsletter.send_mail') ? true : false"
                                        route="module.newsletter.send_mail" icon="fas fa-circle">
                                        {{ __('send_mail') }}
                                    </x-sidebar-list>
                                </ul>
                            @endif

                        </x-sidebar-dropdown>
                    @endif
                @endif

                {{-- Ad --}}
                @if (Module::collections()->has('Ad') || Module::collections()->has('Category') || Module::collections()->has('Brand') || Module::collections()->has('Location'))
                    @if (userCan('ad.view') || userCan('category.view') || userCan('subcategory.view') || userCan('brand.view') || userCan('city.view') || userCan('town.view'))
                        <x-sidebar-dropdown
                            :linkActive="Route::is('module.ad.*') ||Route::is('module.category.*') || Route::is('module.subcategory.*') || Route::is('module.brand.*') || Route::is('module.city.*') || Route::is('module.town.*') ? true : false"
                            :subLinkActive="Route::is('module.ad.*') ||Route::is('module.category.*') || Route::is('module.subcategory.*') || Route::is('module.brand.*') || Route::is('module.city.*') || Route::is('module.town.*') ? true : false"
                            icon="fab fa-adversal">
                            @slot('title')
                                {{ __('ads') }}
                            @endslot
                            @if (Module::collections()->has('Ad'))
                                {{-- @if (userCan('ad.create'))
                                    <ul class="nav nav-treeview">
                                        <x-sidebar-list :linkActive="Route::is('module.ad.create') ? true : false"
                                            route="module.ad.create" icon="fas fa-circle">
                                            {{ __('create_ad') }}
                                        </x-sidebar-list>
                                    </ul>
                                @endif --}}
                                @if (userCan('ad.view'))
                                    <ul class="nav nav-treeview">
                                        <x-sidebar-list :linkActive="Route::is('module.ad.*') ? true : false"
                                            route="module.ad.index" icon="fas fa-circle">
                                            {{ __('ad') }}
                                        </x-sidebar-list>
                                    </ul>
                                @endif
                            @endif
                            @if (Module::collections()->has('Category'))
                                @if (userCan('category.view'))
                                    <ul class="nav nav-treeview">
                                        <x-sidebar-list :linkActive="Route::is('module.category.*') ? true : false"
                                            route="module.category.index" icon="fas fa-circle">
                                            {{ __('category') }}
                                        </x-sidebar-list>
                                    </ul>
                                @endif
                                @if (userCan('subcategory.view'))
                                    <ul class="nav nav-treeview">
                                        <x-sidebar-list :linkActive="Route::is('module.subcategory.*') ? true : false"
                                            route="module.subcategory.index" icon="fas fa-circle">
                                            {{ __('subcategory') }}
                                        </x-sidebar-list>
                                    </ul>
                                @endif
                            @endif
                            @if (Module::collections()->has('Brand') && userCan('brand.view'))
                                <ul class="nav nav-treeview">
                                    <x-sidebar-list :linkActive="Route::is('module.brand.*') ? true : false"
                                        route="module.brand.index" icon="fas fa-circle">
                                        {{ __('brand') }}
                                    </x-sidebar-list>
                                </ul>
                            @endif
                            @if (Module::collections()->has('Location'))
                                @if (userCan('city.view'))
                                    <ul class="nav nav-treeview">
                                        <x-sidebar-list :linkActive="Route::is('module.city.*') ? true : false"
                                            route="module.city.index" icon="fas fa-circle">
                                            {{ __('Country') }}
                                        </x-sidebar-list>
                                    </ul>
                                @endif
                                @if (userCan('town.view'))
                                    <ul class="nav nav-treeview">
                                        <x-sidebar-list :linkActive="Route::is('module.town.*') ? true : false"
                                            route="module.town.index" icon="fas fa-circle">
                                            {{ __('Region') }}
                                        </x-sidebar-list>
                                    </ul>
                                @endif
                            @endif
                        </x-sidebar-dropdown>
                    @endif
                @endif

                {{-- Customer --}}
                @if (Module::collections()->has('Customer') && userCan('customer.view'))
                    <li class="nav-item">
                        <a href="{{ route('module.customer.index') }}"
                            class="nav-link {{ Route::is('module.customer.*') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>{{ __('customer') }}</p>
                        </a>
                    </li>
                @endif

                {{-- Plan --}}
                @if (Module::collections()->has('Plan') && userCan('plan.view') && $priceplan_enable)
                    <x-sidebar-list
                        :linkActive="Route::is('module.plan.index') || Route::is('module.plan.create') ? true : false"
                        route="module.plan.index" icon="fas fa-money-check">
                        {{ __('pricing_plan') }}
                    </x-sidebar-list>
                @endif

                {{-- Blog and Tag --}}
                @if (Module::collections()->has('Blog'))
                    @if ($blog_enable)
                        @if (userCan('post.view') || userCan('postcategory.view'))
                            <x-sidebar-dropdown
                                :linkActive="Route::is('module.post.*') || Route::is('module.postcategory.*') || Route::is('blog.comment') ? true : false"
                                :subLinkActive="Route::is('module.post.*') || Route::is('module.postcategory.*') || Route::is('blog.comment') ? true : false"
                                icon="fas fa-blog">
                                @slot('title')
                                    {{ __('blog') }}
                                @endslot

                                @if (userCan('postcategory.view'))
                                    <ul class="nav nav-treeview">
                                        <x-sidebar-list :linkActive="Route::is('module.postcategory.*') ? true : false"
                                            route="module.postcategory.index" icon="fas fa-circle">
                                            {{ __('post_category') }}
                                        </x-sidebar-list>
                                    </ul>
                                @endif
                                @if (userCan('post.view'))
                                    <ul class="nav nav-treeview">
                                        <x-sidebar-list :linkActive="Route::is('module.post.*') ? true : false"
                                            route="module.post.index" icon="fas fa-circle">
                                            {{ __('post') }}
                                        </x-sidebar-list>
                                    </ul>
                                @endif
                                
                                <ul class="nav nav-treeview">
                                    <x-sidebar-list :linkActive="Route::is('blog.comment') ? true : false" route="blog.comment" icon="fas fa-circle">
                                        {{ __('Blog Comment') }}
                                    </x-sidebar-list>
                                </ul>
                            </x-sidebar-dropdown>
                        @endif
                    @endif
                @endif

                {{-- Testimonial, contact, faqcategory and faq --}}
                @if (userCan('testimonial.view') || userCan('contact.view') || userCan('faqcategory.view') || userCan('faq.view'))
                    @if ($testimonial_enable || $contact_enable || $faq_enable)
                        <x-sidebar-dropdown
                            :linkActive="Route::is('module.testimonial.*') || Route::is('module.contact.*') || Route::is('module.faq.category.*') || Route::is('module.faq.*') ? true : false"
                            :subLinkActive="Route::is('module.testimonial.*') || Route::is('module.contact.*') || Route::is('module.faq.category.*') || Route::is('module.faq.*') ? true : false"
                            icon="far fa-list-alt">
                            @slot('title')
                                {{ __('others') }}
                            @endslot

                            {{--@if (Module::collections()->has('Testimonial') && userCan('testimonial.view') && $testimonial_enable)
                                <ul class="nav nav-treeview">
                                    <x-sidebar-list :linkActive="Route::is('module.testimonial.*') ? true : false"
                                        route="module.testimonial.index" icon="fas fa-circle">
                                        {{ __('testimonial') }}
                                    </x-sidebar-list>
                                </ul>
                            @endif --}}
                            @if (Module::collections()->has('Contact') && userCan('contact.view') && $contact_enable)
                                <ul class="nav nav-treeview">
                                    <x-sidebar-list :linkActive="Route::is('module.contact.*') ? true : false"
                                        route="module.contact.index" icon="fas fa-circle">
                                        {{ __('contact') }}
                                    </x-sidebar-list>
                                </ul>
                            @endif
                            @if (userCan('faqcategory.view') && $faq_enable)
                                <ul class="nav nav-treeview">
                                    <x-sidebar-list :linkActive="Route::is('module.faq.category.*') ? true : false"
                                        route="module.faq.category.index" icon="fas fa-circle">
                                        {{ __('faq_category') }}
                                    </x-sidebar-list>
                                </ul>
                            @endif
                            @if (userCan('faq.view') && $faq_enable)
                                <ul class="nav nav-treeview">
                                    <x-sidebar-list :linkActive="Route::is('module.faq.*') ? true : false"
                                        route="module.faq.index" icon="fas fa-circle">
                                        {{ __('faq') }}
                                    </x-sidebar-list>
                                </ul>
                            @endif
                        </x-sidebar-dropdown>
                    @endif
                @endif

                {{-- Admin --}}
                @if (userCan('admin.view') || userCan('role.view'))
                    <x-sidebar-dropdown :linkActive="Route::is('role.*') || Route::is('user.*') ? true : false"
                        :subLinkActive="Route::is('role.*') || Route::is('user.*') ? true : false" icon="fas fa-lock">
                        @slot('title')
                            {{ __('user_role_manage') }}
                        @endslot

                        @if (userCan('admin.view'))
                            <ul class="nav nav-treeview">
                                <x-sidebar-list :linkActive="Route::is('user.*') ? true : false" route="user.index"
                                    icon="fas fa-circle">
                                    {{ __('all_users') }}
                                </x-sidebar-list>
                            </ul>
                        @endif
                        @if (userCan('role.view'))
                            <ul class="nav nav-treeview">
                                <x-sidebar-list :linkActive="Route::is('role.*') ? true : false" route="role.index"
                                    icon="fas fa-circle">
                                    {{ __('all_roles') }}
                                </x-sidebar-list>
                            </ul>
                        @endif
                    </x-sidebar-dropdown>
                @endif

                {{-- Setting --}}
                @if (userCan('setting.view'))
                    <x-sidebar-dropdown
                        :linkActive="Route::is('language.*') || request()->is('admin/settings*') || Route::is('module.themes.index') || Route::is('module.currency.*') || Route::is('admin.ads.show') ? true : false"
                        :subLinkActive="Route::is('language.*') || request()->is('admin/settings*') || Route::is('module.themes.index') || Route::is('module.currency.*') || Route::is('admin.ads.show') ? true : false"
                        icon="fas fa-cog">
                        @slot('title')
                            {{ __('settings') }}
                        @endslot
                        <!-- @if ($appearance_enable)
                            <ul class="nav nav-treeview">
                                <x-sidebar-list :linkActive="Route::is('module.themes.index') ? true : false"
                                    route="module.themes.index" icon="fas fa-circle">
                                    {{ __('skins') }}
                                </x-sidebar-list>
                            </ul>
                        @endif -->
                        <!-- <ul class="nav nav-treeview">
                            <x-sidebar-list :linkActive="Route::is('module.currency.*') ? true : false"
                                route="module.currency.index" icon="fas fa-circle">
                                {{ __('currency') }}
                            </x-sidebar-list>
                        </ul>
                        @if ($language_enable)
                            <ul class="nav nav-treeview">
                                <x-sidebar-list :linkActive="Route::is('language.*') ? true : false"
                                    route="language.index" icon="fas fa-circle">
                                    {{ __('language') }}
                                </x-sidebar-list>
                            </ul>
                        @endif -->
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('setting', 'website') }}"
                                    class="nav-link {{ request()->is('admin/settings*') || Route::is('module.currency.*') || Route::is('admin.ads.show') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>{{ __('Web Setting') }}</p>
                                </a>
                            </li>
                        </ul>
                    </x-sidebar-dropdown>
                @endif
                @if ($settings->ads_admin_approval)
                    <form action="{{ route('module.ad.index') }}" method="GET" id="pending_ads_form">
                        <input name="filter_by" type="text" value="pending" hidden>
                        <input name="sort_by" type="text" value="latest" hidden>
                    </form>
                    <button onclick="$('#pending_ads_form').submit();" type="button"
                        class="btn btn-primary mt-4 mx-3 text-white">
                        {{ __('pending_ads') }}
                    </button>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
