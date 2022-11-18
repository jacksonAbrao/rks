<button class="btn_dark_mode">
    <i class="fas fa-moon"></i>
</button>
<button class="btn_light_mode">
    <i class="uil uil-sun"></i>
</button>

<script>
    $('.btn_dark_mode').on('click', function() {
        $('body').addClass('dark');
        $('body').removeClass('light');
        // atualizaTema('dark');
    });
    
    $('.btn_light_mode').on('click', function() {
        $('body').removeClass('dark');
        $('body').addClass('light');
        // atualizaTema('light');
    });

</script>