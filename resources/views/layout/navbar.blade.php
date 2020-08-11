<div id="content">
  {{--    <!-- Topbar -->  --}}
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow border-bottom-success border-top-success">
  
     {{--   <!-- Sidebar Toggle (Topbar) -->  --}}
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        {{-- <i class="fa fa-bars"></i> --}}
         <span data-feather="menu"></span>
      </button>
  
   {{--     <!-- Topbar Search -->  --}}
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          {{-- <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div> --}}
        </div>
      </form>
    
     {{--   <!-- Nav Item - Alerts -->  --}}       
    {{--  @roles('Administrateur|Gestionnaire|Courrier')  --}}

    {{--  start notifications  --}}
    @unless (auth()->user()->unReadNotifications->isEmpty())
    <li class="nav-item dropdown no-arrow mx-1"> 
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{-- <i class="fas fa-bell fa-fw"></i> --}}
        <span data-feather="bell"></span>
       {{--   <!-- Counter - Alerts -->  --}}
        <span class="badge badge-danger badge-counter"> {!! auth()->user()->unReadNotifications->count() !!} </span>
      </a>
     {{--   <!-- Dropdown - Alerts -->  --}}
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
         {!! __("Centre d'alerte") !!}
        </h6>        
        @foreach (auth()->user()->unReadNotifications as $notification)
          <a class="dropdown-item d-flex align-items-center" 
          href="{{ route('courriers.showFromNotification', ['courrier'=>$notification->data['courrierId'], 'notification'=>$notification->id]) }}">
           
              {{--  <div class="icon-circle">
                <img class="img-profile rounded-circle w-100" src="{{ asset(Auth::user()->profile->getImage()) }}">
              </div>
              --}}
            <div>
                <div class="small text-gray-500">{!! $notification->created_at->format('d/m/Y') !!}</div>
                <span class="font-weight-bold">{!! $notification->data['firstname'] !!}&nbsp;{!! $notification->data['name'] !!}
                </span>
                 a posté un commentaire sur          
                <span class="font-weight-bold">&laquo;{!! $notification->data['courrierTitle'] !!}&raquo;</span>
            </div>
          </a>
        @endforeach
        {{--  <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="mr-3">
            <div class="icon-circle bg-success">
              <i class="fas fa-donate text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-gray-500"> ONFP, 2019</div>
            $290.29 has been deposited into your account!
          </div>
        </a>  --}}
        {{--  <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="mr-3">
            <div class="icon-circle bg-warning">
              <i class="fas fa-exclamation-triangle text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-gray-500">December 2, 2019</div>
            Spending Alert: We have noticed unusually high spending for your account.
          </div>
        </a>  --}}
        {{--  <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>  --}}
      </div>
    </li>
    @endunless
    {{--  end notifications  --}}

      <!-- Nav Item - Messages -->
      {{-- <li class="nav-item dropdown no-arrow mx-1"> --}}
        {{-- <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --}}
          {{--<i class="fasfa-envelopefa-fw"> </i> --}}
          {{-- <span data-feather="mail"></span> --}}
          {{-- <!-- Counter - Messages --> --}}
          {{-- <span class="badge badge-danger badge-counter">7</span> --}}
        {{-- </a> --}}
        {{-- <!-- Dropdown - Messages --> --}}
        {{-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown"> --}}
          {{-- <h6 class="dropdown-header"> --}}
            {{-- Message Center --}}
          {{-- </h6> --}}
          {{-- <a class="dropdown-item d-flex align-items-center" href="#"> --}}
            {{-- <div class="dropdown-list-image mr-3"> --}}
              {{-- <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt=""> --}}
              {{-- <div class="status-indicator bg-success"></div> --}}
            {{-- </div> --}}
            {{-- <div class="font-weight-bold"> --}}
              {{-- <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I have been having.</div> --}}
              {{-- <div class="small text-gray-500">Emily Fowler · 58m</div> --}}
            {{-- </div> --}}
          {{-- </a> --}}
          {{-- <a class="dropdown-item d-flex align-items-center" href="#"> --}}
            {{-- <div class="dropdown-list-image mr-3"> --}}
              {{-- <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt=""> --}}
              {{-- <div class="status-indicator"></div> --}}
            {{-- </div> --}}
            {{-- <div> --}}
              {{-- <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div> --}}
              {{-- <div class="small text-gray-500">Jae Chun · 1d</div> --}}
            {{-- </div> --}}
          {{-- </a> --}}
          {{-- <a class="dropdown-item d-flex align-items-center" href="#"> --}}
            {{-- <div class="dropdown-list-image mr-3"> --}}
              {{-- <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt=""> --}}
              {{-- <div class="status-indicator bg-warning"></div> --}}
            {{-- </div> --}}
            {{-- <div> --}}
              {{-- <div class="text-truncate">Last month is report looks great, I am very happy with the progress so far, keep up the good work!</div> --}}
              {{-- <div class="small text-gray-500">Morgan Alvarez · 2d</div> --}}
            {{-- </div> --}}
          {{-- </a> --}}
          {{-- <a class="dropdown-item d-flex align-items-center" href="#"> --}}
            {{-- <div class="dropdown-list-image mr-3"> --}}
              {{-- <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt=""> --}}
              {{-- <div class="status-indicator bg-success"></div> --}}
            {{-- </div> --}}
            {{-- <div> --}}
              {{-- <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they are not good...</div> --}}
              {{-- <div class="small text-gray-500">Chicken the Dog · 2w</div> --}}
            {{-- </div> --}}
          {{-- </a> --}}
          {{-- <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a> --}}
        {{-- </div> --}}
      {{-- </li> --}}

      {{--  @endroles  --}}
      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->username }}</span>
          <img class="img-profile rounded-circle" src="{{ asset(Auth::user()->profile->getImage()) }}">

         {{--  <img src="{{ asset($user()->profile->getImage()) }}" class="rounded-circle img-profile w-100"/> --}}
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            

          <a class="dropdown-item" href="{{ route('profiles.show', ['user'=>auth()->user()]) }}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->firstname }} {{ Auth::user()->name }}</span>
          </a>
         
        @roles('Administrateur|Courrier')
          <a class="dropdown-item" href="{{ route('courriers.create') }}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            {{(" Initier un courrier")}}
          </a>
          @endroles
          {{--  <a class="dropdown-item" href="{{ route('postes.create') }}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            {{(" Créer un post")}}
          </a>  --}}
       
          <a class="dropdown-item" href="{{ route('profiles.show', ['user'=>auth()->user()]) }}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
           {{(" Profil")}}
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            {{ ("Réglages") }}
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            {{ "Journal d'activité" }}
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            {{ ("Déconnexion ") }}
          </a>
        </div>
      </li>

    </ul>

  </nav>
  
  <!-- End of Topbar -->