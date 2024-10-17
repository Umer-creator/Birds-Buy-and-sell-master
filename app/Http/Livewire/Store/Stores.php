<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use App\Models\Store;
use Livewire\WithPagination;

class Stores extends Component
{

    use WithPagination;
    public function render()
    {
        $stores = Store::paginate(10);
        return view('livewire.store.stores', ['stores' => $stores]);
    }
}
