<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(){
        $task = Task::all();

        if(!$task){
            $data = [
                'message' => 'Error al obtener los datos'
            ];

            return response()->json($data, 404);
        }

        return $task;
    }

    public function store(Request $request){
        $validate = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'completed' => 'required|boolean'
        ]);

        if(!$validate){
            $data = [
                'message' => 'Error en los tipos de datos'
            ];

            return response()->json($data, 404);
        }

        return Task::create($validate);
    }

    public function update(Request $request, $id){
        $task = Task::find($id);

        if(!$task){
            return response()->json('Tarea no encontrada.', 404);
        }

        $validator = Validator::make($request->all(), [
            'completed' => 'required|boolean'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en los tipos de datos',
                'errors' => $validator->errors()
            ];

            return response()->json($data);
        }

        if($request->has('completed')){
            $task->completed = $request->completed;
        }

        $task->save();

        $data = [
            'message' => "Tarea actualizada"
        ];

        return response()->json($data, 200);
    }

    public function destroy($id){
        $task = Task::find($id);

        if(!$task){
            return response()->json('Tarea no encontrada', 404);
        }

        $task->delete();

        return response()->json("Tarea eliminada",200);
    }
}
