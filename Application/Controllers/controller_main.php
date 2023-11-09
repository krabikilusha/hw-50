<?php
    class Controller_Main extends Controller 
    { 
        function action_index() 
        {
            $modelCard = new Model_Card();
            
            $data = $this->checkCookie();
            $data['page'] = 'home';
            if (isset($_GET['image_id'])) {
                $data['card'] = $modelCard->get_item($_GET['image_id']);
            }
            else {
                $data['CARDS'] = $modelCard->get_data();
            }
            
            $this->view->generate('main_view.php', 'template_view.php', $data); 
        } 
    }