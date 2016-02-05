<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Championship;
use Illuminate\Http\Request;

class ChampionshipController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$championships = Championship::orderBy('ID_ROZGRYWKI', 'desc')->paginate(10);

		return view('championships.index', compact('championships'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('championships.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$championship = new Championship();

		$championship->NAZWA = $request->input("NAZWA");
        $championship->ZA_ZWYCIESTWO = $request->input("ZA_ZWYCIESTWO");
        $championship->ZA_REMIS = $request->input("ZA_REMIS");

		$championship->save();

		return redirect()->route('championships.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$championship = Championship::findOrFail($id);

		return view('championships.show', compact('championship'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$championship = Championship::findOrFail($id);

		return view('championships.edit', compact('championship'));
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
		$championship = Championship::findOrFail($id);

		$championship->NAZWA = $request->input("NAZWA");
        $championship->ZA_ZWYCIESTWO = $request->input("ZA_ZWYCIESTWO");
        $championship->ZA_REMIS = $request->input("ZA_REMIS");

		$championship->save();

		return redirect()->route('championships.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$championship = Championship::findOrFail($id);
		$championship->delete();

		return redirect()->route('championships.index')->with('message', 'Item deleted successfully.');
	}

}
