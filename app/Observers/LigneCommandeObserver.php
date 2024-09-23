<?php

namespace App\Observers;

use App\Models\LigneCommande;

class LigneCommandeObserver
{
    public function saved(LigneCommande $ligne)
    {
        $ligne->commande->update(['montant_total' => $ligne->commande->montant_total]);
    }

    public function deleted(LigneCommande $ligne)
    {
        $ligne->commande->update(['montant_total' => $ligne->commande->montant_total]);
    }
}
