    <footer class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ url('/') }}">
                        <img src="{{asset('assets/img/logo-footer.svg')}}" class="img-centered">
                    </a>
                </div>
            </div>
            <div class="row margint40 margintm30">
                <div class="col-lg-12">
                    <ul>
                        {{-- <li><a href="{{ url('/nossa-historia') }}">Nossa História</a></li> --}}
                        {{-- <li><a href="{{ url('/vagas') }}">Vagas</a></li> --}}
                        <li><a href="{{ route('termos-de-uso') }}">Termos de Uso</a></li>
                        <li><a href="{{ route('politica-de-privacidade') }}">Política de Privacidade</a></li>
                        {{-- <li><a href="{{ url('/suporte') }}">Suporte</a></li> --}}
                        {{-- <li><a href="{{ url('/contato') }}">Contato</a></li> --}}
                    </ul>

                    <ul>
                        <li><a href="#proposito">Propósito</a></li>
                        <li><a href="#diferenciais">Diferenciais</a></li>
                        <li><a href="#como-funciona">Como Funciona</a></li>
                        <li><a href="#cases">Cases</a></li>
                        <li><a href="#planos">Planos</a></li>
                        <li><a href="#duvidas">Dúvidas</a></li>
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                    </ul>
                </div>
            </div>


            <div class="row margint40">
                <div class="col-lg-12">
                    <div class="social">
                        <a href="https://youtube.com" target="_blank"><i class="icon-YoutubeLogo c-mid-blue"></i></a>
                        <a href="https://instagram.com" target="_blank"><i class="icon-InstagramLogo c-mid-blue"></i></a>
                        <a href="https://linkedin.com" target="_blank"><i class="icon-LinkedinLogo c-mid-blue"></i></a>
                        <a href="https://facebook.com" target="_blank"><i class="icon-FacebookLogo c-mid-blue"></i></a>
                        <a href="https://twitter.com" target="_blank"><i class="icon-TwitterLogo c-mid-blue"></i></a>

                        {{-- <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-square"></i></a>
                        <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter-square"></i></a> --}}
                    </div>
                </div>
            </div>

            <div class="row margint40">
                <div class="col-lg-12">
                    <p class="t-copy c-mid-blue opacity8">&copy; Copyright, Todos os direitos reservados <strong>4Selet</strong></p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script type="text/javascript">
        var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};
        var hamburgers = document.querySelectorAll(".hamburger");
        if (hamburgers.length > 0) {
            forEach(hamburgers, function(hamburger) {
                hamburger.addEventListener("click", function() {
                    this.classList.toggle("is-active");
                }, false);
            });
        }

        AOS.init({
            offset: 50,
            once: true,
        });
    </script>
