const pallino = document.querySelectorAll(".pallino");
console.log(pallino);
for(let i=0; i<pallino.length; i++){
    pallino[i].setAttribute('data-indice',i);
    pallino[i].addEventListener('click',cambiaImg);
    pallino[i].addEventListener('click',cambiatxt);
    pallino[i].addEventListener('click',cambiatxt1);
}

const imm=[
    'img_hw1/eevm-marzo--carousel-desktop.png.webp',
    'img_hw1/brownie--carouse.jpg.webp',
    'img_hw1/arches--carousel.jpg.webp',
    'img_hw1/eevm--carousel.webp',
    'img_hw1/carousel.png.webp',
    'img_hw1/crispy-mcbacon-temptation.jpg.webp',
    'img_hw1/ordina.jpg.webp',
    'img_hw1/compleanno.webp',
    'img_hw1/donut--carousel.jpeg.webp',
    'img_hw1/croissant-pistacchio.jpg.webp'
];


const testo =[
   "Gusta il Double Chiken BBQ o il Double Cheeseburger",
   "Brownie Cioccolato",
   "Andiamo da McDonald's",
   "È impossibile resistere alla tentazione",
   "Cosa non faresti per il Crispy McBacon",
   "Al gusto inconfondibile del più amato di sempre si aggiungono due novità spicy",
   "Con l'app McDonald il tuo ordine è a portata di mano",
   "Festeggia il compleanno da McDonald's",
   "Donut tre cioccolati",
   "Croissant al pistacchio",
];

const testo1=[
   "Dal 6 al 19 Marzo.",
   "Con noci pecan e cioccolato bianco.",
   "Quando un pensiero è costante un semplice cenno diventa un invito.",
   "Scegli un menu con il Double Chicken BBQ o Double Cheeseburger.",
   "Partecipa al concorso in App, in palio 100 Sony PS5.",
   "",
   "Ordini e paghi con la nostra App, e scegli se ritirare il tuo ordine al banco.",
   "Prenota la festa del tuo bambino e divertiti insieme a noi.",
   "Bianco, al latte e fondente.",
   "Un goloso ripieno che ti conquisterà",
];


function cambiaImg(event){
    const pallino = event.currentTarget;
    const img=document.querySelector('.img-slide');
    const indice = parseInt(pallino.dataset.indice);
    img.src= imm[indice];
}

function cambiatxt(event){
  const pallino = event.currentTarget
  var txt = document.querySelector('.slide-div h1');
  console.log(txt);
  const indice = parseInt(pallino.dataset.indice);
  txt.textContent = testo[indice];
  if(indice == 3 || indice== 2 || indice== 7){
    txt.classList.add('alt1');
    txt.classList.remove('slide-divh1');
  }
  else{
    txt.classList.add('slide-divh1');
    txt.classList.remove('alt1');
  }
}

function cambiatxt1(event){
    const pallino = event.currentTarget;
    var txt1= document.querySelector('.slide-div h2');
    const indice = parseInt(pallino.dataset.indice);
    txt1.textContent = testo1[indice];
    if(indice == 3 || indice== 2 || indice== 7){
     txt1.classList.add('alt2');
     txt1.classList.remove('slide-divh2');
      }
      else{
        txt1.classList.add('slide-divh2');
        txt1.classList.remove('alt2');
      }
  }

//Leggi di piu
const scritte=[
    'Da oggi ancora più semplice ▲',
    "Offerte,ordini,giochi e divertimento in un'unica App ▲",
    "Porta a casa tutto il gusto di McDonald's,senza nemmeno scendere dall'autobus ▲",
    'Gusta il tuo menu senza mai spostarti dal divano ▲',
    'Scegliamo solo i prodotti migliori, provenienti da partner selezionati che lavorano con cura e nel rispetto degli standard più alti. ▲',
    'La nostra squadra si allarga in tutta Italia! Invia il tuo CV. ▲'
];

const scritto = document.querySelectorAll('.links h4');
console.log(scritto);

for(let i=0;i<scritto.length;i++){
    scritto[i].setAttribute('data-indice',i);
    scritto[i].addEventListener('click',cambiatesto);
}


function cambiatesto(event){
  const scritto = event.currentTarget;
  const indice=parseInt(scritto.dataset.indice);
  scritto.textContent=scritte[indice];
  scritto.removeEventListener('click',cambiatesto);
  scritto.addEventListener('click',cambiatesto1);
}

function cambiatesto1(event){
  const scritto = event.currentTarget;
  scritto.textContent='Leggi di più ▼';
  scritto.removeEventListener('click',cambiatesto1);
  scritto.addEventListener('click',cambiatesto);
}

//modale
const photo_list=[
  "img_hw1/431701915_722253826686061_2964834705714492899_n.jpg",
  "img_hw1/432429948_766269572119650_507801519853578773_n.jpg",
  "img_hw1/432605267_1046688286427148_6257794414280700701_n.jpg",
  "img_hw1/433691252_2178678029140507_6858657537624592442_n.jpg",
  "img_hw1/433761002_876800067582440_2471593340957869344_n.jpg"
];

function createImage(src){
  const image=document.createElement('img');
  image.src=src;
  return image;
}


const albumView=document.querySelector('.galleria');

function onThumbnailClick(event){
  const modalView= document.querySelector('#modal-view');
  const image=createImage(event.currentTarget.src);
  document.body.classList.add('no-scroll');
  modalView.style.top=window.scrollY + 'px';
  modalView.innerHTML='';
  modalView.appendChild(image);
  modalView.classList.remove('hidden');
}

function onModalClick(event){
  event.preventDefault();
  document.body.classList.remove('no-scroll');
  const modalView= document.querySelector('#modal-view');
  modalView.classList.add('hidden');
}

const modalView=document.querySelector('#modal-view');
modalView.addEventListener('click',onModalClick);

const galleriaitems=document.querySelectorAll('.galleria img');
for(let i=0;i<galleriaitems.length;i++){
  const item=galleriaitems[i];
  item.addEventListener('click',onThumbnailClick);
}

//tendina

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



  




