<?php
session_start();
if(!isset($_SESSION['add'])){
    $_SESSION['add'] = array();
}
if(!isset($_SESSION['comp'])){
    $_SESSION['comp'] = array();
}
?>


<?php
 
if(isset($_POST)){
    $work= $_POST['w'];
    $id=$_POST['id'];
    $removeid = $_POST['removeid'];
    
    $action= $_POST['action'];
    // echo($action);
switch($action){
    case 'add':
    {
        
      addTodo($work);
    }
    break;
    
   case 'comp':
    {
        comp($id);
    }
    break;

    case 'remove':
        {
            remove($removeid);
        }
        break;
}

} 
function addTodo($work)
{   
    if(!isset($_SESSION['add'])){
        $_SESSION['add'] = array();
    }
  $nid = $work;
                  
  
  array_push($_SESSION['add'], $nid);
   echo json_encode($_SESSION['add']);


}

function comp($id){
    for($i = 0; $i<count($_SESSION['add']); $i++){
        if($i == $id){
        array_push($_SESSION['comp'],$_SESSION['add'][$i]);
        array_splice($_SESSION['add'],$i,1);
        echo json_encode($_SESSION['comp']);
        }
    }
    
} 
function remove($removeid){
    for($i = 0; $i<count($_SESSION['add']); $i++){
        if($i == $removeid){
       
        array_splice($_SESSION['add'],$i,1);
        echo json_encode($_SESSION['add']);
        }
    }
}
?>




