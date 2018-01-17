<?php

class Booglan
{
  private $foo = [ 'r', 't', 'c', 'd', 'b' ];
  // twhzkdfvcjxlrnqmgpsb

  private $alfabeto = [ 't', 'w', 'h', 'z', 'k', 'd', 'f', 'v', 'c', 'j', 'x' ];


  public function contemLetra( $letra, $palavra ) {
    return (strpos($palavra, $letra));
  }

  public function tipoDaUltimaLetra($palavra)
  {
    return (in_array(substr($palavra, -1), $this->foo)) ? 'foo' : 'bar';
  } 


  public function tipoDaPrimeiraLetra($palavra)
  { //echo substr($palavra, 0, 1)  . '<br>';
    return (in_array(substr($palavra, 0, 1), $this->foo)) ? 'foo' : 'bar';
  }

  public function ePreposicao($palavra)
  {

    return ( strlen($palavra) === 5 &&
             $this->tipoDaUltimaLetra($palavra) === 'bar') &&
             $this->contemLetra('l', $palavra) === false;
  }

  public function eVerbo($palavra)
  {
    return ( strlen($palavra) === 8 &&
          $this->tipoDaUltimaLetra($palavra) === 'bar');
  }

  public function contarPreposicoes($texto)
  {
    $textoArr = explode(' ', $texto);
    $countPreposicoes = 0;

    foreach ($textoArr as $palavra) {
      if ($this->ePreposicao($palavra)) $countPreposicoes++;
    }
  
    return $countPreposicoes;
  }

  public function contarVerbos($texto, $tipo = 'todos') {
    $textoArr = explode(' ', $texto);
    $countVerbos = 0;


    switch ($tipo) {
      case 'primeira-pessoa':
        foreach ($textoArr as $palavra) {
          //echo $this->tipoDaPrimeiraLetra($palavra) . '<br>';
          if ($this->eVerbo($palavra) && $this->tipoDaPrimeiraLetra($palavra) === 'bar') $countVerbos++;
        }
        
        break;
      
      default:
        foreach ($textoArr as $palavra) {
          if ($this->eVerbo($palavra)) $countVerbos++;
        }

        break;
    }


    return $countVerbos;
  }

  public function ordenarPalavras($texto) {
    $textoArr = explode(' ', $texto);
    $textoOrdenadoArr = [];
  }
}