<?php

  class User {
    protected $pdo;
    protected $state_csv = false;
    public function __construct($pdo)
    {
      $this->pdo = $pdo;
    }

    public function checkInput($var)
    {
      $var = htmlspecialchars($var);
      $var = trim($var);
      $var = stripcslashes($var);
      return $var;
    }

    public function getRealUserIp()
    {
       if ( !empty( $_SERVER['HTTP_CLIENT_IP'] ) )
      {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      }
      elseif( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
      //to check ip passed from proxy
      {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
      }
      else
      {
        $ip = $_SERVER['REMOTE_ADDR'];
      }
      return $ip;
    }

    public function login($customer_email, $customer_pass)
    {
      //$password = md5($password);
      $sql = "SELECT * FROM customers WHERE customer_email = :customer_email AND customer_pass = :customer_pass";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_email", $customer_email, PDO::PARAM_STR);
      $stmt->bindParam(":customer_pass", $customer_pass);
      $stmt->execute();

      $customer = $stmt->fetch();
      $count = $stmt->rowCount();
      if ($count > 0) {
        $_SESSION['customer_email'] = $customer->customer_email;
        header ('location: index.php?page=cart');
      }else {
        return false;
      }
    }


    public function select_products_by_ip($ip_add)
    {
      $sql = "SELECT * FROM cart WHERE ip_add = :ip_add";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":ip_add", $ip_add);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function count_product_by_ip($ip_add)
    {
      $sql = "SELECT * FROM cart WHERE ip_add = :ip_add";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":ip_add", $ip_add);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      return $count;
    }

    public function view_customer_by_email($customer_email)
    {
      $sql = "SELECT * FROM customers WHERE customer_email = :customer_email";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_email", $customer_email);
      $stmt->execute();
      return $stmt->fetch();
    }


    public function viewProductByProductID($product_id)
    {
      $sql = "SELECT * FROM products WHERE product_id = :product_id ";
      $stmt = $this->pdo->prepare($sql);
       $stmt->bindParam(":product_id", $product_id);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function check_customer_by_email($customer_email)
    {
      $sql = "SELECT * FROM customers WHERE customer_email = :customer_email";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_email", $customer_email);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      if ($count > 0) {
        return true;
      }else{
        return false;
      }
    }

    public function view_customersByemail($customer_email)
    {
      $sql = "SELECT * FROM customers WHERE customer_email = :customer_email";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_email", $customer_email);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function update_account($customer_id, $customer_firstname, $customer_lastname, $customer_email, $customer_zip, $customer_country, $customer_city, $customer_contact, $customer_address)
    {
      $sql =  "UPDATE customers SET customer_firstname = :customer_firstname, customer_lastname = :customer_lastname, customer_city = :customer_city, customer_contact = :customer_contact, customer_email = :customer_email, customer_zip = :customer_zip, customer_address= :customer_address, customer_country = :customer_country WHERE customer_id = :customer_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_firstname", $customer_firstname);
      $stmt->bindParam(":customer_lastname", $customer_lastname);
      $stmt->bindParam(":customer_city", $customer_city);
      $stmt->bindParam(":customer_contact", $customer_contact);
      $stmt->bindParam(":customer_email", $customer_email);
      $stmt->bindParam(":customer_zip", $customer_zip);
      $stmt->bindParam(":customer_address", $customer_address);
      $stmt->bindParam(":customer_country", $customer_country);
      $stmt->bindParam(":customer_id", $customer_id);
      $stmt->execute();
    }

    public function create($table, $fields = array())
    {
      $columns = implode(',', array_keys($fields));
      $values  = ':'.implode(', :', array_keys($fields));
      $sql = "INSERT INTO {$table} ({$columns}) VALUES({$values})";
      $stmt = $this->pdo->prepare($sql);

      if ($stmt) {
        foreach ($fields as $key => $data) {
          $stmt->bindValue(':'.$key, $data);
        }
        $stmt->execute();
        return $this->pdo->lastInsertId();
      }
    }

    public function delete_cart($ip_add)
    {
      $sql =  "DELETE FROM cart WHERE ip_add = :ip_add";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":ip_add", $ip_add);
      return $stmt->execute();
    }

    public function view_customer_orders_by_id($customer_id)
    {
      $sql = "SELECT * FROM customer_orders WHERE customer_id = :customer_id ORDER BY 1 DESC LIMIT 15";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_id", $customer_id);
      $stmt->execute();
      return $stmt->fetchAll();
    }

     public function selectFeaturedProducts()
    {
      $sql = "SELECT * FROM products ORDER BY rand() LIMIT 10";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

     public function selectBestSellerProducts()
    {
      $sql = "SELECT * FROM products ORDER BY rand() LIMIT 10";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectViewed($ip_add, $the_product_id)
    {
      $sql = "SELECT * FROM viewed WHERE ip_add = :ip_add AND p_id = :the_product_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":ip_add", $ip_add);
      $stmt->bindParam(":the_product_id", $the_product_id);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      if ($count > 0) {
        return true;
      }else{
        return false;
      }
    }

    public function check_product_by_ip_id($ip_add, $p_id)
    {
      $sql = "SELECT * FROM cart WHERE ip_add = :ip_add AND p_id = :p_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":ip_add", $ip_add);
      $stmt->bindParam(":p_id", $p_id);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      if ($count > 0) {
        return true;
      }else{
        return false;
      }
    }

    public function checkWishByid($c_email, $p_id)
    {
      $sql = "SELECT * FROM wishlist WHERE c_email = :c_email AND p_id = :p_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":c_email", $c_email);
      $stmt->bindParam(":p_id", $p_id);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      if ($count > 0) {
        return true;
      }else{
        return false;
      }
    }

    public function checkProd($ip_add, $the_product_id)
    {
      $sql = "SELECT * FROM cart WHERE ip_add = :ip_add AND p_id = :the_product_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":ip_add", $ip_add);
      $stmt->bindParam(":the_product_id", $the_product_id);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      if ($count > 0) {
        return true;
      }else{
        return false;
      }
    }


    public function delete_from_cart_by_id($product_id, $ip_add)
    {
      $sql =  "DELETE FROM cart WHERE p_id = :product_id AND ip_add = :ip_add";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":product_id", $product_id);
      $stmt->bindParam(":ip_add", $ip_add);
      return $stmt->execute();
    }

    public function update_cart($product_id, $product_qty)
    {
      $sql =  "UPDATE cart SET qty = :quantity WHERE p_id = :productid";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":quantity", $product_qty);
      $stmt->bindParam(":productid", $product_id);
      return $stmt->execute();
    }

     public function selectMostViewed()
    {
      $sql = "SELECT * FROM products LIMIT 3";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function dismas_login($admin_email,$admin_pass){
      $sql="SELECT * FROM admins WHERE admin_email = :admin_email AND admin_pass = :admin_pass";
      $stmt=$this->pdo->prepare($sql);
      $stmt->bindParam(":admin_email",$admin_email,PDO::PARAM_STR);
      $stmt->bindParam(":admin_pass",$admin_pass);
      $stmt->execute();

      $admin=$stmt->fetch();
      $count=$stmt->rowCount();

      if($count>0){
        $_SESSION['admin_email']=$admin->admin_email;
        $_SESSION['admin_login_success_msg']="You are Logged in into Admin Panel";
        header('Location: index.php?page=dashboard');
      }
      else{
        return false;
      }
    }

    public function view_dismas_by_email($admin_email) {
      $sql="SELECT * FROM admins WHERE admin_email = :admin_email";
      $stmt=$this->pdo->prepare($sql);
      $stmt->bindParam(":admin_email",$admin_email);
      $stmt->execute();
      return $stmt->fetch();
    }


    public function countCustomers($table_name) {
      $sql="SELECT * FROM {$table_name}";
      $stmt=$this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }


public function countVendorDashCustomers($table_name,$vendor_id){
$sql="SELECT customer_id FROM {$table_name} WHERE vendor_id = :vendor_id";
$stmt=$this->pdo->prepare($sql);
$stmt->bindParam(":vendor_id",$vendor_id);
$stmt->execute();
return $stmt->fetchAll();
}
public function viewVendorDaCustomerOrders($table_name,$vendor_id){
$sql="SELECT * FROM {$table_name} WHERE vendor_id = :vendor_id";
$stmt=$this->pdo->prepare($sql);
$stmt->bindParam(":vendor_id",$vendor_id);
$stmt->execute();
return $stmt->fetchAll();
}
public function viewCustomerOrders($table_name){
$sql="SELECT * FROM customer_orders";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();
}
public function viewOrderPayments(){
$sql="SELECT SUM(due_amount) FROM customer_orders";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
return true;
}
public function countProductsNum($table_name){
$sql="SELECT * FROM {$table_name}";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();
}
public function countVendorDashProductsNum($table_name,$vendor_id){
$sql="SELECT * FROM {$table_name} WHERE vendor_id = :vendor_id";
$stmt=$this->pdo->prepare($sql);
$stmt->bindParam(":vendor_id",$vendor_id);
$stmt->execute();
return $stmt->fetchAll();
}
public function viewDashboardOrdersFromTable($table_name){
$sql="SELECT * FROM {$table_name}  ORDER BY 1 DESC LIMIT 6";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();
}
public function viewDProductsFromTable($table_name,$start_from,$per_page){
$sql="SELECT * FROM {$table_name} LIMIT $start_from, $per_page";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();
}
public function countProducts($table_name,$per_page){
$sql="SELECT * FROM $table_name";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
$total_records=$stmt->rowCount();
$total_pages=ceil($total_records/$per_page);
return $total_pages;
}
public function viewCustomersFromTables($start_from,$per_page){
$sql="SELECT * FROM customers ORDER BY 1 DESC LIMIT $start_from, $per_page";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();
}
public function viewVendorssFromTables($start_from,$per_page){
$sql="SELECT * FROM vendor ORDER BY 1 DESC LIMIT $start_from, $per_page";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();
}
public function countCustomersNum($table_name,$per_page){
$sql="SELECT * FROM $table_name";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
$total_records=$stmt->rowCount();
$total_pages=ceil($total_records/$per_page);
return $total_pages;
}
public function countCustomerOrders($table_name){
$sql="SELECT * FROM {$table_name}";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();
}
public function viewCustomerOrderss($start_from,$per_page){
$sql="SELECT * FROM customer_orders ORDER BY 1 DESC LIMIT $start_from, $per_page";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();
}
public function countStoreOrders($table_name,$per_page){
$sql="SELECT * FROM $table_name";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
$total_records=$stmt->rowCount();
$total_pages=ceil($total_records/$per_page);
return $total_pages;
}
public function dismas_logout(){
$_SESSION=array();
session_destroy();
header("Location: sign-in-admin.php");
}
public function view_customer_by_id($customer_id){
$sql="SELECT * FROM customers WHERE customer_id = :customer_id";
$stmt=$this->pdo->prepare($sql);
$stmt->bindParam(":customer_id",$customer_id);
$stmt->execute();
return $stmt->fetch();
}
public function view_customer_order_by_order_id($order_id){
$sql="SELECT * FROM customer_orders WHERE order_id = :order_id";
$stmt=$this->pdo->prepare($sql);
$stmt->bindParam(":order_id",$order_id);
$stmt->execute();
return $stmt->fetch();
}
public function countVendorssProductsNum($table_name){
$sql="SELECT * FROM {$table_name} ";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();
}
public function viewVendorsAprrovalsFromTables($table_name,$start_from,$per_page){
$sql="SELECT * FROM {$table_name} LIMIT $start_from, $per_page";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();
}
public function view_Product_By_Product_ID($product_id){
$sql="SELECT * FROM products WHERE product_id = :product_id ";
$stmt=$this->pdo->prepare($sql);
$stmt->bindParam(":product_id",$product_id);
$stmt->execute();
return $stmt->fetch();
}
public function viewHomeProductCategor($table_name,$homecat_id){
$sql="SELECT * FROM {$table_name} WHERE homecat_id = :homecat_id ";
$stmt=$this->pdo->prepare($sql);
$stmt->bindParam(":homecat_id",$homecat_id);
$stmt->execute();
return $stmt->fetchAll();
}

public function viewHomeCatFromTable($table_name){
$sql="SELECT * FROM {$table_name} ORDER BY homecat_name ASC";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();
}
public function viewProductCategor($table_name,$cat_id){
$sql="SELECT * FROM {$table_name} WHERE cat_id = :cat_id ";
$stmt=$this->pdo->prepare($sql);
$stmt->bindParam(":cat_id",$cat_id);
$stmt->execute();
return $stmt->fetchAll();
}
public function viewAllFromTable($table_name){
$sql="SELECT * FROM {$table_name} ORDER BY cat_name ASC";
$stmt=$this->pdo->prepare($sql);
$stmt->execute();
return $stmt->fetchAll();
}






























/*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of products---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectproductsCat()
    {
      $sql = "SELECT * FROM products ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectproductsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectproductsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countproductsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countproductsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewproductsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewproductssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countproductssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }






    
    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of Chairs---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectChairsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'chairs'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectChairsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'chairs' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectChairsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'chairs' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countChairsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'chairs'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countChairsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'chairs'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewChairsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='chairs' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewChairssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='chairs' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countChairssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='chairs' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }



        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of couches---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectcouchesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'couches'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectcouchesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'couches' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectcouchesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'couches' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countcouchesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'couches'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countcouchesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'couches'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewcouchesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='couches' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewcouchessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='couches' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countcouchessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='couches' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of beds---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectbedsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'beds'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectbedsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'beds' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectbedsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'beds' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countbedsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'beds'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countbedsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'beds'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewbedsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='beds' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewbedssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='beds' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countbedssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='beds' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of tables---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selecttablesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'tables'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selecttablesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'tables' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selecttablesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'tables' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function counttablesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'tables'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function counttablesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'tables'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewtablesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='tables' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewtablessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='tables' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function counttablessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='tables' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of desks---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectdesksCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'desks'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectdesksAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'desks' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectdesksAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'desks' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countdesksBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'desks'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countdesksPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'desks'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewdesksBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='desks' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewdeskssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='desks' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countdeskssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='desks' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of stools---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectstoolsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'stools'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectstoolsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'stools' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectstoolsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'stools' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countstoolsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'stools'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countstoolsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'stools'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewstoolsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='stools' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewstoolssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='stools' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countstoolssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='stools' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of dining---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectdiningCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'dining'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectdiningAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'dining' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectdiningAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'dining' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countdiningBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'dining'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countdiningPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'dining'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewdiningBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='dining' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewdiningsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='dining' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countdiningsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='dining' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of ottoman---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectottomanCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'ottoman'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectottomanAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'ottoman' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectottomanAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'ottoman' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countottomanBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'ottoman'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countottomanPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'ottoman'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewottomanBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='ottoman' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewottomansBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='ottoman' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countottomansBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='ottoman' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of dressers---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectdressersCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'dressers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectdressersAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'dressers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectdressersAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'dressers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countdressersBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'dressers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countdressersPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'dressers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewdressersBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='dressers' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewdresserssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='dressers' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countdresserssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='dressers' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of tvstands---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selecttvstandsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'tv-stands'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selecttvstandsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'tv-stands' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selecttvstandsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'tv-stands' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function counttvstandsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'tv-stands'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function counttvstandsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'tv-stands'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewtvstandsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='tv-stands' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewtvstandssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='tv-stands' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function counttvstandssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='tv-stands' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of wallunits---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectwallunitsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'wall units'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectwallunitsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'wall units' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectwallunitsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'wall units' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countwallunitsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'wall units'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countwallunitsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'wall units'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewwallunitsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='wall units' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewwallunitssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='wall units' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countwallunitssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='wall units' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of kidsfurniture---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectkidsfurnitureCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'kids furniture'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectkidsfurnitureAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'kids furniture' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectkidsfurnitureAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'kids furniture' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countkidsfurnitureBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'kids furniture'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countkidsfurniturePage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'kids furniture'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewkidsfurnitureBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='kids furniture' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewkidsfurnituresBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='kids furniture' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countkidsfurnituresBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='kids furniture' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of Animals and pets---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectanimalsandpetsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'Animals and pets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectanimalsandpetsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'Animals and pets' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectanimalsandpetsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'Animals and pets' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countanimalsandpetsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'Animals and pets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countanimalsandpetsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'Animals and pets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewanimalsandpetsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='Animals and pets' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewanimalsandpetssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='Animals and pets' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countanimalsandpetssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='Animals and pets' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of chandeliers---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectchandeliersCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'chandeliers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectchandeliersAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'chandeliers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectchandeliersAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'chandeliers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countchandeliersBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'chandeliers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countchandeliersPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'chandeliers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewchandeliersBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='chandeliers' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewchandelierssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='chandeliers' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countchandelierssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='chandeliers' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of downlights---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectdownlightsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'downlights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectdownlightsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'downlights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectdownlightsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'downlights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countdownlightsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'downlights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countdownlightsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'downlights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewdownlightsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='downlights' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewdownlightssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='downlights' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countdownlightssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='downlights' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of luminaire---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectluminaireCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'luminaire'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectluminaireAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'luminaire' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectluminaireAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'luminaire' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countluminaireBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'luminaire'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countluminairePage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'luminaire'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewluminaireBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='luminaire' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewluminairesBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='luminaire' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countluminairesBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='luminaire' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of scones---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectsconesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'scones'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectsconesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'scones' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectsconesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'scones' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countsconesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'scones'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countsconesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'scones'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewsconesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='scones' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewsconessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='scones' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countsconessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='scones' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of accentlighting---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectaccentlightingCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'accent lighting'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectaccentlightingAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'accent lighting' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectaccentlightingAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'accent lighting' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countaccentlightingBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'accent lighting'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countaccentlightingPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'accent lighting'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewaccentlightingBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='accent lighting' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewaccentlightingsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='accent lighting' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countaccentlightingsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='accent lighting' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of ceilinglights---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectceilinglightsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'ceiling lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectceilinglightsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'ceiling lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectceilinglightsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'ceiling lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countceilinglightsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'ceiling lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countceilinglightsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'ceiling lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewceilinglightsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='ceiling lights' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewceilinglightssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='ceiling lights' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countceilinglightssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='ceiling lights' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of ledstripes---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectledstripesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'led stripes'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectledstripesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'led stripes' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectledstripesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'led stripes' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countledstripesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'led stripes'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countledstripesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'led stripes'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewledstripesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='led stripes' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewledstripessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='led stripes' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countledstripessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='led stripes' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of tracklighting---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selecttracklightingCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'track lighting'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selecttracklightingAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'track lighting' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selecttracklightingAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'track lighting' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function counttracklightingBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'track lighting'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function counttracklightingPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'track lighting'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewtracklightingBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='track lighting' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewtracklightingsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='track lighting' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function counttracklightingsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='track lighting' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of desklights---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectdesklightsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'desk lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectdesklightsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'desk lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectdesklightsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'desk lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countdesklightsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'desk lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countdesklightsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'desk lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewdesklightsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='desk lights' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewdesklightssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='desk lights' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countdesklightssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='desk lights' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of ambientlights---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectambientlightsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'ambient lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectambientlightsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'ambient lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectambientlightsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'ambient lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countambientlightsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'ambient lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countambientlightsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'ambient lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewambientlightsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='ambient lights' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewambientlightssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='ambient lights' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countambientlightssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='ambient lights' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of biaslights---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectbiaslightsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bias lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectbiaslightsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bias lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectbiaslightsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bias lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countbiaslightsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'bias lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countbiaslightsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'bias lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewbiaslightsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='bias lights' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewbiaslightssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='bias lights' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countbiaslightssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='bias lights' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of filllights---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectfilllightsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fill lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectfilllightsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fill lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectfilllightsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fill lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countfilllightsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'fill lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countfilllightsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'fill lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewfilllightsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='fill lights' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewfilllightssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='fill lights' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countfilllightssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='fill lights' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of recessedlights---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectrecessedlightsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'recessed lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectrecessedlightsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'recessed lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectrecessedlightsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'recessed lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countrecessedlightsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'recessed lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countrecessedlightsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'recessed lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewrecessedlightsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='recessed lights' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewrecessedlightssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='recessed lights' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countrecessedlightssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='recessed lights' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of armlights---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectarmlightsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'arm lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectarmlightsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'arm lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectarmlightsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'arm lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countarmlightsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'arm lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countarmlightsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'arm lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewarmlightsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='arm lights' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewarmlightssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='arm lights' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countarmlightssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='arm lights' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of growlights---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectgrowlightsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'grow lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectgrowlightsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'grow lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectgrowlightsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'grow lights' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countgrowlightsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'grow lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countgrowlightsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'grow lights'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewgrowlightsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='grow lights' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewgrowlightssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='grow lights' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countgrowlightssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='grow lights' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of photography---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectphotographyCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'photography'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectphotographyAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'photography' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectphotographyAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'photography' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countphotographyBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'photography'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countphotographyPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'photography'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewphotographyBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='photography' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewphotographysBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='photography' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countphotographysBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='photography' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of printings---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectprintingsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'printings'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectprintingsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'printings' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectprintingsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'printings' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countprintingsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'printings'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countprintingsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'printings'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewprintingsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='printings' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewprintingssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='printings' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countprintingssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='printings' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of etching---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectetchingCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'etching'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectetchingAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'etching' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectetchingAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'etching' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countetchingBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'etching'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countetchingPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'etching'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewetchingBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='etching' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewetchingsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='etching' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countetchingsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='etching' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of linocut---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectlinocutCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'linocut'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectlinocutAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'linocut' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectlinocutAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'linocut' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countlinocutBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'linocut'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countlinocutPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'linocut'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewlinocutBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='linocut' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewlinocutsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='linocut' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countlinocutsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='linocut' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of engraving---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectengravingCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'engraving'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectengravingAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'engraving' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectengravingAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'engraving' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countengravingBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'engraving'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countengravingPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'engraving'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewengravingBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='engraving' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewengravingsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='engraving' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countengravingsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='engraving' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of tapestries---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selecttapestriesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'tapestries'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selecttapestriesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'tapestries' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selecttapestriesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'tapestries' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function counttapestriesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'tapestries'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function counttapestriesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'tapestries'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewtapestriesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='tapestries' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewtapestriessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='tapestries' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function counttapestriessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='tapestries' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of woodart---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectwoodartCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'wood art'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectwoodartAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'wood art' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectwoodartAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'wood art' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countwoodartBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'wood art'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countwoodartPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'wood art'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewwoodartBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='wood art' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewwoodartsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='wood art' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countwoodartsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='wood art' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of screenprints---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectscreenprintsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'screen prints'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectscreenprintsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'screen prints' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectscreenprintsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'screen prints' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countscreenprintsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'screen prints'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countscreenprintsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'screen prints'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewscreenprintsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='screen prints' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewscreenprintssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='screen prints' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countscreenprintssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='screen prints' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of cotton---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectcottonCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cotton'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectcottonAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cotton' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectcottonAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cotton' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countcottonBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'cotton'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countcottonPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'cotton'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewcottonBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='cotton' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewcottonsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='cotton' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countcottonsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='cotton' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of wool---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectwoolCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'wool'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectwoolAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'wool' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectwoolAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'wool' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countwoolBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'wool'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countwoolPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'wool'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewwoolBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='wool' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewwoolsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='wool' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countwoolsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='wool' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of linen---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectlinenCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'linen'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectlinenAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'linen' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectlinenAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'linen' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countlinenBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'linen'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countlinenPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'linen'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewlinenBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='linen' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewlinensBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='linen' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countlinensBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='linen' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of nylon---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectnylonCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'nylon'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectnylonAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'nylon' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectnylonAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'nylon' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countnylonBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'nylon'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countnylonPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'nylon'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewnylonBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='nylon' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewnylonsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='nylon' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countnylonsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='nylon' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }
    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of jute---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectjuteCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'jute'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectjuteAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'jute' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectjuteAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'jute' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countjuteBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'jute'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countjutePage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'jute'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewjuteBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='jute' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewjutesBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='jute' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countjutesBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='jute' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of polyester---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectpolyesterCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'polyester'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectpolyesterAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'polyester' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectpolyesterAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'polyester' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countpolyesterBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'polyester'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countpolyesterPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'polyester'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewpolyesterBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='polyester' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewpolyestersBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='polyester' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countpolyestersBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='polyester' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of acrylicfiber---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectacrylicfiberCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'acrylic fiber'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectacrylicfiberAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'acrylic fiber' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectacrylicfiberAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'acrylic fiber' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countacrylicfiberBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'acrylic fiber'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countacrylicfiberPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'acrylic fiber'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewacrylicfiberBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='acrylic fiber' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewacrylicfibersBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='acrylic fiber' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countacrylicfibersBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='acrylic fiber' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of furniture---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectfurnitureCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'furniture'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectfurnitureAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'furniture' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectfurnitureAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'furniture' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countfurnitureBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'furniture'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countfurniturePage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'furniture'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewfurnitureBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='furniture' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewfurnituresBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='furniture' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countfurnituresBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='furniture' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }
    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of lighting---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectlightingCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'lighting'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectlightingAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'lighting' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectlightingAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'lighting' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countlightingBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'lighting'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countlightingPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'lighting'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewlightingBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='lighting' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewlightingsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='lighting' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countlightingsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='lighting' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of organizers---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectorganizersCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'organizers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectorganizersAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'organizers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectorganizersAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'organizers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countorganizersBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'organizers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countorganizersPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'organizers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function vieworganizersBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='organizers' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function vieworganizerssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='organizers' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countorganizerssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='organizers' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of rugs---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectrugsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'rugs'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectrugsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'rugs' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectrugsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'rugs' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countrugsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'rugs'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countrugsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'rugs'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewrugsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='rugs' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewrugssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='rugs' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countrugssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='rugs' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of fixtures---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectfixturesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fixtures'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectfixturesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fixtures' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectfixturesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fixtures' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countfixturesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'fixtures'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countfixturesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'fixtures'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewfixturesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='fixtures' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewfixturessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='fixtures' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countfixturessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='fixtures' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of artificialplants---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectartificialplantsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'artificial plants'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectartificialplantsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'artificial plants' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectartificialplantsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'artificial plants' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countartificialplantsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'artificial plants'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countartificialplantsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'artificial plants'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewartificialplantsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='artificial plants' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewartificialplantssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='artificial plants' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countartificialplantssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='artificial plants' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of liveplants---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectliveplantsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'live plants'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectliveplantsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'live plants' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectliveplantsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'live plants' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countliveplantsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'live plants'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countliveplantsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'live plants'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewliveplantsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='live plants' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewliveplantssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='live plants' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countliveplantssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='live plants' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }




        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of fluids---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectfluidsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fluids'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectfluidsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fluids' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectfluidsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fluids' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countfluidsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'fluids'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countfluidsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'fluids'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewfluidsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='fluids' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewfluidssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='fluids' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countfluidssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='fluids' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of garage---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectgarageCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'garage'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectgarageAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'garage' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectgarageAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'garage' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countgarageBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'garage'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countgaragePage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'garage'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewgarageBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='garage' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewgaragesBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='garage' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countgaragesBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='garage' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of food---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectfoodCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'food'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectfoodAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'food' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectfoodAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'food' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countfoodBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'food'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countfoodPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'food'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewfoodBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='food' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewfoodsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='food' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countfoodsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='food' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of kitchen---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectkitchenCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'kitchen'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectkitchenAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'kitchen' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectkitchenAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'kitchen' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countkitchenBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'kitchen'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countkitchenPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'kitchen'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewkitchenBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='kitchen' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewkitchensBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='kitchen' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countkitchensBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='kitchen' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of spices---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectspicesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'spices'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectspicesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'spices' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectspicesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'spices' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countspicesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'spices'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countspicesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'spices'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewspicesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='spices' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewspicessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='spices' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countspicessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='spices' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of pots---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectpotsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pots'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectpotsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pots' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectpotsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pots' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countpotsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'pots'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countpotsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'pots'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewpotsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='pots' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewpotssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='pots' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countpotssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='pots' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of pantry---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectpantryCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pantry'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectpantryAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pantry' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectpantryAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pantry' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countpantryBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'pantry'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countpantryPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'pantry'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewpantryBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='pantry' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewpantrysBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='pantry' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countpantrysBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='pantry' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of bathroom---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectbathroomCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bathroom'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectbathroomAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bathroom' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectbathroomAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bathroom' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countbathroomBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'bathroom'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countbathroomPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'bathroom'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewbathroomBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='bathroom' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewbathroomsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='bathroom' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countbathroomsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='bathroom' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of gadgetorganizers---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectgadgetorganizersCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'gadget organizers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectgadgetorganizersAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'gadget organizers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectgadgetorganizersAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'gadget organizers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countgadgetorganizersBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'gadget organizers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countgadgetorganizersPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'gadget organizers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewgadgetorganizersBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='gadget organizers' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewgadgetorganizerssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='gadget organizers' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countgadgetorganizerssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='gadget organizers' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of bedroomorganizers---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectbedroomorganizersCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bedroom organizers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectbedroomorganizersAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bedroom organizers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectbedroomorganizersAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bedroom organizers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countbedroomorganizersBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'bedroom organizers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countbedroomorganizersPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'bedroom organizers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewbedroomorganizersBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='bedroom organizers' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewbedroomorganizerssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='bedroom organizers' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countbedroomorganizerssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='bedroom organizers' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of closetsandorganizers---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectclosetsandorganizersCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'closets and organizers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectclosetsandorganizersAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'closets and organizers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectclosetsandorganizersAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'closets and organizers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countclosetsandorganizersBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'closets and organizers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countclosetsandorganizersPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'closets and organizers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewclosetsandorganizersBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='closets and organizers' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewclosetsandorganizerssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='closets and organizers' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countclosetsandorganizerssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='closets and organizers' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of cabinetstorages---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectcabinetstoragesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cabinet storages'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectcabinetstoragesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cabinet storages' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectcabinetstoragesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cabinet storages' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countcabinetstoragesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'cabinet storages'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countcabinetstoragesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'cabinet storages'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewcabinetstoragesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='cabinet storages' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewcabinetstoragessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='cabinet storages' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countcabinetstoragessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='cabinet storages' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of petclothing---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectpetclothingCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pet clothing'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectpetclothingAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pet clothing' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectpetclothingAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pet clothing' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countpetclothingBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'pet clothing'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countpetclothingPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'pet clothing'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewpetclothingBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='pet clothing' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewpetclothingsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='pet clothing' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countpetclothingsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='pet clothing' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of petbeds---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectpetbedsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pet beds'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectpetbedsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pet beds' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectpetbedsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pet beds' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countpetbedsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'pet beds'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countpetbedsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'pet beds'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewpetbedsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='pet beds' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewpetbedssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='pet beds' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countpetbedssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='pet beds' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of petleashes---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectpetleashesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pet leashes'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectpetleashesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pet leashes' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectpetleashesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pet leashes' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countpetleashesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'pet leashes'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countpetleashesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'pet leashes'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewpetleashesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='pet leashes' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewpetleashessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='pet leashes' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countpetleashessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='pet leashes' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of petbirds---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectpetbirdsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pet birds'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectpetbirdsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pet birds' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectpetbirdsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'pet birds' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countpetbirdsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'pet birds'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countpetbirdsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'pet birds'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewpetbirdsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='pet birds' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewpetbirdssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='pet birds' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countpetbirdssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='pet birds' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of smallpets---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectsmallpetsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'small pets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectsmallpetsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'small pets' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectsmallpetsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'small pets' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countsmallpetsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'small pets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countsmallpetsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'small pets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewsmallpetsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='small pets' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewsmallpetssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='small pets' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countsmallpetssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='small pets' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of dogcollars---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectdogcollarsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'dog collars'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectdogcollarsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'dog collars' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectdogcollarsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'dog collars' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countdogcollarsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'dog collars'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countdogcollarsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'dog collars'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewdogcollarsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='dog collars' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewdogcollarssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='dog collars' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countdogcollarssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='dog collars' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of sinks---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectsinksCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'sinks'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectsinksAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'sinks' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectsinksAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'sinks' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countsinksBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'sinks'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countsinksPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'sinks'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewsinksBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='sinks' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewsinkssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='sinks' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countsinkssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='sinks' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of faucets---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectfaucetsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'faucets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectfaucetsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'faucets' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectfaucetsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'faucets' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countfaucetsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'faucets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countfaucetsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'faucets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewfaucetsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='faucets' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewfaucetssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='faucets' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countfaucetssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='faucets' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of cookware---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectcookwareCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cookware'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectcookwareAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cookware' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectcookwareAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cookware' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countcookwareBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'cookware'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countcookwarePage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'cookware'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewcookwareBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='cookware' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewcookwaresBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='cookware' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countcookwaresBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='cookware' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of accessories---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectaccessoriesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'accessories'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectaccessoriesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'accessories' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectaccessoriesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'accessories' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countaccessoriesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'accessories'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countaccessoriesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'accessories'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewaccessoriesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='accessories' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewaccessoriessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='accessories' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countaccessoriessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='accessories' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of cutlery---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectcutleryCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cutlery'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectcutleryAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cutlery' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectcutleryAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cutlery' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countcutleryBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'cutlery'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countcutleryPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'cutlery'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewcutleryBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='cutlery' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewcutlerysBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='cutlery' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countcutlerysBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='cutlery' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of ovens---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectovensCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'ovens'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectovensAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'ovens' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectovensAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'ovens' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countovensBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'ovens'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countovensPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'ovens'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewovensBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='ovens' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewovenssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='ovens' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countovenssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='ovens' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of kitchenhoods---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectkitchenhoodsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'kitchen hoods'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectkitchenhoodsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'kitchen hoods' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectkitchenhoodsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'kitchen hoods' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countkitchenhoodsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'kitchen hoods'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countkitchenhoodsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'kitchen hoods'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewkitchenhoodsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='kitchen hoods' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewkitchenhoodssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='kitchen hoods' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countkitchenhoodssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='kitchen hoods' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of wastecontainers---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectwastecontainersCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'waste containers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectwastecontainersAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'waste containers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectwastecontainersAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'waste containers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countwastecontainersBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'waste containers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countwastecontainersPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'waste containers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewwastecontainersBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='waste containers' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewwastecontainerssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='waste containers' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countwastecontainerssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='waste containers' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of fittingsandhandles---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectfittingsandhandlesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fittings and handles'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectfittingsandhandlesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fittings and handles' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectfittingsandhandlesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fittings and handles' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countfittingsandhandlesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'fittings and handles'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countfittingsandhandlesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'fittings and handles'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewfittingsandhandlesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='fittings and handles' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewfittingsandhandlessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='fittings and handles' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countfittingsandhandlessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='fittings and handles' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of bathtubs---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectbathtubsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bathtubs'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectbathtubsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bathtubs' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectbathtubsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bathtubs' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countbathtubsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'bathtubs'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countbathtubsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'bathtubs'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewbathtubsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='bathtubs' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewbathtubssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='bathtubs' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countbathtubssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='bathtubs' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of toilets---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selecttoiletsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'toilets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selecttoiletsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'toilets' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selecttoiletsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'toilets' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function counttoiletsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'toilets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function counttoiletsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'toilets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewtoiletsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='toilets' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewtoiletssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='toilets' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function counttoiletssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='toilets' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of paperholders---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectpaperholdersCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'paper holders'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectpaperholdersAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'paper holders' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectpaperholdersAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'paper holders' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countpaperholdersBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'paper holders'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countpaperholdersPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'paper holders'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewpaperholdersBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='paper holders' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewpaperholderssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='paper holders' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countpaperholderssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='paper holders' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of fittings---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectfittingsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fittings'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectfittingsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fittings' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectfittingsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'fittings' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countfittingsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'fittings'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countfittingsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'fittings'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewfittingsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='fittings' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewfittingssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='fittings' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countfittingssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='fittings' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of wallmountsandcabinets---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectwallmountsandcabinetsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'wall mounts and cabinets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectwallmountsandcabinetsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'wall mounts and cabinets' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectwallmountsandcabinetsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'wall mounts and cabinets' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countwallmountsandcabinetsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'wall mounts and cabinets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countwallmountsandcabinetsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'wall mounts and cabinets'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewwallmountsandcabinetsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='wall mounts and cabinets' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewwallmountsandcabinetssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='wall mounts and cabinets' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countwallmountsandcabinetssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='wall mounts and cabinets' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of mirrors---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectmirrorsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'mirrors'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectmirrorsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'mirrors' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectmirrorsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'mirrors' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countmirrorsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'mirrors'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countmirrorsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'mirrors'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewmirrorsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='mirrors' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewmirrorssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='mirrors' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countmirrorssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='mirrors' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of showers---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectshowersCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'showers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectshowersAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'showers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectshowersAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'showers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countshowersBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'showers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countshowersPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'showers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewshowersBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='showers' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewshowerssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='showers' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countshowerssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='showers' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of shelves---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectshelvesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'shelves'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectshelvesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'shelves' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectshelvesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'shelves' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countshelvesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'shelves'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countshelvesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'shelves'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewshelvesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='shelves' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewshelvessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='shelves' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countshelvessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='shelves' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of dispensers---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectdispensersCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'dispensers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectdispensersAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'dispensers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectdispensersAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'dispensers' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countdispensersBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'dispensers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countdispensersPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'dispensers'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewdispensersBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='dispensers' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewdispenserssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='dispensers' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countdispenserssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='dispensers' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of curtains---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectcurtainsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'curtains'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectcurtainsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'curtains' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectcurtainsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'curtains' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countcurtainsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'curtains'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countcurtainsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'curtains'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewcurtainsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='curtains' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewcurtainssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='curtains' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countcurtainssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='curtains' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of robhooks---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectrobhooksCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'rob hooks'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectrobhooksAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'rob hooks' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectrobhooksAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'rob hooks' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countrobhooksBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'rob hooks'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countrobhooksPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'rob hooks'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewrobhooksBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='rob hooks' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewrobhookssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='rob hooks' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countrobhookssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='rob hooks' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of towelrings---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selecttowelringsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'towel rings'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selecttowelringsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'towel rings' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selecttowelringsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'towel rings' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function counttowelringsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'towel rings'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function counttowelringsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'towel rings'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewtowelringsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='towel rings' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewtowelringssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='towel rings' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function counttowelringssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='towel rings' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of soapdishes---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectsoapdishesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'soap dishes'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectsoapdishesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'soap dishes' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectsoapdishesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'soap dishes' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countsoapdishesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'soap dishes'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countsoapdishesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'soap dishes'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewsoapdishesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='soap dishes' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewsoapdishessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='soap dishes' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countsoapdishessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='soap dishes' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of toothbrushholders---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selecttoothbrushholdersCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'toothbrush holders'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selecttoothbrushholdersAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'toothbrush holders' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selecttoothbrushholdersAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'toothbrush holders' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function counttoothbrushholdersBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'toothbrush holders'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function counttoothbrushholdersPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'toothbrush holders'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewtoothbrushholdersBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='toothbrush holders' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewtoothbrushholderssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='toothbrush holders' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function counttoothbrushholderssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='toothbrush holders' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of hotels---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selecthotelsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'hotels'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selecthotelsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'hotels' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selecthotelsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'hotels' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function counthotelsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'hotels'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function counthotelsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'hotels'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewhotelsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='hotels' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewhotelssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='hotels' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function counthotelssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='hotels' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of cottages---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectcottagesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cottages'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectcottagesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cottages' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectcottagesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'cottages' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countcottagesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'cottages'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countcottagesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'cottages'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewcottagesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='cottages' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewcottagessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='cottages' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countcottagessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='cottages' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of apartments---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectapartmentsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'apartments'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectapartmentsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'apartments' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectapartmentsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'apartments' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countapartmentsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'apartments'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countapartmentsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'apartments'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewapartmentsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='apartments' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewapartmentssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='apartments' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countapartmentssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='apartments' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of motels---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectmotelsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'motels'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectmotelsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'motels' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectmotelsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'motels' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countmotelsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'motels'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countmotelsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'motels'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewmotelsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='motels' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewmotelssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='motels' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countmotelssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='motels' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of chalet---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectchaletCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'chalet'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectchaletAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'chalet' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectchaletAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'chalet' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countchaletBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'chalet'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countchaletPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'chalet'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewchaletBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='chalet' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewchaletsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='chalet' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countchaletsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='chalet' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of bungalow---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectbungalowCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bungalow'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectbungalowAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bungalow' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectbungalowAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'bungalow' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countbungalowBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'bungalow'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countbungalowPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'bungalow'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewbungalowBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='bungalow' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewbungalowsBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='bungalow' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countbungalowsBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='bungalow' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of homestays---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selecthomestaysCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'homestays'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selecthomestaysAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'homestays' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selecthomestaysAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'homestays' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function counthomestaysBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'homestays'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function counthomestaysPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'homestays'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewhomestaysBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='homestays' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewhomestayssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='homestays' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function counthomestayssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='homestays' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of lodgings---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectlodgingsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'lodgings'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectlodgingsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'lodgings' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectlodgingsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'lodgings' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countlodgingsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'lodgings'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countlodgingsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'lodgings'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewlodgingsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='lodgings' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewlodgingssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='lodgings' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countlodgingssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='lodgings' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of guesthouses---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectguesthousesCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'guest houses'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectguesthousesAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'guest houses' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectguesthousesAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'guest houses' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countguesthousesBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'guest houses'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countguesthousesPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'guest houses'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewguesthousesBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='guest houses' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewguesthousessBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='guest houses' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countguesthousessBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='guest houses' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


        /*-----------------------------------------------------------------------------------------------
    ---------------------------------------Start of boutiquehotels---------------------------------------------------------------
    -------------------------------------------------------------------------*/

    public function selectboutiquehotelsCat()
    {
      $sql = "SELECT * FROM products WHERE product_category = 'boutique hotels'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectboutiquehotelsAll($minimum, $maximum)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'boutique hotels' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*public function selectboutiquehotelsAll($minimum, $maximum, $start_from, $per_page)
    {
      $sql = "SELECT * FROM products WHERE product_category = 'boutique hotels' AND product_price BETWEEN {$minimum} AND {$maximum} ORDER BY product_id  LIMIT $start_from, $per_page";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }*/

    public function countboutiquehotelsBrand($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'boutique hotels'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countboutiquehotelsPage($table_name, $per_page)
    {
      $sql = "SELECT * FROM $table_name WHERE product_category = 'boutique hotels'";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }


    public function viewboutiquehotelsBrand($table_name, $brand_filter)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='boutique hotels' AND brand_name IN('$brand_filter')";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->bindParam(":brand_filter", $brand_filter);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewboutiquehotelssBrand($table_name)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_category ='boutique hotels' ORDER BY brand_name";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countboutiquehotelssBrand($table_name, $brandname)
    {
      $sql = "SELECT * FROM {$table_name} WHERE product_type_one ='boutique hotels' AND brand_name = :brandname";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":brandname", $brandname);
      $stmt->execute();

      return $stmt->fetchAll();
    }


}