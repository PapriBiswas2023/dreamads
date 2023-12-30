<?php
$userid=getMember($conn,$_SESSION['mid'],'userid');
?>
<?php if($paystatus=='A'){?>
<div class="col-md-6">
<h2 align="center" style="background:#006699;color:#fff;margin:0;padding:6px 0;font-weight:bold;">Reward Report </h2>
<div style="overflow:auto;">
<table class="table table-head-bg-primary mt-1" style="color:#000000;">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">Team_Business</th>
<th align="center">No_Of_Direct</th>
<th align="center">Within_Days</th>
<th align="center">Bonus</th>
<th align="center">Gift</th>
<th align="center">Achievement</th>
</tr>
</thead>
<tbody>
<?php
$table1='un_settings_reward';
$sqla1="SELECT * FROM `un_settings_reward` ORDER BY `id`";
$resa1=query($conn,$sqla1);
$numa1=numrows($resa1);
$i=1;
if($numa1>0)
{
while($fetcha1=fetcharray($resa1))
{
$rewardid=$fetcha1['id'];
?>
<tr>
<td align="center"><?=$i?></td>

<td align="center"><?=$fetcha1['teambusiness']?></td>

<?php if((getNoOfActiveSponsor($conn,$userid))>=$fetcha1['nodirect']){ ?>
<td align="center" style="font-size:16px;font-weight:bold;"><span style="color:#009900;"><?=$fetcha1['nodirect']?></span> / <span style="color:#FF0000;"><?=$fetcha1['nodirect']?></span></td>
<?php }else{ ?>
<td align="center" style="font-size:16px;font-weight:bold;"><span style="color:#009900;"><?=getNoOfActiveSponsor($conn,$userid)?></span> / <span style="color:#FF0000;"><?=$fetcha1['nodirect']?></span></td>
<?php }?>
<td align="center"><?=$fetcha1['withindays']?></td>
<td align="center"><?=$fetcha1['bonus']?></td>
<td align="center"><?=$fetcha1['gift']?></td>
<td align="center"><?php if(getNoRewardAchiever($conn,$userid,$fetcha1['id'])>0){?><span style="color:#00CC66;font-weight:bold;">Completed</span><?php } else { ?><span style="color:#FF0000;font-weight:bold;">Pending</span><?php } ?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="6" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
</div>
</div>
<?php }?>