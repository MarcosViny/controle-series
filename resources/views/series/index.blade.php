<x-layout title="{{ __('messages.app_name') }}" :mensagem-sucesso="$mensagemSucesso">
    @auth
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth

        <ul class="list-group">
            @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img 
                        class="me-3" 
                        @if ($serie->cover)
                            src="{{ asset('storage/' . $serie->cover) }}" 
                        @else
                            src="{{ asset('storage/series_cover/no-image.jpg') }}"
                        @endif
                        width="100" 
                        class="img-thumbnail" 
                        alt="Capa da Série"
                    >
                    
                    @auth <a href="{{ route('seasons.index', $serie->id) }}"> @endauth
                        {{ $serie->nome }}
                    @auth </a> @endauth
                </div>

                <span class="d-flex">
                    @auth
                    <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">
                        E
                    </a>
                    @endauth
            
                    <form action="{{ route('series.destroy', $serie->id) }}" method="POST" class="ms-2">
                        @csrf
                        @method('DELETE')
                        @auth
                        <button class="btn btn-danger btn-sm">
                            X
                        </button>
                        @endauth

                    </form>
                </span>
            </li>
            @endforeach
        </ul>
</x-layout>