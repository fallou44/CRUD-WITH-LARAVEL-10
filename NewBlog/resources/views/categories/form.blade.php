<div class="form-group mb-3">
    <label for="name">
        Nom de votre categorie
    </label>
    <input value="@isset($category->name){{ $category->name }}@endisset" required type="text" name="name"
        class="form-control">
</div>
