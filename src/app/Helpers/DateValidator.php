<?php

namespace App\Helpers;

class DateValidator {
    
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
    public static function isDateBetween($start, $end, $selected = '2019-05-14') : bool {
        $start_date = new \DateTime($start);
        $end_date = new \DateTime($end);
        $selected_date = new \Datetime($selected);

        return $selected_date->getTimestamp() > $start_date->getTimestamp() && 
        $selected_date->getTimestamp() < $end_date->getTimestamp();
    }
}