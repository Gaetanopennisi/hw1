function aggiungiRecensione(event) {
    event.preventDefault();
    const formData = new FormData(document.querySelector('.form-rec'));
  
    fetch("home.php", { 
      method: 'POST',
      body: formData
    }).then(onResponse).then(onJsonAddRece).catch(onError);
  }
  
  function onError(error){
    console.log('Error: ' + error);
  }
  
  function onResponse(response) {
    console.log('Response status:', response.status);
    return response.json();
  }
  
  function onJsonAddRece(json) {
    console.log('Risposta JSON:', json);
    if (json.status === 'success') {
        const messaggioConferma = document.querySelector("#messaggioConferma");
        messaggioConferma.classList.remove('hidden');
    } else {
        console.error("Errore nella risposta JSON:", json);
    }
  }

  function rimuoviScritta(event){
        const messaggioConferma = document.querySelector("#messaggioConferma");
        messaggioConferma.classList.add('hidden');
  }
  
  const form2 = document.querySelector(".form-rec");
  form2.addEventListener('submit', aggiungiRecensione);
  const form3= document.querySelector("#commento");
  form3.addEventListener('click',rimuoviScritta);

  
  
//mostra recensioni
let offset = 0; 

function caricaRecensioni() {
  fetch(`richiesta_recensioni.php?`)
    .then(onResponserec)
    .then(onJsonmostrarec)
    .catch(function(error) {
      console.error('Errore:', error);
    });
}

function onJsonmostrarec(json) {
  console.log('JSON ricevuto');
  console.log(json);

  const library = document.querySelector('#top-view');
  library.innerHTML = '';

  const risultati = json;
  let num_risultati = risultati.length;
  if (num_risultati === 0) {
  
    offset = 0;
    caricaRecensioni();
    return;
  }

  if (num_risultati >= 3) {
    num_risultati = 3;
  }
  for (let i = 0; i < num_risultati; i++) {
    const rec = risultati[i];
    const user_id = rec.user_id;
    const username = rec.username;
    const review = rec.review;
    const rating = rec.rating;

    const poster = document.createElement('div');
    poster.classList.add('poster');

    const identita = document.createElement('span');
    identita.textContent = "Profilo num: " + user_id;
    const nominativo = document.createElement('span');
    nominativo.textContent = username;
    const caption = document.createElement('p');
    caption.textContent = review;
    const descrizione = document.createElement('span');
    descrizione.textContent = "Valutazione: " + rating;


    

    poster.appendChild(identita);
    poster.appendChild(nominativo);
    poster.appendChild(caption);
    poster.appendChild(descrizione);

    library.appendChild(poster);
    
  }

  offset += num_risultati;
}


const caricaAltroButton = document.createElement('button');
    caricaAltroButton.textContent = 'Vedi altre recensioni';
    caricaAltroButton.addEventListener('click', caricaRecensioni);
const library = document.querySelector('#pulsante');
library.appendChild(caricaAltroButton);



function onResponserec(response) {
  console.log('Response status:', response.status);
  return response.json();
}

caricaRecensioni();
