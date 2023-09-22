@php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
$roli = new Nari\Role($user);
$roli->redirect();
@endphp

<!DOCTYPE html>
<html lang="fr">

<head> <script src="{{asset('bootstrap/js/color-modes.js')}}"></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') | E-service informatique</title>


  <!-- Favicons -->


  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('admin/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/css/myStyle.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Accentic</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        @php
            //recuperer tous les message ou l'expediteur est l'utilisateur connecter
            $userId = $user->id;
            $participantId = App\Models\Participant::where(function ($query) use ($userId) {
                                                        $query->where('expediteur', $userId)
                                                            ->orWhere('destinataire', $userId);
                                                    })
                                                    ->orderBy('created_at', 'desc')
                                                    ->limit(5)
                                                    ->get();


            @endphp
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              Messagerie de l'application
              <a href="{{route('Admin.Message.Creation.index')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">Commencer</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            @forelse ($participantId as $participant)
            @php
            $message = App\Models\Message::where('participant', $participant->id)
                                            ->orderBy('created_at', 'desc')
                                            ->value('content');





            //
            $differentUser = "";
            if ($participant->expediteur != $user->id) {
                $differentUser = $participant->expediteur;
            }

            if ($participant->destinataire != $user->id) {
                $differentUser = $participant->destinataire;
            }
            //recuperation de l'user different de l'user actuel
            $diffUser = App\Models\User::findOrFail($differentUser);


            $d = App\Models\Message::where('participant', $participant->id)
                                            ->where('expediteur', '!=', $user->id)
                                            ->limit(1)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
        @endphp

                @if (!empty($message))
                    <li class="message-item">
                        <a href="{{route('Admin.Message.discution', ['participant' => $participant->id])}}">
                            @if (empty($diffUser->picture))
                                <img src="{{asset('admin/users-default/default.png')}}" alt="Profile" class="rounded-circle">
                            @else
                                <img src="/storage/{{$diffUser->picture}}" alt="{{$diffUser->name}}" class="rounded-circle">

                            @endif

                        <div>

                            <h4>{{$diffUser->name}}</h4>
                            <p>{{$message}}</p>
                            @foreach ($d as $date)
                            @php
                            $formattedDate = Carbon\Carbon::parse($date->created_at)->diffForHumans();

                            @endphp
                            <p>{{$formattedDate}}</p>
                            @endforeach

                        </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                @endif
            @empty
            <li class="message-item">
                <a href="#">

                  <div>
                    <h4></h4>
                    <p>Aucun message pour le moment</p>
                    <p></p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
            @endforelse




            <li class="dropdown-footer">
              <a href="{{route('Admin.Message.allMessage')}}">Voir tous les message</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              @if (empty($user->picture))
                  <img src="{{asset('admin/users-default/default.png')}}" alt="Profile" class="rounded-circle">
              @else
                  <img src="/storage/{{$user->picture}}" alt="Profile" class="rounded-circle">
              @endif

              <span class="d-none d-md-block dropdown-toggle ps-2">{{$user->name}}</span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>{{$user->name}}</h6>
                @php
                  $role = App\Models\Roles::findOrFail($user->role)
                @endphp
                <span>{{$role->title}}</span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="{{route('Admin.Utilisateur.profile')}}">
                  <i class="bi bi-person"></i>
                  <span>Mon Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="{{route('Admin.Utilisateur.edit')}}">
                  <i class="bi bi-gear"></i>
                  <span>Paramètre</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="">
                  <i class="bi bi-question-circle"></i>
                  <span>Besoin d'aide</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                  <form action="{{route('logout')}}" method="post">
                      @csrf
                      <div class="dropdown-item d-flex align-items-center">
                          <i class="bi bi-box-arrow-right"></i>
                        <input type="submit" value="Déconnexion" style="background: transparent; border:transparent">
                      </div>

                  </form>

              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Admin.index')}}">
          <i class="bi bi-grid"></i>
          <span>Tableau de bord</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Gestion de produit</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="{{route('Admin.Product.listing')}}">
              <i class="bi bi-circle"></i><span>Nos produits</span>
            </a>
          </li>

          <li>
            <a href="{{route('Admin.Category.listing')}}">
              <i class="bi bi-circle"></i><span>Liste de tous nos categorie</span>
            </a>
          </li>
          <li>
            <a href="{{route('Admin.Sales.listing')}}">
              <i class="bi bi-circle"></i><span>Information sur les produits</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Interface Visuelle</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('Admin.Interface.Home.listing')}}">
              <i class="bi bi-circle"></i><span>Acceuil</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->


      </li><!-- End Icons Nav -->



      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Admin.Utilisateur.profile')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      @if ($user->role == 3)
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Admin.Compte.listing')}}">
            <i class="bi bi-person"></i>
          <span>Gestion des comptes</span>
        </a>
      </li>
      @endif

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Admin.Contact.listing')}}">
          <i class="bi bi-envelope"></i>
          <span>Message</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Admin.Newsletter.listing')}}">
          <i class="bi bi-card-list"></i>
          <span>Newsletter</span>
        </a>
      </li><!-- End Register Page Nav -->



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">



    <section class="section dashboard">
      @yield('content')
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span> Mahenina Randrianarisoa</span></strong>
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('admin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('admin/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ asset('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('admin/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('admin/assets/js/main.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>
