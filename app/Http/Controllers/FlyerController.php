<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Flyer;
use App\Helpers\DateValidator;
use App\Helpers\Pagination;

class FlyerController extends Controller
{
    /**
     * Display a listing of the all flyers.
     *
     * @return string
     */
    public function index(Request $request)
    {
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
        
        $flyer = new Flyer();
        
        $flyer->setWhereCallable(
            function ($record) {
                return DateValidator::isDateBetween($record["start_date"], $record["end_date"]);
            }
        );

        $pagination = Pagination::getPagination($flyer->getData(0, -1), $limit, $page);

        $flyers = $flyer->getData($offset, $limit);

        $result = [
            'pagination' => $pagination,
            'data' => $flyers,
        ];
        
        return json_encode($result);
    }
}
