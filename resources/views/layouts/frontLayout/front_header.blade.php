<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-dark navbar-theme-primary headroom py-lg-2 px-lg-6">
        <div class="container">
            <a class="navbar-brand" href="/"><img class="navbar-brand-dark" src="{{asset('customer/images/logo.png')}}" alt="Logo light"> <img class="navbar-brand-light" 
                src="{{asset('customer/images/logo.png')}}" alt="Logo dark"></a>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            {{-- <a href="index.html"><img src="img/brand/primary.svg" alt="menuimage"></a> --}}
                        </div>
                        <div class="col-6 collapse-close">
                            <a href="#navbar_global" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"></a>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover ml-3">
                    <li class="nav-item"><a href="/" class="nav-link"><span class="nav-link-inner-text">Нүүр</span></a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><span class="nav-link-inner-text">Бидний тухай</span></a></li>
                    <li class="nav-item"><a href="/hotel" class="nav-link"><span class="nav-link-inner-text">Зочид буудлууд</span></a></li>
                    {{-- <li class="nav-item dropdown"><a href="#" class="nav-link" data-toggle="dropdown"><span class="nav-link-inner-text">Зочид буудлууд</span><i class="fas fa-angle-down nav-link-arrow"></i></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="./html/pages/single-space.html" class="dropdown-item">Space details</a></li>
                            <li class="nav-item"><a href="./html/pages/all-spaces.html" class="dropdown-item">Listing spaces</a></li>
                            <li class="nav-item"><a href="./html/pages/submit-space.html" class="dropdown-item">Submit space</a></li>
                            <li class="nav-item"><a href="./html/pages/profile.html" class="dropdown-item">Space owner</a></li>
                            <li class="nav-item"><a href="./html/pages/about.html" class="dropdown-item">About</a></li>
                            <li class="nav-item"><a href="./html/pages/contact.html" class="dropdown-item">Contact</a></li>
                            <li class="dropdown-submenu"><a href="#" class="dropdown-toggle dropdown-item d-flex justify-content-between align-items-center" aria-haspopup="true" aria-expanded="false">Authentication <i class="fas fa-angle-right nav-link-arrow"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="./html/pages/sign-in.html" class="dropdown-item">Sign In</a></li>
                                    <li><a href="./html/pages/sign-up.html" class="dropdown-item">Sign Up</a></li>
                                    <li><a href="./html/pages/forgot-password-request.html" class="dropdown-item">Forgot password</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a href="#" class="dropdown-toggle dropdown-item d-flex justify-content-between align-items-center" aria-haspopup="true" aria-expanded="false">Blog <i class="fas fa-angle-right nav-link-arrow"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="./html/pages/blog.html" class="dropdown-item">Articles</a></li>
                                    <li><a href="./html/pages/blog-single.html" class="dropdown-item">Single article</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a href="#" class="dropdown-toggle dropdown-item d-flex justify-content-between align-items-center" aria-haspopup="true" aria-expanded="false">Special pages <i class="fas fa-angle-right nav-link-arrow"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="./html/pages/coming-soon.html" class="dropdown-item">Coming Soon</a></li>
                                    <li><a href="./html/pages/legal.html" class="dropdown-item">Legal page</a></li>
                                    <li><a href="./html/pages/404.html" class="dropdown-item">404 page</a></li>
                                    <li><a href="./html/pages/500.html" class="dropdown-item">500 page</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="nav-item"><a href="#" class="nav-link" >
                        <span class="nav-link-inner-text">Холбоо барих</span>
                        {{-- <i class="fas fa-angle-down nav-link-arrow"></i> --}}
                    </a>
                        {{-- <div class="dropdown-menu dropdown-menu-lg">
                            <div class="col-auto px-0" data-dropdown-content>
                                <div class="list-group list-group-flush"><a href="docs/introduction.html" class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4"><span class="icon icon-sm icon-tertiary"><i class="fas fa-file-alt"></i></span><div class="ml-4"><span class="text-dark d-block">Documentation<span class="badge badge-sm badge-tertiary ml-2">v1.1</span></span> <span class="small">Components and setup</span></div></a><a href="https://themesberg.com/contact" target="_blank" class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4"><span class="icon icon-sm icon-primary"><i class="fas fa-microphone-alt"></i></span><div class="ml-4"><span class="text-dark d-block">Support</span> <span class="small">Looking for answers? Ask us!</span></div></a></div>
                            </div>
                        </div> --}}
                    </li>
                </ul>
            </div>
            <div class="d-none d-lg-block"><a href="#" class="btn btn-sm btn-primary animate-up-1 ml-3">Нэвтрэх</a> <a href="#" class="btn btn-sm btn-white animate-up-1 ml-3">Бүртгүүлэх</a> <a href="./html/pages/submit-space.html" class="btn btn-sm btn-outline-white ml-3"><i class="fas fa-plus mr-2"></i>Буудал нэмэх</a></div>
            <div class="d-flex align-items-center">
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </div>
        </div>
    </nav>
</header>