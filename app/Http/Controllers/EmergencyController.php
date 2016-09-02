<?php

namespace App\Http\Controllers;

use App\Hospub\Repositories\EmergencyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmergencyController extends Controller
{

    // protected $clinicsRepository;

    /**
     * EmergencyRepository constructor.
     * @param EmergencyRepository $EmergencyRepository
     */
    public function __construct(EmergencyRepository $EmergencyRepository)
    {
        $this->EmergencyRepository = $EmergencyRepository;
    }

     /* Display the specified resource.
     *
     * @param $clinic_id
     * @return \Illuminate\Http\Response
     */
    public function get_patients_by_id($registry)
    {
          $patients = $this->EmergencyRepository->get_patients_by_id($registry);
          return $patients;
    }

}
