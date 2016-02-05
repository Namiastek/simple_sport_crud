<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Judge;
use App\Models\JudgeLicence;
use Illuminate\Http\Request;

class JudgeController extends Controller {

	private static function getLicence($licences) {
		$list = [];
		foreach ($licences as $licence) {
			$list[$licence->ID_LIC_S] = $licence->NAZWA;
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
		$judges = Judge::orderBy('ID_SEDZIA', 'desc')->paginate(10);

		$licences = JudgeLicence::get();
		if (empty($licences)) {
			return redirect()->route('judge_licences.index')->with('message', 'Najpierw dodaj  licencje.');
		}


		return view('judges.index', compact('judges'))->with('list', self::getLicence($licences));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$licences = JudgeLicence::get();
		if (empty($licences)) {
			return redirect()->route('coatch_licences.index')->with('message', 'Najpierw dodaj  licencje.');
		}
		return view('judges.create')->with('licences',$licences);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$judge = new Judge();

		$judge->IMIE = $request->input("IMIE");
        $judge->NAZWISKO = $request->input("NAZWISKO");
        $judge->DATA_DEBIUTU = $request->input("DATA_DEBIUTU");
        $judge->LICENCJA_SEDZIEGO_ID_LIC_S = $request->input("LICENCJA_SEDZIEGO_ID_LIC_S");

		$judge->save();

		return redirect()->route('judges.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$judge = Judge::findOrFail($id);

		return view('judges.show', compact('judge'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$judge = Judge::findOrFail($id);

		$licences = JudgeLicence::get();
		if (empty($licences)) {
			return redirect()->route('judge_licences.index')->with('message', 'Najpierw dodaj  licencje.');
		}
		return view('judges.edit', compact('judge'))->with('licences',$licences);
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
		$judge = Judge::findOrFail($id);

		$judge->IMIE = $request->input("IMIE");
        $judge->NAZWISKO = $request->input("NAZWISKO");
        $judge->DATA_DEBIUTU = $request->input("DATA_DEBIUTU");
        $judge->LICENCJA_SEDZIEGO_ID_LIC_S = $request->input("LICENCJA_SEDZIEGO_ID_LIC_S");

		$judge->save();

		return redirect()->route('judges.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$judge = Judge::findOrFail($id);
		$judge->delete();

		return redirect()->route('judges.index')->with('message', 'Item deleted successfully.');
	}

}
