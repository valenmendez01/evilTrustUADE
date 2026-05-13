# Pasos para ejecutarlo

* Instalar VM + kali linux 
* Configurar VirtualBox para que tome el USB del adaptador de red
* Comandos:

Actualizar e instalar dependencias básicas
```bash
sudo apt update
```
```bash
sudo apt install git hostapd dnsmasq php -y
```

Clonar el repositorio
```bash
git clone https://github.com/valenmendez01/evilTrustUADE.git
```

Dar permisos y ejecutar
```bash
cd evilTrust
```
```bash
chmod +x evilTrust.sh
```
```bash
sudo ./evilTrust.sh -m terminal
```



