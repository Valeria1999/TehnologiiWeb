<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Insert Hard</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../css/ionicons.min.css">  
</head>
<body>
<div class="menu">
    <ul>
      <li class="box-1m"><a href="../index.php"> <i class="ion-ios-home"></i>  Home</a></li>
      <li  class="box-2m"><a href="#"> <i class="ion-arrow-right-b"></i> Insert</a>
          <ul>
              <li> <a href="insertEasy.php"> Easy</a></li>
              <li> <a href="insertMedium.php"> Medium</a></li>
          </ul>
      </li>  
      <li  class="box-3m"><a href="#"> <i class="ion-arrow-right-b"></i>  Update</a>
          <ul>
              <li> <a href="updateEasy.php"> Easy</a></li>
              <li> <a href="updateMedium.php"> Medium</a></li>
              <li> <a href="updateHard.php"> Hard</a></li>
          </ul>
      <li  class="box-4m"><a href="#"> <i class="ion-arrow-right-b"></i>  Delete</a>
          <ul>
              <li> <a href="deleteEasy.php"> Easy</a></li>
              <li> <a href="deleteMedium.php"> Medium</a></li>
              <li> <a href="deleteHard.php"> Hard</a></li>
          </ul>
      </li>           
      </li>       
    </ul>
</div>
<br>
<br>


<div class="padding">      
<div class="columnT">
 <div class="cardT">
  <div id='for-message'></div>
<p class="centerr">Hard questions management [INSERT] </p>
  <div class="table-box">
    <div class="table-row table-head">
      <div class="table-cell ">
        <p>Order</p>
      </div>  
      <div class="table-cell">
        <p>Departament</p>
      </div>
      <div class="table-cell">
        <p>Question</p>
      </div>
      <div class="table-cell">
        <p>V1</p>
      </div>
      <div class="table-cell">
        <p>V2</p>
      </div>
      <div class="table-cell">
        <p>V3</p>
      </div>
      <div class="table-cell">
        <p>Correct</p>
      </div>                                     
    </div>


<div class="table-row"> 
    <form  name='ourForm'>

      <input class="table-cellPut" type="text"  name='order' autocomplete="on" placeholder="Order">

      <input class="table-cellPut" type="text"  name='departament' autocomplete="on" placeholder="Departament">

      <input class="table-cellPut" type="text"  name='question' autocomplete="on" placeholder="Question">

      <input class="table-cellPut" type="text"  name='v1' autocomplete="on" placeholder="Answer1">

      <input class="table-cellPut" type="text"  name='v2' autocomplete="on" placeholder="Answer2">

      <input class="table-cellPut" type="text"  name='v3' autocomplete="on" placeholder="Answer3">

      <input class="table-cellPut last-cell" type="text"  name='corect' autocomplete="on" placeholder="Correct">
      <button class="dws-submit" type="submit" > Insert</button>      
    </form>
</div>

<?php 

  mysql_connect('localhost','root','');
  mysql_select_db('register-bd');
  $level="hard";

$q = mysql_query("SELECT `order` as v_order, departament as d , question as q, var1 as v1, var2 as v2, var3 as v3 , corect as cor FROM question where  level='$level' order by `order` desc " );

    while($result=mysql_fetch_array($q)):
?>    
    <div class="table-row"> 
      <div class="table-cell">
        <p><?php echo $result['v_order'];?></p>
      </div>
      <div class="table-cell">
        <p><?php echo $result['d'];?></p>
      </div>
      <div class="table-cell">
        <p><?php echo $result['q'];?></p>
      </div>
      <div class="table-cell">
        <p><?php echo $result['v1'];?></p>
      </div>
      <div class="table-cell">
        <p><?php echo $result['v2'];?></p>
      </div>
      <div class="table-cell">
        <p><?php echo $result['v3'];?></p>
      </div>  
      <div class="table-cell last-cell">
        <p><?php echo $result['cor'];?></p>
      </div>                                  
    </div>

<?php endwhile; ?>
</div>
</div>
</div>
</div>

<!-- <a class="gotopbtnhome" href="../index.php"><i class="ion-ios-home"></i> </a> -->


<script>
var serverResponse = document.querySelector('#for-message');

document.forms.ourForm.onsubmit = function(e){
    e.preventDefault();
    
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'insertBdHard.php');

    var formData =  new FormData(document.forms.ourForm);

    xhr.onreadystatechange = function()
    {
        if(xhr.readyState===4 && xhr.status===200)
        {
            serverResponse.textContent = xhr.responseText;
            serverResponse.textContent.replace("\n", "");
            serverResponse.textContent.trim();
            console.log(serverResponse.textContent);

            if(serverResponse.textContent==="")
            {
              location.href='insertHard.php';                
            }
        }
    }

    xhr.send(formData);
};
</script>  


</body>
</html>