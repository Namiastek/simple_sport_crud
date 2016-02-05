<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Player;
use App\Models\PlayerPosition;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller {

	private static function getPositions($positions) {
		$list = [];
		foreach ($positions as $position) {
			$list[$position->ID_POZYCJA] = $position->NAZWA;
		}
		return $list;
	}
	private static function getTeams($teams) {
		$list = [];
		foreach ($teams as $team) {
			$list[$team->ID_DRUZYNA] = $team->NAZWA;
		}
		return $list;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$teams = Team::get();
		if (empty($teams)) {
			return redirect()->route('teams.index')->with('message', 'Najpierw dodaj  Druzyne.');
		}

		$positions = PlayerPosition::get();
		if (empty($positions)) {
			return redirect()->route('teams.index')->with('message', 'Najpierw dodaj  pozycje.');
		}

		$players = Player::orderBy('ID_PILKARZ', 'desc')->paginate(10);

		return view('players.index', compact('players'))
			->with('positions',self::getPositions($positions))
			->with('teams',self::getTeams($teams));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$teams = Team::get();
		if (empty($teams)) {
			return redirect()->route('teams.index')->with('message', 'Najpierw dodaj  Druzyne.');
		}

		$positions = PlayerPosition::get();
		if (empty($positions)) {
			return redirect()->route('teams.index')->with('message', 'Najpierw dodaj  pozycje.');
		}

		return view('players.create')->with('teams', $teams)->with('positions', $positions);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$player = new Player();

		$player->IMIE = $request->input("IMIE");
        $player->NAZWISKO = $request->input("NAZWISKO");
        $player->POZYCJA_ID_POZYCJA = $request->input("POZYCJA_ID_POZYCJA");
        $player->DRUZYNA_ID_DRUZYNA = $request->input("DRUZYNA_ID_DRUZYNA");

		$player->save();

		return redirect()->route('players.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$player = Player::findOrFail($id);

		return view('players.show', compact('player'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$player = Player::findOrFail($id);
		$teams = Team::get();
		$positions = PlayerPosition::get();
		return view('players.edit', compact('player'))->with('teams', $teams)->with('positions', $positions);
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
		$player = Player::findOrFail($id);

		$player->IMIE = $request->input("IMIE");
        $player->NAZWISKO = $request->input("NAZWISKO");
        $player->POZYCJA_ID_POZYCJA = $request->input("POZYCJA_ID_POZYCJA");
        $player->DRUZYNA_ID_DRUZYNA = $request->input("DRUZYNA_ID_DRUZYNA");

		$player->save();

		return redirect()->route('players.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$player = Player::findOrFail($id);
		$player->delete();

		return redirect()->route('players.index')->with('message', 'Item deleted successfully.');
	}

}
