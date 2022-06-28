<?php
// ================ПОЛУЧЕНИЕ ТОВАРА================
function get_products($category='все',$order='product_date')
{
    global $pdo;
    $category=intval($_GET['category']);
    $order=$_GET['order'];
    $order_f="ASC";
    if ($order=='product_date'): $order_f='DESC'; endif;

    if ($category=='все'){
        $query=$pdo->query("SELECT * FROM `products` LEFT JOIN `category` on category_id=id ORDER BY `$order` $order_f");
    } else {
        $query=$pdo->prepare("SELECT * FROM  `products` LEFT JOIN `category` on category_id=id WHERE `category_id`=? ORDER BY `$order` $order_f");
        $query->execute(array($category));
    }

    while ($row = $query->fetch(PDO::FETCH_LAZY))
                    {
                        echo "<div class='product col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4 text-center'>";
                        echo "<div class='card product_card'>";
                        echo "<img src='/uploads/".$row['product_link']."' class='card-img-top' alt='".$row['product_name']."'>";
                        echo "<div class='card-body'>";
                        echo "<a href='/product.php?id=".intval($row['id_product'])."' class='card-text fw-bold'>";if ($row['product_category']!='Термопринтер'):echo 'Принтер ';endif;echo $row['product_category'].' '.$row['product_name']."</a> <br><span>".$row['product_price']. "₽</span>  <br>";
                        echo "<a href='/product.php?id=".intval($row['id_product'])."' class='btn btn-primary text-uppercase'>Купить</a></div></div></div>\n";
                    }
}

function get_categories(){
    global $pdo;
    $query=$pdo->query("SELECT `product_category` FROM `category");
    echo "<option selected value='все'>Все</option>";
    $i=1;
    while ($row=$query->fetch(PDO::FETCH_LAZY)){
        if (mb_strlen($row['product_category'])>0){
        echo "<option value='$i'>".$row['product_category']."</option>";
        $i++;
        }
    }
}
function get_new_products(){
    global $pdo;
    $query=$pdo->query('SELECT * FROM `products`  ORDER by product_date DESC LIMIT 5');

    while ($row= $query->fetch(PDO::FETCH_LAZY))
    {
        echo "<div class='carousel-item'>\n";
        echo "<div class='card product_card'>\n";
        echo "<img src='uploads/".$row['product_link']."' class='card-img-top' alt='".$row['product_name']."'>";
        echo "<div class='card-body'>";
        echo "<a href='/product.php?id=".intval($row['id_product'])."' class='card-text fw-bold'>";if ($row['product_category']!='Термопринтер'):echo 'Принтер ';endif;echo $row['product_category'].' '.$row['product_name']."</a> <br><span>".$row['product_price']. "₽</span>  <br>";
        echo "<a href='/product.php?id=".intval($row['id_product'])."' class='btn btn-primary text-uppercase'>Купить</a></div></div></div>\n";

    }
}

function get_product_by_id(){
    global $pdo;
    $id=$_POST['id'];
    $query=$pdo->prepare('select * FROM products p LEFT JOIN products_description d ON p.id_product = d.id_product  LEFT JOIN `category` on category_id=id where p.id_product = ?');
    $query->execute(array($id));
    $product=$query->fetch(PDO::FETCH_LAZY);
    echo json_encode($product) ;
}

function main(){
    if (isset($_GET['category']) and isset($_GET['order']))
        get_products();
    if (isset($_POST['id']))
        get_product_by_id();

    if (isset($_POST['new']))
        get_new_products();
    if (isset($_POST['all_categories']))
        get_categories();
    }

?>