<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Cliente;
use App\Http\Requests\CreateClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Http\Request;



class ClienteController extends Controller {

	/**
	 * Display a listing of cliente
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $cliente = Cliente::all();

		return view('admin.cliente.index', compact('cliente'));
	}

	/**
	 * Show the form for creating a new cliente
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.cliente.create');
	}

	/**
	 * Store a newly created cliente in storage.
	 *
     * @param CreateClienteRequest|Request $request
	 */
	public function store(CreateClienteRequest $request)
	{
	    
		Cliente::create($request->all());

		return redirect()->route(config('quickadmin.route').'.cliente.index');
	}

	/**
	 * Show the form for editing the specified cliente.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$cliente = Cliente::find($id);
	    
	    
		return view('admin.cliente.edit', compact('cliente'));
	}

	/**
	 * Update the specified cliente in storage.
     * @param UpdateClienteRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateClienteRequest $request)
	{
		$cliente = Cliente::findOrFail($id);

        

		$cliente->update($request->all());

		return redirect()->route(config('quickadmin.route').'.cliente.index');
	}

	/**
	 * Remove the specified cliente from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Cliente::destroy($id);

		return redirect()->route(config('quickadmin.route').'.cliente.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Cliente::destroy($toDelete);
        } else {
            Cliente::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.cliente.index');
    }

}
