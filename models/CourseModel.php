<?php


    class CourseModel
    {
        /**
         * function get one parameter course name and check if course name exist in Data Base.
         * this function for checking when adding new course, if course with this name already exist or not.
         * @param $name
         * @return mixed
         */
        function checkIfCourseExist($name){
            $query ="SELECT course_name FROM `course` WHERE course_name =:name" ;
            $params = [
                "name" => $name
            ];
            return DataBase::getInstance()->getOneRow($query,$params);
        }

        /**
         * function get one parameter course id and delete course with this id.
         * @param $id
         */
        function deleteCourse($id){
            $query ="DELETE FROM `course` WHERE `course_id` = :id" ;
            $params = [
                "id" => $id
            ];
            DataBase::getInstance()->deleteRow($query,$params);
        }

        /**
         * function return all courses from DataBase.
         * @return array
         */
        function getAllCourses(){
            $query ="SELECT * FROM `course`";
            $params = [];
            return DataBase::getInstance()->getRows($query,$params);
        }

        /**
         * function return all id's and manes of al courses.
         * @return array
         */
        function getAllCoursesIDsAndNames(){
            $query ="SELECT `course_id` , `course_name` FROM `course`";
            $params = [];
            return DataBase::getInstance()->getRows($query,$params);
        }

        /**
         * function get one parameter course id and return all data of course with this id.
         * @param $id
         * @return mixed
         */
        function getCourseByID($id){
            $query ="SELECT * FROM `course` WHERE `course_id` =:id";
            $params = [
                "id" => $id
            ];
            return DataBase::getInstance()->getOneRow($query,$params);
        }

        /**
         * function get one parameter course id and return couirse name, course image path.
         * @param $id
         * @return array
         */
        function getCourseNameAndImage($id){
            $query ="SELECT `course_name`, `course_img` FROM `course` WHERE `course_id` =:id";
            $params = [
                "id" => $id
            ];
            return DataBase::getInstance()->getRows($query,$params);
        }

        /**
         * function add new course without image.
         * @param $name
         * @param $description
         * @return bool
         */
        function addCourseWithoutImage($name,$description){
            $query = "INSERT INTO `course` (`course_name`, `course_description`) VALUES (:name,:description)";
            $params = [
                "name" => $name,
                "description" => $description
            ];
            return DataBase::getInstance()->insertRow($query,$params);
        }

        /**
         *function create new course.
         * @param $name
         * @param $description
         * @param $img
         * @return bool
         */
        function addCourse($name,$description,$img){
            $query = "INSERT INTO `course` (`course_name`, `course_description`, `course_img`) VALUES (:name,:description,:img)";
            $params = [
                "name" => $name,
                "description" => $description,
                "img" => $img
            ];
            return DataBase::getInstance()->insertRow($query,$params);
        }

        /**
         * function edit course.
         * @param $id
         * @param $name
         * @param $description
         * @param $image
         * @return bool
         */
        function editCourse($id,$name,$description,$image){
            $query = "UPDATE `course` SET `course_name` =:name, `course_description` =:description, `course_img` =:image  WHERE `course_id` =:id";
            $params = [
                "id" => $id,
                "name" => $name,
                "description" => $description,
                "image" => $image
            ];
            return DataBase::getInstance()->insertRow($query,$params);
        }

        /**
         * function edit course without image.
         * @param $id
         * @param $name
         * @param $description
         * @return bool
         */
        function editCourseWithoutImage($id,$name,$description){
            $query = "UPDATE `course` SET `course_name` =:name, `course_description` =:description  WHERE `course_id` =:id";
            $params = [
                "id" => $id,
                "name" => $name,
                "description" => $description
            ];
            return DataBase::getInstance()->insertRow($query,$params);
        }

        /**
         * function return sum of all courses.
         * @return mixed
         */
        function countCourses(){
            $query ="SELECT COUNT(*) as count FROM  `course`";
            $params = [];
            return DataBase::getInstance()->getOneRow($query,$params);
        }

        /**
         * function get one parameter course id and return sum of all courses that students registered on.
         * @param $courseId
         * @return mixed
         */
        function getSumAllStudentsOfCourse($courseId){
            $query = "SELECT COUNT(*) as `sum` FROM `student_courses` WHERE courses_id = :courseId";
            $params = [
                "courseId" => $courseId
            ];
            return DataBase::getInstance()->getOneRow($query,$params);
        }

        /**
         * function get one parameter student id and return all courses names, courses images path.
         * @param $studentId
         * @return array
         */
        function getAllCoursesNameAndImageOfStudent($studentId){
            $query = "SELECT c.course_name, c.course_img FROM `student_courses` as s
                  JOIN `course` as c ON c.course_id = s.courses_id
                  WHERE s.student_id = :studentId";
            $params = [
                "studentId" => $studentId
            ];
            return DataBase::getInstance()->getRows($query,$params);
        }

        /**
         * function get one parameter course id and return all students names, images.
         * @param $courseId
         * @return array
         */
        function getAllStudentsNameAndImageCourse($courseId){
            $query = "SELECT st.student_name, st.student_img FROM `student_courses` as s
                  JOIN `student` as st ON st.student_id = s.student_id
                  WHERE s.courses_id = :courseId";
            $params = [
                "courseId" => $courseId
            ];
            return DataBase::getInstance()->getRows($query,$params);
        }
    }