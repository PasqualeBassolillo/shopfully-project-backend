<?php

namespace App\Helpers;

class Pagination {
    
    /**
     * isDateBetween
     * 
     * This method allow to define if the current date is between start and end date.
     *
     * @param  string $start
     * @param  string $end
     * @param  string $selected
     * 
     * @return bool
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