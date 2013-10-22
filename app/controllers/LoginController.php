<?php

class LoginController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('login.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('login.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'email' =>'required|email|unique:users,email',
			'password' => 'required|alfa_num|between:4,50',
			'username' => 'required|alfa_num|between:2,20|unique:users,username'
			);

		$validator = Validator::make(Input::all, $rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$user = new User;
		$user->email = Input::get('email');
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->save;

		Auth::loginUsingId($user->id);

		return Redirect::home()->with('message', 'Спасибо за регистрацию!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('login.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('login.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

	/**
	 * Log in to site
	 * @return Response
	 */
	public function login(){
		if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')), true)
			|| Auth::attempt(array('username' => Input::get('email'), 'password' => Input::get('password')), true)
			){
			return Redirect::back()->withInput(Input::except('password'))->with('message','Неправильные креды!');
		}
	}

	/**
	 * log out from site
	 * @return Response
	 */
	public function logout(){
		Auth::logout();
		return Redirect::home()->with('message','Надеемся встретится вновь!');
	}
}
