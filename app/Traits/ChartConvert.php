<?php
  
namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait ChartConvert
{
    /**
     * Get Model Data
     */
    protected function getTableData($table, $cause = 'created_at', $raw = null)
    {
        $year = date('Y');
        $data = [];

        for($i = 1; $i <= 12; $i++){
            if ($raw == null) {
                $data[] = DB::table($table)->whereMonth($cause, $i)->whereYear($cause, $year)->count();
            } else {
                $data[] = DB::table($table)->where($raw)->whereMonth($cause, $i)->whereYear($cause, $year)->count();
            }
        }

        return $data;
    }
    
    /**
     * Select Model Data
     */
    protected function selectTableData($table, $raw, $cause = 'created_at', $type = 'avg')
    {
        $year = date('Y');
        $data = [];

        for($i = 1; $i <= 12; $i++){
            if ($type == 'avg') {
                $data[] = floatval(DB::table($table)->whereMonth($cause, $i)->whereYear($cause, $year)->avg($raw));
            } elseif ($type == 'sum') {
                $data[] = floatval(DB::table($table)->whereMonth($cause, $i)->whereYear($cause, $year)->sum($raw));
            } elseif ($type == 'count') {
                $data[] = DB::table($table)->whereMonth($cause, $i)->whereYear($cause, $year)->count($raw);
            }
        }

        return $data;
    }
}