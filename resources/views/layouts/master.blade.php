<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
            <div class="header_img dropdown">
                <img class="dropdown-toggle" src="https://www.kindpng.com/picc/m/269-2697881_computer-icons-user-clip-art-transparent-png-icon.png" style="cursor:pointer" alt="" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{url('user/profile')}}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Signout</a></li>
                </ul>
            </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div id="main-menu">
                    <a href="{{url('/dashboard')}}" class="nav_logo">
                        <i class='bx bx-layer nav_logo-icon'></i>
                        <span class="nav_logo-name">Logo</span>
                    </a>
                    <div class="nav_list">
                        <a href="{{url('/dashboard')}}" class="nav_link  @if(Request::is('dashboard')) active @endif">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span>
                        </a>
                    </div>
                    <div class="nav_list">
                        <a href="{{url('/category/list')}}" class="nav_link @if(Request::is('category/*')) active @endif">
                            <i class='bx bx-copy-alt nav_icon'></i>
                            <span class="nav_name">Category</span>
                        </a>
                    </div>
                    <div class="nav_list">
                        <a href="{{url('/material/list')}}" class="nav_link  @if(Request::is('material/*')) active @endif">
                            <i class='bx bx-slider nav_icon'></i>
                            <span class="nav_name">Material</span>
                        </a>
                    </div>
                    <div class="nav_list">
                        <a href="{{url('/manage-material/add')}}" class="nav_link  @if(Request::is('manage-material/add')) active @endif">
                            <i class='bx bx-store nav_icon'></i>
                            <span class="nav_name">Add Inward Outward</span>
                        </a>
                    </div>
                    <div class="nav_list">
                        <a href="{{url('/manage-material/list')}}" class="nav_link  @if(Request::is('manage-material/list')) active @endif">
                            <i class='bx bx-command nav_icon'></i>
                            <span class="nav_name">Manage material</span>
                        </a>
                    </div>
                </div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav_link">
                    <i class='bx bx-log-out nav_icon'></i>
                    <span class="nav_name">SignOut</span>
                </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <div class="mt-5">
                @yield('body')
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
        @stack('script')
    </body>
</html>