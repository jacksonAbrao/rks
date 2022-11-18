@include('painel.includes.header')
    <main class="dashboard">
        @include('painel.includes.sidebar')

        <div class="content content_painel">
            <div class="d-flex d-column w-100">
                @yield('content')
            </div>
        </div>
    </main>
</body>
</html>