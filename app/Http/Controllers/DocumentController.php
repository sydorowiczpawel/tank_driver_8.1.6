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

    public function create()
    {
        return view('/Models/document.addDoc');
    }

    public function store(Request $request)
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

		return redirect('/all_documents');
    }

    public function show($pass_number)
    {
        $docs = DB::table('documents')
		->where('pass_number', $pass_number)
		->orderBy('end_date', 'desc')
		->get();

		return view('/Models/document.userDocs')->with('docs', $docs);
    }

    public function edit($id)
    {
        $doc = document::find($id);

		return view('/Models.editdoc')->with('doc', $doc);
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
