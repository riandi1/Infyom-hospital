<link href="{{ mix('assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
<div class="sidebar">
    <div class="wrap">
        <div class="search center">
            <input type="text" class="searchTerm" id="searchText" placeholder="Search Menu" autocomplete="off">
            <i class="fas fa-times close-sign"></i>
            <span class="searchButton">
                <i class="fa fa-search"></i>
            </span>
        </div>
        <div class="no-results">No matching records found</div>
    </div>
    <nav class="sidebar-nav">
        <ul class="nav">
            @include('layouts.menu')
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/sidebar_menu_search/sidebar_menu_search.js') }}"></script>
