<?php


    class userModel
    {
        /**
         * function get one parameter email and return user if user with this email exist.
         * @param $email
         * @return mixed
         */
        function checkIfUserExist($email){
            $query ="SELECT * FROM  `administrator` WHERE administrator_email = :email" ;
            $params = [
                "email" => $email
            ];
            return DataBase::getInstance()->getOneRow($query,$params);
        }
    }