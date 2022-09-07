<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tank;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class TankController extends Controller
{

    public function index($p_num)
    {
        $tanks = DB::table('tanks')
        ->where('pass_number', $p_num)
        ->get();

        return view('Models\tank.tankslst')->with('tanks', $tanks);
    }

    public function undefined_user()
    {
        return view('Models\tank.tankslst');
    }

    public function create()
    {
        $users = DB::table('users')
        -> get();

        return view('Models/tank.addTank')
        -> with('users', $users);
    }

    public function store(Request $request)
    {
        $pass_number = $request->input('pass_number');
        $model = $request->input('model');
        $number = $request->input('tank_number');

        DB::table('tanks')
        ->insert([
            'pass_number'=>$pass_number,
            'model'=>$model,
            'tank_number'=>$number
            ]
        );
        return redirect('/all_tanks');
    }

    public function all_tanks()
    {
        $tanks = DB::table('tanks')
        -> get();

        return view('Models/tank.all_tanks')
        -> with('tanks', $tanks);
    }

    public function show($number)
    {
        $tank = DB::table('tanks')
        ->where ('tank_number', $number)
        ->get();

        return view('Models/tank.show_tank')
        ->with('tank', $tank);
    }

    public function show_orders($t_num)
    {
        $tank = DB::table('tanks')
        ->where ('tank_number', $t_num)
        ->get();

        $order = DB::table('departure_orders')
        ->where('tank_number', $t_num)
        ->get();

        return view('Models/order.selected_tank_orders')
        ->with('tank', $tank)
        ->with('order', $order);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
