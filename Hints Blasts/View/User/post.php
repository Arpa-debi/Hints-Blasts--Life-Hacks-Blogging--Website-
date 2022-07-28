<div id="post1" style="display:flex;margin-top:5%;">
            <?php
            if(file_exists($ROW['image'])){
               $post_image=$ROW['image'];
            }
            ?>
          <img  src="<?php echo $post_image ?>" style="height: 150px; width: 150px; margin-right:1000px;"><p style="font-size: 20px; color:blue;position: absolute; margin-left:50px; ">
               <?php echo $ROW_USER['FirstName']." ".$ROW_USER['LastName']?><br><br>
            <span style="color:black;font-size:17px;margin-left:100px; "><?php echo $ROW['post']?></span><br>

              <a  href="../../Model/User/likeDb.php?type=post&id=<?php echo $ROW['id']?>" style="color: blue;"> <i  class="fa fa-thumbs-up"style="font-size:15px;color:#f731c6;margin-left:180px;"">Likes(<?php echo $ROW['likes']?>) </i></a>  
           
            <span style="color:#999; size:10px;font-size:13px;"><?php echo $ROW['date']?></span><br>
        </p>
           <br><br>
      </div>
