<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMOVIESRequest;
use App\Http\Requests\UpdateMOVIESRequest;
use App\Repositories\MOVIESRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MOVIESController extends AppBaseController
{
    /** @var  MOVIESRepository */
    private $mOVIESRepository;

    public function __construct(MOVIESRepository $mOVIESRepo)
    {
        $this->mOVIESRepository = $mOVIESRepo;
    }

    /**
     * Display a listing of the MOVIES.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $mOVIES = $this->mOVIESRepository->all();

        return view('m_o_v_i_e_s.index')
            ->with('mOVIES', $mOVIES);
    }

    /**
     * Show the form for creating a new MOVIES.
     *
     * @return Response
     */
    public function create()
    {
        return view('m_o_v_i_e_s.create');
    }

    /**
     * Store a newly created MOVIES in storage.
     *
     * @param CreateMOVIESRequest $request
     *
     * @return Response
     */
    public function store(CreateMOVIESRequest $request)
    {
        $input = $request->all();

        $mOVIES = $this->mOVIESRepository->create($input);

        Flash::success('M O V I E S saved successfully.');

        return redirect(route('mOVIES.index'));
    }

    /**
     * Display the specified MOVIES.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mOVIES = $this->mOVIESRepository->find($id);

        if (empty($mOVIES)) {
            Flash::error('M O V I E S not found');

            return redirect(route('mOVIES.index'));
        }

        return view('m_o_v_i_e_s.show')->with('mOVIES', $mOVIES);
    }

    /**
     * Show the form for editing the specified MOVIES.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mOVIES = $this->mOVIESRepository->find($id);

        if (empty($mOVIES)) {
            Flash::error('M O V I E S not found');

            return redirect(route('mOVIES.index'));
        }

        return view('m_o_v_i_e_s.edit')->with('mOVIES', $mOVIES);
    }

    /**
     * Update the specified MOVIES in storage.
     *
     * @param int $id
     * @param UpdateMOVIESRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMOVIESRequest $request)
    {
        $mOVIES = $this->mOVIESRepository->find($id);

        if (empty($mOVIES)) {
            Flash::error('M O V I E S not found');

            return redirect(route('mOVIES.index'));
        }

        $mOVIES = $this->mOVIESRepository->update($request->all(), $id);

        Flash::success('M O V I E S updated successfully.');

        return redirect(route('mOVIES.index'));
    }

    /**
     * Remove the specified MOVIES from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mOVIES = $this->mOVIESRepository->find($id);

        if (empty($mOVIES)) {
            Flash::error('M O V I E S not found');

            return redirect(route('mOVIES.index'));
        }

        $this->mOVIESRepository->delete($id);

        Flash::success('M O V I E S deleted successfully.');

        return redirect(route('mOVIES.index'));
    }
}
