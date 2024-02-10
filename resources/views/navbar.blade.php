<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="mt-5 mb-5">
        <button
            onclick="window.location='{{ route('todos.create') }}'"
            class="btn btn-primary"
        >
            Create Todo
        </button>
        <button
            onclick="window.location='{{ route('todos.table') }}'"
            class="btn btn-primary"
        >
            Edit Todos Table
        </button>
        <form
            id="logout-form"
            action="{{ route('logout') }}"
            method="POST"
            style="display: none"
        >
            @csrf
        </form>

        <button
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="btn btn-danger"
        >
            Logout
        </button>
        @if(isset($success))
        <div class="alert alert-success">
            {{ $success }}
        </div>
        @endif
    </div>
</nav>
<style>
    .btn {
        border: 1px solid;
        background: lightslategrey;
        color: white;
        padding: 12px;
        border-radius: 7px;
        font-size: 16px;
    }
</style>
