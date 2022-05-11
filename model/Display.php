<?php

class Display
{

  public function CreateTable($result, $actionMode)
  {
    //        die(var_dump($actionMode));

    $tableheader = false;
    $html = "";
    $html .= "<table>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      if ($tableheader == false) {
        $html .= "<tr>";
        foreach ($row as $key => $value) {
          $html .= "<th>{$key}</th>";
        }
        if ($actionMode) {
          $html .= "<th colspan=\"3\">Actions</th>";
        }
        $html .= "</tr>";
        $tableheader = true;
      }
      $html .= "<tr>";
      foreach ($row as $value) {
        $html .= "<td>{$value}</td>";
      }
      if ($actionMode) {
        $html .= "<td><a href='index.php?op=update&id={$row['id']}'><i class='fa fa-edit'> Edit</i></a></td>";
        $html .= "<td><a href='index.php?op=delete&id={$row['id']}'><i class='fa fa-trash'> Delete</i></a></td>";
        $html .= "<td><a href='index.php?op=read&id={$row['id']}'><i class='fa fa-eye'></i> Read</a></td>";

      }
      $html .= "</tr>";
    }
    $html .= "</table>";
    $html .= "<a href=\"#\">1 2 3..</a>";
    return $html;
  }


  public function CreateCard($result)
  {
    $result = $result->fetch(PDO::FETCH_ASSOC);

    $html = '';

    $html .= "<div class='card'>";
    $html .= "<img src='view/assets/image/tumb_yes' alt='Avatar' style='width:100%'>";
    $html .= "<div class='container'>";
    $html .= "<h4><b>{$result['name']}</b></h4>";
    $html .= "<p>{$result['phone']}</p>";
    $html .= "<p>{$result['email']}</p>";
    $html .= "<p>{$result['location']}</p>";
  
    $html .= "</div>";
    $html .= "</div>";

    return $html;

  }
  public function createOrderTable($result) {
    $html = "";
    $html .= "<table>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $html .= "<tr>";

      foreach ($row as $value) {
        $html .= "<td>{$value}</td>";
      // echo "<pre>";
      // echo var_dump($row);
      // echo "</pre>";

      // echo $row['product_id'];
        
        $html .= "<td><a href='index.php?op=order&id={$row['product_id']}'><i class='fa fa-edit'>test</i></a></td>";           
      }
      $html .= "</tr>";     
    }
  }

}

      // echo "<pre>";
      // echo var_dump($row);
      // echo "</pre>";

      // echo $row['product_id'];