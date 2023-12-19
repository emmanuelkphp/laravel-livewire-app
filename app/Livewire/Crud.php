<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class Crud extends Component{

    public $students, $name, $course, $age, $id;
    public $updateMode = false;

    public function render(){
        $this->students = Students::all();
        return view('livewire.crud');
    }

    private function resetInputFields(){
        $this->name     = '';
        $this->course   = '';
        $this->age      = '';
    }

    public function store(Request $request){
        $this->validate([
            'name'      => 'required|string|max:255',
            'course'    => 'required|string|max:255',
            'age'       => 'required|integer|min:1',
        ]);

        $data = [
            'name'      => $this->name,
            'course'    => $this->course,
            'age'       => $this->age,
        ];
  
        $data = $request->all();
        Post::create($data);
        session()->flash('message', 'Student Created Successfully.');
        $this->resetInputFields();
    }

    public function edit($id){
        $student = Students::findOrFail($id);
        $this->id         = $id;
        $this->name       = $student->name;
        $this->course     = $student->course;
        $this->age        = $student->age;
        $this->updateMode = true;
    }

    public function cancel(){
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update(){
         echo "update";exit();

        $request->validate([
            'name'      => 'required',
            'course'    => 'required',
            'age'       => 'required',
        ]);
    
        $student = Students::find($this->id);

        $student->update([
            'name'    => $this->name,
            'course'  => $this->course,
            'age'     => $this->age,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Student Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id){
        Students::find($id)->delete();
        session()->flash('message', 'Student Deleted Successfully.');
    }
}
