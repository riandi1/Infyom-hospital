<?php

namespace App\Queries;

use App\Models\NoticeBoard;
use Illuminate\Database\Query\Builder;

/**
 * Class NoticeBoardDataTable
 */
class NoticeBoardDataTable
{
    /**
     * @return Builder
     */
    public function get()
    {
        return NoticeBoard::orderBy('created_at', 'desc');
    }
}
