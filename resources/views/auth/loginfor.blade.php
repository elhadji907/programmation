<!doctype html>
<html lang="en">
  <head>
    <title>ONFP APP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('cover.css')}}" >
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  </head>
  <body class="text-center">
      <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
          <header class="masthead mb-auto">
            <div class="inner">
              <h3 class="masthead-brand">ONFP GESTION</h3>
              <nav class="nav nav-masthead justify-content-center">
                <!-- <a class="nav-link active" href="#">Home</a>
                <a class="nav-link" href="#">Features</a>
                <a class="nav-link" href="#">Contact</a> -->
              </nav>
            </div>
          </header>

          <main role="main" class="inner cover">
            <h1 class="cover-heading">TEST DES ROLES</h1>
            <p class="lead">Interface de redirection vers un role de lapplication avec un utilisateur par defaut</p>
            <p class="lead">
              <!-- <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
              <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
              <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
              <a href="#" class="btn btn-lg btn-secondary">Learn more</a> -->
              <div class="btn-group" role="group" aria-label="">

                <div class="btn-group" role="group">
                  <button id="dropdownId" type="button" class="btn dropdown-toggle  btn-lg btn-primary" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                    Choisir le role svp
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownId">
                      <a href="{{route('loginfor','Administrateur')}}" class="btn btn-lg btn-secondary">Administrateur</a><br />
                      <a href="{{route('loginfor','Gestionnaire')}}" class="btn btn-lg btn-secondary">Gestionnaire</a><br />
                      <a href="{{route('loginfor','Beneficiaire')}}" class="btn btn-lg btn-secondary">Beneficiaire</a><br />
                      <a href="{{route('loginfor','Comptable')}}" class="btn btn-lg btn-secondary">Comptable</a><br />
                      {{--  <a href="{{route('loginfor','AComptable')}}" class="btn btn-lg btn-secondary">A-Comptable</a><br />  --}}
                      <a href="{{route('loginfor','Courrier')}}" class="btn btn-lg btn-secondary">Courrier</a><br />
                      {{--  <a href="{{route('loginfor','ACourrier')}}" class="btn btn-lg btn-secondary">A-Courrier</a><br />  --}}
                      <a href="{{route('loginfor','DPP')}}" class="btn btn-lg btn-secondary">DPP</a><br />
                      {{--  <a href="{{route('loginfor','ADPP')}}" class="btn btn-lg btn-secondary">A-DPP</a><br />  --}}
                      <a href="{{route('loginfor','DIOF')}}" class="btn btn-lg btn-secondary">DIOF</a><br />
                      {{--  <a href="{{route('loginfor','ADIOF')}}" class="btn btn-lg btn-secondary">A-DIOF</a><br />  --}}
                      <a href="{{route('loginfor','DEC')}}" class="btn btn-lg btn-secondary">DEC</a><br />
                      {{--  <a href="{{route('loginfor','ADEC')}}" class="btn btn-lg btn-secondary">A-DEC</a><br />  --}}
                      <a href="{{route('loginfor','Ingenieur')}}" class="btn btn-lg btn-secondary">Ingenieur</a><br />
                      {{--  <a href="{{route('loginfor','COM')}}" class="btn btn-lg btn-secondary">COM</a><br />  --}}
                      {{--  <a href="{{route('loginfor','ACOM')}}" class="btn btn-lg btn-secondary">A-COM</a><br />  --}}
                      <a href="{{route('loginfor','Demandeur')}}" class="btn btn-lg btn-secondary">Demandeur</a><br />
                      <a href="{{route('loginfor','Visiteur')}}" class="btn btn-lg btn-secondary">Visiteur</a><br />
                      <a href="{{route('loginfor','Operateur')}}" class="btn btn-lg btn-secondary">Operateur</a><br />
                      <a href="{{route('loginfor','Individuelle')}}" class="btn btn-lg btn-secondary">Individuelle</a><br />
                      <a href="{{route('loginfor','Collective')}}" class="btn btn-lg btn-secondary">Collective</a><br />
                      <a href="{{route('loginfor','Nologin')}}" class="btn btn-lg btn-secondary">Nologin</a><br />
                  </div>
                </div>
              </div>
            </p>
          </main>


          <footer class="mastfoot mt-auto">
            <div class="inner">
              <p>&copy;
                 {{-- <a href="https://getbootstrap.com/"> 
                  < / ></a>, by <a href="#">Dev</a> --}}
                  ONFP 2019.
                </p>
            </div>
          </footer>
        </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

