@include('layouts.app') @if(session()->has('success'))
<div class="alert alert-success">
    {{ session("success") }}
</div>
@endif

<div class="container mt-5">
    <h1>Edit Todo</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form
                        action="{{ route('todos.update', $todo) }}"
                        method="POST"
                    >
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="title"><h4>Title</h4></label>
                            <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                                value="{{ $todo->title }}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="detail"><h4>Description</h4></label>
                            <textarea
                                class="form-control"
                                id="detail"
                                name="detail"
                                rows="3"
                                >{{ $todo->detail }}</textarea
                            >
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">
                            Update
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
        margin: 50px auto;
        padding: 25px;
        /* border: 1px solid; */
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
