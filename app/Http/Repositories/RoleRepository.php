<?php

namespace App\Http\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepository{

    public function list(){
        return Role::all();
    }

    public function paginate(){
        return Role::paginate(10);
    }

}