<?php

include "delivery.php";

$mail =  new DeliveryMail ( "Address1", "Man1", "avia" );
$parcel = new DeliveryParcel ( "Address2", "Man2", 10 );

echo "Delivery time of mail -avia- is " . $mail->getDeliveryTime () . " day(s) <br>";
echo "Delivery time of parcel 10kg is " . $parcel->getDeliveryTime () . " day(s) <br>";

