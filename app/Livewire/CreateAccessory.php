<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Accessory;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class CreateAccessory extends Component
{
    // #[Validate('required')] + .live nel wire:model -> per le validazioni in tempo reale oppure + .blur nel wire:model -> per le validazioni out of foucus 
    
    use WithFileUploads;
    
    public $name;
    public $brand;
    public $description;
    public $photo;
    public $price; 

    public function rules(){
        return[
            'name'=>'required',
            'brand'=>'required',
            'description'=>'required',
            'photo'=>'required|image',
            'price'=>'required',
        ];
    }

    public function store(){
        $this->validate();

        Accessory::create([
            'name'=>$this->name,
            'brand'=>$this->brand,
            'description'=>$this->description,
            'photo'=>$this->photo->store('accessories', 'public'),
            'price'=>$this->price
        ]);

        session()->flash('succes', 'Articolo aggiunto con successo.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-accessory');
    }
}
