<?php
class Post{
    public function create_post($userid)
    {
           
             // if(isset($_POST['post'])){
        // echo $_FILES['fileName']['name'];
        // echo $_FILES['fileName']['tmp_name'];
        $fileName = $_FILES['fileName']['name'];
        $tmp_loc = $_FILES['fileName']['tmp_name'];
        $uploadLoc = '../../uploads/'.$fileName;
        if(!empty($fileName) ){
            move_uploaded_file($tmp_loc, $uploadLoc);
            }
            if(file_exists($uploadLoc)){
                $image=$uploadLoc;
            

             $category=$_POST['write'];
            $postt=$_POST['postt'];
            $postid=$this->create_postid();
            
            $query="insert into posts (postid,userid,category,post,image) values ('$postid','$userid','$category','$postt','$image')";
            $DB=new Database();
            $DB->save($query);
             header("location:../../View/User/User_Profile.php");
         }
        }
    

public function get_posts($id){
     $query="select * from posts where userid='$id' order by id desc limit 10";
            $DB=new Database();
            $result=$DB->read($query);

            if($result){

                return $result;
            }
            else{
                return false;
            }
}
public function get_all_posts(){
     $query="select * from posts order by date desc ";
            $DB=new Database();
            $result=$DB->read($query);

            if($result){

                return $result;
            }
            else{
                return false;
            }
}
public function get_cooking_posts(){
     $query="select * from posts where category= 'Cooking' order by date desc ";
            $DB=new Database();
            $result=$DB->read($query);

            if($result){

                return $result;
            }
            else{
                return false;
            }
}
public function get_travel_posts(){
     $query="select * from posts where category= 'Traveling' order by date desc ";
            $DB=new Database();
            $result=$DB->read($query);

            if($result){

                return $result;
            }
            else{
                return false;
            }
}
public function get_tech_posts(){
     $query="select * from posts where category= 'Tech' order by date desc ";
            $DB=new Database();
            $result=$DB->read($query);

            if($result){

                return $result;
            }
            else{
                return false;
            }
}
public function get_other_posts(){
     $query="select * from posts where category= 'Others' order by date desc ";
            $DB=new Database();
            $result=$DB->read($query);

            if($result){

                return $result;
            }
            else{
                return false;
            }
}
private function create_postid(){
    $length=rand(4,19);
    $number="";
    for($i=0;$i<$length;$i++){
        $new_rand=rand(0,9);
        $number=$number.$new_rand;
    }
    return $number;
}

public function like_post($id,$type,$userId){
    if($type=="post"){
        $DB=new Database();
        
        
          $sql="select likes from likes where type='post' && contentid='$id' limit 1";
               $con=$DB->connect();
                $result=mysqli_query($con,$sql);
        //save like details
      
        if(mysqli_num_rows($result)) {
            $row=mysqli_fetch_array($result) ;
              if($row['likes']==0){
                 $del="delete from likes where likes=0";
                   $DB->save($del);
                 $query="update posts set likes =likes+1 where id='$id' limit 1";
        $DB->save($query);
            
            $query="insert into likes (contentid,type,likes) values ('$id','$type',likes+1)";

            $DB->save($query);

              }
              else{
              
              $sql="update posts set likes =likes-1 where id='$id' limit 1";
           
        $DB->save($sql);
            $sql="update likes set likes=likes-1 where type='post' && contentid='$id' limit 1  ";
            $DB->save($sql);
            
             }
         }
               

        
        else{
             $sqll="update posts set likes =likes+1 where id='$id' limit 1";
        $DB->save($sqll);
            
            $sqll="insert into likes (contentid,type,likes) values ('$id','$type',likes+1)";

            $DB->save($sqll);

        }


}

    }
   }


?>