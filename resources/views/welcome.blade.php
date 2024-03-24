{{-- <a href="{{  route('products.index')  }}" >Liste Des Produits</a>
<a href="{{  route('categories.index')  }}" >Liste Des Categories</a> --}}



<!DOCTYPE html>
<html>
<head>
    <title>Ma Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        
    </style>
</head>
<body>
    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Liste Des Produits</a>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-lg">Liste Des Categories</a>
</body>
</html>

