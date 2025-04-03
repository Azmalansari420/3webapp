
<?php
foreach($data as $key => $value)
{

?>
<tr>
            <td><?=$key+1 ?></td>
            <td><?=$value->name ?></td>
            <td><?=currency_simble($value->amount) ?></td>
            <td><?=date('d M, Y',strtotime($value->addeddate)) ?></td>
          </tr>
          <?php } ?>