<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['add_patient']))
		{
			$pat_fname=$_POST['pat_fname'];
			$pat_lname=$_POST['pat_lname'];
			$pat_number=$_POST['pat_number'];
            $pat_phone=$_POST['pat_phone'];
            $pat_type=$_POST['pat_type'];
            $pat_addr=$_POST['pat_addr'];
            $pat_age = $_POST['pat_age'];
            $pat_dob = $_POST['pat_dob'];
            $pat_ailment = $_POST['pat_ailment'];
            //sql to insert captured values
			$query="insert into his_patients (pat_fname, pat_ailment, pat_lname, pat_age, pat_dob, pat_number, pat_phone, pat_type, pat_addr) values(?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssssss', $pat_fname, $pat_ailment, $pat_lname, $pat_age, $pat_dob, $pat_number, $pat_phone, $pat_type, $pat_addr);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Patient Details Added";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>
<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html lang="en">
    
    <!--Head-->
    <?php include('assets/inc/head.php');?>
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include("assets/inc/nav.php");?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("assets/inc/sidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                            <li class="breadcrumb-item active">Add Patient</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Patient Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill all fields</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <!-- Personal Information -->
                                            <h5 class="mt-3 mb-2">Personal Information</h5>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" name="pat_fname" class="form-control" id="inputEmail4" placeholder="Patient's First Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" name="pat_lname" class="form-control"  id="inputPassword4" placeholder="Patient`s Last Name">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Date Of Birth</label>
                                                    <input type="date" required="required" name="pat_dob" class="form-control" id="inputEmail4" placeholder="DD/MM/YYYY" onchange="calculateAge()">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Age</label>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <input type="text" name="pat_age_years" class="form-control" id="ageYears" placeholder="Years" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" name="pat_age_months" class="form-control" id="ageMonths" placeholder="Months" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" name="pat_age_days" class="form-control" id="ageDays" placeholder="Days" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Address</label>
                                                <input required="required" type="text" class="form-control" name="pat_addr" id="inputAddress" placeholder="Patient's Addresss">
                                            </div>

                                            <!-- Contact & Medical Info -->
                                            <h5 class="mt-3 mb-2">Contact & Medical Info</h5>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Mobile Number</label>
                                                    <input required="required" type="text" name="pat_phone" class="form-control" id="inputCity">
                                                </div>
                                                <!-- This also should appear on the doctor's side
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Patient Ailment</label>
                                                    <input required="required" type="text" name="pat_ailment" class="form-control" id="inputCity">
                                                </div>
                                                --->
                                                <!-- This part should appear on the doctor's diagnosis
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Patient's Type</label>
                                                    <select id="inputState" required="required" name="pat_type" class="form-control">
                                                        <option>Choose</option>
                                                        <option>InPatient</option>
                                                        <option>OutPatient</option>
                                                    </select>
                                                </div>
                                                --->
                                                
                                                <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                        $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Patient Number</label>
                                                    <input type="text" name="pat_number" value="<?php echo $patient_number;?>" class="form-control" id="inputZip">
                                                </div>
                                            </div>

                                            <!-- Insurance Information -->
                                            <h5 class="mt-3 mb-2">Insurance Information</h5>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="hasInsurance" name="has_insurance" onchange="toggleInsurance()">
                                                        <label class="custom-control-label" for="hasInsurance">Patient has insurance</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div id="insuranceDetails" style="display: none;">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="insurance_provider" class="col-form-label">Insurance Provider</label>
                                                        <select id="insurance_provider" name="insurance_provider" class="form-control">
                                                            <option value="">Select Provider</option>
                                                            <option value="NHIF">NHIF</option>
                                                            <option value="AAR">AAR</option>
                                                            <option value="Jubilee">Jubilee</option>
                                                            <option value="Britam">Britam</option>
                                                            <option value="CIC">CIC</option>
                                                            <option value="Madison">Madison</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="insurance_scheme" class="col-form-label">Insurance Scheme</label>
                                                        <select id="insurance_scheme_type" name="insurance_scheme_type" class="form-control">
                                                            <option value="">Select Scheme</option>
                                                            <option value="NHIF">NHIF FULL COVER</option>                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="member_number" class="col-form-label">Member Number</label>
                                                        <input type="text" name="member_number" class="form-control" id="member_number" placeholder="Insurance Member Number">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hospital Details -->
                                            <h5 class="mt-3 mb-2">Hospital Details</h5>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="department" class="col-form-label">Department</label>
                                                    <select id="department" name="department" class="form-control" required>
                                                        <option value="">Select Department</option>
                                                        <option value="General Medicine">General Medicine</option>
                                                        <option value="Pediatrics">Pediatrics</option>
                                                        <option value="Surgery">Surgery</option>
                                                        <option value="Maternity">Maternity</option>
                                                        <option value="Dental">Dental</option>
                                                        <option value="Orthopedics">Orthopedics</option>
                                                        <option value="Cardiology">Cardiology</option>
                                                        <option value="Emergency">Emergency</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="admission_date" class="col-form-label">Admission Date</label>
                                                    <input type="date" name="admission_date" class="form-control" id="admission_date" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>

                                            <!-- Next of Kin Details -->
                                            <h5 class="mt-3 mb-2">Next of Kin Details</h5>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="kin_name" class="col-form-label">Full Name</label>
                                                    <input type="text" required="required" name="kin_name" class="form-control" id="kin_name" placeholder="Next of Kin Full Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="kin_relationship" class="col-form-label">Relationship</label>
                                                    <select id="kin_relationship" required="required" name="kin_relationship" class="form-control">
                                                        <option value="">Select Relationship</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Parent">Parent</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Friend">Friend</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="kin_phone" class="col-form-label">Phone Number</label>
                                                    <input type="text" required="required" name="kin_phone" class="form-control" id="kin_phone" placeholder="Primary Phone Number">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="kin_alt_phone" class="col-form-label">Alternative Phone</label>
                                                    <input type="text" name="kin_alt_phone" class="form-control" id="kin_alt_phone" placeholder="Alternative Phone Number">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="kin_employment" class="col-form-label">Employment Type</label>
                                                    <select id="kin_employment" name="kin_employment" class="form-control">
                                                        <option value="">Select Employment</option>
                                                        <option value="Employed">Employed</option>
                                                        <option value="Self-Employed">Self-Employed</option>
                                                        <option value="Student">Student</option>
                                                        <option value="Retired">Retired</option>
                                                        <option value="Unemployed">Unemployed</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit" name="add_patient" class="ladda-button btn btn-primary" data-style="expand-right">Add Patient</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php');?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

       
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>

        <!-- Loading buttons js -->
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>

        <!-- Buttons init js-->
        <script src="assets/js/pages/loading-btn.init.js"></script>
        <script>
        function calculateAge() {
            var dob = document.getElementById('inputEmail4').value;
            if (!dob) return;
            var birthDate = new Date(dob);
            var today = new Date();
            var years = today.getFullYear() - birthDate.getFullYear();
            var months = today.getMonth() - birthDate.getMonth();
            var days = today.getDate() - birthDate.getDate();

            if (days < 0) {
                months--;
                days += new Date(today.getFullYear(), today.getMonth(), 0).getDate();
            }
            if (months < 0) {
                years--;
                months += 12;
            }
            document.getElementById('ageYears').value = years;
            document.getElementById('ageMonths').value = months;
            document.getElementById('ageDays').value = days;
        }

        function toggleInsurance() {
            var checkbox = document.getElementById('hasInsurance');
            var insuranceDetails = document.getElementById('insuranceDetails');
            var insuranceInputs = insuranceDetails.querySelectorAll('input, select');
            
            if (checkbox.checked) {
                insuranceDetails.style.display = 'block';
                // Make insurance fields required when visible
                insuranceInputs.forEach(function(input) {
                    if (input.name === 'insurance_provider' || input.name === 'member_number') {
                        input.setAttribute('required', 'required');
                    }
                });
            } else {
                insuranceDetails.style.display = 'none';
                // Remove required attribute and clear values when hidden
                insuranceInputs.forEach(function(input) {
                    input.removeAttribute('required');
                    input.value = '';
                });
            }
        }
        </script>
    </body>

</html>