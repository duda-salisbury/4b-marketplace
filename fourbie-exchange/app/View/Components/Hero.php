<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    public $classname;
    public $title;
    public $blurb;
    public $cta1;
    public $cta2;

    public function __construct($classname, $title, $blurb, $cta1, $cta2=null)
    {
        $this->classname = $classname;
        $this->title = $title;
        $this->blurb = $blurb;
        $this->cta1 = $cta1;

        if ($cta2 !== null) {
            $cta2 = $cta1;
        }
    }

    public function render()
    {
        return view('components.hero');
    }
}