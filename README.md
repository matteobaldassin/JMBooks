# !!! PROGETTO TEMPORANEAMENTE DISMESSO !!!

# JMBooks
Piattaforma online di compra/vendita di libri, all'interno dell'istituto Jean Monnet


## TODO LIST
  - [x] login sia con email sia con username
- [x] mainpage gia visibile all’inizio. Login page richiamabile dall’utente alla richiesta di login.
- [x] Pulsante registrati nella mainpage visibile solo se !loggato.
- [x] conferma account con email e captcha
- [x] inserimento in database dopo inserimento dati registrazione, con flag “non confermato”. Una volta cliccato sul link di conferma, sarà verificato.
- [x] occhio alla sicurezza, nel link ?id. USATO TOKEN GG
- [x] ricerca con query
- [x] nella login, hai dimenticato la password? → email con password reset
- [x] send email sendgrid.com
- [x] Cancella controllo su utente (ciclo fetch) 
- [x] Controllo su result inserimento libro, in caso di errore torna indietro errore
- [x] Reset email funzionante (da migliorare per sicurezza)
- [x] script che cancella se utente non ha confermato mail
- [x] aggiunta di unique a username e email, se gia presente nel db da errore creazione
- [x] scheda utente quale libro vende, ecc..
- [x] table responsive
- [x] scheda libro, MANCA COMPRA (metti a posto design)
- [x] cambiare password da account page
- [x] script che controlla quanto tempo c’e stato dall’ultimo aggiornamento, se è >60 minuti ti fa aspettare il tempo rimanente.
- [x] selezionare solo data senza time da dataPubblicazione
- [x] Cambia password da account page
- [x] Nel cercalibro, se non sei loggato il pulsante ti fara modale loggare, se gia loggato, ti porta a schedaLibro
- [x] SISTEMA TELEFONO IN ACCOUNT.php
- [X] Login con google (webservice giodabg) (prima google insta)
- [X] Modifica profilo da Account Page
- [X] account page con id get e scrive i parametri
- [X] Script Javascript in account che ti seleziona casella
- [X] Aggiornamento foto profilo in account.php
- [X] Donazioni con account paypal
- [X] favicon (funziona solo su altervista.org)
- [X] about us (me e pirol) (da modificare)
- [X] Aggiunto script che seleziona tutto e anche prezzo: ROUND(prezzo,2). Cosi non taglia i decimali
- [X] Aggiunto contatore di libri gia venduti/in vendita in account.php
- [X] Centra "loginConGoogle" e metti didascalia (es Effettua il login con google)
- [X] logo: https://imgur.com/a/14daiaq (/img/logoHome.png)
- [X] Footer!
- [X] tabella in homepage non responsive
- [X] cambiare footer ( ho messo link a matteobaldassin.com, da cambiare a boo)
- [X] fare app android con riporta pagina
- [X] sistema immagine nel homepage
- [ ] in cercalibro se non sei loggato il colore del font del bottone è bianco, fallo nero poi hover bianco
- [ ] Aggiungi "sottolineato con evidenziatore" in vendiLibro
- [ ] metti formato italiano nel datetime di account page, il codice c’e uguale nello schedaLibro data inserimento
      (!non è cosi semplice come pensavo...la conversione funziona, ma una volta scritto nel <input type> si sfalda il calendario)
- [ ] Modifica libro (opzionale)
- [ ] Caratteri UTF-8 (con accento) non vanno CHIEDI A LONGHI
- [ ] navbar selected item highlighted
- [ ] ISBN READER: da smartphone con fotocamera, da pc tipo whatsapp web con app (aggiungere nuovo webservice) DA IMPLEMENTARE
----- IMPORTANTI ----
- [ ] i due modali (donazione e chi siamo) nella home non sono responsive
- [ ] account quando loggato quando premi per andare su profilo si sposta fuori
- [ ] Non funziona send email, per ora ho messo un'altra pagina "registrazioneSOLOPERDEBUG" che registra senza conferma
- [ ] Nell'account.php, il footer rimane alto se l'account non ha libri

