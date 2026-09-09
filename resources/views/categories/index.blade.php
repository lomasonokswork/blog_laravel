<x-layout>
    <x-slot:title>
        Kategorijas
    </x-slot:title>

    <section class="page-header">
        <div>
            <h1>Kategorijas</h1>
            <p class="muted">Bloga ierakstu grupas.</p>
        </div>
        <a class="button" href="/categories/create">Pievienot kategoriju</a>
    </section>

    <section class="grid">
        @forelse ($categories as $category)
            <article class="card">
                <h2>{{ $category->category_name }}</h2>
                <p class="muted">Kategorija #{{ $category->id }}</p>
                <div class="actions">
                    <a class="button secondary" href="/categories/{{ $category->id }}">Apskatīt</a>
                    <a class="button secondary" href="/categories/{{ $category->id }}/edit">Labot</a>
                    <form method="POST" action="/categories/{{ $category->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="danger" type="submit">Dzēst</button>
                    </form>
                </div>
            </article>
        @empty
            <article class="card">
                <h2>Nav kategoriju</h2>
                <p class="muted">Izveido pirmo kategoriju, lai varētu pievienot bloga ierakstus.</p>
            </article>
        @endforelse
    </section>
</x-layout>
