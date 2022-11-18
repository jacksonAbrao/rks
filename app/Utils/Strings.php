<?php
namespace App\Utils;
use Illuminate\Support\Str;
class Strings{
    public static function slugify($text, string $divider = '-'){
        return Str::slug($text, $divider);
    }

    public static function SomenteNumeros($texto){
        if(static::isNullOrEmpty($texto)) $texto = "";
        return preg_replace( '/[^0-9]/is', '', $texto );
    }

    public static function obfuscate_email($email){
        $em   = explode("@",$email);
        $name = implode('@', array_slice($em, 0, count($em)-1));
        $len  = floor(strlen($name)/2);
        $qtd = strlen($name) - $len;
        return mb_substr($name,0, $len) . str_repeat('*', $qtd) . "@" . end($em);
    }

    public static function OfuscateCardNumber($card){
        return mb_substr($card, 0, 4) . str_repeat('*', strlen($card) - 8) . mb_substr($card, -4);
    }

    public static function isNullOrEmpty($str){
        return ($str === null || trim($str) === '');
    }

    public static function GeraCodigoBarra($qtdDigitos){
        $guidCod = (string)Str::uuid();
        $geraCodigo = hash('sha256', $guidCod.microtime());
        $barra = mb_substr($geraCodigo, 0, $qtdDigitos);
        return $barra;
    }

    public static function ObtemSubstring($resumo, $tamanho = 100){
        $len = strlen($resumo);
        if($len > $tamanho){
            $resumo = mb_substr($resumo, 0, $tamanho) . " ...";
        }
        return $resumo;
    }

    public static function ObtemNumeroZeroEsquesda($numero, $quantidadeMinima){
        while(strlen($numero) < $quantidadeMinima){
            $numero = "0" . $numero;
        }
        return $numero;
    }

    public static function TransformaHtmlEmWhatsapp($textoAlterar){
        $textoAlterar = str_replace("<br>", "%0D%0A", $textoAlterar);
        $textoAlterar = str_replace("<br/>", "%0D%0A", $textoAlterar);
        $textoAlterar = str_replace("<br />", "%0D%0A", $textoAlterar);
        $textoAlterar = str_replace("<p>", "", $textoAlterar);
        $textoAlterar = str_replace("</p>", "", $textoAlterar);
        $textoAlterar = str_replace("<div>", "", $textoAlterar);
        $textoAlterar = str_replace("</div>", "", $textoAlterar);
        $textoAlterar = str_replace("<span>", "", $textoAlterar);
        $textoAlterar = str_replace("</span>", "", $textoAlterar);
        $textoAlterar = str_replace("<strong>", "*", $textoAlterar);
        $textoAlterar = str_replace("</strong>", "*", $textoAlterar);
        $textoAlterar = str_replace("<b>", "*", $textoAlterar);
        $textoAlterar = str_replace("</b>", "*", $textoAlterar);
        $textoAlterar = str_replace("<i>", "_", $textoAlterar);
        $textoAlterar = str_replace("</i>", "_", $textoAlterar);
        $textoAlterar = str_replace("<u>", "", $textoAlterar);
        $textoAlterar = str_replace("</u>", "", $textoAlterar);
        $textoAlterar = str_replace("<strike>", "~", $textoAlterar);
        $textoAlterar = str_replace("</strike>", "~", $textoAlterar);
        $textoAlterar = str_replace("<ul>", "", $textoAlterar);
        $textoAlterar = str_replace("", "", $textoAlterar);
        $textoAlterar = str_replace(" ", "%20", $textoAlterar);
        $textoAlterar = preg_replace('/<[^>]*>/', '', $textoAlterar);
        return $textoAlterar;
    }

    public static function RemoveSimbolosFinanceiro($valor){
        $valor = str_replace(array('R$', ' '), '', $valor);
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
        return $valor;
    }

    public static function RemoveSimbolosPorcentagem($valor){
        $valor = str_replace(array('%', ' '), '', $valor);
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
        return $valor;
    }

    /**
      *  Aplica mascara para uma string
      *  $cpf = AplicaMascara($documento, '###.###.###-##');
      *  $cnpj = AplicaMascara($documento, '##.###.###/####-##');
    */
    public static function AplicaMascara($valor, $mascara) {
        $mascarado = '';
        $k = 0;
        for($i = 0; $i<=strlen($mascara)-1; $i++) {
            if($mascara[$i] == '#') {
                if(isset($valor[$k])) $mascarado .= $valor[$k++];
            } else {
                if(isset($mascara[$i])) $mascarado .= $mascara[$i];
            }
        }
        return $mascarado;
    }
}
