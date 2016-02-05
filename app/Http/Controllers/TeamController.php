<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Team;
use App\Models\Coatch;
use Illuminate\Http\Request;

class TeamController extends Controller {

	private static function getCoach($coaches) {
		$list = [];
		foreach ($coaches as $coach) {
			$list[$coach->ID_TRENER] = $coach->IMIE . ' ' . $coach->NAZWISKO;
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
		$teams = Team::orderBy('ID_DRUZYNA', 'desc')->paginate(10);

		$coaches = Coatch::get();
		if (empty($coaches)) {
			return redirect()->route('coatches.index')->with('message', 'Najpierw dodaj  Trenera.');
		}

		return view('teams.index', compact('teams'))->with('list', self::getCoach($coaches));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$coaches = Coatch::get();
		if (empty($coaches)) {
			return redirect()->route('coatches.index')->with('message', 'Najpierw dodaj  Trenera.');
		}
		return view('teams.create')->with('coaches', $coaches);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$team = new Team();

		$team->NAZWA = $request->input("NAZWA");
        $team->TRENER_ID_TRENER = $request->input("TRENER_ID_TRENER");
        $team->BUDZET = $request->input("BUDZET");

		$team->save();

		return redirect()->route('teams.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$team = Team::findOrFail($id);

		return view('teams.show', compact('team'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$team = Team::findOrFail($id);
		$coaches = Coatch::get();
		if (empty($coaches)) {
			return redirect()->route('coatches.index')->with('message', 'Najpierw dodaj  Trenera.');
		}
		return view('teams.edit', compact('team'))->with('coaches', $coaches);
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
		$team = Team::findOrFail($id);

		$team->NAZWA = $request->input("NAZWA");
        $team->TRENER_ID_TRENER = $request->input("TRENER_ID_TRENER");
        $team->BUDZET = $request->input("BUDZET");

		$team->save();

		return redirect()->route('teams.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$team = Team::findOrFail($id);
		$team->delete();

		return redirect()->route('teams.index')->with('message', 'Item deleted successfully.');
	}

}
