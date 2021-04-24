<li class="nav-item {{ Request::is('depatures*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('depatures.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Depatures</span>
    </a>
</li>
<li class="nav-item {{ Request::is('frightgos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('frightgos.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Frightgos</span>
    </a>
</li>
<li class="nav-item {{ Request::is('mOVIES*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('mOVIES.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>M O V I E S</span>
    </a>
</li>
<li class="nav-item {{ Request::is('series*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('series.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Series</span>
    </a>
</li>
