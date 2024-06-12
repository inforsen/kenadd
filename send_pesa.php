<?php 
require_once 'core/init.php'; 

    $customers_email = $_SESSION['customer_email'];
    $get_customer = $getFromU->view_customer_by_email($customers_email);
    $customer_id = $get_customer->customer_id;
    $c_id = $get_customer->customer_id;
    $email = $get_customer->customer_email;


if (isset($_POST['submitCreate'])) {
        $customer_firstname = $_POST['firstname'];
        $customer_lastname = $_POST['lastname'];
        $customer_email = $_POST['email'];

        $customer_zip = $_POST['zip'];
        $customer_country = $_POST['country'];
        $customer_city = $_POST['city'];

        $customer_contact = $_POST['phone'];
        $customer_address = $_POST['address'];

        $update_customer = $getFromU->update_account($customer_id, $customer_firstname, $customer_lastname, $customer_email, $customer_zip, $customer_country, $customer_city, $customer_contact, $customer_address);

        $payment_option = $_POST['payment-option'];
        $customer_contact = $_POST['phone'];
        $Amount = $_POST['amount'];

        $numb = substr($customer_contact, 1);
        $phone = '254'.$numb;
        $invoice_no = mt_rand(1, 58426).''.$customer_id;

        $ip_add = $getFromU->getRealUserIp();
        $paystatus = "To ship";
        $total = 0;
        $shipping = 0;
        $select_carts = $getFromU->select_products_by_ip($ip_add);
        foreach ($select_carts as $select_cart) {
            $product_id = $select_cart->p_id;
            $product_size = $select_cart->size;
            $product_qty = $select_cart->qty;

            $get_products = $getFromU->viewProductByProductID($product_id);
            foreach ($get_products as $get_product) {
                $product_price = $get_product->product_price;
                $product_title = $get_product->product_title;
                $product_img1 = $get_product->product_img1;
                $sub_total = $product_price * $product_qty;
                $total += $sub_total;        

                require_once 'mpesa/shipping.php';
                $ordertotal = $total + $shipping;
                
                include 'send_mpesa_pay.php';

                $insert_customer_order = $getFromU->create("customer_orders", array("customer_id" => $customer_id, "due_amount" => $ordertotal, "qty" => $product_qty, "size" => $product_size, "invoice_no" => $invoice_no, "order_date" => date("Y-m-d H:i:s"), "order_status" => $paystatus, "image" => $product_img1, "productname" => $product_title, "product_id" => $product_id, "payment_option" => $payment_option));

                $delete_cart = $getFromU->delete_cart($ip_add);
                //include 'mpesa/confirmation_url.php';
                header('Location: index.php?page=order-success', '_self');
              }
            }


    }


  ?>