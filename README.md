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
- [ ] metti formato italiano nel datetime di account page, il codice c’e uguale nello schedaLibro data inserimento
- [ ] favicon e logo: https://imgur.com/a/14daiaq
- [ ] about us (me e pirol)
- [ ] Modifica libro (opzionale)
- [ ] Caratteri UTF-8 (con accento) non vanno
- [ ] Footer!
- [ ] navbar selected item highlighted
- [ ] ISBN READER: da smartphone con fotocamera, da pc tipo whatsapp web con app

### To-Check list
- [ ] CONTROLLA FOTO PROFILO IN ACCOUNT PAGE CON GOOGLE
- [ ] CONTROLLA TUTTO PER GOOGLE
- [ ] CONTROLLA SE FUNZIONA ANCORA REGISTER (in teoria si!)
- [ ] CONTROLLA GOOGLE DISCONNECT() non disconnette veramente ma puo essere passabile per primi test
- [ ] Mail non arrvia!!!!!!!!!!!!!!!!!!!!!!!!!

### Improve list
- [ ] MIGLIORARE REDIRECT in CERCALIBRO: alla pagina corrente e non sempre ad index.php
- [ ] MIGLIORARE in schedaLibro onLoad() fai uscire il modale se non sei loggato, javascript lo odio e non funziona.
- [ ] migliora “elimina definitivamente” in listalibri con popup di sicurezza e poi $_SESSION[“gia-confermato”] = true e quindi non esce più
- [ ] Form modale crea padding a destra
- [ ] Prezzo amazon
- [ ] modificare i “?message=” con modal bootstrap popup autorun
- [ ] Nella tabella libri, modificare prezzo (21.1 --> 21.10)
- [ ] Nel modale "modifyFotoProfilo" controllare grandezza immagine quando visualizzata!

### Appunti per connessione a python webservice
Il webservice dovrà runnare sullo stesso server, cosi potra accedere al file caricato sul server, per poterlo decodificare.
questo è un problema, si puo ovviare passando in qualche modo l'immagine al python webserver (esempio con download da url)
e forse funzionerebbe.
##### Sono riuscito a farlo, il webservice prende l'url dell'immagine, lo scarica dal sito, lo salva in locale e lo decodifica

##### aggiornamento 2.0 : (zteobalda.pythonanywhere.com)
il webservice ora runna su [pythoneverywhere](https://www.pythonanywhere.com)
Il sito in pratica carica il file python "webservice.py" e permette l'accesso costante
(a differenza di aws che, una volta chiusa la connessione SSH, terminava il run del webservice

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
