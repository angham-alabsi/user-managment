<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return request()->segment(1);
        // return view('admin.users.index',['users'=>User::all()]);
        if(Gate::denies('logged-in')){
            dd("Access is NOt allowed");
        }
        // if(Gate::allows('is-admin')){
        //     return view('admin.users.index',['users'=>User::paginate(10)]);
        // }
        // dd('You need to be admin');
        return view('admin.users.index',['users'=>User::paginate(10)]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create',['roles'=>Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validateData=$request->validated();
        // $user=User::create($validateData);

        /**
         * Store by the Fortify
         */

         // $request->request->add(['roles'=>["1"]]);
        // $user->rol ->flash('success',__("main.create_success"));
        // return $user ;

        // return $user;
        // Password::sendResetLink($request->only(['email']));

        $newUser=new CreateNewUser;
        $user=$newUser->create($request->only(['name','email','password','password_confirmation']));
        $user->roles()->sync($request->roles);
        $request->session()->flash('success',__("main.create_success"));
        return redirect(route('admin.users.index'));
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
        return view('admin.users.edit',['roles'=>Role::all(),'user'=>User::find($id)]);
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
        $user=User::findOrFail($id);
        if(! $user){
            $request->session()->flash('error',__("main.can_not_edit"));
            return redirect(route('admin.users.index'));
        }
        $user->update($request->except(['_token','roles']));
        $user->roles()->sync($request->roles);
        $request->session()->flash('success',__("main.edit_success"));
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id,Request $request)
    {
        User::destroy($id);
        $request->session()->flash('error',__("main.delete-success"));
        return redirect(route('admin.users.index'));
    }

    public function profile(){
        return view('admin.users.profile');
    }
}
