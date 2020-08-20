<?php
$controllerName = $this->request->params['controller'];
$estadoDoEstabelecimento = $estabelecimento[0]['Estabelecimento']['estado_funcionamento'];
$estado = '';
$classBtn = '';
$corSituacao = '';
$usuariosessao = AuthComponent::user();
$stringReplace = substr($usuariosessao['data_nascimento'], 5, 10);

if($stringReplace == date('m-d') && !isset($_COOKIE['aniversarioVayron'])){
    echo $this->element('modalAniversario'); 
    setcookie('aniversarioVayron', true);
}

if($estadoDoEstabelecimento == 'Aberto'){
    $corSituacao = 'badge badge-success';
    $estado = 'Fechar Estabelecimento';
    $classBtn = 'btn btn-default';
} else{
    $estado = 'Abrir Estabelecimento';
    $corSituacao = 'badge badge-danger';
    $classBtn = 'btn btn-success';
}
$novoButton = $this->Js->link(
    $this->Html->tag('i', '', array(
        'class' => 'fas fa-plus '
    )) . 
    $estado,
    '/estabelecimentos/edit', 
    
    array('class' => 'float-right', 'escape' => false, 'update' => '#content', 'class' => $classBtn)
);

?>

