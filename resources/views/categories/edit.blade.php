<x-layout>
    <x-slot:title>
        Labot kategoriju
    </x-slot:title>

    <section class="page-header">
        <div>
            <h1>Labot kategoriju #{{ $category->id }}</h1>
            <p class="muted">Maini kategorijas nosaukumu.</p>
        </div>
        <a class="button secondary" href="/categories/{{ $category->id }}">Atpakaļ</a>
    </section>

    <form class="form-panel" method="POST" action="/categories/{{ $category->id }}">
        @csrf
        @method('PUT')

        <div class="field">
            <label for="category_name">Nosaukums</label>
            <input id="category_name" name="category_name" value="{{ old('category_name', $category->category_name) }}" required>
            @error('category_name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Saglabāt izmaiņas</button>
    </form>
</x-layout>
