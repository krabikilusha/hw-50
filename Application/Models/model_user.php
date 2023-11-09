<?php

    class Model_User extends Model
    {
        public function get_data()
        {
            $query = $this->db->query(USERS_GET_LIST);
            $userList = $query->FetchAll(PDO::FETCH_ASSOC);

            $data = Array();

            foreach ($userList as $user) 
            {
                $data[] = $user;
            }

            return $data;
        }

        public function get_item($login)
        {
            $query = $this->db->prepare(USERS_GET_ITEM);
            $query->bindParam(':login', $login);
            $query->execute();

            $user = $query->Fetch(PDO::FETCH_ASSOC);

            return $user;
        }

        public function get_item_id($id)
        {
            $query = $this->db->prepare(USERS_GET_ITEM_ID);
            $query->bindParam(':id', $id);
            $query->execute();

            $user = $query->Fetch(PDO::FETCH_ASSOC);

            return $user;
        }

        public function put_item($user)
        {
            $stmt = $this->db->prepare(USERS_ADD_ITEM);
            $stmt->bindParam(':login', $user['login']);
            $stmt->bindParam(':password', $user['password']);
            $stmt->bindParam(':name', $user['name']);
            $stmt->bindParam(':hash', $user['hash']);

            $stmt->execute();
        }

        public function get_max_id()
        {
            $query = $this->db->query(USERS_GET_MAX_ID);
            $user = $query->Fetch(PDO::FETCH_ASSOC);

            return $file['MAX(id)'] ?? 0;
        }
    }