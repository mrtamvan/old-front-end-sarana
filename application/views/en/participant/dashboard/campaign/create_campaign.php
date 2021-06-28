<?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
echo $url = $uriSegments[2]; ?>
<main id="main">
    <div class="container-scroller mt-5 pt-5 mb-5">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center ">

                <div class="col-lg-8 mx-auto">
                    <h2 class="text-center mb-4" style="color: Black">Create Your First Campaign</h2>
                    <div class="auto-form-wrapper" id="ccampaign">
                        <span id="success_message"></span>
                        <form method="post" enctype="multipart/form-data" action="<?= base_url() . 'cdash/input_campaign' ?>">

                            <!-- Circles which indicates the steps of the form: -->
                            <div style="display:none;">
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>
                            <!-- One "tab" for each step in the form: -->
                            <div class="tab">
                                <div class="form-group">
                                    <label class="label">Title</label>
                                    <div class="input-group">
                                        <input type="text" name="title" autocomplete="off" class="form-control" placeholder="Campaign Title">
                                        <?php foreach ($result as $view) : ?>
                                            <input type="text" hidden name="id_participant" autocomplete="off" class="form-control" value="<?= $view->id ?>">
                                            <input type="text" hidden name="language" autocomplete="off" class="form-control" value="<?= $url ?>">
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label">Kategory</label>
                                    <div class="input-group">
                                        <select class="form-control" name="id_category" required>
                                            <option selected disabled>Select Category</option>
                                            <?php foreach ($category as $opt) : ?>
                                                <option value="<?= $opt->id ?>"><?= $opt->category_title ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="label">Target Fund</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" name="target" id="ribuan" class="form-control">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="label">Banner Campaign</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="banner" style="border: none;" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div class="form-group">

                                    <textarea name="description" class="form-control" style="border:none" id="summernote"></textarea>

                                </div>
                            </div>

                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                    <input type="submit" class="btn btn-success" id="js-submit-form" name="submit" value="Create Campaign" style="display: none;">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</main>


<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").style.display = "none";
            document.getElementById("js-submit-form").style.display = "inline";
        } else {
            document.getElementById("nextBtn").style.display = "inline";
            document.getElementById("js-submit-form").style.display = "none";
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false:
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }
</script>