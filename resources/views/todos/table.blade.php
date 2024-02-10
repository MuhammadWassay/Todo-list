@include('layouts.app')

<!-- resources/views/todos/table.blade.php -->
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session("success") }}
</div>
@endif
<div class="container">
    <h1>Todos Table</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
            <tr>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->detail }}</td>
                <td>
                    <a
                        href="{{ route('todos.edit', $todo) }}"
                        class="btn btn-primary"
                        >Edit</a
                    >
                    <form
                        method="POST"
                        action="{{ route('todos.destroy', $todo) }}"
                        style="display: inline"
                    >
                        @csrf @method('DELETE')
                        <button
                            type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this todo?')"
                        >
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
    }
    .table tbody tr:nth-child(odd) {
        background-color: white; /* Set background color for odd rows */
    }
    .table tbody tr:nth-child(even) {
        background-color: lightgrey; /* Set background color for even rows */
    }
</style>
