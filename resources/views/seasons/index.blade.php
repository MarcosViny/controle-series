<x-layout title="Temporadas de {!! $series->nome !!}">
    <div class="d-flex justify-center">
        <img class="me-3" @if ($series->cover)
        src="{{ asset('storage/' . $series->cover) }}"
        @else
        src="{{ asset('storage/series_cover/no-image.jpg') }}"
        @endif
        class="img-thumbnail"
        alt="Capa da Série"
        >
    </div>

    <ul class="list-group">
        @foreach($seasons as $season)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('episodes.index', $season->id) }}">
                Temporada {{ $season->number }}
            </a>

            <span class="badge bg-secondary">
                {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
            </span>
        </li>
        @endforeach
    </ul>
</x-layout>