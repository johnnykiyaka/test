<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepatureRequest;
use App\Http\Requests\UpdateDepatureRequest;
use App\Repositories\DepatureRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DepatureController extends AppBaseController
{
    /** @var  DepatureRepository */
    private $depatureRepository;

    public function __construct(DepatureRepository $depatureRepo)
    {
        $this->depatureRepository = $depatureRepo;
    }

    /**
     * Display a listing of the Depature.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $depatures = $this->depatureRepository->all();

        return view('depatures.index')
            ->with('depatures', $depatures);
    }

    /**
     * Show the form for creating a new Depature.
     *
     * @return Response
     */
    public function create()
    {
        return view('depatures.create');
    }

    /**
     * Store a newly created Depature in storage.
     *
     * @param CreateDepatureRequest $request
     *
     * @return Response
     */
    public function store(CreateDepatureRequest $request)
    {
        $input = $request->all();

        $depature = $this->depatureRepository->create($input);

        Flash::success('Depature saved successfully.');

        return redirect(route('depatures.index'));
    }

    /**
     * Display the specified Depature.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $depature = $this->depatureRepository->find($id);

        if (empty($depature)) {
            Flash::error('Depature not found');

            return redirect(route('depatures.index'));
        }

        return view('depatures.show')->with('depature', $depature);
    }

    /**
     * Show the form for editing the specified Depature.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $depature = $this->depatureRepository->find($id);

        if (empty($depature)) {
            Flash::error('Depature not found');

            return redirect(route('depatures.index'));
        }

        return view('depatures.edit')->with('depature', $depature);
    }

    /**
     * Update the specified Depature in storage.
     *
     * @param int $id
     * @param UpdateDepatureRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepatureRequest $request)
    {
        $depature = $this->depatureRepository->find($id);

        if (empty($depature)) {
            Flash::error('Depature not found');

            return redirect(route('depatures.index'));
        }

        $depature = $this->depatureRepository->update($request->all(), $id);

        Flash::success('Depature updated successfully.');

        return redirect(route('depatures.index'));
    }

    /**
     * Remove the specified Depature from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $depature = $this->depatureRepository->find($id);

        if (empty($depature)) {
            Flash::error('Depature not found');

            return redirect(route('depatures.index'));
        }

        $this->depatureRepository->delete($id);

        Flash::success('Depature deleted successfully.');

        return redirect(route('depatures.index'));
    }
}
