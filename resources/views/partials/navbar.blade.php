<nav class="bg-gray-100 p-4">
    <div class="container mx-auto sm:px-4 flex flex-col sm:flex-row items-center justify-between">
        <a href="/" class="inline-block pt-1 pb-1 text-lg whitespace-no-wrap">
            <img src="{{ asset('images/logo2.jpg') }}" class="h-16 rounded-full" alt="Logo">
        </a>

        <div class="flex flex-col sm:flex-row items-center w-full" id="navbarSupportedContent">
            <ul class="flex flex-wrap list-reset pl-0 mb-2 sm:mb-0">
                <li class="{{ Request::is('videos/index') ? 'active' : '' }}">
                    <a href="{{ url('videos/index') }}" class="inline-flex items-center p-2 no-underline">
                        <i class="fa fa-video-camera mr-2" aria-hidden="true"></i>
                        Videos
                    </a>
                </li>
                <li class="{{ Request::is('fotos/index') ? 'active' : '' }}">
                    <a href="{{ url('fotos/index') }}" class="inline-flex items-center p-2 no-underline">
                        <i class="fa fa-camera mr-2" aria-hidden="true"></i>
                        Fotos
                    </a>
                </li>
                <li class="{{ Request::is('/mapas/index') ? 'active' : '' }}">
                    <a href="{{ url('/mapas/index') }}" class="inline-flex items-center p-2 no-underline">
                        <i class="fa fa-comments mr-2" aria-hidden="true"></i>
                        Chats
                    </a>
                </li>
                <li class="{{ Request::is('productos/index') ? 'active' : '' }}">
                    <a href="{{ url('productos/index') }}" class="inline-flex items-center p-2 no-underline">
                        <i class="fa fa-shopping-bag mr-2" aria-hidden="true"></i>
                        Merchandising
                    </a>
                </li>
            </ul>

            <ul class="flex flex-wrap list-reset  pl-0 mb-0 ml-auto">
                <li class="">
                    <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                        {{ csrf_field() }}
                        <button type="submit"
                            class="inline-flex items-center p-2 text-blue-700 bg-transparent border rounded">
                            @if (Auth::check())
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            @endif
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">