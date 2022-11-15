<?php
$arr = array(
    'key' => 'value', // String 
    'age' => 25, // integer
    'score' => 87.12, // float
    'trx' => array(33, 55, 75, 113, 180), // one dimentional array
    'orderDetails' => array( // here we have a multidimentiional array as a value
        'name' => 'john doe',
        'productIDs' => array(11, 442, 532, 1341),
        'totalPrice' => 112.53,
        'currency' => 'USD'
    ),
    'myMethod' => function(){
        return "Hello, World!"
    }
);

// To individual access the values:
echo $arr['key']; // Prints value
echo $arr['age']; // Prints 25
echo $arr['score']; // Prints 87.12
echo $arr['trx'][2]; // Accesses 3rd value in the array, prints 75
echo $arr['orderDetails']['name']; // Prints john doe
echo $arr['orderDetails']['productIDs'][0]; // prints 11
echo $arr['myMethod'](); // Executes myMethod function; prints Hello, World!

// Array of objects
// Array
// (
//     [0] => stdClass Object
//         (
//             [ib_url] => https://zanko-oes-dev.s3.ap-southeast-1.amazonaws.com/question/636e146a390bd.jpg
//             [ib_desc] => 
//         )

//     [1] => stdClass Object
//         (
//             [ib_url] => https://zanko-oes-dev.s3.ap-southeast-1.amazonaws.com/question/636e146c2f9eb.jpg
//             [ib_desc] => 
//         )

//     [2] => stdClass Object
//         (
//             [ib_url] => https://zanko-oes-dev.s3.ap-southeast-1.amazonaws.com/question/636e1a8517b54.png
//             [ib_desc] => 
//         )
// )
for( $i=0 ; $i < $total ; $i++ )
{
    $ib_url = $images[$i]->ib_url;
    $ib_desc = $images[$i]['ib_desc'];

    pr($ib_url);
}
