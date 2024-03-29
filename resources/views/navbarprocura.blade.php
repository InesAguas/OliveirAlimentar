<!--navbar-->
<nav class="navbar ">
    <div class="container-fluid ">
      <div>
      <a class="navbar-brand" href="{{ url('/')}}"><img src="/img/logotipo.png" width="70" height="55"></a>
      <a href="{{url('/sobre-contactos')}}" class="link-secondary" style="font-size:25px;">Sobre nós </a>
      @auth
      @endauth
        </div>
      <form class="d-flex">
        <input class="form-control form-control-lg ps-3 pe-3 rounded-pill" type="search" placeholder="Search" name="search" aria-label="Search">
        <button class="btn btn-outline-success color-green-2 rounded-circle " type="submit"><span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg></span></button>
      </form>
      <div>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar_carrinho" aria-controls="offcanvasNavbar">
            <span> <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-cart-check-fill " viewBox="0 0 20 16">
              <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z" />
            </svg></span>
          </button>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar_desejos" aria-controls="offcanvasNavbar">
          <span> <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-star-fill" viewBox="0 0 20 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
            </svg></span>
        </button>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span> <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-person-fill color-green-1" viewBox="0 0 18 16">
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
            </svg></span>
        </button>
      </div>
  
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar_carrinho" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          <h5 class="offcanvas-title me-5" id="offcanvasNavbarLabel">Carrinho de Compras</h5>
        </div>
        <div class="offcanvas-body ">
          @auth
          <p class="card-title" style="text-align:center;">Pressione o botão verde depois de alterar a quantidade</p>
          @foreach($produtosCarrinho as $produto)
          <div class="row g-2 mt-1">
            <div class="col">
              <div class="card ">
                <div class="row g-0 d-flex align-items-center">
                  <div class="col-4">
                    <!--mudar imagem-->
                    <img src="https://www.bing.com/images/blob?bcid=qLd2Ii-InSYFQNu98T6c-mfdDaID.....7Y" class="card-img-top" alt="...">
                  </div>
                  <div class="col-4">
                    <div class="card-body">
                      <h6 class="card-title">{{$produto->p_nome}}</h6>
                      <a class="card-text"><small class="text-muted">Descrição: {{$produto->p_descricao}}</small></a>
                      <div>
                        <a class="card-text"><small class="text-muted">Quantidade:</small></a>
                        <input type="number" value="{{ $produto->c_quantidade }}" name="input_value" id="input_value">
                      </div>
                      <p class="card-text"><small class="text-muted">Preço: {{$produto->p_preco}}€</small> <br>
                    </div>
                  </div>
                  <div class="col-4 text-center">
                    <div >
                      <form action="{{ route('apagarProdutoCarrinho', $produto->p_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: rgb(255, 255, 255, 1); border: none; cursor: pointer; outline: none;">
                          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                          </svg>
                        </button>
                      </form>
                      <form action="{{ route('atualizarQuantidade', $produto->p_id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="inputValue" name="inputValue">
                        <button type="submit" id="submit" onclick="getInputValue();" style="background-color: rgb(255, 255, 255, 1); border: none; cursor: pointer; outline: none;">
                          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                          </svg>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @endauth
          <a href="/utilizador/checkout"><button>Checkout</button></a>
        </div>
      </div>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar_desejos" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          <h5 class="offcanvas-title me-5" id="offcanvasNavbarLabel">Lista de Desejos</h5>
        </div>
        <div class="offcanvas-body ">
          @auth
          @foreach($desejos as $desejo)
          <div class="row g-2 mt-1">
            <div class="col">
              <div class="card ">
                <div class="row g-0 d-flex align-items-center">
                  <div class="col-4">
                    <!--mudar imagem-->
                    <img src="https://www.bing.com/images/blob?bcid=qLd2Ii-InSYFQNu98T6c-mfdDaID.....7Y" class="card-img-top" alt="...">
                  </div>
                  <div class="col-4">
                    <div class="card-body">
                      <h6 class="card-title">{{$desejo->p_nome}}</h6>
                      <p class="card-text"><small class="text-muted">Descrição: {{$desejo->p_descricao}}</small></p>
                      <p class="card-text"><small class="text-muted">Preço: {{$desejo->p_preco}}€</small> <br>
                    </div>
                  </div>
                  <div class="col-4 text-center">
                    <div >
                      <form action="{{ route('apagarDesejo', $desejo->p_id) }}" method="POST">
                        @csrf
                         @method('DELETE')
                        <button type="submit" style="background-color: rgb(255, 255, 255, 1); border: none; cursor: pointer; outline: none;">
                          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                          </svg>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @endauth
        </div>
      </div>
  
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          @auth
          <h5 class="offcanvas-title me-5" id="offcanvasNavbarLabel">Olá {{Auth::user()->u_nome}}</h5>
          @endauth
        </div>
        <div class="offcanvas-body ">
          <ul class="navbar-nav justify-content-center align-items-center d-flex ">
            @guest
            <li class="nav-item p-3">
              <a href="{{ url('/utilizador/login')}}"><button type="button" class="btn btn-outline-secondary">Login</button>
              </a>
              <a href="{{ url('/utilizador/registo')}}"><button type="button" class="btn btn-outline-secondary">Criar conta</button>
              </a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link active" aria-current="page" href="{{ url('/utilizador/login')}}">Dados Pessoais</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link active" href="{{ url('/utilizador/login')}}">As minhas encomendas</a>
            </li>
            @endguest
            @auth
            @if (Auth::user()->u_tipo == 1)
            <li class="nav-item p-2">
              <a class="nav-link active" aria-current="page" href="{{ url('/administracao/utilizadores')}}">Utilizadores</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link active" href="{{ url('/produtos/verprodutos')}}">Produtos</a>
            </li>
            @else
            <li class="nav-item p-2">
              <a class="nav-link active" aria-current="page" href="{{ url('/utilizador/perfil')}}">Dados Pessoais</a>
            </li>
            @endif
            @if (Auth::user()->u_tipo == 2)
            <li class="nav-item p-2">
              <a class="nav-link active" href="{{ url('/administracao/encomendas')}}">As minhas encomendas</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link active" aria-current="page" href="{{ url('/produtos/verprodutos')}}">Os meus produtos</a>
            </li>
            @elseif(Auth::user()->u_tipo == 3)
            <li class="nav-item p-2">
              <a class="nav-link active" href="{{ url('/utilizador/encomendas')}}">As minhas encomendas</a>
            </li>
            @endif
            <li class="nav-item p-3">
              <a href="{{ url('/utilizador/logout')}}"><button type="button" class="btn btn-outline-secondary">Terminar Sessão</button>
              </a>
            </li>
            @endauth
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
    display: none;
    }

    input[type="number"] {
      min-width: 20px;
      width: 40px;
      text-align: center;
    }
    .quantity-input {
      display: flex;
      align-items: center;
    }
  </style>

  <script>
    function getInputValue(){
      var inputVal = document.getElementById("myInput").value;
      document.getElementById("inputValue").value= inputVal;
    }
  </script>
