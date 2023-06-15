<!--Section: Contact v.2-->
<?php
require realpath('vendor/autoload.php');

?>


<?php
require realpath('vendor/autoload.php');

use Mail_namespace\Mail;
$mail = new Mail();


$msg = '';

if (isset($_POST['contact_submit']) && !empty($_POST['name'])
&& !empty($_POST['email']) && !empty($_POST['subject'])&& !empty($_POST['message'])) {
    $to = $_POST['email'];
    $subject = $_POST["subject"];
    $name = $_POST["name"];
    $message = $_POST["message"] . "<br>" . "Kind Regards " . "<br>" . $name;


    $mail->send_mail($to, $subject, $message);


}


?>


<div class="container mt-5 ">
    <section class="mb-4">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.</p>

        <div class="row">

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                ?>" method="post">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="name" name="name" class="form-control">
                                <label for="name" class="">Your name</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="email" name="email" class="form-control">
                                <label for="email" class="">Your email</label>
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <input type="text" id="subject" name="subject" class="form-control">
                                <label for="subject" class="">Subject</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                <label for="message">Your message</label>
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->

                    <div class="text-center text-md-left">
                        <button type="submit" name="contact_submit" class="btn btn-primary w-100">SEND</button>
                    </div>

                </form>



            </div>
            <!--Grid column-->



        </div>

    </section>
</div>

<!--Section: Contact v.2-->
