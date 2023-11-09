<?php

    class Model_Card extends Model
    {
        public function get_data()
        {
            $query = $this->db->query(CARDS_GET_LIST);
            $cardList = $query->FetchAll(PDO::FETCH_ASSOC);

            $data = Array();

            foreach ($cardList as $card) 
            {
                $card['comments_cound'] = (new Model_Comment())->get_count_comments($card['id']);
                $data[] = $card;
            }

            return $data;
        }

        public function get_item($id)
        {
            $query = $this->db->prepare(CARDS_GET_ITEM);
            $query->bindParam(':id', $id);
            $query->execute();

            $card = $query->Fetch(PDO::FETCH_ASSOC);

            return $card;
        }

        public function put_item($userID, $file)
        {

            $stmt = $this->db->prepare(CARDS_ADD_ITEM);
            $stmt->bindParam(':userId', $userID);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':path', $path);

            $name = $file['NAME'];
            $path = $file['PATH'];
            $stmt->execute();
        }

        public function get_max_id()
        {
            $query = $this->db->query(CARDS_GET_MAX_ID);
            $card = $query->Fetch(PDO::FETCH_ASSOC);

            return $card['MAX(id)'] ?? 0;
        }

        public function delete_item($id)
        {
            $stmt = $this->db->prepare(CARDS_DELETE_ELEMENT);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
    }