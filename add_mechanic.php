<?php
include 'top_head.php';
require_once 'mainfunction.php';
$db = new Database();
$db->connect();
if (isset($_REQUEST['id'])) {
    $url_name = "update";
    $url = 'add';

    $mechanic_id = $_REQUEST['id'];
    $result_mechanic = $db->getMechanicDetails($mechanic_id);

    //echo "<pre>";
    //print_r($result_mechanic);

    foreach ($result_mechanic as $value) {
        $fstr_mechanic_company_name = $value['fstr_mechanic_company_name'];
        $fnum_mechanic_id = $value['fnum_mechanic_id'];
        $fstr_rand_tocken = $value['fstr_rand_tocken'];
        $fstr_mechanic_company_name = $value['fstr_mechanic_company_name'];
        $fstr_mechanic_name = $value['fstr_mechanic_name'];
        $fstr_mechanic_address = $value['fstr_mechanic_address'];
        $fstr_mechanic_city = $value['fstr_mechanic_city'];
        $fstr_mechanic_state = $value['fstr_mechanic_state'];
        $fstr_mechanic_country = $value['fstr_mechanic_country'];
        $fnum_mechanic_zipCode = $value['fnum_mechanic_zipCode'];
        $fnum_mechanic_mobPhone = $value['fnum_mechanic_mobPhone'];
        $fstr_mechanic_nearestLandmark = $value['fstr_mechanic_nearestLandmark'];
        $fnum_mechanic_phone1 = $value['fnum_mechanic_phone1'];
        $fnum_mechanic_phone2 = $value['fnum_mechanic_phone2'];
        $fstr_mechanic_email = $value['fstr_mechanic_email'];
        $fstr_mechanic_openingTime = $value['fstr_mechanic_openingTime'];
        $fstr_mechanic_closingTime = $value['fstr_mechanic_closingTime'];
        $fnum_mechanic_available24hrs = $value['fnum_mechanic_available24hrs'];
        $fstr_mechanic_pick_drop = $value['fstr_mechanic_pick_drop'];
        $fnum_mechanic_rangeService = $value['fnum_mechanic_rangeService'];
        $fstr_mechanic_contact_name = $value['fstr_mechanic_contact_name'];
        $fnum_mechanic_contact_mobile_number = $value['fnum_mechanic_contact_mobile_number'];
        $fstr_mechanic_executive_name = $value['fstr_mechanic_executive_name'];
        $fstr_mechanic_interest = $value['fstr_mechanic_interest'];
        $ExecuutiveRating = $value['ExecuutiveRating'];
        $ExecutiveRemark = $value['ExecutiveRemark'];
        $RepairData = $value['mechanicRepair'];
        $data = explode(",", $RepairData);
        $service_id_amout = $value['service_charge'];
        $serviceIdData = $service_id_amout['service_id'];
        $serviceId = explode(",", $serviceIdData);
        $serviceAmountData = $service_id_amout['service_amount'];
        $serviceAmount = explode(",", $serviceAmountData);
        $fstr_mechanic_mechanic_picture = $value['fstr_mechanic_mechanic_picture'];
        $fstr_mechanic_shop_outside_picture = $value['fstr_mechanic_shop_outside_picture'];
        $fstr_mechanic_shop_inside_picture = $value['fstr_mechanic_shop_inside_picture'];
        $fstr_mechanic_other_picture = $value['fstr_mechanic_other_picture'];

    }

} else {
    $url_name = "add";
    $url = 'update';

    $fstr_mechanic_company_name = "";
    $fnum_mechanic_id = "";
    $fstr_rand_tocken = "";
    $fstr_mechanic_company_name = "";
    $fstr_mechanic_name = "";
    $fstr_mechanic_address = "";
    $fstr_mechanic_city = "";
    $fstr_mechanic_state = "";
    $fstr_mechanic_country = "";
    $fnum_mechanic_zipCode = "";
    $fnum_mechanic_mobPhone = "";
    $fstr_mechanic_nearestLandmark = "";
    $fnum_mechanic_phone1 = "";
    $fnum_mechanic_phone2 = "";
    $fstr_mechanic_email = "";
    $fstr_mechanic_openingTime = "";
    $fstr_mechanic_closingTime = "";
    $fnum_mechanic_available24hrs = "";
    $fstr_mechanic_pick_drop = "";
    $fnum_mechanic_rangeService = "";
    $fstr_mechanic_contact_name = "";
    $fnum_mechanic_contact_mobile_number = "";
    $fstr_mechanic_executive_name = "";
    $fstr_mechanic_interest = "";
    $data = "";
    $serviceId = "";
    $serviceAmount = "";
    $ExecuutiveRating = "";
    $ExecutiveRemark = "";
    $fstr_mechanic_mechanic_picture = "";
    $fstr_mechanic_shop_outside_picture = "";
    $fstr_mechanic_shop_inside_picture = "";
    $fstr_mechanic_other_picture = "";
}


