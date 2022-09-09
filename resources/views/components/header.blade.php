@php

    $pages =[
        ['Clientes', 'customers'],
        ['Funcionários', 'employees'],
        ['Produtos', 'products'],
        ['Categorias','categories'],
        ['Vendas','sales'],
        ['Estoque','inventories'],
        ['Promoção','promotions']
    ];

@endphp
<nav class="navbar navbar-expand-lg bg-light">

    <div class="container-fluid">

        <a class="navbar-brand" href="{{ url('') }}">{{ config('app.app_name') }}</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">

                {{-- @if (Auth::user()->role == 1) --}}

                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Usuários
                        </a>

                        <div class="nav-item dropdown-menu">

                            <a href="{{ url('admins') }}" class="dropdown-item"><i class="fas fa-users"></i> Administração</a>

                            <a href="{{ url('users') }}" class="dropdown-item"><i class="bi bi-people-fill"></i> Usuários</a>

                        </div>

                    </li>

                {{-- @endif --}}

                @foreach ($pages as $page)

                    @if (Auth::user()->role == 0)
{{--
                        @if ($page[0] != 'Funcionários')

                            <li class="nav-item">
                                <a href="{{ url($page[1]) }}" aria-current="page" class="nav-link">{{ $page[0] }}</a>
                            </li>

                        @endif --}}

                    {{-- @else --}}

                        {{-- @if (Auth::user()->role == 2) --}}

                            {{-- @if ($page[0] == 'Produtos' || $page[0] == 'Categorias' || $page[0] == 'Promoção')

                                <li class="nav-item">
                                    <a href="{{ url($page[1]) }}" aria-current="page" class="nav-link">{{ $page[0] }}</a>
                                </li>

                            @endif

                        @else --}}

                            <li class="nav-item">
                                <a href="{{ url($page[1]) }}" aria-current="page" class="nav-link">{{ $page[0] }}</a>
                            </li>

                        {{-- @endif --}}

                    @endif

                @endforeach


            </ul>

            @if (Auth::user()->role == 0)

                <ul class="navbar-nav ms-auto">
                    <div class="position-relative">

                        <button type="button" class="btn btn-light"><i class="bi bi-basket"></i>

                            @if(Session::has('itens'))

                                <span class="position-absolute badge rounded-pill bg-danger">{{ count(Session::get('itens')) }}</span>

                            @endif

                        </button>


                    </div>

                </ul>

                <ul class="navbar-nav ms-end">

                    <li class="nav-item dropdown">
                        {{-- @dd(Auth::user()->employee->id) --}}
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->customer->person->name }}
                        </a>

                        <div class="nav-item dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            @if (Auth::user()->role == 2)

                                <a href="{{ url('/customer/'.Auth::user()->customer_id.'/show') }}" class="dropdown-item"><i class="bi bi-person-fill"></i> Perfil</a>

                            @endif

                            <a class="dropdown-item" class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                Sair
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>

                    </li>

                </ul>

            {{-- @else

                <ul class="navbar-nav ms-auto ms-end">

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->employee->person->name }}
                        </a>

                        <div class="nav-item dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            @if (Auth::user()->role == 0)

                                <a href="{{ url('/employee/'.Auth::user()->employee_id.'/show') }}" class="dropdown-item"><i class="bi bi-person-fill"></i> Perfil</a>

                            @endif

                            <a class="dropdown-item" class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                Sair
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>

                    </li>

                </ul> --}}

            @endif


        </div>


    </div>

</nav>
