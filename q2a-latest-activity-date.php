<?php

class q2a_latest_activity_date {

    function allow_template($template) {
        $allow = false;

        switch ($template) {
            case 'account':
            case'activity':
            case'admin':
            case'ask' :
            case'categories' :
            case'custom' :
            case'favorites':
            case'feedback' :
            case'hot' :
            case'ip' :
            case'login':
            case'message':
            case'qa' :
            case'question':
            case'questions':
            case'register' :
            case'search' :
            case'tag' :
            case'tags' :
            case'unanswered':
            case'updates' :
            case'user' :
            case'users' :
                $allow = true;
                break;
        }

        return $allow;
    }

    function allow_region($region) {
        return true;
    }
    function output_widget() {
                $lastactivity = date_create(qa_db_read_one_value(
                     qa_db_query_sub( 'SELECT `created` FROM `^posts`
                                ORDER BY created DESC
                                LIMIT 1
                      '), true ));
					  echo "<h4 style='text-align: center;'>Latest Activity:</h4>";
					  //change date time format here
					  echo "<h4 style='text-align: center;'>" . date_format($lastactivity, "d/m/Y g:i:a") . "</h4>";
    }

}

