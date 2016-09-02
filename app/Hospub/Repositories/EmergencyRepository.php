<?php
namespace App\Hospub\Repositories;

use Illuminate\Support\Facades\DB;
use App\EmergencyAttendance;

class EmergencyRepository {

    /**
     * @param $register_id
     * @return mixed
     */
    public function get_patients_by_id($registry)
    {
        return DB::connection('openbase')
            ->select("SELECT
                      n54numbolet       AS registry_id,
                      c54identific      AS name,
                      d54nasc           AS birth,
                      c54sexo           AS gender,
                      c54mae            AS mother,
                      c54bairro         AS district,
                      c54mun            AS city_id,
                      c54uf             AS state,
                      c54cep            AS cep,
                      intd4.id4descricao
                      FROM cen54 AS c54
                      INNER JOIN intd4 ON c54.c54mun = intd4.id4codigo
                      WHERE n54numbolet > '$registry'");
    }

}
