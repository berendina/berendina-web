<?php

namespace App\Http\Livewire\Client\Bmic\Media;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
class MainPage extends Component
{
    protected $listeners = ['OpenCaseStudyFull' => 'OpenReadView'];
    public $case_studies = true;
    public $annual_reports = false;
    public $photos = false;
    public $videos = false;

    public $read_view = false; 

    public function loadCaseStudies(){
        $this->case_studies = true;
        $this->annual_reports = false;
        $this->press = false;
        $this->photos = false;
        $this->videos = false;
    }
    public function loadVideos(){
        $this->case_studies = false;
        $this->annual_reports = false;
        $this->press = false;
        $this->photos = false;
        $this->videos = true;
    }
    public function loadPhotos(){
        $this->case_studies = false;
        $this->annual_reports = false;
        $this->press = false;
        $this->photos = true;
        $this->videos = false;
    }
    

    public function OpenReadView($id)
    {
        $this->read_view = true;
        Session::put('case_id', $id );
    }
    public function render()
    {
        return view('livewire.client.bmic.media.main-page');
    }
}