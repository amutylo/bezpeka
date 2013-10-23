<?php

class UserController extends BaseController {

	/**
	 * User repository
	 * @var $user
	 */
	protected $user;

	public function __construct(User $user){
		$this->user = $user;
	}

	/**
	 * Display a listing of the users.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->all();

        return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
					'email' => 'required|email|unique:users,email',
					'password' => 'required|alpha_num|between:4,50',
					'username' => 'required|alpha_num|between:2,20|unique:users,username'
				);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$user = new User;
		$user->email = Input::get('email');
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->save();

		//шлем ему мыло
		Mail::send('emails.admin_create_user', array('username' => $user->username, 'siteName' => 'BEZPEKA SITE', 'password' => Input::get('password')), function($message) use ($user)
		{
			$message->to($user->email, $user->username)->subject('Добро пожаловать на сайт!');
		});


		return Redirect::home()->with('message', 'Thank you for registration, now you can comment on offers!');
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->user->findOrFail($id);
        return View::make('users.show', compact($user));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->user->findOrFail($id);
        return View::make('users.edit', compact($user));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = $this->user->findOrFail($id);
		$roles = array();
		foreach (explode(', ', Input::get('roles')) as $role_name) {
			if($role = Role::where('role', '=', $role_name)->first()){
                $roles[] = $role->id;
            }
		}
        $user->roles()->sync($roles);
		return Redirect::route('users.show', $id);
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->user->findOrFail($id)->delete();
        return Redirect::route('users.index');
	}

}
