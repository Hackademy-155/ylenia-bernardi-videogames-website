<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class DeleteAccessory extends Component
{
    
    public $accessory;
    
    public function mount($accessory)
    {
        $this->accessory = $accessory;
    }
    
    public function destroy(){
        $this->accessory->delete();
        return redirect(route('accessory.index'))->with('success', 'Articolo eliminato con successo');
    }
    
    public function render()
    {
        return view('livewire.delete-accessory');
    }
}
