<?php
require_once __DIR__."/alunos.php";
require_once __DIR__."/notas.php";

// uma função callback é uma função que é passada como parametro para outra função

print_r($notas);
echo "<hr>";

print_r($alunos);
echo "<hr>";

// aqui usamos uma função anonima como uma função callback
$notasAprovadas = array_filter($notas, function($nota){
    return $nota > 50;
});

echo "Notas Aprovadas <br>";
print_r($notasAprovadas);
echo "<hr>";

// outra forma de usar uma função callback
// armazenando a function anonima em uma variavel e passando a variavel
// armazenando a função anonima em uma variavel
$filtroRep = function($nota){
    return $nota < 50;
};
// executando o filtro, porem dessa ve passando a variavel que recebe uma função anonima
$notasReprovadas = array_filter($notas, $filtroRep);
echo "Notas Reprovadas <br>";
print_r($notasReprovadas);
echo "<hr>";

// outra forma de usar function callback
// usando uma funcão normal, porem quando passada como argumento callback, a função devera ser passada com string
// criando uma função normal para filtrar
function filtroRep($nota){
    return $nota < 50;
};
// executando o filtro, porem quando uma função normal for passada como argumento, deve ser passada como string
$notasReprovadas2 = array_filter($notas, "filtroRep");
echo "Notas Reprovadas usando função normal, porem passada como string quando se tratar de um callback <br>";
print_r($notasReprovadas2);
echo "<hr>";


//----------------------- CONCEITO IMPORTANTE ----------------------
// alem da forma tradicional de chamar uma função, ela também pode ser chamada como uma string
// veja o exemplo abaixo
function soma($a, $b){
    return $a + $b;
};

// forma tradicional de chamar a função
echo "chamando uma função de forma traducional soma(parametros)<br>" . soma(12, 25) . "<hr>";
// chamando agora a mesma função porem, como uma string
echo "chamando uma função como string 'soma'(parametros)<br>" . "soma"(1,2) . "<hr>";

//----------- BRUXARIA... -----------------
// alem de chamar uma função como string, vc pode atribuir essa string que é a função, a uma variavel... 
// sim, é isso mesmo... exemplo abaixo
$somaVar = "soma"; // perceba que essa string soma, corresponde também ao nome da função
echo "chamando uma função como variavel com nome da função como string atribuida a ela $ variavel(parametros)<br>" . $somaVar(1,3) . "<hr>";
// esquisitissimo...


//---------- Criando nossa propria função de filtrar array -------------------
// função para filtrar nota
function notaAprov($value){
    return $value > 50;
}

// função apra filtrar por idade
function maiorDeIdade($idade){
    return $idade >= 18;
}

//função filtro
function filtrarCustom(array $arr, callable $nomeDaFuncao){
    $resultado = [];
    foreach($arr as $value){
        if($nomeDaFuncao($value)){
            $resultado[] = $value;
        }
    }
    return $resultado;
}

// perceba que o segundo parametro é uma função callback chamado por string.
// basicamente, um callback é uma logica que é passada por string
echo "minha propria filtragem<br>";
print_r(filtrarcustom($notas, "notaAprov"));
echo "<hr>";

