<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesUserRequest;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompteControllers extends Controller
{
    //needed only for the Administrator of the site

    /**
     * Listing of all compte in the site
     * @return \Illuminate\View\View
     */
    public function listing(): View
    {
        $user = User::orderBy('created_at', 'desc')
                        ->paginate(15);
        return view($this->viewPath().'index', [
            'user' => $user
        ]);
    }

    /**
     * To edit one users
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id): View
    {
        $user = User::findOrFail($id);
        $role = Roles::pluck('id', 'title');
        return view($this->viewPath().'action.edit', [
            'user' => $user,
            'role' => $role
        ]);
    }

    /**
     * Updated roles to users
     * @param string $id
     * @param \App\Http\Requests\RolesUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRole(string $id, RolesUserRequest $request): RedirectResponse
    {
        try {
            $user = User::findOrFail($id);
            $user->update($request->validated());
            return redirect()->route($this->routes().'updateRole', ['id' => $user->id])->with('success', 'Modification réussi');
        } catch (\Exception $e) {
            return redirect()->route($this->routes().'updateRole', ['id' => $user->id])->with('error', 'Oups, il y a eu une erreur');
        }

    }

    /**
     * delete user
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route($this->routes().'listing')->with('success', 'Suppréssion de l\'utilisateur réussi');
    }

    public function forbiden(): View
    {
        return view('admin.403.403');
    }

    /**
     * View Path directory
     * @return string
     */
    private function viewPath(): string
    {
        $view = "admin.compteManager.";
        return $view;
    }

    /**
     * Routes path directory
     * @return string
     */
    private function routes(): string
    {
        $routes= "Admin.Compte.";
        return $routes;
    }
}
