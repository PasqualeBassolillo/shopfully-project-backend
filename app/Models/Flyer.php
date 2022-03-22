<?php

namespace App\Models;

use App\Repositories\CsvRepository as RepositoriesCsvRepository;
use App\Utility\DateValidator;

class Flyer extends RepositoriesCsvRepository
{
    protected $fileName = "flyers_data";
}
