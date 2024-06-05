    function onResponse(response) {
        console.log('Risposta ricevuta');
        return response.json();
    }
    
    function onJson(json) {
        console.log('JSON ricevuto');
        console.log(json);
        
        const library = document.querySelector('#top-view');
        library.innerHTML = '';
        
        const risultati = json;
        let num_risultati = risultati.length;
        
        for(let i = 0; i < num_risultati; i++){
            const elemento_alimento = risultati[i];
            const title = elemento_alimento.nome;
            const poster_alimento = elemento_alimento.immagine;
            const descr_alimento = elemento_alimento.descrizione;
            const alimento_id = elemento_alimento.id;
            const poster = document.createElement('div');
            poster.classList.add('poster');
            
            poster.dataset.id = alimento_id;
            poster.dataset.title = title;
            poster.dataset.image = poster_alimento;
            poster.dataset.descrizione = descr_alimento;
            
            const img = document.createElement('img');
            img.src = poster_alimento;
            const caption = document.createElement('span');
            caption.textContent = title;
            const descrizione = document.createElement('p');
            descrizione.textContent = descr_alimento;
    
            poster.appendChild(img);
            poster.appendChild(caption);
            poster.appendChild(descrizione);
    
            const saveForm = document.createElement('div');
            saveForm.classList.add("saveForm");
            poster.appendChild(saveForm);
            const save = document.createElement('div');
            save.value = '';
            save.classList.add("save");
            saveForm.appendChild(save);
            saveForm.addEventListener('click', saveAlimento);
    
            library.appendChild(poster);
        }
    }
    
    const form = document.querySelector('#question');
    form.addEventListener('submit', ricerca);
    
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
        
        fetch('richiesta_prodotti.php?tipologia=' + alimento_value)
            .then(onResponse)
            .then(onJson)
            .catch(function(error) {
                console.error('Errore:', error);
            });
    }
    
    function rimuoviScritta(event) {
        const error_message = document.querySelector("#error-message");
        error_message.classList.add('hidden');
    }
    
    const form3 = document.querySelector("#alimento");
    form3.addEventListener('click', rimuoviScritta);
    
    // salvataggio prodotti
    function saveAlimento(event) {
        console.log("Salvataggio");
        const poster = event.currentTarget.closest('.poster');
        const formData = new FormData();
        formData.append('id', poster.dataset.id);
        formData.append('title', poster.dataset.title);
        formData.append('image', poster.dataset.image);
        formData.append('descrizione', poster.dataset.descrizione);
        fetch("aggiungi_preferito.php", { method: 'post', body: formData })
            .then(response => dispatchResponse(response, poster))
            .catch(dispatchError);
        event.stopPropagation();
    }
    
    function dispatchResponse(response, poster) {
        console.log(response);
        return response.json().then(json => databaseResponse(json, poster));
    }
    
    function dispatchError(error) { 
        console.log("Errore");
    }
    
    function databaseResponse(json, poster) {
        console.log(json);
        if (!json.ok) {
            dispatchError();
            return null;
        }
        if (json.message === 'Already saved') {
            const save = poster.querySelector('.save');
            save.classList.remove('accettato');
            save.classList.add('avvertenza');
        }
        if(json.message === 'Saved successfully'){
            const save = poster.querySelector('.save');
            save.classList.add('accettato');
        }
    }
    


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
  
