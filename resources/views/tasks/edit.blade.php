@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card edit-task-card">
                <div class="card-header text-center">Editar Tarea</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>¡Vaya!</strong> Hubo algunos problemas con tu entrada.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Título</label>
                            <input type="text" name="title" value="{{ $task->title }}" class="form-control" placeholder="Título">
                        </div>

                        <div class="mb-3">
                            <label for="priority" class="form-label">Prioridad</label>
                            <select name="priority" class="form-control">
                                <option value="baja" @if($task->priority == 'baja') selected @endif>Baja</option>
                                <option value="media" @if($task->priority == 'media') selected @endif>Media</option>
                                <option value="alta" @if($task->priority == 'alta') selected @endif>Alta</option>
                            </select>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="hidden" name="completed" value="0">
                            <input type="checkbox" name="completed" value="1" class="form-check-input" {{ $task->completed ? 'checked' : '' }}>
                            <label for="completed" class="form-check-label">Completada</label>
                        </div>

                        <div class="mb-3">
                            <label for="tags" class="form-label">Etiquetas</label>
                            <select name="tags[]" id="tags" class="form-control" multiple>
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" {{ $task->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">
                                Actualizar
                            </button>
                            <a class="btn btn-secondary" href="{{ route('tasks.index') }}">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tags').select2();
    });
</script>
@endsection

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<style>
    body {
        background: linear-gradient(135deg, #667eea, #764ba2);
        font-family: 'Poppins', sans-serif;
    }
    .edit-task-card {
        background: #fff;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
    }
    .card-header {
        font-weight: 600;
        font-size: 1.5rem;
        color: #333;
    }
    .form-label {
        font-weight: 600;
        color: #333;
    }
    .form-control {
        border-radius: 10px;
        border: 1px solid #ddd;
        padding: 0.75rem;
        font-size: 1rem;
    }
    .btn-primary {
        background-color: #6c5ce7;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-size: 1rem;
        transition: background-color 0.3s, transform 0.2s;
    }
    .btn-primary:hover {
        background-color: #5a4bc2;
        transform: scale(1.02);
    }
    .btn-secondary {
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-size: 1rem;
    }
</style>
@endsection
