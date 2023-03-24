<?php

namespace App\Controllers;

use App\Controllers\Base;

class Admin extends Base
{
    protected $title = "Admin";
    protected $content = "Admin";
    protected $userTieneQueEstarAuth = true;
    protected $permiso = 'admin.admin';
}
