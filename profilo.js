function eliminaAlimento(event) {
    console.log("Eliminazione");
    const poster = event.currentTarget.parentNode;
    const formData = new FormData();
    formData.append('id', poster.dataset.id);
    formData.append('title', poster.dataset.title);
    formData.append('image', poster.dataset.image);
    formData.append('descrizione', poster.dataset.descrizione);
    
    fetch("elimina_preferito.php", {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(databaseResponse)
    .catch(dispatchError);

    event.stopPropagation();
}

function dispatchResponse(response) {
    console.log('Risposta server:', response);
    if (!response.ok) {
        throw new Error("Network response was not ok");
    }
    return response.json();
}

function dispatchError(error) { 
    console.error("Errore:", error);
}

function databaseResponse(json) {
    console.log('Risposta JSON:', json);
    if (!json.ok) {
        console.error("Server error:", json.error);
        return;
    }

    console.log("Eliminato con successo:", json.message);

    
    const poster = document.querySelector(`.poster[data-id="${json.id}"]`);
    if (poster) {
        poster.remove();
    }
}

// Ricarica prodotti del profilo
fetch('prodotti_profilo.php').then(onResponse).then(onJson).catch(function(error) {
    console.error('Errore:', error);
});

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
        const title = elemento_alimento.nome_alimento;
        const poster_alimento = elemento_alimento.img;
        const descr_alimento= elemento_alimento.descrizione;
        const poster = document.createElement('div');
        poster.classList.add('poster');

        poster.dataset.id = elemento_alimento.id;
        poster.dataset.title = title;
        poster.dataset.image = poster_alimento;
        poster.dataset.descrizione = descr_alimento;
        
        const img = document.createElement('img');
        img.src = poster_alimento;
        const caption = document.createElement('span');
        caption.textContent = title;
        const descrizione= document.createElement('p');
        descrizione.textContent= descr_alimento;

        poster.appendChild(img);
        poster.appendChild(caption);
        poster.appendChild(descrizione);

        const deleteForm = document.createElement('div');
        deleteForm.classList.add("deleteForm");
        poster.appendChild(deleteForm);
        const delet = document.createElement('div');
        delet.value = '';
        delet.classList.add("delete");
        deleteForm.appendChild(delet);
        deleteForm.addEventListener('click', eliminaAlimento);

        library.appendChild(poster);
    }
}
