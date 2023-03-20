<?php
function IsChecked($chkname,$value)
    {
        if(!empty($_POST[$chkname]))
        {
            foreach($_POST[$chkname] as $chkval)
            {
                if($chkval == $value)
                {
                    return true;
                }
            }
        }
        return false;
    }


 require_once "php/bd.php";
    $colors = mysqli_query($connection, "SELECT * FROM color");
    $data_from_d = [];
    while ($result = mysqli_fetch_assoc($colors)) {
        $data_from_d[] = $result;
    }
foreach($data_from_d as $color){
    if(IsChecked('formDoor','$color[`name_cr`]')){
        $col_$color[`name_cr`] = "`color`.`name_cr`='$color[`name_cr`]' AND";
    }else{
         $col_$color[`name_cr`] = "";
    }
}

$connections = new PDO('mysql:dbname=shoesmain;host=localhost','root','');
$sth = $connections->prepare("SELECT * FROM `product`, `color` WHERE {$col_$color[`name_cr`]} `product`.`color`=`color`.`id_cr`");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);
?>