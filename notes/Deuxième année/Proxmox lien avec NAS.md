# Proxmox

## Lien avec NAS :

/var/lib/vz

mkdir SIO2-CP

chmod 777 SIO2-CP

```bash
nano /etc/fstab
# dans le fichier, ajouter
172.17.0.7:/sauvegarde/ /var/lib/vz/ppe2 nfs soft,defaults,user,auto,noatime,intr 0
```

Dans datacenter --> backup, "add".

- Storage : SIO2-CP

- Schedule : mercredi à deux heures du matin

- include selected VMs

Pour le backup local :

- Storage : local

- Schedule : Le dimanche ?

## Importer une machine virtuelle sur le Proxmox

1. Exporter les machines en *OVA*.

2. Transférer l'OVA dans /var/lib/vz/dump (MobaXterm, scp,...)

3. Dans un terminal sur le Proxmox, décompresser l'archive OVA. `tar -xvf VM.ova`

4. Importer le fichier OVF avec la commande qm importovf, dont le premier argument est l'id de la machine sur le Proxmox (520 dans notre cas) : `qm importovf 520 VM.ovf local-zfs`
