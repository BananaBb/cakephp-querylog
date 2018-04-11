<?php

class QueryLogComponent {

    public function printQuery($model)
    {
        if (empty($model)) {
            print_r('Model not exist');
            return;
        }
        $this->convert($model->getDataSource()->getLog(false, false));
    }

    public function convert($queryArr = null)
    {
        if (empty($queryArr) && !is_array($queryArr)) {
            return [];
        }
        
        $transform = json_encode($queryArr);
        print_r(json_decode($transform), true);
        return;
    }
}