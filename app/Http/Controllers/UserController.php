<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index($p_num)
    {
        $user = DB::table('users')
        -> where('pass_number', $p_num)
        -> get();

        $tank = DB::table('tanks')
        ->where('pass_number', $p_num)
        ->get();

        $docs = DB::table('documents')
        ->where('pass_number', $p_num)
        ->orderBy('end_date', 'desc')
        ->get();

        $eos = DB::table('departure_orders')
        ->where('pass_number', $p_num)
        ->orderBy('end_date', 'desc')
        ->get();

        return view('/Models/soldier.personalFile')
        ->with('docs', $docs)
        ->with('eos', $eos)
        ->with('user', $user)
        ->with('tanks', $tank);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Models/soldier.addSoldier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pass_number = $request -> input('pass_number');
        $rank = $request->input('rank');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $function = $request->input('function');
        $platoon = $request->input('platoon');
        $email = $request->input('email');
        $password = $request->input('password');

        DB::table("users")
        ->insert(
            [
                'pass_number'=>$pass_number,
                'rank'=>$rank,
                'firstName'=>$firstName,
                'lastName'=>$lastName,
                'function'=>$function,
                'platoon'=>$platoon,
                'email'=>$email,
                'password'=>$password
            ]
            );

            return redirect('/a_soldiers');
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
        $user = User::find($id);
        return view('/Models/soldiers.editSoldier') -> with ('user', $user);
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
        $p_num = $request->input('pass_number');
        $r = $request->input('rank');
        $n = $request->input('firstName');
        $s = $request->input('lastame');
        $f = $request->input('function');
        $p = $request->input('platoon');
        $e = $request->input('email');
        $pswd = $request->input('password');

        DB::table('users')
        ->where('id', $id)
        ->update(
            [
                'pass_number'=>$p_num,
                'rank'=>$r,
                'firstName'=>$n,
                'lastName'=>$s,
                'function' => $f,
                'platoon'=>$p,
                'email'=>$e,
                'password'=>$pswd
            ]
            );

            return redirect('/a_soldiers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = DB::table('users')
        ->where(['id' => $id])
        ->delete();

            return redirect('/admin');
    }
}
