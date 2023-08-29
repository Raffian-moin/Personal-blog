<!-- Start main left sidebar menu -->
    <div class="main-sidebar sidebar-style-3">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index-2.html">CodiePie</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="index-2.html">CP</a>
            </div>
            <ul class="sidebar-menu">
                <li class="{{ Route::currentRouteName() === 'tags.index' ? 'bg-warning' : '' }}"><a class="nav-link" href={{ route('tags.index'); }}> <span>Tags</span></a></li>
            </ul>
        </aside>
    </div>
