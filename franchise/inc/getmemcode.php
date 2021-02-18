<?php
session_start();
require_once("dbcn.php");
include("iFunctions.php");
/*$customer_id=iClean($conn,$_GET['val1']);
$q = mysqli_query($conn,"SELECT m_name FROM client_personal_profile where client_id='".$customer_id."'");
if(mysqli_num_rows($q)!=0)
{
$customer_detail=mysqli_fetch_array($q);
?>
<div class="alert alert-info">Member Name: <?php echo $customer_detail['m_name'];?></div>
<?php
}
else
{
    echo "<div class=\"alert alert-danger\">Invalid Member ID</div>";
}*/

if ($_POST['request'] == 1&&!empty($_POST['search'])) 
{
    /*$this->db->like('client_id', $client_id , 'both');
    $this->db->order_by('client_id', 'ASC');
    $this->db->limit(10);
    return $this->db->select('client_id, m_name')->get('client_personal_profile')->result();*/

    $q = mysqli_query($conn,"SELECT client_id, m_name FROM client_personal_profile where client_id LIKE '%".$_POST['search']."%' ORDER BY client_id ASC LIMIT 10");
	if(mysqli_num_rows($q)!=0)
	{
	    while($row=mysqli_fetch_array($q)){
	        $arr_result[] = $row['client_id'];
	    }
	    echo json_encode($arr_result);
	}
}

// Get details
if($_POST['request'] == 2)
{
    $userid = $_POST['userid'];

    $q = mysqli_query($conn,"SELECT * FROM client_personal_profile WHERE client_id = '".$userid."'");
	if(mysqli_num_rows($q)!=0)
	{
	    while($row=mysqli_fetch_array($q)){
            $arr_result[] = array(
                'fullname' => $row['m_name'],
                'email' => $row['m_email'],
                'mobile' => $row['m_mobile'],
                'address' => $row['m_address'],
                'city' => $row['m_city'],
                'state' => $row['m_state'],
                'pin' => $row['m_pin']
            );
        }
            
        echo json_encode($arr_result);
    }
    
}
?>