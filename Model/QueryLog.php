<?php

class QueryLog {

    public function printQuery()
    {
        convert($this->model->getDataSource()->getLog(false, false));
    }

    public function convert($queryArr = null)
    {
        if (empty($queryArr) && !is_array($queryArr)) {
            return [];
        }
        
        $transform = json_encode($queryArr);
        print_r(json_decode($transform), true);
    }
}