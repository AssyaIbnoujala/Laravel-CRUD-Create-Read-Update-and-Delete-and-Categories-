<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($category) ? 'Modifier une Catégorie' : 'Ajouter une Catégorie' }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Optional: Add custom CSS here */
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
        input {
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
        h1 {
            text-align: center;
            margin: 20px;
        }
       
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ isset($category) ? 'Modifier une Catégorie' : 'Ajouter une Catégorie' }}</h1>
        <form method="POST" action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}">
            @csrf
            @if (isset($category))
                @method('PUT')
            @endif
            <label for="name">Nom de la Catégorie</label>
            <input type="text" name="name" value="{{ isset($category) ? $category->name : '' }}" required>
            <button type="submit">{{ isset($category) ? 'Modifier' : 'Ajouter' }}</button>
        </form>
    </div>
</body>
</html>
