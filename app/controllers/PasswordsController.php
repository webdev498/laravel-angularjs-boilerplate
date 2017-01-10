<?php
use App\Models\Password;

class PasswordsController extends \BaseController {

	/**
	* Password Repository
	*
	* @var Password
	*/
	protected $password;

	public function __construct(Password $password)
	{
		$this->password = $password;
	}

	/**
	 * Display a listing of the resource.
	 * GET /passwords
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json( $this->password->get() );
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /passwords
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validation = Validator::make($input, Password::$rules);

		if ($validation->passes())
		{
			// angular post client model
			$input['client_id'] = $input['client']['id'];
			unset($input['client']);

			$this->password->create($input);

			return Response::json( array('message'=>'done') );

		}

	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$password = $this->password->findOrFail($id);

		return Response::json( $password );

	}
	/**
	 * Update the specified resource in storage.
	 * PUT /passwords/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$input = array_except(Input::all(), '_method');

		//dd($input);

		$validation = Validator::make($input, Password::$rules);

		if ($validation->passes())
		{
			$password = $this->password->find($id);
			$password->update($input);

			return Response::json( $password );

		}else{
			return Response::json( array('message'=>'error validation'),400 );
		}


	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /passwords/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->password->find($id)->delete();
		return Response::json( array('message'=>'deleted') );
	}

}
