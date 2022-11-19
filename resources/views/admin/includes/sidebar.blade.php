<div class="sidebar-menu hidden-m accordion sidebar-accordion">
    <ul>
        <li class="c-white btn-sidebar">
            <button class="auxiliar fixar-sidebar" data-bs-toggle="tooltip" data-bs-placement="right"
                title="Fixar sidebar">
                <i class="far fa-angle-right"></i>
            </button>
            <div class="d-flex flex-column case-perfil">
                <p class="t-link c-white max_line max_line_1">Olá, {{ session('usuarioNome', '')}}</p>
            </div>
        </li>
        @include('admin.includes.lista_menu')
    </ul>
</div>


<script>
    $('.fixar-sidebar').on('click', function() {
          $('.sidebar-menu').toggleClass('active');
          $('.dashboard').toggleClass('active');
      });
</script>