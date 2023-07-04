<?php

namespace App\Http\Livewire\Diagnosis;

use App\Models\Diagnosis;
use Livewire\Component;

class Update extends Component
{
    public $category;
    public $subcategory;
    public $english_name;
    public $indonesian_name;
    public $diagnosis;


    public function rules()
    {
        return [
            'category' => 'required',
            'subcategory' => 'required',
            'english_name' => 'required',
            'indonesian_name' => 'required'
        ];
    }


    public function mount(Diagnosis $diagnosis)
    {
        $this->category = $diagnosis->category;
        $this->subcategory = $diagnosis->subcategory;
        $this->english_name = $diagnosis->english_name;
        $this->indonesian_name = $diagnosis->indonesian_name;
    }

    public function update()
    {
        $this->validate();
        $this->diagnosis->update([
            'category' => $this->category,
            'subcategory' => $this->subcategory,
            'english_name' => $this->english_name,
            'indonesian_name' => $this->indonesian_name
        ]);

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('Data Diagnosis Berhasil Diupdate', ['name' => __('Article')])]);
        return redirect("/diagnosis");
    }

    public function render()
    {
        return view('livewire.diagnosis.update');
    }
}
