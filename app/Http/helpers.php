<?php

function array_clean($array)
{
    foreach ($array as $key => $sub_array) {
        foreach ($sub_array as $key2 => $value2) {
            if(is_int($key2)) {
                unset($array[$key][$key2]);
            }
        }
    }

    return $array;
}

function merge_beds($array1, $array2 = null)
{
    $beds = array_merge($array1, $array2);
    foreach ($beds as $key => $value) {
        $clinic[$key] = $value->clinic_id;
        $ward[$key]   = $value->ward_id;
        $bed[$key]    = $value->bed_id;
    }
    array_multisort($ward, SORT_ASC, $clinic, SORT_ASC, $bed, SORT_ASC, $beds);

    return $beds;
}