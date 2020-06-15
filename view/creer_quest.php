<style>
.mt-0 {
  margin-top: -1em !important;
}
.pt-1 {
  padding-top: -6em !important;
}
.w-25 {
    width:2em !important;
}
.mr-10{
    left: -1.009em;
    top:-.1em;
    width:3px !important;
}

.w-2{
    height: 1.7em !important;
    width: 2em !important;
}
.w-5{
    top: -4px !important;
    height: 1.3em !important;
    width: 1.3em !important;
}
.texte{
  font-size: 12px !important;
}
.pb-6{
  top: -16px !important;
}
</style>
<div  id="partiadmn" class=" row mt-3 " > 
   
    <div class="row ml-2">
        <form  id="quest-form" action="" method="post" >
           <input type="hidden"  id="statut" name="statut" value="4" >
           <div id="quest" class="form-group  mt-0">
                <span class="pb-6 col-2 ">Questions<small class="d-none ml-1" style="color: red">*</small></span>
                <textarea class=" ml-0 col-8" name="quest" id="_quest" rows="1" cols="25"></textarea>
           </div>

            <div id="nbpoint" class="form-groupb row l-2 mt-3">
                <span class="ml-3 col-8">Nbre de Points <small class="d-none" style="color: red">*</small></span>
                <input class="form-control col-2 float-right w-25 h-50 mt-1" type="number" name="nb_point" id="nb_point" min="1" max="10">
            </div>
            <!-- <small class="d-none" style="color: red">*</small> -->
            <div id="_choix" class="form-group row mt-2 ml-3">
                <span>Type de réponse <small class="d-none" style="color: red">*</small></span>
                <select name="choix" id="choix">
                    <option value="default" selected="selected" id="">Choix du réponse</option>
                    <option value="texte" id="">Réponse texte</option>
                    <option value="simple" id="">Réponse radio</option>
                    <option value="multiple" id="">Réponse checkbox</option>
                </select>
               
                <button type="button" class="texte" id="ajout" name="ajout" title="ajouter un element">ajout</button>
            </div>
            <div class="row ml-1">
                <div id="champ" class="form-group col-12 ml-3">
                    
                </div>
            </div>
            <span class="e_quest"></span>
            <button class="btn-suiv  enregist " type="button"  name="submit" id="sub_quest">Enregister</button>
   

        </form>
    </div>
    
</div>
 

 
<script>
    var choix = "";
    var i = 0;
    var champ = $("#champ")
    var errror= 0
    $( "select" ).change(function () {
        i=1
        
        $( "select option:selected" ).each(function() {
        choix = $( this ).val();
        
        })
        champ.html('')
        if(choix == "simple")  { champ.append(ajoutChamp(choix,i)); }
        else if(choix == "multiple"){ champ.append(ajoutChamp(choix,i)); }
        else if(choix =="texte")    {champ.append(ajoutChamp(choix,i));} 

    })

    $("#ajout").on('click',function(e){
        $( "select option:selected" ).each(function() {
            let  choix = $( this ).val();
            i++;
       
            champ.append(ajoutChamp(choix,i));
        })
    });
   
   
    $('#sub_quest').on('click',function(e){

         let t= "obligatoire"
        let question=  $('#_quest').val(); 
        let nb_point= $("#nb_point").val();
        let ajout   = $('#ajout').val();
        let sub_quest = $('#sub_quest').val();
        var form = $("form")[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        $(".err").remove();
      
        if (question.length < 1) {
            $(' .d-none').css("display","block !important");
            $('#_quest ').css("border","1px solid red")
            errror = 1
        }
        if ($('#champ > *').length<1) {
            $(' .d-none').css("display","block !important");
            $('select ').css("border","1px solid red")
            errror = 1
        }
        if (nb_point.length < 1) {
            $(' .d-none').css("display","block !important");
            $('#nb_point ').css("border","1px solid red")
            errror = 1
        }
       
       

        if(errror == 0){
            alert('enter')
            $.ajax({
                type: "POST",
                url: "http://localhost/miniProjet2/data/dbRequetes.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                console.log(data);
                }
            });
        }
    });




</script>