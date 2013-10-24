<?php

class CatalogsController extends BaseController {

	/**
	 * Role Repository
	 *
	 * @var Role
	 */
	protected $catalog;

	public function __construct(Catalog $catalog)
	{
		$this->catalog = $catalog;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$catalogs = $this->catalog->all();
        if(Request::ajax()){
            $catalogs = Role::where('catalog', 'like', '%'.Input::get('term', '').'%')->get(array('id','catalog'));
        }
        return View::make('catalogs.index', compact('catalogs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('catalogs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Catalog::$rules);

		if ($validation->passes())
		{
			$this->catalog->create($input);

			return Redirect::route('catalogs.index');
		}

		return Redirect::route('catalogs.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'Валидация не прошла!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$catalog = $this->catalog->findOrFail($id);
        return View::make('catalogs.show', compact('catalog'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$catalog = $this->catalog->find($id);

		if (is_null($catalog))
		{
			return Redirect::route('catalogs.index');
		}
        return View::make('catalogs.edit', compact('catalog'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Catalog::$rules);

		if ($validation->passes())
		{
			$catalog = $this->catalog->find($id);
			$catalog->update($input);

			return Redirect::route('catalogs.show', $id);
		}

		return Redirect::route('catalogs.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'Ошибки при валидации.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
