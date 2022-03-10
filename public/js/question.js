
// Appel du html
const container = document.querySelector('#container-question')
const question = document.getElementById('question');
const rond = document.querySelector('#rond');
const add = document.getElementById('add-reponse');
const web_root = document.getElementById('web_root').value;
const enregistre = document.getElementById('enregistre');


//

function ajout_reponse(){
    //créer balise
    var check = document.createElement('input');
    var radio = document.createElement('input');
    var newreponse = document.createElement('div');
    var label = document.createElement('label');
    var reponses = document.createElement('input');
    var image = document.createElement('img');
    
    //créer attribution

   label.innerHTML="Reponse";
   check.setAttribute("type", "checkbox");
   check.setAttribute("name", "rep[]")
   check.setAttribute("class", "checkbox");
   radio.setAttribute("type", "radio")
   radio.setAttribute("name", "radio")
   radio.setAttribute("class", "checkbox");
   reponses.setAttribute("id","reponse");
   reponses.setAttribute("type","text");
   reponses.setAttribute("name","reponse[]");
   reponses.setAttribute("id", "text-reponse");
   image.setAttribute('class','icone');
   image.setAttribute('id','supprime');
   image.setAttribute('src',web_root+'/img/addsup.png');
   
   image.addEventListener('click',function(){
       delElement(this.parentElement);
   });

 
    //liaison
   container.appendChild(question);
   container.appendChild(question);
   question.appendChild(rond);
   question.appendChild(enregistre);
   rond.appendChild(newreponse);
   newreponse.appendChild(label);
   newreponse.appendChild(reponses);      
   newreponse.appendChild(image);
    
   var select = document.getElementById('reponse').value;
   if (select==1) {
    newreponse.appendChild(radio); 
   }
   else{
    newreponse.appendChild(check);
    }
};

//suppression
function delElement() {
    rond.innerHTML="";
}//suppression

console.log();
add.addEventListener('click',ajout_reponse);

    
    
