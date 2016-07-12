   <div class="LeftCont">
          
          <?
          
		    $auxCate = new Categoria();
			$drCate = $auxCate->darTodas($catid);
			$cant_record = mysql_num_rows($drCate);
		  ?>
           <ul>
           
           <?
            while($rowCate = mysql_fetch_object($drCate)) {
		   ?>
           
            <div style=" position:relative;font-size:14px; font-weight:bold; color:#090; margin:5px 0px 5px 0px"><?= $rowCate->cat_name?></div> 
           
           <?  $drScategory= $auxCate->darTodas($rowCate->cat_id);
			while($rowSub = mysql_fetch_object($drScategory)) {?>
                     
                   
           <li><a href="r_cart_cate.php?cat=<?= $rowSub->cat_id ?>">
           <?= $rowSub->cat_name ?>
           </a></li>
           
            <?php }     ?>
            
           <?php }     ?>
           
           </ul>
          
          </div>
