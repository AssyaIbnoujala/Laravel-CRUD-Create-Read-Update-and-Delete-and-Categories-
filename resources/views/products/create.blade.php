<!-- resources/views/products/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Produit</title>
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
        input, select {
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
        h1{
            text-align: center;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>Ajouter un Produit</h1>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <label for="name">Nom du Produit</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="price">Prix</label>
        <input type="number" name="price" value="{{ old('price') }}" required>
        @error('price')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="category_id">Catégorie</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
