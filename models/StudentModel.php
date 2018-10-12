<?php


    class StudentModel
    {
        /**
         * function return all students from DataBase.
         * @return array
         */
        function getAllStudents(){
            $query ="SELECT * FROM `student`";
            $params = [];
            return DataBase::getInstance()->getRows($query,$params);
        }

        /**
         * function return sum of all students.
         * @return mixed
         */
        function countStudents(){
            $query ="SELECT COUNT(*) as count FROM `student`";
            $params = [];
            return DataBase::getInstance()->getOneRow($query,$params);
        }

        /**
         * function adding new student without image.
         * @param $name
         * @param $phone
         * @param $email
         * @return bool
         */
        function addStudentWithoutImage($name,$phone,$email){
            $query = "INSERT INTO `student` ( `student_name`, `student_phone`, `student_email` ) VALUES (:name, :phone, :email)";
            $params = [
                "name" => $name,
                "phone" => $phone,
                "email" => $email
            ];
            return DataBase::getInstance()->insertRow($query,$params);
        }

        /**
         * function get one parameter ID and return all data of this student with this ID.
         * @param $id
         * @return mixed
         */
        function getStudentByID($id){
            $query = "SELECT * FROM `student` WHERE `student_id` = :id";
            $params = ["id" => $id];
            return DataBase::getInstance()->getOneRow($query,$params);
        }

        /**
         * function add new student with image.
         * @param $name
         * @param $phone
         * @param $email
         * @param $img
         * @return bool
         */
        function addStudent($name,$phone,$email,$img){
            $query = "INSERT INTO `student` (`student_name`, `student_phone`, `student_email`, `student_img`) VALUES (:name,:phone,:email,:img)";
            $params = [
                "name" => $name,
                "phone" => $phone,
                "email" => $email,
                "img" => $img
            ];
            return DataBase::getInstance()->insertRow($query,$params);
        }

        /**
         * function get one parameter ID and deleting student with this ID.
         * @param $id
         */
        function deleteStudent($id){
            $query ="DELETE FROM `student` WHERE `student_id` = :id" ;
            $params = [
                "id" => $id
            ];
            DataBase::getInstance()->deleteRow($query,$params);
        }

        /**
         * function get one parameter email and return all data of student with this email.
         * @param $email
         * @return mixed
         */
        function checkIfStudentExist($email){
            $query ="SELECT * FROM  `student` WHERE student_email = :email" ;
            $params = [
                "email" => $email
            ];
            return DataBase::getInstance()->getOneRow($query,$params);
        }

        /**
         *  function edit student with changing image.
         * @param $student_id
         * @param $student_name
         * @param $student_phone
         * @param $student_email
         * @param $student_img
         */
        function editStudent($student_id,$student_name,$student_phone,$student_email,$student_img){
            $query = "UPDATE `student` SET `student_name`=:student_name,`student_phone`=:student_phone,`student_email`=:student_email,`student_img`=:student_img WHERE `student_id`=:student_id";
            $params = [
                "student_id" => $student_id,
                "student_name" => $student_name,
                "student_phone" => $student_phone,
                "student_email" => $student_email,
                "student_img" => $student_img
            ];
            DataBase::getInstance()->updateRow($query,$params);
        }

        /**
         * function edit student without changing image.
         * @param $student_id
         * @param $student_name
         * @param $student_phone
         * @param $student_email
         * @return bool
         */
        function editStudentWithoutImage($student_id,$student_name,$student_phone,$student_email){
            $query = "UPDATE `student` SET `student_name`=:student_name,`student_phone`=:student_phone,`student_email`=:student_email WHERE `student_id`=:student_id";
            $params = [
                "student_id" => $student_id,
                "student_name" => $student_name,
                "student_phone" => $student_phone,
                "student_email" => $student_email
            ];
            return DataBase::getInstance()->updateRow($query,$params);
        }

        /**
         * function get 2 parameter Course ID, Student ID insert it to pivot table "student_courses"
         * @param $courseId
         * @param $studentId
         * @return bool/ID
         */
        function insertStudentCourses($courseId,$studentId){
            $query = "INSERT INTO `student_courses` ( `courses_id`, `student_id` ) VALUES (:courseId, :studentId)";
            $params = [
                "courseId" => $courseId,
                "studentId" => $studentId
            ];
            return DataBase::getInstance()->insertRow($query,$params);
        }

        // for checkbox
        /**
         * function get one parameter student id and return all courses id's where he registered.
         * @param $studentId
         * @return array
         */
        function getAllCoursesIDsOfStudent($studentId){
            $query ="SELECT `courses_id` FROM `student_courses` WHERE student_id =:studentId";
            $params = ["studentId" => $studentId];
            return DataBase::getInstance()->getRows($query,$params);
        }

        /**
         * function get one parameter student id, and delete all courses that student registered.
         * @param $studentId
         */
        function deleteStudentCourses($studentId){
            $query = "DELETE FROM `student_courses` WHERE `student_id` = :studentId";
            $params = [
                "studentId" => $studentId
            ];
            DataBase::getInstance()->deleteRow($query,$params);
        }
    }