var content= $('#content');
var connexion = 'view/connexion.php';
var inscription = 'view/Inscription.php';
var admin = 'view/admin.php';
var charger = $('#charger');
var user = 'view/user.php';
var text = 'Ce champ est obligatoire';

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
//verification content value function
function verifier(champ,leb){
    if(champ.val() == ""){ 
        champ.after(`<span class="erreur">${leb}</span>`)
        champ.css('border','1px solid red');
    }
     champ.keyup(function (e) { 
        champ.next().remove();
        champ.css('border','none' );
     });
}

//load data json
function printData(data,tbody){
      const val = JSON.parse(data);
      console.log(val);
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


  