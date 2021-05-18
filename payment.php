<?php include_once "header.php"; ?>
    <div class="paymentContainer">

    <?php print_r($_SESSION['booking_data']); ?>

    <div class="receipt">
    <h1>Order Summary</h1>
    <div class="payments m-20">
        <table>
            <tr>
                <td><p><b>Sport</b></p></td>
                <td><p><b>Location</b></p></td>
                <td><p><b>Schedule</b></p></td>
                <td><p><b>Price</b></p></td>
            </tr>
            <tr>
            <td><p>Wall Climbing</p></td>
            <td><p>Kathmandu</p></td>
            <td><p>1:00pm</p></td>
            <td><p>$22.00</p></td>
            </tr>
            <tr>
            <td><p>Bungee Jumping</p></td>
            <td><p>Kathmandu</p></td>
            <td><p>1:00pm</p></td>
            <td><p>$22.00</p></td>
            </tr>
            <tr>
            <td><p></p></td>
            <td><p></p></td>
            <td colspan="2" style="background-color: black;font-weight:600;text-align:center;color: white"><p>Total Amount:</p></td>
            <td></td>
            </tr>
            <tr>
            <td><p></p></td>
            <td><p></p></td>
            <td colspan="2" style="font-weight:600;text-align:center"><p>$50</p></td>
            <td></td>
            </tr>
        </table>
        <a class="pay">
            <div>
            <p><i class="fab fa-paypal" style="fontsize:2rem"></i> &nbsp; &nbsp; Pay with Paypal</p>
            </div>
        </a>
    </div>
    </div>
</div>

    <?php include_once "footer.php"; ?>