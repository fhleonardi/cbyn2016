<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Congreso Bromatologia y Nutricion - CByN">
    <meta name="author" content="Facultad de Bromatologia">
    <meta name="msvalidate.01" content="E84984FC827549DAB52C07799E9C8A94"/>
    <meta name="google-site-verification" content="4tD7RpfeKtdIYn_w7lMIVtPAwqBv9dxOpNp27jMEFCg"/>
    <meta name="keywords"
          content="congreso de bromatologia y nutricion,cbyn,bromatologia,nutricion,gualeguaychu,gastronomia,congreso,universidad nacional de entre rios, cientifico,alimentos,calidad alimentaria,salud,politicas publicas,Soberania Alimentaria, Seguridad Alimentaria">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="shortcut icon" href="{{ asset('img/favicon.png')}}" type="image/png" />
    <link rel="icon" href="{{ asset('img/favicon.png')}}" type="image/png" />

    <title>Congreso de Bromatologia y Nutricion - CByN - Facultad de Bromatologia - UNER</title>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-84124516-1', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- Bootstrap Core CSS -->
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/pure-release-0.6.0/forms-min.css') !!}
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    {!! Html::style('assets/css/social.css') !!}
<!-- Custom CSS -->
    {!! Html::style('assets/css/logo-nav.css') !!}

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    {!! Html::script('assets/js/jquery-1.11.3.min.js') !!}
    {!! Html::script('assets/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/jquery-ui.min.js') !!}
    {!! Html::script('assets/js/tab3_login.js') !!}
    <script>
        $(document).on('click', '.navbar-collapse.in', function (e) {
            if ($(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle') {
                $(this).collapse('hide');
            }
        });

    </script>
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="box-shadow: 0px 5px 10px #222;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/congreso">
                <img class="img-responsive hidden-xs hidden-sm" src="{{ asset('img/logochico2.png')}}" alt="Menu congreso">
            </a>

        </div>
        <div class="hidden-xs" style="float:right; margin-top: 15px;">
            <a class="navbar-brand2 hidden-xs hidden-sm " href="http://www.fb.uner.edu.ar" target="new">
                <img class="img-responsive" src="{{ asset('img/logo-bromatologia3.png')}}"  alt="Facultad de Bromatologia" >
            </a></div>
        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"> Congreso <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <li>
                            <a href="#tab_default_1" data-toggle="tab">Bienvenidos</a>
                        </li>
                        <li>
                            <a href="#tab_default_18" data-toggle="tab">Programa</a>
                        </li>
                        <li>
                            <a href="#tab_default_11" data-toggle="tab">Comité Organizador</a>
                        </li>
                        <li>
                            <a href="#tab_default_12" data-toggle="tab">Comité Científico</a>
                        </li>
                        <li>
                            <a href="#tab_default_14" data-toggle="tab">Expositores</a>
                        </li>
                        <li>
                            <a href="#tab_default_17" data-toggle="tab">Workshop</a>
                        </li>
                        <li>
                            <a href="#tab_default_13" data-toggle="tab">Sede</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"> Inscripciones <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#tab_default_2" data-toggle="tab">Inscripción</a>
                        </li>
                        <li><a href="#tab_default_9" data-toggle="tab">Aranceles</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"> Presentación de Trabajos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#tab_default_3" id="resumenes" data-toggle="tab">Envío de Resumenes</a></li>
                        <li><a href="#tab_default_8" id="reglamento" data-toggle="tab">Reglamento para la presentación
                                de trabajos</a></li>
                        <li><a href="#tab_default_10" id="plantillas" data-toggle="tab">Plantillas para presentación de
                                trabajos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"> Información General <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#tab_default_16" data-toggle="tab">La ciudad</a></li>
                        <li><a href="#tab_default_4" data-toggle="tab">Como llegar</a></li>
                        <li><a href="#tab_default_5" data-toggle="tab">Transportes</a></li>
                        <li><a href="#tab_default_6" data-toggle="tab">Información Turística</a></li>
                        <li><a href="#tab_default_7" data-toggle="tab">Teléfonos útiles</a></li>
                        <li><a href="#tab_default_15" data-toggle="tab">Contacto</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
@include('partials.mensajes')
<!-- Page Content -->
<div class="container" style="padding-left: 30px; padding-right: 30px">
    <div class="row">
        <div class="tab-content">
            <div class="tab-pane active" align="center">
                <picture>

                    <img src="{{ asset('img/cbyn.png')}}" width="400 em" height="40%" align="center"
                         class="img-responsive"  alt="Congreso Bromatologia y Nutricion">
                </picture>
                <h1>Congreso de Bromatología y Nutrición</h1><h3>Gualeguaychú - 12, 13 y 14 de Octubre de 2016</h3>
            </div>
            <div class="tab-pane fade" id="tab_default_1">
            @include('partials.tabs.tab1')<!--Congreso - Bienvenida-->
            </div>
            <div class="tab-pane fade" id="tab_default_2">
            @include('partials.tabs.tab2')<!--Inscripciones - Inscripcion-->
            </div>
            <div class="tab-pane fade" id="tab_default_3">
            @include('partials.tabs.tab3')<!--Presentacion de Trabajos - Envio de resumenes-->
            </div>
            <div class="tab-pane fade" id="tab_default_16">
            @include('partials.tabs.tab16')<!--Informacion general - La ciudad-->
            </div>
            <div class="tab-pane fade" id="tab_default_4">
            @include('partials.tabs.tab4')<!--Informacion general - Como llegar-->
            </div>
            <div class="tab-pane fade" id="tab_default_5">
            @include('partials.tabs.tab5')<!--Informacion general - Transportes-->
            </div>
            <div class="tab-pane fade" id="tab_default_6">
            @include('partials.tabs.tab6')<!--Informacion general - Información Turística-->
            </div>
            <div class="tab-pane fade" id="tab_default_7">
            @include('partials.tabs.tab7')<!--Informacion general - Teléfonos útiles-->
            </div>
            <div class="tab-pane fade" id="tab_default_8">
            @include('partials.tabs.tab8')<!--Presentacion de Trabajos  - Reglamento para la presentación de trabajos de investigación-->
            </div>
            <div class="tab-pane fade" id="tab_default_9">
            @include('partials.tabs.tab9')<!--Inscripciones - Aranceles-->
            </div>
            <div class="tab-pane fade" id="tab_default_10">
            @include('partials.tabs.tab10')<!--Presentacion de Trabajos - Plantillas para presentación de trabajos-->
            </div>
            <div class="tab-pane fade" id="tab_default_11">
            @include('partials.tabs.tab11')<!--Congreso - Comité Organizador-->
            </div>
            <div class="tab-pane fade" id="tab_default_12">
            @include('partials.tabs.tab12')<!--Congreso - Comité Científico-->
            </div>
            <div class="tab-pane fade" id="tab_default_13">
            @include('partials.tabs.tab13')<!--Congreso - Sede-->
            </div>
            <div class="tab-pane fade" id="tab_default_14">
            @include('partials.tabs.tab14')<!--Congreso - Expositores-->
            </div>
            <div class="tab-pane fade" id="tab_default_15">
            @include('partials.tabs.tab15')<!--Informacion general - Formulario de contacto-->
            </div>
            <div class="tab-pane fade" id="tab_default_17">
            @include('partials.tabs.tab17')<!--Congreso - Workshop - Presentación-->
            </div>
            <div class="tab-pane fade" id="tab_default_18">
            @include('partials.tabs.tab18')<!--Congreso - Programa-->
            </div>
        </div>
    </div>

</div>
<!-- /.container -->
<!-- Footer -->
@include('partials.footer')

</body>

<script>
    $('#ma').delay(3000).slideUp(2000);
</script>

<script>
    $('#resumenes').click(function () {
        loginResumenes();
    });
</script>


</html>