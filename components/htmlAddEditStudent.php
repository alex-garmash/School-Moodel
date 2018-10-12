<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <!-- Form add/edit student -->
                <form name="f" method="post" action="<?php echo $this->data['actionLink']; ?>" enctype="multipart/form-data">
                    <!-- title -->
                    <h3 class="text-center default-text py-3"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <?php echo $this->title; ?></h3>                   <!-- student block name -->
                    <div class="form-group row inp">
                        <!-- label student name -->
                        <div><label class="col-sm-12 col-sm-offset-1 col-form-label"><i class="fa fa-user"></i> Name</label></div>
                        <div class="col-sm-offset-1 col-sm-7">
                            <!-- input name -->
                            <input type="text" name="student_name" class="form-control-plaintext"
                                   value="<?php if(!empty($this->data['create']['student_name'])) echo $this->data['create']['student_name']; ?>" placeholder="Student Name">
                        </div>
                    </div>
                    <!-- student block phone -->
                    <div class="form-group row inp">
                        <!-- label student phone -->
                        <div><label class="col-sm-12 col-sm-offset-1 col-form-label"><i class="fa fa-phone-square"></i>Phone</label></div>
                        <div class="col-sm-offset-1 col-sm-7">
                            <!-- input phone -->
                            <input type="text" name="student_phone" class="form-control-plaintext"
                                   value="<?php if(!empty($this->data['create']['student_phone'])) echo $this->data['create']['student_phone']; ?>" placeholder="054444444">
                        </div>
                    </div>
                    <!-- student block email -->
                    <div class="form-group row inp">
                        <!-- label student email -->
                        <div><label class="col-sm-12 col-sm-offset-1 col-form-label"><i class="fa fa-envelope"></i>Email</label></div>
                        <div class="col-sm-offset-1 col-sm-7">
                            <!-- input email -->
                            <input type="email" name="student_email" class="form-control-plaintext"
                                   value="<?php if(!empty($this->data['create']['student_email'])) echo $this->data['create']['student_email'];?>" placeholder="example@email.com">
                        </div>
                    </div>
                    <!-- student block image -->
                    <div class="form-group row inp">
                        <!-- label student image -->
                        <div><label class="col-sm-12 col-sm-offset-1 col-form-label"><i class="fa fa-image"></i>Image</label></div>
                        <div class="col-sm-8 col-sm-offset-1">
                            <!-- display preview image -->
                            <?php
                                if(empty($this->data['create']['student_img'])){
                                    //display default student image.
                                    echo "<img class='image'  src=\"images/nostudent.png\">";
                                }else{
                                    //display student image.
                                    echo "<img class='image'  src=\"/theschool/uploads/" . $this->data['create']['student_img'] . "\">";
                                }
                            ?>
                            <!-- input image -->
                            <input type="file" name="file" class="form-control-file file">
                            <label class="redCtr">Max image size 5MB and format support jpg, png, jpeg, gif.</label>
                            <!-- display error resolution of image -->
                            <span class="imgErrors"></span>
                        </div>
                    </div>
                    <!-- check boxes of registered courses for this student -->
                    <div class="checBboxCourses">
                        <h3>Courses:</h3>
                        <!-- checkboxes list of student courses -->
                        <?php
                            echo "<ul>";
                            $coursesNames = $courseModel->getAllCoursesIDsAndNames();
                            $size = count($coursesNames);

                            if($this->data['btn'] == "Edit"){
                                for($i = 0; $i < $size; $i++){
                                    if($this->data['checkBox'] != null){
                                        if(in_array($coursesNames[$i]['course_id'],$this->data['checkBox'])){
                                            echo "<li><span><input type=\"checkbox\" checked name=\"check_list[]\" value=\"{$coursesNames[$i]['course_id']}\">{$coursesNames[$i]['course_name']}</span></li>";
                                    }else{
                                            echo "<li><span><input type=\"checkbox\"  name=\"check_list[]\" value=\"{$coursesNames[$i]['course_id']}\">{$coursesNames[$i]['course_name']}</span></li>";
                                        }
                                   }else{
                                       echo "<li><span><input type=\"checkbox\"  name=\"check_list[]\" value=\"{$coursesNames[$i]['course_id']}\">{$coursesNames[$i]['course_name']}</span></li>";
                                    }
                                }
                            }else if($this->data['btn'] == "Create"){

                                for($i = 0; $i < $size; $i++){
                                    echo "<li><span><input type=\"checkbox\" name=\"check_list[]\" value=\"{$coursesNames[$i]['course_id']}\">{$coursesNames[$i]['course_name']}</span></li>";
                                }
                            }
                            echo '</ul>';
                        ?>
                    </div>
                    <!-- errors block -->
                    <div class="error">
                    <?php if(isset($this->data['err'])) echo "<p class='error'>{$this->data['err']}</p>" ?>
                    </div>
                    <!-- buttons add/delete student -->
                    <div class="foot">
                        <button type="button" value="<?php echo($this->data['btn']);?>" class="btn btn-default btnAddEditStudent">Save</button>
                        <?php
                            if(!empty($this->data['btn'] == "Edit"))
                              echo  "<button type=\"button\" value=\"{$this->data['create']['student_id']}\" class=\"btn btn-default btnDeleteStudent\">Delete</button>";
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>