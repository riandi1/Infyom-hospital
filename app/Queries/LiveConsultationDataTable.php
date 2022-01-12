<?php

namespace App\Queries;

use App\Models\LiveConsultation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

/**
 * Class LiveConsultationDataTable
 */
class LiveConsultationDataTable
{
    /**
     * @return LiveConsultation|Builder
     */
    public function get()
    {
        /** @var LiveConsultation $query */
        $query = LiveConsultation::whereHas('patient.user')->whereHas('doctor.user')->whereHas('user')->with([
            'patient.user', 'doctor.user', 'user',
        ]);

        if (getLoggedInUser()->hasRole('Patient')) {
            $query->where('patient_id', getLoggedInUser()->owner_id)->select('live_consultations.*');
        }
        if (getLoggedInUser()->hasRole('Doctor')) {
            $query->where('doctor_id', getLoggedInUser()->owner_id)->select('live_consultations.*');
        }
        $query->select('live_consultations.*');

        return $query;
    }
}
