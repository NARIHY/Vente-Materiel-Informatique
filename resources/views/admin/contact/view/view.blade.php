@extends('admin')

@section('title', 'Message reçu')

@section('content')
<div class="pagetitle">
    <h1>Message reçu</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('Admin.Contact.listing')}}">Message reçu</a></li>
        <li class="breadcrumb-item active">{{$contact->subject}}</li>

      </ol>
    </nav>
  </div>
  <div class="container">
        <div class="card" style="padding: 10px">
            <h1 style="text-align: center; font-family:Verdana, Geneva, Tahoma, sans-serif">Message reçu</h1>
            <div style="text-align: left; margin-left:15px">
                <p>{{$contact->last_name}} {{$contact->name}}</p>
                <p style="color: blue">{{$contact->email}}</p>
                @php
                $date = Carbon\Carbon::parse($contact->created_at);
                $dateFormated = $date->format('D d M Y');
                @endphp
                <p>{{$dateFormated}}</p>
            </div>
            <div style="text-align: right; margin-right:15px">
                <p>Madame/Monsieur le responsable</p>
                <p style="color: blue">Accentic technology</p>
                <p style="color: red">contact@accentic.mg</p>
            </div>
            <div>
                <h6 style="margin-left: 80px"><b style="text-decoration: underline; color:black">Objet:</b> {{$contact->subject}} </h6 style="margin-left: 80px">
            </div>
            <div>
                <p style="margin-left: 30px">Madame, Monsieur,</p>

                <div class="container" style="padding: 15px">
                    <p style="text-align: justify; margin-bottom:5px">Je vous écris pour exprimer mon intérêt à établir un contact et à discuter d'opportunités de collaboration ou d'autres sujets d'intérêt mutuel. J'ai récemment eu l'occasion de découvrir votre entreprise Accentic Technology et j'ai été impressionné par  vos produits innovants/votre engagement envers la durabilité/votre réputation dans le secteur informatique, et divers encore.</p>
                    <p style="text-align: justify; margin-bottom:5px">En tant que fanatique de l'informatique, je crois que nos chemins pourraient se croiser de manière bénéfique. Je suis passionné(e) par tous vos produit, et offres et je serais ravi(e) de discuter de la manière dont nous pourrions collaborer ou partager des idées.</p>
                    <p style="text-align: justify; margin-bottom:5px">{{$contact->content}}</p>
                    @if (!empty($contact->product))
                        <p style="text-align: justify; margin-bottom:5px">
                            @php
                                $product = App\Models\Product::findOrFail($contact->product);
                                $categ = App\Models\Category::findOrFail($product->categoryId);
                            @endphp
                            Je désire obtenir davantage d'informations concernant votre produit {{$product->name}}, dans la catégorie {{$categ->name}}.
                            Je suis enthousiastes à l'idée d'échanger en profondeur sur la manière dont votre produit peut être adapté à mes besoins spécifiques.
                        </p>
                    @endif

                    <p style="text-align: justify; margin-bottom:5px">En attendant, je vous remercie de prendre le temps de lire ma lettre et j'espère que nous pourrons échanger plus en détail dans un proche avenir. Si vous avez des questions ou si vous souhaitez discuter de cette opportunité, vous pouvez me joindre  par e-mail à <b style="text-decoration: underline; color:blue;">{{$contact->email}}</b>.</p>
                    <p style="text-align: justify">Je vous adresse, Cher(e) Madame/Monsieur le responsable de l'accentic technology, l'expression de mes salutations distinguées. <br> Cordialement,</p>
                    <h4 style="color: rgb(0, 0, 0); text-align:left; margin-left:15px">{{$contact->last_name}} {{$contact->name}}</h4>
                </div>


            </div>

        </div>

  </div>
  @endsection
