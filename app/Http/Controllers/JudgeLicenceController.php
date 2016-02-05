<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\JudgeLicence;
use App\Models\Judge;
use Illuminate\Http\Request;

class JudgeLicenceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$judge_licences = JudgeLicence::orderBy('ID_LIC_S', 'desc')->paginate(10);

		return view('judge_licences.index', compact('judge_licences'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('judge_licences.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$judge_licence = new JudgeLicence();

		$judge_licence->NAZWA = $request->input("NAZWA");
        $judge_licence->WYNAGRODZENIE_ZA_MECZ = $request->input("WYNAGRODZENIE_ZA_MECZ");

		$judge_licence->save();

		return redirect()->route('judge_licences.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$judge_licence = JudgeLicence::findOrFail($id);

		return view('judge_licences.show', compact('judge_licence'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$judge_licence = JudgeLicence::findOrFail($id);

		return view('judge_licences.edit', compact('judge_licence'));
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
		$judge_licence = JudgeLicence::findOrFail($id);

		$judge_licence->NAZWA = $request->input("NAZWA");
        $judge_licence->WYNAGRODZENIE_ZA_MECZ = $request->input("WYNAGRODZENIE_ZA_MECZ");

		$judge_licence->save();

		return redirect()->route('judge_licences.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$judge_licence = JudgeLicence::findOrFail($id);
		$judge = Judge::where('LICENCJA_SEDZIEGO_ID_LIC_S', $id)->first();
		if (!empty($judge)) {
			$text = 'Nie mozna usunac -  posiada przypisanego sedziego ('. $judge->IMIE . ' '  .  $judge->NAZWISKO . ')';
			return redirect()->route('judge_licences.index')->with('message', $text);
		}
		$judge_licence->delete();

		return redirect()->route('judge_licences.index')->with('message', 'Item deleted successfully.');
	}

}
