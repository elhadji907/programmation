<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ config('app.name', 'ONFP') }}</title>
  
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  
  <link href="{{ asset('css/agency.min.css') }}" rel="stylesheet">
  
  <link href="{{ asset('css/myStyle.css') }}" rel="stylesheet">
      
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
     {{--  <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a> --}}

      <a class="navbar-brand js-scroll-trigger align-items-baseline" href="#page-top">
      {{--   <img src="{{ asset('img/ONFP.png') }}" class="pr-1" width="40px" style="border-right: solid 1px #333; "/> --}}
        <strong><span class="pl-1">{{ config('app.name', 'ONFP') }}</span></strong>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
         {{--  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">A propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">Cibles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contacts</a>
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
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">{{ __('Bienvenue à l\'Office national de Formation professionnelle') }}</div>
        <div class="intro-heading text-uppercase">ONFP</div>
      {{--   <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a> --}}
      <p class="intro-lead-in">{{ __('la référence de la Formation professionnelle') }}</p>
      </div>
    </div>
  </header>

  
  <!-- Services -->
  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Services</h2>
         {{--  <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> --}}
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-6">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">{{ ("Formation") }}</h4>
          <p class="text-muted">{{ ("C’est l’organisation d’actions et d’opérations de formation au bénéfice de cibles diversifiées pouvant être les branches professionnelles,
             les demandeurs d’emploi, les travailleurs, les entreprises, les collectivités, les organismes de l’état, etc. 
             Ces formations s’inscrivent dans une perspective d’obtention d’une qualification professionnelle au regard des catégories professionnelles 
             des conventions collectives de branches professionnelles. Ces formations de type modulaire sont sanctionnées par des attestations,
              des titres de qualification ou des titres professionnels. L’obtention de ces titres peut se faire par la voie de la Validation des Acquis de l’Expérience (VAE).") }}
            </p>
        </div>
        <div class="col-md-6">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">{{ ("Documentation / Edition") }}</h4>
          <p class="text-muted">{{ ("L’ONFP produit et diffuse de la documentation et des supports techniques et pédagogiques sur la formation professionnelle. 
            Il s’agit de la mise à la disposition du public de la documentation avec accès libre ou conditionné sous format physique ou électronique. 
            Il s’agit également de l’édition et de la distribution de manuels et supports pédagogiques destinés aux apprenants ou hommes de métier en exercice.
              L’ONFP offre la possibilité à des auteurs de faire éditer leur ouvrage dès lors que ceux ci traitent des questions liées à la formation professionnelle.") }}
            </p>
        </div>
        <div class="col-md-6">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">{{ ("Construction") }}</h4>
          <p class="text-muted">{{ ("Ce service consiste à la maitrise d’ouvrage de construction de centres de formation professionnelle ou la maitrise d’ouvrage déléguée
             à la demande de ministères, d’organismes, de projets nationaux, de coopération ou à la demande d’organismes privés tels que les branches, les ONG, 
             les associations et les entreprises.") }}</p>
        </div>

        <div class="col-md-6">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
            </span>
              
          <h4 class="service-heading">{{ ("Recherche") }}</h4>
          <p class="text-muted">{{ ("Il s’agit de la production ou de la diffusion de connaissances et de savoirs sur la formation professionnelle.
             Ceci se traduit par l’appui à des thèses ou des mémoires portant sur des sujets en lien avec les problématiques de la formation professionnelle. 
             Il s’agit également de mise en oeuvre d’études, de mise au point de méthodes et d’expérimentation de moyens et équipements pédagogiques. 
             Les résultats de recherche sont destinés notamment à alimenter les politiques publiques et les programmes des branches professionnelles.") }}
            </p>
          </div>

      </div>
    </div>
  </section>
  {{-- 
  <!-- Portfolio Grid -->
  <section class="bg-light page-section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Portfolio</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/01-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Threads</h4>
            <p class="text-muted">Illustration</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/02-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Explore</h4>
            <p class="text-muted">Graphic Design</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/03-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Finish</h4>
            <p class="text-muted">Identity</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/04-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Lines</h4>
            <p class="text-muted">Branding</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/05-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Southwest</h4>
            <p class="text-muted">Website Design</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/06-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Window</h4>
            <p class="text-muted">Photography</p>
          </div>
        </div>
      </div>
    </div>
  </section>
 --}}
  <!-- About -->
  <section class="page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">A PROPOS</h2>
         {{--  <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> --}}
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="#" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                 {{--  <h4>2009-2011</h4> --}}
                  <h4 class="subheading">{{ ("Qui sommes-nous ?") }}</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">{{ ("L’Office National de Formation Professionnelle (ONFP) est un établissement public à caractère industriel et commercial (EPIC) créé par la Loi n°86-44 du 11 Août 1986.") }}</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="#" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                 {{--  <h4>March 2011</h4> --}}
                  <h4 class="subheading">{{ ("Ainsi, l’ONFP a pour mission de :") }}</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">
                      {{ ("Aider à mettre en œuvre les objectifs sectoriels du gouvernement et d’assister les organismes publics et privés dans la réalisation de leur action ;") }}
                      {{ ("Réaliser des études sur l’emploi, la qualification professionnelle, les moyens quantitatifs et qualitatifs de la formation professionnelle initiale et continue ;") }}
                      {{ ("Coordonner les interventions par branche professionnelle par action prioritaire en s’appuyant sur des structures existantes ou à créer ;") }}
                      {{ ("Coordonner l’action de formation professionnelle des organismes d’aides bilatérales ou multilatérales.") }}
                    
                    </p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="#" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                 {{--  <h4>December 2012</h4> --}}
                  <h4 class="subheading">{{ ("La vision qui guide notre action") }}</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">
                      {{ ("La qualification professionnelle est le levier le plus important pour l’amélioration de la productivité du travail, la réduction de la précarité de l’emploi et le positionnement fort de la formation professionnelle dans les enjeux nationaux.") }}
                  </p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="#" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                 {{--  <h4>July 2014</h4> --}}
                  <h4 class="subheading">{{ ("Les valeurs qui sous-tendent notre fonctionnement") }}</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">
                      {{ ("Nous portons en nous l’exigence scientifique et technique de la référence nationale en matière de formation professionnelle.") }}
                    </p>
                </div>
              </div>
            </li>
            <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="#" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                   {{--  <h4>December 2012</h4> --}}
                    <h4 class="subheading">{{ ("Le mandat assigné à l’ONFP") }}</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">
                        {{ ("Doter le travailleur ou le demandeur d’emploi, notamment dans une optique d’auto emploi, où qu’il se trouve sur le territoire national, d’une qualification ou d’un titre professionnel qui lui permet, à la fois, d’occuper un emploi ou d’exercer une activité professionnelle selon les normes requises et de se promouvoir.") }}
                    </p>
                  </div>
                </div>
              </li>
           {{--  <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Be Part
                  <br>Of Our
                  <br>Story!</h4>
              </div>
            </li> --}}
          </ul>
        </div>
      </div>
    </div>
  </section>


   <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">NOS CIBLES / BENEFICIAIRES</h2>
        {{--   <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> --}}
        </div>
      </div>
      <div class="row">
        <div class="mx-auto">
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
  
  <!-- Contact -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Contactez Nous</h2>
          {{-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> --}}
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" type="text" placeholder="Votre nom *" required="required" data-validation-required-message="svp. entrer votre nom.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Votre Email *" required="required" data-validation-required-message="svp. entrer votre adress email.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="tel" placeholder="Votre Telephone *" required="required" data-validation-required-message="svp. entrer votre numéro de téléphone.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" id="message" placeholder="Votre Message *" required="required" data-validation-required-message="svp. entrer votre message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Envoyer un message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; ONFP 2019</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
             {{--  <a href="#">Privacy Policy</a> --}}
            </li>
            <li class="list-inline-item">
              {{-- <a href="#">Terms of </a> --}}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>


  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Contact form JavaScript -->
  <script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
  <script src="{{ asset('js/contact_me.js') }}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ asset('js/agency.min.js') }}"></script>

</body>

</html>
