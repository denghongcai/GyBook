<?php>
	session_start();
	require "conn.php";
	
?>
<!DOCTYPE html>
<html lang="zh">
	<?php
		require "head.php";
	?>
	
	<body>
		<!--载入navbar-->
		<?php
			require "navbar.php";
      	?>				
		<div class="container-fluid">
			<div class="row-fluid">
    			<div class="span3">
      				<img src="img/book.png" style=" width: 300px; height: 280px; margin-left: 20%;" alt="Book!">
    			</div>
    			<div class="span9">
    				<div class="margin-search">
      					<form class="form-search form-font" method="get" action="browser.php">
  							<input id="searchinput" name="keyword" type="text" autocomplete="off" class="input-xlarge input-xlarge-style search-query" style="font-size: 120%; width: 320px;" placeholder="请输入书名 or 作者 or 出版社">
  							<button type="submit" class="btn btn-danger btn-large">搜索</button>
						</form>
					</div>
  				</div>
			</div>
			<?php
				require 'footer.php';
			?>
		</div>
		
		<?php
			require "diagframe.php";
			if(!$_SESSION['usrname'])
				selector_diag(1);
			else
				selector_diag(2);
		?>
	
	<!-- 放在文件末尾加快载入速度 -->
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-typeahead-modified.js"></script>
   	<script type="text/javascript" src="js/js_plugin.js" ></script>
	</body>
</html>
