<?php
$userid=getMember($conn,$_SESSION['mid'],'userid');
?>
<div class="col-md-5">
<h2 align="center" style="background:#006699;color:#fff;margin:0;padding:6px 0;font-weight:bold;">Reward Achivers List</h2>
<div style="background:#CCCCCC; overflow:scroll;">
<table class="table table-head-bg-primary mt-1" style="color:#CCCCCC;">
<thead>
<tr align="center">
<th align="center">Sl_No</th>
<th align="center">User_ID</th>
<th align="center">Team</th>
<th align="center">Reward</th>
<th align="center">Date</th>
</tr>
</thead></table>
<marquee scrollamount="2" onMouseOver="this.stop()" 
onMouseOut="this.start()" align="center" style="text-align:center; 
height:250px;" direction="up">
<table class="table table-head-bg-primary mt-1" style="color:#CCCCCC;">
<tbody>
<?php
$sqla="SELECT * FROM `da_member_reward` ORDER BY `id` DESC LIMIT 20";
$resa=query($conn,$sqla);
$numa=numrows($resa);
$i=1;
if($numa>0)
{
while($fetcha=fetcharray($resa))
{
?>
<tr>
<td align="center"><?=$i?></td>
<td align="center"><?=$fetcha['userid']?><br /><?=getMemberUserID($conn,$fetcha['userid'],'name')?></td>
<td align="center"><?=$fetcha['team']?></td>
<td align="center"><?=$fetcha['reward']?></td>
<td align="center"><?=getDateConvert($fetcha['date'])?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="5" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
</marquee>
</div>
</div>

<?php if($paystatus=='A'){?>
<div class="col-md-7">
<h2 align="center" style="background:#006699;color:#fff;margin:0;padding:6px 0;font-weight:bold;">My Reward & Rank Report</h2>
<div style="background:#CCCCCC; overflow:scroll; height:300px;">
<table class="table table-head-bg-primary mt-1" style="color:#000000;">
<thead>
<tr align="center">
<!--<th align="center">Sl_No</th>-->
<th align="center">Level</th>
<th align="center">Rank</th>
<th align="center">Team</th>
<th align="center">Reward</th>
<th align="center">Achiever</th>
</tr>
</thead>
<tbody>
<?php
$table1='da_member';
$sqla1="SELECT * FROM `da_settings_reward` ORDER BY `id`";
$resa1=query($conn,$sqla1);
$numa1=numrows($resa1);
$i=1;
if($numa1>0)
{
while($fetcha1=fetcharray($resa1))
{
$clevel=getCountMatrix($conn,$userid,$table1,$fetcha1['level']);
if($clevel>0)
{
$levelmem=$clevel;
}else{
$levelmem=0;
}
$nolevel=$fetcha1['team'];
?>
<tr>
<!--<td align="center"><?=$i?></td>-->
<td align="center"><?=$fetcha1['level']?></td>
<td align="center"><?=$fetcha1['rank']?></td>
<?php if($levelmem>=$fetcha1['team']){ ?>
<td align="center" style="font-size:16px;font-weight:bold;"><span style="color:#009900;"><?=$fetcha1['team']?></span> / <span style="color:#FF0000;"><?=$fetcha1['team']?></span></td>
<?php }else{?>
<td align="center" style="font-size:16px;font-weight:bold;"><span style="color:#009900;"><?=$levelmem?></span> / <span style="color:#FF0000;"><?=$fetcha1['team']?></span></td>
<?php }?>
<td align="center"><?=$fetcha1['reward']?></td>
<td align="center"><?php if($levelmem>=$nolevel){?><span style="color:#00CC66;font-weight:bold;">Achiever</span><?php } else { ?><span style="color:#FF0000;font-weight:bold;">Non Achiever</span><?php } ?></td>
</tr>
<?php $i++;}}else{?>
<tr><td colspan="6" align="center" style="color:#FF0000;">No Record Found!</td></tr>
<?php }?>
</tbody>
</table>
</div>
</div>

<?php }?>