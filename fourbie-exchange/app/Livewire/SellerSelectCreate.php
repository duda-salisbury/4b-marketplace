<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Dealer;

class SellerSelectCreate extends Component
{
    public $sellers;
    public $selected_seller_id;
    public $name;
    public $email;
    public $phone;
    public $city;
    public $state;
    public $zip;

    public function mount() {
        $this->name = old('name', 'Private Party');
        $this->email = old('email', 'sup@privateparty.com');
       	$this->phone = old('phone', '555-555-5555');
       	$this->city = old('city', 'Albany');       
        $this->state = old('state', 'NY');
        $this->zip = old('zip', '12204');
        $this->sellers = Dealer::orderBy('name')->get();
    }

    public function selectSeller() {
        $seller = Dealer::find($this->selected_seller_id);

        if ( $seller ) {
            $this->name = $seller->name;
            $this->email = $seller->email;
            $this->phone = $seller->phone;
            $this->city = $seller->city;
            $this->state = $seller->state;
            $this->zip = $seller->zip;
        }
    }

    public function render()
    {
        return view('livewire.seller-select-create');
    }
}
