<?php

    // Класс контроллер для работы с элементом CARD
    class Controller_Card extends Controller 
    { 
        function action_index() 
        {
            $modelCard = new Model_Card();
            $modelComment = new Model_Comment();

            $data = $this->checkCookie();
            $data['page'] = 'home';
            
            $imageID = $_GET['image_id'];

            // Условие для удаления карточки CARD, ее файла изображения и связанных изображений.
            // Должно работать только для авторизованных пользователей.
            if ($data['user']['hash'] && $data['user']['login'] && isset($_GET['drop']) && $_GET['drop'] == 'true') {
                $card = (new Model_Card())->get_item($imageID);

                unlink('.' . $card['path']);

                $modelComment->delete_cards_element_comments($imageID);
                $modelCard->delete_item($imageID);

                header("Location: ../main"); exit();
            }

            // Условие для обработки добавления комментария, можно было бы вынести в отдельный контейнер, 
            // но я подумал это - лишнее усложнение.
            if (isset($_POST['comment_send'])) {
                $comment = [
                    'user' => (new Model_User())->get_item_id($_POST['user_id']),
                    'card_id' => $_POST['card_id'],
                    'data' => $_POST['data'],
                    'create_dt' => date("Y-m-d H:i:s")
                ];
                (new Model_Comment())->put_item($comment);
            }

            // Условие для получения информации по карточки для детального отображения.
            if (isset($imageID)) {
                $data['card'] = $modelCard->get_item($imageID);
                $data['comments'] = $modelComment->get_data_for_card($imageID);
            }
            
            $this->view->generate('card_view.php', 'template_view.php', $data); 
        } 
    }