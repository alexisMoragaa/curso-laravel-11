<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TaskComponent extends Component
{
    public $tasks = [];
    public $task;
    public $title;
    public $description;
    public $modal = false;

    //Ejecuta la funcion cuando el componente se monta
    public function mount()
    {
        $this->getAllTaks();
    }

    private function getAllTaks(){
        $this->tasks = Task::where('user_id', Auth::user()->id )->get();
    }

    //Renderiza la vista del componente
    public function render()
    {
        return view('livewire.task-component');
    }

    private function cleardFields(){
        $this->title = '';
        $this->description = '';
        $this->task = null;
    }

    public function openCreateModal(Task $task = null){
        if($task){
            $this->task = $task;
            $this->title = $task->title;
            $this->description = $task->description;
        }else{
            $this->cleardFields();
        }
        $this->modal =  true;
    }


    public function closeModal(){
        $this->modal = false;
    }

    public function createTask(){

        Task::updateOrCreate(['id' => $this->task->id], [
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => Auth::user()->id,
        ]);

        $this->closeModal();
        $this->getAllTaks();
    }

    
    public function deleteTask(Task $task){
        $task->delete();
        $this->getAllTaks();
    }
    
    
}
