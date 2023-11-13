<?php
session_start();
include '../../connect.php';

$id = $_POST['id'];
?>

<div class="container">
    <form action="action.php" method="POST" class="form-group row">
        <div class="col-md-5">
            <input type="radio" name="interview_rating_sheet" id="interview_rating_sheet" class="form-check-input">
            <label for="" class="form-label">Interview Rating Sheet</label>
        </div>
        <br>
        <!-- Main form -->
        <div class="main-form row mt-4" id="main-form">
            <?php
            $queryss = "SELECT applicant.*, project.*, resume.*
            FROM applicant applicant, projects project, applicant_resume resume
            WHERE applicant.id = resume.applicant_id 
            AND project.id = resume.project_id 
            AND resume.id = '$id'";
            $resultss = $link->query($queryss);
            $rowed = $resultss->fetch_assoc();

            $datenow = date('F d, Y');

            ?>
            <center>
                <h4 class="fs-4">Interview Rating Sheet</h4>
            </center>
            <input type="hidden" name="resumeID" value="<?php echo $rowed['id'] ?>">
            <input type="hidden" name="projectID" value="<?php echo $rowed['project_id'] ?>">
            <div class="col-md-6">
                <input type="text" name="applicant" id="applicant" class="form-control" placeholder="Applicant" value="<?php echo $rowed['firstname'] . " " . $rowed['lastname'] ?>" readonly>
            </div>

            <div class="col-md-6">
                <input type="text" name="position_applied" id="position_applied" class="form-control" placeholder="Position Applied" value="<?php echo $rowed['project_title'] ?>" readonly>
            </div>

            <div class="col-md-6 mt-1">
                <input type="text" name="interviewer" id="interviewer" class="form-control" placeholder="Interviewer" value="<?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?>" readonly>
            </div>

            <div class="col-md-6 mt-1">
                <input type="text" name="date_now" id="date_now" class="form-control" placeholder="Date" value="<?php echo $datenow ?>" readonly>
            </div>

            <div class="col-md-12 mt-3">
                <span>Please circle the appropriate rating using the scale.</span><br>
                <label class="form-label mt-3 mb-3">5 - Exceptional 4 - Better than Average 3 - Average 2 - Poor</label>
                <br>
                <!-- For Relevant Educ Background -->
                <label class="form-label"><strong>Relevant Educ. Background</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label class="form-check-label" for="relevant_educ_background1">
                    5
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="relevant_educ_background" id="relevant_educ_background1" value="5">&nbsp;&nbsp;
                <label class="form-check-label" for="relevant_educ_background1">
                    4
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="relevant_educ_background" id="relevant_educ_background1" value="4">&nbsp;&nbsp;
                <label class="form-check-label" for="relevant_educ_background1">
                    3
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="relevant_educ_background" id="relevant_educ_background1" value="3">&nbsp;&nbsp;
                <label class="form-check-label" for="relevant_educ_background1">
                    2
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="relevant_educ_background" id="relevant_educ_background1" value="2"> &nbsp;&nbsp;


                <!-- For Related Work Experience -->
                <label class="form-label"><strong>Related Work Experience</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label class="form-check-label" for="related_work_experience1">
                    5
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="related_work_experience" id="related_work_experience1" value="5">&nbsp;&nbsp;
                <label class="form-check-label" for="related_work_experience1">
                    4
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="related_work_experience" id="related_work_experience1" value="4">&nbsp;&nbsp;
                <label class="form-check-label" for="related_work_experience1">
                    3
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="related_work_experience" id="related_work_experience1" value="3">&nbsp;&nbsp;
                <label class="form-check-label" for="related_work_experience1">
                    2
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="related_work_experience" id="related_work_experience1" value="2"> &nbsp;&nbsp;

                <!-- For Related Computer Skills -->
                <label class="form-label"><strong>Related Computer Skills</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label class="form-check-label" for="related_computer_skills1">
                    5
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="related_computer_skills" id="related_computer_skills1" value="5">&nbsp;&nbsp;
                <label class="form-check-label" for="related_computer_skills1">
                    4
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="related_computer_skills" id="related_computer_skills1" value="4">&nbsp;&nbsp;
                <label class="form-check-label" for="related_computer_skills1">
                    3
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="related_computer_skills" id="related_computer_skills1" value="3">&nbsp;&nbsp;
                <label class="form-check-label" for="related_computer_skills1">
                    2
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="related_computer_skills" id="related_computer_skills1" value="2"> &nbsp;&nbsp;

                <!-- For Verbal Communication Skills -->
                <label class="form-label"><strong>Verbal Communication Skills</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;
                <label class="form-check-label" for="verbal_communication_skills1">
                    5
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="verbal_communication_skills" id="verbal_communication_skills1" value="5">&nbsp;&nbsp;
                <label class="form-check-label" for="verbal_communication_skills1">
                    4
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="verbal_communication_skills" id="verbal_communication_skills1" value="4">&nbsp;&nbsp;
                <label class="form-check-label" for="verbal_communication_skills1">
                    3
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="verbal_communication_skills" id="verbal_communication_skills1" value="3">&nbsp;&nbsp;
                <label class="form-check-label" for="verbal_communication_skills1">
                    2
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="verbal_communication_skills" id="verbal_communication_skills1" value="2"> &nbsp;&nbsp;

                <!-- For Cooperation -->
                <label class="form-label"><strong>Cooperation</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label class="form-check-label" for="cooperation1">
                    5
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="cooperation" id="cooperation1" value="5">&nbsp;&nbsp;
                <label class="form-check-label" for="cooperation1">
                    4
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="cooperation" id="cooperation1" value="4">&nbsp;&nbsp;
                <label class="form-check-label" for="cooperation1">
                    3
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="cooperation" id="cooperation1" value="3">&nbsp;&nbsp;
                <label class="form-check-label" for="cooperation1">
                    2
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="cooperation" id="cooperation1" value="2"> &nbsp;&nbsp;

                <!-- For Personality -->
                <label class="form-label"><strong>Personality</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label class="form-check-label" for="personality1">
                    5
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="personality" id="personality1" value="5">&nbsp;&nbsp;
                <label class="form-check-label" for="personality1">
                    4
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="personality" id="personality1" value="4">&nbsp;&nbsp;
                <label class="form-check-label" for="personality1">
                    3
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="personality" id="personality1" value="3">&nbsp;&nbsp;
                <label class="form-check-label" for="personality1">
                    2
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="personality" id="personality1" value="2"> &nbsp;&nbsp;

                <!-- For Intelligence -->
                <label class="form-label"><strong>Intelligence</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label class="form-check-label" for="intelligence1">
                    5
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="intelligence" id="intelligence1" value="5">&nbsp;&nbsp;
                <label class="form-check-label" for="intelligence1">
                    4
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="intelligence" id="intelligence1" value="4">&nbsp;&nbsp;
                <label class="form-check-label" for="intelligence1">
                    3
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="intelligence" id="intelligence1" value="3">&nbsp;&nbsp;
                <label class="form-check-label" for="intelligence1">
                    2
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="intelligence" id="intelligence1" value="2"> &nbsp;&nbsp;

                <!-- For Diction -->
                <label class="form-label"><strong>Diction</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label class="form-check-label" for="diction1">
                    5
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="diction" id="diction1" value="5">&nbsp;&nbsp;
                <label class="form-check-label" for="diction1">
                    4
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="diction" id="diction1" value="4">&nbsp;&nbsp;
                <label class="form-check-label" for="diction1">
                    3
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="diction" id="diction1" value="3">&nbsp;&nbsp;
                <label class="form-check-label" for="diction1">
                    2
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="diction" id="diction1" value="2"> &nbsp;&nbsp;

                <!-- For Others -->
                <label class="form-label"><strong>Others</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label class="form-check-label" for="others1">
                    5
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="others" id="others1" value="5">&nbsp;&nbsp;
                <label class="form-check-label" for="others1">
                    4
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="others" id="others1" value="4">&nbsp;&nbsp;
                <label class="form-check-label" for="others1">
                    3
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="others" id="others1" value="3">&nbsp;&nbsp;
                <label class="form-check-label" for="others1">
                    2
                </label>&nbsp;
                <input class="form-check-input" type="radio" name="others" id="others1" value="2"> &nbsp;&nbsp;



                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label mt-3">Exam result (if any)</label>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="IQ" maxlength="2">
                            </div>
                            <div class="col-md-8">
                                <label for="" class="" maxlength="2">IQ</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="english" class="form-control">
                            </div>
                            <div class="col-md-8">
                                <label for="" class="" maxlength="2">English</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="math" class="form-control">
                            </div>
                            <div class="col-md-8">
                                <label for="" class="" maxlength="2">Math</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="" class="form-label">Interview Details</label>
                        <textarea class="form-control" name="interview_details" cols="10" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <?php ?>
        </div>


        <center>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success" name="passBtn">Pass</button>
                <input type="hidden" name="rejectID" class="rejectID" id="rejectID" value="<?php echo $rowed['id'] ?>">
                <button type="button" class="btn btn-danger failedBtn1" name="failedBtn1" id="failedBtn1" onclick="showTextarea()">Failed</button>
                <button type="submit" class="btn btn-danger" name="failedBtn2" id="failedBtn2">Failed</button>

            </div>
        </center>
        <br>
        <div class="col-md-12 mt-3 mb-5">
            <label for="" class="form-label" id="form-label-to-reason">Reason to Failed</label>
            <textarea name="reason_to_reject" class="form-control reason_to_reject" id="reason_to_reject" cols="30" rows="5"></textarea>
            <button type="submit" class="btn btn-info mt-3" name="failedBtn-1" id="failedBtn-1">Submit</button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

    </form>
