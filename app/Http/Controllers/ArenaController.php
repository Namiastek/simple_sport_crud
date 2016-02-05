<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Arena;
use Illuminate\Http\Request;

class ArenaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$arenas = Arena::orderBy('ID_STADION', 'desc')->paginate(10);

		return view('arenas.index', compact('arenas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('arenas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$arena = new Arena();

		$arena->NAZWA = $request->input("NAZWA");

		$arena->save();
		\Session::flash('alert-class', 'alert-success');

		return redirect()->route('arenas.index')->with('message', 'Utworzono z powodzeniem.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$arena = Arena::findOrFail($id);

		return view('arenas.show', compact('arena'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$arena = Arena::findOrFail($id);

		return view('arenas.edit', compact('arena'));
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
		$arena = Arena::findOrFail($id);

		\Session::flash('alert-class', 'alert-success');
		$arena->NAZWA = $request->input("NAZWA");

		$arena->save();

		return redirect()->route('arenas.index')->with('message', 'Edycja zakończona powodzeniem.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$arena = Arena::findOrFail($id);
		$arena->delete();
		\Session::flash('alert-class', 'alert-warning');

		return redirect()->route('arenas.index')->with('message', 'Usunięto z powodzeniem.');
	}

}
