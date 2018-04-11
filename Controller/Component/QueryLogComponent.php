<?php

class QueryLogComponent extends Component {

    public function printQuery($model = '', $searchTable = '')
    {
        if (empty($model)) {
            print("<pre>".print_r(['Err' => 'Model not exist'], true)."</pre>");
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
        $this->convert($log);
    }

    public function convert($queryArr = null)
    {
        if (empty($queryArr) || !is_array($queryArr)) {
            return [];
        }
        
        $transform = json_encode($queryArr);
        print("<pre>".print_r(json_decode($transform), true)."</pre>");
        return;
    }
}