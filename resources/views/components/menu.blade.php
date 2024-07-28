<nav class="mt-2 custom-nav">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Menu items -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link" >
              <i class="nav-icon fas fa-home"></i>
              <p>Accueil</p>
            </a>
        </li>

      
           
         
              <li class="nav-item">
                <a href="{{ route('admin.Livres&catégories.article.index') }}" class="nav-link" >
                  <i class="nav-icon fas fa-book"></i>
                  <p>Livres</p>
            </a>
        </li>
        <li class="nav-item">
                <a href="{{ route('admin.Livres&catégories.categorie.index') }}" class="nav-link" >
                  <i class="nav-icon fas fa-tags"></i>
                  <p>Catégorie</p>
            </a>
        </li>
        <li class="nav-item">
                <a href="{{ route('admin.Livres&catégories.reduction.index') }}" class="nav-link" >
                  <i class="nav-icon fas fa-percent"></i>
                  <p>Réduction</p>
            </a>
              </li>
      
      

              <li class="nav-item">
                <a href="{{ route('admin.Auteurs&edition.auteur.index') }}" class="nav-link" >
                  <i class="nav-icon fas fa-user"></i>
                  <p>Auteurs</p>
            </a>
        </li>
        <li class="nav-item">
                <a href="{{ route('admin.Auteurs&edition.edition.index') }}" class="nav-link" >
                  <i class="nav-icon fas fa-bookmark"></i>
                  <p>Editions</p>
            </a>
              </li>
          
   
              <li class="nav-item">
                <a href="{{ route('admin.Commandes.commande.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-receipt"></i>
                  <p>Commandes</p>
            </a>
              </li>
    

              <li class="nav-item">
                <a href="{{ route('admin.Contacts.contact.index') }}" class="nav-link" >
                  <i class="nav-icon fas fa-envelope"></i>
                  <p>Contacts</p>
            </a>
              </li>
      
        </li>
    </ul>
</nav>
