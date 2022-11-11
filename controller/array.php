
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
    //012
    pr(array_keys($files_name));

    //namesize
    echo $val;

    if($k == 2) 
    {
        //pixabay.jpg
        echo $val;
    }
}
 foreach($file as $k => $each_file)
{
    //pr(array_keys($val)); //012
    foreach($each_file as $q => $val)
    {
        if($q == 2) 
        {
            echo $val; //pixabay.jpgimage/jpegC:\xampp\tmp\phpE0B0.tmp01375770
        }
    }
}
