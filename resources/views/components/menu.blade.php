 <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Menu items -->
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link" data-pjax>
              <i class="nav-icon fas fa-home"></i>
              <p>Accueil</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" data-pjax data-toggle="collapse" data-target="#produits-menu">
              <i class="nav-icon fas fa-box"></i>
              <p>Produits
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul id="produits-menu" class="nav nav-treeview collapse">
              <li class="nav-item">
                <a href="{{ route('admin.Livres&catégories.article.index') }}" class="nav-link" data-pjax>
                  <i class="nav-icon fas fa-book"></i>
                  <p>Livres</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.Livres&catégories.categorie.index') }}" class="nav-link" data-pjax>
                  <i class="nav-icon fas fa-tags"></i>
                  <p>Catégorie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.Livres&catégories.reduction.index') }}" class="nav-link" data-pjax>
                  <i class="nav-icon fas fa-percent"></i>
                  <p>Réduction</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" data-pjax data-toggle="collapse" data-target="#auteurs-edition-menu">
              <i class="nav-icon fas fa-pen"></i>
              <p>Edition et Auteurs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul id="auteurs-edition-menu" class="nav nav-treeview collapse">
              <li class="nav-item">
                <a href="{{ route('admin.Auteurs&edition.auteur.index') }}" class="nav-link" data-pjax>
                  <i class="nav-icon fas fa-user"></i>
                  <p>Auteurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.Auteurs&edition.edition.index') }}" class="nav-link" data-pjax>
                  <i class="nav-icon fas fa-bookmark"></i>
                  <p>Editions</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" data-pjax data-toggle="collapse" data-target="#commandes-menu">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>GS-commandes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul id="commandes-menu" class="nav nav-treeview collapse">
              <li class="nav-item">
                <a href="{{ route('admin.Commandes.commande.index') }}" class="nav-link" data-pjax>
                  <i class="nav-icon fas fa-receipt"></i>
                  <p>Commandes</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" data-pjax data-toggle="collapse" data-target="#contacts-menu">
              <i class="nav-icon fas fa-address-book"></i>
              <p>GS-contacts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul id="contacts-menu" class="nav nav-treeview collapse">
              <li class="nav-item">
                <a href="{{ route('admin.Contacts.contact.index') }}" class="nav-link" data-pjax>
                  <i class="nav-icon fas fa-envelope"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>