<?php
include 'require/header-qr.php';

include_once ('../config/config.inc.php');
$serial_num = $_GET['id'];

// Fetch QR search record for the given serial number
$QrsearchRec = getAllRecords('qr_search', 'WHERE `serial_num`=?', array($serial_num));
if ($QrsearchRec && is_object($QrsearchRec) && method_exists($QrsearchRec, 'fetch')) {
    while ($QrsearchDetails = $QrsearchRec->fetch(PDO::FETCH_ASSOC)) {
        $serial_number = $QrsearchDetails['serial_num'];
        $model_id      = $QrsearchDetails['model'];
        $m_date        = $QrsearchDetails['m_date'];
        $tbid          = $QrsearchDetails['tbid'];
    }
}
                        
                          
            

if(isset($_POST['submit'])){
    $to = "dharsantkumar1999@gmail.com"; // this is your Email address
    $from = "dharsan@dharsan.in"; // this is the sender's Email address
    $name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    
    $buyer_type = $_POST['last_name'];
    $city = $_POST['email'];
    $state = $_POST['message'];
    $contact = $_POST['contact'];

    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message ="Serial Number : ". $serial_number . "\n\n" . "Model : ". $model_id . "\n\n" . "Manufacturing Date : ". $m_date . "\n\n" . "Name : ". $name . "\n\n"."Buyer Type : " . $buyer_type . "\n\n"."City : " . $city . "\n\n"."State : " . $state . "\n\n"."Contact number : " . $contact ;

    $message2 = "Here is a copy of your message " . $name . "\n\n" . $message;
    

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";

    // You can also use header('Location: thank_you.php'); to redirect to another page.
      $insertvalue = array(
        'user_type' => $buyer_type,
        'user_name' => $name,
        'user_city' => $city,
        'user_state' => $state,
        'user_mobile' => $contact,
        'user_whatsapp' => $contact,
    );
                        
                         if ((($serial_number != '') && ($model_id != '') && ($m_date != ''))){
                         
                             
                             updateRecords('qr_search', $insertvalue, 'tbid',  $tbid, '0');
                             echo "Success".$tbid;
                             echo "<pre>";
                             print_r($insertvalue);
                             echo "</pre>";    } } ?>

                <section class="service_one">
            <div class="container">
                <div class="block-title text-center">
                    <p>Your Pump's Serial Number</p>
                    <h3><?php echo $serial_num?></h3>
                    
                                          <?php
                        $QrsearchRec = getAllRecords('qr_search', 'WHERE `serial_num`=?', array($serial_num));
                        if ($QrsearchRec && is_object($QrsearchRec) && method_exists($QrsearchRec, 'fetch')) {
                            while ($QrsearchDetails = $QrsearchRec->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                <h2><?php echo $QrsearchDetails['model']; ?></h2>
                    
            
                  
                </div>
                <div class="row">
                     
            <div
                    <div class="col-xl-6 col-lg-3 col-md-6 ">
                        <div class="service_1_single wow fadeInUp">
                            <div class="content">
                                <p>Manufactured By</p>
                                <h3>Pioneer Products</h3>
                                 <p>Model Name</p>
                                <h3><?php echo $QrsearchDetails['model']; ?></h3>
                                 <p>Serial Number</p>
                                <h3><?php echo $QrsearchDetails['serial_num']; ?></h3>
                            
                                 <p>Manufactured Date</p>
                                <h3><?php echo $QrsearchDetails['m_date']; ?></h3>
                                 <form action="" method="post" class="contact-one__form">
   <input type="hidden" name="serial_num" placeholder="dharsan">
   <input type="hidden" name="model" placeholder="dharsan">
   <input type="hidden" name="m_date" placeholder="dharsan">
                                    <div >
                                        <p>Your Name</p>
                                        <div class="input-group">
                                            <input type="text" name="first_name" placeholder="Enter Your Name">
                                        </div>
                                    </div>
                                    <div >
                                        <p>Purchase Type</p>
                                        <div class="input-group">
                                            <label for="type" type="text" placeholder="Enter Your Purchase Type">

                                              <select name="last_name" id="type">
                                                    <option value="Consumer">Consumer</option>
                                                    <option value="Farmer">Farmer</option>
                                                    <option value="Plumber">Plumber</option>
                                                    <option value="Electrician">Electrician</option>
                                                    <option value="Dealer">Dealer</option>
                                                    <option value="Distributor">Distributor</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div >
                                        <p>City</p>
                                        <div class="input-group">
                                            <input type="text" name="email" placeholder="Enter Your City">
                                        </div>
                                    </div>
                                    <div >
                                        <p>State</p>
                                        <div class="input-group">
                                            <input type="text" name="message" placeholder="Enter Your State">
                                        </div>
                                    </div>
                                    <div >
                                        <p>Contact number</p>
                                        <div class="input-group">
                                            <input name="contact" placeholder="Enter Contact Number"></input>
                                        </div>
                                    </div>
                                    <div >
                                        <div class="input-group contact__btn">
                                            <input type="submit" name="submit" value="Submit" class="thm-btn contact-one__btn">

                                        </div>
                                    </div>
                               
                            </form>
                            </div>
                               
                           
                        </div>
                    </div>
                    <?php } } ?>
        </section>


        <?php
include 'require/footer.php'
?>