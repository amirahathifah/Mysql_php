
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

//remove array element
foreach($files_name as $k => $val)
{
    if($total_deletes > 1)
    {
        for($j=0 ; $j < $total_deletes-1 ; $j++)
        {
            if($k == $deletes[$j])
            {
                unset($files_name[$k]);
            }
        }
    }
}
foreach($files_name as $i => $each_file)
{
    $fileName = $_FILES['image']['name'][$i];
    echo $fileName;
}
            
foreach($file as $k => $each_file)
{
    foreach($each_file as $q => $value)
    {
        if($total_deletes > 1)
        {
            for($j=0 ; $j < $total_deletes-1 ; $j++) //default = 1,minus 1
            {
                if($q == $deletes[$j])
                {
                    unset($each_file[$q]);
                }
            }
        }
    }
    mpr($each_file);
}
