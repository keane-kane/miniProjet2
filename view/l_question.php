<style>
.w-25{
    width:1px !important;
}
.mr-5{
	left:-.4em !important;
}
</style>
<div class="container-fluid">
    <div  class="display-5 text-sm-center ">Lister les joueurs</div>   
 
    <div class="row  " >

        <div class="col-md-12 "data-spy="scroll" > 
			<div class="row  overflow-x:scroll " id="tableau" > 
				<table  class=" overflow-auto  table thead-light table-sm table-verticale table-responsive display-8" description id="users">
					<thead >
						<tr>
							<th colspan='colapse' id class="text-center"> 
							    <span class="float-left w-25">ID|</span>
								<div class="mr-5 right-2 "> Questions</div>
							</th>
						</tr>
					</thead>
					<tbody id="bd_users" class="">  
					 <td id=affi_quest >
						<div  class="float-left pr-2">
							<h5 class=" ">1|</h5>
						</div>
						<div class="mr-">
							<h5>je suis la fgkdmghgkljmtieoyjieqjùerqkg</h5> 
							<input type="text" name="" id="">
						</div>
						
					 </td>
				
					</tbody>
				</table>
			</div>
			<div class="row" >
          <div class="col-md-7">
            <div class="form-inline text-center my-4"> 
			
              <label for="nb_elt" class="mr-2">Afficher par</label>
              <input class="form-control col-md-4 h-25 ml-2 mt-0" type="number" name="nb_elt" id="nb_elt" min="1" max="10">
            </div> 
          </div>
          <div class="col-sm-3 mt-4 display-8 h-25 text-sm" id="suiv"><button class=" display-10 h-25 text-sm">Suivant>></button></div>
   
		</div>
        </div> 

    </div>
</div>

<script>
	

	    $("#nb_elt").on('change',function(){
            setStorage($(this).val());        
		});
		
		$("#nb_elt").attr("value",nb);

		
		if(!getStorage()){
			setStorage(nb);
		}else{
			nb=getStorage();
		}
		
		// scroll
		 tdaff = $('#affi_quest');
		let offsett = 0;
        statut = 
		$.ajax({
			type: "POST",
            url: "http://localhost/miniProjet2/data/dbRequetes.php",
            data: {limit:3,offset:offset,statut:statut},
                
			success: function (data) {
				tbody.html('')
				printData(data,tbody);
				offset +=3
			}
			});

	//  Scroll

		if(sh-st <= ch){
			$.ajax({
				type: "POST",
				url: "http://localhost/LIVE_AJAX/data/getVentes.php",
				data: {limit:7,offset:offset,date:date},
				dataType: "JSON",
				success: function (data) {
					
					printData(data,tbody);
					offset +=3;
				}
			});
		}