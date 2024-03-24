<!-- resources/views/products/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Modifier un Produit</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            margin-top: 10px;
            display: block;
        }
        input,
        select {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 5px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h1>Modifier un Produit</h1>
    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Nom du Produit</label>
        <input type="text" name="name" value="{{ $product->name }}" required>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="price">Prix</label>
        <input type="text" name="price" value="{{ $product->price }}" required>
        @error('price')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="category_id">Catégorie</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</body>
</html>
