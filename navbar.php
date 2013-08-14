<div class="navbar  navbar-inverse navbar-fixed-top">
  	<div class="navbar-inner">
   		<div class="container-fluid">
      			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        			<span class="icon-bar">
        			</span>
        			<span class="icon-bar">
        			</span>
        			<span class="icon-bar">
        			</span>
      			</a>
     			<a class="brand" href="../" style="font-size: 32px; color: white; text-shadow: 0 0 20px red;">
       				 BookLib
      			</a>
      			<div class="nav-collapse">
      				<div id="nav-headbar">
        				<ul class="nav" style="font-family: 微软雅黑;">
         					<li class="active">
            					<a href="../">
             						开始
            					</a>
          					</li>
          					<li>
            					<a href="#">
              						关于
            					</a>
          					</li>
          					<li>
            					<a href="#">
              						联系我们
            					</a>
          					</li>
        				</ul>
      				</div>
      				<div id="login_frame">
					<?php
						require "loginframe.php";
						if($_SESSION['usrname'])
							selector_login(1);
						else
							selector_login(2);
					?>
          			</div>
			</div>
      		</div>
    	</div>
</div>