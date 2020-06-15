<style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1200px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:100px;
   }
   .btn-xs{
       font-size: 10px !important;
     
      height: 2em !important;
        width: 1.5em !important;
       left:-1em !important;
   }
   .mr-4{
       left: -1em;
       margin:0 -1em !important;
   }
  
  </style>
  
  <div class="row " >
      <div  id="partiadmin" class="partiadmi col-10 col-sm-4 col-md-3" > 
         <div class="row" id="tableau" > 
         
    <table  class="table table w-75 text-md ">
        <thead>
            <tr class="text-center  ">
                <th class="text-center mx-0 ">Id</th>
                <th class="text-center mx-0 ">Prenom</th>
                <th class="text-center mr-4 ">Nom</th>
                <th cclass="text-center mr- ">Modifer</th>
                <th class="text-center mr- ">Suprimer</th>
                
            </tr>
        </thead>
        <tbody id="tbody">
            <tr class=" text-center">
               <td>100000</td>
                <td>abdou</td>
                <td>abdou</td>
                <td>abdou</td>
                <td>kane</td>
                
            </tr>
        </tbody>
    </table>
    <!-- <div class="col-md-4 mt-4 float-right" id="suiv"><button>Suivant >></button></div> -->


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

    

    // scroll
		 limit = 10
		  offset = 1;
		 tbody = $('#tbody');
		
         loadUser(limit,offset); 
            //  Scroll
         charger = $('#charger');
        charger.scroll(function(){
        //console.log(scrollZone[0].clientHeight)
        const st = charger[0].scrollTop;
        const sh = charger[0].scrollHeight;
        const ch = charger[0].clientHeight;

        
        if(sh-st <= ch){
            loadUser(limit, offset)
            
        }
    })
    $('#action').click(function(){
    var firstName = $('#first_name').val(); 
    var lastName = $('#last_name').val(); 
    var id = $('#customer_id').val(); 
    var action = $('#action').val();  
    if(firstName != '' && lastName != '') 
    {
    $.ajax({
    url : "http://localhost/miniProjet2/data/dbRequetes.php",   
    method:"POST",    
    data:{firstName:firstName, lastName:lastName, id:id, action:action}, 
    success:function(data){
        alert(data);  
        $('#customerModal').modal('hide'); 
        loadUser();    
    }
    });
    }
    else
    {
    alert("Both Fields are Required"); 
    }
    });

    $(document).on('click', '.update', function(){
        var id = $(this).attr("id"); 
        var action = "Select";   
        $.ajax({
            url:"http://localhost/miniProjet2/data/dbRequetes.php",  
            method:"POST",   
            data:{id:id, action:action},
            dataType:"json", 
            success:function(data){
               
            $('#customerModal').modal('show'); 
            $('.modal-title').text("Update user"); 
            $('#action').val("Update");     
            $('#customer_id').val(id);   
            $('#first_name').val(data.first_name);  
            $('#last_name').val(data.last_name);  
            
        }
        });
    });
    $(document).on('click', '.delete', function(){
    var id = $(this).attr("id"); 
    
    if(confirm("Are you sure you want to remove this data?"))
    {
        
    var action = "Delete"; 
    $.ajax({
    url:"http://localhost/miniProjet2/data/dbRequetes.php",   
    method:"POST",     
    data:{id:id, action:action}, 
    success:function(data)
    {
        
        console.log(data);
        
     alert(data); 
     
    }
    
   })
   $(this).parents('tr').hide();
  }
  else  
  {
   return false; 
  }
 });
 $("#tbody")
    .on("click","tr",function(){
       
       coul=$("body").css("background-color");
       $(this).css("background-color","orange");
       $("#bd_users tr").not(this).css("background-color",coul);
    })
    .on('dblclick',"td",function(){
        $(this).parents().css("background-color",coul);
        // const id =$(this).attr("id");
        // const tab = id.split("_");
        // objEnCours=$(this);
    })
</script>