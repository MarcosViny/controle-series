<x-layout title="Editar Série '{!! $series->nome !!}'">
    <form action="{{ route('series.update', $series->id) }}" method="POST">
        @csrf

        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text"
                   id="nome" 
                   name="nome" 
                   class="form-control"
                   value="{{ $series->nome }}">
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>