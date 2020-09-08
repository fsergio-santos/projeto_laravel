<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
</head>
<body>
	<nav id="sidebar" >
	<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="/home"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Página Principal</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Cadastros</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="/pessoa/pesquisar"><i class="icon fa fa-circle-o"></i>Pessoas</a></li>
            <li><a class="treeview-item" href="/telefone/pesquisar" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i>Telefones por Pessoa</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          </ul>
        </li>
        
        <li class="treeview" ><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Segurança</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="/role/pesquisar"><i class="icon fa fa-circle-o"></i>Grupo de Usuário</a></li>
            <li><a class="treeview-item" href="/permissao/pesquisar"><i class="icon fa fa-circle-o"></i>Permissões de Usuário</a></li>
            <li><a class="treeview-item" href="/escopo/pesquisar"><i class="icon fa fa-circle-o"></i>Escopo de Usuário</a></li>
            <li><a class="treeview-item" href="/usuario/list"><i class="icon fa fa-circle-o"></i>Usuários</a></li>
            <li><a class="treeview-item" href="/direitos/pesquisar"><i class="icon fa fa-circle-o"></i> Direitos de Acesso</a></li>
          </ul>
        </li>
        <li class="treeview" ><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-key"></i><span class="app-menu__label">Alterar Senha</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="/trocar/senha"><i class="icon fa fa-circle-o"></i>Trocar Senha</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
          </ul>
        </li>
      </ul>
    </aside>
	</nav>
</body>
</html>