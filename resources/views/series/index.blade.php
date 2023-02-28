<x-layout title="{{ __('messages.app_name') }}" :mensagem-sucesso="$mensagemSucesso">
    @auth
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth

        <ul class="list-group">
            @foreach($series as $series)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                @auth <a href="{{ route('seasons.index', $series->id) }}"> @endauth
                    {{ $series->nome }}
                @auth </a> @endauth

                <span class="d-flex">
                    @auth
                    <a href="{{ route('series.edit', $series->id) }}" class="btn btn-primary btn-sm">
                        E
                    </a>
                    @endauth
            
                    <form action="{{ route('series.destroy', $series->id) }}" method="POST" class="ms-2">
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