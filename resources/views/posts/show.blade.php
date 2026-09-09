<x-layout>
    <x-slot:title>
        Bloga ieraksts
    </x-slot:title>

    <section class="page-header">
        <div>
            <h1>Ieraksts #{{ $post->id }}</h1>
            <p class="muted">Kategorija: {{ $post->category->category_name ?? "Nav kategorijas" }}</p>
        </div>
        <div class="actions">
            <a class="button secondary" href="/posts">Atpakaļ</a>
            <a class="button secondary" href="/posts/{{ $post->id }}/edit">Labot</a>
        </div>
    </section>

    <article class="card">
        <p>{{ $post->content }}</p>
    </article>

    <section class="card">
        <h2>Pievienot komentāru</h2>
        <form method="POST" action="/comments">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <div class="field">
                <label for="author">Autors</label>
                <input id="author" name="author" value="{{ old('author') }}" required>
                @error('author')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="content">Komentārs</label>
                <textarea id="content" name="content" required>{{ old('content') }}</textarea>
                @error('content')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit">Pievienot</button>
        </form>
    </section>

    <section class="card">
        <h2>Komentāri</h2>

        @forelse ($post->comments as $comment)
            <article class="comment">
                <strong>{{ $comment->author }}</strong>
                <p>{{ $comment->content }}</p>
                <div class="actions">
                    <a class="button secondary" href="/comments/{{ $comment->id }}/edit">Labot</a>
                    <form method="POST" action="/comments/{{ $comment->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="danger" type="submit">Dzēst</button>
                    </form>
                </div>
            </article>
        @empty
            <p class="muted">Šim ierakstam vēl nav komentāru.</p>
        @endforelse
    </section>
</x-layout>
