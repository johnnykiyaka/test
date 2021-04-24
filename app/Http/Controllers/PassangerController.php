<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePassangerRequest;
use App\Http\Requests\UpdatePassangerRequest;
use App\Repositories\PassangerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PassangerController extends AppBaseController
{
    /** @var  PassangerRepository */
    private $passangerRepository;

    public function __construct(PassangerRepository $passangerRepo)
    {
        $this->passangerRepository = $passangerRepo;
    }

    /**
     * Display a listing of the Passanger.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $passangers = $this->passangerRepository->all();

        return view('passangers.index')
            ->with('passangers', $passangers);
    }

    /**
     * Show the form for creating a new Passanger.
     *
     * @return Response
     */
    public function create()
    {
        return view('passangers.create');
    }

    /**
     * Store a newly created Passanger in storage.
     *
     * @param CreatePassangerRequest $request
     *
     * @return Response
     */
    public function store(CreatePassangerRequest $request)
    {
        $input = $request->all();

        $passanger = $this->passangerRepository->create($input);

        Flash::success('Passanger saved successfully.');

        return redirect(route('passangers.index'));
    }

    /**
     * Display the specified Passanger.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $passanger = $this->passangerRepository->find($id);

        if (empty($passanger)) {
            Flash::error('Passanger not found');

            return redirect(route('passangers.index'));
        }

        return view('passangers.show')->with('passanger', $passanger);
    }

    /**
     * Show the form for editing the specified Passanger.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $passanger = $this->passangerRepository->find($id);

        if (empty($passanger)) {
            Flash::error('Passanger not found');

            return redirect(route('passangers.index'));
        }

        return view('passangers.edit')->with('passanger', $passanger);
    }

    /**
     * Update the specified Passanger in storage.
     *
     * @param int $id
     * @param UpdatePassangerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePassangerRequest $request)
    {
        $passanger = $this->passangerRepository->find($id);

        if (empty($passanger)) {
            Flash::error('Passanger not found');

            return redirect(route('passangers.index'));
        }

        $passanger = $this->passangerRepository->update($request->all(), $id);

        Flash::success('Passanger updated successfully.');

        return redirect(route('passangers.index'));
    }

    /**
     * Remove the specified Passanger from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $passanger = $this->passangerRepository->find($id);

        if (empty($passanger)) {
            Flash::error('Passanger not found');

            return redirect(route('passangers.index'));
        }

        $this->passangerRepository->delete($id);

        Flash::success('Passanger deleted successfully.');

        return redirect(route('passangers.index'));
    }
}
