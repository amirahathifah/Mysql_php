
// Array
// (
//     [name] => Array
//         (
//             [0] => mohamed.jpg
//             [1] => nature1.jpg
//             [2] => pixabay.jpg
//         )
//     [size] => Array
//         (
//             [0] => 1774817
//             [1] => 2936193
//             [2] => 1375770
//         )
// )
foreach($files_name as $k => $val)
{
    if($k == 2) 
    {
        unset($files_name[$k]);
    }
}

foreach($file as $k => $each_file)
{
    foreach($each_file as $q => $value)
    {
        if($q == 2) 
        {
            unset($each_file[$q]);
        }
    }
    //print_r($each_file);
}
