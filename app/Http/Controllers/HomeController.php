<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Permission;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::GET();
    }



    /*
    *
    */
    public function attachUserRole($userId, $role){
        $user = User::find($userId);
        $roleId = Role::where('name', $role)->first();
        $user->roles()->attach($roleId);
        return $user;
    }



    /*
    *
    */
    public function getUserRole($userId){
        return User::find($userId)->roles;
    }



    /*
    * Add permission to a role.
    * @param Request $request
    * @return mixed
    */
    public function attachPermission(Request $request){
        $parameters = $request->only('permission', 'role');
        $permissionParam = $parameters['permission'];
        $roleParam = $parameters['role'];

        // $permissionParam = $request['permission'];
        // $roleParam = $request['role'];
        
        $role = Role::where('name', $roleParam)->first();
        $permission = Permission::where('name', $permissionParam)->first();

        // $role = Role::where('name', 'owner')->first();
        // $permission = Permission::where('name', 'create-invoice')->first();
        // return $permission;
        
        $role->attachPermission($permission);
        return $this->response->created();
    }



    /*
    * Get permissions related to the role.
    * @param $roleParam
    * @return mixed
    */
    public function getPermission($roleParam){
        $role = Role::where('name', $roleParam)->first();

        return $this->response->array($role->perms);    
        //return $role->perms;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
