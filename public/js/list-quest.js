const Questions = [
    
];
const cadres = document.getElementById('cadre')
const Ket = document.querySelectorAll('.question')
const h1 = document.getElementById('questions')
const un_ok = document.getElementById('un_text')
const deux_ok = document.getElementById('deux_text')
const trois_ok = document.getElementById('trois_text')
const quatre_ok = document.getElementById('quatre_text')
const input_ok = document.querySelector('#input')

let Reponse = 0
let score = 0

start()
function start(){
    deselectRep()
    const ReponseData = Questions[Reponse]

    h1.innerText = ReponseData.question
    un_ok.innerText = ReponseData.un
    deux_ok.innerText = ReponseData.deux
    trois_ok.innerText = ReponseData.trois
    quatre_ok.innerText = ReponseData.quatre 
}
function deselectRep(){
    Ket.forEach(bien => bien.checked = false)
}
function oui(){
    let trouve
    Ket.forEach(bien => {
        if(bien.checked){
            trouve = bien.id
        }
    })
    return trouve
}
input_ok.addEventListener('click',() =>{
    const trouve = oui()
    if(trouve){
        if(trouve === Questions[Reponse].correct)
        score++
    }
    Reponse++

    if (Reponse<Questions.length) {
        start()
    }else{
        cadres.innerHTML = `
        <h2>Vous avez trouvé ${score}/${Questions.length} questions.</h2>
        
        <button onclick"location.reload()">Reload</button>
        `
    }
})