//declare constante 
var nb=5;
const keyStorage="NBJ::nbElt";

//declare variable
var content= $('#content');
var connexion = 'view/connexion.php';
var inscription = 'view/Inscription.php';
var admin = 'view/admin.php';
var charger = $('#charger');
var user = 'view/user.php';
var text = 'Ce champ est obligatoire';

 /*------------ ajout champ-----------*/
function ajoutChamp(choix,i){
    let radio = `<div class="row"><span>Reponse ${i}</span><input class="h-25" type="text" name="tab[${i}]"  id="${i}">`
        radio+=`<input type="radio" name="rep[${i}]" id="${i}" class="w-2" >`;
        radio+=`<button  type="button" class="btn btn-danger  mt-1 col-1 w-5" onclick="Delete($(this))"><span class=" fa fa-archive col mr-10 "></span></button></div>`;

    let check = `<div class="row"><span>Reponse ${i}</span><input class="h-25" type="text" name="tab[${i}]" value="" id="${i}">`
        check +=`<input type="checkbox" name="rep[${i}]" id="${i}" class=" w-2">`;
        check +=`<button type="button"  class="btn btn-danger col-1  mt-1 w-5 " onclick="Delete($(this))"><span class="  fa fa-archive col mr-10"></span></button></div>`;
        
    let texte= `<div class="row"><span>Reponse</span><textarea class="h-25" rows="${1}" cols="${25}" name="tab[${i}]"   id="reponse"></textarea>`;
        texte += `<button id="delete" type="button" class="btn btn-danger col-1  mt-1 ml-1 w-5" onclick="Delete($(this))"><span class=" fa fa-archive col mr-10 "></span></button></div>`;

    if(choix == "simple")  {  return radio }
    if(choix == "multiple"){  return check }
    if(choix =="texte" && (i==1)) {return texte} 
}
// delete champ
function Delete(lui){
    lui.parent().remove();
}
// ajout line
function ajoutLigne(value){
    let line;
    for(const v of value){
        line=`
            <tr id ="tr_${v.id}">
                <td id="_id_${v.id}">${v.id}</td>
                <td id="i_img_${v.id}"><img class="img-thumbnail" src="${v.thumbnail.path}" alt="thumbnail"/></td>
                <td id="t_titre_${v.id}">${v.titre}</td>
                <td id="t_prenom_${v.id}">${v.prenom}</td>
                <td id="t_nom_${v.id}">${v.nom}</td>
                <td id="t_nat_${v.id}">${v.nat}</td>
                <td id="s_supp_${v.id}"><button class="btn btn-danger"><span class="fa fa-archive"></span></button></td>
                <td id="f_info_${v.id}"><button class="btn btn-info"><span class="fa fa-binoculars"></span></button></td>                   
            </tr>
        `;
        $("#bd_users").append(line);
    }
}
//load user lister
function loadUser(limit=1 ,offset=0) 
{
    var action = "Load";
    $.ajax({
        url : "http://localhost/miniProjet2/data/dbRequetes.php", 
        method:"POST", 
        data:{action:action,limit:limit,offset:offset}, 
        success:function(data){
            $('#tbody').html(data); 
            offset +=10
        }
    });
}
// variable st
function getStorage(){
    return localStorage.getItem(keyStorage);
}
function setStorage(value){
    return localStorage.setItem(keyStorage,value);
}
function isScrole(){
    $(window).scroll(function(){
       if(( $(document).height() -  $(this).height() -  $(this).scrollTop()) <=5){
        getDonneesUser();

       }
    })
}
const listerQues = (nbt,offset,statut) =>{
    
    $.ajax({
        type: "POST",
        url: "http://localhost/miniProjet2/data/dbRequetes.php",
        data: {nb:nbt,offset:offset,statut:statut},
    })
    .done(data =>{
        
      printData(data,tdaff)
     
    })
}
//verification content value function
function verifier(champ,text){
    if(champ.val() == ""){ 
        champ.after(`<span class="erreur">${text}</span>`)
        champ.css('border','1px solid red');
    }
     champ.keyup(function (e) { 
        champ.next().remove();
        champ.css('border','none' );
     });
}

//load data json
function printData(data,tbody){
     let val = JSON.parse(data);
      
   for(val of value){
        tbody.append(`
        <tr class="text-center">
            <td>${joueur.prenom}</td>
            <td>${joueur.nom}</td>
        </tr>
    `);
   }
}

//load file function
function fileLoad(target,chemin){
    target.load(chemin , function(response, status, xhr) {
        var msg= '';
        if (status == "error") 
        {
            msg = "Sorry but there was an error: ";
            target.html(msg + xhr.status + " " + xhr.statusText);
        } 
        
  
    });
}
/*========================================================= */
// let nb =30;
// const getDonneesApi = (n) =>{
//   $.ajax({
//       method:"GET",
//       url: `https://opentdb.com/api.php?amount=${n}`
//   })
//   .done(data => {
//     objUser(data.results);
//     //   const u = objUser(data.results);
//     //   const j ={...u};
//     //   setDonneesApi(j);
//     console.log(data);
//   })
// }
// const setDonneesApi = (usr) =>{
//     $.ajax({
//         method:"POST",
//         url: "http://localhost/miniProjet2/data/dbRequetes.php",
//         data:usr
//     })
//     .done(data =>{
     
        // const value =JSON.parse(data);
        // ajoutLigne(value);
       
//     })
// }
// const objUser=(datas) => {
//     let usrs=[];
//     for(const data of datas){
        
//         const {category,correct_answer,question,type}=data;
        
//         const usr={
//             category,
//             correct_answer,
//             question,
//             type,
       
           
//         };
//         usrs=[...usrs,usr];
//     }
//   return usrs;
// }
// getDonneesApi(nb);



  