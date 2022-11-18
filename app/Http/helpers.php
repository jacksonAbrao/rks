<?php
    /**
    * Write code on Method
    *
    * @return response()
    */

    function urlExists($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code == 200) {
            $status = true;
        } else {
            $status = false;
        }
        curl_close($ch);
        return $status;
    }

    function get_textarea_value( $textarea ) {
        $textarea = str_replace(array("\\r\\n", "\\R\\N"),"\n", $textarea);
        $textarea = str_replace("\\","", $textarea);
        return nl2br($textarea);
    }
    
?>