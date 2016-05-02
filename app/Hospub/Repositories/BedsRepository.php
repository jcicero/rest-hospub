<?php
namespace App\Hospub\Repositories;

use Illuminate\Support\Facades\DB;

class BedsRepository {

    /**
     * @param $clinic_id
     * @return mixed
     */
    public function get_empty_beds_by_clinic($clinic_id)
    {
        return DB::connection('openbase')
            ->select("SELECT
                        c10codleito as bed_id,
                        c10codenf as ward_id,
                        c10codclin as clinic_id
				      FROM cen10 as c10
				      WHERE c10codclin = '$clinic_id'
					  AND c10condicao = '1'
					  ORDER BY bed_id ASC");
    }

}