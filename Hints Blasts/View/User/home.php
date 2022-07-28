<div id="post1" style="display:flex;margin-top:5%;">
            <?php
            if(file_exists($ROW['image'])){
               $post_image=$ROW['image'];
            }
            ?>
          <img  src="<?php echo $post_image ?>" id="travel"><p  id="T1">
               <?php echo $ROW_USER['FirstName']." ".$ROW_USER['LastName']?><br><span style="color:#999; size:10px;font-size:13px;"></span><br>
            <span style="color:black;font-size:17px"><?php echo $ROW['post']?></span><br><a href="../../Model/User/likeDb.php?type=post&id=<?php echo $ROW['id']?>" style="color: blue;"><i  class="fa fa-thumbs-up"style="font-size:15px;color:#f731c6;"">Likes (<?php echo $ROW['likes']?>)</i></a>  
            <span style="color:#999; size:10px;font-size:13px;"><?php echo $ROW['date']?></span><br>
        </p>
           <br><br>
      </div>

