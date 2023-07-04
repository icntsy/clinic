<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Livewire\Component;
use Carbon\Carbon;

class Single extends Component
{
    public $patient;
    public $patientIndex;

    public function mount(Patient $patient, $patientIndex){
        $this->patient = $patient;
        $this->patientIndex = $patientIndex;
        $this->patient->birth_date = Carbon::parse($patient->birth_date)->age;
    }

    public function delete(){
        $this->patient->delete();
        $this->emit('patientDeleted');
    }
    /**
    * Get the view / contents that represent the component.
    *
    * @return \Illuminate\View\View|string
    */
    public function render()
    {
        return view('livewire.patient.single');
    }
}
