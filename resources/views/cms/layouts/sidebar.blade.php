{{-- Sidebar --}}
<div class="app-sidebar">
    <div class="logo">
        <a href="{{ route('cms.dashboard') }}" class="logo-icon">
            <span class="logo-text">CMS</span>
        </a>
        <div class="sidebar-user-switcher user-activity-online">
            <a href="{{ route('cms.profile.index') }}">
                <img class="rounded-circle" src="{{ administrator()->avatar_path }}">
                <span class="activity-indicator"></span>
                <span class="user-info-text">{{ administrator()->name }}<br>
                    <span class="user-state-info">Administrator</span>
                </span>
            </a>
        </div>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Main
            </li>
            <li class="{{ $sidebar['dashboard'] ?? '' }}">
                <a href="{{ route('cms.dashboard') }}">
                    <i class="material-icons-outlined text-dark">dashboard</i> Dashboard
                </a>
            </li>
            <li class="sidebar-title">
                Master
            </li>
            <li class="{{ $sidebar['administrator'] ?? '' }}">
                <a href="{{ route('cms.administrator.index') }}">
                    <i class="material-icons-outlined text-dark">people</i> Administrators
                </a>
            </li>
            <li class="">
                <a href="">
                    <i class="material-icons-outlined text-dark">image</i> Dropdown
                    <i class="material-icons has-sub-menu">keyboard_arrow_right</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="#" class="">
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
                Other
            </li>
            <li>
                <a href="{{ route('cms.logout.process') }}" data-type="link" onclick="swalConfirm(event)">
                    <i class="material-icons-outlined text-dark pointer-events-none">power_settings_new</i> Logout
                </a>
            </li>
        </ul>
    </div>
</div>
