<?php

namespace App\Traits;

trait CountryResolver {

    protected $array, $values = [];
    private $or, $and = '';

    protected function convert_checkbox($array) {

        foreach ($array as $key => $value) {
            if ($value == 'on') {
                $array['countries'][] = $key;
                unset($array[$key]);
            }
        }
        $this->array = $array;
        return $array;
    }

    private function prepare_query($array, $queryType, $cols, $complex = false) {

        $sql = '';
        foreach ($cols as $col) {
            $sql .= "$col = ? $queryType ";
        }
//        dd($sql);
//        dd(count($array) - 1);
//
////        $sql = $c > 1 ? true : $queryType;
//        dd($array);
//        dd(count($array) - 1);
//        dd(2 < (count($array) - 1));
//        dd(print_r(1 < (count($array) - 1)));
//        $sql = "abbreviation = ?";
//        $holder[] = array_where($array, function ($value, $key) {
//            if(is_array($value)) {
//                return count($value);
//            }
//        });
        $addOnce = $sql;
        for ($i = 0; $i < (count($array) - 1); $i++) {
            $sql .= $addOnce;
        }

        if($complex) {
//            dd(rtrim($addOnce, "$queryType "));
            $rgx = rtrim($addOnce, "$queryType ");
            dd(htmlentities($rgx));
            dd($rgx);
            $arr = [];
            preg_match("/$rgx/", $sql,$arr);
        }
        return rtrim($sql, "$queryType ");
    }

    public function get_values($array) {

        foreach ($array as $value) {
            if (is_array($value)) {
                $this->get_values($value);
            } else {
                $this->values[] = $value;
            }
        }
        return $this->values;
    }

    protected function sort_results($array)
    {
//        dd($array);
//        $zips = [];
//        foreach ($array['countries'] as $key => $value) {
//            $zips[] = self::find($value)->zips->where('zip', '=', $array['zip']);
//            if (!empty($zips[$key]->toArray())) {
//                $zips[$key] = $zips[$key]->toArray();
//            } else {
//                unset($zips[$key]);
//            }
//        }
//        $zips = [];
        foreach ($array as $key => $value) {
            if (!is_string($value)) {
                $zips = self::find($value)->zips->where('zip', '=', $array['zip'])->toArray();
                array_pop($zips);
            }
        }
        if (!is_null($array[0])) {
            array_pop($array);
        }
        dd($array);
    }

}
