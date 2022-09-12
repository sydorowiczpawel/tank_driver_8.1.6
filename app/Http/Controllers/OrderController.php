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
        $dep_orders = DB::table('departure_orders')
		-> where('pass_number', $p_num)
		-> get();

		return view('/Models/order.user_departure_orders')
		-> with('dep_orders', $dep_orders);
	}

    public function undefined_user()
    {
        $mssg = "Twoje konto nie zostało jeszcze zweryfikowane przez administratora. Daj mu chwilę, jest zarobiony ;)";
        return view('Models\order.user_departure_orders')
        -> with('mssg', $mssg);
    }

    public function create($p_num)
    {
        $tank = DB::table('tanks')
		-> where('pass_number', $p_num)
		-> get();

        $soldier = DB::table('departure_orders')
        ->get();

    return view('Models\order.addDepartureOrder')
		-> with('tank', $tank)
        -> with('soldier', $soldier);
    }

    public function create_as_admin()
    {
        $tank = DB::table('tanks')
		-> get();

        $soldier = DB::table('users')
        ->get();

    return view('Models\order.addDepartureOrder')
		-> with('tank', $tank)
        -> with('soldier', $soldier);
    }

    public function store(Request $request, $p_num)
    {
        $pass_number = $p_num;
        $tank_number = $request->input('tank_number');
        $series = $request->input('series');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $km_s = $request->input('odometer_start');
        $goh_s = $request->input('goh_start');
        $wh_s = $request->input('wh_start');

		DB::table("departure_orders")
		->insert(
            [
                'pass_number'=>$pass_number,
                'tank_number'=>$tank_number,
                'series'=>$series,
                'start_date'=>$start_date,
                'end_date'=>$end_date,
                'odometer_start' => $km_s,
                'goh_start' => $goh_s,
                'wh_start' => $wh_s,
                ]
            );

            return redirect('/home');
	}

    public function show($id)
    {
        // $tanks = DB::table('tanks')
        // -> where();

		$departure_order = DB::table('departure_orders')
		->where('id', $id)
		->get();
		$users = User::all();

    return view('/Models/order.departure_order_details') -> with('dep_order', $departure_order);
    }

    public function edit($id)
    {
        $dep_order = DepartureOrder::find($id);

		return view('Models/order.edit_departure_order')->with('dep_order', $dep_order);
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

    public function show_selected($tank_number) {

		$tank = DB::table('tanks')
		->where('tank_number', $tank_number)
		->get();
		$orders = DB::table('departure_orders')
		->where('tank_number', $tank_number)
		->get();

    return view('/Models/order.selected_tank_orders')->with('tank', $tank)->with('orders', $orders);
    }

    public function show_all()
    {
        $dep_orders = DB::table('departure_orders')
        ->get();

        return view('Models/admin.all_departure_orders')
        ->with('dep_orders', $dep_orders);
    }
}