<?php
$day = trim(fgets(STDIN));
switch ($day) {
    case 'Monday':
        echo'Today is Monday';
        break;
    case 'Tuesday':
        echo'Today is Tuesday';
        break;
    case 'Wednesday':
        echo'Today is Wednesday';
        break;
    case 'Thursday':
        echo'Today is Thursday';
        break;
    case 'Friday':
        echo'Today is Friday';
        break;
    case 'Saturday':
        echo'Today is Saturday';
        break;
    case 'Sunday':
        echo'Today is Sunday';
        break;
    case '1':
        echo'This Month is January';
        break;
    case '2':
        echo'This Month is February';
        break;
    default:
        echo'Err: Invalid Input';
        break;
}
?>