{{-- Sidebar --}}
<div class="app-sidebar">
    <div class="logo">
        <a class="logo-icon" href="{{ route('cms.dashboard') }}">
            <span class="logo-text">{{ __('general.words.cms') }}</span>
        </a>
        <div class="sidebar-user-switcher user-activity-online">
            <a href="#">
                <img class="rounded-circle" src="{{ administrator()->avatar_path }}" alt="Administrator Avatar">
                <span class="activity-indicator"></span>
                <span class="user-info-text">{{ administrator()->name }}<br>
                    <span class="user-state-info">{{ __('auth.profile.subtitle') }}</span>
                </span>
            </a>
        </div>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                {{ __('general.words.main') }}
            </li>
            <li class="{{ $sidebar['dashboard'] ?? '' }}">
                <a href="{{ route('cms.dashboard') }}">
                    <i class="material-icons text-dark">dashboard</i>
                    {{ __('general.words.dashboard') }}
                </a>
            </li>
            <li class="sidebar-title">
                {{ __('general.words.master') }}
            </li>
            <li class="{{ $sidebar['administrators'] ?? '' }}">
                <a href="{{ route('cms.administrators.index') }}">
                    <i class="material-icons text-dark">people</i>
                    {{ __('general.words.administrators') }}
                </a>
            </li>
            <li class="{{ $sidebar['customers'] ?? '' }}">
                <a href="{{ route('cms.customers.index') }}">
                    <i class="material-icons text-dark">people</i>
                    {{ __('general.words.customers') }}
                </a>
            </li>
            <li class="">
                <a href="">
                    <i class="material-icons text-dark">image</i> Dropdown
                    <i class="material-icons has-sub-menu">keyboard_arrow_right</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a class="" href="#">
                            Sub Menu
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Other Sub Menu
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-title">
                {{ __('general.words.other') }}
            </li>
            <li>
                <a data-type="link" href="{{ route('cms.logout.process') }}" onclick="swalConfirm(event)">
                    <i class="material-icons text-dark pointer-events-none">power_settings_new</i>
                    {{ __('auth.logout.word') }}
                </a>
            </li>
        </ul>
    </div>
</div>
