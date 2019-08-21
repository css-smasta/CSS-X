<footer class="mt-3 container mb-3">
    <div class="row">
        <div class="col-2">
            @if (@session('themeMode') == 'dark')
                <img style="max-width: 100%;" src="{{asset('img/cssx-white.png')}}" alt="">
            @else
                @if(@session('themeMode') == 'light')
                    <img style="max-width: 100%;" src="{{asset('img/cssx-black.png')}}" alt="">
                @else
                    <img style="max-width: 100%;" src="{{asset('img/cssx-white.png')}}" alt="">
                @endif
            @endif
        </div>
        <div class="col-10">
            <h1>CSS-X E-Learning Platform</h1>
            <p class="text-muted">
                &copy; Computer Science Smasta. All rights reserved. <br>
                Source Code Tersedia Di Laman <a href="#">Github</a>. Artwork by <a href="https://instagram.com/simple_vann"><i class="fab fa-instagram"></i> simple_vann</a>
            </p>
        </div>
    </div>
</footer>
