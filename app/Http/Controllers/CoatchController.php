<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Coatch;
use App\Models\CoatchLicence;
use App\Models\Team;
use Illuminate\Http\Request;

class CoatchController extends Controller {

	private static function getLicence($licences) {
		$list = [];
		foreach ($licences as $licence) {
			$list[$licence->ID_LIC_TR] = $licence->NAZWA;
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
		$coatches = Coatch::orderBy('ID_TRENER', 'desc')->paginate(10);
		$licences = CoatchLicence::get();
		if (empty($licences)) {
			return redirect()->route('coatch_licences.index')->with('message', 'Najpierw dodaj  licencje.');
		}

		return view('coatches.index', compact('coatches'))->with('list', self::getLicence($licences));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$licences = CoatchLicence::get();
		if (empty($licences)) {
			return redirect()->route('coatch_licences.index')->with('message', 'Najpierw dodaj  licencje.');
		}
		return view('coatches.create')->with('licences',$licences);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$coatch = new Coatch();

		$coatch->IMIE = $request->input("IMIE");
        $coatch->NAZWISKO = $request->input("NAZWISKO");
        $coatch->LICENCJA_TRENERSKA_ID_LIC_TR = $request->input("LICENCJA_TRENERSKA_ID_LIC_TR");

		$coatch->save();

		return redirect()->route('coatches.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$coatch = Coatch::findOrFail($id);
		$functionMY =\DB::select(\DB::raw("select nazwa($id)"));

		$licences = CoatchLicence::get();
		if (empty($licences)) {
			return redirect()->route('coatch_licences.index')->with('message', 'Najpierw dodaj  licencje.');
		}

		return view('coatches.show', compact('coatch'))->with('list', self::getLicence($licences))->with('MYK',$functionMY);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$coatch = Coatch::findOrFail($id);
		$licences = CoatchLicence::get();
		if (empty($licences)) {
			return redirect()->route('coatch_licences.index')->with('message', 'Najpierw dodaj  licencje.');
		}
		return view('coatches.edit', compact('coatch'))->with('licences',$licences);
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
		$coatch = Coatch::findOrFail($id);

		$coatch->IMIE = $request->input("IMIE");
        $coatch->NAZWISKO = $request->input("NAZWISKO");
        $coatch->LICENCJA_TRENERSKA_ID_LIC_TR = $request->input("LICENCJA_TRENERSKA_ID_LIC_TR");

		$coatch->save();

		return redirect()->route('coatches.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$coatch = Coatch::findOrFail($id);
		$team = Team::where('TRENER_ID_TRENER', $id)->first();
		if (!empty($team)) {
			$text = 'Nie mozna usunac -  posiada przypisaną druzynę ('. $team->NAZWA . ')';
			return redirect()->route('coatches.index')->with('message', $text);
		}
		$coatch->delete();

		return redirect()->route('coatches.index')->with('message', 'Item deleted successfully.');
	}

}
