<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card studentDetailsCtr">
                <h3 class="text-center default-text py-3"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <?php echo $this->title; ?> </h3>
                <div class="center">
                    <div class="studentInfo">
                        <?php if($this->data['create']['student_img'] == ''){
                            //display default student image.
                            echo "<img class='image'  src=\"images/nostudent.png\">";
                        }else{
                            //display student image.
                            echo "<img class='image' src=\"/theschool/uploads/".$this->data['create']['student_img'] . "\">";
                        }
                        ?>
                        <!-- display student data -->
                        <div>
                            <p><i class="fa fa-user"></i><?php echo '  '.$this->data['create']['student_name'] ?></p>
                            <p><i class="fa fa-phone"></i><?php echo '  '.$this->data['create']['student_phone'] ?></p>
                            <p><i class="fa fa-envelope"></i><?php echo '  '.$this->data['create']['student_email'] ?></p>
                        </div>
                    </div>
                    <!-- button edit student -->
                    <div class="foot">
                        <button type="button" value="<?php echo $this->data['create']['student_id'] ?>" class="btn btn-default btnEditStudent">Edit</button>
                    </div>
                </div>
                <h3>Registered student for courses:</h3>
                <!-- display registered courses of this student -->
                <div class="studentsCoursesRegistered">
                    <ul class="list-group studentCoursesCtr">
                        <?php
                            $courses = $courseModel->getAllCoursesNameAndImageOfStudent($this->data['create']['student_id']);
                            $size = count($courses);
                            for($i = 0; $i < $size; $i++){
                                if(!empty($courses[$i]['course_img'])){
                                    //display image, name of course.
                                    echo "<li><img src=\"uploads/{$courses[$i]['course_img']}\" ><span>{$courses[$i]['course_name']}</span></li>";
                                }else{
                                    //display default image, name of course.
                                    echo "<li><img src=\"images/nocourse.png\"><span> {$courses[$i]['course_name']}</span></li>";
                                }
                            }
                            //display if student don't have any courses.
                            if(empty($courses)){
                                echo "<p>Student don't have any courses</p>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>