<x-layout>
    <x-slot:title>
        Kategorija
    </x-slot:title>

    <section class="page-header">
        <div>
            <h1>{{ $category->category_name }}</h1>
            <p class="muted">Kategorija #{{ $category->id }}</p>
        </div>
        <div class="actions">
            <a class="button secondary" href="/categories">Atpakaļ</a>
            <a class="button secondary" href="/categories/{{ $category->id }}/edit">Labot</a>
        </div>
    </section>

    <section class="card">
        <h2>Šīs kategorijas ieraksti</h2>

        @forelse ($category->posts as $post)
            <article class="comment">
                <h3>Ieraksts #{{ $post->id }}</h3>
                <p>{{ $post->content }}</p>
                <a href="/posts/{{ $post->id }}">Lasīt ierakstu</a>
            </article>
        @empty
            <p class="muted">Šajā kategorijā vēl nav ierakstu.</p>
        @endforelse
    </section>
</x-layout>
