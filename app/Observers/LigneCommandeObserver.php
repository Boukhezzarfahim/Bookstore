<?php

namespace App\Observers;

use App\Models\LigneCommande;

class LigneCommandeObserver
{
    public function saved(LigneCommande $ligne)
    {
        $ligne->commande->updateMontantTotal();
    }

    public function deleted(LigneCommande $ligne)
    {
        $ligne->commande->updateMontantTotal();
    }
}
