Array
(
    [0] => stdClass Object
        (
            [cc_id] => 1
            [cl_id] => 1
            [cl_name] => Realistic
            [cl_desc] => Realistic
            [cl_code] => R
        )
    [career] => 1
)
$get_construct->result();
...

Array
(
    [0] => Array
        (
            [cc_id] => 1
            [cl_id] => 1
            [cl_name] => Realistic
            [cl_desc] => Realistic
            [cl_code] => R
        )

)
json_decode(json_encode($get_construct->result()), True);
....

[{"cc_id":"1","cl_id":"1","cl_name":"Realistic","cl_desc":"Realistic","cl_code":"R"}]
json_encode($get_construct->result());
.....

{"cc_id":"1","cl_id":"1","cl_name":"Realistic","cl_desc":"Realistic","cl_code":"R"}
json_encode($get_construct->result());
.....

stdClass Object
(
    [cc_id] => 1
    [cl_id] => 1
    [cl_name] => Realistic
    [cl_desc] => Realistic
    [cl_code] => R
)
$res[] = $get_construct->result();
