<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        @hasSection('title')
        {{config('app.name')}} - @yield('title')
        @else
        {{config('app.name')}}
        @endif
    </title>

    <?php
        if(!isset($menu_active)){
            $menu_active = '';
        }
    ?>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{---------------- tiny-slider ----------------}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <!--[if (lt IE 9)]><script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.helper.ie8.js"></script><![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
    <!-- NOTE: prior to v2.2.1 tiny-slider.js need to be in <body> -->
    {{---------------- tiny-slider ----------------}}

    <link rel="stylesheet" href="{{asset('assets/css/default.css')}}?v=1.3">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}?v=1.3">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="{{asset('assets/js/validator.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.maskMoney.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js" integrity="sha512-nKZDK+ztK6Ug+2B6DZx+QtgeyAmo9YThZob8O3xgjqhw2IVQdAITFasl/jqbyDwclMkLXFOZRiytnUrXk/PM6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('assets/js/requisicaoformulario.js')}}?v=1.2"></script>

    <script src="{{asset('assets/js/main.js')}}?v=1.1"></script>

    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">
    <meta name="format-detection" content="telephone=no">
</head>

<body>

    <nav class="navbar navbar-expand-xl bg-blue navbar-update-scroll fixed-top">
        <div class="container">
            <div class="row d-flex align-center">
                <div class="col-xl-2">
                    <div class="align-m-menu">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{asset('assets/img/logo.png')}}" class="w-100">
                        </a>

                        <div class="hamburger hamburger--spring-r visible-lg" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-1"></div>

                <div class="col-xl-9">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form class="searchform" action="">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Digite o evento que você procura">
                                <button type="submit"><img src="{{asset('assets/img/icons/topo-searchform.svg')}}"></button>
                            </div>
                        </form>

                        <form class="locationform" action="">
                            <div class="form-group">
                                <select class="form-control">
                                    <option selected disabled value="">Filtrar por Cidade</option>
                                    <option value="goiania">Goiânia/GO</option>
                                    <option value="anapolis">Anápolis/GO</option>
                                    <option value="rio-verde">Rio Verde/GO</option>
                                    <option value="palmas">Palmas/TO</option>
                                </select>
                            </div>
                        </form>

                        <a href="" class="btn btn-pink">Experimente já</a>

                        <a href="" class="link">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>