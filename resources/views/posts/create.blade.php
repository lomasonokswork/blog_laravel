<x-layout>
    <x-slot:title>
        Jauns bloga ieraksts
    </x-slot:title>

    <section class="page-header">
        <div>
            <h1>Jauns bloga ieraksts</h1>
            <p class="muted">Izvēlies kategoriju pēc nosaukuma un pievieno ieraksta saturu.</p>
        </div>
        <a class="button secondary" href="/posts">Atpakaļ</a>
    </section>

    <form class="form-panel" method="POST" action="/posts">
        @csrf

        <div class="field">
            <label for="content">Saturs</label>
            <textarea id="content" name="content" required>{{ old('content') }}</textarea>
            @error('content')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="category_id">Kategorija</label>
            <select id="category_id" name="category_id" required>
                <option value="">Izvēlies kategoriju</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Saglabāt</button>
    </form>
</x-layout>
