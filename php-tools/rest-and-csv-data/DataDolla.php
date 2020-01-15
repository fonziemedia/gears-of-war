<?php

/*
  A domain Class to demonstrate RESTful web services
 */

Class DataDolla {

    private $dataFile = "data/data.csv";
    private $maxValue = "1000000";
    private $name = null;

    private function readData() {
        if (($handle = fopen($this->dataFile, "r")) !== FALSE) {
            $row = 0;

            $csv_row = array();
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($data[0] === $this->name) {
                    $csv_row = $data;
                    break;
                }
            }
            fclose($handle);
        }
        if (count($csv_row) === 0) {
            return false;
        } else {
            return $csv_row;
        }
    }

    public function getDataDolla($name) {
        $this->name = strtolower($name);
        $tmpRes = $this->readData();
        $res = false;
        $endRes = false;
        if ($tmpRes !== false) {            
            $res["username"] = $tmpRes[0];
            $res["maxValue"] = $this->maxValue;
            $res["figures"]["value"] = $tmpRes[1];
            $res["figures"]["pct"] = number_format(($tmpRes[1] / $this->maxValue) * 100, 2);
            $endRes["dollas"] = $res;
        }       
        return $endRes;
    }

}

?>