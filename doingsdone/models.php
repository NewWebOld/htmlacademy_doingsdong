<?php

function get_query_list_project()
{
    return "SELECT *  FROM project WHERE user_id = 1";
}
function get_query_list_task()
{
    return "SELECT *  FROM task WHERE user_id = 1";
}


function get_query_show_id($show_id)
{
    return "SELECT * FROM task WHERE task.project_id=$show_id";
}

?>