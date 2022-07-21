<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

error_reporting(NULL);
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
$output = '';
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $contactul = $_POST['contact'];

  $check = $_POST['flexCheckChecked'];

  $fileport = $_FILES['fileCV']['tmp_name'];
  $filename = $_FILES['fileCV']['name'];


  if ($check == true) {
    $subscr = "Subscribe";
  } elseif ($check == false) {
    $subscr = "Unubscribe";
  }
  if ($contactul == "1") {
    $tip = "Message";
  } elseif ($contactul == "2") {
    $tip = "Phone";
  } elseif ($contactul == "3") {
    $tip = "Email";
  }

  try {
    $mail->isSMTP();
    $mail->Host = 'in-v3.mailjet.com';
    $mail->SMTPAuth = true;
    $mail->Username = '748d4851fe0c554f2ead0478f5c41e70';
    $mail->Password = 'cf5232c2ebb48ea4686f7f4db6f2423a';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('maria.vasilache02@gmail.com');
    $mail->addAddress('vasilachemaria20@yahoo.com');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Form Submission';
    $mail->Body = "<p>Name : $name <br>Email : $email <br>Message : $message <br> Subscribe: $subscr <br> Contact with: $tip </p>";
    $mail->addAttachment($fileport, $filename);
    $result = $mail->send();
    $output = '<div class="alert alert-success">
                  <h5>Thankyou! for contacting us, Well get back to you soon!</h5>
                </div>';
  } catch (Exception $e) {
    $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
  <header>
  </header>

  <div class="contactform" id="formular">
    <div class="contact container" data-aos="zoom-in">
      <form enctype="multipart/form-data" action="#" method="POST">
        <h1 class="word"></h1>
        <h5><?= $output; ?></h5>

        <h3 class="card-title" data-aos="fade-up">Contact Us</h3>
    </div>
    <div class="card-body px-4 frt">
      <form enctype="multipart/form-data" action="#" method="POST">
        <div class="form-group" data-aos="fade-up">
          <?= $output; ?>
        </div>
        <div class="form-group" data-aos="fade-up">
          <input type="text" name="name" id="name" class="form-control ft" placeholder="Enter Name" required>
          <br></br>
        </div>
        <div class="form-group" data-aos="fade-up">
          <input type="email" name="email" id="email" class="form-control tf" placeholder="Enter E-Mail" required>
          <br></br>
        </div>
        <div class="form-group text-dark " data-aos="fade-up">
          <input type="text" name="subject" id="subject" class="form-control tf" placeholder="Enter Phone Number" required>
          <br></br>
        </div>
        <div class="form-group" data-aos="fade-up">
          <textarea name="message" id="message" rows="5" class="form-control tf" placeholder="Write Your Message" required></textarea>
          <br></br>
        </div>
        <div class="form-check" data-aos="fade-up">

          <label class="form-check-label ttt" for="flexCheckChecked">
            Do you want to subscribe to our newsletter?
            <input type="checkbox" name="flexCheckChecked" id="flexCheckChecked" class="form-check-input tf" checked>
          </label>
        </div>
        <br></br>

        <label data-aos="fade-up">How do you want to be contacted?</label>
        <select class="form-select" aria-label="Default select example" id="contact" name="contact">
          <option value="1">Mesage</option>
          <option value="2">Phone</option>
          <option value="3">Email</option>
        </select>
        <br></br>
        <div class="mb-3" data-aos="fade-up">
          <label for="file">Please attach your CV / resume in PDF format</label>
          <br></br>
          <input type="file" accept='.pdf' name="fileCV" id="fileCV" class="firm-control">
        </div> <br>
        <div class="form-group" data-aos="fade-up">
          <input type="submit" name="submit" value="Send" class="btn btn-danger btn-block" id="sendBtn">

        </div>
        <br></br>
      </form>
    </div>
  </div>


  <footer>

  </footer>

</body>
<script src="js/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
  AOS.init();
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function() {

          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
  });
</script>

<link rel="stylesheet" href="css/font-awesome.min.css">
</body>

</html>

</html>