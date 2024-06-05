/*tendina*/
function clickmenu(event) {
  
    const details = document.querySelector('#tendina');
    const galleriaTendina=document.querySelectorAll('#tendina a');
    isVisible = !isVisible;
    if (isVisible) {
      details.classList.remove('hidden');
      for(let i=0;i<galleriaTendina.length;i++){
      galleriaTendina[i].classList.remove('hidden');
      }
    } else {
      details.classList.add('hidden');
      for(let i=0;i<galleriaTendina.length;i++){
        galleriaTendina[i].classList.add('hidden');
        }
      detailToggle.classList.remove('hidden');
    }
  }
  let isVisible = false;
  
  const menu = document.querySelector('#menu');
  menu.addEventListener('click', clickmenu);

/*apikey*/
let apiKey = '';

function getApiKey() {
    return fetch('apikey.php?action=getApiKey')
        .then(function(response) {
            return response.json();
        })
        .then(function(json) {
            apiKey = json.apiKey;
        })
        .catch(function(error) {
            console.error("Errore nell'ottenere la chiave API:", error);
        });
}

function onResponse(response) {
    if (!response.ok) {
        throw new Error('Network response was not ok ' + response.statusText);
    }
    return response.json();
}

function onJson(json) {
    if (json.error) {
        console.error('Errore dal server:', json.message || json.error);
        return;
    }
    console.log('JSON ricevuto');
    console.log(json);

    const topView = document.querySelector('#top-view');
    topView.innerHTML = '';

    const risultati = json.results;
    const idArray = []; 

    for (const elemento_alimento of risultati) {
        idArray.push(elemento_alimento.id);
        fetchSecondoAPI(elemento_alimento.id);
    }
}

function fetchSecondoAPI(id) {
    fetch('apikey.php?action=fetchRecipeInfo&id=' + id)
        .then(onResponse)
        .then(onJsonSecondoAPI)
        .catch(function(error) {
            console.error("Errore nella richiesta al secondo API:", error);
        });
}

function onJsonSecondoAPI(json) {
    if (json.error) {
        console.error('Errore dal server:', json.message || json.error);
        return;
    }
    console.log('Risposta del secondo API ricevuta');
    console.log(json);

    const risultati = Array.isArray(json) ? json : [json];

    for (const risultato of risultati) {
        const blocco = document.createElement('div');
        blocco.classList.add('poster');

        const immagine = document.createElement('img');
        immagine.src = risultato.image;
        blocco.appendChild(immagine);

        const titolo = document.createElement('h2');
        titolo.textContent = risultato.title;
        blocco.appendChild(titolo);

        const descrizione = document.createElement('p');
        descrizione.innerHTML = risultato.summary;
        blocco.appendChild(descrizione);

        const topView = document.querySelector('#top-view');
        topView.appendChild(blocco);
    }
}

function ricerca(event) {
    event.preventDefault();

    const alimento = document.querySelector('#alimento');
    const alimento_value = encodeURIComponent(alimento.value);
    const errorMessage = document.querySelector('#error-message');
    
    if (alimento_value === '') {
        errorMessage.textContent = 'Per favore, inserisci un valore nel campo di ricerca.';
        errorMessage.classList.remove('hidden');
        return;
    }

    errorMessage.classList.add('hidden');

    console.log('Eseguo ricerca: ' + alimento_value);

    fetch('apikey.php?action=fetchData&query=' + alimento_value)
        .then(onResponse)
        .then(onJson)
        .catch(function(error) {
            console.error("Errore nella richiesta al primo API:", error);
        });
}

getApiKey().then(function() {
    const form = document.querySelector('#question');
    form.addEventListener('submit', ricerca);
});




function rimuoviScritta(event){
  const error_message = document.querySelector("#error-message");
  error_message.classList.add('hidden');
}

const form3= document.querySelector("#question");
  form3.addEventListener('click',rimuoviScritta);
