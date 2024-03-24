<!-- resources/views/products/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Produits</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .actions {
            white-space: nowrap;
        }
        .actions a, .actions button {
            margin-right: 5px;
        }
        h1 {
            text-align: center;
        }
       div {
             text-align: center;
            }
    </style>
</head>
<body>
    <h1>Liste des Produits</h1>
    <div >
    <a href="{{ route('products.create') }}" class="btn btn-info mb-3">Ajouter un Produit</a>
   </div>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ optional($product->category)->name }}</td>
                 {{-- <td >{{ $product->category->name }}</td> --}}
                <td class="actions">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-success">Éditer</a>
                    <form method="POST" action="{{ route('products.destroy', $product->id) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


