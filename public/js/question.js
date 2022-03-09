
// Appel du html
const container = document.querySelector('#container-question')
const question = document.getElementById('question');
const rond = document.querySelector('#rond');
const add = document.getElementById('add-reponse');
const web_root = document.getElementById('web_root').value;
const enregistre = document.getElementById('enregistre');
const select = document.getElementById('reponse').value;

//
//suppression
function delElement(element) {
    element.remove();
}//suppression


function ajout_reponse(){
    //créer balise
    var check = document.createElement('input');
    var checc = document.createElement('input');
    var newreponse = document.createElement('div');
    var label = document.createElement('label');
    var reponses = document.createElement('input');
    var image = document.createElement('img');
    
    //créer attribution

   label.innerHTML="Reponse";
   check.setAttribute("type", "checkbox");
   check.setAttribute("name", "checkbox")
   check.setAttribute("class", "checkbox");
   checc.setAttribute("type", "radio")
   checc.setAttribute("name", "checkbox")
   checc.setAttribute("class", "checkbox");
   reponses.setAttribute("id","reponse1");
   reponses.setAttribute("type","text");
   reponses.setAttribute("name","reponse1");
   reponses.setAttribute("id", "text-reponse");
   image.setAttribute('class','icone');
   image.setAttribute('id','supprime');
   image.setAttribute('src',web_root+'/img/addsup.png')
   image.addEventListener('click',function(){
       delElement(this.parentElement);
   })

 
    //liaison
   container.appendChild(question);
   container.appendChild(question);
   question.appendChild(rond);
   question.appendChild(enregistre);
   rond.appendChild(newreponse);
   newreponse.appendChild(label);
   newreponse.appendChild(reponses);
   newreponse.appendChild(check);
   newreponse.appendChild(checc);
   newreponse.appendChild(image);

    ;
};



console.log();
add.addEventListener('click',ajout_reponse);

    
    
