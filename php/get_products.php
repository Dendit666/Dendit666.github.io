<?php
require('requirements.php');

// ================ПОЛУЧЕНИЕ ТОВАРА================
function get_products($order='ASC')
{
    global $pdo;
    $order= ($_POST['order_by']=="ASC")?"ASC":"DESC";
    $query=$pdo->query("SELECT * FROM `goods` ORDER BY `price` $order");
    while ($row = $query->fetch(PDO::FETCH_LAZY))
                    {
                        echo "<div class='col-12 col-lg-4 col-md-6 mb-3'>
                    <div class='card' style='width: 18rem; margin:0 auto;'>
                        <img src='https://via.placeholder.com/300' class='card-img-top' alt=".$row['good'].">
                        <div class='card-body'>
                            <h5 class='card-title product_name'> ".$row['good']."</h5>
                            <p class='card-text product_price'>".$row['price']."$</p>
                            <button href='#' class='btn btn-primary product_buy'>Купить</button>
                        </div>
                    </div>
                </div>";
                    }
}
get_products();

?>