<?php

namespace App\Helpers;

class Pagination {
    
    /**
     * getPagination
     * 
     * This method allow to get all pagination parameter.
     *
     * @param  array $array
     * @param  int $limit
     * @param  int $currentPage
     * 
     * @return array $pagination
     */
    public static function getPagination($array, $limit, $currentPage) :array {
        $countArray = count($array);
        $totalPage = (int)ceil($countArray / $limit);

        $pagination = [
            'total_page' => $totalPage,
            'next'       => $currentPage !== $totalPage ? '/flyers?page='. $currentPage + 1 .'&limit='. $limit : '',
            'prev'       => $currentPage > 1 ? '/flyers?page='. $currentPage - 1 .'&limit='. $limit : '',
        ];

        return $pagination;
    }
}