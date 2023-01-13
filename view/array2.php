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

)
$get_construct->result()

-------------------------------------------------------------------------------------

[
  {"cc_id":"1","cl_id":"1","cl_name":"Realistic","cl_desc":"Realistic","cl_code":"R"}
]
json_encode($get_construct->result())

--------------------------------------------------------------------------------------
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
{
  "conn_id":
    {
      "affected_rows":null,"client_info":null,"client_version":null,"connect_errno":null,"connect_error":null,"errno":null,"error":null,"error_list":null,"field_count":null,"host_info":null,"info":null,"insert_id":null,"server_info":null,"server_version":null,"sqlstate":null,"protocol_version":null,"thread_id":null,"warning_count":null
    },
  "result_id":
    {
      "current_field":null,"field_count":null,"lengths":null,"num_rows":null,"type":null
    },
  "result_array":[],
  "result_object":
    [{
      "cc_id":"1","cl_id":"1","cl_name":"Realistic","cl_desc":"Realistic","cl_code":"R"
    }],
  "custom_result_object":[],
  "current_row":0,
  "num_rows":null,
  "row_data":null
}
json_decode(json_encode($get_construct->result()), True)

-------------------------------------------------------------------------------------------
