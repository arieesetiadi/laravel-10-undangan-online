<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Include Page Meta --}}
    @include('cms.layouts.meta')

    {{-- Include Styles --}}
    @include('cms.layouts.styles')

    <!-- Title -->
    <title>{{ $title ?? 'Title' }} | CMS {{ config('app.name') }}</title>
</head>

<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        {{-- Include Sidebar --}}
        @include('cms.layouts.sidebar')

        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search">
                    <i class="material-icons">close</i>
                </a>
            </div>

            {{-- Include Topbar --}}
            @include('cms.layouts.topbar')

            <div class="app-content">
                <div class="content-wrapper">
                    {{-- Content --}}
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{-- Include Modals --}}
    @include('cms.layouts.modals')

    {{-- Include Scripts --}}
    @include('cms.layouts.scripts')

    {{-- Include Sweet Alert --}}
    @include('cms.layouts.swals')
</body>

</html>
