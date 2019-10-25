<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ config('app.name', 'ONFP') }}</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> 
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  
  <link href="{{ asset('css/scrolling-nav.css') }}" rel="stylesheet">

  {{--  <!-- Custom fonts for this template--> --}}
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/myStyle.css') }}" rel="stylesheet">
      
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="{{ asset('fonts.gstatic.com') }}">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Plugin CSS -->
  <link href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="{{ asset('css/creative.min.css') }}" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Navigation -->
{{--   <nav class="navbar navbar-expand-lg bg-dark fixed-top navbar-light bg-white shadow-sm border-bottom-success" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger align-items-baseline" href="#jumbotron">
        <img src="{{ asset('img/ONFP.png') }}" class="pr-1" width="40px" style="border-right: solid 1px #333; "/>

        <strong><span class="pl-1">{{ config('app.name', 'ONFP') }}</span></strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto align-items-baseline">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">A PROPOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">SERVICES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#cibles">CIBLES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">CONTACTS</a>
          </li>
          @if (Route::has('login'))
          <li class="nav-item">
            @auth

            <a class="navbar-brand pl-3" href="{{ url('/home') }}">Mon Compte
                <img src="{{ asset(Auth::user()->profile->getImage()) }}" class="rounded-circle" width="30px" height="auto"/>
            </a>
            
            @else
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">CONNEXION</a>
          </li>
          <li class="nav-item">
            @if (Route::has('register'))
            <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">INSCRIPTION</a>
            @endif
            @endauth
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav> --}}

