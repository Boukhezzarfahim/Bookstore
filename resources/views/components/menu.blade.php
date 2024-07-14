<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                  Accueil
              </p>
          </a>
      </li>

      <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box"></i> <!-- Changer l'icône pour Produits -->
              <p>
                  Produits
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('admin.Livres&catégories.article.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-book"></i> <!-- Icône pour Livres -->
                      <p>Livres</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.Livres&catégories.categorie.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-tags"></i> <!-- Icône pour Catégorie -->
                      <p>Catégorie</p>
                  </a>
              </li>
          </ul>
      </li>

      <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-pen"></i> <!-- Changer l'icône pour Edition et Auteurs -->
              <p>
                  Edition et Auteurs
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('admin.Auteurs&edition.auteur.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-user"></i> <!-- Icône pour Auteurs -->
                      <p>Auteurs</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.Auteurs&edition.edition.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-bookmark"></i> <!-- Icône pour Editions -->
                      <p>Editions</p>
                  </a>
              </li>
          </ul>
      </li>

      <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i> <!-- Changer l'icône pour GS-commandes -->
              <p>
                  GS-commandes
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('admin.Commandes.commande.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-receipt"></i> <!-- Icône pour Commandes -->
                      <p>Commandes</p>
                  </a>
              </li>
          </ul>
      </li>

      <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i> <!-- Changer l'icône pour GS-contacts -->
              <p>
                  GS-contacts
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('admin.Contacts.contact.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-envelope"></i> <!-- Icône pour Contacts -->
                      <p>Contacts</p>
                  </a>
              </li>
          </ul>
      </li>
  </ul>
</nav>
