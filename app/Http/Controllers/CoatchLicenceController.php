<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\CoatchLicence;
use App\Models\Coatch;
use Illuminate\Http\Request;

class CoatchLicenceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$coatch_licences = CoatchLicence::orderBy('ID_LIC_TR', 'desc')->paginate(10);

		return view('coatch_licences.index', compact('coatch_licences'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('coatch_licences.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$coatch_licence = new CoatchLicence();

		$coatch_licence->NAZWA = $request->input("NAZWA");

		$coatch_licence->save();
		\Session::flash('alert-class', 'alert-success');

		return redirect()->route('coatch_licences.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$coatch_licence = CoatchLicence::findOrFail($id);

		return view('coatch_licences.show', compact('coatch_licence'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$coatch_licence = CoatchLicence::findOrFail($id);

		return view('coatch_licences.edit', compact('coatch_licence'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$coatch_licence = CoatchLicence::findOrFail($id);

		$coatch_licence->NAZWA = $request->input("NAZWA");

		$coatch_licence->save();
		\Session::flash('alert-class', 'alert-success');


		return redirect()->route('coatch_licences.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$coatch_licence = CoatchLicence::findOrFail($id);
		$coatch = Coatch::where('LICENCJA_TRENERSKA_ID_LIC_TR', $id)->first();

		if (!empty($coatch)) {
			\Session::flash('alert-class', 'alert-danger');
			return redirect()->route('coatch_licences.index')->with('message', 'Nie mozna usunac -  posiada przypisanego trenera: '. $coatch->NAZWISKO);
		}

		$coatch_licence->delete();
		\Session::flash('alert-class', 'alert-warning');


		return redirect()->route('coatch_licences.index')->with('message', 'Item deleted successfully.');
	}

}
