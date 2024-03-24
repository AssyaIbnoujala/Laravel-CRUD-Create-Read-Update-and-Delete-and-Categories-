<!-- resources/views/categories/edit.blade.php -->
<h1>Modifier la Catégorie</h1>
<form method="POST" action="{{ route('categories.update', $category->id) }}">
    @csrf
    @method('PUT')
    <label for="name">Nom:</label><br>
    <input type="text" id="name" name="name" value="{{ $category->name }}"><br><br>
    <button type="submit">Enregistrer</button>
</form>
