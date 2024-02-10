<!-- resources/views/auth/register.blade.php -->
@if(session('success'))
<div class="alert alert-success">{{ session("success") }}</div>
@endif @if(session('error'))
<div class="alert alert-danger">{{ session("error") }}</div>
@endif
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Register</h2>

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session("success") }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label><br />
                            <input
                                id="name"
                                type="text"
                                class="form-control"
                                name="name"
                                value="{{ old('name') }}"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label><br />
                            <input
                                id="email"
                                type="email"
                                class="form-control"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                            />
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label><br />
                            <input
                                id="password"
                                type="password"
                                class="form-control"
                                name="password"
                                required
                            />
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation"
                                >Confirm Password</label
                            ><br />
                            <input
                                id="password_confirmation"
                                type="password"
                                class="form-control"
                                name="password_confirmation"
                                required
                            />
                        </div>

                        <div class="form-group">
                            <button
                                type="submit"
                                class="btn btn-primary btn-block"
                            >
                                Register
                            </button>
                        </div>
                    </form>
                    <div class="text-center">
                        <p>
                            Already a user?
                            <a href="{{ route('login') }}">Login now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .container {
        width: fit-content;
        margin: 50px auto;
        padding: 25px;
        border: 1px solid;
        border-radius: 25px;
    }
    .form-group {
        margin: inherit;
        justify-content: center;
        border-radius: 2px;
        /* display: flex; */
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
        width: 22vw;
        height: 4vh;
        border-radius: 4px;
    }
</style>
