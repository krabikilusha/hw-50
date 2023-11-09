<?php

    class Model_Comment extends Model
    {
        public function get_data()
        {
            $query = $this->db->query(COMMENTS_GET_LIST);
            $commentsList = $query->FetchAll(PDO::FETCH_ASSOC);

            $data = Array();

            foreach ($commentsList as $comment) 
            {
                $data[] = $comment;
            }

            return $data;
        }

        public function get_data_for_card($cardID)
        {
            $query = $this->db->prepare(COMMENTS_GET_LIST_FOR_CARD);
            $query->bindParam(':card_id', $cardID);
            $query->execute();

            $commentsList = $query->FetchAll(PDO::FETCH_ASSOC);

            $data = Array();

            foreach ($commentsList as $comment) 
            {
                $comment['user'] = (new Model_User())->get_item_id($comment['user_id']);
                $data[] = $comment;
            }

            return $data;
        }

        public function get_item($card)
        {
            $query = $this->db->prepare(COMMENTS_GET_ITEM);
            $query->bindParam(':card_id', $card);
            $query->execute();

            $comment = $query->Fetch(PDO::FETCH_ASSOC);

            return $comment;
        }

        public function put_item($comment)
        {
            $stmt = $this->db->prepare(COMMENTS_ADD_ITEM);

            $stmt->bindParam(':card_id', $comment['card_id']);
            $stmt->bindParam(':data', $comment['data']);
            $stmt->bindParam(':create_dt', $comment['create_dt']);
            $stmt->bindParam(':user_id', $comment['user']['id']);

            $stmt->execute();
        }

        public function get_max_id()
        {
            $query = $this->db->query(COMMENTS_GET_MAX_ID);
            $comment = $query->Fetch(PDO::FETCH_ASSOC);

            return $comment['MAX(id)'] ?? 0;
        }

        public function get_count_comments($card_id)
        {
            $query = $this->db->prepare(COMMENTS_GET_ITEM_COUNT_COMMENTS);
            $query->bindParam(':card_id', $card_id);
            $query->execute();
            $comment = $query->Fetch(PDO::FETCH_ASSOC);

            return $comment['COUNT(*)'] ?? 0;
        }

        public function delete_cards_comment ($id)
        {
            $stmt = $this->db->prepare(COMMENTS_DELETE_ELEMENT);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        public function delete_cards_element_comments ($card_id)
        {
            $stmt = $this->db->prepare(COMMENTS_DELETE_CARDS_ELEMENTS);
            $stmt->bindParam(':card_id', $card_id);
            $stmt->execute();
        }
    }