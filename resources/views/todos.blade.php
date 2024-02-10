@include('layouts.app')

<!-- resources/views/todos/table.blade.php -->
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session("success") }}
</div>
@endif
<div class="container mt-5">
    <h1>Todos Table</h1>
    <form action="{{ route('todos.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input
                type="text"
                class="form-control"
                placeholder="Search by title"
                name="search"
                value="{{ $search }}"
            />
            <button class="btn btn-primary ml-2" type="submit">Search</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
            <tr>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->detail }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $todos->links() }}
    </div>
</div>

<style>
    .table {
        border: 1px solid grey;
        border-radius: 7px;
        width: -webkit-fill-available;
        vertical-align: bottom;
        text-align: center;
    }
    .container {
        margin: auto 70px;
        border-radius: 5px;
    }
    .d-flex {
        /* width: 10px; */
        justify-content: center;
        display: flex;
    }
    .table tbody tr:nth-child(odd) {
        background-color: white;
        /* Set background color for odd rows */
    }
    .table tbody tr:nth-child(even) {
        background-color: lightgrey; /* Set background color for even rows */
    }
</style>
