<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">HandyMan</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <li class="nav-item dropdown">
                 <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
                 </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
    
        </div>
           </li>
           @php $locale = session()->get('locale'); @endphp
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        @switch($locale)
            @case('en')
            <img src="{{asset('images/flag/en.png')}}" width="25px"> English
            @break
            @case('fr')
            <img src="{{asset('images/flag/fr.png')}}" width="25px"> Français
            @break
            @default
            <img src="{{asset('images/flag/en.png')}}" width="25px"> English
        @endswitch
        <span class="caret"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="lang/en"><img src="{{asset('images/flag/en.png')}}" width="25px"> English</a>
        <a class="dropdown-item" href="lang/fr"><img src="{{asset('images/flag/fr.png')}}" width="25px"> Français</a>
    </div>
</li>

   <script>
    
    function changeLanguage(lang){
        window.location='{{url("change-language")}}/'+lang;
    }
    </script>
    
            <!-- Navbar-->
        <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                     {{ Auth::user()->name }}
                </a>
                <a class="btn btn-primary btn-block" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                     logout 
                </a>
 
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>

                

</nav>