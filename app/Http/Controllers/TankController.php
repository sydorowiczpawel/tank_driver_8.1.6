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

    public function create()
    {
        $soldier = DB::table('users')
        ->orderBy('lastame')
        ->get();

        return view('Models\tank.addTank')
        ->with('soldier', $soldier);
    }

    public function store(Request $request)
    {
        $pass_number = $request->input('pass_number');
        $model = $request->input('model');
        $number = $request->input('tank_number');
        // $driver = $request->input('tutaj bedzie wywalac blad bo program chce numer przepustki a dostaje nazwisko kierowcy');

        DB::table('tanks')
        ->insert([
            'pass_number'=>$pass_number,
            'model'=>$model,
            'tank_number'=>$number
            ]
        );
        return redirect('/a_tanks');
    }

    public function show($id)
    {
        //
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
