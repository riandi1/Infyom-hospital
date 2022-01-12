<?php

namespace App\Queries;

use App\Models\Bed;
use Illuminate\Database\Query\Builder;

/**
 * Class BedDataTable
 */
class BedDataTable
{
    /**
     * @return Bed|Builder
     */
    public function get()
    {
        /** @var Bed $query */
        $query = Bed::with('bedType')->select('beds.*');

        return $query;
    }
}
