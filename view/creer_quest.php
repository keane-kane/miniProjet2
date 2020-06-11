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
.text{
  font-size: 14px !important;
}
</style>
<div  id="partiadmn" class=" row mt-0" > 
    <div class="row" id="tableau" > 
        <div class="form-inline col-12"> 
            <label for="nb_elt" class="m-0 p-0 text col-6">Nnbre de question /jeu</label>
            <input class="form-control col-2 h-50 mt-3 ml-4" type="number" name="nb_elt" id="nb_elt" min="1" max="10">
            <div class="col-3 mt-3 ml-0  " id="suiv"><button class=" text" >Suivant</button></div>

        </div> 
    </div>
    <div class="row ml-2">
        <form  id="quest-form" action="" method="post" >

           <div id="quest" class="form-group  mt-0">
                <span class="pt-1 col-2 ">Questions </span>
                <textarea class=" col-8" name="quest" id="quest" rows="2" cols="30"></textarea>
           </div>

            <div id="nbpoint" class="form-groupb row l-2 mt-3">
                <span class="ml-3 col-8">Nbre de Points</span>
                <input class="form-control col-2 float-right w-25 h-50 mt-1" type="number" name="nb_point" id="nb_point" min="1" max="10">
            </div>

            <div id="_choix" class="form-group row mt-2 ml-3">
                <!-- <span>Type de réponse<small style="color: red">*</small></span> -->
                <select name="choix" id="choix">
                    <option value="default" selected="selected" id="">Donnez le type de réponse</option>
                    <option value="choix_text" id="">Réponse de type texte</option>
                    <option value="choix_simple" id="">Réponse de type radio</option>
                    <option value="choix_multis" id="">Réponse de type checkbox</option>
                </select>
                <button type="button" id="ajout" name="ajout" title="ajouter un element">ajout</button>
            </div>
            <div id="response" class="form-group row">
            </div>
            <span class="e_quest"></span>
            <button class="btn-suiv enregist" type="button"  name="submit" id="sub_quest">Enregister</button>
        
        </form>
    </div>

</div>
<script>
$(document).ready(function(){
    $('##sub_quest').on('click'function(e){
        let question=  $('#quest').val(); 
        let nb_point= $("#nb_point").val();
        let choix   = $('#choix').val();
        let ajout   = $('#ajout').val();
        let sub_quest = $('#sub_quest').val();
        var form = $("form")[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        if
        if($question >0 && $nb_point >=5 $choix != 'default'){

            console.log('object');
        }
    });

});

</script>