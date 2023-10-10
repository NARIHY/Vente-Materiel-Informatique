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
                    <h5 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Visits </font></font><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">| </font><font style="vertical-align: inherit;">Totals</font></font></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-eye-fill"></i>
                      </div>
                      <div class="ps-3">
                        <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $visits }}</font></font></h6>


                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Number of our product categories </font></font></h5>

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
                    <h5 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total number of our products </font></font></h5>

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
                <div class="col-md-4 text-center">
                    <h5 class="card-title">Visits for today</h5>
                    <div class="ps-3">
                        <h4>{{$visitsToday}}</h4>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <h5 class="card-title">Visits for this month</h5>
                    <div class="ps-3">
                        <h4>{{$visitsThisMonth}}</h4>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <h5 class="card-title">Visits for this years</h5>
                    <div class="ps-3">
                        <h4>{{$visitsThisYear}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card" style="padding: 20px">
            <div class="row mb-3">
                <div class="col-md-4 text-center">
                    <h4 class="card-title">Subscriber</h4>
                    <div class="ps-3">
                        <h4>{{$subscriber}}</h4>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <h4 class="card-title">total number of accounts</h4>
                    <div class="ps-3">
                        <h4>{{$compte}}</h4>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <h4 class="card-title">Product request</h4>
                    <div class="ps-3">
                        <h4>{{$contact}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

@endsection
