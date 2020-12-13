<?php
  /**
  * File with function getSetting()
  * @license https://standards.casegames.ch/cgs/0003/v1.txt Case Games Open-Source license
  */
  /**
  * This is a function for the class U.
  * This function adds a content page
  * @see U For more informations about U.
  * @version Pb2.3Bfx0
  * @since Pb2.3Bfx0
  * @param string $content Name of the content
  * @param string $name Name of the content page
  * @param string $code The code of the to saved content
  * @return bool True if succeeded, False if not
  */
  function addPage(string $content, string $name, string $code, int $authorID, date $date, int $online){
    global $U, $USOC;
    // Checks if the name already exists
    $sql = "SELECT * FROM". $USOC->contentHandlers[$content]["Name"] . "WHERE name='" . $name . "';";
    if(mysqli_num_rows(mysqli_query($U->db_link, $sql)) > 0){
      return False;
    }
    $sql = "INSERT INTO " . $USOC->contentHandlers[$content]["Name"] . " (Name, Code, Author, Date, Online) VALUES ('" . $name . "','" . addslashes($code) . "','" . $authorID . "','" . $date . "','" . $online . "');";
    $db_erg = mysqli_query($U->db_link, $sql);
    $sql = "SELECT * FROM". $USOC->contentHandlers[$content]["Name"] . "WHERE name='" . $name . "';";
    $db_erg2 = mysqli_query($U->db_link, $sql);
    if($row = mysqli_fetch_array($db_erg2, MYSQLI_ASSOC)){
      $id = $row["Id"];
    }
    if(!$USOC->contentHandlers[$content]["AddHandler"]($id, ["Name" => $name, "Code" => $code, "Author" => $authorID, "Date" => $date, "Online" => $online])){
      return False;
    }
    return $db_erg;
  }
?>
