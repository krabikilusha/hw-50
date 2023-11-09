<?php
    class Controller_Upload_Files extends Controller 
    { 
        function action_index() 
        {

            $data = $this->checkCookie();

            // малая проверка, что пользователь авторирован....
            if (!isset($data['user']['login']) || !isset($data['user']['hash']) || !isset($data['user']['name']))
            {
                // Если нет нужных данных то надо бы перенаправить пользователя в окно аутентификации и регистрации.
                header("Location: sign_in"); exit();
            }

            $data['page'] = 'upload';
            
            if (PHP_OS == 'WINNT') 
            {
                // TODO Do somthing   
                // Тут можно обрабатывать какие то события при условии что сервер к примере Виндовый....
            }

            if (!empty($_FILES)) 
            {

                for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                    $fileName = $_FILES['file']['name'][$i];
                    $fileTmpName = $_FILES['file']['tmp_name'][$i];
                    // $fileType = $_FILES['file']['type'][$i];
                    // $fileSize = $_FILES['file']['size'][$i];

                    $filexplode = explode('.', basename($fileName));

                    $filePath = UPLOAD_DIR . '/' . $filexplode[0] . '-' . ((new Model_Card())->get_max_id() + 1) . '.' . $filexplode[1];
                    
                    if (!move_uploaded_file($fileTmpName, '.' . $filePath)) 
                    {
                        echo 'ERROR';
                    }
                    else
                    {   
                        (new Model_Card())->put_item(2, ['NAME' => $fileName, 'PATH' => $filePath]);
                    }
                    
                }
                
                header("Location: main"); exit();
            }

            $this->view->generate('upload_files_view.php', 'template_view.php', $data); 
        } 
    }