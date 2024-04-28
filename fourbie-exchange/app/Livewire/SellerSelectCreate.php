<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Dealer;

class SellerSelectCreate extends Component
{
    public $sellers;
    public $selected_seller_id;
    public $name = 'Private Party';
    public $email = 'sup@privateparty.com';
    public $phone = '555-555-5555';
    public $city = 'Albany';
    public $state = 'NY';
    public $zip = '12204';

    public function mount() {
        $this->sellers = Dealer::orderBy('name')->get();
    }

    public function selectSeller() {
        $seller = Dealer::find($this->selected_seller_id);
        $this->name = $seller->name;
        $this->email = $seller->email;
        $this->phone = $seller->phone;
        $this->city = $seller->city;
        $this->state = $seller->state;
        $this->zip = $seller->zip;
    }

    public function render()
    {
        return view('livewire.seller-select-create');
    }
}
