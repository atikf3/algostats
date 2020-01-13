# CMG-ALG3 2020 Bachelor
![companyLogo](https://newsroom.ionis-group.com/wp-content/uploads/2018/12/etna-logo-1-noir.png)

## Informations
 1. Name of project : **AlgoStats**
 2. Duration : **-1 weeks** (*Nov 25 to Jan 17*)

## Goal
>Réaliser une série de tris.
>Évaluer leur efficacité.
>Analyser différents algorithmes de tri afin d'identifier l'algorithme le plus optimal à la situation à traiter.
>Distinguer les différences de fonctionnement entre les algorithmes de tri.

## Explications
### Insert Sort:
> Le tri par insertion est essentiellement ce qu'on fait intuitivement lorsque on trie une pile de documents ou de dossiers. On prend la pile et on la traverse ; lorsque on trouve quelque chose en "désordre", on le met au bon endroit.

### Selection sort
> Le tri par selection va trouver le plus petit item/nombre dans le tableau de taille n et va le mettre de coté dans un autre tableau.
> On a donc 1 item trié et le reste d'items non triés. Ensuite on va trouver encore le plus petit item dans le tableau original et on l'ajoute au second tableau, on a donc 2 items triés et le reste non trié.
> On répete l'operation n fois tout en placant les plus petits items du le tableau non trié dans le tableau trié.

### Bubble sort
> Donc le bubble sort va prendre un tableau de taille n et comparer les 2 premiers nombres, a et b: si le nombre a est superieur à b, alors on les intervertit, sinon on les laisse comme ça. On va ensuite comparer les 2 autres nombres en partant de b, donc b et c, on répète l'operation au dessus tout le long du tableau pour tous les nombres toujours en effectuant un decalage de 1, ce qui rapproche tous les petits nombre d'un pas vers le debut du tableau et les grands nombres d'un pas vers la fin. On répète ce processus jusque a ce que le tableau est trié.
> Schématiquement, on peut dire que c'est une sorte de bulle car les petits nombres avancent lentement vers le debut du tableau, toujours lors ce cette "bulle", une itération à la fois. 

### Shell sort
> Le shell sort est similaire au bubble sort par l'échange ou le insertion sort, mais amélioré niveau rapidité.
> On trie les items/nombres éloignés les uns des autres tout en reduisant progréssivement l'ecart entre les nombres. Ainsi, en reduisant l'écart, on permet au tri d'etre plus efficace en placant certains éléments plus rapidements qu'un simple swap entre nombre voisins (cf bubble).

### Merge sort / Tri fusion
> Pour faire simple, divisons le merge sort en 2 operations distinctes : le merge/fusion et le sort/tri.
> La fusion prend deux moitiées d'un tableau préalablement triées, et les fusionne en 1 seul tableau trié.
> Donc si on a déja cette opération de fusion, et qu'on veut trier un tableau, on à juste a trier les deux moitiés du tableau et les fusionner en 1 seul tableau final.
> Maintenant on va voir comment on va trier ces deux moitiés de tableau: prenons la première moitié de ce tableau, on trie le premier sous tableau en divisant en deux moitiés, en triant chaque sous-moitié, puis en fusionnant ces deux sous-moitiés ensemble. Comment on trie cette première sous-moitié? De la meme façon ; on divise en deux sous-moitiés, trie chaque moitiés, et on fusionne...
> Donc pour resumer, on divise, sépare, re-divise ces parties séparées en des morceaux de plus en plus petits, jusque a arriver a un point ou le tableau a été tellement trié que il reste juste un eélement dans le tableau, et il faut donc trier un tableau de 1 element, sauf que c'est facile car celui ci est déja trié.

### Quick sort
> Pour faire simple, prenons un tableau de taille n et on prend un nombre dedans i, au hasard ou pas. 
> On passe en revue tous les nombres du tableau et on les sépare en 2 nouveaux sous tableaux: Un ou on trouve que des nombres inférieurs à notre nombre i et l'autre sous tableau contenant que des nombres supérieurs a notre nombre i. On répète l'opération de base avec des 2 sous tableaux jusque à arriver a des sous-sous-...-tableaux de taille 1. A partir de ce point on les remet tous ensemble en ordre et on a notre tableau trié.

### Comb sort
> Le comb sort est relativement simple: il reprend les memes bases que le bubble sort mais avec un intervalle entre les nombres qui est au début assez grand puis il est divisé par 1.3/1.25 jusque a ce que l'intervalle atteigne 1, donc égal au bubble sort.

## Analyse des algos
> Après comparaison des différents algorithmes, on en conclut que le QuickSort est l'algorithme le plus optimisé pour un usage dit "général". Avec une solide moyenne de O(log n), le merge sort a une compléxité similaire mais avec des faibles perfs niveau mémoire. De plus, le QuickSort à tendance à etre plus performant dans des cas "réells" grâce à des meilleures optimisations malgré la complexité temporelle.

## Additional Data
**Contributors:**
[ikf3](www.ikf3.com), [anago_b](www.anago.me)

**License:**
MIT
