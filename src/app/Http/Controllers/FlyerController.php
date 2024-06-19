<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Flyer;
use App\Helpers\DateValidator;
use App\Helpers\Pagination;
use Exception;

class FlyerController extends Controller
{
    protected $flyer;

    public function __construct(Flyer $flyer) {
        $this->flyer = $flyer;
    }

    /**
     * Display a listing of the all flyers.
     *
     * @return string
     */
    public function index(Request $request)
    {
        try {
            if($request->get('limit')) {
                $limit = (int)$request->get('limit');
            } else {
                $limit = 100;
            }

            if($request->get('page')) {
                $page = (int)$request->get('page');
            } else {
                $page = 1;
            }

            $offset = ($page - 1) * $limit;
            
            $this->flyer->setWhereCallable(
                function ($record) {
                    return DateValidator::isDateBetween($record["start_date"], $record["end_date"]);
                }
            );

            $pagination = Pagination::getPagination($this->flyer->getData(0, -1), $limit, $page);

            $flyers = $this->flyer->getData($offset, $limit);

            $result = [
                'pagination' => $pagination,
                'data' => $flyers,
            ];
            
            return json_encode($result);
        } catch (Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching the flyers.'], 500);
        }
    }

    /**
     * Display the specified flyer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) {
        try {
            $flyerData = $this->flyer->find($id);

            if ($flyerData) {
                return response()->json($flyerData);
            } else {
                return response()->json(['error' => 'Flyer not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching the flyer.'], 500);
        }
    }
}
