<?php
    $studentModel = new StudentModel();
    $courseModel = new CourseModel();
?>
<div class="container-fluid">
    <div class="row">
        <!-- container of courses -->
        <div class="col-md-3">
            <!-- button add new courses -->
            <div class="title">Courses
                <?php
                    // only owner or manager can see button add new course
                    if(Session::logged()['role'] == 'owner' || Session::logged()['role'] == 'manager')
                    {
                        //display add new course button.
                        echo "<button type=\"button\" name=\"addCourse\" class=\"btn btn-default btnAddCourse\"><i class=\"fa fa-plus\"></i></button>";
                    }
                ?>
            </div>
            <!-- list of courses -->
            <div class="courses">
                <?php
                    echo '<ul class="list-group">';
                    $courses = $courseModel->getAllCourses();
                    $size = count($courses);
                    for($i = 0; $i < $size; $i++){
                        echo "<li data=\"{$courses[$i]['course_id']}\" class=\"list-group-item coursesList\">";
                        if(!empty($courses[$i]['course_img'])){
                            //display course image.
                            echo "<img class='image' src=\"/theschool/uploads/{$courses[$i]['course_img']}\">";
                        }else{
                            //display default course image.
                            echo "<img class='image' src=\"images/nocourse.png\">";
                        }
                        //display data of course.
                        echo '<p>'.$courses[$i]['course_name'].'</p>';
                        echo '<p>'.$courses[$i]['course_description'].'</p></li>';
                    }
                    echo '</ul>';
                ?>
            </div>
        </div>
        <!-- container of students -->
        <div class="col-md-3">
            <!-- button add new student -->
            <div class="title">Students<button type="button" name="addStudent" class="btn btn-default btnAddStudent"><i class="fa fa-plus" ></i></button></div>
            <!-- list of students -->
            <div class="students">
                <?php
                    echo '<ul class="list-group">';
                    $students = $studentModel->getAllStudents();
                    $size = count($students);
                    for($i = 0; $i < $size; $i++){
                        echo "<li data=\"{$students[$i]['student_id']}\" class=\"list-group-item studentsList\">";
                        if(!empty($students[$i]['student_img'])){
                            //display student image.
                            echo "<img class='image' src=\"/theschool/uploads/{$students[$i]['student_img']}\">";
                        }else{
                            //display default student image.
                            echo "<img class='image' src=\"images/nostudent.png\">";
                        }
                        //display data of student.
                        echo '<p>'.$students[$i]['student_name'].'</p>';
                        echo '<p>'.$students[$i]['student_phone'].'</p>';
                        echo '<p>'.$students[$i]['student_email'].'</p></li>';
                    }
                    echo '</ul>';
                ?>
            </div>
        </div>
        <!-- right container -->
        <div class="col-md-5">
            <!-- choosing what to view in this container (add/edit/view of course or student)-->
            <div class="ctrSchool">
                <?php
                    switch($this->data['page']){
                        case 'createCourse':
                            require_once "htmlAddEditCourse.php";
                            break;
                        case 'editCourse':
                            require_once "htmlAddEditCourse.php";
                            break;
                        case 'courseDetails':
                            require_once "htmlCourseDetails.php";
                            break;
                        case 'createStudent':
                            require_once "htmlAddEditStudent.php";
                            break;
                        case 'editStudent':
                            require_once "htmlAddEditStudent.php";
                            break;
                        case 'studentDetails':
                            require_once "htmlStudentDetails.php";
                            break;
                        default:
                            echo 'Total Courses: '.$courseModel->countCourses()['count'].'<br>';
                            echo 'Total Students: '.$studentModel->countStudents()['count'];
                            break;
                    }
                ?>
            </div>
        </div>
    </div>
</div>