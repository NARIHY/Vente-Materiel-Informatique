<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$product->name}} - Nouveau Produit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        h4 {
            color: #333;
            text-align: center;
        }

        p {
            color: #666;
            line-height: 1.6;
            text-align: justify;
        }

        .description {
            font-weight: bold;
        }

        .product-details {
            margin-top: 20px;
            padding: 20px;
            background-color: #f0f0f0;
        }

        .product-details p {
            margin: 0;
        }

        .product-image {
            max-width: 100%;
            height: auto;
        }

        .center {
            text-align: center;
        }

        .logo {
            text-align: right;
        }

        .logo img {
            max-width: 150px;
            height: auto;
        }

        .link {
            text-align: center;
        }

        .link a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://www.accentic.net/wp-content/uploads/2023/08/cropped-accentic-logo-1-160x53.png" alt="Logo de l'entreprise">
        </div>
        <h4>À l'attention de nos précieux clients,</h4>
        <p>
            Nous sommes ravis de vous annoncer le lancement de notre dernier produit révolutionnaire : <strong>{{$product->name}}</strong>. Chez Accentic Technology, nous sommes constamment à la recherche de moyens d'innover et de répondre à vos besoins, et c'est avec une grande excitation que nous vous présentons notre dernière création.
        </p>
        <p class="description">
            {{$product->Description}}
        </p>
        <div class="product-details">
            <p>
                <strong>Product Name:</strong> {{$product->name}}<br>
                <strong>Quantité en Stock :</strong> {{$product->quantityInStock}} unités disponibles<br>
                <strong>Petite Description du Produit:</strong> {{$product->Description}}<br>
                <strong>Prix :</strong> {{number_format($product->Price, 0, '.', ' ')}} Ar<br>
                @php
                    $category = App\Models\Category::findOrFail($product->categoryId);
                @endphp
                <strong>Catégorie:</strong> {{$category->name}}<br>
            </p>
            <div class="link">
                <a href="{{route('Public.Product.view', ['id' => $product->id])}}">Lien vers le produit</a>
            </div>
            <p>
                Nous sommes impatients de vous compter parmi les premiers à profiter de cette innovation exceptionnelle. Merci de votre confiance envers Accentic Technology.
            </p>
        </div>
    </div>
</body>
</html>
