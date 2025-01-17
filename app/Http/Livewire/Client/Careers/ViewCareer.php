<?php

namespace App\Http\Livewire\Client\Careers;

use App\Models\Admin\JobApplication;
use Livewire\Component;
use Livewire\WithFileUploads;

class ViewCareer extends Component
{
    use WithFileUploads;
    public $name;
    public $sex;
    public $email;
    public $cv;
    public $message;
    public $career_id;
    public $career = [];
    public function mount($career){
       // dd($career->id);
        $this->career = $career;
        $this->career_id = $career->id;
    }

    public function save(){
        $this->validate([
            'name' => 'required',
            'sex' => 'required',
            'email' => 'email|required',
            'cv' => 'required|max:10000|mimes:pdf,docx,doc'
        ]);
        if(!empty($this->cv)){
            $fileHashName = $this->cv->hashName();
            $this->cv->store('public/documents/cvs');

            $application =  JobApplication::create([
                'name' => $this->name,
                'email'=> $this->email,
                'sex' => $this->sex,
                'message' => $this->message,
                'cv' =>$fileHashName,
                'career_id' => $this->career_id,
            ]);
            $this->name = '';
            $this->sex = '';
            $this->email = '';
            $this->cv = '';
            $this->message = '';

            session()->flash('message', trans('msg.Job Application successfully recived.'));
        }
    }
    public function render()
    {
        return view('livewire.client.careers.view-career');
    }
}
