@extends('admin')

@section('title', 'Dashboard')

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('Admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Home</li>
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

    <div class="container">
        <div class="card" style="padding: 20px">
            <div class="row mb-3">
                <div class="col-md-6">
                    <img src="https://picsum.photos/200" alt="lorem ipsum" width="100%">
                </div>
                <div class="col-md-6">
                    <p style="text-align: justify">

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin porttitor tempor tellus, ut laoreet urna feugiat eget. Proin est sem, iaculis ut pretium id, rhoncus at tortor. Praesent a massa lacinia dui luctus efficitur. Aenean sodales sed odio non posuere. Pellentesque magna justo, scelerisque sit amet mi at, vulputate efficitur metus. Proin rhoncus laoreet mauris non sagittis. Curabitur suscipit congue purus quis dignissim. Curabitur quis massa non metus efficitur tincidunt sit amet nec lorem. Aenean egestas purus vitae porttitor blandit. Sed vitae commodo ex, ac consequat arcu. Etiam euismod nulla sit amet orci bibendum tincidunt. Sed ac ipsum et quam ornare ultrices. Aliquam lobortis a magna et luctus. Donec ornare nulla vel congue fermentum. Vivamus interdum laoreet tortor, nec placerat erat porta et. Nam aliquam, ante sit amet suscipit blandit, metus sem convallis orci, non porta mauris enim quis felis.

Praesent pretium sollicitudin nisi, ut placerat lacus ullamcorper in. Suspendisse tincidunt mauris eget pulvinar ullamcorper. Sed consequat tempor ipsum, vitae malesuada ipsum porta tincidunt. Donec sit amet mauris velit. Nulla a dui elit. Phasellus eget ante molestie, iaculis diam at, elementum metus. Proin viverra efficitur nulla, eu lobortis justo. Nulla quis nunc sit amet dolor venenatis sodales vel in ex. Nullam libero lorem, tincidunt nec eleifend quis, posuere imperdiet odio. Phasellus elementum ullamcorper convallis. Maecenas hendrerit consequat elit, at sodales ipsum. Nulla placerat ipsum non ligula sodales commodo. Sed id imperdiet magna. Morbi augue erat, consectetur a eros efficitur, congue ornare libero. Ut semper nunc nec congue tincidunt. Mauris pharetra elementum nulla vel interdum.
Proin rhoncus dui erat, id lobortis neque tristique ut. In posuere semper mauris sit amet porttitor. Pellentesque id dignissim justo. Sed cursus condimentum mauris at varius. Nam vulputate ut dolor eget sagittis. Proin blandit massa at libero malesuada, sed auctor urna hendrerit. Nulla quis pretium arcu.
                    </p>
                </div>
            </div>
        </div>
    </div>
  </section>

@endsection
