<?php

namespace Sample;

require __DIR__ . '/vendor/autoload.php';
//1. Import the PayPal SDK client that was created in `Set up Server-Side SDK`.
use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
require "paypal-client.php";
$orderID = $_GET['orderID'];

class GetOrder
{

  // 2. Set up your server to receive a call from the client
  /**
   *You can use this function to retrieve an order by passing order ID as an argument.
   */
  public static function getOrder($orderId)
  {
    $client = PayPalClient::client();
    $response = $client->execute(new OrdersGetRequest($orderId));

    //Transaction Information
    $orderID = $response->result->id;
    $email = $response->result->payer->email_address;
    $amount = $response->result->purchase_units[0]->amount->value;
    $name = $response->result->purchase_units[0]->shipping->name->full_name;
    $description = $response->result->purchase_units[0]->description;
    $address_line_1 = $response->result->purchase_units[0]->address->address_line_1;
    $address_line_2 = $response->result->purchase_units[0]->address->address_line_2;
    $admin_area_2 = $response->result->purchase_units[0]->address->admin_area_2;
    $admin_area_1 = $response->result->purchase_units[0]->address->admin_area_1;
    $postal_code = $response->result->purchase_units[0]->address->postal_code;
    $country_code = $response->result->purchase_units[0]->address->country_code;
    $fullAddress = $address_line_1. ", " .$address_line_2. ", ".$admin_area_2. ", ".$admin_area_1. ", ".$postal_code. ", " .$country_code;

    require 'connectpay.php'; 
    $stmt = $conn->prepare("INSERT INTO diasporapay (name, email, orderID, amount, item_name) VALUES(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $orderID, $amount, $description);
    $stmt->execute();
    $stmt->close();
    $conn->close();
            
    } 
}

require 'init.php'; 
$customer_email = $_SESSION['customer_email'];
$get_customer = $getFromU->view_customer_by_email($customer_email);
$customer_id = $get_customer->customer_id;
$customer_firstname = $get_customer->customer_firstname;
$customer_lastname = $get_customer->customer_lastname;
$customer_country = $get_customer->customer_country;
$customer_city = $get_customer->customer_city;
$customer_zip = $get_customer ->customer_zip;
$customer_contact = $get_customer->customer_contact;
$customer_address = $get_customer->customer_address;

$customer_name = $customer_firstname .' '.$customer_lastname;  

$ip_add = $getFromU->getRealUserIp();
$status_link = "To ship";
$total = 0;
$Shipping = 0;
$invoice_no = mt_rand(1, 98989898);
$select_carts = $getFromU->select_products_by_ip($ip_add);
foreach ($select_carts as $select_cart) {
    $product_id = $select_cart->p_id;
    $product_size = $select_cart->size;
    $product_qty = $select_cart->qty;
    $product_price = $select_cart->product_price;

    $get_products = $getFromU->viewProductByProductID($product_id);
    foreach ($get_products as $get_product) {
        $product_title = $get_product->product_title;
        $product_img1 = $get_product->product_img1;
        $sub_total = $product_price * $product_qty;
        $total += $sub_total;

        require_once '../mpesa/shipping.php';

        $order_main_total = $total + $shipping;

        $insert_customer_order = $getFromU->create("customer_orders", array("customer_id" => $customer_id, "due_amount" => $order_main_total, "qty" => $product_qty, "size" => $product_size, "invoice_no" => $invoice_no, "order_date" => date("Y-m-d H:i:s"), "order_status" => $status_link, "image" => $product_img1, "productname" => $product_title, "product_id" => $product_id  ));

            $insert_pending_order = $getFromU->create("pending_orders", array("customer_id" => $customer_id, "invoice_no" => $invoice_no, "product_id" => $product_id, "qty" => $product_qty, "size" => $product_size, "order_status" => $status_link));

            $delete_cart = $getFromU->delete_cart($ip_add);
        
            $to      = $email; // Send email to our user
            $subject = "Your Order Has Been Received"; // Give the email a subject 
            $link = "https://cartsen.com/"; //Give the link
            $headers   = array();
            $headers[] = "MIME-Version: 1.0";
            $headers[] = "Content-type: text/html; charset=iso-8859-1";
            $headers[] = "From: Shop Cartsen.com | Save More. <shop@cartsen.com>";
            $headers[] = "Subject: {$subject}";
            $headers[] = "X-Mailer: PHP/".phpversion(); // Set from headers
            $faq = "https://www.cartsen.com/index.php?page=faq";
            $twitter = "https://twitter.com/cartsen";
            $facebook = "https://facebook.com/cartsen.shopping";
            $instagram = "https://instagram.com/shop_with_cartsen";
            $linkedin = "https://linkedin.com/cartsen";
            $advert = "https://www.cartsen.com/images/s4.png";
            $logo = "https://www.cartsen.com/images/gif.png";
            $meta = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";
            $mega = "https://www.cartsen.com/index.php?page=mega-deals";
            $covid = "https://www.who.int/health-topics/coronavirus";
            $com = "Thank you for shopping with us.";
            $con = "We will contact you when your order has been packaged and is ready for pick up at your mailing address.";
            $logis = "https://www.cartsen.com/index.php?page=logistics";
            $imago = "https://www.cartsen.com/images";
            
            //style you email
            $me_message = "
            
            <html>
            <head>
                <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <meta name='format-detection' content='telephone=no'>
                <meta name='x-apple-disable-message-reformatting'>
                <link rel='stylesheet' href=".$meta.">
            </head>
                <table style='font-family: verdana; font-size: 12px; margin: 0; color: #000; border: 1px solid #eee; width: 100%; margin: auto;'>
                    <div style='width: 90%; margin: auto; background-color: #fff; box-shadow: 1px 2px 40px 1px #d3d3d3;'>
                        <section style='padding: 10px 15px; text-align: center;'>
                            <div>
                                <img style='cursor: pointer; ' href='".$link."' src='".$logo."'>
                            </div>
                            <div style='padding-top: 15px;'>
                                <a href=".$link." style='text-decoration: none; font-weight: 600; margin-right: 18px; color: #006e76; font-size: 12px;'>Market</a>
                                <a href=".$mega." style='text-decoration: none; font-weight: 600; margin-right: 18px; color: green; font-size: 12px;'>Mega deals</a>
                                <a href=".$covid." style='text-decoration: none; font-weight: 600; color: #800000; font-size: 12px;'>COVID-19 Resource</a>
                            </div>
                        </section>
                        <section style='border-top: 1px solid #eee; padding: 20px 25px 10px 25px;'>
                            <p>Dear <span style='color: #006e76;'>".$customer_name."</span>, we have received your order</p>
                            <p>".$com."</p>
                            <p>".$con."</p>
                        </section>
                        <section style='padding: 10px 25px;'>
                            <h3 style='color: #006e76; font-size: 16px; margin: 25px 0;'>Your Information</h3>
                            <p style='margin-top: 10px;'><strong>Invoice Number:</strong><span style='color: #006e76; padding-left: 10px;'>#".$invoice_no."</span></p>
                            <p style='margin-top: 10px;'><strong>Name:</strong><span style='color: #006e76; padding-left: 10px;'>".$customer_name."</span></p>
                            <p style='margin-top: 2px;'><strong>Zip:</strong><span style='color: #006e76; padding-left: 10px;'>".$customer_zip."</span></p>
                            <p style='margin-top: 2px;'><strong>Country:</strong><span style='color: #006e76; padding-left: 10px;'>".$customer_country."</span></p>
                            <p style='margin-top: 2px;'><strong>City:</strong><span style='color: #006e76; padding-left: 10px;'>".$customer_city."</span></p>
                            <p style='margin-top: 2px;'><strong>Contact:</strong><span style='color: #006e76; padding-left: 10px;'>".$customer_contact."</span></p>
                            <p style='margin-top: 2px;'><strong>Address:</strong><span style='color: #006e76; padding-left: 10px;'>".$customer_address."</span></p>
                        </section>
                        <scetion style='margin: 25px 25px;'>
                            <h3 style='color: #006e76; font-size: 16px; text-align: center;'>Below are your order details</h3>
                        </section>

                        <section style='display: flex; margin: auto; width: 80%; padding: 5px 25px; text-align: center; justify-content: space-between; border: 1px solid #eee;'>
                            <div style='width: 400px; text-align: center;'>
                                <img style='width: 72px; height: 72px;' src='".$imago."/".$product_img1."'>
                            </div>
                            <div style='width: 400px; padding-left: 15px; border-left: 1px solid #eee;'>
                                <h4 style='text-align: left; margin: auto; padding-bottom: 12px; font-size: 12px;'>".$product_title."</h4>
                                <p style='margin: auto; color: #3d3d3d; font-size: 12px; text-align: left; font-weight: 600;'>Qty: ".$product_qty."</p>
                                <P style='margin: auto; color: #3d3d3d; font-size: 12px; text-align: left; padding-top: 5px; font-weight: 600;'>Ksh:".number_format($total)."</P>
                            </div>
                        </section>
                        <section style='float: right; width: 37%; margin-left: 60px; padding-left: 20px; margin-right: 42px; font-size: 12px;  color: #3d3d3d;'>
                            <h4 style='margin: auto; padding: 20px 0px 10px 0px;'>Order summary</h4>
                            <div>
                                <p style='line-height: 1px; float: left;'>Subtotal:</p>
                                <p style='line-height: 1px; float: right;'>Ksh ".number_format($total)." </p>
                            </div>
                            <div style='clear: both;'>
                                <p style='line-height: 1px; float: left;'>VAT:</p>
                                <p style='line-height: 1px; float: right;  color: #A0A0A0;'>Ksh ".number_format(($total * 16)/100)."</p>
                            </div>
                            <div style='clear: both; '>
                                <p style='line-height: 1px; float: left;'>Shipping:</p>
                                <p style='line-height: 1px; float: right;'>Ksh ".number_format($shipping)."</p>
                            </div>
                            <div style='clear: both; margin-top: 5px; padding: 5px 0px; border-top: 1px solid #eee;  color: #000; font-weight: 600;'>
                                <p style='line-height: 1px; float: left;'>Total:</p>
                                <p style='line-height: 1px; float: right;'>Ksh ".number_format($total + $shipping)."</p>
                            </div>
                        </section>
                        <section style='padding: 40px 25px 10px 25px; clear: both;'>
                            <p>Want to know more about cartsen logistics? Click <a href=".$logis.">Here</a></p>
                            <p>Have any questions about our services? Click <a href=".$faq.">Here</a></p>
                            <p style='padding-top: 15px;'>Happy Shopping!</p>
                        </section>
                        <section style='background-image: url(".$advert."); height: 250px; background-size: contain; background-repeat: no-repeat; background-position: center;'></section>
                        <footer style='background-color: #f0f8ff; padding: 25px 25px; display: flex;'>
                            <div style='width: 300px;'>
                                <h3>Say hello 👋</h3>
                                <p>Laiboni Center 4th Floor Lenana Road Kilimani 50260 Nairobi, Kenya</p>
                            </div>
                            <div style='margin-left: 50px; width: 450px;'>
                                <div>
                                    <a style='color: #000; font-size: 12px; padding: 10px 20px 50px 0px;' href=".$facebook."><i class='fa fa-facebook'></i></a>
                                    <a style='color: #000; font-size: 12px; padding: 10px 20px 0px 0px;' href=".$twitter."><i class='fa fa-twitter'></i></a>
                                    <a style='color: #000; font-size: 12px; padding: 10px 20px 0px 0px;' href=".$instagram."><i class='fa fa-instagram'></i></a>
                                    <a style='color: #000; font-size: 12px; padding: 10px 0px 0px 0px;' href=".$linkedin."><i class='fa fa-linkedin'></i></a>
                                </div>
                                <div style='margin-top: 15px;'>
                                    <p style='font-size: 12px;'>Phone: 0769 778746 <br>Email: <a href='mailto: shop@cartsen.com' style='text-decoration: none; font-weight: 600; font-size: 12px;'>shop@cartsen.com</a></p>
                                </div>
                            </div>
                        </footer>
                    </div>
                </table>
            </html>
                ";
            
            mail($to, $subject, $me_message, implode("\r\n", $headers));
            

            $to_cartsen      = "festus@cartsen.com, sales@abi-nuzi.co.ke, sales@cartsen.com"; // Send email to our user
            $subject_cartsen = "New Shopping Order"; // Give the email a subject 
            $link = "https://cartsen.com/"; //Give the link
            $headers   = array();
            $headers[] = "MIME-Version: 1.0";
            $headers[] = "Content-type: text/html; charset=iso-8859-1";
            $headers[] = "From: Shop Cartsen.com | Save More. <shop@cartsen.com>";
            $headers[] = "Subject: {$subject_cartsen}";
            $headers[] = "X-Mailer: PHP/".phpversion(); // Set from headers
            $faq = "https://www.cartsen.com/index.php?page=faq";
            $twitter = "https://twitter.com/cartsen";
            $facebook = "https://facebook.com/cartsen.shopping";
            $instagram = "https://instagram.com/shop_with_cartsen";
            $linkedin = "https://linkedin.com/cartsen";
            $advert = "https://www.cartsen.com/images/s4.png";
            $logo = "https://www.cartsen.com/images/gif.png";
            $meta = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";
            $mega = "https://www.cartsen.com/index.php?page=mega-deals";
            $covid = "https://www.who.int/health-topics/coronavirus";
            $com_cartsen = "You have a new shopping order. See details below for work and itinery processing";
            $con_cartsen = "The package is to be delivered to the customer as soon as possible. Reach out to the customers incases of expected delays or any calamity that has occured and would result to a delay of their order processing.";
            $logis = "https://www.cartsen.com/index.php?page=logistics";
            $imago = "https://www.cartsen.com/images";
            
            //style you email
            $emessage = "
            
            <html>
            <head>
                <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <meta name='format-detection' content='telephone=no'>
                <meta name='x-apple-disable-message-reformatting'>
                <link rel='stylesheet' href=".$meta.">
            </head>
                <table style='font-family: verdana; font-size: 12px; margin: 0; color: #000; border: 1px solid #eee; width: 100%; margin: auto;'>
                    <div style='width: 90%; margin: auto; background-color: #fff; box-shadow: 1px 2px 40px 1px #d3d3d3;'>
                        <section style='padding: 10px 15px; text-align: center;'>
                            <div>
                                <img style='cursor: pointer; ' href='".$link."' src='".$logo."'>
                            </div>
                            <div style='padding-top: 15px;'>
                                <a href=".$link." style='text-decoration: none; font-weight: 600; margin-right: 18px; color: #006e76; font-size: 12px;'>Market</a>
                                <a href=".$mega." style='text-decoration: none; font-weight: 600; margin-right: 18px; color: green; font-size: 12px;'>Mega deals</a>
                                <a href=".$covid." style='text-decoration: none; font-weight: 600; color: #800000; font-size: 12px;'>COVID-19 Resource</a>
                            </div>
                        </section>
                        <section style='border-top: 1px solid #eee; padding: 20px 25px 0px 25px;'>
                            <p>You have received an order from <span style='color: #006e76;'>".$customer_name."</span></p>
                            <p>".$com_cartsen."</p>
                            <p>".$con_cartsen."</p>
                        </section>
                        <section style='padding: 10px 25px;'>
                            <h3 style='color: #006e76; font-size: 16px; margin: 25px 0;'>Customer Information</h3>
                            <p style='margin-top: 10px;'><strong>Invoice Number:</strong><span style='color: #006e76; padding-left: 10px;'>#".$invoice_no."</span></p>
                            <p style='margin-top: 10px;'><strong>Name:</strong><span style='color: #006e76; padding-left: 10px;'>".$customer_name."</span></p>
                            <p style='margin-top: 2px;'><strong>Zip:</strong><span style='color: #006e76; padding-left: 10px;'>".$customer_zip."</span></p>
                            <p style='margin-top: 2px;'><strong>Country:</strong><span style='color: #006e76; padding-left: 10px;'>".$customer_country."</span></p>
                            <p style='margin-top: 2px;'><strong>City:</strong><span style='color: #006e76; padding-left: 10px;'>".$customer_city."</span></p>
                            <p style='margin-top: 2px;'><strong>Contact:</strong><span style='color: #006e76; padding-left: 10px;'>".$customer_contact."</span></p>
                            <p style='margin-top: 2px;'><strong>Address:</strong><span style='color: #006e76; padding-left: 10px;'>".$customer_address."</span></p>
                        </section>
                        <scetion style='margin: 25px 25px;'>
                            <h3 style='color: #006e76; font-size: 16px; text-align: center;'>Below are the customer's order details</h3>
                        </section>
                        <section style='display: flex; margin: auto; width: 80%; padding: 5px 25px; text-align: center; justify-content: space-between; border: 1px solid #eee;'>
                            <div style='width: 400px; text-align: center;'>
                                <img style='width: 72px; height: 72px;' src='".$imago."/".$product_img1."'>
                            </div>
                            <div style='width: 400px; padding-left: 15px; border-left: 1px solid #eee;'>
                                <h4 style='text-align: left; margin: auto; padding-bottom: 12px; font-size: 12px;'>".$product_title."</h4>
                                <p style='margin: auto; color: #3d3d3d; font-size: 12px; text-align: left; font-weight: 600;'>Qty: ".$product_qty."</p>
                                <P style='margin: auto; color: #3d3d3d; font-size: 12px; text-align: left; padding-top: 5px; font-weight: 600;'>Ksh:".number_format($sub_total)."</P>
                            </div>
                        </section>
                        <section style='float: right; width: 37%; margin-left: 60px; padding-left: 20px; margin-right: 42px; font-size: 12px;  color: #3d3d3d;'>
                            <h4 style='margin: auto; padding: 20px 0px 10px 0px;'>Order summary</h4>
                            <div>
                                <p style='line-height: 1px; float: left;'>Subtotal:</p>
                                <p style='line-height: 1px; float: right;'>Ksh ".number_format($total)." </p>
                            </div>
                            <div style='clear: both;'>
                                <p style='line-height: 1px; float: left;'>VAT:</p>
                                <p style='line-height: 1px; float: right; color: #A0A0A0;'>Ksh ".number_format(($total * 16)/100)."</p>
                            </div>
                            <div style='clear: both; '>
                                <p style='line-height: 1px; float: left;'>Shipping:</p>
                                <p style='line-height: 1px; float: right;'>Ksh ".number_format($shipping)."</p>
                            </div>
                            <div style='clear: both; margin-top: 5px; padding: 5px 0px; border-top: 1px solid #eee;  color: #000; font-weight: 600;'>
                                <p style='line-height: 1px; float: left;'>Total:</p>
                                <p style='line-height: 1px; float: right;'>Ksh ".number_format($total + $shipping)."</p>
                            </div>
                        </section>
                        <section style='padding: 40px 25px 10px 25px; clear: both;'>
                            <p>Want to know more about cartsen logistics? Click <a href=".$logis.">Here</a></p>
                            <p>Have any questions about our services? Click <a href=".$faq.">Here</a></p>
                            <p style='padding-top: 15px;'>Happy Shopping!</p>
                        </section>
                        <section style='background-image: url(".$advert."); height: 250px; background-size: contain; background-repeat: no-repeat; background-position: center;'></section>
                        <footer style='background-color: #f0f8ff; padding: 25px 25px; display: flex;'>
                            <div style='width: 300px;'>
                                <h3>Say hello 👋</h3>
                                <p>Laiboni Center 4th Floor Lenana Road Kilimani 50260 Nairobi, Kenya</p>
                            </div>
                            <div style='margin-left: 50px; width: 450px;'>
                                <div>
                                    <a style='color: #000; font-size: 12px; padding: 10px 20px 50px 0px;' href=".$facebook."><i class='fa fa-facebook'></i></a>
                                    <a style='color: #000; font-size: 12px; padding: 10px 20px 0px 0px;' href=".$twitter."><i class='fa fa-twitter'></i></a>
                                    <a style='color: #000; font-size: 12px; padding: 10px 20px 0px 0px;' href=".$instagram."><i class='fa fa-instagram'></i></a>
                                    <a style='color: #000; font-size: 12px; padding: 10px 0px 0px 0px;' href=".$linkedin."><i class='fa fa-linkedin'></i></a>
                                </div>
                                <div style='margin-top: 15px;'>
                                    <p style='font-size: 12px;'>Phone: 0769 778746 <br>Email: <a href='mailto: shop@cartsen.com' style='text-decoration: none; font-weight: 600; font-size: 12px;'>shop@cartsen.com</a></p>
                                </div>
                            </div>
                        </footer>
                    </div>
                </table>
            </html>
                ";

        mail($to_cartsen, $subject_cartsen, $emessage, implode("\r\n", $headers)); 
    }
}  

if (!count(debug_backtrace()))
{
  GetOrder::getOrder($orderID, true);
}

header('Location: https://cartsen.com/index.php?page=place-order');
?>