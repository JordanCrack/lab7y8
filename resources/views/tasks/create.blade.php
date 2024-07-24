@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Crear Nueva Tarea</h4>
                </div>

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

                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        <div class="mb-3 row">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Título</label>
                            <div class="col-md-6">
                                <input type="text" name="title" class="form-control" placeholder="Título" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="priority" class="col-md-4 col-form-label text-md-end">Prioridad</label>
                            <div class="col-md-6">
                                <select name="priority" class="form-control" required>
                                    <option value="baja">Baja</option>
                                    <option value="media" selected>Media</option>
                                    <option value="alta">Alta</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tags" class="col-md-4 col-form-label text-md-end">Etiquetas</label>
                            <div class="col-md-6">
                                <select name="tags[]" id="tags" class="form-control" multiple required>
                                    @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear
                                </button>
                                <a class="btn btn-secondary" href="{{ route('tasks.index') }}">Regresar</a>
                            </div>
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
        $('#tags').select2({
            placeholder: 'Selecciona etiquetas',
            width: '100%'
        });
    });
</script>
@endsection

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    .card-header {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        border-bottom: none;
        border-radius: 15px 15px 0 0;
    }
    .card {
        border-radius: 15px;
    }
    .btn-primary {
        background-color: #6c5ce7;
        border: none;
        transition: background-color 0.3s, transform 0.2s;
    }
    .btn-primary:hover {
        background-color: #5a4bc2;
        transform: scale(1.02);
    }
    .form-control {
        border-radius: 10px;
        border: 1px solid #ddd;
        padding: 0.75rem;
        font-size: 1rem;
    }
</style>
@endsection
