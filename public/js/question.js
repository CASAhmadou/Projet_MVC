
// Appel du html
const container = document.querySelector('#container-question')
const question = document.getElementById('question');
const rond = document.querySelector('#rond');
const add = document.getElementById('add-reponse');
const web_root = document.getElementById('web_root').value;
const enregistre = document.getElementById('enregistre');
let i=1;

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
    
   label.innerHTML=`Reponse ${i}`;
   
   check.setAttribute("type", "checkbox");
   check.setAttribute("name", "rep[]");
   check.setAttribute("value", `${i}`);
   check.setAttribute("class", "checkbox");
   radio.setAttribute("type", "radio")
   radio.setAttribute("name", "radio")
   radio.setAttribute("value", `${i}`);
   radio.setAttribute("class", "checkbox");
   reponses.setAttribute("id","reponse");
   reponses.setAttribute("type","text");
   reponses.setAttribute("name","solution[]");
   reponses.setAttribute("id", "text-reponse");
   image.setAttribute('class','icone');
   image.setAttribute('id','supprime');
   image.setAttribute('src',web_root+'/img/addsup.png');
   i++;
   image.addEventListener('click',function(){
    rond.removeChild(newreponse);
    
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
   if (select=="Unique") {
    newreponse.appendChild(radio); 
   }
   if(select=="Choix Multiple"){
    newreponse.appendChild(check);
    }
};

//suppression
function delElement() {
    rond.innerHTML="";
    i=1;
}//suppression

console.log();
add.addEventListener('click',ajout_reponse);


    
    
