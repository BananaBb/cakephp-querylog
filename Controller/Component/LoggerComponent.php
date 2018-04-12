<?php

class LoggerComponent extends Component {

    public function main($model = '', $searchTable = '')
    {
        if (empty($model)) {
            $this->printout(['Err' => 'Model not exist']);
            return;
        }
        $log = $model->getDataSource()->getLog(false, false)['log'] ?: [];
        if (!empty($searchTable)) {
            foreach($log as $key => $val) {
                if (!empty($val['query']) && preg_match("/".strtolower($searchTable)."/", strtolower($val['query']))) {
                    continue;
                }
                unset($log[$key]);
            }
        }
        $this->converter($log);
    }

    public function converter($queryArr = null)
    {
        if (!empty($queryArr) && is_array($queryArr)) {
            $transform = json_encode($queryArr);
            $this->printout(json_decode($transform));
        }
        return;
    }

    private function printout($infoArray = '') {
        print('<pre>'.print_r($infoArray, true).'</pre>');
        return;
    }
}