</div>
</div>
<script>
    document.getElementById('main-form').style.display = 'none';
    document.getElementById('failedBtn2').style.display = 'none';
    document.getElementById('reason_to_reject').style.display = 'none';
    document.getElementById('form-label-to-reason').style.display = 'none';
    document.getElementById('failedBtn-1').style.display = 'none';

    document.getElementById("interview_rating_sheet").addEventListener("change", function() {
        var radio = document.getElementById('interview_rating_sheet');
        var form = document.getElementById("main-form");
        var rejectButton1 = document.getElementById("failedBtn1");
        var rejectButton2 = document.getElementById("failedBtn2");
        var textarea = document.getElementById("reason_to_reject");
        var label = document.getElementById("form-label-to-reason");
        var button = document.getElementById("failedBtn-1");

        if (radio.checked) {
            form.style.display = "inline-flex";
            rejectButton2.style.display = "inline-flex";
            rejectButton1.style.display = "none";
            textarea.style.display = "none";
            label.style.display = "none";
            button.style.display = "none";
        } else {
            form.style.display = "none";
        }
    });

    function showTextarea() {
        var textarea = document.getElementById("reason_to_reject");
        var label = document.getElementById("form-label-to-reason");
        var button = document.getElementById("failedBtn-1");
        textarea.style.display = "block";
        label.style.display = "block";
        button.style.display = "block";
    }
</script>