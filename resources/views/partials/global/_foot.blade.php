        @if (app()->env == 'production')
            <script src="/js/vendor.min.js"></script>
            <script src="/js/main.min.js"></script>
        @else
            <script src="/js/vendor.js"></script>
            <script src="/js/main.js"></script>
        @endif

        @include('partials.global.php-to-js')

        @if (app()->env === 'production')
            @include('partials.google-analytics')
        @endif

        @yield('additional-scripts')

 	</body>
</html>