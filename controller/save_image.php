    function save_image()
    {
        $hide = $this->input->post('hide');
        $file = $_FILES['file'];
        $total = count($_FILES['file']['name']);
        $allowed = array('jpg','jpeg','png','pdf');
        
        for( $i=0 ; $i < $total ; $i++ )
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
                        //generates a unique ID based on the microtime
                        $fileNameNew = uniqid('',true).".".$fileActualExt;

                        //$fileDestination = base_url().UPLOAD_QUESTION_PATH.$fileNameNew;
                        //http://localhost/oes_qbank/uploads/question/636477b760b125.76425022.jpg

                        $fileDestination = $_SERVER['DOCUMENT_ROOT'].'/oes_qbank/'.UPLOAD_QUESTION_PATH.$fileNameNew;
                        //C:/xampp/htdocs/oes_qbank/uploads/question/636478f7398f31.40326684.jpg

                        //move_uploaded_file($file, UPLOAD_QUESTION_PATH . $fileNameNew);
                        move_uploaded_file($fileTmpName,$fileDestination);
                        //header("Location:index.php?upload success");
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