- [ ] Conta righe di codice totale
### To-Check list
- [ ] CONTROLLA FOTO PROFILO IN ACCOUNT PAGE CON GOOGLE
- [ ] CONTROLLA TUTTO PER GOOGLE
- [ ] CONTROLLA SE FUNZIONA ANCORA REGISTER (in teoria si!)
- [ ] CONTROLLA GOOGLE DISCONNECT() non disconnette veramente ma puo essere passabile per primi test
- [ ] Mail non arriva!!!!!!!!!!!!!!!!!!!!!!!!!

### Improve list
- [ ] MIGLIORARE REDIRECT in CERCALIBRO: alla pagina corrente e non sempre ad index.php
- [ ] MIGLIORARE in schedaLibro onLoad() fai uscire il modale se non sei loggato, javascript lo odio e non funziona.
- [ ] migliora “elimina definitivamente” in listalibri con popup di sicurezza e poi $_SESSION[“gia-confermato”] = true e quindi non esce più
- [ ] Form modale crea padding a destra
- [ ] Prezzo amazon
- [ ] modificare i “?message=” con modal bootstrap popup autorun
- [ ] Nel modale "modifyFotoProfilo" controllare grandezza immagine quando visualizzata!
- [ ] Nel modale "modalAboutUs" aggiungere foto di me e @davePirol
- [ ] nell'aggiornamento foto profilo, fare script che visualizza caricamento file durante upload, sembra stuck sennò [LINK](https://medium.com/@martinsOnuoha/show-a-loading-animation-on-file-upload-17925b7bf300)
- [ ] aggiungere favicon anche su jmbooks.it?
- [ ] HTTPS su jmbooks.it
- [ ] In account.php, quando faccio elimina definitivamente, fai uscire modale che ti chiede "sei sicuro"? 
- [ ] Aggiungere pagina profilo utente pubblica, con recensioni/stelle onesta
- [ ] Modificare css di bootstrap per MODAL e FORM (aggiungono padding rispettivamente right e top).

### Appunti per connessione a python webservice
Il webservice dovrà runnare sullo stesso server, cosi potra accedere al file caricato sul server, per poterlo decodificare.
questo è un problema, si puo ovviare passando in qualche modo l'immagine al python webserver (esempio con download da url)
e forse funzionerebbe.
##### Sono riuscito a farlo, il webservice prende l'url dell'immagine, lo scarica dal sito, lo salva in locale e lo decodifica

##### aggiornamento 2.0 : (zteobalda.pythonanywhere.com)
il webservice ora runna su [pythoneverywhere](https://www.pythonanywhere.com)
Il sito in pratica carica il file python "webservice.py" e permette l'accesso costante
(a differenza di aws che, una volta chiusa la connessione SSH, terminava il run del webservice

(commento del 20/03/2020: sei un coglione, bastava inserire il tmux o qualsiasi interfaccia linux similare e poi attaccarti ahah)

## Useful links

- (https://pypi.org/project/python-barcode/)
- (https://www.google.com/search?safe=off&rlz=1C1GCEU_itIT821IT821&ei=EJLSXJ_DN8W8kwWSlJKIBQ&q=pyzbar+windows&oq=pyzbar+windows&gs_l=psy-ab.3..0i203j0i22i10i30j0i22i30.4492.6957..7039...1.0..0.86.631.9......0....1..gws-wiz.....6..0i71j35i39j0.xqhpls8N5vg)
- (https://ludusrusso.cc/2018/01/22/opencv-barcode-reader/)
- POSTMAN
- (https://medium.com/@umerfarooq_26378/web-services-in-python-ef81a9067aaf)
- [webcam con flask e python](https://www.codepool.biz/web-camera-recorder-oepncv-flask.html)
- [runnare python webserver con flask su aws](https://www.youtube.com/watch?v=WE303yFWfV4)
- [Database italiano con risposte JSON](https://literarymachin.es/sbn-json-api)
- [Uno dei pochi siti database funzionati, da trovare l'endPOINT](https://www.books-by-isbn.com/cgi-bin/isbnondemand.pl?isbn=9788842114932)
