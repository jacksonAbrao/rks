@include('painel.includes.header_deslogado')

<div class="container">
    <div class="row justify-center">
        <div class="col-lg-6">
            <div class="cardLogin">
                <a href="{{route('home.painel')}}" class="logo text-center">
                    <img src="{{asset('assets/img/logos/Colorida-black.png')}}">
                </a>
                <p class="text-center margint20 bold t-h6">Faça login em sua conta</p>
                <div class="container-login">
                    <form class="formValidate formAjax" id="loginform" method="POST" action="{{ route('fazer.login.painel') }}" data-redirect="{{route('home.painel')}}" no-process="true">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="user" class="medium">Digite seu E-mail<span class="required">*</span></label>
                            <input class="form-control" data-error="Email inválido" placeholder="meuemail@email.com" id="usuario" name="user" type="email" required="">
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group group-icon">
                            <label for="password" class="medium">Digite sua senha<span class="required">*</span></label>
                            <input class="form-control" data-minlength="6" data-error="Senha com mínimo de 6 caracteres" placeholder="" name="password" id="password" type="password" required="">
                            <div class="password-strength__visibility" data-element="#password">
                                <span class="password-strength__visibility-icon">
                                    <i class="fas fa-eye-slash"></i>
                                </span>
                                <span class="password-strength__visibility-icon js-hidden">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <label class="form-check-label" for="manterConectado">
                                        Mantenha-me conectado
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="manter-conectado" value="1" id="manterConectado">
                                </div>
                            </div>

                            <div class="col-6 text-end">
                                <p class="t-copy"><a href="{{url('/esqueci-minha-senha')}}" class="underline">Esqueci minha senha</a></p>
                            </div>
                        </div>

                        <button class="btn btn-primary margint20" type="submit">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<script>
    $('.password-strength__visibility').click(function() {
        var element = $($(this).attr('data-element'));

        if (element.attr('type') === 'password') {
            $(this).addClass('clicked');
            element.attr('type', 'text');
        } else {
            $(this).removeClass('clicked');
            element.attr('type', 'password');
        }
    });
</script>
</body>
</html>