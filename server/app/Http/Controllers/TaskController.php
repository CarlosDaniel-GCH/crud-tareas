<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

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
}
