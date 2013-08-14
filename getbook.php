<?php
		require_once ("conn.php");
		$id = $_GET['id'];
		$key = $_GET['keyword'];
		if(!isset($key[0]))
			$result = mysql_query("select * from bookinfo");
		else{
			$array = keywordsplit($key);
			$result = mysql_query("select * from bookinfo where concat(name,author,press,abstract) regexp '$array[0]'");
		}
		$total = mysql_num_rows($result);
		$pagesize = 10;
		$page = ceil($total/$pagesize);
		if(isset($id)){
			if(!isset($key[0])){
				$startPage = $id*$pagesize;
				$query = mysql_query("select * from bookinfo order by id desc limit $startPage,$pagesize");
				while($row = mysql_fetch_array($query)) {
					$name = $row['name'];
					$author = $row['author'];
					$rate = $row['rate'];
					$press = $row['press'];
					$pubdate = date("Y-m-d",$row['pubdate']);
					$abstract = $row['abstract'];
					$isavail = $row['isavail'];
					echo '<tr><td><div class="span2"><a href="#" class="thumbnail"><img src="img/book.png" alt=""></a></div><div class="span6"  style="line-height: 15px;"><h4> <a href="http://book.douban.com/subject/1418999/" title="'.$name.'">'.$name.'</a></h4><p><small>'.$author.' / '.$press.' / '.$pubdate.'</small></p><p><small style="font-size: 70%;">'.$abstract.'</small></p></div></td></tr>';
				}
			}
			else{
				$startPage = $id*$pagesize;
				$query = mysql_query("select * from bookinfo where concat(name,author,press,abstract) regexp '$array[0]' order by id desc limit $startPage,$pagesize");
				while($row = mysql_fetch_array($query)) {
					$name = $row['name'];
					$author = $row['author'];
					$rate = $row['rate'];
					$press = $row['press'];
					$pubdate = date("Y-m-d",$row['pubdate']);
					$abstract = $row['abstract'];
					echo '<tr><td><div class="span2"><a href="#" class="thumbnail"><img src="img/book.png" alt=""></a></div><div class="span6"  style="line-height: 15px;"><h4> <a href="http://book.douban.com/subject/1418999/" title="'.$name.'">'.$name.'</a></h4><p><small>'.$author.' / '.$press.' / '.$pubdate.'</small></p><p><small style="font-size: 70%;">'.$abstract.'</small></p></div></td></tr>';
				}
			}
			mysql_free_result($query);
		}
		function keywordsplit($str) {
			$str = trim($str);
			$str = preg_replace("/[\n\r\t]/", " ", $str);
			$str = preg_replace("/\s(?=\s)/", "", $str);
			return explode(" ",$str);
		}
?>