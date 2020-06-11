<style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:100px;
   }
  </style>
  
  <div class="row" >
      <div  id="partiadmin" class="partiadmin col-10 col-sm-4 col-md-4" > 
         <div class="row" id="tableau" > 
         
    <table  class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>Id</th>
                <th>Prenom</th>
                <th>Nom</th>
                
            </tr>
        </thead>
        <tbody id="tbody">
            <tr class="text-center">
               <td>100000</td>
                <td>abdou</td>
                <td>kane</td>
                
            </tr>
        </tbody>
    </table>
    <div class="col-md-4 mt-4 float-right" id="suiv"><button>Suivant >></button></div>


<!-- This is Customer Modal. It will be use for Create new Records and Update Existing Records!-->
<div id="customerModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Create New Records</h4>
   </div>
   <div class="modal-body">
    <label>Enter First Name</label>
    <input type="text" name="first_name" id="first_name" class="form-control" />
    <br />
    <label>Enter Last Name</label>
    <input type="text" name="last_name" id="last_name" class="form-control" />
    <br />
   </div>
   <div class="modal-footer">
    <input type="hidden" name="customer_id" id="customer_id" />
    <input type="submit" name="action" id="action" class="btn btn-success" />
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>
$(document).ready(function(){
    loadUser(); //This function will load all data on web page when page load
    function loadUser() // This function will load data from table and display under <div id="result">
    {
        var action = "Load";
        $.ajax({
            url : "http://localhost/miniProjet2/data/dbRequetes.php", //Request send to "action.php page"
            method:"POST", //Using of Post method for send data
            data:{action:action}, //action variable data has been send to server
            success:function(data){
                $('#tbody').html(data); //It will display data under div tag with id result
            }
        });
    }
    $(document).on('click', '.update', function(){
        var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
        var action = "Select";   //We have define action variable value is equal to select
        $.ajax({
            url:"http://localhost/miniProjet2/data/dbRequetes.php",   //Request send to "action.php page"
            method:"POST",    //Using of Post method for send data
            data:{id:id, action:action},//Send data to server
            dataType:"json", 
            success:function(data){
               
            $('#customerModal').modal('show');   //It will display modal on webpage
            $('.modal-title').text("Update Records"); //This code will change this class text to Update records
            $('#action').val("Update");     //This code will change Button value to Update
            $('#customer_id').val(id);     //It will define value of id variable to this customer id hidden field
            $('#first_name').val(data.first_name);  //It will assign value to modal first name texbox
            $('#last_name').val(data.last_name);  //It will assign value of modal last name textbox
            
        }
        });
    });
    $(document).on('click', '.delete', function(){
  var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
  if(confirm("Are you sure you want to remove this data?")) //Confim Box if OK then
  {
   var action = "Delete"; //Define action variable value Delete
   $.ajax({
    url:"http://localhost/miniProjet2/data/dbRequetes.php",    //Request send to "action.php page"
    method:"POST",     //Using of Post method for send data
    data:{id:id, action:action}, //Data send to server from ajax method
    success:function(data)
    {
        console.log(data);
     
     alert(data);    //It will pop up which data it was received from server side
    }
   })
  }
  else  //Confim Box if cancel then 
  {
   return false; //No action will perform
  }
 });
});
</script>