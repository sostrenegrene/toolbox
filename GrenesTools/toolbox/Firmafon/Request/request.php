<?php
define("FIRMAFON_PUBSUB","https://pubsub.firmafon.dk/faye");
print_r($myself);
$cid = $myself['employee']['company_id'];
?>

<?php /*
<script type="text/javascript">
//https://app.firmafon.dk/api/v2/
var fclient = new Faye.Client('<?=FIRMAFON_PUBSUB?>');
fclient.setHeader("access_token","<?=$getset->header("token")?>");

fclient.subscribe('/call2/company/:<?=$cid?>',function(message) {
	console.log('Message: ' + message.text);
});
</script>
**/
?>