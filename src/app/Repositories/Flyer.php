<?php

namespace App\Repositories;

use App\Repositories\CsvRepository;

class Flyer extends CsvRepository
{
    public function __construct()
    {
        $this->fileName = "flyers_data";
        parent::__construct();
    }
}
