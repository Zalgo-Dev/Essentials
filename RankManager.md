# Gestion des ranks
## addRank(string $rankName): void
- Ajoute un nouveau rank.

## deleteRank(string $rankName): void
- Supprime un rank existant.

## rankExist(string $rankName): bool
- Vérifie si un rank existe.

## getAllRanks(): array
- Renvoie une liste de tous les ranks existants.

## setRankDisplayName(string $rankName, string $displayName): void
- Définit un nom d'affichage pour un rank.

## getRankDisplayName(string $rankName): ?string
- Récupère le nom d'affichage d'un rank.

# Gestion des joueurs et des ranks
## setPlayerRank(string $playerName, string $rankName): void
- Assigne un rank à un joueur. 

## getPlayerRank(string $playerName): ?string
- Récupère le rank actuel d'un joueur. 

## removePlayerRank(string $playerName): void
- Supprime le rank d'un joueur (le joueur devient "sans rank" ou par défaut).

## hasPlayerRank(string $playerName, string $rankName): bool
- Vérifie si un joueur a un rank spécifique.

## getPlayersByRank(string $rankName): array
- Renvoie la liste des joueurs ayant un rank spécifique.

# Héritage et propriétés des ranks
## setRankParent(string $rankName, ?string $parentRank): void
- Définit un rank parent pour un rank (héritage).

## getRankParent(string $rankName): ?string
- Récupère le rank parent d'un rank.

## hasRankParent(string $rankName): bool
- Vérifie si un rank a un parent.

## getRankHierarchy(string $rankName): array
- Renvoie une liste hiérarchique des ranks (du rank courant jusqu'à la racine).

# Métadonnées et priorités
## setRankPriority(string $rankName, int $priority): void
- Définit une priorité pour un rank (par exemple, pour trier les ranks). 

## getRankPriority(string $rankName): int
- Récupère la priorité d’un rank.

## compareRanks(string $rank1, string $rank2): int
- Compare deux ranks en fonction de leur priorité (utile pour savoir lequel est "plus haut").

## setRankColor(string $rankName, string $colorCode): void
- Définit une couleur pour un rank (utile pour des affichages).

## getRankColor(string $rankName): ?string
- Récupère la couleur d’un rank.