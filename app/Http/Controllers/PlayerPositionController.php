<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PlayerPosition;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerPositionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$player_positions = PlayerPosition::orderBy('ID_POZYCJA', 'desc')->paginate(10);

		return view('player_positions.index', compact('player_positions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('player_positions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$player_position = new PlayerPosition();

		$player_position->NAZWA = $request->input("NAZWA");

		$player_position->save();

		return redirect()->route('player_positions.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$player_position = PlayerPosition::findOrFail($id);

		return view('player_positions.show', compact('player_position'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$player_position = PlayerPosition::findOrFail($id);

		return view('player_positions.edit', compact('player_position'));
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
		$player_position = PlayerPosition::findOrFail($id);

		$player_position->NAZWA = $request->input("NAZWA");

		$player_position->save();

		return redirect()->route('player_positions.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$player_position = PlayerPosition::findOrFail($id);
		$Player = Player::where('POZYCJA_ID_POZYCJA', $id)->get();
		if (!empty($Player)) {
			return redirect()->route('player_positions.index')->with('message', 'Nie mozna usunac -  posiada przypisanego piłkarza.');
		}
		$player_position->delete();

		return redirect()->route('player_positions.index')->with('message', 'Item deleted successfully.');
	}

}
