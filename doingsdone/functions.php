<?php
/**
 * Подсчитывает количество задач в каждом из проектов
 * @param array $task Ассоциативный массив с данными
 * @param string $categories Название проекта
 * @return int Если для аргумента $categories не найдено элементов в массиве, то вернет ноль
 */

 function task_count(array $task, $categories) 
 {
    $count = 0;

    foreach ($task as $task_count) {
        if ($task_count['project_id'] === $categories) {
            $count++;
        }
    }
    return $count;
 }
/*
 function get_time_left ($date) {
    date_default_timezone_set('Asia/Novosibirsk');
    $final_date = date_create($date);
    $cur_date = date_create("now");

    $diff = date_diff($final_date, $cur_date);
    $format_diff = date_interval_format($diff, "%d %h %I");
    $arr = explode(" ", $format_diff);

    $hours = $arr[0] * 24 + $arr[1];
    $minutes = intval($arr[2]);
    $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
    $minutes= str_pad($minutes, 2, "0", STR_PAD_LEFT);
    $res[] = $hours;
    $res[] = $minutes;
    return $res;
 }
 */

 function get_hours_left($date) {
    // преобразуем дату в секунды
    $timestamp = strtotime($date);
  
    // вычисляем разницу между текущим временем и заданной датой в секундах
    $diff = $timestamp - time();
  
    // вычисляем количество оставшихся часов
    $hours_left = floor($diff / 3600);
  
    return $hours_left;
  }

?>