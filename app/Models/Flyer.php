<?php

namespace App\Models;

use App\Repositories\CsvRepository as RepositoriesCsvRepository;

class Flyer extends RepositoriesCsvRepository
{
    protected $fileName = "flyers_data";
}
