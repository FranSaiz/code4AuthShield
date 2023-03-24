<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;

class Usuario extends BaseController {

    public function index() {
        if(!auth()->user()->can('users.detail')) {            
            return redirect()->to('/'); 
        }


        $userModel = model('UserModel');
        

        echo view('dashboard/usuario/index', [
            'usuarios' => $userModel->find()
        ]);
    }

    public function show($id)
    {        

        //$userModel->find(1)->addPermission('beta.access');
        //$userModel->find(1)->removePermission('beta.access');

        //$userModel->find(1)->addGroup('admin');
        //$userModel->find(1)->removeGroup('admin');


        /* $groupModel = model('GroupModel');
        $permissionModel = model('PermissionModel');
         */

        /* foreach($permissionModel->asObject()->find() as $v) {
            echo $v->permission." - ";
        } */

        /* foreach($authGroups->groups as $key => $gs) {
            echo $key."<br>";
            foreach($gs as $key => $g) {

            }
        }
        echo "<hr>"; 
        foreach($authGroups->permissions as $key => $p) {
            echo $p."<br>";

        } */


        /* if(!auth()->user() || !auth()->user()->can('users.detail')) {
            return redirect()->to('/'); ; 
        } */

        if(!auth()->user() || !auth()->user()->can('users.detail')) {
            return redirect()->to('/'); ; 
        }

        $authGroups = config('AuthGroups'); 
        $userModel = model('UserModel');

        echo view('dashboard/usuario/show', [
            'usuario' => $userModel->find($id),
            'permissions' => $authGroups->permissions,
            'groups' => $authGroups->groups,
            'matriz' => $authGroups->matrix
        ]);
    }
    public function manejarPermiso($usuarioId) {        
        if(!auth()->user()->can('users.edit')) {
            echo -2;
            return; 
        }

        $userModel = model('UserModel');

        $usuario = $userModel->find($usuarioId);
        $permiso = $this->request->getPost('permiso');

        //SyncPermissions agrega un el permiso nuevo y elimina los demás, si ya tiene el permiso agregada lo deja tal cual
        //return $usuario->syncPermissions($permiso);


        if($usuario->can($permiso)) {
            $usuario->removePermission($permiso);
            echo 0;
        } else {
            $usuario->addPermission($permiso);
            echo 1;
        }
 
    }
    public function manejarGrupo($usuarioId) {
        if(!auth()->user()->can('users.edit')) {
            echo -2;
            return; 
        }

        $userModel = model('UserModel');

        $usuario = $userModel->find($usuarioId);
        $grupo = $this->request->getPost('grupo');

        if($usuario->inGroup($grupo)) {
            $usuario->removeGroup($grupo);
            echo 0;
        } else {
            $usuario->addGroup($grupo);
            echo 1;
        }
    }
}



?>