<?php
/**
 * Created by PhpStorm.
 * User: Venko
 * Date: 2/17/2016
 * Time: 8:52 PM
 */
?>

<div id="menu3" >
            <a href="#" class="aFloat" onclick="menuClick3();return false;"> <img src="./images/contact.png" alt="image CSS Icon" id="icon_contacts"></a>
            <div id="content-menu3" class="contentInvisible">
                <h1>Contactez moi</h1>
                <div id="contact_form">
                    <form id="form4" action="" method="post">

                        <div>
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" size="30" />
                            <!--   <label class="error" for="name" id="name_error">This field is required.</label>-->
                        </div>
                        <div>
                            <label for="email">Courriel</label>
                            <input type="text" name="email" id="email" size="30" />
                            <!--    <label class="error" for="name" id="email_error">This field is required.</label>-->
                        </div>
                        <div>
                            <label for="message">Message</label>
                            <textarea name="message" id="message" cols="50" rows="6"></textarea>
                            <!--   <label class="error" for="name" id="message_error">This field is required.</label>-->
                        </div>

                        <div><button type="submit" id="submit" name="submit">Envoie</button></div>

                    </form>

                </div>
            </div>
</div>


                <?php
                $to = "silviyagd@gmail.com";
                $subject = "This is subject";

                $message = "<b>This is HTML message.</b>";
                $message .= "<h1>This is headline.</h1>";

                $header = "From:abc@gmail.com \r\n";
                $header = "Cc:afgh@gmail.com \r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type: text/html\r\n";

                $retval = mail ($to,$subject,$message,$header);

                if( $retval == true ) {
                    echo "Message sent successfully...";
                }else {
                    echo "Message could not be sent...";
                }
                ?>
