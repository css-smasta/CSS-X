@include("layouts.includes.header")
    <div id="app">
        <main class="main-content">
            @include('layouts.includes.navbar')
           <div class="mt-4">
               @yield('content')
           </div>

            <div style="margin-top: 100px;"></div>
            <hr>
            @include("layouts.includes.footer")
        </main>
    </div>
@include("layouts.includes.footer-script")
