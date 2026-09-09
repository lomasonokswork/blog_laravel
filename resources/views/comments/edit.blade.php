<x-layout>
    <x-slot:title>
        Labot komentāru
    </x-slot:title>

    <section class="page-header">
        <div>
            <h1>Labot komentāru #{{ $comment->id }}</h1>
            <p class="muted">Komentārs pie ieraksta #{{ $comment->post_id }}</p>
        </div>
        <a class="button secondary" href="/posts/{{ $comment->post_id }}">Atpakaļ</a>
    </section>

    <form class="form-panel" method="POST" action="/comments/{{ $comment->id }}">
        @csrf
        @method('PUT')

        <input type="hidden" name="post_id" value="{{ old('post_id', $comment->post_id) }}">

        <div class="field">
            <label for="author">Autors</label>
            <input id="author" name="author" value="{{ old('author', $comment->author) }}" required>
            @error('author')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="content">Komentārs</label>
            <textarea id="content" name="content" required>{{ old('content', $comment->content) }}</textarea>
            @error('content')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Saglabāt izmaiņas</button>
    </form>
</x-layout>
