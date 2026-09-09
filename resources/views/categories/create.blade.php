<x-layout>
    <x-slot:title>
        Jauna kategorija
    </x-slot:title>

    <section class="page-header">
        <div>
            <h1>Jauna kategorija</h1>
            <p class="muted">Pievieno kategorijas nosaukumu.</p>
        </div>
        <a class="button secondary" href="/categories">Atpakaļ</a>
    </section>

    <form class="form-panel" method="POST" action="/categories">
        @csrf

        <div class="field">
            <label for="category_name">Nosaukums</label>
            <input id="category_name" name="category_name" value="{{ old('category_name') }}" required>
            @error('category_name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Saglabāt</button>
    </form>
</x-layout>
