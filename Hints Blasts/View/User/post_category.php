<div id="post1" style="display:flex;margin-top:5%;">
            <?php
            if(file_exists($ROW['image'])){
               $post_image=$ROW['image'];
            }
            ?>
          <img  src="<?php echo $post_image ?>" style="height: 250px; width: 250px; margin-right:1000px;"><p style="font-size: 30px; color:blue;position: absolute; margin-left:30%; ">
               <?php echo $ROW_USER['FirstName']." ".$ROW_USER['LastName']?><br><br>
            <span style="color:black;font-size:17px"><?php echo $ROW['post']?></span><br><br><a href="../../Model/User/likeDb.php?type=post&id=<?php echo $ROW['id']?>" style="color: blue;"><i  class="fa fa-thumbs-up"style="font-size:15px;color:#f731c6;margin-left:10px;"">Likes(<?php echo $ROW['likes']?>) </i></a>  
                        <span style="color:black; size:10px;font-size:13px;"><?php echo $ROW['date']?></span><br>
        </p>
           <br><br>
      </div>

