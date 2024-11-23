# Réseau SIO pour vm

- Nom d'hôte : changer le nom dans :
  
  - /etc/hostname
  
  - /etc/hosts

- changer DNS dans resolv.conf :
  
  - 172.17.0.1

- changer ip dans /etc/network/interfaces :
  
  - ... static
  
  - address 172.16.0.IP
  
  - gateway 172.16.0.254 (Stormshield de la Sodecaf)

Pour finir, redémarrer le service réseau : `systemctl restart networking.service`
