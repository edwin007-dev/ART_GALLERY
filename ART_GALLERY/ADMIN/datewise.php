<?php
require_once("../DbConnection.php");
$obj=new dboperation();
 $date=$_POST["date"];
 $sqlquery="select c.Name as Customer_name,Package_name,g.Name as Guide_name,Amount
  from tblpayment p INNER join tblbookingrequest b on p.bookingrequest_id=b.Bookingrequest_id
  INNER join tblcustomerreg c on c.Customer_id=b.Customer_id INNER join tblpackage k on k.Package_id=b.Package_id
   INNER join tbltravelguidereg g on g.Travelguide_id=k.Travelguide_id  where p.payment_date='$date'";
$result = $obj->executequery($sqlquery);
$i=1;
$t=0;
?>
<table class="table card-table">
                        <thead>
                            <tr>
                                <th>SI NO:</th>
                                <th>Customer Name</th>
                                <th>Package Name</th>
                                <th>Guide Name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <?php
                         while($display=mysqli_fetch_array($result))
                        {
                        ?>
                            <tr>   
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $display["Customer_name"];?></td>  
                                <td><?php echo $display["Package_name"];?></td>    
                                <td><?php echo $display["Guide_name"];?></td>
                                <td><?php echo $display["Amount"];?></td>
                                <?php $t+= $display["Amount"];?>
                            </tr>
                       <?php     
                        }
?>
                        </tbody>
                    </table>
                    <h1>TOTAL:<?php echo $t ?></h1>