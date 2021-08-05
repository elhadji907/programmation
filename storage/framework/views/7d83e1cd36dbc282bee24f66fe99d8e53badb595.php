<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo e(config('app.name', 'ONFP')); ?></title>
  
  <link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

  <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  
  <link href="<?php echo e(asset('css/agency.min.css')); ?>" rel="stylesheet">
  
  <link href="<?php echo e(asset('css/myStyle.css')); ?>" rel="stylesheet">
      
  <link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
  
  <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

</head>

<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
     

      <a class="navbar-brand js-scroll-trigger align-items-baseline" href="#page-top">
      
        <strong><span class="pl-1"><?php echo e(config('app.name', 'ONFP')); ?></span></strong>
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
         
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">A propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">Cibles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contacts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo e(url('/demandeurs')); ?>">Formation</a>
          </li>
          <?php if(Route::has('login')): ?>
          <li class="nav-item">
            <?php if(auth()->guard()->check()): ?>

            <a class="navbar-brand pl-3" href="<?php echo e(url('/home')); ?>">Mon Compte
                <img src="<?php echo e(asset(Auth::user()->profile->getImage())); ?>" class="rounded-circle" width="30px" height="auto"/>
            </a>
            
            <?php else: ?>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo e(route('login')); ?>">CONNEXION</a>
          </li>
          <li class="nav-item">
            <?php if(Route::has('register')): ?>
            <a class="nav-link js-scroll-trigger" href="<?php echo e(route('register')); ?>">INSCRIPTION</a>
            <?php endif; ?>
            <?php endif; ?>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in"><?php echo e(__('Bienvenue à l\'Office national de Formation professionnelle')); ?></div>
        <div class="intro-heading text-uppercase">ONFP</div>
      
      <p class="intro-lead-in"><?php echo e(__('la référence de la Formation professionnelle')); ?></p>
      </div>
    </div>
  </header>

  
  <!-- Services -->
  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Services</h2>
         
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-6">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading"><?php echo e(("Formation")); ?></h4>
          <p class="text-muted"><?php echo e(("C’est l’organisation d’actions et d’opérations de formation au bénéfice de cibles diversifiées pouvant être les branches professionnelles,
             les demandeurs d’emploi, les travailleurs, les entreprises, les collectivités, les organismes de l’état, etc. 
             Ces formations s’inscrivent dans une perspective d’obtention d’une qualification professionnelle au regard des catégories professionnelles 
             des conventions collectives de branches professionnelles. Ces formations de type modulaire sont sanctionnées par des attestations,
              des titres de qualification ou des titres professionnels. L’obtention de ces titres peut se faire par la voie de la Validation des Acquis de l’Expérience (VAE).")); ?>

            </p>
        </div>
        <div class="col-md-6">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading"><?php echo e(("Documentation / Edition")); ?></h4>
          <p class="text-muted"><?php echo e(("L’ONFP produit et diffuse de la documentation et des supports techniques et pédagogiques sur la formation professionnelle. 
            Il s’agit de la mise à la disposition du public de la documentation avec accès libre ou conditionné sous format physique ou électronique. 
            Il s’agit également de l’édition et de la distribution de manuels et supports pédagogiques destinés aux apprenants ou hommes de métier en exercice.
              L’ONFP offre la possibilité à des auteurs de faire éditer leur ouvrage dès lors que ceux ci traitent des questions liées à la formation professionnelle.")); ?>

            </p>
        </div>
        <div class="col-md-6">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading"><?php echo e(("Construction")); ?></h4>
          <p class="text-muted"><?php echo e(("Ce service consiste à la maitrise d’ouvrage de construction de centres de formation professionnelle ou la maitrise d’ouvrage déléguée
             à la demande de ministères, d’organismes, de projets nationaux, de coopération ou à la demande d’organismes privés tels que les branches, les ONG, 
             les associations et les entreprises.")); ?></p>
        </div>

        <div class="col-md-6">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
            </span>
              
          <h4 class="service-heading"><?php echo e(("Recherche")); ?></h4>
          <p class="text-muted"><?php echo e(("Il s’agit de la production ou de la diffusion de connaissances et de savoirs sur la formation professionnelle.
             Ceci se traduit par l’appui à des thèses ou des mémoires portant sur des sujets en lien avec les problématiques de la formation professionnelle. 
             Il s’agit également de mise en oeuvre d’études, de mise au point de méthodes et d’expérimentation de moyens et équipements pédagogiques. 
             Les résultats de recherche sont destinés notamment à alimenter les politiques publiques et les programmes des branches professionnelles.")); ?>

            </p>
          </div>

      </div>
    </div>
  </section>
  
  <!-- About -->
  <section class="page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">A PROPOS</h2>
         
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
                 
                  <h4 class="subheading"><?php echo e(("Qui sommes-nous ?")); ?></h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted"><?php echo e(("L’Office National de Formation Professionnelle (ONFP) est un établissement public à caractère industriel et commercial (EPIC) créé par la Loi n°86-44 du 11 Août 1986.")); ?></p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="#" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                 
                  <h4 class="subheading"><?php echo e(("Ainsi, l’ONFP a pour mission de :")); ?></h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">
                      <?php echo e(("Aider à mettre en œuvre les objectifs sectoriels du gouvernement et d’assister les organismes publics et privés dans la réalisation de leur action ;")); ?>

                      <?php echo e(("Réaliser des études sur l’emploi, la qualification professionnelle, les moyens quantitatifs et qualitatifs de la formation professionnelle initiale et continue ;")); ?>

                      <?php echo e(("Coordonner les interventions par branche professionnelle par action prioritaire en s’appuyant sur des structures existantes ou à créer ;")); ?>

                      <?php echo e(("Coordonner l’action de formation professionnelle des organismes d’aides bilatérales ou multilatérales.")); ?>

                    
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
                 
                  <h4 class="subheading"><?php echo e(("La vision qui guide notre action")); ?></h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">
                      <?php echo e(("La qualification professionnelle est le levier le plus important pour l’amélioration de la productivité du travail, la réduction de la précarité de l’emploi et le positionnement fort de la formation professionnelle dans les enjeux nationaux.")); ?>

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
                 
                  <h4 class="subheading"><?php echo e(("Les valeurs qui sous-tendent notre fonctionnement")); ?></h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">
                      <?php echo e(("Nous portons en nous l’exigence scientifique et technique de la référence nationale en matière de formation professionnelle.")); ?>

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
                   
                    <h4 class="subheading"><?php echo e(("Le mandat assigné à l’ONFP")); ?></h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">
                        <?php echo e(("Doter le travailleur ou le demandeur d’emploi, notamment dans une optique d’auto emploi, où qu’il se trouve sur le territoire national, d’une qualification ou d’un titre professionnel qui lui permet, à la fois, d’occuper un emploi ou d’exercer une activité professionnelle selon les normes requises et de se promouvoir.")); ?>

                    </p>
                  </div>
                </div>
              </li>
           
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
        
        </div>
      </div>
      <div class="row">
        <div class="mx-auto">
      <li><?php echo e(("Les travailleurs de tous secteurs (public, privé, moderne, informel, monde rural, artisanat, etc.) ;")); ?></li>
      <li><?php echo e(("Les individus ou groupe d’individus (en particulier les jeunes et les femmes) à la recherche d’un emploi ou porteurs de projets d’insertion ;")); ?></li>
      <li><?php echo e(("Les entreprises de tous secteurs ;")); ?></li>
      <li><?php echo e(("Les formateurs ;")); ?></li>
      <li><?php echo e(("Les groupements féminins ;")); ?></li>
      <li><?php echo e(("Les Groupements d’intérêt Economique (GIE) ;")); ?></li>
      <li><?php echo e(("Les associations et ONG ;")); ?></li>
      <li><?php echo e(("Les organisations professionnelles ;")); ?></li>
      <li><?php echo e(("L’Etat et les collectivités locales ;")); ?></li>
      <li><?php echo e(("Les chambres consulaires ;")); ?></li>
      <li><?php echo e(("Les organisations de travailleurs ;")); ?></li>
      <li><?php echo e(("Les partenaires internationaux intervenant dans le secteur de la formation professionnelle ou qualifiante dans le cadre de l’exécution de leurs programmes spécifiques ;")); ?></li>
      <li><?php echo e(("Les chercheurs dans le domaine de la formation et de l’insertion professionnelle ;")); ?></li>
      <li><?php echo e(("Les programmes d’investissements économiques et de promotion de l’emploi.")); ?></li>

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
             
            </li>
            <li class="list-inline-item">
              
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>


  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

  <!-- Plugin JavaScript -->
  <script src="<?php echo e(asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

  <!-- Contact form JavaScript -->
  <script src="<?php echo e(asset('js/jqBootstrapValidation.js')); ?>"></script>
  <script src="<?php echo e(asset('js/contact_me.js')); ?>"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo e(asset('js/agency.min.js')); ?>"></script>

</body>

</html>
<?php /**PATH /var/www/html/programmation/resources/views/welcome.blade.php ENDPATH**/ ?>