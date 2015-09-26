        @if (app()->env == 'production')
            <script src="/js/vendor.min.js"></script>
            <script src="/js/main.min.js"></script>
        @else
            <script src="/js/vendor.js"></script>
            <script src="/js/main.js"></script>
        @endif

        @include('partials.global.php-to-js')

        @yield('additional-scripts')

        <script>
        (function(d, p){
            var a = new XMLHttpRequest(),
                b = d.body;
            a.open("GET", p, true);
            a.send();
            a.onload = function(){
                var c = d.createElement("div");
                c.style.display = "none";
                c.innerHTML = a.responseText;
                b.insertBefore(c, b.childNodes[0]);
            }
        })(document, "https://cdn.plyr.io/1.3.3/sprite.svg");
        </script>

 	</body>
</html>