?>

    <nav class="no-curve"
         style="padding:0px 0px 0px 100px;background:#036c9f; color:#fff; height:35px; line-height:35px;margin-top:116px;position: fixed;width: 100%;z-index:9;">
        <div class="container-fluid">
            <span style="margin-left: 15px;">Home > <?php echo $url_name; ?> Mechanic </span>
        </div>
    </nav>

    <div class="container" style="padding-top:60px;">
    <div class="container" style="margin-top:30px;">
    <div style="height:35px;"></div>
    <hr>

    <h3>
        <span class="fa fa-user-plus"></span> <?php echo $url_name; ?> Mechanic Details
        <a href="<?php echo $url; ?>_mechanic.php" class="btn btn-success btn-sm pull-right"> <span
                class="fa fa-user-secret"></span> <?php echo $url; ?> Mechanic</a>
    </h3>
    <hr>
    <form class="form-horizontal" method="post" action="add_mechanic.php" enctype="multipart/form-data">
        <div class="col-md-5">

            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Shop/Company Name</label>
                <div class="cols-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control col-md-6" required name="companyname" id="companyname"
                               value="<?php echo $fstr_mechanic_company_name; ?>"
                               placeholder="Enter your Company Name"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">Machanic Name</label>
                <div class="cols-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" required name="machanicname" id="machanicname"
                               value="<?php echo $fstr_mechanic_name; ?>" placeholder="Enter your Name"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="cols-sm-2 control-label">Street Address</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="streetAddress"
                               value="<?php echo $fstr_mechanic_address; ?>" id="streetAddress"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">City / State </label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="city" id="city"
                               value="<?php echo $fstr_mechanic_city; ?>"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Zip / Postal Code </label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="zip" id="zip"
                               value="<?php echo $fstr_mechanic_state; ?>"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Country </label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="country" id="country"
                               value="<?php echo $fstr_mechanic_country; ?>"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Nearest Landmark </label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="landmark" id="landmark"
                               placeholder="Enter your Nearest Landmark"
                               value="<?php echo $fstr_mechanic_nearestLandmark; ?>"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Mobile Phone </label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" maxlength="10" required name="mobile" id="mobile"
                               placeholder="Enter your Mobile No" value="<?php echo $fnum_mechanic_mobPhone; ?>"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Phone 1</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" maxlength="10" name="phone1" id="phone1"
                               placeholder="Enter your Phone " value="<?php echo $fnum_mechanic_phone1; ?>"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Phone 2</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" maxlength="10" name="phone2" id="phone2"
                               placeholder="Enter your Phone" value="<?php echo $fnum_mechanic_phone2; ?>"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Email</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="email" id="email"
                               placeholder="Enter your email address" value="<?php echo $fstr_mechanic_email; ?>"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Available 24 Hr</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                                  <span class="input-group-addon">
                                        <input type="radio" name="24service"
                                               id="open" <?php if ($fnum_mechanic_available24hrs == "Yes") {
                                            echo "checked";
                                        } ?> aria-label="..." value="Yes">
                                  </span>
                        <input type="text" class="form-control" readonly="true" aria-label="..." value="Yes">
                        <span class="input-group-addon">
                                        <input type="radio" name="24service" id="close" aria-label="..."
                                               value="No" <?php if ($fnum_mechanic_available24hrs == "No") {
                                            echo "checked";
                                        } ?> >
                                  </span>
                        <input type="text" class="form-control" readonly="true" aria-label="..." value="No" title="">
                    </div><!-- /input-group -->

                </div>
            </div>
            <div class="form-group close col-md-12" style="display:none">
                <div class="form-group col-md-12">
                    <label for="password" class="cols-sm-2 control-label">Opening Time</label>
                    <div class="cols-sm-10 ot">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa"></i></span>
                            <select class="form-control" name="ot" id="ot">
                                <?php
                                if ($fnum_mechanic_available24hrs == "No") {
                                    ?>
                                    <option value="<?php echo $fstr_mechanic_openingTime; ?>"
                                            selected><?php echo $fstr_mechanic_openingTime; ?></option>
                                    <?php
                                } else {
                                    ?>
                                    <option>Select Your Opening Time</option>
                                    <option value="06:00am">06:00 AM</option>
                                    <option value="07:00am">07:00 AM</option>
                                    <option value="08:00am">08:00 AM</option>
                                    <option value="09:00am">09:00 AM</option>
                                    <option value="10:00am">10:00 AM</option>
                                    <option value="11:00am">11:00 AM</option>
                                    <option value="12:00am">12:00 PM</option>
                                    <option value="01:00pm">01:00 PM</option>
                                    <option value="02:00pm">02:00 PM</option>
                                    <option value="03:00pm">03:00 PM</option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label for="password" class="cols-sm-2 control-label">Closing Time</label>
                    <div class="cols-sm-10">
                        <div class="input-group ct">
                            <span class="input-group-addon"><i class="fa fa-user fa"></i></span>
                            <select class="form-control" name="ct" id="ct">
                                <?php
                                if ($fnum_mechanic_available24hrs == "No") {
                                    ?>
                                    <option value="<?php echo $fstr_mechanic_closingTime; ?>"
                                            selected><?php echo $fstr_mechanic_closingTime; ?></option>
                                    <?php
                                } else {
                                    ?>
                                    <option>Select Your Opening Time</option>
                                    <option value="06:00pm">06:00 PM</option>
                                    <option value="07:00pm">07:00 PM</option>
                                    <option value="08:00pm">08:00 PM</option>
                                    <option value="09:00pm">09:00 PM</option>
                                    <option value="10:00pm">10:00 PM</option>
                                    <option value="11:00pm">11:00 PM</option>
                                    <option value="12:00am">12:00 AM</option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Range of Service (KMs 0-30)</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="range"
                               value="<?php echo $fnum_mechanic_rangeService; ?>" id="range"
                               placeholder="Enter your range of service"/>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-md-5" style="margin-left:30px;">
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">You CanRepair</label>
                <div class="cols-sm-10">
                    <div class="input-group col-md-12">
                              <span class="input-group-addon">
                                        <input type="checkbox" name="repair[]" <?php if (isset($data[0]) == 1) {
                                            echo "checked";
                                        } ?> aria-label="..." value="1">
                                  </span>
                        <input type="text" class="form-control" value="Car" aria-label="...">
                        <span class="input-group-addon">
                                        <input type="checkbox" name="repair[]" aria-label="..."
                                               value="2" <?php if (isset($data[1]) == 2) {
                                            echo "checked";
                                        } ?>>
                                  </span>
                        <input type="text" class="form-control" value="Jeep" aria-label="...">
                    </div>

                    <div class="input-group col-md-12">
                              <span class="input-group-addon">
                                        <input type="checkbox" name="repair[]" aria-label="..."
                                               value="3" <?php if (isset($data[3]) == 3) {
                                            echo "checked";
                                        } ?> >
                                  </span>
                        <input type="text" class="form-control" value="Bike" aria-label="...">
                        <span class="input-group-addon">
                                        <input type="checkbox" name="repair[]" aria-label="..."
                                               value="4" <?php if (isset($data[4]) == 4) {
                                            echo "checked";
                                        } ?> >
                                  </span>
                        <input type="text" class="form-control" value="Scooter" aria-label="...">
                    </div>


                </div>
            </div>
            <?php
            if (isset($serviceId[0]) == 4) {
                $display_4 = "block";
                $amount_4 = $serviceAmount[0];
            } else {
                $display_4 = "none";
                $amount_4 = "";

            }
            if (isset($serviceId[1]) == 5) {
                $display_5 = "block";
                $amount_5 = $serviceAmount[1];
            } else {
                $display_5 = "none";
                $amount_5 = "";
            }
            if ((isset($serviceId[2]) == 6)) {
                $display_6 = "block";
                $amount_6 = $serviceAmount[2];
            } else {
                $display_6 = "none";
                $amount_6 = "";
            }
            if (isset($serviceId[3]) == 7) {
                $display_7 = "block";
                $amount_7 = $serviceAmount[3];
            } else {
                $display_7 = "none";
                $amount_7 = "";
            }
            if (isset($serviceId[4]) == 1) {
                $display_1 = "block";
                $amount_1 = $serviceAmount[4];
            } else {
                $display_1 = "none";
                $amount_1 = "";
            }
            if (isset($serviceId[5]) == 2) {
                $display_2 = "block";
                $amount_2 = $serviceAmount[5];
            } else {
                $display_2 = "none";
                $amount_2 = "";
            }
            if (isset($serviceId[6]) == 3) {
                $display_3 = "block";
                $amount_3 = $serviceAmount[6];
            } else {
                $display_3 = "none";
                $amount_3 = "";
            }

            ?>
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Service You Provide</label>
                <div class="cols-sm-10">
                    <div class="input-group col-md-12">
                              <span class="input-group-addon">
                                        <input type="checkbox" name="service[]" id="tube" aria-label="..."
                                               value="4" <?php if (isset($serviceId[0]) == 4) {
                                            echo "checked";
                                        } ?> >
                                  </span>
                        <input type="text" class="form-control" value="Tubeless Puncher Charges" aria-label="...">
                        <span class="input-group-addon">
                                        <input type="checkbox" name="service[]" id="normal" aria-label="..."
                                               value="5" <?php if (isset($serviceId[1]) == 5) {
                                            echo "checked";
                                        } ?> >
                                  </span>
                        <input type="text" class="form-control" value="Normal Puncher Repair Charge" aria-label="...">
                    </div>

                    <div class="input-group col-md-12">
                              <span class="input-group-addon">
                                        <input type="checkbox" name="service[]" id="autokey" aria-label="..."
                                               value="6" <?php if (isset($serviceId[2]) == 6) {
                                            echo "checked";
                                        } ?> >
                                  </span>
                        <input type="text" class="form-control" value="Automatic Keymaking Charges" aria-label="...">
                        <span class="input-group-addon">
                                        <input type="checkbox" name="service[]" id="manualkey" aria-label="..."
                                               value="7" <?php if (isset($serviceId[3]) == 7) {
                                            echo "checked";
                                        } ?> >
                                  </span>
                        <input type="text" class="form-control" value="Manual Key Making Charges" aria-label="...">
                    </div>
                    <div class="input-group col-md-12">
                              <span class="input-group-addon">
                                        <input type="checkbox" aria-label="..." id="crane" name="service[]"
                                               value="1" <?php if (isset($serviceId[4]) == 1) {
                                            echo "checked";
                                        } ?> >
                                  </span>
                        <input type="text" class="form-control" value="Crane Service Charges" aria-label="...">
                        <span class="input-group-addon">
                                        <input type="checkbox" aria-label="..." id="wheelAlign" value="2"
                                               name="service[]" <?php if (isset($serviceId[5]) == 2) {
                                            echo "checked";
                                        } ?>>
                                  </span>
                        <input type="text" class="form-control" value="Wheel Alignment Charges" aria-label="...">

                    </div>
                    <div class="input-group col-md-12">
                              <span class="input-group-addon">
                                        <input type="checkbox" aria-label="..." value="3" id="wheelBal"
                                               name="service[]" <?php if (isset($serviceId[6]) == 3) {
                                            echo "checked";
                                        } ?>>
                                  </span>
                        <input type="text" class="form-control" value="Wheel Balancing Charges" aria-label="...">

                    </div><!-- /input-group -->

                </div>
            </div>

            <div class="form-group tube" style="display:<?php echo $display_4; ?>">
                <label for="password" class="cols-sm-2 control-label">Tubeless Puncher Charges</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="TubelessPuncherCharge"
                               value="<?php echo $amount_4; ?>" id="TubelessPuncherCharge"
                               placeholder="Enter Your Charge Amount"/>
                    </div>
                </div>
            </div>

            <div class="form-group normal" style="display:<?php echo $display_5; ?>">
                <label for="password" class="cols-sm-2 control-label">Normal Puncher Repair Charge</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="NormalPuncherCharge"
                               value="<?php echo $amount_5; ?>" id="NormalPuncherCharge"
                               placeholder="Enter Your Charge Amount"/>
                    </div>
                </div>
            </div>

            <div class="form-group autokey" style="display:<?php echo $display_6; ?>">
                <label for="password" class="cols-sm-2 control-label">Automatic Keymaking Charges</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" value="<?php echo $amount_6; ?>"
                               name="AutomaticKeymakingCharges" id="AutomaticKeymakingCharges"
                               placeholder="Enter Your Charge Amount"/>
                    </div>
                </div>
            </div>

            <div class="form-group manualkey" style="display:<?php echo $display_7; ?>">
                <label for="password" class="cols-sm-2 control-label">Manual Key Making Charges</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="ManualKeyMakingCharges"
                               value="<?php echo $amount_7; ?>" id="ManualKeyMakingCharges"
                               placeholder="Enter Your Charge Amount"/>
                    </div>
                </div>
            </div>

            <div class="form-group crane" style="display:<?php echo $display_1; ?>">
                <label for="password" class="cols-sm-2 control-label">Crane Service Charges</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="CraneServiceCharges"
                               value="<?php echo $amount_1; ?>" id="CraneServiceCharges"
                               placeholder="Enter Your Charge Amoount"/>
                    </div>
                </div>
            </div>

            <div class="form-group wheelAlign" style="display:<?php echo $display_2; ?>">
                <label for="password" class="cols-sm-2 control-label">Wheel Alignment Charges</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="WheelAlignmentCharges" id="WheelAlignmentCharges"
                               value="<?php echo $amount_2; ?>" placeholder="Enter Your Charge Amount"/>
                    </div>
                </div>
            </div>

            <div class="form-group wheelBal" style="display:<?php echo $display_3; ?>">
                <label for="password" class="cols-sm-2 control-label">Wheel Balancing Charges</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="WheelBalancingCharges"
                               value="<?php echo $amount_3; ?>" id="WheelBalancingCharges"
                               placeholder="Enter Your Charge Amount"/>
                    </div>
                </div>
            </div>
            <?php
            if ($fstr_mechanic_interest == "Not Interested") {
                $checked_1 = "checked";
            } else {
                $checked_1 = "";
            }
            if ($fstr_mechanic_interest == "Interested") {
                $checked_2 = "checked";
            } else {
                $checked_2 = "";
            }
            if ($fstr_mechanic_interest == "Very Much Interested") {
                $checked_3 = "checked";
            } else {
                $checked_3 = "";
            }
            ?>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Interest in Local Mechanic</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                                  <span class="input-group-addon">
                                        <input type="radio" name="intrestinlocalmachanic"
                                               aria-label="..." <?php echo $checked_1; ?> value="Not Interested">
                                  </span>
                        <input type="text" class="form-control" readonly="true" aria-label="..." value="Not Interested">
                        <span class="input-group-addon">
                                        <input type="radio" name="intrestinlocalmachanic"
                                               aria-label="..." <?php echo $checked_2; ?> value="Interested">
                                  </span>
                        <input type="text" class="form-control" readonly="true" aria-label="..." value="Interested">
                        <span class="input-group-addon">
                                        <input type="radio" name="intrestinlocalmachanic"
                                               aria-label="..." <?php echo $checked_3; ?> value="Very Much Interested">
                                  </span>
                        <input type="text" class="form-control" readonly="true" aria-label="..."
                               value="Very Much Interested">
                    </div><!-- /input-group -->

                </div>
            </div>
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Contact Person Name</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="contactPersonName" id="contactPersonName"
                               value="<?php echo $fstr_mechanic_contact_name; ?>"
                               placeholder="Enter Contact Person Name"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Contact Person Mobile No</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" maxlength="10" name="contactPersonMobileNo"
                               value="<?php echo $fnum_mechanic_contact_mobile_number; ?>" id="contactPersonMobileNo"
                               required placeholder="Enter Contact Person Mobile No"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Executive Name</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" required name="executiveName"
                               id="executiveName" <?php echo $fstr_mechanic_executive_name ?>
                               placeholder="Enter Your Executive Name"/>
                    </div>
                </div>
            </div>
            <?php
            if ($ExecuutiveRating == 5 or $ExecuutiveRating == 4 or $ExecuutiveRating == 3 or $ExecuutiveRating == 2 or $ExecuutiveRating == 1) {

                $rdisplay = "block";
            } else {

                $rdisplay = "none";
            }
            ?>
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Execuutive Rating</label>
                <div class="cols-sm-10">
                    <div class="input-group col-md-12">
                                  <span class="input-group-addon">
                                        <input type="radio" name="ExecutiveRating"
                                               class="openRemark" <?php if ($ExecuutiveRating == 5) {
                                            echo "checked";
                                        } ?> aria-label="..." value="5">
                                  </span>
                        <input type="text" class="form-control" readonly="true" aria-label="..." value="Excellent">
                        <span class="input-group-addon">
                                        <input type="radio" name="ExecutiveRating"
                                               class="openRemark" <?php if ($ExecuutiveRating == 4) {
                                            echo "checked";
                                        } ?> aria-label="..." value="4">
                                  </span>
                        <input type="text" class="form-control" readonly="true" aria-label="..." value="Very Good">
                        <span class="input-group-addon">
                                        <input type="radio" name="ExecutiveRating" class="openRemark" aria-label="..."
                                               value="3" <?php if ($ExecuutiveRating == 3) {
                                            echo "checked";
                                        } ?> >
                                  </span>
                        <input type="text" class="form-control" readonly="true" aria-label="..." value="Good">

                    </div>
                    <div class="input-group col-md-6">
                                  <span class="input-group-addon">
                                        <input type="radio" name="ExecutiveRating" class="openRemark" aria-label="..."
                                               value="2" <?php if ($ExecuutiveRating == 2) {
                                            echo "checked";
                                        } ?> >
                                  </span>
                        <input type="text" class="form-control" readonly="true" aria-label="..." value="Ok">
                        <span class="input-group-addon">
                                        <input type="radio" name="ExecutiveRating" class="openRemark" aria-label="..."
                                               value="1" <?php if ($ExecuutiveRating == 1) {
                                            echo "checked";
                                        } ?> >
                                  </span>
                        <input type="text" class="form-control" readonly="true" aria-label="..." value="Bad">
                    </div><!-- /input-group -->
                </div>
            </div>


            <div class="form-group remark" style="display:<?php echo $rdisplay; ?>">
                <label for="password" class="cols-sm-2 control-label">Executive Remark</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="executiveRemark"
                               value="<?php echo $ExecutiveRemark; ?>" id="executiveRemarak"
                               placeholder="Enter Your Executive Remark"/>
                    </div>
                </div>
            </div>

            <?php
            if (!empty($fstr_mechanic_mechanic_picture)) {
                $image_url = $fstr_mechanic_mechanic_picture;
                $div_class = "col-md-8";
                $img_class = "col-sm-10 col-md-4 pull-right";
            } else {
                $image_url = "";
                $div_class = "";
                $img_class = "hide";
            }
            ?>
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Mechanic / Owner Picture</label>
                <div class="row">
                    <div class="col-sm-10 col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="file" class="form-control" name="ownerpicture" id="ownerpicture"/>
                        </div>
                    </div>

                    <div class="<?php echo $img_class ?> ">
                        <img src="<?php echo $image_url; ?>" style="width: 60px; height: 60px; ">
                    </div>
                </div>
            </div>
            <?php
            if (!empty($fstr_mechanic_shop_outside_picture)) {
                $image_url = $fstr_mechanic_shop_outside_picture;
                $div_class = "col-md-8";
                $img_class = "col-sm-10 col-md-4 pull-right";

            } else {
                $image_url = "";
                $div_class = "";
                $img_class = "hide";
            }
            ?>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Shop Outside Picture</label>
                <div class="row">
                    <div class="col-sm-10 col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="file" class="form-control" name="shopoutside" id="shopoutside"/>
                        </div>
                    </div>

                    <div class="<?php echo $img_class ?>">
                        <img src="<?php echo $image_url; ?>" style="width: 60px; height: 60px; ">
                    </div>
                </div>
            </div>
            <?php
            if (!empty($fstr_mechanic_shop_inside_picture)) {
                $image_url = $fstr_mechanic_shop_inside_picture;
                $div_class = "col-md-8";
                $img_class = "col-sm-10 col-md-4 pull-right";

            } else {
                $image_url = "";
                $div_class = "";
                $img_class = "hide";
            }
            ?>
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Shop Inside Picture</label>
                <div class="row">
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="file" class="form-control" name="shopinside" id="shopinside"/>
                        </div>
                    </div>
                    <div class="<?php echo $img_class ?>">
                        <img src="<?php echo $image_url; ?>" style="width: 60px; height: 60px; ">
                    </div>
                </div>
            </div>
            <?php
            if (!empty($fstr_mechanic_other_picture)) {
                $image_url = $fstr_mechanic_other_picture;
                $div_class = "col-md-8";
                $img_class = "col-sm-10 col-md-4 pull-right";

            } else {
                $image_url = "";
                $div_class = "";
                $img_class = "hide";
            }
            ?>
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Other Picture</label>
                <div class="row">
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="file" class="form-control" name="otherpicture" id="otherpicture"/>
                        </div>
                    </div>
                    <div class="<?php echo $img_class ?>">
                        <img src="<?php echo $image_url; ?>" style="width: 60px; height: 60px; ">
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-button">Register
                </button>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#tube").click(function () {
                if ($(this).is(":checked")) {
                    $(".tube").show();
                } else {
                    $(".tube").hide();
                }
            });
            $("#normal").click(function () {
                if ($(this).is(":checked")) {
                    $(".normal").show();
                } else {
                    $(".normal").hide();
                }
            });
            $("#autokey").click(function () {
                if ($(this).is(":checked")) {
                    $(".autokey").show();
                } else {
                    $(".autokey").hide();
                }
            });
            $("#manualkey").click(function () {
                if ($(this).is(":checked")) {
                    $(".manualkey").show();
                } else {
                    $(".manualkey").hide();
                }
            });
            $("#crane").click(function () {
                if ($(this).is(":checked")) {
                    $(".crane").show();
                } else {
                    $(".crane").hide();
                }
            });
            $("#wheelAlign").click(function () {
                if ($(this).is(":checked")) {
                    $(".wheelAlign").show();
                } else {
                    $(".wheelAlign").hide();
                }
            });
            $("#wheelBal").click(function () {
                if ($(this).is(":checked")) {
                    $(".wheelBal").show();
                } else {
                    $(".wheelBal").hide();
                }
            });
            $("#close").click(function () {
                $(".close").css({
                    'display': 'block',
                    'fontSize': '14px',
                    'opacity': '1',
                    'fontWeight': 'normal',
                    'float': 'left'
                });
                $(".ot,.ct").css({'marginTop': '5px'});
            });
            $("#open").click(function () {
                $(".close").css({'display': 'none'});
            });
            $(".openRemark").click(function () {
                $(".remark").css({'display': 'block', 'fontSize': '14px', 'opacity': '1', 'fontWeight': 'normal'});
            });
        });
    </script>
<?php include 'footer.php'; ?>