<?php

namespace App\Http\Controllers;

use App\Hospub\Repositories\BedsRepository;
use App\Hospub\Repositories\ClinicsRepository;
use App\Hospub\Repositories\PatientsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PatientsController extends Controller
{

    public function __construct(ClinicsRepository $ClinicsRepository,
                                PatientsRepository $PatientsRepository,
                                BedsRepository $BedsRepository)
    {
        $this->ClinicsRepository = $ClinicsRepository;
        $this->PatientsRepository = $PatientsRepository;
        $this->BedsRepository = $BedsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_patient_by_id($patient_id)
    {
        $patient = $this->PatientsRepository->get_patient_by_id($patient_id);

        return $patient;
    }

}
