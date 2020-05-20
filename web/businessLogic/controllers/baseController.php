<?php
abstract class baseController { (you cant make instance out of it - only inherit)
   /**
    * This method is used to execute a Store Procedure with parameters and return a table results 
    * @param $procedureName Name of the Store Procedure to call 
    * @param $procedureParameters Array of parameters to pass to the Store Procedure being called
    */
    protected function getData($procedureName, $procedureParameters){
    $mysqli = new mysqli("10.0.10.4", "root", "fl!ntst0n3", "promet_source_project");

    if (empty($procedureName) || empty($procedureParameters))
        {
            return false;
        }
        $lv_call   = "CALL `$procedureName`(";
        $lv_log = "";
        foreach($procedureParameters as $lv_key=>$lv_value)
        {
            $lv_query = "SET @_$lv_key = '$lv_value'";
            $lv_log .= $lv_query.";\n";
            if (!$lv_result = $mysqli->query($lv_query))
            {
                return false;
            }
            $lv_call   .= " @_$lv_key,";
        }
        $lv_call   = substr($lv_call, 0, -1).")";
        $lv_log .= $lv_call;

        if ($mysqli->multi_query($lv_log)) {
            do {
                if ($result = $mysqli->store_result(null)) {
                    return $result;
                    $result->free();
                }
            } while ($mysqli->next_result());
        }
        return false;
    
  }
}
?>