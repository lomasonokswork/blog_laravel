<x-layout>
    <x-slot:title>
        Bloga ieraksti
    </x-slot:title>

    <section class="page-header">
        <div>
            <h1>Bloga ieraksti</h1>
            <p class="muted">Visi publicētie ieraksti.</p>
        </div>
        <a class="button" href="/posts/create">Pievienot ierakstu</a>
    </section>

    <section class="grid">
        @forelse ($posts as $post)
            <article class="card">
                <p class="muted">Kategorija: {{ $post->category->category_name ?? "Nav kategorijas" }}</p>
                <h2>Ieraksts #{{ $post->id }}</h2>
                <p>{{ $post->content }}</p>
                <div class="actions">
                    <a class="button secondary" href="/posts/{{ $post->id }}">Lasīt</a>
                    <a class="button secondary" href="/posts/{{ $post->id }}/edit">Labot</a>
                    <form method="POST" action="/posts/{{ $post->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="danger" type="submit">Dzēst</button>
                    </form>
                </div>
            </article>
        @empty
            <article class="card">
                <h2>Nav ierakstu</h2>
                <p class="muted">Kad pievienosi pirmo bloga ierakstu, tas parādīsies šeit.</p>
            </article>
        @endforelse
    </section>
</x-layout>
