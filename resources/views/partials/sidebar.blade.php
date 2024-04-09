<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                <div class="sidebar-brand-text mx-3">{{ __('Homepage') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

        


            <li class="nav-item">
                <a class="nav-link" href="{{ route('epreuve.index') }}">
                    <i class="fas fa-cogs"></i>
                    <span>{{ __('Epreuves') }}</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('question.index') }}">
                    <i class="fas fa-cogs"></i>
                    <span>{{ __('Question') }}</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('option.index') }}">
                    <i class="fas fa-cogs"></i>
                    <span>{{ __('Option') }}</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('professeur_results') }}">
                    <i class="fas fa-cogs"></i>
                    <span>{{ __('Result') }}</span></a>
            </li>



        </ul>
