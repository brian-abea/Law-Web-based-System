<?php include 'config.php'?>
<?php
 $caseid=$_GET['id'];
      $sql = "UPDATE  cases SET active='Closed' where id='$caseid'";
     if ($link->query($sql) === true)    {
      $yourURL="mycases.php";
      echo ("<script>location.href='$yourURL'</script>");
    }
 ?> 