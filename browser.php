<?php>
	session_start();
?>

<!DOCTYPE html>
<html lang="zh">
	<?php
		require "head.php";
	?>
	<body>
		<link rel="stylesheet" type="text/css" href="css/jquery.paginate.css" />
		<!--载入navbar-->
		<?php
			require "navbar.php";
      	?>				
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span2"></div>
				<div class="span8">
					<table id="pagetxt" class="table table-striped">
						<thead>
    					<tr>
      						<th><h2>浏览</h2></th>
    					</tr>
  						</thead>
						<!--页面内容-->
						<tbody id="list-content"></tbody>
						<tfoot>
							<tr>
								<td colspan="3">
									<div class="pagination" id="pagination" style="margin:4px 0 0 0"></div>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="span2"></div>
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
   	<script type="text/javascript" src="js/jquery.pagination.js" ></script>
   	<script type="text/javascript" >
		$(function(){
			//渲染分页
				$('#pagination').pagination(<?php require_once 'getbook.php'; echo $total; ?>, {
					current_page : 0,
					items_per_page : 10,
					num_display_entries : 5,
					callback : function(page_id){
						//模拟ajax去后端读取页数，获取数据并渲染列表的过程
						$('#list-content').html('');
						$('#list-content').load("getbook.php?id="+page_id
						<?php
							if(isset($_GET['keyword'][0]))
								echo '+"&keyword='.$_GET['keyword'].'"';
						?>
						);
					},
					load_first_page : true,
					prev_text : '上一页',
					next_text : '下一页'
				});
		});
	</script>
	</body>
</html>

		