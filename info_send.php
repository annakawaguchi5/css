<?php
$msgkey = msg_get_queue(12341234,0600);
  if(!msg_send($msgkey,12,"test",false))
	echo "失敗";

?>