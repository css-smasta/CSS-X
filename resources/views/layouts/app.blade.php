@include("layouts.includes.header")
    <div id="app">
        <main class="main-content">
            @include('layouts.includes.navbar')
            <div class="pt-5">
                <div style="height: 50px;"></div>
               @yield('content')
           </div>

            <div style="margin-top: 100px;"></div>
            <hr>
            @include("layouts.includes.footer")
        </main>
    </div>
@include("layouts.includes.footer-script")
