    function save_image_aws()
    {
        $type = $this->input->post('type');
        $lex_id = $this->input->post('lex_id');
        $lsx_id = $this->input->post('lsx_id');

        $files_name = $_FILES['file']['name'];
        $files_type = $_FILES['file']['type'];
        $files_tmp_name = $_FILES['file']['tmp_name'];
        $files_size = $_FILES['file']['size'];

        $total = count($_FILES['file']['name']);
        $allowed = array('jpg','jpeg','png','pdf');

        foreach($files_name as $i => $file)
        {
            $fileName = $_FILES['file']['name'][$i];
            $fileType = $_FILES['file']['type'][$i];
            $fileTmpName = $_FILES['file']['tmp_name'][$i];
            $fileError = $_FILES['file']['error'][$i];
            $fileSize = $_FILES['file']['size'][$i];
    
            $fileSize_kb = $fileSize/1024;
            $fileSize_kb_2decimal = number_format((float)$fileSize_kb, 2, '.', '').'KB';
          
            $fileExt = explode('.',$fileName);
            $fileActualExt = strtolower(end($fileExt));

            if(in_array($fileActualExt,$allowed))
            {
                if($fileError === 0)
                {
                    if($fileSize < 10000000)//10MB
                    {
                        if(is_uploaded_file($fileTmpName))
                        {
                            //generates a unique ID based on the microtime 
                            $fileNameNew = uniqid().".".$fileActualExt;

                            $this->load->library('s3upload');
                            $bucket = $this->config->item('aws_bucket_name');

                            $image_folder = 'question';
                            $key_path = str_replace($bucket . '/', '', $image_folder);

                            $file_name = $fileNameNew;   
                            $temp_file_location = $fileTmpName; 
                            
                            // Access Key ID:
                            $s3 = new Aws\S3\S3Client([
                                'region'  => 'ap-southeast-1',
                                'version' => 'latest',
                                'credentials' => [
                                    'key'    => $this->config->item('aws_access_key'),
                                    'secret' => $this->config->item('aws_secret_key'),
                                ]
                            ]);		
                    
                            $options = [
                                'Bucket' => $bucket,
                                'Key'    => $key_path.'/'.$file_name,
                                'SourceFile' => $temp_file_location,
                                'ContentType' => get_mime_by_extension($file_name)
                            ];
                            $options['ACL'] = 'public-read';
                                
                            $result = $s3->putObject($options);
                            $key = str_replace($bucket . '/', '', $image_folder) . '/' . $file_name;
                            $url = $s3->getObjectUrl($bucket, $key);

                            $data_image = [
                                'ib_key' => $key,
                                'ib_desc' => $type,
                                'ib_url' => $url,
                                'urr_id' => $this->session->userdata['active_role']->urr_id,
                                'lex_id' => $lex_id,
                                'lsx_id' => $lsx_id
                            ];
                
                            $this->db->insert('image_bank', $data_image);
                            echo $url;
                        }
                    } 
                    else
                    {
                        echo "You file is too big!";
                    }
                } 
                else
                {
                    echo "There was an error uploading your file!";
                }
            }
            else
            {
                echo "You cannot upload file of this type!";
            }
        }
    }
