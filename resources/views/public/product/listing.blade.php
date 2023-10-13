@extends('public')
@section('title', $categ->name)

@section('content')
<main id="main">
<div class="container" style="margin-top: 80px; padding:20px">
    <h2 style="color: rgb(46, 46, 46)">For our {{$categ->name}},We have:</h2>
    <div class="row mb-3">

            @forelse ($product as $products)

                <div class="cards">
                    @php
                        $sales = "";
                        //get sale_information
                        if(!empty($products->sales_information)) {
                            $sales = App\Models\SaleInformation::findOrFail($products->sales_information);
                        }

                    @endphp
                    @if (!empty($sales))
                    <h4 class="card-title" @if($sales->Description == "1") style="color:red" @endif>{{$sales->Description}}</h4>
                    @endif

                    <div class="card-body">
                        <img src="/storage/{{$products->picture}}" alt="Product" class="card-img">
                        <a href="{{route('Public.Contact.product', ['id' => $products->id])}}"><h3 class="title-product">{{$products->name}}</h3></a>

                        @php
                        $text = new Nari\Text();
                        @endphp
                        <p class="product-text" >

                            {{ $text->excerpt($products->Description, 40)}}
                        </p>
                        <p class="quantity">Quantity in stock: <b class="quantity-stock" @if ($products->quantityInStock < 5) style="color: red" @endif>{{$products->quantityInStock}}</b></p>
                        <h4 class="price">Price: <b class="price-price">{{number_format($products->Price, 0, '.', ' ')}} Ar</b></h4>
                        <a href="{{route('Public.Product.view', ['id' => $products->id])}}" class="btn btn-primary" style="float: right; margin-right:10px;">Show all</a>
                    </div>

                </div>



            @empty
            <div class="empty">
                Oops, we don't have any products at the moment
            </div>
            @endforelse

    </div>




</div>
</main>
@endsection
