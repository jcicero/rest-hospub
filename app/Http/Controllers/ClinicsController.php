<?php

namespace App\Http\Controllers;

use App\Hospub\Repositories\BedsRepository;
use App\Hospub\Repositories\ClinicsRepository;
use App\Hospub\Repositories\PatientsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClinicsController extends Controller
{

    // protected $clinicsRepository;

    /**
     * ClinicsController constructor.
     * @param ClinicsRepository $ClinicsRepository
     * @param PatientsRepository $PatientsRepository
     * @param BedsRepository $BedsRepository
     */
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
    public function index()
    {
        $patients = $this->ClinicsRepository->get_all_clinics();

        return $patients;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($clinic_id)
    {
        $clinic = $this->ClinicsRepository->get_clinic_name($clinic_id);

        return $clinic;
    }

    /**
     * Display the specified resource.
     *
     * @param $clinic_id
     * @return \Illuminate\Http\Response
     */
    public function get_beds_by_clinic($clinic_id)
    {
        $emptyBeds = $this->BedsRepository->get_empty_beds_by_clinic($clinic_id);
        $patients = $this->PatientsRepository->get_patients_by_clinic($clinic_id);
        $beds = merge_beds($patients, $emptyBeds);

        return $beds;
    }

}
