<?php 
    function getCommentByProductId ($productId , $limit = 0) {
        $mySQL = "SELECT * FROM comment WHERE id_product = $productId";
        if ($limit > 0) {
            $mySQL.= " LIMIT $limit";
        }
        return get_all($mySQL);
    }
    function addComment ($comment , $idUser , $idProduct) {
        $mySQL = "INSERT INTO comment (content, id_user, id_product , cmt_date)
VALUES ('$comment', '$idUser', '$idProduct' , NOW())";
        insert($mySQL);
    }
?>