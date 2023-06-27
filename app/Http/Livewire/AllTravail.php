<?php

namespace App\Http\Livewire;

use App\Models\Travail;
use Livewire\Component;
use Livewire\WithPagination;

class AllTravail extends Component
{
    use WithPagination;
    public $search = '';
    public $domaine;
    public $categorie;
    public $faculte;
    public $order = "asc";
    public $sort = 10;
    public $name = "sujet";
    public $sujet;



    protected $queryString = [
        'search' => ['expect' => ''],
        'categorie' => ['expect' => ''],
        'faculte' => ['expect' => '']

    ];


    public function clearFiltre()
    {

        $this->search = "";
        $this->categorie = null;
        $this->faculte = null;
    }

    public function searchiTem()
    {

        return $this->searchs;
    }

    public function updating($name, $val)
    {
        if ($name == 'search') {
            $this->resetPage();
        }
    }


    public function render()
    {
        return view('livewire.all-travail', [
            'travaux' => Travail::where('titre', 'like', '%' . $this->search . '%')->paginate(20),
            'travauxCount' => Travail::where('titre', 'like', '%' . $this->search . '%')->get(),
        ]);
    }
}