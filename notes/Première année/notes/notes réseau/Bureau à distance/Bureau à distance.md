## Bureau à distance

FreeRDP et XRDP, pour FreeRDP, voir l'article Malekal.

On installe deux paquets, un paquet serveur et un paquet client.

## Installation :

```bash
apt update
apt install xrdp dbus-x11
```

## Configuration :

```bash
echo xfce4-session >> ~/.xsession
nano /etc/xrdp/startwm.sh
systemctl restart xrdp
```

### /etc/xrdp/startwm.sh

```bash
unset DBUS_SESSION_BUS_ADDRESS
unset XDG_RUNTIME_DIR
```

# Ma solution à moi, FreeRDP

FreeRDP est la réimplémentation open-source de RDP, basé sur Microsoft Open.

FreeRDP s'utilise en ligne de commande, fait office à la foi de serveur et de client.

On peut donc utiliser le bureau à distance de Windows sur un Linux avec FreeRDP et un Linux avec FreeRDP peut se connecter à WIndows.

## Installation

```bash
apt install freerdp2-x11
```

Pas de configuration requise. Il y a aussi une version du paquet recompilée pour Wayland.

> X11 est le serveur d'affichage traditionnel pour Unix. Sous Linux, il est progressivement remplacé par Wayland.

## Utilisation

```bash
xfreerdp /v:$ip_du_serveur /u:$utilisateur_distant
```

## Anydesk

Il existe un dépôt deb officiel pour AnyDesk.

```bash
wget -qO - https://keys.anydesk.com/repos/DEB-GPG-KEY | apt-key add -
echo "deb http://deb.anydesk.com/ all main" > /etc/apt/sources.list.d/anydesk-stable.list
apt update
apt install anydesk
```
