<style>
    .navbar {
        background-color: #222222;
        font-family: 'Open Sans', sans-serif;
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 2rem;
        color: #ffffff;
        text-transform: uppercase;
    }

    .nav-link {
        color: #ffffff;
        font-size: 1.2rem;
        margin-left: 1.5rem;
        position: relative;
        text-decoration: none;
    }

    .nav-link:hover {
        color: #ff9900;
        text-decoration: none;
    }

    .nav-link::before {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -2px;
        left: 0;
        background-color: #ff9900;
        visibility: hidden;
        transition: all 0.3s ease-in-out;
    }

    .nav-link:hover::before {
        visibility: visible;
        width: 100%;
    }

    .dropdown-menu {
        background-color: #222222;
    }

    .dropdown-item {
        color: #ffffff;
    }

    .dropdown-item:hover {
        color: #ff9900;
        background-color: #222222;
    }

    .navbar-toggler-icon {
        background-image: url('https://cdn4.iconfinder.com/data/icons/wirecons-free-vector-icons/32/menu-alt-512.png');
        background-size: cover;
    }

    @media (max-width: 991.98px) {
        .navbar-collapse {
            background-color: #222222;
            position: absolute;
            top: 4rem;
            right: 0;
            left: 0;
            z-index: 99;
        }

        .navbar-nav {
            margin: auto;
            display: block;
            text-align: center;
        }

        .nav-link {
            margin: 1rem 0;
            font-size: 1.5rem;
            position: relative;
            text-decoration: none;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #ff9900;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
        }

        .nav-link:hover::before {
            visibility: visible;
            width: 100%;
        }

        .navbar-toggler-icon {
            background-image: url('https://cdn4.iconfinder.com/data/icons/wirecons-free-vector-icons/32/menu-alt-512.png');
            background-size: cover;
        }
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">TOBA AGRO</a>
        <div class="search-bar">
            <form action="" method="GET">
                @csrf
                <div class="input-group">
                    <input type="search" class="form-control" id="search_product" name="product_name" placeholder="Search products" aria-describedby="basic-addon1">
                    <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('cart') }}">Cart</a>
                </li>
                @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{url('my-orders')}}">
                                My Orders
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Register</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>