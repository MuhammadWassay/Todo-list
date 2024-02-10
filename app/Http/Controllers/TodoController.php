<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
class TodoController extends Controller
{
    // Display the todo list
    public function index(Request $request)
    {
        $search = $request->query('search');

        // Fetch todos for the authenticated user
        $todosQuery = Auth::user()->todos();

        // Filter todos based on the search query
        if ($search) {
            $todosQuery->where('title', 'like', '%' . $search . '%');
        }

        // Paginate the filtered todos
        $todos = $todosQuery->paginate(10)->withQueryString();

        return view('todos', ['todos' => $todos, 'search' => $search]);
    }

    // Show the form for creating a new todo
    public function create()
    {
        return view('todos.create');
    }

    // Store a newly created todo in storage
    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'detail' => 'nullable|string', // Add validation for the 'detail' field if it's optional
    ]);

    // Create the todo for the authenticated user
    Auth::user()->todos()->create([
        'title' => $request->title,
        'detail' => $request->detail, // Add the 'detail' field
        // 'user_id' field is automatically populated with the currently authenticated user's ID
    ]);

    // Redirect back to the todo list page
    return redirect()->route('todos.index')->with('success', 'Todo created successfully');
}
    // Show the form for editing the specified todo
    public function edit(Todo $todo)
{
    return view('todos.edit', ['todo' => $todo]);
}

    // Update the specified todo in storage
    public function update(Request $request, Todo $todo)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'detail' => 'nullable|string',
            // Add validation rules for other fields if needed
        ]);

        // Update the todo
        $todo->update([
            'title' => $request->title,
            'detail' => $request->detail,
            // Update other fields from the request if needed
        ]);

        // Redirect back to the todo list page
        return redirect()->route('todos.table')->with('success', 'Todo updated successfully');
    }

    // Remove the specified todo from storage
    public function destroy(Todo $todo)
    {
        // Delete the todo
        $todo->delete();

        // Redirect back to the todo list page
        return redirect()->route('todos.table')->with('success', 'Todo deleted successfully');
    }
    public function showTable()
{
    $todos = Auth::user()->todos()->get();
    return view('todos.table', ['todos' => $todos]);
}
}
