<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
	$logged = "in" ;
} else {
	$logged = "out" ;
}
 include '../includes/config.php';
?>

<?php
$page = "Chat";
include '../includes/top.php'; ?>
			<style>
				body                            { background: url(bg.png); }
				h2                              { margin: 0; padding: 0; color: #fa9f00; font: 30px Helvetica, Sans-Serif; margin: 0 0 10px 0; }
				#page-wrap                      { padding: 0; width: 600px; margin: 30px auto; position: relative; }

				#chat-wrap                      { padding: 0; border: 1px solid #eee; margin: 0 0 15px 0; }
				#chat-area                      { margin: 0; height: 500px; overflow: auto; border: 1px solid #666; padding: 20px; background: white; }
				#chat-area span                 { color: white; background: #333; padding: 4px 8px; -moz-border-radius: 5px; -webkit-border-radius: 8px; margin: 0 5px 0 0; }
				#chat-area p                    { margin: 0; padding: 8px 0; border-bottom: 1px solid #ccc; }

				#name-area                      { margin: 0; padding: 0; position: absolute; top: 12px; right: 0; color: white; font: bold 12px "Lucida Grande", Sans-Serif; text-align: right; }   
				#name-area span                 { margin: 0; padding: 0; color: #fa9f00; }

				#send-message-area p            { margin: 0; float: left; color: white; padding-top: 27px; font-size: 14px; }
				#sendie                         { margin: 0; border: 3px solid #999; width: 460px; padding: 10px; font: 12px "Lucida Grande", Sans-Serif; float: right; }
			</style>
			<div id="page-wrap">
		
				<h2>Live Chat</h2>
				
				<p id="name-area"></p>
				
				<div id="chat-wrap"><div id="chat-area"></div></div>
				
				<form id="send-message-area">
				    <p>Your message: </p>
				    <textarea id="sendie" maxlength = '100' ></textarea>
				</form>
		
			</div>

        </div>
      </div>
    </div>
	<script> var name = "<?php if ($logged == "in") { echo htmlentities($_SESSION['first']) ; } else { echo "Guest" ; } ?>"; </script>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
	<script>
		var setChatInt = setInterval('chat.update()', 1000);
		$('#name-area').html('You are: <span>' + name + '</span>');
	</script>
	<script>
		function serverStatus()
		{
			var xmlhttp = new XMLHttpRequest();
			
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    {
				    document.getElementById	("ServerStatus").innerHTML=xmlhttp.responseText;	
			    }	
			  }	
			xmlhttp.open("GET","/includes/serverinfo.php",true);
			xmlhttp.send();
		}
		serverStatus();
		var setStatusInt = setInterval(serverStatus, 10000);
	</script>
  </body>
</html>
