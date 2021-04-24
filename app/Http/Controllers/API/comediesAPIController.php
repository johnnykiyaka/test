<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecomediesAPIRequest;
use App\Http\Requests\API\UpdatecomediesAPIRequest;
use App\Models\comedies;
use App\Repositories\comediesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class comediesController
 * @package App\Http\Controllers\API
 */

class comediesAPIController extends AppBaseController
{
    /** @var  comediesRepository */
    private $comediesRepository;

    public function __construct(comediesRepository $comediesRepo)
    {
        $this->comediesRepository = $comediesRepo;
    }

    /**
     * Display a listing of the comedies.
     * GET|HEAD /comedies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $comedies = $this->comediesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($comedies->toArray(), 'Comedies retrieved successfully');
    }

    /**
     * Store a newly created comedies in storage.
     * POST /comedies
     *
     * @param CreatecomediesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecomediesAPIRequest $request)
    {
        $input = $request->all();

        $comedies = $this->comediesRepository->create($input);

        return $this->sendResponse($comedies->toArray(), 'Comedies saved successfully');
    }

    /**
     * Display the specified comedies.
     * GET|HEAD /comedies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var comedies $comedies */
        $comedies = $this->comediesRepository->find($id);

        if (empty($comedies)) {
            return $this->sendError('Comedies not found');
        }

        return $this->sendResponse($comedies->toArray(), 'Comedies retrieved successfully');
    }

    /**
     * Update the specified comedies in storage.
     * PUT/PATCH /comedies/{id}
     *
     * @param int $id
     * @param UpdatecomediesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecomediesAPIRequest $request)
    {
        $input = $request->all();

        /** @var comedies $comedies */
        $comedies = $this->comediesRepository->find($id);

        if (empty($comedies)) {
            return $this->sendError('Comedies not found');
        }

        $comedies = $this->comediesRepository->update($input, $id);

        return $this->sendResponse($comedies->toArray(), 'comedies updated successfully');
    }

    /**
     * Remove the specified comedies from storage.
     * DELETE /comedies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var comedies $comedies */
        $comedies = $this->comediesRepository->find($id);

        if (empty($comedies)) {
            return $this->sendError('Comedies not found');
        }

        $comedies->delete();

        return $this->sendSuccess('Comedies deleted successfully');
    }
}
