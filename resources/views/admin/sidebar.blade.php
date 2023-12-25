<!-- Start main left sidebar menu -->
    <div class="main-sidebar sidebar-style-3">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index-2.html">Personal Blog</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="index-2.html">CP</a>
            </div>
            <ul class="sidebar-menu">
                <li class="{{ str_contains(Route::currentRouteName(), 'tags') ? 'bg-warning' : '' }}"><a class="nav-link" href={{ route('tags.index'); }}> <span>Tags</span></a></li>
                <li class="{{ str_contains(Route::currentRouteName(), 'categories') ? 'bg-warning' : '' }}"><a class="nav-link" href={{ route('categories.index'); }}> <span>Categories</span></a></li>
                <li class="{{ str_contains(Route::currentRouteName(), 'posts') ? 'bg-warning' : '' }}"><a class="nav-link" href={{ route('posts.index'); }}> <span>Posts</span></a></li>
                <li class="{{ str_contains(Route::currentRouteName(), 'settings') ? 'bg-warning' : '' }}"><a class="nav-link" href={{ route('settings.create'); }}> <span>Settings</span></a></li>
            </ul>
        </aside>
    </div>
