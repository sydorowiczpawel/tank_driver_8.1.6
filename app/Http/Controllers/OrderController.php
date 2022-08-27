<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartureOrder;
use App\Models\User;
use App\Models\Tank;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function index($p_num)
    {
        $eos = DB::table('departure_orders')
		-> where('pass_number', $p_num)
		-> get();

		return view('/Models/order.allDepartureOrders')
		-> with('eos', $eos);
	}

    public function create($p_num)
    {
        $tanks = DB::table('tanks')
		-> where('pass_number', $p_num)
		-> get();

    return view('Models\order.addDepartureOrder')
		-> with('tanks', $tanks);
    }

    public function neworder(Request $request, $p_num) {

		$pass_number = $p_num;
    $tank_number = $request->input('tank_number');
    $series = $request->input('series');
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');
    $km_s = $request->input('odometer_start');
    $geh_s = $request->input('goh_start');
    $leh_s = $request->input('wh_start');

		DB::table("exit_orders")
		->insert(
            [
                'pass_number'=>$pass_number,
                'tank_number'=>$tank_number,
                'series'=>$series,
                'start_date'=>$start_date,
                'end_date'=>$end_date,
                'odometer_start' => $km_s,
                'goh_start' => $geh_s,
                'wh_start' => $leh_s,
                ]
            );

    return redirect('/home');
	}

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $tanks = Tank::all();
		$eos = DB::table('departure_orders')
		->where('id', $id)
		->get();
		$users = User::all();

    return view('/Models/order.orderDetails') -> with('eos', $eos);
    }

    public function edit($id)
    {
        $eo = DepartureOrder::find($id);

		return view('Models/order.editexitorder')->with('eo', $eo);
    }

    public function update(Request $request, $id)
    {
        // $eos = ExitOrder::find($id);
    }

    public function finish(Request $request, $id)
    {
        $eo = DepartureOrder::find($id);
		$odometer_e = $request->input('odometer_end');
		$goh_e = $request->input('goh_end');
        $wh_e = $request->input('wh_end');
        $heater = $request->input('heater');
        $pkt = $request->input('pkt');
        $nswt = $request->input('nswt');
        $armata = $request->input('armata');

        DB::table("departure_orders")
        ->where('id', $id)
        ->update(
            [
                'odometer_end' => $odometer_e,
                'goh_end' => $goh_e,
                'wh_end' => $wh_e,
                'heater_min' => $heater,
                '7,62' => $pkt,
                '12,7' => $nswt,
                '125' => $armata
            ]);

            return redirect('/home');
    }

    public function destroy($id){
        //
    }
}