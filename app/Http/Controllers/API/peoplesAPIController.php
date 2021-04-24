<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepeoplesAPIRequest;
use App\Http\Requests\API\UpdatepeoplesAPIRequest;
use App\Models\peoples;
use App\Repositories\peoplesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class peoplesController
 * @package App\Http\Controllers\API
 */

class peoplesAPIController extends AppBaseController
{
    /** @var  peoplesRepository */
    private $peoplesRepository;

    public function __construct(peoplesRepository $peoplesRepo)
    {
        $this->peoplesRepository = $peoplesRepo;
    }

    /**
     * Display a listing of the peoples.
     * GET|HEAD /peoples
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $peoples = $this->peoplesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($peoples->toArray(), 'Peoples retrieved successfully');
    }

    /**
     * Store a newly created peoples in storage.
     * POST /peoples
     *
     * @param CreatepeoplesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepeoplesAPIRequest $request)
    {
        $input = $request->all();

        $peoples = $this->peoplesRepository->create($input);

        return $this->sendResponse($peoples->toArray(), 'Peoples saved successfully');
    }

    /**
     * Display the specified peoples.
     * GET|HEAD /peoples/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var peoples $peoples */
        $peoples = $this->peoplesRepository->find($id);

        if (empty($peoples)) {
            return $this->sendError('Peoples not found');
        }

        return $this->sendResponse($peoples->toArray(), 'Peoples retrieved successfully');
    }

    /**
     * Update the specified peoples in storage.
     * PUT/PATCH /peoples/{id}
     *
     * @param int $id
     * @param UpdatepeoplesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepeoplesAPIRequest $request)
    {
        $input = $request->all();

        /** @var peoples $peoples */
        $peoples = $this->peoplesRepository->find($id);

        if (empty($peoples)) {
            return $this->sendError('Peoples not found');
        }

        $peoples = $this->peoplesRepository->update($input, $id);

        return $this->sendResponse($peoples->toArray(), 'peoples updated successfully');
    }

    /**
     * Remove the specified peoples from storage.
     * DELETE /peoples/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var peoples $peoples */
        $peoples = $this->peoplesRepository->find($id);

        if (empty($peoples)) {
            return $this->sendError('Peoples not found');
        }

        $peoples->delete();

        return $this->sendSuccess('Peoples deleted successfully');
    }
}
