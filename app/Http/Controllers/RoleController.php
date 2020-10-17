<?php

namespace App\Http\Controllers;

use App\Http\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    protected $role;

    public function __construct(
        RoleRepository $role
    )
    {
        $this->role = $role;
    }

    public function index(){
        return Inertia::render('Roles/Index',[
            'roles' => $this->role->list()
        ]);
    }
}
