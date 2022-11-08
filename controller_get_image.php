    function get_image()
    {
        $post = $this->input->post();
        $list = $post['data'];

        foreach ($list as $key => $item){
            $Image = array(
                'ib_path' => base_url() . UPLOAD_QUESTION_PATH . $item['ib_path'],
                'ib_desc' => $item['ib_desc'],
                'lex_id' => $item['lex_id'],
                'lsx_id' => $item['lsx_id'],
                'urr_id' => $item['urr_id'],
                'data_status' => 1,
                'data_created' => date('Y-m-d H:i:s'),
                'data_modified' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('image_bank', $Image);
        }

        $output = ["status" => true, "msg_text" => "Imej telah berjaya disimpan"];
        echo json_encode($output);
        exit();
    }
