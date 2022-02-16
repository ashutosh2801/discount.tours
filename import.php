<?php
error_reporting(E_ALL);
include "includes/config.php";

$status = $message = '';
if(isset($_POST['submit']) && ($_POST['submit']=='Submit') )
{
    $tmp_name   = $_FILES["file"]["tmp_name"];
    $name       = "products_xml/".$_FILES["file"]["name"];

    move_uploaded_file($tmp_name, $name);
    // Load xml file else check connection

    $xml = simplexml_load_file( $name,'SimpleXMLElement', LIBXML_NOCDATA );
    //echo '<pre>'; print_r( $xml ); exit;    
    
    // Assign values
    foreach ($xml->Product as $row) 
    {
        $tour_code          = $row->ProductCode;
        $tour_types         = addslashes($row->ProductType);
        $title              = addslashes($row->ProductName);
        $slug               = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', addslashes($row->ProductName))));
        $description        = addslashes($row->Introduction);
        $extra_info         = addslashes($row->ProductText);
        $location           = addslashes($row->Destination->City);
        $duration           = addslashes($row->Duration);
        $currency           = 'US';
        $original_price     = $row->Pricing->PriceUSD;
        $price_type         = 'person';
        $rating             = floatVal($row->ProductStarRating->AvgRating);
        $tour_thumb         = str_replace("240x160","674x446",$row->ProductImage->ImageURL);
        $country            = addslashes($row->Destination->Country);
        $tour_link          = $row->ProductURLs->ProductURL;

        $Rank               = $row->Rank;
        $SpecialDescription = $row->SpecialDescription;
        $Special            = $row->Special;
        $Commences          = $row->Commences;
        $BookingType        = $row->BookingType;
        $VoucherOption      = $row->VoucherOption;

        $Destination        = $row->Destination;
        $ProductCategories  = $row->ProductCategories->ProductCategory;
        $Pricing            = $row->Pricing;
        
        $cat_slug=[];

        //$sql = "SELECT tour_code FROM tour_tours WHERE tour_code='$tour_code'";
        //$query = $conn->query($sql);
        //if($query->num_rows == 0 ) 
        //{
            //INSERT NEW TOUR DETAIL
            if($Destination->ID) {
                $is_sql_dest = "SELECT Dest_ID FROM tour_destinations WHERE Continent='".addslashes($Destination->Continent)."' AND Country='".addslashes($Destination->Country)."' AND Region='".addslashes($Destination->Region)."' AND City='".addslashes($Destination->City)."'";
                $dest_query = $conn->query($is_sql_dest);
                if( $dest_query->num_rows == 0 ) 
                {
                    $sql_dest = "INSERT INTO tour_destinations(`Dest_ID`, `Continent`, `Country`, `Region`, `City`, `IATACode`) VALUES ('$Destination->ID', '".addslashes($Destination->Continent)."',  '".addslashes($Destination->Country)."',  '".addslashes($Destination->Region)."',  '".addslashes($Destination->City)."',  '".addslashes($Destination->IATACode)."')";
                    $conn->query($sql_dest) or die($conn->error);
                }
            }

            foreach($ProductCategories as $cat)
            {
                $is_sql_cat = "SELECT cat_name FROM tour_category WHERE cat_name='$cat->Category' AND cat_title='$cat->Group' AND cat_sub_title='$cat->Subcategory'";
                $cat_query = $conn->query($is_sql_cat);
                if( $cat_query->num_rows == 0 ) 
                {
                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', addslashes($cat->Category))));
                    $cat_slug[] = $slug;
                    $sql_cat = "INSERT INTO tour_category(`cat_name`, `cat_title`, `cat_sub_title`, `cat_slug`, `cat_status`, `cat_count`, `is_menu`) VALUES ('".addslashes($cat->Category)."', '$cat->Group',  '".addslashes($cat->Subcategory)."',  '$slug',  '1',  '0',  '0')";
                    $conn->query($sql_cat) or die($conn->error);
                }
            }
            
            $category = implode(',',$cat_slug);
            // SQL query to insert data into xml table
            $sql2 = "INSERT INTO tour_tours(`type`, `tour_code`, `category`, `tour_types`, `title`, `slug`, `description`, `extra_info`, `location`, `duration`, `currency`, `original_price`, `price_type`, `rating`, `tour_thumb`, `country`, `tour_link`, `created_on`) 
            VALUES ('viator', '$tour_code', '$category', '$tour_types', '$title', '$slug',  '$description',  '$extra_info',  '$location',  '$duration',  '$currency',  '$original_price',  '$price_type',  '$rating',  '$tour_thumb',  '$country',  '$tour_link',  '".date('Y-m-d H:i:s')."')";
            $query2 = $conn->query($sql2);
            //$result2 = $query2->fetch_object();
            if(!$query2) {
                $message = $conn->error;
                $status = 'alert alert-danger';
                echo $sql2.'<br>';  exit;
            }
            else {
                $tour_id = $conn->insert_id;

                $PricingLabel= ['PriceAUD','PriceNZD','PriceEUR','PriceGBP','PriceUSD','PriceCAD','PriceCHF','PriceNOK','PriceJPY','PriceSEK','PriceHKD','PriceSGD','PriceZAR','PriceINR','PriceTWD'];
                foreach($PricingLabel as $label) 
                {
                    $price = str_replace(array(" ",","),"",$Pricing->$label);
                    $is_sql_price = "SELECT tour_id FROM tour_pricing WHERE lable='$label' AND price='$price' AND tour_id='$tour_id'";
                    $price_query = $conn->query($is_sql_price);
                    if( $price_query->num_rows == 0 ) 
                    {
                        $sql_price = "INSERT INTO tour_pricing(`tour_id`, `lable`, `price`) VALUES ('$tour_id', '$label',  '$price')";
                        $conn->query($sql_price) or die($conn->error);
                    }
                }

                $message = "File uploaded successfully.";
                $status = 'alert alert-success';
            }
        //}
        //else {
            //UPDATE CODE HERE;
            //$category = implode(',',$cat_slug);
            /*$sql2 = "UPDATE tour_tours SET `tour_types`='$tour_types', `title`='$title', `slug`='$slug', `description`='$description', `extra_info`='$extra_info', `location`='$location', `duration`='$duration', `currency`='$currency', `original_price`='$original_price', `price_type`='$price_type', `rating`='$rating', `tour_thumb`='$tour_thumb', `country`='$country', `tour_link`='$tour_link' WHERE `tour_code`='$tour_code'";
            $query2 = $conn->query($sql2);
            if(!$query2) {
                $message = $conn->error;
                $status = 'alert alert-danger';
                echo $sql2.'<br>';  exit;
            }
            else {
                $message = "File uploaded successfully.";
                $status = 'alert alert-success';
            }*/
        //}

    }
    mysqli_close($conn);
}
?>
<html>
    <head>
    <title>Import XML File | Discount Tours </title>
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }
        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 500px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }
    </style>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <body>
        <div id="login">
            <h3 class="text-center text-white pt-5">Login form</h3>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">                   

                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form class="form" action="" method="post" enctype="multipart/form-data">
                                <h3 class="text-center text-info">Upload</h3>
                                <div class="<?php echo $status; ?>"><?php echo $message; ?></div>
                                <div class="form-group">
                                    <label for="file" class="text-info">Upload XML file:</label><br>
                                    <input type="file" name="file" id="file" class="form-control" accept="text/xml">
                                </div>
                                <div class="form-group">
                                    <input name="submit" type="submit" class="btn btn-success" value="Submit" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>