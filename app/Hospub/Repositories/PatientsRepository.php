<?php
namespace App\Hospub\Repositories;

use Illuminate\Support\Facades\DB;

class PatientsRepository {

    /**
     * @param $clinic_id
     * @return mixed
     */
    public function get_patient_by_id($patient_id)
    {
        return DB::connection('openbase')
            ->select("SELECT  ib6.ib6nome as name,
                              ib6.ib6sexo as gender,
                              ib6.ib6dtnasc as birth
                      FROM intb6 ib6
                      WHERE ib6regist = '$patient_id'
                      LIMIT 1");
    }

    /**
     * @param $clinic_id
     * @return mixed
     */
    public function get_patients_by_clinic($clinic_id)
    {
        return DB::connection('openbase')
            ->select("SELECT  c02.i02pront AS patient_id,
                              c02.c02codclin AS clinic_id,
                              ib6.ib6nome as name,
                              ib6.ib6sexo as gender,
                              c02.d02inter as admission_date,
                              c02.c02codleito as bed_id,
                              c02.c02codenf as ward_id,
                              ib6.ib6dtnasc as birth,
                              ib8.ib8descr as procedure,
                              ib8.ib8tempo as procedure_time,
                              c02.c02cid10 as cid
                      FROM cen02 c02
                      LEFT JOIN intb6 ib6 ON patient_id = ib6.ib6regist
                      LEFT JOIN intb8 ib8 ON c02procsol = ib8.ib8codigo
                      WHERE clinic_id = '$clinic_id'
                      ORDER BY bed_id ASC");
    }

}