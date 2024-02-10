@include('layouts.app')

<!-- resources/views/todos/create.blade.php -->
<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session("success") }}
    </div>
    @endif

    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>Create Todo</h1></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('todos.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title"><h4>Title</h4></label>
                            <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                            />
                        </div>
                        <div class="form-group">
                            <label for="detail"><h4>Description</h4></label>
                            <textarea
                                class="form-control"
                                id="detail"
                                name="detail"
                                rows="3"
                            ></textarea>
                        </div>
                        <input
                            type="hidden"
                            name="user_id"
                            value="{{ Auth::id() }}"
                        />
                        <!-- You can hide the user_id input and set its value to the currently authenticated user's ID -->
                        <button type="submit" class="btn btn-primary mt-2">
                            Create
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .container {
        width: 400px;
        /* padding: 25px;
        border: 1px solid; */
        border-radius: 25px;
    }
    .form-group {
        margin: inherit;
        justify-content: center;
        border-radius: 2px;
    }
    .btn {
        border: 1px solid;
        background: lightslategrey;
        color: white;
        padding: 12px;
        border-radius: 7px;
        font-size: 16px;
    }
    .form-control {
        width: 100%;
        height: 40px;
        border-radius: 4px;
    }
</style>
