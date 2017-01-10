<?php

class ClientsController extends \BaseController {

	/**
	* client Repository
	*
	* @var client
	*/
	protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	/**
	 * Display a listing of the resource.
	 * GET /clients
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json( $this->client->get() );
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /clients
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Client::$rules);

		if ($validation->passes())
		{

			$this->client->create($input);

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
		$client = $this->client->findOrFail($id);

		return Response::json( $client );

	}
	/**
	 * Update the specified resource in storage.
	 * PUT /clients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$input = array_except(Input::all(), '_method');

		$validation = Validator::make($input, Client::$rules);

		if ($validation->passes())
		{
			$client = $this->client->find($id);
			$client->update($input);

			return Response::json( $client );

		}else{
			return Response::json( array('message'=>'error validation'),400 );
		}


	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /clients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->client->find($id)->delete();
		return Response::json( array('message'=>'deleted') );
	}

}
