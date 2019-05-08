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
- [ ] Login con google (webservice giodabg) (prima google insta)
- [ ] navbar selected item highlighted
- [ ] ISBN READER: da smartphone con fotocamera, da pc tipo whatsapp web con app
- [ ] Prezzo amazon
- [ ] Modifica profilo da Account Page
- [ ] account page con id get e scrive i parametri
- [ ] modificare i “?message=” con modal bootstrap popup autorun
- [ ] Script Javascript in account che ti seleziona casella non funziona ci pensa piroloù
- [ ] Aggiorna propic (ci siamo quasi)
- [ ] metti formato italiano nel datetime di account page, il codice c’e uguale nello schedaLibro data inserimento
- [ ] favicon e logo: https://imgur.com/a/14daiaq
- [ ] about us (me e pirol)
- [ ] Donazioni con account paypal

## Useful links

- (https://pypi.org/project/python-barcode/)
- (https://www.google.com/search?safe=off&rlz=1C1GCEU_itIT821IT821&ei=EJLSXJ_DN8W8kwWSlJKIBQ&q=pyzbar+windows&oq=pyzbar+windows&gs_l=psy-ab.3..0i203j0i22i10i30j0i22i30.4492.6957..7039...1.0..0.86.631.9......0....1..gws-wiz.....6..0i71j35i39j0.xqhpls8N5vg)
- (https://ludusrusso.cc/2018/01/22/opencv-barcode-reader/)
- POSTMAN
- (https://medium.com/@umerfarooq_26378/web-services-in-python-ef81a9067aaf)
