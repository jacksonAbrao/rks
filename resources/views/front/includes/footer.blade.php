<?php
    if(!isset($menu_active)){
        $menu_active = '';
    }
?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <a href="{{ url('/') }}">
                    <img src="{{asset('assets/img/logo.png')}}" class="img-centered">
                </a>
            </div>

            <div class="col-lg-3"></div>

            <div class="col-lg-2">
                <div class="list-menu">
                    <p class="semibold">Institucional</p>
                    <ul>
                        <li><a href="{{ url('/nossa-historia') }}">Quem Somos</a></li>
                        <li><a href="#">Trabalhe Conosco</a></li>
                        <li class="<?php if ($menu_active == 'contato') { echo 'active'; }?>"><a href="{{ url('/contato') }}">Contato</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="list-menu">
                    <p class="semibold">Funcionalidades</p>
                    <ul>
                        <li><a href="#">Primeiros Passos</a></li>
                        <li><a href="#">Documentação</a></li>
                        <li><a href="#">Solicitar Ajuda</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="list-menu">
                    <p class="semibold">Transparência</p>
                    <ul>
                        <li><a href="#">Termo de Uso</a></li>
                        <li><a href="#">Contrato</a></li>
                        <li><a href="#">Política de Privacidade</a></li>
                        <li><a href="#">Datacenter e Segurança</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row margint90">
            <div class="col-lg-5">
                <p class="t-h5 semibold"><a href="tel:6232223100" target="_blank" class="link">(62) 3222-3100</a></p>
            </div>

            <div class="col-lg-4 buttons">
                <a href="#" target="_blank">
                    <img src="{{asset('assets/img/icons/download-google.svg')}}">
                </a>

                <a href="#" target="_blank">
                    <img src="{{asset('assets/img/icons/download-apple.svg')}}">
                </a>
            </div>

            <div class="col-lg-3">
                <div class="social">
                    <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter-square"></i></a>
                </div>
            </div>
        </div>

        <div class="row margint60 text-center">
            <div class="col-lg-12">
                <p class="t-copy c-white opacity8">&copy; Copyright, Todos os direitos reservados
                    <strong>Liga</strong>
                </p>
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
</body>

</html>
