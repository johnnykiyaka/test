<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatefrightgoRequest;
use App\Http\Requests\UpdatefrightgoRequest;
use App\Repositories\frightgoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class frightgoController extends AppBaseController
{
    /** @var  frightgoRepository */
    private $frightgoRepository;

    public function __construct(frightgoRepository $frightgoRepo)
    {
        $this->frightgoRepository = $frightgoRepo;
    }

    /**
     * Display a listing of the frightgo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $frightgos = $this->frightgoRepository->all();

        return view('frightgos.index')
            ->with('frightgos', $frightgos);
    }

    /**
     * Show the form for creating a new frightgo.
     *
     * @return Response
     */
    public function create()
    {
        return view('frightgos.create');
    }

    /**
     * Store a newly created frightgo in storage.
     *
     * @param CreatefrightgoRequest $request
     *
     * @return Response
     */
    public function store(CreatefrightgoRequest $request)
    {
        $input = $request->all();

        $frightgo = $this->frightgoRepository->create($input);

        Flash::success('Frightgo saved successfully.');

        return redirect(route('frightgos.index'));
    }

    /**
     * Display the specified frightgo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $frightgo = $this->frightgoRepository->find($id);

        if (empty($frightgo)) {
            Flash::error('Frightgo not found');

            return redirect(route('frightgos.index'));
        }

        return view('frightgos.show')->with('frightgo', $frightgo);
    }

    /**
     * Show the form for editing the specified frightgo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $frightgo = $this->frightgoRepository->find($id);

        if (empty($frightgo)) {
            Flash::error('Frightgo not found');

            return redirect(route('frightgos.index'));
        }

        return view('frightgos.edit')->with('frightgo', $frightgo);
    }

    /**
     * Update the specified frightgo in storage.
     *
     * @param int $id
     * @param UpdatefrightgoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefrightgoRequest $request)
    {
        $frightgo = $this->frightgoRepository->find($id);

        if (empty($frightgo)) {
            Flash::error('Frightgo not found');

            return redirect(route('frightgos.index'));
        }

        $frightgo = $this->frightgoRepository->update($request->all(), $id);

        Flash::success('Frightgo updated successfully.');

        return redirect(route('frightgos.index'));
    }

    /**
     * Remove the specified frightgo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $frightgo = $this->frightgoRepository->find($id);

        if (empty($frightgo)) {
            Flash::error('Frightgo not found');

            return redirect(route('frightgos.index'));
        }

        $this->frightgoRepository->delete($id);

        Flash::success('Frightgo deleted successfully.');

        return redirect(route('frightgos.index'));
    }
}
