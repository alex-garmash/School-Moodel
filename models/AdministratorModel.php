<?php


    class administratorModel
    {
        /**
         * function get id of administrator and return all his data.
         * @param $id
         * @return mixed
         */
        function getAdministratorByID($id){
            $query ="SELECT * FROM  `administrator` WHERE administrator_id = :id" ;
            $params = [
                "id" => $id
            ];
            return DataBase::getInstance()->getOneRow($query,$params);
        }

        /**
         * function add new administrator
         * @param $name
         * @param $phone
         * @param $email
         * @param $password
         * @param $role
         * @param $image
         * @return bool
         */
        function addAdministrator($name,$phone,$email,$password,$role,$image){
            $query = "INSERT INTO `administrator` (`administrator_name`, `administrator_role`, `administrator_phone`, `administrator_img`, `administrator_email`, `administrator_hash`) VALUES (:name,:role,:phone,:image,:email,:password)";
            $params = [
                "name" => $name,
                "role" => $role,
                "email" => $email,
                "phone" => $phone,
                "password" => $password,
                "image" => $image
            ];
            return DataBase::getInstance()->insertRow($query,$params);
        }

        /**
         * function add new administrator without changing image.
         * @param $name
         * @param $phone
         * @param $email
         * @param $password
         * @param $role
         * @return bool
         */
        function addAdministratorWithoutImage($name,$phone,$email,$password,$role){
            $query = "INSERT INTO `administrator` (`administrator_name`, `administrator_role`, `administrator_phone`, `administrator_email`, `administrator_hash`) VALUES (:name,:role,:phone,:email,:password)";
            $params = [
                "name" => $name,
                "role" => $role,
                "email" => $email,
                "phone" => $phone,
                "password" => $password
            ];
            return DataBase::getInstance()->insertRow($query,$params);
        }

        /**
         * function edit administrator.
         * @param $id
         * @param $name
         * @param $phone
         * @param $email
         * @param $password
         * @param $role
         * @param $image
         * @return bool
         */
        function editAdministrator($id,$name,$phone,$email,$password,$role,$image){
            $query = "UPDATE `administrator` SET `administrator_name` =:name, `administrator_role` =:role, `administrator_phone` =:phone, `administrator_img` =:image, `administrator_email` =:email, `administrator_hash` =:password  WHERE `administrator_id` =:id";
            $params = [
                "id" => $id,
                "name" => $name,
                "role" => $role,
                "email" => $email,
                "phone" => $phone,
                "password" => $password,
                "image" => $image
            ];
            return DataBase::getInstance()->insertRow($query,$params);
        }

        /**
         * function edit administrator without changing image.
         * @param $id
         * @param $name
         * @param $phone
         * @param $email
         * @param $password
         * @param $role
         * @return bool
         */
        function editAdministratorWithoutImage($id,$name,$phone,$email,$password,$role){
            $query = "UPDATE `administrator` SET `administrator_name` =:name, `administrator_role` =:role, `administrator_phone` =:phone, `administrator_email` =:email, `administrator_hash` =:password  WHERE `administrator_id` =:id";
            $params = [
                "id" => $id,
                "name" => $name,
                "role" => $role,
                "email" => $email,
                "phone" => $phone,
                "password" => $password
            ];
            return DataBase::getInstance()->insertRow($query,$params);
        }

        /**
         * function edit administrator without changing password.
         * @param $id
         * @param $name
         * @param $phone
         * @param $email
         * @param $role
         * @param $image
         * @return bool
         */
        function editAdministratorWithoutPassword($id,$name,$phone,$email,$role,$image){

            $query = "UPDATE `administrator` SET  `administrator_name` =:name, `administrator_phone` =:phone, `administrator_email` =:email, `administrator_role` =:role, `administrator_img` =:image  WHERE `administrator_id` =:id";
            $params = [
                "id" => $id,
                "name" => $name,
                "role" => $role,
                "email" => $email,
                "phone" => $phone,
                "image" => $image

            ];
            return DataBase::getInstance()->insertRow($query,$params);
        }

        /**
         * function edit administrator without changing his password and image.
         * @param $id
         * @param $name
         * @param $phone
         * @param $email
         * @param $role
         * @return bool
         */
        function editAdministratorWithoutPasswordAndImage($id,$name,$phone,$email,$role){
            $query = "UPDATE `administrator` SET  `administrator_name` =:name, `administrator_phone` =:phone, `administrator_email` =:email, `administrator_role` =:role  WHERE `administrator_id` =:id";
            $params = [
                "id" => $id,
                "name" => $name,
                "role" => $role,
                "email" => $email,
                "phone" => $phone,
            ];
            return DataBase::getInstance()->insertRow($query,$params);
        }

        /**
         * function return sum of all administrators in system.
         * @return mixed
         */
        function countAdministrators(){
            $query ="SELECT COUNT(*) as count FROM  `administrator`";
            $params = [];
            return DataBase::getInstance()->getOneRow($query,$params);
        }

        /**
         * function return all administrators without owner.
         * @return array
         */
        function listOfAdministratorsWithoutOwner(){
            $query ="SELECT * FROM `administrator`WHERE `administrator_role` != 'owner'";
            $params = [];
            return DataBase::getInstance()->getRows($query,$params);
        }

        /**
         * function return all administrators.
         * @return array
         */
        function listOfAdministrators(){
            $query ="SELECT * FROM `administrator`";
            $params = [];
            return DataBase::getInstance()->getRows($query,$params);
        }

        /**
         * function get id for delete administrator.
         * @param $id
         */
        function deleteAdministrator($id){
            $query ="DELETE FROM `administrator` WHERE `administrator_id` = :id" ;
            $params = [
                "id" => $id
            ];
            DataBase::getInstance()->deleteRow($query,$params);
        }
    }