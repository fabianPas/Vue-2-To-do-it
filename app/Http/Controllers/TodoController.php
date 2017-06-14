<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TodoController extends Controller
{
    public function index()
    {
        return view('todo');
    }

    public function listTodos()
    {
        return Todo::all();
    }

    public function check(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->is_checked = $request->is_checked;
        $todo->save();

        return $todo;
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
    }

    public function edit(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->message = $request->message;
        $todo->save();

        return $todo;
    }

    public function create(Request $request)
    {
        $todo = new Todo();
        $todo->message = $request->message;
        $todo->is_checked = false;
        $todo->save();

        return $todo;
    }
}
