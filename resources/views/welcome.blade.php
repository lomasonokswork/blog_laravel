<x-layout>
    <x-slot:title>
        Laravel blogs
    </x-slot:title>

    <section class="page-header">
        <div>
            <h1>Laravel blogs</h1>
        </div>
        <a class="button" href="/posts">Apskatīt blogu</a>
    </section>

    <section class="grid">
        <article class="card">
            <h2>Bloga ieraksti</h2>
            <p>Pārskati visus bloga ierakstus, un aizej uz to detalizētu lapu.</p>
            <a href="/posts">Atvērt ierakstus</a>
        </article>
        <article class="card">
            <h2>Kategorijas</h2>
            <p>Pārskati visas kategorijas, un ierakstus kas atrodas tajās.</p>
            <a href="/categories">Atvērt kategorijas</a>
        </article>
        <article class="card">
            <h2>Komentāri</h2>
            <p>Komentārus vari redzēt un rakstīt pie katra bloga ieraksta detalizētā skata.</p>
            <a href="/posts">Komentēt pie ieraksta</a>
        </article>
    </section>
</x-layout>
