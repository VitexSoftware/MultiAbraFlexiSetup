Multi Flexi BeeSetup
====================

![MFB](src/images/project-logo.svg?raw=true)

Umoźňuje spouštět zvolené nástroje nad určitými účetními jednotkami FlexiBee v daných intervalech. 

Nastavené úlohy jsou pravidelně spouštěny ze systémovécho plánovače.
Protokol spouštění je zapisován do systémového logu.

Spouštěným skriptům jsou nastavoavány tyto proměnné prostředí:

 * **FLEXIBEE_URL**
 * **FLEXIBEE_LOGIN** 
 * **FLEXIBEE_PASSWORD**
 * **FLEXIBEE_COMPANY**



instalace
---------

```shell
sudo apt install lsb-release wget
echo "deb http://repo.vitexsoftware.cz $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/vitexsoftware.list
sudo wget -O /etc/apt/trusted.gpg.d/vitexsoftware.gpg http://repo.vitexsoftware.cz/keyring.gpg
sudo apt update
sudo apt install multi-flexibee-setup 
```

Screenshoty
-----------

Přehled stavu aplikace:  
![MFB](doc/MultiFlexiBeeSetup.png?raw=true)

Editace Aplikace/Skriptu:
![MFB](doc/Application.png?raw=true)  

Přehled nastavených aplikací:
![MFB](doc/Applications.png?raw=true)  

Editace firmy a nastavení spouštěných služeb
![MFB](doc/Company.png?raw=true)  

Instance FlexiBee serveru:
![MFB](doc/instance.png?raw=true)

