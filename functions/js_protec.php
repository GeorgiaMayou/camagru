<?php
    function protect_js($to_check) {
        $newstr = preg_replace('/[^a-zA-Z0-9\']/', '_', $to_check);
        $newstr = str_replace("'", '', $newstr);
        return ($newstr);
    }
?>