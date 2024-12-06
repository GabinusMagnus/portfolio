# RAID

Redundant Array of Independant Disks

* RAID 0 : deux disques durs constituent la même unité de stockage. Si un des disques est défectueux, toute l'unité le devient.

* RAID 1 : Un disque est copié sur l'autre (mirroring). Gain de performance en lecture, car les deux disques peuvent être lus en même temps.
  *La capacité de stockage se calcule selon la formule (nombre de disques - 1) x (capacité du disque le plus petit).*

* RAID 5 : Cinq disques se partagent les données. Les données sont divisées en bandes. *Parité distribuée.*

* RAID 10 : Deux grappes RAID 1 dans une grappe RAID 0. Le premier disque de la première grappe se partage les données avec le premier disque de la deuxième grappe. Dans chaque grappe, le second disque est le miroir du premier.

* RAID 50 : 

[Calculateur de capcité de stockage, de performance et de disponibilité.](http://www.raid-calculator.com/default.aspx)

### RTO et RPO

![RPO-RTO](C:\Users\Gabin\kDrive\cours\notes\images\RPO-RTO.png)

RPO (Recovery Point Objective, alias PDMA : perte de données maximale admissible), RTO (Recovery Time Objective, alias DIMA : Durée maximale d'interruption admissible)




