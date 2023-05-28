import network   #import des fonction lier au wifi
import urequests #import des fonction lier au requetes http
import utime #import des fonction lier au temps
import ujson #import des fonction lier aà la convertion en Json
from machine import Pin, PWM # importe dans le code la lib qui permet de gerer les Pin de sortie et de modulation du signal

wlan = network.WLAN(network.STA_IF) # met la raspi en mode client wifi
wlan.active(True) # active le mode client wifi


pwm_ledrouge = PWM(Pin(1,mode=Pin.OUT)) # on prescise au programme que la pin 17 est une sortie de type PWN
pwm_ledrouge.freq(1_000) # dont la frequence est de 1000 (default)
pwm_ledrouge.duty_u16(0) # on lui donne une valeur comprise entre 0  et 65535 qui est converti entre 0 et 3.3v

pwm_ledvert = PWM(Pin(2,mode=Pin.OUT)) # on prescise au programme que la pin 17 est une sortie de type PWN
pwm_ledvert.freq(1_000) # dont la frequence est de 1000 (default)
pwm_ledvert.duty_u16(0) # on lui donne une valeur comprise entre 0  et 65535 qui est converti entre 0 et 3.3v

pwm_ledbleu = PWM(Pin(3,mode=Pin.OUT)) # on prescise au programme que la pin 17 est une sortie de type PWN
pwm_ledbleu.freq(1_000) # dont la frequence est de 1000 (default)
pwm_ledbleu.duty_u16(0) # on lui donne une valeur comprise entre 0  et 65535 qui est converti entre 0 et 3.3v



ssid = ''
password = ''
wlan.connect(ssid, password) # connecte la raspi au réseau
url = "http://(adresse IP)/php-g09/Lotus/objet.php"

while not wlan.isconnected():
    print("pas co")
    utime.sleep(1)
    pass

previous_requete = None

while True:
    print("GET")
    r = urequests.get(url) # lance une requête sur l'URL
    requete = r.json() # traite sa réponse en JSON
    print (requete)
    types = r.json()[0]["type"]
    r.close() # ferme la demande

    if requete != previous_requete: # Vérifie si la valeur de types a changé
        print(types)
        # Effectuez ici votre logique lorsque la valeur de types change
        if types=="Divertissement":
            pwm_ledrouge.duty_u16(25500)
            pwm_ledvert.duty_u16(25500)
            utime.sleep(5)
        elif types=="Sport":
            pwm_ledrouge.duty_u16(25500)
            utime.sleep(5)
        elif types=="Politique":
            pwm_ledvert.duty_u16(12800)
            pwm_ledbleu.duty_u16(12800)
            pwm_ledrouge.duty_u16(12800)
            utime.sleep(5)
        elif types=="Musique":
            pwm_ledrouge.duty_u16(12800)
            pwm_ledbleu.duty_u16(12800)
            utime.sleep(5)
        elif types=="Voyage":
            pwm_ledvert.duty_u16(25500)
            utime.sleep(5)
        elif types=="Cuisine":
            pwm_ledvert.duty_u16(25500)
            pwm_ledbleu.duty_u16(25500)
            utime.sleep(5)
        elif types=="Art":
            pwm_ledrouge.duty_u16(25500)
            pwm_ledvert.duty_u16(10500)
            pwm_ledbleu.duty_u16(18000)
            utime.sleep(5)
        elif types=="Cinéma":
            pwm_ledrouge.duty_u16(16500)
            pwm_ledvert.duty_u16(4200)
            pwm_ledbleu.duty_u16(4200)
            utime.sleep(5)
            
            
    previous_requete = requete # Met à jour la valeur de previous_type

    utime.sleep(2)
    pwm_ledbleu.duty_u16(0)
    pwm_ledvert.duty_u16(0)
    pwm_ledrouge.duty_u16(0)
    
    