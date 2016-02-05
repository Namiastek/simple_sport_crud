<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Arena;
use App\Models\Championship;
use App\Models\Game;
use App\Models\Judge;
use App\Models\Team;
use Illuminate\Http\Request;

class GameController extends Controller {

	private static function getTeams($teams) {
		$list = [];
		foreach ($teams as $team) {
			$list[$team->ID_DRUZYNA] = $team->NAZWA;
		}
		return $list;
	}

	private static function getJudges($teams) {
		$list = [];
		foreach ($teams as $team) {
			$list[$team->ID_SEDZIA] = $team->IMIE . ' ' . $team->NAZWISKO;
		}
		return $list;
	}

	private static function getChampionship($teams) {
		$list = [];
		foreach ($teams as $team) {
			$list[$team->ID_ROZGRYWKI] = $team->NAZWA;
		}
		return $list;
	}

	private static function getArena($teams) {
		$list = [];
		foreach ($teams as $team) {
			$list[$team->ID_STADION] = $team->NAZWA;
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
			return redirect()->route('teams.index')->with('message', 'Najpierw dodaj druzyne.');
		}

		$judges = Judge::get();
		if (empty($judges)) {
			return redirect()->route('judges.index')->with('message', 'Najpierw dodaj sedziego.');
		}

		$champions = Championship::get();
		if (empty($champions)) {
			return redirect()->route('championships.index')->with('message', 'Najpierw dodaj rozgrywki.');
		}

		$arenas = Arena::get();
		if (empty($arenas)) {
			return redirect()->route('arenas.index')->with('message', 'Najpierw dodaj stadion.');
		}

		$games = Game::orderBy('ID_MECZ', 'desc')->paginate(10);

		return view('games.index', compact('games'))
			->with('teams', self::getTeams($teams))
			->with('judges', self::getJudges($judges))
			->with('champions', self::getChampionship($champions))
			->with('arenas', self::getArena($arenas));
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
			return redirect()->route('teams.index')->with('message', 'Najpierw dodaj druzyne.');
		}

		$judges = Judge::get();
		if (empty($judges)) {
			return redirect()->route('judges.index')->with('message', 'Najpierw dodaj sedziego.');
		}

		$champions = Championship::get();
		if (empty($champions)) {
			return redirect()->route('championships.index')->with('message', 'Najpierw dodaj rozgrywki.');
		}

		$arenas = Arena::get();
		if (empty($arenas)) {
			return redirect()->route('arenas.index')->with('message', 'Najpierw dodaj stadion.');
		}

		return view('games.create')
			->with('teams', $teams)
			->with('judges', $judges)
			->with('champions', $champions)
			->with('arenas', $arenas);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$game = new Game();

        $game->DATA = $request->input("DATA");
        $game->DRUZYNA_ID_DRUZYNA = $request->input("DRUZYNA_ID_DRUZYNA");
        $game->DRUZYNA_ID_DRUZYNA2 = $request->input("DRUZYNA_ID_DRUZYNA2");

		if ($game->DRUZYNA_ID_DRUZYNA == $game->DRUZYNA_ID_DRUZYNA2) {
			\Session::flash('alert-class', 'alert-danger');
			return redirect()->route('games.index')->with('message', 'Błąd - wybierz 2 różne drużyny.');
		}


		$game->GOL_DRUZYNA = $request->input("GOL_DRUZYNA");
		$game->GOL_DRUZYNA1 = $request->input("GOL_DRUZYNA1");

		$game->SEDZIA_ID_SEDZIA = $request->input("SEDZIA_ID_SEDZIA");

        $game->STADIONY_ID_STADION = $request->input("STADIONY_ID_STADION");
        $game->ROZGRYWKI_ID_ROZGRYWKI = $request->input("ROZGRYWKI_ID_ROZGRYWKI");

		$game->save();
		$id = $game->ID_MECZ;
		$team1 = $game->DRUZYNA_ID_DRUZYNA;
		$team2 = $game->DRUZYNA_ID_DRUZYNA2;
		$gol1 = $game->GOL_DRUZYNA;
		$gol2 = $game->GOL_DRUZYNA1;
		try{
			\DB::raw("call updateBuget($id,$team1,$team2,$gol1,$gol2)");
		} catch (QueryException $e) {
		}

		/*
		\DB::select('call updateBuget(?,?,?,?,?)',array(
			$game->ID_MECZ,
			$game->DRUZYNA_ID_DRUZYNA,
			$game->DRUZYNA_ID_DRUZYNA2,
			$game->GOL_DRUZYNA,
			$game->GOL_DRUZYNA1));*/
		return redirect()->route('games.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$game = Game::findOrFail($id);

		return view('games.show', compact('game'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$game = Game::findOrFail($id);

		return view('games.edit', compact('game'));
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
		$game = Game::findOrFail($id);

		$game->DATA = $request->input("DATA");
		$game->DRUZYNA_ID_DRUZYNA = $request->input("DRUZYNA_ID_DRUZYNA");
		$game->DRUZYNA_ID_DRUZYNA2 = $request->input("DRUZYNA_ID_DRUZYNA2");

		$game->GOL_DRUZYNA = $request->input("GOL_DRUZYNA");
		$game->GOL_DRUZYNA1 = $request->input("GOL_DRUZYNA1");

		$game->SEDZIA_ID_SEDZIA = $request->input("SEDZIA_ID_SEDZIA");

		$game->STADIONY_ID_STADION = $request->input("STADIONY_ID_STADION");
		$game->ROZGRYWKI_ID_ROZGRYWKI = $request->input("ROZGRYWKI_ID_ROZGRYWKI");

		$game->save();

		return redirect()->route('games.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$game = Game::findOrFail($id);
		$game->delete();

		return redirect()->route('games.index')->with('message', 'Usunieto z sukcesem.');
	}

}
