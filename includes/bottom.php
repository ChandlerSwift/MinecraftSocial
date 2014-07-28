        </div>
      </div>
    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
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
	</script>
  </body>
</html>
