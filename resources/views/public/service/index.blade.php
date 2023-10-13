@extends('public')
@section('title', 'Nos service')

@section('content')
<main id="main">
    <section id="about" class="about" style="margin-top: 80px">
        <div class="container">

          <div class="row content">
            <div class="col-lg-6" id="left">
              <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Accentic Technologie: Your Gateway to IT Excellence</font></font></h2>
              <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">IT excellence at every click, your technology partner.</font></font></h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" id="right">
              <p style="justify">Accent Technology: Your trusted partner for unparalleled IT excellence. We offer quality products, expert advice, and exceptional customer service to support you on your IT journey to excellence.</p>
              <ul>
                <li><i class="ri-check-double-line"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">IT Excellence</font></font></li>
                <li><i class="ri-check-double-line"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trusted Partnership</font></font></li>
                <li><i class="ri-check-double-line"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dedication to Customer Satisfaction </font><font style="vertical-align: inherit;">Dedication to Customer Satisfaction</font></font></li>
              </ul>
              <p class="fst-italic" style="text-align: justify"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
              Thus, at Accent Technologie, we constantly strive to make each interaction a memorable experience for our customers. However, our commitment does not stop there. Now discover the specific areas where we excel and how we can help you achieve your IT goals with confidence and expertise
              </font></font></p>
            </div>
          </div>

        </div>
      </section>

      <section id="Service">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-md-6" id="left">
                        <img src="{{asset('public/img/accentic.jpg')}}" alt="accentic" width="100%">
                        <div style="margin-top: 15px">
                            <h5 class="title-6">Accentic Technology is a major player in the computer technology field, offering a full range of products, from laptops to high-end components. Our commitment to IT excellence is at the heart of who we are, and we have established a strong reputation as a trusted provider for professionals and individuals seeking quality IT solutions. Our team of experts is here for you guiding you through every step of your IT journey, offering insightful advice, exceptional customer service, and best-in-class products. Join us at Accentic Technology and discover why we are more than just a technology provider, we are your trusted partner in the ever-changing world of technology.</h5>
                        </div>
                    </div>
                    <div class="col-md-6" id="right">
                        <h3>Customer need: </h3>
                        <p style="text-align:justify">This client, eager to maximize the efficiency of their creative team with quality laptops, is facing unexpected challenges due to slowness and software compatibility issues, hampering their workflow and productivity. They are now looking for a reliable solution to solve these IT problems.</p>

                        <h3>accentic technology Technical Support Service: </h3>
                        <p style="text-align: justify">
                        The customer turns to Accentic Technology in search of assistance, knowing that they offer a comprehensive technical support service, backed by a team of highly trained IT experts, ready to resolve a variety of IT issues to restore business productivity. 'business. 'creative team'.
                        </p>

                        <h3>Resolution :</h3>
                        <p style="text-align: justify">
                        The customer contacts Accentic Technology's technical support service by telephone and explains the problems encountered. The technical support team asks questions to better understand specific issues. They then propose a solution that involves software updates and configuration adjustments on the marketing company's laptops.

                        </p>
                        <p style="text-align: justify">
                        The technical support team guides the customer step by step to make these adjustments, and they stay in contact with them throughout the process. After implementing the recommended solutions, slowness and compatibility issues are resolved, and the marketing team returns to optimal productivity.
                        </p>
                    </div>

                </div>
            </div>
      </section>
      <section class="category">
        <h3 class="third-title">Here are some of our products:</h3>
        <div class="container">
            <div class="row mb-3 hidden_container">
                <div class="slider-container">

                    @forelse ($product as $products)
                    <div class="card" style="padding: 10px">
                        @php
                            $sales = "";
                            //get sale_information
                            if(!empty($products->sales_information)) {
                                $sales = App\Models\SaleInformation::findOrFail($products->sales_information);
                            }

                        @endphp
                        @if (!empty($sales))
                        <h3 class="card-title" @if($sales->description == "Promotions") style="color:red" @endif>{{$sales->description}}</h3>
                        @else
                        <h3 class="card-title" style="color:black" >For sale</h3>
                        @endif

                        <div class="card-body">
                            <img src="/storage/{{$products->picture}}" alt="Product" class="card-img">
                            <h3 class="title-product">{{$products->name}}</h3>
                            @php
                            $text = new Nari\Text();
                            @endphp
                            <p class="product-text">

                                {{ $text->excerpt($products->Description, 60)}}
                            </p>
                            <p class="quantity">Quantity in stock: <b class="quantity-stock" @if ($products->quantityInStock < 5) style="color: red" @endif>{{$products->quantityInStock}}</b></p>
                            <h4 class="price">Price: <b class="price-price">{{number_format($products->Price, 0, '.', ' ')}} Ar</b></h4>
                            <a href="{{route('Public.Product.view', ['id' => $products->id])}}" class="btn btn-primary" style="float: right; margin-right:10px;"><i class="bi bi-plus-circle-dotted"></i></a>
                        </div>

                    </div>
                    @empty
                    <div class="empty">
                    No products available at the moment
                    </div>
                    @endforelse
                </div>
                    @if ($product->count() > 2)
                        <div class="slider-buttons">
                            <button class="prev-button" >
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAACXBIWXMAAAsTAAALEwEAmpwYAAABfElEQVR4nO3cbUrEMBSF4W5C0WXdQDasuAHnh2tJ/xyJKAxI0jb3TgfN+8CAqBU59PVrapcFAABgmMwe62P8I0xMOT+sKb2vZh8ye7735/M3x0tJXw9G3K8mu6Z0+R7vcv0yOR858+pZl/PTr9eR8/7xmm9jxH62P6kWs7eS0mvvfaanzjB1vGL2sjX0tNTJdvcxs+asHdkeOW4qOpDt3uOmoYFsPcf9KyLbcWTrQLYOZOtAtg5k60C2DmTrGS/zQ3L4mVf43XYb2TqIbB3jGdmGj1fxJ6kNZOsgso0fryLbDeK77TiRbfx4FdluENmOE9neaMDUft62d9yUNHgZBZdfXGHEADqQJZekOUcsXJLWORP5mugncj5vxELObeQcQOR83oiFnNvIOYDI+bwRCzm3kXMAkbMfOQcg5wDkHICcA5BzAHIOQM4ByDkAOd8pZ564d+TMP107RmQ8x4iM5xiR8Q7i5mO3uv3djHfpCLsBI+ON4RagAAAsE/oE4iIkkOSR0NEAAAAASUVORK5CYII=">
                            </button>
                            <button class="next-button" >
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAACXBIWXMAAAsTAAALEwEAmpwYAAABgElEQVR4nO2cUWrDMBAFfYmG9lgr0IVbeoHmo2eRf7aotGAotiPts0OqGTCEJAIzaEhiK5omAAAAGAA3u9Tj3ufxkHjOT3NKH7PZp5u93Pt8HlNeSv59ILFBntllTun6I++6fEzOLTOvzrqcn/88R863y1t9DYnb2f6mWszeS0pvW+8ZHt8QU+UVs9c90cPiG9nePGbknL1hRpFzUGIh542Z2JklOS8gZwFOzgKJmZxPm4kVPp1XIGcBTs4CiUbOp0ksfNleh5wFODnHIWcB5CyAnAWQswByFkDOAshZADkLIGcB5CyAnAWQ85kCF5fCWEIy9S0biYz7Vzjyjl0q1zJuKLxhqdyt44bBybYfsg1AtgHINgDZBiDbAGQbgGwDkG1EXubCgHzmFX7b7kO2AZxsA/KMbOXyKlyS2oFsAzjZ6uVVyHYH59O2HyfbgwQmbgAd8ncu56Z3v0TkBSQ6M69foiOvDWfzsYO2v8sDrpKSbcCYkdcn0dgCFAAAACYRX4CaJJ6XLrD8AAAAAElFTkSuQmCC">
                            </button>
                        </div>
                    @endif



            </div>


        </div>
        <div style="text-align: center">
            <a href="{{route('Public.Product.listing')}}">See more</a>
        </div>
      </section>
</main>

@endsection
