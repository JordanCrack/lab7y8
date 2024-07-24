@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="mt-3">Sistema de Gestión de Tareas</h2>
            <a class="btn btn-success" href="{{ route('tasks.create') }}">Crear Nueva Tarea</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mt-3">
        <h4>Usuario: {{ Auth::user() ? Auth::user()->name : 'Ninguno' }}</h4>
        <h4>Último Usuario Logueado: {{ $lastUser ? $lastUser->name : 'Ninguno' }}</h4>
    </div>

    <table class="table table-hover table-bordered mt-4">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Prioridad</th>
                <th>Completada</th>
                <th>Etiquetas</th>
                <th>Acciones</th>
                <th>Configuraciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>
                    <span class="badge {{ $task->priority == 'baja' ? 'bg-success' : ($task->priority == 'media' ? 'bg-warning' : 'bg-danger') }}">
                        {{ ucfirst($task->priority) }}
                    </span>
                </td>
                <td>
                    @if ($task->completed)
                    <span class="badge bg-success">Completada</span>
                    @else
                    <span class="badge bg-danger">Pendiente</span>
                    @endif
                </td>
                <td>
                    @foreach ($task->tags as $tag)
                    <span class="badge bg-primary">{{ $tag->name }}</span>
                    @endforeach
                </td>
                <td>
                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-sm btn-primary">Completar</button>
                    </form>
                </td>
                <td>
                    @if ($task->user_id == Auth::id())
                    <a class="btn btn-sm btn-primary" href="{{ route('tasks.edit', $task->id) }}">Editar</a>
                    @else
                    <span class="badge bg-warning text-dark">No autorizado</span>
                    @endif
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $tasks->links() }}
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background: linear-gradient(135deg, #667eea, #764ba2);
        font-family: 'Poppins', sans-serif;
        color: #333;
    }
    .container {
        background: #fff;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
    }
    .alert {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }
    .badge {
        font-size: 0.9rem;
    }
    .btn {
        border-radius: 50px;
        padding: 0.5rem 1rem;
        transition: background-color 0.3s, transform 0.2s;
    }
    .btn-primary {
        background-color: #6c5ce7;
        border: none;
    }
    .btn-primary:hover {
        background-color: #5a4bc2;
        transform: scale(1.05);
    }
    .btn-danger {
        background-color: #e74c3c;
        border: none;
    }
    .btn-danger:hover {
        background-color: #c0392b;
        transform: scale(1.05);
    }
    .btn-success {
        background-color: #27ae60;
        border: none;
    }
    .btn-success:hover {
        background-color: #2ecc71;
        transform: scale(1.05);
    }
    .btn-sm {
        padding: 0.25rem 0.75rem;
        font-size: 0.875rem;
    }
    .mt-3 {
        margin-top: 1rem;
    }
    .mb-4 {
        margin-bottom: 2rem;
    }
    .d-flex {
        display: flex;
    }
    .justify-content-between {
        justify-content: space-between;
    }
    .justify-content-center {
        justify-content: center;
    }
    .align-items-center {
        align-items: center;
    }
    h2 {
        font-weight: 600;
        color: #333;
    }
    h4 {
        font-weight: 500;
        color: #555;
    }
</style>
@endsection
