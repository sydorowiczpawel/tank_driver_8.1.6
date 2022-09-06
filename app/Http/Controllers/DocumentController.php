<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\document;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{

    public function index()
    {
        $docs = document::all();

		return view('/home')->with('docs', $docs);
    }

	public function undefined_user()
	{
		return view('/Models/document.user_documents');
	}

    public function create($pass_number)
    {

		$user = DB::table('users')
		->where('pass_number', $pass_number)
		->get();

        return view('/Models/document.addDoc')
		->with('user', $user);
    }

    public function store_as_user(Request $request, $p_num)
    {

		$pass_number = $p_num;
		$name = $request->input('name');
		$number = $request->input('number');
		$start_date = $request->input('start_date');
		$end_date = $request->input('end_date');

		DB::table("documents")
		->insert(
			[
				'pass_number'=>$pass_number,
				'name'=>$name,
				'number'=>$number,
				'start_date'=>$start_date,
				'end_date'=>$end_date
				]
			);

		$docs = DB::table('documents')
		->where('pass_number', $pass_number)
		->orderBy('end_date', 'desc')
		->get();

		$user = DB::table('users')
		->get();

		return view('Models/document.user_documents')
		->with('docs', $docs)
		->with('user', $user);
    }

    public function store_as_admin(Request $request)
    {

		$pass_number = $request -> input('pass_number');
		$name = $request->input('name');
		$number = $request->input('number');
		$start_date = $request->input('start_date');
		$end_date = $request->input('end_date');

		DB::table("documents")
		->insert(
			[
				'pass_number'=>$pass_number,
				'name'=>$name,
				'number'=>$number,
				'start_date'=>$start_date,
				'end_date'=>$end_date
				]
			);

		$docs = DB::table('documents')
		->where('pass_number', $pass_number)
		->orderBy('end_date', 'desc')
		->get();

		$user = DB::table('users')
		->get();

		return view('Models/document.user_documents')
		->with('docs', $docs)
		->with('user', $user);
    }

    public function show($pass_number)
    {
        $docs = DB::table('documents')
		->where('pass_number', $pass_number)
		->orderBy('end_date', 'desc')
		->get();

		return view('/Models/document.user_documents')->with('docs', $docs);
    }

    public function edit($id)
    {
        $doc = document::find($id);

		return view('/Models/document.edit_document')->with('doc', $doc);
    }

    public function update(Request $request, $id)
    {
        $doc = document::find($id);
		$name = $request->input('name');
		$number = $request->input('number');
		$start_date = $request->input('start_date');
		$end_date = $request->input('end_date');

		DB::table('documents')
		->where('id', $doc->id)
		->update(
		[
			'name'=>$name,
			'number'=>$number,
			'start_date'=>$start_date,
			'end_date'=>$end_date
		]
	);

	return redirect("/doclst");
    }

    public function destroy($id)
    {
        $doc = document::find($id);

		DB::table('documents')
		->where('id', $doc->id)
		->delete();

		return redirect("/home");
    }

	public function all_docs()
	{
		$documents = DB::table('documents')
		->get();

		return view('Models/document.all_documents')
		-> with ('documents', $documents);
	}
}
