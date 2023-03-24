<?php

namespace App\Controllers;

use App\Controllers\Base;

class Other extends Base
{
    protected $title = "Other";
    protected $content = "Other";
    protected $userTieneQueEstarAuth = false;

    public function contacto()
    {
        
    /* if(!auth()->loggedIn()) {
        return redirect()->to('/');             
    }  */         
         

        echo 'Contacto';
    }
}
