<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card courseDetailsCtr">
                <h3 class="text-center default-text py-3"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <?php echo $this->title; ?></h3>
                <div class="center">
                    <div class="courseInfo">

                        <?php if(empty($this->data['create']['course_img'])){
                            //display default course image.
                            echo "<img class='image'  src=\"images/nostudent.png\">";
                        }else{
                            //display course image.
                            echo "<img class='image'  src=\"uploads/" . $this->data['create']['course_img'] . "\">";
                        }
                        ?>
                        <div>
                            <!-- display course name -->
                            <p><i class="fa fa-user"></i><?php echo '  '. $this->data['create']['course_name'] ?></p>
                            <?php
                                $totalStudents = $courseModel->getSumAllStudentsOfCourse($this->data['create']['course_id']);
                                if($totalStudents){
                                    //display sum of students registered on this course.
                                    echo "<p><i class=\"fa fa-check-circle\"></i> {$totalStudents['sum']}  Students".'</p>';
                                }else{
                                    //there no student registered for this course.
                                    echo "<p><i class=\"fa fa-check-circle\"></i> 0 Students</p>";
                                }
                            ?>
                            <!-- display course description. -->
                            <p><i class="fa fa-align-justify"></i><?php echo '  ' . $this->data['create']['course_description'] ?></p>
                        </div>
                    </div>
                    <!-- buttons edit,delete course -->
                    <div class="foot">
                        <?php
                            if(Session::logged()['role'] == 'owner' || Session::logged()['role'] == 'manager'){
                                echo "<button type=\"button\" value=\"{$this->data['create']['course_id']}\" class=\"btn btn-default btnEditCourse\">Edit</button>";
                                echo "<button type=\"button\" value=\"{$this->data['create']['course_id']}\" class=\"btn btn-default btnDeleteCourse\">Delete</button>";
                            }
                        ?>
                    </div>
                </div>
                <h3>Registered students for this course:</h3>
                <!-- display registered students of this course -->
                <div class="studentsCoursesRegistered">
                    <ul class="list-group studentCoursesCtr">
                        <?php
                            $students = $courseModel->getAllStudentsNameAndImageCourse($this->data['create']['course_id']);
                            $size = count($students);

                            for($i = 0; $i < $size; $i++){
                                if($students[$i]['student_img'] == ''){
                                    //display default image, name of student.
                                    echo "<li><img src=\"images/nostudent.png\"><span> {$students[$i]['student_name']}</span></li>";
                                }else{
                                    //display image, name of student.
                                    echo "<li><img src=\"uploads/{$students[$i]['student_img']}\" ><span>{$students[$i]['student_name']}</span></li>";
                                }
                            }
                            //display if course don't have any students
                            if(empty($students)){
                                echo "<p>Course don't have any students</p>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>