<?php


namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    function index(){
        return Task::where('completed','=',0)->get();
        //return response()->json(['message' => 'login successfuly','code' =>'200', 'tasks' => $tasks]);
    }

    function indexcompleted(){
        return Task::where('completed','=',1)->get();
        //return response()->json(['message' => 'login successfuly','code' =>'200', 'tasks' => $tasks]);
    }

    public function addTask(Request $request)
{
    try {
        // Valider les données
        
        $request->validate([
            'title' => 'required'
        ]);
        // Créer la tâche
        //$task = Task::create($validated);
        $task = new Task;
        $task->title = $request->input('title');
        $task->user_id = $request->input('user_id');
        $task->completed = 0;
        $resu = $task->save();
        if($resu){

            return response()->json(['message' => 'created successfuly','statut' =>'200', 'task' => $task]);
        }
    } catch (\Exception $e) {
        \Log::error($e->getMessage());

        return response()->json(['error' => 'Something went wrong!'], 500);
    }
}



    
    function getTask($id){
     return Task::find($id);
    }

     function update(Request $request, $id)
    {
        //var_dump($request->all());die();
        $task = Task::findOrFail($id);
        
       
        try {
            // Valider les données
            
            $request->validate([
                'title' => 'required'
            ]);
            // Créer la tâche
            //$task = Task::create($validated);
            
            $task->title = $request->input('title');
            $task->user_id = $request->input('user_id');
           
            $resu = $task->save();
            if($resu){
    
                return response()->json(['message' => 'created successfuly','statut' =>'200', 'task' => $task]);
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
    
            return response()->json(['error' => 'Something went wrong!'], 500);
        }
    }

     function complete($id){
        //var_dump($request->all());die();
        $task = Task::findOrFail($id);
        
       
        try {
               
            $task->completed = 1;     
            $resu = $task->save();
            if($resu){
    
                return response()->json(['message' => 'created successfuly','statut' =>'200', 'task' => $task]);
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
    
            return response()->json(['error' => 'Something went wrong!'], 500);
        }
    }

    function destroy($id){
     $resultatDelete = Task::where('id',$id)->delete();
     if($resultatDelete){
        return ["result"=>"la tâche a été bien supprimée"];
     }else{
         return ["result" => "Operation echouée"];
     }
    }
}
    