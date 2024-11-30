<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EditArticle extends Component
{
    use WithFileUploads;
    
    public $accessory;
    public $name;
    public $brand;
    public $description;
    public $photo;
    public $price; 
    
    public function update()
    {
        if ($this->photo && $this->photo instanceof TemporaryUploadedFile) {
            $photoPath = $this->photo->store('images', 'public');
        } else {
            $photoPath = $this->accessory->photo;
        }
        
        $this->accessory->update([
            'name' => $this->name,
            'brand' => $this->brand,
            'description' => $this->description,
            'photo' => $photoPath,
            'price' => $this->price
        ]);
        
        return redirect(route('accessory.show'))->with('success', 'Articolo modificato con successo');
    }
    
    // lifecycle hook -> serve per far visualizzare gli elementi vecchi nel form di modifica
    public function mount(){
        $this->name=$this->accessory->name;
        $this->brand=$this->accessory->brand;
        $this->description=$this->accessory->description;
        $this->photo=$this->accessory->photo;
        $this->price=$this->accessory->price;
    }
    
    public function render()
    {
        return view('livewire.edit-article');
    }
}