{{--   <header class="bg-primary text-white bg-grad header"  id="jumbotron">
    <div class="container text-center">
      <h1>{{ ("Bienvenue à l'ONFP") }}</h1>
      <p class="lead">{{ ("Office national de Formation professionnelle") }}</p>
    </div>
  </header> --}}
  

  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">Your Favorite Source of Free Bootstrap Themes</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Start Bootstrap can help you build better websites using the Bootstrap framework! Just download a theme and start customizing, no strings attached!</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
        </div>
      </div>
    </div>
  </header>

  <section id="about" class="bg-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2><strong>A PROPOS</strong></h2>
          <h2><em>{{ ("Qui sommes-nous ?") }}</em></h2>
          <p class="lead">{{ ("L’Office National de Formation Professionnelle (ONFP) est un établissement public à caractère industriel et commercial (EPIC) créé par la Loi n°86-44 du 11 Août 1986.") }}</p>
          <p class="lead">{{ ("Ainsi, l’ONFP a pour mission de :") }}</p>
          <ul>
            <li>{{ ("Aider à mettre en œuvre les objectifs sectoriels du gouvernement et d’assister les organismes publics et privés dans la réalisation de leur action ;") }}</li>
            <li>{{ ("Réaliser des études sur l’emploi, la qualification professionnelle, les moyens quantitatifs et qualitatifs de la formation professionnelle initiale et continue ;") }}</li>
            <li>{{ ("Coordonner les interventions par branche professionnelle par action prioritaire en s’appuyant sur des structures existantes ou à créer ;") }}</li>
            <li>{{ ("Coordonner l’action de formation professionnelle des organismes d’aides bilatérales ou multilatérales.") }}</li>
          </ul>
          <h2><em>{{ ("La vision qui guide notre action") }}</em></h2>
          {{ ("La qualification professionnelle est le levier le plus important pour l’amélioration de la productivité du travail, la réduction de la précarité de l’emploi et le positionnement fort de la formation professionnelle dans les enjeux nationaux.") }}
          <h2><em>{{ ("Les valeurs qui sous-tendent notre fonctionnement") }}</em></h2>
          {{ ("Nous portons en nous l’exigence scientifique et technique de la référence nationale en matière de formation professionnelle.") }}
          <h2><em>{{ ("Le mandat assigné à l’ONFP") }}</em></h2>
          {{ ("Doter le travailleur ou le demandeur d’emploi, notamment dans une optique d’auto emploi, où qu’il se trouve sur le territoire national, d’une qualification ou d’un titre professionnel qui lui permet, à la fois, d’occuper un emploi ou d’exercer une activité professionnelle selon les normes requises et de se promouvoir.") }}
        </div>
      </div>
    </div>
  </section>
  {{-- <section id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2><strong>SERVICES</strong></h2> --}}
          {{--  <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>  --}}
          {{-- <h2><em>{{ ("Formation") }}</em></h2>
          {{ ("C’est l’organisation d’actions et d’opérations de formation au bénéfice de cibles diversifiées pouvant être les branches professionnelles, les demandeurs d’emploi, les travailleurs, les entreprises, les collectivités, les organismes de l’état, etc. Ces formations s’inscrivent dans une perspective d’obtention d’une qualification professionnelle au regard des catégories professionnelles des conventions collectives de branches professionnelles. Ces formations de type modulaire sont sanctionnées par des attestations, des titres de qualification ou des titres professionnels. L’obtention de ces titres peut se faire par la voie de la Validation des Acquis de l’Expérience (VAE).") }}
          <h2><em>{{ ("Documentation / Edition") }}</em></h2>
          {{ ("L’ONFP produit et diffuse de la documentation et des supports techniques et pédagogiques sur la formation professionnelle. Il s’agit de la mise à la disposition du public de la documentation avec accès libre ou conditionné sous format physique ou électronique. Il s’agit également de l’édition et de la distribution de manuels et supports pédagogiques destinés aux apprenants ou hommes de métier en exercice.
          L’ONFP offre la possibilité à des auteurs de faire éditer leur ouvrage dès lors que ceux ci traitent des questions liées à la formation professionnelle.") }}
          <h2><em>{{ ("Construction") }}</em></h2>
          {{ ("Ce service consiste à la maitrise d’ouvrage de construction de centres de formation professionnelle ou la maitrise d’ouvrage déléguée à la demande de ministères, d’organismes, de projets nationaux, de coopération ou à la demande d’organismes privés tels que les branches, les ONG, les associations et les entreprises.") }}
          <h2><em>{{ ("Recherche") }}</em></h2>
          {{ ("Il s’agit de la production ou de la diffusion de connaissances et de savoirs sur la formation professionnelle. Ceci se traduit par l’appui à des thèses ou des mémoires portant sur des sujets en lien avec les problématiques de la formation professionnelle. Il s’agit également de mise en oeuvre d’études, de mise au point de méthodes et d’expérimentation de moyens et équipements pédagogiques. Les résultats de recherche sont destinés notamment à alimenter les politiques publiques et les programmes des branches professionnelles.") }}
        </div>
      </div>
    </div>
  </section> --}}
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">At Your Service</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
            <h3 class="h4 mb-2">Formation</h3>
            <p class="text-muted mb-0">Our themes are updated regularly to keep them bug free!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
            <h3 class="h4 mb-2">Documentation / Edition</h3>
            <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
            <h3 class="h4 mb-2">Construction</h3>
            <p class="text-muted mb-0">You can  this design as is, or you can make changes!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
            <h3 class="h4 mb-2">Recherche</h3>
            <p class="text-muted mb-0">Is it really open source if its not made with love?</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="cibles" class="bg-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2><strong>NOS CIBLES</strong></h2>
          {{--  <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>  --}}
          <h2><em>{{ ("Nos cibles ou bénéficiaires:") }}</em></h2>
          <li>{{ ("Les travailleurs de tous secteurs (public, privé, moderne, informel, monde rural, artisanat, etc.) ;") }}</li>
          <li>{{ ("Les individus ou groupe d’individus (en particulier les jeunes et les femmes) à la recherche d’un emploi ou porteurs de projets d’insertion ;") }}</li>
          <li>{{ ("Les entreprises de tous secteurs ;") }}</li>
          <li>{{ ("Les formateurs ;") }}</li>
          <li>{{ ("Les groupements féminins ;") }}</li>
          <li>{{ ("Les Groupements d’intérêt Economique (GIE) ;") }}</li>
          <li>{{ ("Les associations et ONG ;") }}</li>
          <li>{{ ("Les organisations professionnelles ;") }}</li>
          <li>{{ ("L’Etat et les collectivités locales ;") }}</li>
          <li>{{ ("Les chambres consulaires ;") }}</li>
          <li>{{ ("Les organisations de travailleurs ;") }}</li>
          <li>{{ ("Les partenaires internationaux intervenant dans le secteur de la formation professionnelle ou qualifiante dans le cadre de l’exécution de leurs programmes spécifiques ;") }}</li>
          <li>{{ ("Les chercheurs dans le domaine de la formation et de l’insertion professionnelle ;") }}</li>
          <li>{{ ("Les programmes d’investissements économiques et de promotion de l’emploi.") }}</li>
          </div>
      </div>
    </div>
  </section>
{{-- 
  <section id="contact">
    <div class="container">      
        <h2><strong>CONTACTS</strong></h2>
      <div class="row">          
        <div class="col-lg-4 mx-auto">
        <h2><em>{{ ("Direction Générale") }}</em></h2>
        <p><b>Adresse: </b>{{ ("SIPRES 1, lot 2 – 2 Voies Liberté 6 extension VDN") }}<p>
        <p><b>BP: </b>{{ ("21013 Dakar – Ponty") }}</p>
        <p><b>Tél: </b>{{ ("(+221) 33 827 92 51") }}</p>
        <p><b>Fax: </b>{{ ("(+221) 33 827 92 55") }}</p>
        <p><b>BP: </b>{{ ("onfp@onfp.sn") }}</p>
        <h2><em>{{ ("Antennes") }}</em></h2>
        <li><em>{{ ("KOLDA") }}</em></li>
        <p><b>Adresse: </b>{{ ("") }}<p>
        <p><b>Tél: </b>{{ ("") }}</p>
        
        <li><em>{{ ("KAOLACK") }}</em></li>
        <p><b>Adresse: </b>{{ ("") }}<p>
        <p><b>Tél: </b>{{ ("") }}</p>

        <li><em>{{ ("SAINT-LOUIS") }}</em></li>
        <p><b>Adresse: </b>{{ ("") }}<p>
        <p><b>Tél: </b>{{ ("") }}</p>
        
        <li><em>{{ ("KEDOUGOU") }}</em></li>
        <p><b>Adresse: </b>{{ ("") }}<p>
        <p><b>Tél: </b>{{ ("") }}</p>

        <li><em>{{ ("MATAM") }}</em></li>
        <p><b>Adresse: </b>{{ ("") }}<p>
        <p><b>Tél: </b>{{ ("") }}</p>
      </div> --}}
      {{--  <div class="col-lg-8 mx-auto">       
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.517864720242!2d-17.470480685250187!3d14.73982917760135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec10d5aafda1357%3A0xe11853e0c04fd69c!2sOffice+National+de+Formation+Professionnelle+(ONFP+S%C3%A9n%C3%A9gal)!5e0!3m2!1sfr!2ssn!4v1566480045367!5m2!1sfr!2ssn" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
         <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
      </div>  --}}
  {{--     </div>
    </div>
  </section> --}}
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Entrez en contact avec nous !</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Prêt à démarrer votre prochain projet avec nous? Appelez-nous ou envoyez-nous un email et nous vous contacterons dans les plus brefs délais!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+221 33 827 92 51</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:onfp@onfp.sn">onfp@onfp.sn</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-light">
    <div class="container">
      <p class="small text-center text-muted">Copyright &copy; ONFP 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <script src="{{ asset('js/scrolling-nav.js') }}"></script>
  
  <!-- Scripts -->
  <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ asset('js/creative.min.js') }}"></script>

</body>

</html>
