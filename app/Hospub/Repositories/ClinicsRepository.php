<?php
namespace App\Hospub\Repositories;

use Illuminate\Support\Facades\DB;

class ClinicsRepository {

    /**
     * @return mixed
     */
    public function get_all_clinics()
    {
        $clinics = DB::connection('openbase')
              ->select('SELECT "c14codclin" AS id, "c14nomec" AS name
                      FROM cen14
                      WHERE name NOT LIKE "DESATIVADO%" AND id >= "001"
                      ORDER BY name');
        // $clinics = Clinic::all();
        return $clinics;
    }

    /**
     * @return mixed
     */
    public function get_clinic_name($clinic_id)
    {
        $clinic = DB::connection('openbase')
              ->select("SELECT c14nomec AS name
                      FROM cen14 WHERE c14codclin = '$clinic_id' LIMIT 1");
        // $clinic = Clinic::where('c14codclin', $clinic_id)->first();
        return $clinic;
    }

}