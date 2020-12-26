<header>
    <div class="container-fluid position-relative no-side-padding">

        <a href="#" class="logo"><img src="asset/frontend/images/logo.png" alt="Logo Image"></a>

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>
        <nav>
            <ul class="main-menu" id="main-menu">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('all.posts')}}">Posts</a></li>
                @guest
                    <li><a href="{{route('login')}}">Login</a></li>
                @else
                    @if(Auth::user()->role_id == 1)
                        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    @endif
                    @if(Auth::user()->role_id == 2)
                        <li><a href="{{route('author.dashboard')}}">Dashboard</a></li>
                    @endif
                @endguest
            </ul>
        </nav>
        <div class="src-area">
            <form action="{{route('search')}}" method="GET">
                <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                <input class="src-input" name="query" type="text" placeholder="Type of search">
            </form>
        </div>

    </div><!-- conatiner -->
</header>