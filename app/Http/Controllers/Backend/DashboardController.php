<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Contracts\Support\Renderable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Nota;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\RegistroCurso;
use App\Models\Horario;
use App\Models\Docente;
class DashboardController extends Controller
{
    public function index(): Renderable
    {
        // Asegúrate de pasar un array o cadena de permisos
        $this->checkAuthorization(['dashboard.view']);
        //$this->checkAuthorization(auth()->user());

        return view('backend.pages.dashboard.index', [
            //'total_roles' => $total_roles,
            'total_admins' => Admin::count(),
            'total_roles' => Role::count(),
            'total_permissions' => Permission::count(),
            'total_nota' => Nota::count(),
            'total_curso' => Curso::count(),
            'total_horario' => Horario::count(),
            'total_docente' => Docente::count(),
            'total_estudiante' => Estudiante::count(),
        ]);
    }
}
