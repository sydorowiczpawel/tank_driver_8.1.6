<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Document;
use App\Models\Tank;
use App\Models\DepartureOrder;

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

    public function create()
    {
        return view('Models/soldier.addSoldier');
    }

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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = DB::table('users')
        -> where ('id', $id)
        ->get();

        return view('/Models/soldier.editSoldier')
        -> with('user', $user);
    }

    public function update(Request $request, $id)
    {
        // $p_num = $request->input('pass_number');
        $r = $request->input('rank');
        // $n = $request->input('firstName');
        // $s = $request->input('lastame');
        $f = $request->input('function');
        $p = $request->input('platoon');
        // $e = $request->input('email');
        // $pswd = $request->input('password');

        DB::table('users')
        ->where('id', $id)
        ->update(
            [
                // 'pass_number'=>$p_num,
                'rank'=>$r,
                // 'firstName'=>$n,
                // 'lastName'=>$s,
                'function' => $f,
                'platoon'=>$p,
                // 'email'=>$e,
                // 'password'=>$pswd
            ]
            );

            return redirect('/all_soldiers');
    }

    public function destroy($id)
    {
        $user = DB::table('users')
        ->where(['id' => $id])
        ->delete();

            return redirect('/admin');
    }

    public function all_users()
    {
        $commander = DB::table('users')
        ->where('function', 'dowódca kompanii')
        ->get();

        // Kadra kierownicza
        $boss = DB::table('users')
        ->where('function', 'szef kompanii')
        ->get();

        $technician = DB::table('users')
        ->where('function', 'technik kompanii')
        ->get();

        $gun_technician = DB::table('users')
        ->where('function', 'technik uzbrojenia')
        ->get();

        // Pluton I
        $p1_c = DB::table('users')
        ->where('function', 'dowódca plutonu')
        ->where('platoon', 'I')
        ->get();

        $p1_pdp= DB::table('users')
        ->where('platoon', 'I')
        ->where ('function', 'pomocnik dowódcy plutonu')
        ->get();

        $p1_od= DB::table('users')
        ->where('platoon', 'I')
        ->where ('function', 'kierowca - starszy instruktor')
        ->get();

        $p1_d= DB::table('users')
        ->where('platoon', 'I')
        ->where ('function', 'kierowca')
        ->get();

        // Pluton II
        $p2_c = DB::table('users')
        ->where('function', 'dowódca plutonu')
        ->where('platoon', 'II')
        ->get();

        $p2_pdp= DB::table('users')
        ->where('platoon', 'II')
        ->where ('function', 'pomocnik dowódcy plutonu')
        ->get();

        $p2_od= DB::table('users')
        ->where('platoon', 'II')
        ->where ('function', 'kierowca - starszy instruktor')
        ->get();

        $p2_d= DB::table('users')
        ->where('platoon', 'II')
        ->where ('function', 'kierowca')
        ->get();

        // Pluton III
        $p3_c = DB::table('users')
        ->where('function', 'dowódca plutonu')
        ->where('platoon', 'III')
        ->get();

        $p3_pdp= DB::table('users')
        ->where('platoon', 'III')
        ->where ('function', 'pomocnik dowódcy plutonu')
        ->get();

        $p3_od= DB::table('users')
        ->where('platoon', 'III')
        ->where ('function', 'kierowca - starszy instruktor')
        ->get();

        $p3_d= DB::table('users')
        ->where('platoon', 'III')
        ->where ('function', 'kierowca')
        ->get();

        // Pluton IV
        $p4_c = DB::table('users')
        ->where('function', 'dowódca plutonu')
        ->where('platoon', 'IV')
        ->get();

        $p4_pdp= DB::table('users')
        ->where('platoon', 'IV')
        ->where ('function', 'pomocnik dowódcy plutonu')
        ->get();

        $p4_od= DB::table('users')
        ->where('platoon', 'IV')
        ->where ('function', 'kierowca - starszy instruktor')
        ->get();

        $p4_d= DB::table('users')
        ->where('platoon', 'IV')
        ->where ('function', 'kierowca')
        ->get();


        return view('Models/soldier.all_soldiers')
        ->with('commander', $commander)
        ->with('boss', $boss)
        ->with('technician', $technician)
        ->with('gun_technician', $gun_technician)
        ->with('p1_c', $p1_c)
        ->with('p1_pdp', $p1_pdp)
        ->with('p1_od', $p1_od)
        ->with('p1_d', $p1_d)
        ->with('p2_c', $p2_c)
        ->with('p2_pdp', $p2_pdp)
        ->with('p2_od', $p2_od)
        ->with('p2_d', $p2_d)
        ->with('p3_c', $p3_c)
        ->with('p3_pdp', $p3_pdp)
        ->with('p3_od', $p3_od)
        ->with('p3_d', $p3_d)
        ->with('p4_c', $p4_c)
        ->with('p4_pdp', $p4_pdp)
        ->with('p4_od', $p4_od)
        ->with('p4_d', $p4_d)
        ;
    }

    public function adminPanel()
    {
        return view('Models/admin.admin');
    }
}
