<?php 
							$pagename=basename($_SERVER['PHP_SELF']);
							$pagenameformated1= str_replace('.php', ' ', $pagename);
							$pagenameformated2= str_replace('_', ' ', $pagenameformated1);
							echo  ucwords("$pagenameformated2");
							?>