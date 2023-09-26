@extends('admin')

@section('title', 'Tableau de bord')

@section('content')

<div class="pagetitle">
    <h1>Tableau de bord</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Tableau de bord</a></li>
        <li class="breadcrumb-item active">Acceuil</li>
      </ol>
    </nav>
  </div>

  <!-- -->
  <section class="section dashboard">
    <div class="container">
        <div class="row mb-3">
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Visite </font></font><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">| </font><font style="vertical-align: inherit;">Aujourd'hui</font></font></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-eye-fill"></i>
                      </div>
                      <div class="ps-3">
                        <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ Illuminate\Support\Facades\Cookie::get('site_visits', 0) }}</font></font></h6>


                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre de nos catégorie de produit </font></font></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-boxes"></i>
                      </div>
                      <div class="ps-3">
                        @php
                            $counts = App\Models\Category::count();
                        @endphp
                        <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$counts}}</font></font></h6>

                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre totale de nos produits </font></font></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart"></i>
                      </div>
                      <div class="ps-3">
                        @php
                            $count = App\Models\Product::count();
                        @endphp
                        <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$count}}</font></font></h6>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
        </div>

    </div>
  </section>

@endsection
