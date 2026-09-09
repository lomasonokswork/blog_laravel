<x-layout>
    <x-slot:title>
        Labot ierakstu
    </x-slot:title>

    <section class="page-header">
        <div>
            <h1>Labot ierakstu #{{ $post->id }}</h1>
            <p class="muted">Maini saturu vai izvēlies citu kategoriju pēc nosaukuma.</p>
        </div>
        <a class="button secondary" href="/posts/{{ $post->id }}">Atpakaļ</a>
    </section>

    <form class="form-panel" method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method('PUT')

        <div class="field">
            <label for="content">Saturs</label>
            <textarea id="content" name="content" required>{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="category_id">Kategorija</label>
            <select id="category_id" name="category_id" required>
                <option value="">Izvēlies kategoriju</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Saglabāt izmaiņas</button>
    </form>
</x-layout>
