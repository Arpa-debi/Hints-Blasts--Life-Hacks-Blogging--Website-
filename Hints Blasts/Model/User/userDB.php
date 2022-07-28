<?php
class User
{
	public function get_data($username)
	{
		
		$query ="select * from customerreg where UserName='$username' limit 1";
		$DB= new Database();
		$result=$DB->read($query);

		if($result)
		{
			$row=$result[0];
			return $row;
		}
		else
		{
			return false;
		}
}
public function get_users($id){
	$query="select * from customerreg where userid='$id' limit 1";
	$DB=new Database();
	$result=$DB->read($query);

	if($result)
	{
		return $result[0];
	}
	else{
		return false;
	}
}
}
?>



